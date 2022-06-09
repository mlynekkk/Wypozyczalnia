<?php

class MyData extends Controller {
    public function __construct()
    {
        $this->userModel = $this->model('User');
        $this->adminModel = $this->model('AdminModel');
        $this->vinylModel = $this->model('VinylModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $uzytkownik=$_SESSION['userData'];
        $user=$this->userModel->getKlientByID($uzytkownik->id_klient);
        $this->view('myData',compact('user','kategorie'));
    }

}
?>