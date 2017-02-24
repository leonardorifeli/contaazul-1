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
        if (isset($_POST['id_client']) && !empty($_POST['id_client'])) {
            $id_sale = addslashes($id_sale);
            $total_price = addslashes($_POST['total_price']);
            $total_price = str_replace(".", "", $total_price);
            $total_price = str_replace(",", ".", $total_price);
            $status = addslashes($_POST['status']);
            $sales->edit($id_sale, $total_price, $status);
            header("Location: ".BASE_URL."sales");
        }
        $this->loadTemplate('sales_edit', $data);
    }
}

