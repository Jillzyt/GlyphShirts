<?php
    class Pages extends Controller {
        public function __construct(){
            
        }

        public function index(){
            if (isLoggedIn()){
                redirect('/shirts');
            }

            //echo 'Pages loaded';
            // $this->postModel = $this->model('Post');
            // $posts = $this->postModel->getPosts();
            $data = ['title' => 'Welcome',
            'description' => 'Glpyh Shirts is an application to manage the shirts inventory.'

        ];

            
            $this->view('pages/index', $data);
        }
        public function about(){
            $data = ['title' => 'About',
            'description' => 'App to manage shirts'];
            $this->view('pages/about',$data);
        }
    }