<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getKlient()
    {
        $this->db->query("SELECT * FROM klienci");
        $result = $this->db->resultSet();
        return $result;
    }
    public function createKlient()
    {
        $query = "INSERT INTO klienci (id_klient,login, haslo, email, imie, nazwisko, number) 
            VALUES (null,:login, :haslo, :email, NULL,NULL,NULL);";
        $this->db->query($query);
        $this->db->bind(':login', $_POST['login']);
        $hashedPassword = password_hash($_POST['haslo'], PASSWORD_DEFAULT);
        $this->db->bind(':haslo', $hashedPassword);
        $this->db->bind(':email', $_POST['email']);
        $this->db->execute();
        //Zbindowac zmienne do zapytania.
    }

    public function getGroupedOrers($group)
    {
        $query = 'SELECT * FROM plyty WHERE id_kategoria=:group';
        $this->db->query($query);
        $this->db->bind(':group', $group);
        $result = $this->db->resultSet();
        return $result;
    }


    public function getPracownikByID($id_pracownik)
    {
        $query = 'SELECT * FROM pracownicy WHERE id_pracownik = :id_pracownik';
        $this->db->query($query);
        $this->db->bind(':id_pracownik', $id_pracownik);
        $result = $this->db->single();
        return $result;
    }

    public function getKlientByID($id_klient)
    {
        $query = 'SELECT * FROM klienci WHERE id_klient = :id_klient';
        $this->db->query($query);
        $this->db->bind(':id_klient', $id_klient);
        $result = $this->db->single();
        return $result;
    }

    public function deleteEmployee($id_pracownik)
    {
        $query = 'DELETE FROM `pracownicy` WHERE id_pracownik=:id_pracownik';
        $this->db->query($query);
        $this->db->bind(':id_pracownik', $id_pracownik);
        $result = $this->db->resultSet();
        return $result;
    }

    public function deleteCustomer($id_klient)
    {
        $query = 'DELETE FROM `klienci` WHERE id_klient=:id_klient';
        $this->db->query($query);
        $this->db->bind(':id_klient', $id_klient);
        $result = $this->db->resultSet();
        return $result;
    }
}
