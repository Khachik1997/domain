<?php
namespace  Controllers;

class Auth {
       public function test(){
           //You have  $num_arg arguments;
           $num_arg = func_num_args();
           echo "You have  $num_arg arguments;"." <br>";
           //if you want get argument call func_get_arg() and give number of argument start with 0;
           //example.. first argument is
           echo "First argument is ". func_get_arg(0);





    }
}


