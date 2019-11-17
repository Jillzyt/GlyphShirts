<?php
    class Shirts extends Controller {
        public function __construct(){
            $this->shirtModel = $this->model('Shirt');
            $this->transactionModel = $this->model('Transaction');
        }

        public function index() {
            $shirts = $this->shirtModel->getShirts();

            $data = [
                'shirts' => $shirts
            ];
            $this->view('shirts/index', $data);
        }

        public function add(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                $data = [
                    'color' => trim($_POST['color']),
                    'size' => trim($_POST['size']),
                    'quantity' => trim($_POST['quantity']),
                    'color_err' => '',
                    'size_err' => '',
                    'quantity_err' => '',
                ];
                if (empty($data['quantity'])){
                    $data['quantity_err'] = 'Please enter quantity';
                }
                
                if (empty($data['color'] || $data['color'] == "Choose...")){
                    $data['color_err'] = 'Please select a color';
                }

                if (empty($data['size'] || $data['size'] == "Choose...")){
                    $data['size_err'] = 'Please select a size';
                }

                if (empty($data['color_err']) && empty($data['size_err']) && empty($data['quantity_err'])){
                    // Validated
                    if($this->shirtModel->addShirts($data)){
                        $data = [
                            'name' => 'Add new shirts',
                            'mv' => 'nil',
                            'size' => $data['size'],
                            'color' => $data['color'],
                            'quantity' => $data['quantity'],
                            'soldDistributed' => 'NULL',
                            'dateDistributed' => date("Y-m-d H:i:s"),
                            'datePaid' => 'NULL',
                            'remarks' =>'Add new shirts',
                            'addedBy' => $_SESSION['user_username'],
                            'updatedBy' => $_SESSION['user_username'],
                        ];
                        if ($this->transactionModel->addTransactions($data)){
                            redirect('/shirts');
                        }
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('shirts/add', $data);
                }

            } else {

                $data = [
                    'quantity' => '',
                    'quantity_err' => '',
                    'color_err' => '',
                    'size_err' => '',
                    'quantity_err' => '',
                    'color' => '',
                    'size' => '',
                ];

                $this->view('shirts/add', $data);
            }
        }

        public function issue(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                $data = [
                    'color' => trim($_POST['color']),
                    'size' => trim($_POST['size']),
                    'quantity' => trim($_POST['quantity']),
                    'color_err' => '',
                    'size_err' => '',
                    'quantity_err' => '',
                    'name' => trim($_POST['name']),
                    'name_err' => '',
                    'mv' => trim($_POST['mv']),
                    'sd' => trim($_POST['sd']),
                    'dateDistributed' => date("Y-m-d",strtotime(trim($_POST['dateDistributed']))),
                    'datePaid' => date("Y-m-d",strtotime(trim($_POST['datePaid']))),
                    'remarks' => trim($_POST['remarks']),
                ];

                if (empty($data['quantity'])){
                    $data['quantity_err'] = 'Please enter quantity';
                }
                
                if (empty($data['color'] || $data['color'] == "Choose...")){
                    $data['color_err'] = 'Please select a color';
                }

                if (empty($data['size'] || $data['size'] == "Choose...")){
                    $data['size_err'] = 'Please select a size';
                }

                if (empty($data['color_err']) && empty($data['size_err']) && empty($data['quantity_err'])){
                    // Validated
                    if($this->shirtModel->deleteShirts($data)){
                        $data = [
                            'name' => $data['name'],
                            'mv' => $data['mv'],
                            'color' => $data['color'],
                            'size' => $data['size'],
                            'quantity' => $data['quantity'],
                            'soldDistributed' => $data['sd'],
                            'dateDistributed' => date("Y-m-d",strtotime(trim($_POST['dateDistributed']))),
                            'datePaid' => date("Y-m-d",strtotime(trim($_POST['datePaid']))),
                            'remarks' => $data['remarks'],
                            'addedBy' => $_SESSION['user_username'],
                            'updatedBy' => $_SESSION['user_username']
                        ];
                        if ($this->transactionModel->addTransactions($data)){
                            redirect('/shirts');
                        }
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('shirts/add', $data);
                }

            } else {

                $data = [
                    'quantity' => '',
                    'quantity_err' => '',
                    'color_err' => '',
                    'size_err' => '',
                    'quantity_err' => '',
                    'color' => '',
                    'size' => '',
                    'name' => '',
                    'name_err' => '',
                    'mv' => '',
                    'mv_err' => '',
                    'sd' => '',
                    'sd_err' => '',
                    'dateDistributed' => '',
                    'dateDistributed_err' => '',
                    'datePaid' => '',
                    'datePaid_err' => '',
                    'remarks' => '',
                    'remarks_err' => '',

                ];

                $this->view('shirts/return', $data);
            }
        }


        public function return(){

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Sanitize POST array
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
                $data = [
                    'color' => trim($_POST['color']),
                    'size' => trim($_POST['size']),
                    'quantity' => trim($_POST['quantity']),
                    'color_err' => '',
                    'size_err' => '',
                    'quantity_err' => '',
                    'name' => trim($_POST['name']),
                    'name_err' => '',
                    'mv' => trim($_POST['mv']),
                    'sd' => "Return",
                    'dateDistributed' => date("Y-m-d",strtotime(trim($_POST['dateDistributed']))),
                    'remarks' => trim($_POST['remarks']),
                ];

                if (empty($data['quantity'])){
                    $data['quantity_err'] = 'Please enter quantity';
                }
                
                if (empty($data['color'] || $data['color'] == "Choose...")){
                    $data['color_err'] = 'Please select a color';
                }

                if (empty($data['size'] || $data['size'] == "Choose...")){
                    $data['size_err'] = 'Please select a size';
                }

                if (empty($data['color_err']) && empty($data['size_err']) && empty($data['quantity_err'])){
                    // Validated
                    if($this->shirtModel->addShirts($data)){
                        $data = [
                            'name' => $data['name'],
                            'mv' => $data['mv'],
                            'size' => $data['size'],
                            'quantity' => $data['quantity'],
                            'color' => $data['color'],
                            'soldDistributed' => "Return",
                            'dateDistributed' => date("Y-m-d",strtotime(trim($_POST['dateDistributed']))),
                            'remarks' => $data['remarks'],
                            'addedBy' => $_SESSION['user_username'],
                            'updatedBy' => $_SESSION['user_username']
                        ];
                        if ($this->transactionModel->addTransactions($data)){
                            redirect('/shirts');
                        }
                    } else {
                        die('Something went wrong');
                    }
                } else {
                    // Load view with errors
                    $this->view('shirts/return', $data);
                }

            } else {

                $data = [
                    'quantity' => '',
                    'quantity_err' => '',
                    'color_err' => '',
                    'size_err' => '',
                    'quantity_err' => '',
                    'color' => '',
                    'size' => '',
                    'name' => '',
                    'name_err' => '',
                    'mv' => '',
                    'mv_err' => '',
                    'dateDistributed' => '',
                    'dateDistributed_err' => '',
                    'remarks' => '',
                    'remarks_err' => '',

                ];

                $this->view('shirts/return', $data);
            }
        }

    }