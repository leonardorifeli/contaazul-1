<?php
class users extends model{
    private $id_company;
    public function __construct() {
        parent::__construct();
        $this->id_company = ($this->isLogged())?$_SESSION['company']:"";
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
            $_SESSION['company'] = $sql['id_company'];
            $this->id_company = $_SESSION['company'];
            header("Location: ".BASE_URL);
            exit;
        }
        else{
            return "Usuário e/ou senha incorretos!";
        }
    }
    public function getUser($id){
        $array = array();
        $sql = "SELECT * FROM users WHERE id = '$id' AND id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
            $permissions = new permissions();
            $array['permissions'] = $permissions->getPermissions($array['id_group'], $array['id_company']);
        }
        return $array;
    }
    public function getUsersAll(){
        $array = array();
        $sql = "SELECT * FROM users WHERE id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function findUsersInGroup($id){
        $sql = "SELECT id FROM users WHERE id_group = '$id'  AND id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        return ($sql->rowCount() > 0)?true:false;
    }
    public function add($name, $email, $password, $id_group){
        $error = "";
        $sql = "SELECT id FROM users WHERE email = '$email'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $error = "Já existe um usuário com este email!";
        }
        else{
            $sql = "INSERT INTO users SET id_company = '$this->id_company', name = '$name', email = '$email', password = '$password', id_group = '$id_group'";
            $this->db->query($sql);
        }
        return $error;
    }
    public function edit($id_user, $name, $password, $id_group){
        $sql = "UPDATE users SET name = '$name', id_group = '$id_group'";
        if (!empty($password)) {
            $sql .= ", password = '$password'";
        }
        $sql .= "WHERE id = '$id_user' AND id_company = '$this->id_company'";
        $this->db->query($sql);     
    }
    public function del($id_user){
        $this->db->query("DELETE FROM users WHERE id = '$id_user' AND id_company = '$this->id_company'");
    }
}

