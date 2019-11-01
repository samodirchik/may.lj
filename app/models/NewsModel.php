<?php

namespace models;

use core\AbstractModel;
use mysqli;

class NewsModel extends AbstractModel{
    public function addNews($user) {
    $query = "insert into newses values (null, '{$user['title']}','{$user['text']}')";
        $this->db->query($query);
        if ($this->db->errno) {
            die($this->db->error);
        }
    }
}
