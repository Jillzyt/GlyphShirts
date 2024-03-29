<?php
    class Users extends Controller {
        public function __construct(){
            $this->userModel = $this->model('User');
        }

        public function register(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'name_err' => '',
                    'username_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Validate username
                if (empty($data['username'])){
                    $data['username_err'] = 'Please enter your username';
                } else {
                    // Check username
                    if ($this->userModel->findUserByusername($data['username'])){
                        $data['username_err'] = 'username is already taken';
                    }
                }

                if (empty($data['password'])){
                    $data['password_err'] = 'Please enter your password';
                } else if (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Please enter a password longer than 6 characters';
                }

                if (empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please confirm password';
                } else {
                    if ($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords does not match';
                    }
                }

                // Make sure errors are empty
                if(empty($data['username_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
                    // Validated
                    
                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                    // Register
                    if($this->userModel->register($data)){
                        flash('register_success', 'You are registered and can log in');
                        redirect('/users/login');

                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('users/register', $data);
                }
                
            }
            else {
                // Load data
                $data = [
                    'name' => '',
                    'username' => '',
                    'password' => '',
                    'confirm_password' => '',
                    'name_err' => '',
                    'username_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                ];

                // Load view
                $this->view('users/register', $data);
            }
        }

        public function login(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'username' => trim($_POST['username']),
                    'password' => trim($_POST['password']),
                    'username_err' => '',
                    'password_err' => '',
                ];

                // Validate username
                if (empty($data['username'])){
                    $data['username_err'] = 'Please enter your username';
                }

                if (empty($data['password'])){
                    $data['password_err'] = 'Please enter your password';
                } else if (strlen($data['password']) < 6) {
                    $data['password_err'] = 'Please enter a password longer than 6 characters';
                }

                // Check for user/username
                if ($this->userModel->findUserByusername($data['username'])){
                    // User found
                } else {
                    // User not found
                    $data['username_err'] = 'No user found';
                }
                // Make sure errors are empty
                if(empty($data['username_err']) && empty($data['password_err'])){
                    // Validated
                    $loggedInUser = $this->userModel->login($data['username'], $data['password']);

                    if($loggedInUser){
                        //Create Session
                        $this->createUserSession($loggedInUser);
                    } else {
                        $data['password_err'] = 'Password incorrect';

                        $this->view('users/login', $data);
                    }
                    
                } else {
                    // Load view with errors
                    $this->view('users/login', $data);
                }
            }
            else {
                // Load data
                $data = [
                    'username' => '',
                    'password' => '',
                    'username_err' => '',
                    'password_err' => '',
                ];

                // Load view
                $this->view('users/login', $data);
            }
        }

        public function createUserSession($user){
            $_SESSION['user_id'] = $user->id;
            $_SESSION['user_username'] = $user->username;
            redirect('/pages/posts');
        }

        public function logout(){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_username']);
            session_destroy();
            redirect('/users/login');
        }

        public function isLoggedIn(){
            if(isset($_SESSION['user_id'])){
                return true;
            } else {
                return false;
            }
        }
    }