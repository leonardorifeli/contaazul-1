<?php

class reportsController extends controller
{
    public function __construct()
    {
        parent::__construct();
        $users = new users();
        if (!$users->isLogged()) {
            header("Location: " . BASE_URL . "login");
            exit;
        }
    }

    private function data()
    {
        $data = array(
            'company' => array(),
            'user' => array()
        );

        $users = new users();
        $data['user'] = $users->getUser($_SESSION['ccUser']);
        //Permissions menu
        $data['permissions'] = $users->hasPermission($data['user']['id_group'], "permissions");
        $data['users'] = $users->hasPermission($data['user']['id_group'], "users");
        $data['clients'] = $users->hasPermission($data['user']['id_group'], "clients");
        $data['inventory'] = $users->hasPermission($data['user']['id_group'], "inventory");
        $data['sales'] = $users->hasPermission($data['user']['id_group'], "sales");
        $data['puchases'] = $users->hasPermission($data['user']['id_group'], "puchases");
        $data['reports'] = $users->hasPermission($data['user']['id_group'], "reports");
        //Permissions screen
        $data['reports_sales'] = $users->hasPermission($data['user']['id_group'], "reports_sales");
        $data['reports_inventory'] = $users->hasPermission($data['user']['id_group'], "reports_inventory");
        $company = new companies();
        $data['company'] = $company->getCompany();
        return $data;
    }

    public function index()
    {
        $data = $this->data();
        if ($data['reports']) {
            $data['report_all'] = [];
            $data['pages'] = '0';
            $report = new report();
            $limit = 6;
            $p = 1;
            $offset = 0;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $p = intval(addslashes($_GET['p'])) - 1;
                $offset = ($p * $limit);
            }
            $data['report_all'] = $report->getReportsAll($offset, $limit);
            $data['pages'] = ceil($report->totalReports()/$limit);
            $this->loadTemplate('reports', $data);
        }
        else{
            header("Location: ".BASE_URL);
        }
    }

    public function sales()
    {
        $data = $this->data();
        if ($data['reports_sales']) {
            $data['statuses'] = [
                '0' => 'Aguardando Pgto.',
                '1' => 'Pago',
                '2' => 'Cancelado'
            ];
            $this->loadTemplate('reports_sales', $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function sales_pdf()
    {
        $data = $this->data();
        if ($data['reports_sales']) {
            $data['statuses'] = [
                '0' => 'Aguardando Pgto.',
                '1' => 'Pago',
                '2' => 'Cancelado'
            ];

            $client_name = addslashes($_GET['client_name']);
            $period1 = addslashes($_GET['period1']);
            $period2 = addslashes($_GET['period2']);
            $status = addslashes($_GET['status']);
            $order = addslashes($_GET['order']);

            $sales = new sales();

            $data['sales_list'] = $sales->getSalesFiltered($client_name, $period1, $period2, $status, $order);
            $data['filtered'] = $_GET;
            //Carregando a biblioteca mpdf
            $this->loadLibrary('mpdf60/mpdf');
            //Iniciando o buffer
            //A partir desse momento até fechar o buffer nada vai aparecer na tela
            //Ficara na memória do buffer para gerar o pdf
            ob_start();
            //Armazena o html na memória
            $this->loadView('reports_sales_pdf', $data);
            //Atribui a variável html
            $html = ob_get_contents();
            //Limpa a memório
            ob_end_clean();
            //Inicia o pdf
            $mpdf = new mPDF();
            //Escreve no pdf
            $mpdf->WriteHTML($html);
            //Mostra o pdf
            $mpdf->Output();

        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function inventory()
    {
        $data = $this->data();
        if ($data['reports_inventory']) {

            $this->loadTemplate('reports_inventory', $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function inventory_pdf()
    {
        $data = $this->data();
        if ($data['reports_inventory']) {


            $inventory = new inventory();

            $data['inventory_list'] = $inventory->getInventoryFiltered();
            $data['filtered'] = $_GET;
            //Carregando a biblioteca mpdf
            $this->loadLibrary('mpdf60/mpdf');
            //Iniciando o buffer
            ob_start();
            //Armazena o html na memória
            $this->loadView('reports_inventory_pdf', $data);
            //Atribui a variável html
            $html = ob_get_contents();
            //Limpa a memório
            ob_end_clean();
            //Inicia o pdf
            $mpdf = new mPDF();
            //Escreve no pdf
            $mpdf->WriteHTML($html);
            //Mostra o pdf
            $mpdf->Output();

        } else {
            header("Location: ".BASE_URL);
        }
    }

}