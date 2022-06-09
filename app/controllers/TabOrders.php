<?php

class TabOrders extends Controller {
    public function __construct()
    {
        $this->vinylModel = $this->model('VinylModel');
        $this->adminModel = $this->model('AdminModel');
        $this->orderModel = $this->model('OrderModel');
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
        $orders=$this->orderModel->getAllOrders($sortType);
        $this->view('tabOrders',compact('orders','kategorie'));

    }

    

    public function updateStatusOrder()
    {
        $status=$_POST['status'];
        $plytaID=$_POST['id_plyta'];
        $orderID=$_POST['id_wypozyczenie'];
        $this->orderModel->updateStatusOrder($status,$orderID);
        $this->adminModel->updateStatusProduct($status,$plytaID);
        header("Location: ".URLROOT."/tabOrders");
        exit();
    }

    public function DeleteOrder($order,$plytaID)
    {
        $this->orderModel->deleteOrder($order);
        $this->adminModel->updateStatusProduct(1,$plytaID);
        header("Location: ".URLROOT."/tabOrders");
        exit();
    }
    
}
?>