<?php
namespace System;
class Controller {
    public $view;
    function __construct( $checkSessionId = false){
        session_start();
        $this->view = new View;


        if($checkSessionId){
            if(!isset($_SESSION["userId"])){
                header("Location:/auth/login");
            }
        }

    }
}