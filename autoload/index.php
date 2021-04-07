<?php
spl_autoload_register(function($class_name){
    var_dump($class_name.'.php');
    include $class_name.'.php';

});


$obj = new \ForAClass\fileX\FileZ\A\A();

