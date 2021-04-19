<?php
namespace Controllers;
use System\Controller;
use Models\User;
use Helpers\UploadImage;

class Account extends Controller{
    function __construct(){
            parent::__construct();
        if(!isset($_SESSION["userId"])){
            header("Location:/auth/login");
        }
    }

    public function index(){
        $user = new user;

        if($_SERVER['REQUEST_METHOD'] == "POST"){
            if (empty($_FILES)){
                $this->view->uploadError = "File cant be empty";
            }else{
                $uploadObj = new UploadImage();

                $targetDir = "./assets/images/avatar/".$_FILES['avatar']['name'];
                $result = $uploadObj->execute($_FILES,$targetDir);
                if(!$result['success']){
                    $this->view->uploadError = $result['message'];
                }
            }

        }
        $userAbout = $user->getUser($user->getSession("userId"));
        $this->view->userName = $userAbout['name'];
        $this->view->userEmail = $userAbout['email'];
        if($userAbout["avatar"] === "NULL"){
            $this->view->userAvatar = "default.jpg";
        }else{
            $this->view->userAvatar = $userAbout['avatar'];
        }
        $this->view->friendProfile = false;
        $this->view->render("account");
    }

    public function friends (){
        $user =new user;
        $friends = $user->getFriends($user->getSession("userId"));
        if (empty($friends)){
            $this->view->noFriends = "You don't have a friends yet";
            $this->view->areFriends = false;
        }else{
            if(!(array_keys($friends) == range(0, count($friends) - 1))){
                $friends = array($friends);
            }
            $this->view->friends = $friends;
            $this->view->areFriends = true;
        }
        $this->view->render("friends");
    }




    public function profile($id){
        $user = new user;
        $userAbout = $user->getUser($id);

        $this->view->userName = $userAbout['name'];
        $this->view->userEmail = $userAbout['email'];
        if($userAbout["avatar"] === "NULL"){
            $this->view->userAvatar = "default.jpg";
        }else{
            $this->view->userAvatar = $userAbout['avatar'];
        }
            $this->view->friendProfile = true;
            $this->view->render("account");
    }

}
