<?php
    class Authorize{
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }
        public function getUserByEmail($email){
            $query='SELECT * FROM klienci WHERE email = :email';
            $this->db->query($query);
            $this->db->bind(':email',$email);
            $result=$this->db->single();
            return $result;
        }

        public function getPracownikByLogin($login){
            $query='SELECT * FROM pracownicy WHERE login = :login';
            $this->db->query($query);
            $this->db->bind(':login',$login);
            $result=$this->db->single();
            return $result;
        }
    }
?>