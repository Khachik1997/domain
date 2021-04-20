<?php

namespace Models;

use System\Model;


class User extends Model
{


    public function create($data)
    {
        $data["password"] = md5($data["password"]);
        $userEmail = $data["email"];
        if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            return false;
        }
        $checkDuplicate = $this->db->select("SELECT email FROM user WHERE email = '$userEmail'");

        if (empty($checkDuplicate)) {
            return $this->db->insert("user", $data);
        } else {
            return false;
        }
    }


    public function login($email, $pass)
    {
        $pass = md5($pass);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return 0;
        } else {
            return $this->db->select("SELECT id FROM user WHERE password ='$pass' AND email ='$email'",false);

        }
    }


    public function getUser($userId)
    {
        return $this->db->select("SELECT id,email, name, avatar FROM user WHERE id = '$userId'" ,false);
    }

    public function getFriends($userId){
        return $this->db->select("SELECT id,email,name,avatar FROM user WHERE  NOT id = '$userId'  ");
    }


    public function getMessages($userId,$friendId){
        return $this->db->select("SELECT * FROM messages   WHERE from_id = '$userId'AND  to_id = '$friendId' OR  from_id = '$friendId' AND to_id ='$userId'");



    }




    public function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
        return true;
    }



    public function getSession($key)
    {
        return $_SESSION[$key];
    }

}




