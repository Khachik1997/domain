<?php

namespace Controllers;

use System\Controller;

class Auth extends Controller
{
    public function test()
    {
        //You have  $num_arg arguments;
        $num_arg = func_num_args();
        echo "You have  $num_arg arguments;" . " <br>";
        //if you want get argument call func_get_arg() and give number of argument start with 0;
        //example.. first argument is
        echo "First argument is " . func_get_arg(0);
    }




    public function log()
    {
        var_dump($_POST["email"]);
    }



    public function regForm(){
        $this->view->render("register");
    }




    public function reg()
    {
        var_dump($_POST["email"]);
    }

}


