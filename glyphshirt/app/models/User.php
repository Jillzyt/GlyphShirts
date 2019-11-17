<?php
    class User {
        private $db;
        public function __construct(){
            $this->db = new Database;

        }
        // Register user
        public function register($data){
            $this->db->query('INSERT INTO users (username, password) VALUES(:username,:password)');
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':password', $data['password']);

            // Execute 
            if ($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }
        // Login User
        public function login($username, $password){
            $this->db->query('SELECT * FROM users WHERE username = :username');
            $this->db->bind(':username', $username);

            $row = $this->db->single();

            $hashed_password = $row->password;
            if (password_verify($password,$hashed_password)){
                return $row;
            } else {
                return false;
            }
        }
        // Find user by username
        public function findUserByusername($username){
            $this->db->query('SELECT * FROM users WHERE username = :username');
            // Bind value
            $this->db->bind(':username', $username) ;

            $row = $this->db->single();

            // Check row
            if ($this->db->rowCount() > 0){
                return true;
            } else {
                return false;
            }
        }

        // Find user by id
        public function getUserById($id){
            $this->db->query('SELECT * FROM users WHERE id = :id');
            // Bind value
            $this->db->bind(':id', $id) ;

            $row = $this->db->single();

            // Check row
            if ($this->db->rowCount() > 0){
                return $row;
            } else {
                return false;
            }
        }

    
    }