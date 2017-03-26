<?php

class salesController extends controller
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
        //Permissions screen
        $data['sales_add'] = $users->hasPermission($data['user']['id_group'], "sales_add");
        $data['sales_edit'] = $users->hasPermission($data['user']['id_group'], "sales_edit");
        $data['sales_del'] = $users->hasPermission($data['user']['id_group'], "sales_del");

        $company = new companies();
        $data['company'] = $company->getCompany();
        return $data;

    }
    public function index()
    {
        $data = $this->data(); 
        $data['clients_all'] = array();
        $data['pages'] = '0';
        $sales = new sales();
        $limit = 6;
        $p = 1;
        $offset = 0;
        if (isset($_GET['p']) && !empty($_GET['p'])) {
           $p = intval(addslashes($_GET['p'])) - 1;
           $offset = ($p * $limit);
        }
        $data['statuses'] = ["0" => "Aguardando Pgto.", "1" => "Pago", "2" => "Cancelado"];
        $data['sales_all'] = $sales->getSalesAll($offset, $limit);
        $data['pages'] = ceil($sales->totalSales()/$limit);
        $this->loadTemplate('sales', $data);
    }
    public function add(){
        $data = $this->data();
        $data['error'] = '';
        $sales = new sales();    
        if (isset($_POST['id_client']) && !empty($_POST['id_client'])) {
            $id_client = addslashes($_POST['id_client']);   
            $status = addslashes($_POST['status']);
            $quant = $_POST['quant'];
            $data['error'] = $sales->add($id_client, $quant, $status);
            if (empty($data['error'])) {
                header("Location: ".BASE_URL."sales");
            }
        }
        $this->loadTemplate('sales_add', $data);
    }
    public function edit($id_sale){
        $data = $this->data(); 
        $sales = new sales();
        if (isset($_POST['status']) && $_POST['status'] !== "") {
            $id_sale = addslashes($id_sale);
            $status = addslashes($_POST['status']);
            $sales->edit($id_sale, $status);
            header("Location: ".BASE_URL."sales");
        }
        $data['statuses'] = ["Aguardando Pgto.", "Pago", "Cancelado"];
        $data['sale'] = $sales->getSale($id_sale);
        $this->loadTemplate('sales_edit', $data);
    }
}

