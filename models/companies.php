<?php
class companies extends model{
    private $id_company;
    public function __construct() {
        parent::__construct();
        $this->id_company = $_SESSION['company'];
    }
    public function getCompany(){
        $array = array();
        $sql = "SELECT * FROM companies WHERE id = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;      
    }
}
