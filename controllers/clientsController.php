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
        $company = new companies();
        $data['company'] = $company->getCompany();    
        return $data;
    }
    public function index()
    {
        $data = $this->data(); 
        $clients = new clients();
        $data['clients_all'] = $clients->getClientsAll();
        $this->loadTemplate('clients', $data);
    }
    public function add(){
        $data = $this->data(); 
        $clients = new clients();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $phone = addslashes($_POST['phone']);
            $address = addslashes($_POST['address']);
            $address_neighborhood = addslashes($_POST['address_neighborhood']);
            $address_city = addslashes($_POST['address_city']);
            $address_state = addslashes($_POST['address_state']);
            $address_country = addslashes($_POST['address_country']);
            $address_zipcode = addslashes($_POST['address_zipcode']);
            $stars = addslashes($_POST['stars']);
            $internal_observation = addslashes($_POST['internal_observation']);
            $clients->add($name, $email, $phone, $address, $address_neighborhood, $address_city, $address_state, $address_country, $address_zipcode, $stars, $internal_observation);
            header("Location: ".BASE_URL."users");
        }
        $this->loadTemplate('clients_add', $data);
    }
    public function edit($id_client){
        $data = $this->data(); 
        $clients = new clients();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $id_client = addslashes($id_client);
            $name = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $phone = addslashes($_POST['phone']);
            $address = addslashes($_POST['address']);
            $address_neighborhood = addslashes($_POST['address_neighborhood']);
            $address_city = addslashes($_POST['address_city']);
            $address_state = addslashes($_POST['address_state']);
            $address_country = addslashes($_POST['address_country']);
            $address_zipcode = addslashes($_POST['address_zipcode']);
            $stars = addslashes($_POST['stars']);
            $internal_observation = addslashes($_POST['internal_observation']);
            $clients->add($id_client, $name, $email, $phone, $address, $address_neighborhood, $address_city, $address_state, $address_country, $address_zipcode, $stars, $internal_observation);
            header("Location: ".BASE_URL."users");
        }
        $this->loadTemplate('clients_edit', $data);
    }
    public function del($id_client){
        $clients = new clients();
        $id_client = addslashes($id_client);
        $clients->del($id_client);
        header("Location: ".BASE_URL."users");
        exit;
    }
}

