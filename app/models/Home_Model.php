<?php

class Home_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getSiteTitle()
    {
        return $this->db->get('configs', ['name' => 'site_title'])->value;
    }

}