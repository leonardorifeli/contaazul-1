
<div class="container">
    <h1>Relatório de Estoque</h1>
    <h3>Itens com estoque abaixo do mínimo</h3>
    <?php if(isset($filtered) && count($filtered) > 0): ?>
        <fieldset>
        </fieldset><br/>

        <div style="width: 100%;border-bottom: 1px solid #DDD;"></div><br/>

    <?php endif ?>

    <table border="0" width="100%">
        <tr>
            <th align="left">Nome</th>
            <th align="left">Preço</th>
            <th style="text-align: center;">Quant</th>
            <th style="text-align: center;">Quant Min</th>
            <th style="text-align: center;">Diferença</th>
        </tr>
        <?php foreach($inventory_list as $inventory):?>
            <tr>
                <td><?php echo $inventory['name']; ?></td>
                <td width="150">R$ <?php echo number_format($inventory['price'], 2, ",", ".");//Parãmetros: variável, quant casas decimais, caractere de casas decimais, caractere de milhar ?></td>
                <td width="120" style="text-align: center;"><?=$inventory['quantity']?></td>
                <td width="120" style="text-align: center;"><?=$inventory['min_quantity']?></td>
                <td width="120" style="text-align: center;"><?=$inventory['dif']?></td>
            </tr>
        <?php endforeach;?>
    </table>
</div>
