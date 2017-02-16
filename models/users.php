<?php
class users extends model{
    public function __construct() {
        parent::__construct();
    }
    public function isLogged(){
        return (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser']))?true:false;
    }
    public function login($email, $password){
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $sql = $sql->fetch();
            $_SESSION['ccUser'] = $sql['id'];
            header("Location: ".BASE_URL);
            exit;
        }
        else{
            return "Usuário e/ou senha incorretos!";
        }
    }
    public function getUser($id){
        $array = array();
        $sql = "SELECT * FROM users WHERE id = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $permissions = new permissions();
            $array['permissions'] = $permissions->getPermissions($array['group'], $array['id_company']);
        }
        return $array;
    }
}

