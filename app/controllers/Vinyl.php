<?php

class Vinyl extends Controller {
    public function __construct()
    {
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $plyta = $this->vinylModel->getVinylByID($_GET['id_plyta']);
        $this->view('vinyl',compact('plyta','kategorie'));

    }


}
?>