<?php
class clients extends model{
    private $id_company;
    public function __construct() {
        parent::__construct();
        $this->id_company = $_SESSION['company'];
    }
    public function getClientsAll(){
        $array = array();
        $sql = "SELECT * FROM clients WHERE id_company = '$this->id_company'";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
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
    public function add($name, $email, $phone, $address, $address_neighborhood, $address_city, $address_state, $address_country, $address_zipcode, $stars, $internal_observation){
        $sql = "INSERT INTO clients SET id_company = '$this->id_company', name = '$name', email = '$email', phone = '$phone', address = '$address', address_neighborhood = '$address_neighborhood', address_city = '$address_city', address_state = '$address_state', address_country = '$address_country', address_zipcode = '$address_zipcode', stars = '$stars', internal_observation = '$internal_observation'";
        $this->db->query($sql);
    }
    public function edit($id_client, $name, $email, $phone, $address, $address_neighborhood, $address_city, $address_state, $address_country, $address_zipcode, $stars, $internal_observation){
        $sql = "UPDATE clients SET name = '$name', email = '$email', phone = '$phone', address = '$address', address_neighborhood = '$address_neighborhood', address_city = '$address_city', address_state = '$address_state', address_country = '$address_country', address_zipcode = '$address_zipcode', stars = '$stars', internal_observation = '$internal_observation' WHERE id_company = '$this->id_company' AND id = '$id_client'";
        $this->db->query($sql);
    }
    public function del($id_client){
        $this->db->query("DELETE FROM clients WHERE id = '$id_client' AND id_company = '$this->id_company'");
    }
}

