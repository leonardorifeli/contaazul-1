<?php
class users extends model{
    public function __construct() {
        parent::__construct();
    }
    public function isLogged(){
        return (isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser']))?true:false;
    }
}

