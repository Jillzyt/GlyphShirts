<?php
    class StockTake {
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function getStocks(){
            $this->db->query('Select * 
                            FROM stockTakes'
                            );

            $results= $this->db->resultSet();
            return $results;
        }

        public function addStockTakes($data){
            $this->db->query('INSERT INTO stockTakes 
            (predicted_white,predicted_black,actual_white,actual_black) VALUES(:pw,:pb,:aw,:ab)');
            $this->db->bind(':pw',$data['predicted_white']);
            $this->db->bind(':pb',$data['predicted_black']);
            $this->db->bind(':aw',$data['actual_white']);
            $this->db->bind(':ab',$data['actual_black']);

            // Execute 
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }
    }