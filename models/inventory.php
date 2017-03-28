<?php
class inventory extends model{
    private $id_company;
    private $id_user;
    public function __construct() {
        parent::__construct();
        $this->id_company = $_SESSION['company'];
        $this->id_user = $_SESSION['ccUser'];
    }
    public function getInventoryAll($offset = '0', $limit = '10'){
        $array = array();
        $sql = "SELECT * FROM inventory WHERE id_company = '$this->id_company' ORDER BY name LIMIT $offset, $limit";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function getInventoryByName($name){
        $array = array();
        $sql = "SELECT name, price, quantity, id FROM inventory WHERE id_company = '$this->id_company' AND name LIKE '%$name%' AND quantity > '0' LIMIT 10";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function totalInventory(){
        $sql = "SELECT count(id) as total FROM inventory WHERE id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();
        return $sql['total'];
    }
    public function getInventory($id){
        $array = array();
        $sql = "SELECT * FROM inventory WHERE id = '$id' AND id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }  
    private function setLog($id_product, $action){
        $sql = "INSERT INTO inventory_history SET id_company = '$this->id_company', id_product = '$id_product', id_user = '$this->id_user', action = '$action', date_action = NOW()";
        $this->db->query($sql);  
    }
    public function add($name, $price, $quantity, $min_quantity){
        $sql = "INSERT INTO inventory SET id_company = '$this->id_company', name = '$name', price = '$price', quantity = '$quantity', min_quantity = '$min_quantity'";
        $this->db->query($sql);
        $this->setLog($this->db->lastInsertId(), "add");       
           
    }
    public function edit($id, $name, $price, $quantity, $min_quantity){
        $sql = "UPDATE inventory SET name = '$name', price = '$price', quantity = '$quantity', min_quantity = '$min_quantity' WHERE id_company = '$this->id_company' AND id = '$id'";
        $this->db->query($sql);
        $this->setLog($id, "edt");
    }
    public function del($id){
        $this->db->query("DELETE FROM inventory WHERE id = '$id' AND id_company = '$this->id_company'");
        $this->setLog($id, "del");
    }

    public function getInventoryFiltered()
    {
        $array = [];

        $sql = $this->db->prepare("SELECT *, (min_quantity - quantity) as dif FROM inventory WHERE quantity <= min_quantity AND id_company = '$this->id_company' ORDER BY dif DESC");
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }
}


