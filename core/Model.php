<?php

class Model extends Database
{

    public $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = new Database();
    }
}