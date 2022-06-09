<?php

class TabCustomers extends Controller {
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
            $sortType="id_klient";
        }
        $customers=$this->adminModel->getAllCustomers($sortType);
        $this->view('tabCustomers',compact('customers','kategorie'));

    }

    public function deleteCustomer($id_klient){
        $this->userModel->deleteCustomer($id_klient);
        header("Location: ".URLROOT."/tabCustomers");
        exit();
    }

}
?>