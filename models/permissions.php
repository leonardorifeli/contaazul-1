<?php
class permissions extends model{
    private $id_company;
    public function __construct() {
        parent::__construct();
        $this->id_company = $_SESSION['company'];
    }
    public function getPermissions($group){
        $array = array();
        $sql = "SELECT params FROM permission_groups WHERE id = '$group' AND id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            if(!empty($row['params'])){
                $sql = "SELECT id, name FROM permissions_params WHERE id IN(".$row['params'].") AND id_company = '$this->id_company'";
                $sql = $this->db->query($sql);
                if($sql->rowCount() > 0){
                    $array = $sql->fetchAll();
                }
            }       
        }
        return $array;
    }
    public function getAllPermissions(){
        $array = array();
        $sql = "SELECT * FROM permissions_params WHERE id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function getAllGroups(){
        $array = array();
        $sql = "SELECT * FROM permission_groups WHERE id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function getGroup($id_group){
        $array = array();
        $sql = "SELECT * FROM permission_groups WHERE id = '$id_group' AND id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    public function addPermission($name){
        $sql = "INSERT INTO permissions_params SET id_company = '$this->id_company', name = '$name'";
        $this->db->query($sql);
    }
    public function delPermission($id){
        $this->db->query("DELETE FROM permissions_params WHERE id = '$id' AND id_company = '$this->id_company'");
    }
    public function addGroup($name, $params){
        $sql = "INSERT INTO permission_groups SET id_company = '$this->id_company', name = '$name', params = '$params'";
        $this->db->query($sql);
    }
    public function editGroup($id_group, $name, $params){
        $sql = "UPDATE permission_groups SET name = '$name', params = '$params' WHERE id = '$id_group' AND id_company = '$this->id_company'";
        $this->db->query($sql);
    }
    public function delGroup($id){
        $user = new users();  
        if (!$user->findUsersInGroup($id)) {
            $this->db->query("DELETE FROM permission_groups WHERE id = '$id' AND id_company = '$this->id_company'");
        }
        else{
            return "Esse grupo não pode ser excluído porque tem usuários utilizando";
        }
        
    }
}

