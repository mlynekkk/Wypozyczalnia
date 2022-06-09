<?php

class EditVinyl extends Controller {
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $plyta=$this->vinylModel->getVinylByID($_GET['id_plyta']);
        $this->view('editVinyl', compact('plyta','kategorie'));

    }
    public function EditVinyl($id_plyta)
    {
        $blad=false;
        $frProduct=new stdClass;
        $frProduct->id_plyta=$id_plyta;

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
            $frProduct->id_kategoria=$_POST['kategoria'];
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

        if(isset($_FILES['img'])&& !empty( $_FILES["img"]["name"] ))
        {
            $image = $_FILES['img']["tmp_name"];
            if($image){
                $imgContent = file_get_contents($image); 
                
            }
            $frProduct->image=$imgContent;
            
        }
        else
        {
            //$blad=true;
            $plyta=$this->vinylModel->getVinylByID($id_plyta);
            array('plyta'=>$plyta);
            $frProduct->image=$plyta->image;
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
                
                $this->adminModel->updateProduct($frProduct);
                echo "dodano produkt";
           
            
        }
        header('location:'.URLROOT.'/tabVinyls' );


    }


}
?>