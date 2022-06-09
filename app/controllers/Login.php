<?php

class Login extends Controller {
  
    public function __construct()
    {
        $this->authorizeModel = $this->model('Authorize');
        $this->userModel = $this->model('User');
        $this->vinylModel = $this->model('VinylModel');
    }

    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        if(isset($_SESSION['userData']))
        {
            header("Location: ".URLROOT);
            exit();
        }
        $this->view('login',array('kategorie'=>$kategorie));
    }

    public function tryToLoginKlient(){
        if (!isset($_POST['email']) or !isset($_POST['haslo'])){
            $_SESSION['errorEmptyLogin']="Uzupelnij wszystkie dane!";
        }else{
            unset($_SESSION['errorEmptyLogin']);
            $result = $this->authorizeModel->getUserByEmail($_POST['email']);
            if ($result== null || !password_verify($_POST['haslo'], $result->haslo)){
                $_SESSION['errorBadAuthorize']="Podane dane nie zgadzają się!";
            }else{
                unset($_SESSION['errorBadAuthorize']);
                $_SESSION['userData']=$result;
                header("Location: ".URLROOT);
                exit();
            }
        }
        header("Location: ".URLROOT."/login");
               exit();
    }

    public function tryToLoginPracownik(){
        if (!isset($_POST['login']) or !isset($_POST['haslo'])){
            $_SESSION['perrorEmptyLogin']="Uzupelnij wszystkie dane!";
        }else{
            unset($_SESSION['perrorEmptyLogin']);
            $result = $this->authorizeModel->getPracownikByLogin($_POST['login']);
            if ($result== null || !password_verify($_POST['haslo'], $result->haslo)){
                $_SESSION['perrorBadAuthorize']="Podane dane nie zgadzają się!";
            }else{
                unset($_SESSION['perrorBadAuthorize']);
                $_SESSION['pracownikData']=$result;
                if($_SESSION['pracownikData']->id_rola==1){
                     $_SESSION['admin']=$_SESSION['pracownikData']->id_rola;
                }
                header("Location: ".URLROOT);
                exit();
            }
        }
        header("Location: ".URLROOT."/login");
                exit();
    }

}