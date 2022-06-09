<?php
class VinylModel
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getVinylByID($id_plyta)
    {
        $query = 'SELECT * FROM plyty WHERE id_plyta = :id_plyta';
        $this->db->query($query);
        $this->db->bind(':id_plyta', $id_plyta);
        $result = $this->db->single();
        return $result;
    }
    public function getImageByID($id_plyta)
    {
        $query = 'SELECT image FROM plyty WHERE id_plyta = :id_plyta';
        $this->db->query($query);
        $this->db->bind(':id_plyta', $id_plyta);
        $result = $this->db->resultSet();
        return $result;
    }


    public function getAllVinyls()
    {
        $query = 'SELECT *  FROM plyty WHERE status=1';
        $this->db->query($query);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getAllKategorie()
    {
        $query = 'SELECT *  FROM kategorie';
        $this->db->query($query);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getGroupedVinyls($group)
    {
        $query = 'SELECT * FROM plyty WHERE id_kategoria=:group';
        $this->db->query($query);
        $this->db->bind(':group', $group);
        $result = $this->db->resultSet();
        return $result;
    }


    public function deleteVinyl($id_plyta)
    {
        $query = 'DELETE FROM plyty WHERE id_plyta = :id_plyta';
        $this->db->query($query);
        $this->db->bind(':id_plyta', $id_plyta);
        $result = $this->db->single();
        return $result;
    }
}
