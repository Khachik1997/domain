<?php

$_SERVER['REQUEST_URI_PATH'] = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$segments = explode('/', rtrim($_SERVER['REQUEST_URI_PATH'], '/'));
///Returned array ("","controller","method","3rdin petqa anradarnainq)))")
$controller = $segments[1];


if(file_exists("Controllers/".$controller.".php")){
    require "Controllers/".$controller.".php";
    $authObj = new auth();
}else{
    echo "file not exist";
    exit();
}
if(method_exists($authObj,$segments[2])){
    $authObj->test();
}else{
    echo "there are not such method";
}


