<?php
class sales extends model{
    private $id_company;
    private $id_user;
    public function __construct() {
        parent::__construct();
        $this->id_company = $_SESSION['company'];
        $this->id_user = $_SESSION['ccUser'];
    }
    public function getSalesAll($offset = '0', $limit = '10'){
        $array = array();
        $sql = "SELECT c.id AS id_client, c.name, s.id AS id_sale, s.date_sale, s.total_price, s.status  FROM sales AS s LEFT JOIN clients AS c ON s.id_client = c.id WHERE s.id_company = '$this->id_company' ORDER BY s.date_sale LIMIT $offset, $limit";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function getSale($id_sale){
        $array = array();
        $sql = "SELECT c.name, s.date_sale, s.total_price, s.status FROM sales AS s LEFT JOIN clients AS c ON s.id_client = c.id WHERE s.id = '$id_sale'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }
    public function totalSales(){
        $sql = "SELECT count(id) as total FROM sales WHERE id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();
        return $sql['total'];
    }  
    public function add($id_client, $quant, $status){
        $error = '';
        $total_price = 0;
        $sql = "INSERT INTO sales SET id_company = '$this->id_company',  id_client = '$id_client', id_user = '$this->id_user', date_sale = NOW(), total_price = '0', status = '$status'";
        $this->db->query($sql);
        $id_sale = $this->db->lastInsertId();
        foreach ($quant as $key => $value) {
            $sql = "SELECT name, price, quantity FROM inventory WHERE id = '$key'";
            $sql = $this->db->query($sql);
            if ($sql->rowCount() > 0) {
                $sql = $sql->fetch();
                if (intval($sql['quantity']) >= $value) {
                    $total_price += floatval($sql['price'])*intval($value);
                    $sqlp = "INSERT INTO sales_products SET id_company = '$this->id_company', id_sale = '$id_sale', id_product = '$key', quantity = '$value', price = '".$sql['price']."'";
                    $this->db->query($sqlp);
                    $sqlp = "UPDATE inventory SET quantity = quantity - $value WHERE id = '$key'";
                    $this->db->query($sqlp);
                    $sqlp = "INSERT INTO inventory_history SET id_company = '$this->id_company', id_product = '$key', id_user = '$this->id_user', action = 'sal', date_action = NOW()";
                    $this->db->query($sqlp);
                }
                else{
                    $error = "Quantidade de ".$sql['name']." indisponível, Venda não realizada!";
                    $sql = "DELETE FROM sales WHERE id = '$id_sale'";
                    $this->db->query($sql);
                    return $error; 
                }
                
            }     
        }
        $sql = "UPDATE sales SET total_price = '$total_price' WHERE id_company = '$this->id_company' AND id = '$id_sale'";
        $this->db->query($sql);
        return $error;
    }
    public function edit($id_sale, $status){
        $sql = "UPDATE sales SET id_user = '$this->id_user', status = '$status' WHERE id = '$id_sale' AND id_company = '$this->id_company'";
        $this->db->query($sql);
    }
}

