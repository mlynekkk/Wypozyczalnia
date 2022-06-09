<?php

class ProfileAdmin extends Controller {
    public function __construct()
    {
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        if (!isset($_SESSION['pracownikData']) )
        {
            header("Location: " . URLROOT );
            exit();
        }
        $kategorie=$this->vinylModel->getAllKategorie();
        $this->view('profileAdmin',array('kategorie'=>$kategorie));

    }

}
?>