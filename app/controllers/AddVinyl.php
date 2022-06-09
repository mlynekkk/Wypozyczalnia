<?php

class AddVinyl extends Controller {
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $this->view('addVinyl',array('kategorie'=>$kategorie));

    }
    public function AddVinyl()
    {
        $blad=false;
        $frProduct=new stdClass;

        if(isset($_POST['tytul']))
        {
            $frProduct->tytul=$_POST['tytul'];
        }
        else
        {
            $blad=true;
            $frProduct->tytul="";
        }

        if(isset($_POST['wytwornia']))
        {
            $frProduct->wytwornia=$_POST['wytwornia'];
        }
        else
        {
            $blad=true;
            $frProduct->wytwornia="";
        }

        if(isset($_POST['wykonawca']))
        {
            $frProduct->wykonawca=$_POST['wykonawca'];
        }
        else
        {
            $blad=true;
            $frProduct->wykonawca="";
        }

        if(isset($_POST['kategoria']))
        {
            $frProduct->kategoria=$_POST['kategoria'];
        }
        else
        {
            $blad=true;
            $frProduct->kategoria="";
        }

        if(isset($_POST['cena']))
        {
            $frProduct->cena=$_POST['cena'];
        }
        else
        {
            $blad=true;
            $frProduct->cena="";
        }

        if(isset($_FILES['img']))
        {
            $image = $_FILES['img']["tmp_name"];
            if($image){
                $imgContent = file_get_contents($image); 
            }
            $frProduct->image=$imgContent;
        }
        else
        {
            $blad=true;
            $frProduct->image="";
        }

        if(isset($_POST['opis']))
        {
            $frProduct->opis=$_POST['opis'];
        }
        else
        {
            $blad=true;
            $frProduct->opis="";
        }

        if(!$blad)//ustawiono wszystkie pola
        {
           
                $this->adminModel->saveProduct($frProduct);
                echo "dodano produkt";
           
            
        }
        header('location:'.URLROOT.'/profileAdmin' );


    }


}
?>