<?php

class EditCustomer extends Controller {
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->user = $this->model('User');
        $this->vinylModel = $this->model('VinylModel');
    }

    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $user=$this->user->getKlientByID($_GET['id_klient']);
        $this->view('editCustomer', compact('user','kategorie'));

    }

    public function editCustomer($id_klient)
    {
        $blad=false;
        $has=false;
        $user=$this->user->getKlientByID($id_klient);
        array('user'=>$user);
        $frKlient=new stdClass;
        $frKlient->id_klient=$id_klient;

        if(isset($_POST['login']))
        {
            $frKlient->login=$_POST['login'];
        }
        else
        {
            $blad=true;
            $frKlient->login="";
        }

        if(isset($_POST['email']))
        {
            $frKlient->email=$_POST['email'];
        }
        else
        {
            $blad=true;
            $frKlient->email="";
        }

        if(!empty($_POST['haslo']))
        {
            $frKlient->haslo=password_hash($_POST['haslo'],PASSWORD_DEFAULT);
        }
        else
        {
            //$blad=true;
            $has=true;
        }

        if(!$blad)//ustawiono wszystkie pola
        {
           
                $this->adminModel->updateCustomerByAdmin($frKlient,$has);
                echo "update klienta";
           
            
        }
        header('location:'.URLROOT.'/editCustomer?id_klient='.$frKlient->id_klient.'' );


    }

    

}
?>