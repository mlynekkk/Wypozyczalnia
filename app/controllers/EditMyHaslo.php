<?php

class EditMyHaslo extends Controller {
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->userModel = $this->model('User');
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $user=$this->userModel->getKlientByID($_GET['id_klient']);
        $this->view('editMyHaslo', compact('user','kategorie'));

    }
    public function EditMyHaslo($id_klient)
    {
        $blad=false;
        $user=$this->userModel->getKlientByID($id_klient);
        array('user'=>$user);
        $frKlient=new stdClass;
        $frKlient->id_klient= $id_klient;

        if(!empty($_POST['haslo']))
        {
           if(!password_verify($_POST['haslo'], $user->haslo)){
                $blad=true;
           }
        }
        else
        {
            $blad=true;
        }

        if(!empty($_POST['noweHaslo']))
        {
            $frKlient->haslo=password_hash($_POST['noweHaslo'],PASSWORD_DEFAULT);
        }
        else
        {
            $blad=true;
        }

        if(!$blad)//ustawiono wszystkie pola
        {
           
                $this->adminModel->updateCustomerPassword($frKlient);
                echo "update haslo";
           
            
        }
        header('location:'.URLROOT.'/myData' );
    }
}
?>