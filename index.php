<?php
session_start();
spl_autoload_register(function ($class_name) {

    include str_replace("\\", DIRECTORY_SEPARATOR, $class_name) . ".php";

});

$path = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

use System\Routes;

new Routes($path);





