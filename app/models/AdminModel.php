<?php
class AdminModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function saveProduct($plyta)
    {
        $query = "INSERT INTO plyty (id_plyta,id_kategoria,tytul,wytwornia,wykonawca,opis,cena,status,image)
            VALUES (NULL, :kategoria, :tytul, :wytwornia, :wykonawca, :opis, :cena, 0, :image);";
        $this->db->query($query);
        $this->db->bind(':kategoria', $plyta->kategoria);
        $this->db->bind(':tytul', $plyta->tytul);
        $this->db->bind(':wytwornia', $plyta->wytwornia);
        $this->db->bind(':wykonawca', $plyta->wykonawca);
        $this->db->bind(':opis', $plyta->opis);
        $this->db->bind(':cena', $plyta->cena);
        $this->db->bind(':image', $plyta->image);
        $this->db->execute();
        return $this->db->lastInsertId();
    }

    public function updateProduct($plyta)
    {
        $query = "UPDATE plyty SET id_kategoria=:kategoria,tytul=:tytul,wytwornia=:wytwornia,wykonawca=:wykonawca,opis=:opis,cena=:cena,image=:image WHERE id_plyta=:id_plyta";
        $this->db->query($query);
        $this->db->bind(':kategoria', $plyta->id_kategoria);
        $this->db->bind(':tytul', $plyta->tytul);
        $this->db->bind(':wytwornia', $plyta->wytwornia);
        $this->db->bind(':wykonawca', $plyta->wykonawca);
        $this->db->bind(':opis', $plyta->opis);
        $this->db->bind(':cena', $plyta->cena);
        $this->db->bind(':image', $plyta->image);
        $this->db->bind(':id_plyta', $plyta->id_plyta);
        $this->db->execute();
    }

    public function updateCustomer($frKlient)
    {

        $query = "UPDATE klienci SET login=:login, imie=:imie, nazwisko=:nazwisko, number=:number WHERE id_klient=:id_klient";
        $this->db->query($query);
        $this->db->bind(':login', $frKlient->login);
        $this->db->bind(':imie', $frKlient->imie);
        $this->db->bind(':nazwisko', $frKlient->nazwisko);
        $this->db->bind(':number', $frKlient->number);
        $this->db->bind(':id_klient', $frKlient->id_klient);
        $this->db->execute();
    }
    
    public function updateCustomerPassword($frKlient)
    {
        $query = "UPDATE klienci SET haslo=:haslo WHERE id_klient=:id_klient";
        $this->db->query($query);
        $this->db->bind(':haslo', $frKlient->haslo);
        $this->db->bind(':id_klient', $frKlient->id_klient);
        $this->db->execute();
    }


    public function updateEmployee($employee, $has)
    {
        if (!$has) {
            $query = "UPDATE pracownicy SET login=:login,haslo=:haslo WHERE id_pracownik=:id_pracownik";
            $this->db->query($query);
            $this->db->bind(':login', $employee->login);
            $this->db->bind(':haslo', $employee->haslo);
            $this->db->bind(':id_pracownik', $employee->id_pracownik);
        } else {
            $query = "UPDATE pracownicy SET login=:login WHERE id_pracownik=:id_pracownik";
            $this->db->query($query);
            $this->db->bind(':login', $employee->login);
            $this->db->bind(':id_pracownik', $employee->id_pracownik);
        }

        $this->db->execute();
    }

    public function updateCustomerByAdmin($user, $has)
    {
        if (!$has) {
            $query = "UPDATE klienci SET login=:login, email=:email, haslo=:haslo WHERE id_klient=:id_klient";
            $this->db->query($query);
            $this->db->bind(':login', $user->login);
            $this->db->bind(':email', $user->email);
            $this->db->bind(':haslo', $user->haslo);
            $this->db->bind(':id_klient', $user->id_klient);
        } else {
            $query = "UPDATE klienci SET login=:login, email=:email WHERE id_klient=:id_klient";
            $this->db->query($query);
            $this->db->bind(':login', $user->login);
            $this->db->bind(':email', $user->email);
            $this->db->bind(':id_klient', $user->id_klient);
        }

        $this->db->execute();
    }

    public function addEmployee($employee)
    {
        $query = "INSERT INTO pracownicy (login,haslo,id_rola) VALUES (:login,:haslo,2)";
        $this->db->query($query);
        $this->db->bind(':login', $employee->login);
        $this->db->bind(':haslo', $employee->haslo);
        $this->db->execute();
    }

    public function addKategoria($kategoria)
    {
        $query = "INSERT INTO kategorie (nazwa) VALUES (:nazwa)";
        $this->db->query($query);
        $this->db->bind(':nazwa', $kategoria->nazwa);
        $this->db->execute();
    }


    public function getAllVinyls($sortType)
    {
        $query = 'SELECT *  FROM plyty ORDER BY :sortType ASC';
        $this->db->query($query);
        $this->db->bind(':sortType', $sortType);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getAllCustomers($sortType)
    {
        $query = 'SELECT *  FROM klienci ORDER BY :sortType ASC';
        $this->db->query($query);
        $this->db->bind(':sortType', $sortType);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getAllEmployees($sortType)
    {
        $query = 'SELECT *  FROM pracownicy ORDER BY :sortType ASC';
        $this->db->query($query);
        $this->db->bind(':sortType', $sortType);
        $result = $this->db->resultSet();
        return $result;
    }

    public function updateStatusProduct($status, $productID)
    {
        $query = "UPDATE plyty SET status=:status WHERE id_plyta=:productID";
        $this->db->query($query);
        $this->db->bind(':status', $status);
        $this->db->bind(':productID', $productID);
        $this->db->execute();
    }

    public function updateRoleEmployee($rola, $pracownikID)
    {
        $query = "UPDATE pracownicy SET id_rola=:rola WHERE id_pracownik=:pracownikID";
        $this->db->query($query);
        $this->db->bind(':rola', $rola);
        $this->db->bind(':pracownikID', $pracownikID);
        $this->db->execute();
    }
}
