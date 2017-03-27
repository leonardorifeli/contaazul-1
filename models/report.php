<?php
class report extends model
{
    private $id_company;

    public function __construct()
    {
        parent::__construct();
        $this->id_company = $_SESSION['company'];
    }

    public function getReportsAll($offset, $limit)
    {

    }

    public function totalReports()
    {

    }
}