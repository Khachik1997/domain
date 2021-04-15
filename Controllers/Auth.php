<?php

namespace Controllers;
use Models\User;
use System\Controller;


class Auth extends Controller
{

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty($_POST["email"])) {
                $this->view->errorEmail = "Email can't be empty";
            } else {
                if (empty($_POST["password"])) {
                    $this->view->errorPassword = "Password can't be empty";

                } else {
                    $user = new User;
                    $result = $user->login($_POST["email"], $_POST["password"]);
                    $userId = $result["id"];
                    if($userId){
                        $_SESSION['userId'] = $userId;
                        header("Location:/account");
                    }else{
                        echo "something Wrong";
                    }
                }
            }
        }
        $this->view->render("login");
    }

    public function register()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (empty($_POST["email"])) {

                $this->view->errorEmail = "Email can't be empty";
            } else {
                if (empty($_POST["password"])) {

                    $this->view->errorPassword = "Password can't be empty";
                } else {
                    $user = new User;
                    if ($user->create($_POST)) {
                        header("Location:/auth/login");
                    } else {
                        $this->view->regError = "Email has already used";
                    }
                }
            }
        }
        $this->view->render("register");
    }


    public function logout(){
        session_start();
        session_destroy();
        header("location:/auth/login");
    }


}

