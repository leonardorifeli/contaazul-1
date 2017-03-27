<?php
class clients extends model{
    private $id_company;
    public function __construct() {
        parent::__construct();
        $this->id_company = $_SESSION['company'];
    }
    public function getClientsAll($offset = '0', $limit = '10'){
        $array = array();
        $sql = "SELECT * FROM clients WHERE id_company = '$this->id_company' ORDER BY name LIMIT $offset, $limit";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function getClientsByName($name){
        $array = array();
        $sql = "SELECT name, id FROM clients WHERE id_company = '$this->id_company' AND name LIKE '%$name%' LIMIT 10";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
    public function totalClients(){
        $sql = "SELECT count(id) as total FROM clients WHERE id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        $sql = $sql->fetch();
        return $sql['total'];
    }
    public function getClient($id){
        $array = array();
        $sql = "SELECT * FROM clients WHERE id = '$id' AND id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }
        return $array;
    }   
    public function add($name, $email = '', $phone = '', $address_zipcode = '', $address = '', $address_number = '', $address_complement = '', $address_neighborhood = '', $address_city = '', $address_state = '', $address_uf = '', $address_country = '', $stars = '3', $internal_observation = ''){
        $sql = "INSERT INTO clients SET id_company = '$this->id_company', name = '$name', email = '$email', phone = '$phone', address_zipcode = '$address_zipcode', address = '$address', address_number = '$address_number', address_complement = '$address_complement', address_neighborhood = '$address_neighborhood', address_city = '$address_city', address_state = '$address_state', address_uf = '$address_uf', address_country = '$address_country', stars = '$stars', internal_observation = '$internal_observation'";
        $this->db->query($sql);
        return $this->lastInsertId();
    }
    public function edit($id_cliente, $name, $email, $phone, $address_zipcode, $address, $address_number, $address_complement, $address_neighborhood, $address_city, $address_state, $address_uf, $address_country, $stars, $internal_observation){
        $sql = "UPDATE clients SET name = '$name', email = '$email', phone = '$phone', address_zipcode = '$address_zipcode', address = '$address', address_number = '$address_number', address_complement = '$address_complement', address_neighborhood = '$address_neighborhood', address_city = '$address_city', address_state = '$address_state', address_uf = '$address_uf', address_country = '$address_country', stars = '$stars', internal_observation = '$internal_observation' WHERE id = '$id_cliente' AND id_company = '$this->id_company'";
        $this->db->query($sql);
    }
    public function del($id_client){
        $this->db->query("DELETE FROM clients WHERE id = '$id_client' AND id_company = '$this->id_company'");
    }
}

