<?php
$segments = explode('/', ltrim($_SERVER['REQUEST_URI'], '/'));

$controller = ucfirst($segments[0]);

if (file_exists("Controllers/" . $controller . ".php")) {
    spl_autoload_register(function ($class_name) {
        include $class_name . '.php';
    });
    $obj = new \Controllers\Auth();
    if (method_exists($obj, $segments[1])) {
        $method = $segments[1];
        $obj->$method();
    } else {
        echo "there are not $segments[1] method";
        exit();
    }
} else {
    echo "file $controller  not exist";
    exit();
}





