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
            $sql = $sql->fetch();
            $array = explode(",", $sql['params']);
        }
        return $array;
    }
}

