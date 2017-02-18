<?php

class usersController extends controller
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
        $users = new users();
        $data['users_all'] = $users->getUsersAll();
        $this->loadTemplate('users', $data);
    }
    public function add(){
        $data = $this->data(); 
        $data['error'] = '';
        $users = new users();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $email = addslashes($_POST['email']);
            $password = md5($_POST['password']);
            $id_group = addslashes($_POST['id_group']);          
            $data['error'] = $users->add($name, $email, $password, $id_group);
            if (empty($data['error'])) {
                header("Location: ".BASE_URL."users");
                exit;
            }
        }
        $permissions = new permissions();
        $data['groups_all'] = $permissions->getAllGroups();
        $this->loadTemplate('users_add', $data);
    }
    public function edit($id_user){
        $data = $this->data(); 
        $users = new users();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $id_user = addslashes($id_user);
            $name = addslashes($_POST['name']);
            $password = (empty($_POST['password']))?"":md5($_POST['password']);
            $id_group = addslashes($_POST['id_group']);           
            $users->edit($id_user, $name, $password, $id_group);
            header("Location: ".BASE_URL."users");
            exit;
        }
        $permissions = new permissions();
        $data['groups_all'] = $permissions->getAllGroups();
        $data['user_id'] =  $users->getUser($id_user);
        $this->loadTemplate('users_edit', $data);
    }
    public function del($id_user){
        $users = new users();
        $id_user = addslashes($id_user);
        $users->del($id_user);
        header("Location: ".BASE_URL."users");
        exit;
    }
}

