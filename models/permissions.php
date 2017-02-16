<?php
class permissions extends model{
    public function __construct() {
        parent::__construct();
    }
    public function getPermissions($group, $id_company){
        $array = array();
        $sql = "SELECT params FROM permission_groups WHERE id = '$group' AND id_company = '$id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $row = $sql->fetch();
            if(!empty($row['params'])){
                $sql = "SELECT name FROM permission_params WHERE id IN(".$row['params'].") AND id_company = '$id_company'";
                $sql = $this->db->query($sql);
                if($sql->rowCount() > 0){
                    $sql = $sql->fetchAll();
                    foreach($sql as $param){
                       $array[] = $param['name']; 
                    } 
                }
            }       
        }
        return $array;
    }
}

