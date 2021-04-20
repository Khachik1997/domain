<?php
namespace Helpers;

class Session {

    public static function  setSession($key,$value){
        $_SESSION[$key] = $value;
        return true;
    }

    public static function getSession($key){
        return $_SESSION[$key];
    }
}