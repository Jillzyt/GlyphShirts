<?php
    class Shirt {
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function getShirts(){
            $this->db->query('Select * 
                            FROM shirts'
                            );

            $results= $this->db->resultSet();
            return $results;
        }

        public function addShirts($data){
            if ($this->getShirtBySizeColor($data['size'],$data['color'])){
                $this->db->query("
                UPDATE shirts SET quantity = quantity + :quantity WHERE size = :size AND color =:color;
                ");
            } else {
                $this->db->query("INSERT INTO shirts (quantity,size,color) VALUES (:quantity,:size,:color)");
            }
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':color', $data['color']);
            $this->db->bind(':size', $data['size']);

            // Execute 
            if ($this->db->execute()){
                return "success";
            } else {
                return false;
            }
        }

        public function deleteShirts($data){
            if ($this->getShirtBySizeColor($data['size'],$data['color'])){
                $this->db->query("
                UPDATE shirts SET quantity = quantity - :quantity WHERE size = :size AND color =:color;
                ");
            } else {
                return false;
            }
            $this->db->bind(':quantity', $data['quantity']);
            $this->db->bind(':color', $data['color']);
            $this->db->bind(':size', $data['size']);

            // Execute 
            if ($this->db->execute()){
                return "success";
            } else {
                return false;
            }
        }

        public function getShirtBySizeColor($size,$color){
            $this->db->query('Select * FROM shirts WHERE color = :color AND size = :size');
            $this->db->bind(':color', $color);
            $this->db->bind(':size', $size);

            $row = $this->db->single();

            return $row;
        }
    }