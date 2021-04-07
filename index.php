<?php
$segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));
///Returned array ("","controller","method","3rdin petqa anradarnainq)))")
$controller = ucfirst($segments[0]);

if (file_exists("Controllers/" . $controller . ".php")) {
    require "Controllers/" . $controller . ".php";
    if (class_exists($controller)) {
        $obj = new $controller();
        if (method_exists($obj, $segments[1])) {
            $method = $segments[1];
            $obj->$method();
        } else {
            echo "there are not $segments[1] method";
            exit();
        }

    } else {
        echo "class $controller not exist";
        exit();
    }

} else {
    echo "file $controller  not exist";
    exit();
}





