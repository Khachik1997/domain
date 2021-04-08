<?php

$segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

$controller = ucfirst($segments[0]);




if (file_exists("Controllers/" . $controller . ".php")) {
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    $controllerClass = "Controllers\\" . $controller;


    $obj = new $controllerClass ;
    if (method_exists($obj, $segments[1])) {
        $method = $segments[1];
        $obj->$method();
    } else {
        echo "there are not $segments[1] method";

    }
} else {
    echo "file $controller  not exist";

}

