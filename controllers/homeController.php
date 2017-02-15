<?php

class homeController extends controller
{
    public function __construct() {
        parent::__construct();
        $users = new users();
        if (!$users->isLogged()) {
            header("Location: ".BASE_URL."login");
        }
    }
    public function index()
    {
        $data = array();
        $this->loadTemplate('home', $data);
    }
}

