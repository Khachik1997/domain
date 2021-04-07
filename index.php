<?php
$segments = explode('/', rtrim($_SERVER['REQUEST_URI'], '/'));
///Returned array ("","controller","method","3rdin petqa anradarnainq)))")
$controller = $segments[1];

if (file_exists("Controllers/" . $controller . ".php")) {
    require "Controllers/" . $controller . ".php";
    if (class_exists($controller)) {
        $obj = new $controller();
        if (method_exists($obj, $segments[2])) {
            $method = $segments[2];
            $obj->$method();
        } else {
            echo "there are not $segments[2] method";
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





