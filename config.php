<?php

require 'environment.php';
define("BASE_URL", "http://localhost/");
global $config;
$config = array();

if(ENVIRONMENT == 'development')
{
    $config['dbname'] = 'contaazul';
    $config['host']   = '127.0.0.1';
    $config['dbuser'] = 'root';
    $config['dbpass'] = 'root';
}
else
{
    $config['dbname'] = 'u125275386_contaazul';
    $config['host']   = 'mysql.hostinger.com.br';
    $config['dbuser'] = 'u125275386_root';
    $config['dbpass'] = '123456';
}

