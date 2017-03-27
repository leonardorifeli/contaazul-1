<h1>Relatório de Vendas</h1>

<table border="0" width="100%">
    <tr>
        <th>Nome</th>
        <th>Data</th>
        <th>Status</th>
        <th>Valor</th>
    </tr>
    <?php foreach($sales_list as $sale):?>
        <tr>
            <td><?php echo $sale['name']; ?></td>
            <td><?php echo date("d/m/Y", strtotime($sale['date_sale'])); ?></td>
            <td><?php echo $statuses[$sale['status']]; ?></td>
            <td>R$ <?php echo number_format($sale['total_price'], 2, ",", "."); ?></td>
        </tr>
    <?php endforeach;?>
</table>