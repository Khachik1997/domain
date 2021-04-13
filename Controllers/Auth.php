<?php

namespace Controllers;

use System\Controller;

class Auth extends Controller
{
    public function login()
    {
       $this->validate();
        $this->view->render("login");
    }

    public function register()
    {
        $this->validate();
        $this->view->render("register");

    }

    public function validate(){
        if ($_SERVER["REQUEST_METHOD"] === "POST" ){
            if(empty($_POST["email"])){

                $this->view->errorEmail = "Email can't be empty";
            }else{
                if(empty($_POST["password"])){

                    $this->view->errorPassword = "Password can't be empty";
                }else{
                    var_dump($_POST["password"]);
                    var_dump($_POST["email"]);
                }
            }
        }
    }

}


