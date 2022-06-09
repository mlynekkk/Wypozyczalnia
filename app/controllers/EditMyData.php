<?php

class EditMyData extends Controller {
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->userModel = $this->model('User');
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $user=$this->userModel->getKlientByID($_GET['id_klient']);
        $this->view('editMyData', compact('user','kategorie'));

    }
    public function EditMyData($id_klient)
    {
        $blad=false;
        $has=false;
        $user=$this->userModel->getKlientByID($id_klient);
        array('user'=>$user);
        $frKlient=new stdClass;
        $frKlient->id_klient= $id_klient;

        if(!empty($_POST['login']))
        {
            $frKlient->login=$_POST['login'];
        }
        else
        {
            $blad=true;
        }

        if(!empty($_POST['imie']))
        {
            $frKlient->imie=$_POST['imie'];
        }
        else
        {
            $frKlient->imie=NULL;
        }

        if(!empty($_POST['nazwisko']))
        {
            $frKlient->nazwisko=$_POST['nazwisko'];
        }
        else
        {
            $frKlient->nazwisko=NULL;
        }

        if(!empty($_POST['number']))
        {
            $frKlient->number=$_POST['number'];
        }
        else
        {
            $frKlient->number=NULL;
        }

        if(!$blad)//ustawiono wszystkie pola
        {
           
                $this->adminModel->updateCustomer($frKlient);
                echo "update klient";
           
            
        }
        header('location:'.URLROOT.'/myData' );


    }


}
?>