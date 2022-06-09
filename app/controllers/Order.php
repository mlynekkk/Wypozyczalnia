<?php

class Order extends Controller {
    public function __construct()
    {
        $this->vinylModel = $this->model('VinylModel');
        $this->orderModel = $this->model('OrderModel');
        $this->adminModel = $this->model('AdminModel');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $plyta = $this->vinylModel->getVinylByID($_POST['plyta']);
        $this->view('order',compact('plyta','kategorie'));

    }

    public function OrderRealize()
    {
        
        $id_plyta=$_GET['plyta'];
        $uzytkownik=$_SESSION['userData'];
        $this->orderModel->addOrder($id_plyta,$uzytkownik->id_klient);
        echo var_dump($id_plyta);
        $this->adminModel->updateStatusProduct(0,$id_plyta);
        header("Location: ".URLROOT."/profileCustomer");
        exit();
    }
    

    
}
?>