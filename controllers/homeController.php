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
        //Permissions menu
        $data['permissions'] = $users->hasPermission($data['user']['id_group'], "permissions");
        $data['users'] = $users->hasPermission($data['user']['id_group'], "users");
        $data['clients'] = $users->hasPermission($data['user']['id_group'], "clients");
        $data['inventory'] = $users->hasPermission($data['user']['id_group'], "inventory");
        $data['sales'] = $users->hasPermission($data['user']['id_group'], "sales");
        $data['puchases'] = $users->hasPermission($data['user']['id_group'], "puchases");
        $data['reports'] = $users->hasPermission($data['user']['id_group'], "reports");
        //Permissions screen
        
        
        $company = new companies();
        $data['company'] = $company->getCompany();   
        $this->loadTemplate('home', $data);
    }
}

