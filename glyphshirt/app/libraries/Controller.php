<?php
    /*
    * Base Controller
    * Loads the models and views
    */

    class Controller {
        // Load models
        public function model($model){
            // Require model file
            require_once '../app/models/'. $model . '.php';

            // Instatiate the model
            return new $model();
        }
        
        // Load views 
        // View 
        // Data - Dynamic data that is passed in through view
        public function view($view, $data = []){
            //check for view file
            if (file_exists('../app/views/'. $view . '.php')) {
                require_once '../app/views/'. $view . '.php';
            }
            else {
                die('View does not exist');
            }

        }
    }