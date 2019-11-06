<?php

namespace models;

use core\AbstractModel;
use mysqli;

class NewsModel extends AbstractModel{
    public function addNews($post) {
    $query = "insert into newses values (null, '{$post['title']}','{$post['text']}')";
        $this->db->query($query);
        if ($this->db->errno) {
            die($this->db->error);
        }
    }
     public static function haveAuthNews() {
        //return !empty($_SESSION['post']);
        if (empty($_SESSION['post'])) {
            return false;
        } else {
            return true;
        }
    }

    public static function getAuthNews() {
        if (self::haveAuthNews()) {
            return $_SESSION['post'];
        } else {
            return false;
        }
    }

}
