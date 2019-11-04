<?php

namespace models;

use core\AbstractModel;
use mysqli;

class AuthModel extends AbstractModel {

    /**
     * add user to db
     * 
     * @param array $user
     */
    public function addUser($user) {
        $hash = password_hash($user['pass'], PASSWORD_BCRYPT);
        $query = "insert into users values (null, '{$user['login']}','$hash','{$user['email']}')";
        $this->db->query($query);
        if ($this->db->errno) {
            die($this->db->error);
        }
    }

    public function authenticationUser(array $requestuser) {
        $query = "select * from users where login = '{$requestuser['login']}';";
        $result = $this->db->query($query);
        if ($result) {
            $user = $result->fetch_object();
            if (!password_verify($requestuser['pass'], $user->pass)) {
                return false;
            }
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }
    }

    /**
     * check useer in session
     * 
     * @return boolean
     */
    public static function haveAuthUser() {
        //return !empty($_SESSION['user']);
        if (empty($_SESSION['user'])) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 
     * @return mixed
     */
    public static function getAuthUser() {
        if (self::haveAuthUser()) {
            return $_SESSION['user'];
        } else {
            return false;
        }
    }

   
}
