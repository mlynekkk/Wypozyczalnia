<?php

class TabVinyls extends Controller {
    public function __construct()
    {
        $this->vinylModel = $this->model('VinylModel');
        $this->adminModel = $this->model('AdminModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        if(isset($_GET['sortType']))
        {
            $sortType=$_GET['sortType'];
        }else
        {
            $sortType="id_plyta";
        }
        $plyty=$this->adminModel->getAllVinyls($sortType);
        $this->view('tabVinyls',compact('plyty','kategorie'));

    }

    public function updateStatus()
    {
        $status=$_POST['status'];
        $plytaID=$_POST['id_plyta'];
        $this->adminModel->updateStatusProduct($status,$plytaID);
        header("Location: ".URLROOT."/tabVinyls");
        exit();
    }

    public function DeleteVinyl($id_plyta){
        $this->vinylModel->deleteVinyl($id_plyta);
        header("Location: ".URLROOT."/tabVinyls");
    exit();
    }

}
?>