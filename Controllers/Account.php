<?php

namespace Controllers;

use System\Controller;
use Models\User;
use Helpers\UploadImage;
use Helpers\Session;

class Account extends Controller
{
    private $user;

    function __construct()
    {

        if (!Session::getSession("userId")) {
            header("Location:/auth/login");
        }
        parent::__construct();
        $this->user = new User;

    }


    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {

            if (empty($_FILES)) {
                $this->view->uploadError = "File cant be empty";
            } else {

                $uploadObj = new UploadImage();
                $imageFileType = strtolower(pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION));
                $uploadObj->options['changeName'] = true;
                if ($uploadObj->options["changeName"]) {
                    $newAvatarName = date("H-i-s-h") . "." . $imageFileType;
                } else {
                    $newAvatarName = $_FILES["avatar"]["name"];
                }

                $targetDir = "./assets/images/avatar/" . $newAvatarName;


                $result = $uploadObj->execute($_FILES['avatar'], $targetDir);
                if ($result['success']) {
                    $id = Session::getSession("userId");
                    $this->user->db->where("id", $id)->update("user", ["avatar" => $newAvatarName]);
                } else {
                    $this->view->uploadError = $result['message'];
                }
            }
        }
        $userAbout = $this->user->getUser(Session::getSession("userId"));
        $this->view->user = $userAbout;
        if (!$userAbout["avatar"]) {
            $this->view->user['avatar'] = "default.jpg";
        }
        $this->view->friendProfile = false;
        $this->view->render("account");
    }


    public function friends()
    {
        $friends = $this->user->getFriends(Session::getSession("userId"));
        if (empty($friends)) {
            $this->view->noFriends = "You don't have a friends yet";
        }
        $this->view->friends = $friends;
        $this->view->render("friends");

    }


    public function profile($id)
    {
        $userAbout = $this->user->getUser($id);
        $this->view->user = $userAbout;
        if (!$userAbout["avatar"]) {
            $this->view->user['avatar'] = "default.jpg";
        }
        $this->view->friendProfile = true;
        $this->view->render("account");
    }

    public function sendMessage($friendId)
    {
        if (isset($_POST['message'])) {
            $data = [
                "from_id" => Session::getSession("userId"),
                "to_id" => $friendId,
                "body" => $_POST['message']
            ];
            if( $this->user->insertMsg($data)){
                echo json_encode(["success"=>true,"date"=>date("Y-m-d H:i:s")] );
            }else{
                echo json_encode(["success"=>false]);
            }
        }
    }
    public function getMessage ($friendId,$lastMsgId){
        $userId = Session::getSession("userId");
        $result = $this->user->getMessages($userId,$friendId,$lastMsgId);
        echo json_encode($result);
    }



    public function chat($friendId)
    {
        $userId = Session::getSession("userId");
        $userInfo = $this->user->getUser($userId);
        if (!$userInfo['avatar']) {
            $userInfo['avatar'] = "default.jpg";
        }
        $this->view->user = $userInfo;
        $messages = $this->user->getMessages($userId, $friendId);
        $this->view->messages = $messages;
        $this->view->userId = $userId;
        $this->view->userAvatar = $userInfo['avatar'];
        $this->view->friendId = $friendId;
//        we need Last Id from message Table
        $lastIdMsgTable = $this->user->lastMsgId();
        $this->view->lastIdMsgTable =  $lastIdMsgTable;
        $this->view->render("chat");
    }


}
