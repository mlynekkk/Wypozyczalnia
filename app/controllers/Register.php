<?php

class Register extends Controller {
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->authorizeModel = $this->model('Authorize');
        $this->vinylModel = $this->model('VinylModel');
        
    }
    
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $this->view('register',array('kategorie'=>$kategorie));
    }

    public function registerKlient(){
        if (!isset($_POST['haslo']) or !isset($_POST['email']) or !isset($_POST['confirmPassword'])or !isset($_POST['login'])){
            $_SESSION['errorEmptyRegister']="Uzupełnij wszystkie pola!";
        }else{
            unset($_SESSION['errorEmptyRegister']);
            if ($_POST['haslo']==$_POST['confirmPassword']){
                $result=$this->authorizeModel->getUserByEmail($_POST['email']);
                if ($result==null){
                    $this->userModel->createKlient();
                    unset($_SESSION['errorTakenRegister']);
                    header("Location: ".URLROOT."/login");
                    exit();
                }else{
                    $_SESSION['errorTakenRegister']="W bazie danych istnieje już użytkownik o tym samym adresie e-mail";
                }
            }
        }
        header("Location: ".URLROOT."/register");
        exit();
    }
}

?>