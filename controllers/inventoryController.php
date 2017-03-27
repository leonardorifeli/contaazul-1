<?php

class inventoryController extends controller
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
        $data['inventory_add'] = $users->hasPermission($data['user']['id_group'], "inventory_add");
        $data['inventory_edit'] = $users->hasPermission($data['user']['id_group'], "inventory_edit");
        $data['inventory_del'] = $users->hasPermission($data['user']['id_group'], "inventory_del");

        $company = new companies();
        $data['company'] = $company->getCompany();
        return $data;


    }
    public function index()
    {
        $data = $this->data(); 
        $data['inventory_all'] = array();
        $data['pages'] = '0';
        $inventory = new inventory();
        $limit = 6;
        $p = 1;
        $offset = 0;
        if (isset($_GET['p']) && !empty($_GET['p'])) {
           $p = intval(addslashes($_GET['p'])) - 1;
           $offset = ($p * $limit);
        }
        $data['inventory_all'] = $inventory->getInventoryAll($offset, $limit);
        $data['pages'] = ceil($inventory->totalInventory()/$limit);
        $this->loadTemplate('inventory', $data);
    }
    public function add(){
        $data = $this->data(); 
        $inventory = new inventory();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            //Transformar para o padrão americando ex: 1,005.50
            $price = str_replace(".", "",addslashes($_POST['price']));
            $price = str_replace(",", ".", $price);
            $quantity = addslashes($_POST['quantity']);
            $min_quantity = addslashes($_POST['min_quantity']);
            $inventory->add($name, $price, $quantity, $min_quantity);
            header("Location: ".BASE_URL."inventory");
        }
        $this->loadTemplate('inventory_add', $data);
    }
    public function edit($id){
        $data = $this->data(); 
        $inventory = new inventory();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $id = addslashes($id);
            $name = addslashes($_POST['name']);
            //Transformar para o padrão americando ex: 1,005.50
            $price = str_replace(".", "",addslashes($_POST['price']));
            $price = str_replace(",", ".", $price);
            $quantity = addslashes($_POST['quantity']);
            $min_quantity = addslashes($_POST['min_quantity']);
            $inventory->edit($id, $name, $price, $quantity, $min_quantity);
            header("Location: ".BASE_URL."inventory");
        }
        $data['inventory_item'] = $inventory->getInventory($id);
        $this->loadTemplate('inventory_edit', $data);
    }
    public function del($id){
        $inventory = new inventory();
        $id = addslashes($id);
        $inventory->del($id);
        header("Location: ".BASE_URL."inventory");
        exit;
    }
}