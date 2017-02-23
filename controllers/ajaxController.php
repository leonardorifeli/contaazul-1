<?php

class ajaxController extends controller
{
    public function __construct() {
        parent::__construct();
        $users = new users();
        if (!$users->isLogged()) {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }
    public function index(){}
    
    public function searchClients(){
        $clients = array();
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $name = addslashes($_GET['q']);
            $client = new clients();
            $clients = $client->getClientsByName($name);
        }
        echo json_encode($clients);exit;
    }
    public function searchInventory(){
        $inventorys = array();
        if (isset($_GET['q']) && !empty($_GET['q'])) {
            $name = addslashes($_GET['q']);
            $inventory = new inventory();
            $inventorys = $inventory->getInventoryByName($name);
        }
        echo json_encode($inventorys);
    }
    public function add_client(){
        $data = array();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $client = new clients();
            $data['id'] = $client->add($name);
        }
        echo json_encode($data);
    }
}
