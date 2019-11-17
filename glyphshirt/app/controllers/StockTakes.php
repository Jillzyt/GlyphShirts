<?php
    class StockTakes extends Controller {
        public function __construct(){
            $this->stockTakesModel = $this->model('StockTake');
            $this->shirtModel = $this->model('Shirt');
        }

        public function index() {
            $stockTakes = $this->stockTakesModel->getStocks();

            $data = [
                'stockTakes' => $stockTakes
            ];
            $this->view('stockTakes/index', $data);
        }

        public function add() {

        $shirts = $this->shirtModel->getShirts();

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Sanitize POST array
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data['predicted_white'] = '';
            $data['predicted_black'] = '';
            $data['actual_white'] = '';
            $data['actual_black'] = '';
            $shirts = $this->shirtModel->getShirts();

        
            foreach ($shirts as $shirt){
                if ($shirt->color == "White"){
                $data['predicted_white'] = $data['predicted_white'] . $shirt->size. ':' . $_POST['quantity'.$shirt->size. $shirt->color] . ', ';
                $data['actual_white'] = $data['actual_white']  . $shirt->size. ':' . $shirt->quantity. ', ';
                }
                elseif ($shirt->color == "Black") {
                $data['predicted_black'] = $data['predicted_black'] . $shirt->size. ':' . $_POST['quantity'.$shirt->size. $shirt->color] . ', ';
                $data['actual_black'] = $data['actual_black']. $shirt->size. ':' . $shirt->quantity. ', ';
                }
            }

            foreach ($shirts as $shirt){
                $data['quantity'.$shirt->size.$shirt->color] = $shirt->quantity;
                $data['quantity'.$shirt->size.$shirt->color.'_err'] = '';
            }
            
            $data['shirts'] = $shirts;

            if ($this->stockTakesModel->addStockTakes($data)){
                flash('stocktake_success', "Successfully added a stock take");
                $this->view('stockTakes/add',$data);
            }
            else {
                die('Something went wrong');
            }

        } else {


            foreach ($shirts as $shirt){
                $data['quantity'.$shirt->size.$shirt->color] = $shirt->quantity;
                $data['quantity'.$shirt->size.$shirt->color.'_err'] = '';
            }
            $data['shirts'] = $shirts;
            $this->view('stockTakes/add',$data);
        }
    }

    public function export(){
        $filename = 'users_'.date('Ymd').'.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$filename"); 
        header("Content-Type: application/csv; ");
        $stockTakes = $this->stockTakesModel->getStocks();        
        $file = fopen('php://output','w');
        $eh = array("ID","Date Accounted", "Predicted White", "Predicted Black", "Actual White", "Actual Black"); 
        fputcsv($file, $eh);
        foreach ($stockTakes as $stockTake){
            $array = [];
            foreach ($stockTake as $key=>$value){
                array_push($array,$value);
            }
            fputcsv($file,$array);
        }
        fclose($file); 
        exit; 
    }

    
}