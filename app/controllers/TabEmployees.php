<?php

class TabEmployees extends Controller {
    public function __construct()
    {
        $this->vinylModel = $this->model('VinylModel');
        $this->adminModel = $this->model('AdminModel');
        $this->userModel = $this->model('User');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        if(isset($_GET['sortType']))
        {
            $sortType=$_GET['sortType'];
        }else
        {
            $sortType="id_pracownik";
        }
        $employees=$this->adminModel->getAllEmployees($sortType);
        $this->view('tabEmployees',compact('employees','kategorie'));

    }

    public function updateRole()
    {
        $rola=$_POST['rola'];
        $pracownikID=$_POST['id_pracownik'];
        $this->adminModel->updateRoleEmployee($rola,$pracownikID);
        header("Location: ".URLROOT."/tabEmployees");
        exit();
    }

    public function deleteEmployee($id_pracownik){
        $this->userModel->deleteEmployee($id_pracownik);
        header("Location: ".URLROOT."/tabEmployees");
        exit();
    }


}
?>