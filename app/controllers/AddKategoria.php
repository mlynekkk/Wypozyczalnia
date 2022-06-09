<?php

class AddKategoria extends Controller {
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->user = $this->model('User');
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $this->view('addKategoria',array('kategorie'=>$kategorie));

    }
    public function AddKategoria()
    {
        $blad=false;
        $frKategoria=new stdClass;

        if(isset($_POST['nazwa']))
        {
            $frKategoria->nazwa=$_POST['nazwa'];
        }
        else
        {
            $blad=true;
            $frKategoria->nazwa="";
        }

        if(!$blad)//ustawiono wszystkie pola
        {
           
                $this->adminModel->addKategoria($frKategoria);
                echo "dodano kategorie";
           
            
        }
        header('location:'.URLROOT.'/profileAdmin' );


    }


}
?>