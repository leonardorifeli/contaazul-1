<?php
class loginController extends controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data = array(
            'error' => ''
        );
        if (isset($_POST['email']) && !empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            $password = md5($_POST['password']);
            $user = new users();
            $data['error'] = $user->login($email, $password); 
        }
        
        $this->loadView("login", $data);
    }
    public function logOut(){
        $users = new users();
        $user = $users->getUser($_SESSION['ccUser']);
        if(in_array($user['permissions'], "logout"){
            unset($_SESSION['ccUser']);
            header("Location: ".BASE_URL."login");
        }
        else{
            echo "Você não tem permissão para sair";   
        }    
    }
}

