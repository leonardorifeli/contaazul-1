
<div class="container">
    <h1>Relatório de Vendas</h1>

    <?php if(isset($filtered) && count($filtered) > 0): ?>
        <fieldset>
            <legend>Filtrado Por: </legend>
            <?php if(isset($filtered['client_name']) && !empty($filtered['client_name'])): ?>
                <strong>Nome:</strong> <?=$filtered['client_name']?><br/>
            <?php endif ?>

            <?php if( (isset($filtered['period1']) && !empty($filtered['period1'])) && (isset($filtered['period2']) && !empty($filtered['period2']))): ?>
                <strong>Período: de </strong> <?=date('d/m/Y', strtotime($filtered['period1']))?> à <?=date('d/m/Y', strtotime($filtered['period2']))?><br/>
            <?php endif ?>

            <?php if(isset($filtered['status']) && !empty($filtered['status'])): ?>
                <strong>Status:</strong> <?=$statuses[$filtered['status']]?><br/>
            <?php endif ?>

            <?php if(isset($filtered['order']) && !empty($filtered['order'])): ?>
                <strong>Ordenado por:</strong>
                <?php switch ($filtered['order']) {
                    case 'date_desc':
                        echo "Mais Recente";
                        break;
                    case 'date_asc':
                        echo "Mais Antigo";
                        break;
                    case 'status':
                        echo 'Status da Venda';
                }?>
                <br/>
            <?php endif ?>
        </fieldset><br/>

        <div style="width: 100%;border-bottom: 1px solid #DDD;"></div><br/>

    <?php endif ?>

    <table border="0" width="100%">
        <thead>
            <tr>
                <th align="left">Nome</th>
                <th align="left">Data</th>
                <th align="left">Status</th>
                <th align="left">Valor</th>
            </tr>
        </thead>
        <?php foreach($sales_list as $sale):?>
            <tr>
                <td><?php echo $sale['name']; ?></td>
                <td><?php echo date("d/m/Y", strtotime($sale['date_sale'])); ?></td>
                <td><?php echo $statuses[$sale['status']]; ?></td>
                <td>R$ <?php echo number_format($sale['total_price'], 2, ",", "."); ?></td>
            </tr>
        <?php endforeach ?>
    </table>
</div>
