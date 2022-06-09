<?php
    class OrderModel{
        private $db;
        public function __construct()
        {
            $this->db = new Database;
        }
        public function addOrder($id_plyta,$uzytkownik){
            $query='INSERT INTO wypozyczenia (id_wypozyczenie, id_klient, id_plyta, data_wypozyczenia, termin_oddania, data_oddania, status) 
            VALUES (NULL,:id_klient,:id_plyta,:data_wypozyczenia, :termin_oddania, NULL, 0)';
            $this->db->query($query);
            $this->db->bind(':id_klient',$uzytkownik);
            $this->db->bind(':id_plyta',$id_plyta);
            $currentDate=date("Y-m-d h:i:s");
            $this->db->bind(':data_wypozyczenia',$currentDate);
            $future_timestamp = strtotime("+1 month");
            $termin = date('Y-m-d', $future_timestamp);
            $this->db->bind(':termin_oddania',$termin);
            $this->db->execute();
            
        }

        public function getAllOrders($sortType){
            $query='SELECT *  FROM wypozyczenia ORDER BY :sortType ASC';
            $this->db->query($query);
            $this->db->bind(':sortType',$sortType);
            $result=$this->db->resultSet();
            return $result;
        }

        public function getAllOrdersById($sortType,$userID){
            $query='SELECT p.image, p.tytul, w.data_wypozyczenia, w.termin_oddania, w.data_oddania, w.status, w.id_wypozyczenie  FROM wypozyczenia w INNER JOIN plyty p  ON w.id_plyta=p.id_plyta WHERE w.id_klient=:id_klient ORDER BY :sortType ASC';
            $this->db->query($query);
            $this->db->bind(':id_klient',$userID);
            $this->db->bind(':sortType',$sortType);
            $result=$this->db->resultSet();
            return $result;
        }

        public function updateStatusOrder($status, $idOrder){
            $query="UPDATE wypozyczenia SET status=:status, data_oddania=:data_oddania WHERE id_wypozyczenie=:id_wypozyczenie";
            $this->db->query($query);
            $this->db->bind(':status',$status);
            $this->db->bind(':id_wypozyczenie',$idOrder);
            if($status==1){
                $currentDate=date("Y-m-d h:i:s");
                $this->db->bind(':data_oddania',$currentDate);
            }else{
                $this->db->bind(':data_oddania',NULL);
            }
            $this->db->execute();
        }

        public function deleteOrder($order){
            $query='DELETE FROM `wypozyczenia` WHERE id_wypozyczenie=:id_wypozyczenia';
            $this->db->query($query);
            $this->db->bind(':id_wypozyczenia',$order);
            $result=$this->db->resultSet();
            return $result;
        }

    }
?>