<?php
class loginController extends controller{
    public function __construct() {
        parent::__construct();
    }
    public function index(){
        $data = array();
        $this->loadView("login", $data);
    }
}

