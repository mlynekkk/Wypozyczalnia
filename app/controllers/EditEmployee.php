<?php

class EditEmployee extends Controller {
    public function __construct()
    {
        $this->adminModel = $this->model('AdminModel');
        $this->user = $this->model('User');
        $this->vinylModel = $this->model('VinylModel');
        $this->authorizeModel= $this->model('Authorize');
    }
    public function index(){
        $kategorie=$this->vinylModel->getAllKategorie();
        $employee=$this->user->getPracownikByID($_GET['id_pracownik']);
        $this->view('editEmployee', compact('employee','kategorie'));

    }
    public function EditEmployee($id_pracownik)
    {
        $blad=false;
        $has=false;
        $employee=$this->user->getPracownikByID($id_pracownik);
        array('employee'=>$employee);
        $frPracownik=new stdClass;
        $frPracownik->id_pracownik=$id_pracownik;

        if(isset($_POST['login']))
        {
            $frPracownik->login=$_POST['login'];
        }
        else
        {
            $blad=true;
            $frPracownik->login="";
        }

        if(!empty($_POST['haslo']))
        {
            $frPracownik->haslo=password_hash($_POST['haslo'],PASSWORD_DEFAULT);
        }
        else
        {
            //$blad=true;
            $has=true;
        }

        if(!$blad)//ustawiono wszystkie pola
        {
            unset($_SESSION['errorTakenEdit']);
            $result=$this->authorizeModel->getPracownikByLogin($_POST['login']);
               
                echo "update pracownika";
                if ($result==null){
                    $this->adminModel->updateEmployee($frPracownik,$has);
                    echo "update pracownika";
                    header('location:'.URLROOT.'/tabEmployees' );
                }else{
                    $_SESSION['errorTakenEdit']="W bazie danych istnieje już pracownik o tym samym loginie";
                   
                }
           
            
        }
        header('location:'.URLROOT.'/editEmployee?id_pracownik='.$frPracownik->id_pracownik.'' );


    }
}
?>