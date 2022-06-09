<?php

class Index extends Controller {
    public function __construct()
    {
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        if(isset($_GET['group'])){
            $plyty=$this->vinylModel->getGroupedVinyls($_GET['group']);
        }else{
            $plyty=$this->vinylModel->getAllVinyls();
        }
        $this->view('index',compact('plyty','kategorie'));

    }


    public function logout(){
        session_unset();
        header("Location: ".URLROOT);
        exit();
    }
    

}
?>