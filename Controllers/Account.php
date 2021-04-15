<?php
namespace Controllers;
use System\Controller;
use Models\User;

class Account extends Controller{
    function __construct(){
            parent::__construct();
        if(!isset($_SESSION["userId"])){
            header("Location:/auth/login");
        }
    }




    public function index(){
        $user = new user;
        $userAbout = $user->getUser($user->getSession("userId"));
        $this->view->userName = $userAbout['name'];
        $this->view->userEmail = $userAbout['email'];



        if(isset($_POST['avatar'])){
            $x= $user->db->where("id",$userAbout["id"])->update("user",["avatar"=>$_POST['avatar']]);
            $this->view->userAvatar = $_POST['avatar'];
        }else{

            $this->view->userAvatar = $userAbout['avatar'];
        }

        $this->view->render("account");
    }



}
