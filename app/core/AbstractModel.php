<?php

namespace core;

use mysqli;

abstract class AbstractModel {

    /**
     *
     * @var mysqli
     */
    protected $db;

    public function __construct() {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->db->connect_errno) {
            die('faild connect to db');
        }
    }

}
