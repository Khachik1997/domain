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

                    if (empty($result)) {
                        $this->view->errorEmail = "Wrong password or email";
                    } else {
                        $userId = $result["id"];
                        if ($userId) {
                            $user->setSession("userId", $userId);
                            header("Location:/account");
                        } else {
                            $this->view->errorEmail = "Wrong password or email";
                        }
                    }
                }

            }
        }
        $this->view->render("login",false);
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
        $this->view->render("register",false);
    }


    public function logout()
    {
        session_start();
        session_destroy();
        header("location:/auth/login");
    }


}

