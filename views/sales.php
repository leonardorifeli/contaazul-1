<h1>Vendas</h1>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        <?php foreach($user['permissions'] as $permission){
            if (in_array("sale_add",$permission)):?>
                <div class="button"><a href="<?php echo BASE_URL; ?>sales/add">Adicionar Venda</a></div>
        <?php endif;} ?>
                <input type="text" id="search" data-type="searchSales"/>
        <table border="0" width="100%">
            <tr>
                <th>Nome</th>
                <th>Data</th>
                <th>Status</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
            <?php foreach($sales_all as $sale):?>
                <tr>
                    <td><?php echo $sale['name']; ?></td>
                    <td><?php echo date("d/m/Y", strtotime($sale['date_sale'])); ?></td>
                    <td><?php echo $statuses[$sale['status']]; ?></td>
                    <td>R$ <?php echo number_format($sale['total_price'], 2, ",", "."); ?></td>
                    <td width="200">
                    <?php foreach($user['permissions'] as $permission){
                        if (in_array("sale_edit",$permission)):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>sales/edit/<?php echo $sale['id_sale'];?>" >Editar</a></div>
                    <?php endif;} ?>  
                    <?php foreach($user['permissions'] as $permission){
                        if (in_array("sale_del",$permission)):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>sales/del/<?php echo $sale['id_sale'];?>" onclick=" return confirm('Deseja realmente excluir esta venda?')" >Excluir</a></div>
                    <?php endif;} ?>    
                        
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        
    </div>
    <div class="pages">
        <?php $p = (isset($_GET['p']) && !empty($_GET['p']))?$_GET['p']:"1";
        for($q=1;$q<=$pages;$q++): ?>
        <a href="<?php echo BASE_URL; ?>sales?p=<?php echo $q; ?>" class="btn <?php echo ($p == $q)?"btn-info":"btn-default"; ?> page_item"><?php echo $q; ?></a>
        <?php endfor;?>
    </div>
</div>


