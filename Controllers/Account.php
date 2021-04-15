<?php
namespace Controllers;
use System\Controller;
use Models\User;

class Account extends Controller{
    function __construct(){
            parent::__construct(true);
    }




    public function index(){
        $user = new user;
        $userAbout = $user->getUser();
        $this->view->userName = $userAbout['name'];
        $this->view->render("account");
    }



}
