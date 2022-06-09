<?php

class AddEmployee extends Controller {
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->user = $this->model('User');
        $this->vinylModel = $this->model('VinylModel');
        $this->authorizeModel= $this->model('Authorize');

    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $this->view('addEmployee',array('kategorie'=>$kategorie));

    }
    public function AddEmployee()
    {
        $blad=false;
        $frPracownik=new stdClass;

        if(isset($_POST['login']))
        {
            $frPracownik->login=$_POST['login'];
        }
        else
        {
            $blad=true;
            $frPracownik->login="";
        }

        if(isset($_POST['haslo']))
        {
            $frPracownik->haslo=password_hash($_POST['haslo'],PASSWORD_DEFAULT);
        }
        else
        {
            $blad=true;
            $frPracownik->haslo="";
        }

        if(!$blad)//ustawiono wszystkie pola
        {
            unset($_SESSION['errorTakenRegister']);
            $result=$this->authorizeModel->getPracownikByLogin($_POST['login']);
            if ($result==null){
                $this->adminModel->addEmployee($frPracownik);
                header('location:'.URLROOT.'/profileAdmin' );
            }else{
                $_SESSION['errorTakenRegister']="W bazie danych istnieje już pracownik o tym samym loginie";
               
            }
            
            echo "dodano pracownika";
            
        }
         header('location:'.URLROOT.'/tabEmployees' );


    }


}
?>