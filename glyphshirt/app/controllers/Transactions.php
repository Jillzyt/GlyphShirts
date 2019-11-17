<?php
    class Transactions extends Controller {
        public function __construct(){
            $this->transactionModel = $this->model('Transaction');
        }

        public function index(){
            // Check for POST
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                // Process form

                // Sanitize POST data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                // Init data
                $data = [
                    'search' => trim($_POST['search']),
                    'searchValue' => trim($_POST['searchValue']),
                    'search_err' => '',
                    'searchValue_err' => '',
                ];

                // Validate username
                if (empty($data['search']) && $data['search'] == 'Choose...'){
                    $data['search_err'] = 'Please select the filter';
                }


                if (empty($data['searchValue'])){
                    $data['searchValue_err'] = 'Please enter your search';
                }

                // Make sure errors are empty
                if(empty($data['searchValue_err']) && empty($data['search_err'])){
                    if ($data['search'] == 'color'){
                        $transactions = $this->transactionModel->getTransactionsByColor($data['searchValue']);
                    }
                    if ($data['search'] == 'member_volunteer'){
                        $transactions = $this->transactionModel->getTransactionsByMv($data['searchValue']);
                    }
                    if ($data['search'] == 'date_distributed'){
                        $date = date("Y-m-d",strtotime(trim($data['searchValue'])));
                        $transactions = $this->transactionModel->getTransactionsBydD($date);
                    }
                    if ($data['search'] == 'date_paid'){
                        $date = date("Y-m-d",strtotime(trim($data['searchValue'])));
                        $transactions = $this->transactionModel->getTransactionsBydP($date);
                    }

                    if ($data['search'] == 'date_accounted'){
                        $date = date("Y-m-d",strtotime(trim($data['searchValue'])));
                        $transactions = $this->transactionModel->getTransactionsBydA($date);
                    }
                    
                    if (empty($transactions)){
                        $transactions = $this->transactionModel->getTransactions();
                        $data = [
                            'transactions' => $transactions,
                            'search_err' => '',
                            'searchValue_err' => '',
                            'search' => '',
                            'searchValue' => ''
                        ];
                        flash('search_failure', "Can't search for the records","alert alert-danger");
                        $this->view('transactions/index',$data);
                    }

                    $data = [
                        'transactions' => $transactions,
                        'search' => trim($_POST['search']),
                        'searchValue' => trim($_POST['searchValue']),
                        'search_err' => '',
                        'searchValue_err' => '',
                    ];
                    $this->view('transactions/index', $data);
                }
                else {
                        $transactions = $this->transactionModel->getTransactions();

                        $data = [
                            'transactions' => $transactions,
                            'search' => '',
                            'searchValue' => '',
                            'search_err' => '',
                            'searchValue_err' => ''
                        ];
                        flash('search_failure', "Fields are not filled","alert alert-danger");
                        $this->view('transactions/index',$data);
                    }
            }
            else {
                // Load data
                $transactions = $this->transactionModel->getTransactions();
                $data = [
                    'transactions' => $transactions,
                    'search' => '',
                    'searchValue' => '',
                    'search_err' => '',
                    'searchValue_err' => ''
                ];

                // Load view
                $this->view('transactions/index', $data);
            }
        }

        public function export(){
			$filename = 'users_'.date('Ymd').'.csv'; 
			header("Content-Description: File Transfer"); 
			header("Content-Disposition: attachment; filename=$filename"); 
			header("Content-Type: application/csv; ");
			$transactions = $this->transactionModel->getTransactions();
            $file = fopen('php://output','w');
			$eh = array("ID","Name", "Member/Volunteer", "Size", "Quantity","SDR","Date Distributed","Date Paid","Date Accounted","Remarks","Add By","Modified By","Color"); 
			fputcsv($file, $eh);
			foreach ($transactions as $transaction){
                $array = [];
                foreach ($transaction as $key=>$value){
                    array_push($array,$value);
                }
                fputcsv($file,$array);
			}
			fclose($file); 
			exit; 
	}
    }