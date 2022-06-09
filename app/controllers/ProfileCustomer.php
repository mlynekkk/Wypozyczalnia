<?php

class ProfileCustomer extends Controller {
    public function __construct()
    {
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $this->view('profileCustomer',array('kategorie'=>$kategorie));

    }

}
?>