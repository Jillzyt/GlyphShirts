<?php
    class Transaction {
        private $db;
        public function __construct(){
            $this->db = new Database;

        }

        public function getTransactions(){
            $this->db->query("Select * 
                            FROM transactions "
                            );

            $results= $this->db->resultSet();
            return $results;
        }

        public function getTransactionsByColor($searchValue){

            $this->db->query("Select * 
            FROM transactions WHERE color = :filterValue"
            );
            $this->db->bind(':filterValue', $searchValue);
            $results= $this->db->resultSet();
            return $results;
        }

        public function getTransactionsByMv($searchValue){
            $this->db->query("Select * 
            FROM transactions WHERE member_volunteer = :filterValue"
            );
            $this->db->bind(':filterValue', $searchValue);
            $results= $this->db->resultSet();
            return $results;
        }

        public function getTransactionsBydD($searchValue){
            $this->db->query("Select * 
            FROM transactions WHERE date_distributed = :filterValue"
            );
            $this->db->bind(':filterValue', $searchValue);
            $results= $this->db->resultSet();
            return $results;
        }

        public function getTransactionsBydP($searchValue){
            $this->db->query("Select * 
            FROM transactions WHERE date_paid = :filterValue"
            );
            $this->db->bind(':filterValue', $searchValue);
            $results= $this->db->resultSet();
            return $results;
        }

        public function getTransactionsBydA($searchValue){
            $this->db->query("Select * 
            FROM transactions WHERE date_accounted = :filterValue"
            );
            $this->db->bind(':filterValue', $searchValue);
            $results= $this->db->resultSet();
            return $results;
        }

        public function addTransactions($data){
            $this->db->query('INSERT INTO transactions 
            (name,member_volunteer,size,quantity,sold_distributed,date_distributed,remarks,added_by,updated_by,color) VALUES(:name,:mv,:size,:quantity,:soldDistributed,:dateDistributed,:remarks,:addedBy,:updatedBy,:color)');
            $this->db->bind(':name',$data['name']);
            $this->db->bind(':mv',$data['mv']);
            $this->db->bind(':size',$data['size']);
            $this->db->bind(':quantity',$data['quantity']);
            $this->db->bind(':soldDistributed',$data['soldDistributed']);
            $this->db->bind(':dateDistributed',$data['dateDistributed']);
            $this->db->bind(':remarks',$data['remarks']);
            $this->db->bind(':addedBy',$data['addedBy']);
            $this->db->bind(':updatedBy',$data['updatedBy']);
            $this->db->bind(':color',$data['color']);

            // Execute 
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }


    }