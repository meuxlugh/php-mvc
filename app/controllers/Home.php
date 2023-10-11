<?php

class Home extends Controller
{
    private $model;

    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
        $this->model = new Home_Model();
    }

    public function index()
    {
        $data['title'] = $this->model->getSiteTitle();
        $data['keywords'] = $this->model->getSiteTitle();
        $this->view->render('home/index', $data);
    }
}