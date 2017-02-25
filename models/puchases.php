<?php
class puchases extends model{
    private $id_company;
    private $id_user;
    public function __construct() {
        parent::__construct();
        $this->id_company = $_SESSION['company'];
        $this->id_user = $_SESSION['ccUser'];
    }
    public function getpuchasesAll($offset = '0', $limit = '10'){
        $array = array();
        $sql = "SELECT * FROM puchases WHERE id_company = '$this->id_company' ORDER BY date_puchase LIMIT $offset, $limit";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function getPuchase($id_puchase){
        $array = array();
        $sql = "SELECT * FROM puchases WHERE id = '$id_puchase'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    public function totalPuchases(){
        $sql = "SELECT count(id) as total FROM puchases WHERE id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();
        return $sql['total'];
    }  
    public function add($products = array(), $total_price){
        $sql = "INSERT INTO puchases SET id_company = '$this->id_company', id_user = '$this->id_user', date_puchase = NOW(), total_price = '$total_price'";
        $this->db->query($sql);
        $id_puchase = $this->db->lastInsertId();
        if (count($products) > 0) {
           foreach ($products as $product) {
               $name = $product['name'];
               $quantity = $product['quantity'];
               $puchase_price = $product['puchase_price'];
               $min_quantity = $product['min_quantity'];
               $sql = "INSERT INTO puchases_products SET id_company = '$this->id_company', id_user = '$this->id_user', id_puchase = '$id_puchase', name = '$name', quantity = '$quantity', puchase_price = '$puchase_price'";
               $sql = $this->db->query($sql);
               $sql = "INSERT INTO inventory SET id_company = '$this->id_company', name = '$name', price = '$puchase_price', quantity = '$quantity', min_quantity = '$min_quantity'";
               $sql = $this->db->query($sql);
               $id_product = $this->db->lastInsertId();
               $sql = "INSERT INTO inventory_history SET id_company = '$this->id_company', id_product = '$id_product', id_user = '$this->id_user', action = 'ins', date_action = NOW()";
               $sql = $this->db->query($sql);
           } 
        }
    }
    public function del($id_puchase){
        $sql = "DELETE FROM puchases WHERE id = '$id_puchase' AND id_company = '$this->id_company'";
        $this->db->query($sql);
    }
}



