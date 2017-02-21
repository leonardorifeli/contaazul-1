<?php

class homeController extends controller
{
    public function __construct() {
        parent::__construct();
        $users = new users();
        if (!$users->isLogged()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    public function index()
    {
        $data = array(
            'company' => array(),
            'user' => array()
        );
        $users = new users();
        $data['user'] = $users->getUser($_SESSION['ccUser']);
        $company = new companies();
        $data['company'] = $company->getCompany();   
        $this->loadTemplate('home', $data);
    }
}

