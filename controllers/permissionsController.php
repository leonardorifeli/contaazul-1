<?php
class permissionsController extends controller{
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
        $permission = new permissions();
        $data['permissions_all'] = $permission->getAllPermissions();
        $data['groups_all'] = $permission->getAllGroups();
        return $data;
    }
    public function index(){   
        $data = $this->data();
        $this->loadTemplate("permissions", $data);
    }
    public function add(){
        $data = $this->data();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $permission = new permissions();
            $permission->addPermission($name);
            header("Location: ".BASE_URL."permissions");
            exit;
        }
        $this->loadTemplate("permission_add", $data);
    }
    public function del($id){
        $permission = new permissions();
        $permission->delPermission($id);
        header("Location: ".BASE_URL."permissions");
        exit;
    }
    public function group_add(){
        $data = $this->data();
        $permission = new permissions();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $params = "";
            if (isset($_POST['permissions']) && !empty($_POST['permissions'])) {
               $params = implode(",",$_POST['permissions']); 
            }              
            $permission->addGroup($name, $params);
            header("Location: ".BASE_URL."permissions");
            exit;
        }
        $data['permissions_all'] = $permission->getAllPermissions();
        $this->loadTemplate("group_add", $data);
    }
    public function group_edit($id_group){
        $data = $this->data();
        $permission = new permissions();
        if (isset($_POST['name']) && !empty($_POST['name'])) {
            $name = addslashes($_POST['name']);
            $id_group = addslashes($id_group);
            $params = "";
            if (isset($_POST['permissions']) && !empty($_POST['permissions'])) {
               $params = implode(",",$_POST['permissions']); 
            }            
            $permission->editGroup($id_group, $name, $params);
            header("Location: ".BASE_URL."permissions");
            exit;
        }
        $data['permissions_all'] = $permission->getAllPermissions();
        $data['group'] = $permission->getGroup($id_group);
        $data['permissions_group'] = explode(",", $data['group']['params']);
        $this->loadTemplate("group_edit", $data);
    }
    public function group_del($id){
        $data = $this->data();
        $data['error'] = '';
        $permission = new permissions();
        $data['error'] = $permission->delGroup($id);
        if (!empty($data['error'])) {
            $this->loadTemplate("permissions", $data);
            exit;
        }
        header("Location: ".BASE_URL."permissions");
        exit;
    }
    
}
