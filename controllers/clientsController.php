<?php

class clientsController extends controller
{
    public function __construct() {
        parent::__construct();
        $users = new users();
        if (!$users->isLogged()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    private function data(){
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
        $data['client_add'] = $users->hasPermission($data['user']['id_group'], "client_add");
        $data['client_edit'] = $users->hasPermission($data['user']['id_group'], "client_edit");
        $data['client_del'] = $users->hasPermission($data['user']['id_group'], "client_del");
        
        $company = new companies();
        $data['company'] = $company->getCompany();    
        return $data;
    }
    public function index()
    {
        $data = $this->data(); 
        if ($data['clients']) {
           $data['clients_all'] = array();
            $data['pages'] = '0';
            $clients = new clients();
            $limit = 6;
            $p = 1;
            $offset = 0;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
               $p = intval(addslashes($_GET['p'])) - 1;
               $offset = ($p * $limit);
            }
            $data['clients_all'] = $clients->getClientsAll($offset, $limit);
            $data['pages'] = ceil($clients->totalClients()/$limit);
            $this->loadTemplate('clients', $data); 
        }
        else{
            header("Location: ".BASE_URL."clients");
        }
        
    }
    public function add(){
        $data = $this->data();
        if ($data['client_add']) {
            $clients = new clients();
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $email = addslashes($_POST['email']);
                $phone = addslashes($_POST['phone']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address_number = addslashes($_POST['address_number']);
                $address_complement = addslashes($_POST['address_complement']);   
                $address_neighborhood = addslashes($_POST['address_neighborhood']);
                $address_city = addslashes($_POST['address_city']);
                $address_state = addslashes($_POST['address_state']);
                $address_uf = addslashes($_POST['address_uf']);
                $address_country = addslashes($_POST['address_country']);
                $stars = addslashes($_POST['stars']);
                $internal_observation = addslashes($_POST['internal_observation']);
                $clients->add($name, $email, $phone, $address_zipcode, $address, $address_number, $address_complement, $address_neighborhood, $address_city, $address_state, $address_uf, $address_country, $stars, $internal_observation);
                header("Location: ".BASE_URL."clients");
            }
            $this->loadTemplate('clients_add', $data);
        }
        else{
            header("Location: ".BASE_URL."clients");
        }
    }
    public function edit($id_cliente){
        $data = $this->data(); 
        if ($data['client_edit']) {
            $clients = new clients();
            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $id_cliente = addslashes($id_cliente);
                $name = addslashes($_POST['name']);
                $email = addslashes($_POST['email']);
                $phone = addslashes($_POST['phone']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address_number = addslashes($_POST['address_number']);
                $address_complement = addslashes($_POST['address_complement']);   
                $address_neighborhood = addslashes($_POST['address_neighborhood']);
                $address_city = addslashes($_POST['address_city']);
                $address_state = addslashes($_POST['address_state']);
                $address_uf = addslashes($_POST['address_uf']);
                $address_country = addslashes($_POST['address_country']);
                $stars = addslashes($_POST['stars']);
                $internal_observation = addslashes($_POST['internal_observation']);
                $clients->add($id_cliente, $name, $email, $phone, $address_zipcode, $address, $address_number, $address_complement, $address_neighborhood, $address_city, $address_state, $address_uf, $address_country, $stars, $internal_observation);
                header("Location: ".BASE_URL."clients");
            }
            $data['clients'] = $clients->getClient($id_cliente);
            $this->loadTemplate('clients_edit', $data);
            }
            else{
                header("Location: ".BASE_URL."clients");
        }
    }
    public function del($id_client){
        $users = new users();
        $user = $users->getUser($_SESSION['ccUser']);
        if ($users->hasPermission($user['id_group'], "client_del")) {
            $clients = new clients();
            $id_client = addslashes($id_client);
            $clients->del($id_client);
        }  
        header("Location: ".BASE_URL."users");
        exit;
    }
}

