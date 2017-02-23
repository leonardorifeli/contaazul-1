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
    public function totalSales(){
        $sql = "SELECT count(id) as total FROM sales WHERE id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();
        return $sql['total'];
    }  
    public function add($id_client, $total_price, $status){
        $sql = "INSERT INTO sales SET id_company = '$this->id_company',  id_client = '$id_client', id_user = '$this->id_user', date_sale = NOW(), total_price = '$total_price', status = '$status'";
        $this->db->query($sql);
    }
    public function edit($id_sale, $total_price, $status){
        $sql = "UPDATE sales SET id_user = '$this->id_user', date_sale = NOW(), total_price = '$total_price', status = '$status' WHERE id = '$id_sale' AND id_company = '$this->id_company'";
        $this->db->query($sql);
    }
    public function del($id_sale){
        $this->db->query("DELETE FROM sales WHERE id = '$id_sale' AND id_company = '$this->id_company'");
    }
}

