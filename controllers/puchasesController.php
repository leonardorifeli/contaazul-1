<?php

class puchasesController extends controller
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
        $data['pages'] = '0';
        $puchases = new puchases();
        $limit = 6;
        $p = 1;
        $offset = 0;
        if (isset($_GET['p']) && !empty($_GET['p'])) {
           $p = intval(addslashes($_GET['p'])) - 1;
           $offset = ($p * $limit);
        }
        $data['puchases_all'] = $puchases->getpuchasesAll($offset, $limit);
        $data['pages'] = ceil($puchases->totalPuchases()/$limit);
        $this->loadTemplate('puchases', $data);
    }
    public function add(){
        $data = $this->data();         
        if (isset($_POST['id_client']) && !empty($_POST['id_client'])) {
            $puchases = new puchases();
            header("Location: ".BASE_URL."puchases");
        }
        $this->loadTemplate('puchases_add', $data);
    }
    public function details($id_puchase){
        $data = $this->data();
        $puchases = new puchases();
        $this->loadTemplate('puchases_details', $data);
    }
    public function del($id_puchase){
        $puchases = new puchases();
        $puchases->del($id_puchase);
        header("Location: ".BASE_URL."puchases");
    }
}
