<?php
    namespace Controllers;
    use System\Controller;

    class Welcome extends Controller{
        public function index(){
            $this->view->render("login");
        }
    }