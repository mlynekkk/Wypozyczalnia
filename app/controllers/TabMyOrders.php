<?php

class TabMyOrders extends Controller {
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
        $uzytkownik=$_SESSION['userData'];
        $orders=$this->orderModel->getAllOrdersById($sortType,$uzytkownik->id_klient);
        $this->view('tabMyOrders',compact('orders','kategorie'));

    }
    
}
?>