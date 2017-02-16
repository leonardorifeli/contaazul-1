<?php
class companies extends model{
    public function __construct() {
        parent::__construct();
    }
    public function getCompany($id){
        $array = array();
        $sql = "SELECT * FROM companies WHERE id = '$id'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;      
    }
}
