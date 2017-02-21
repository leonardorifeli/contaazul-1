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
        echo json_encode($clients);
    }
}
