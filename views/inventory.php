<h1>Estoque</h1>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        <?php foreach($user['permissions'] as $permission){
            if (in_array("inventory_add",$permission)):?>
                <div class="button"><a href="<?php echo BASE_URL; ?>inventory/add">Adicionar Produtos</a></div>
        <?php endif;} ?>  
                <input type="text" id="search" data-type="searchInventory"/>
        <table border="0" width="100%">
            <tr>
                <th>Nome</th>
                <th style="text-align:center;">Preço</th>
                <th style="text-align:center;">Quant</th>
                <th style="text-align:center;">Quant Min</th>
                <th>Ações</th>
            </tr>
            <?php foreach($inventory_all as $inventory):?>
                <tr>
                    <td><?php echo $inventory['name']; ?></td>
                    <td width="150" style="text-align:center;" >R$ <?php echo number_format($inventory['price'], 2, ",", ".");//Parãmetros: variável, quant casas decimais, caractere de casas decimais, caractere de milhar ?></td>
                    <td width="120" style="text-align:center;<?php echo ($inventory['quantity']<$inventory['min_quantity'])?"color:red;":""; ?>"><?php echo $inventory['quantity']; ?></td>
                    <td width="120" style="text-align:center;"><?php echo $inventory['min_quantity']; ?></td>
                    <td width="200">
                    <?php foreach($user['permissions'] as $permission){
                        if (in_array("inventory_edit",$permission)):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>inventory/edit/<?php echo $inventory['id'];?>" >Editar</a></div>
                    <?php endif;} ?>  
                    <?php foreach($user['permissions'] as $permission){
                        if (in_array("inventory_del",$permission)):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>inventory/del/<?php echo $inventory['id'];?>" onclick=" return confirm('Deseja realmente excluir este usuário?')" >Excluir</a></div>
                    <?php endif;} ?>    
                        
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        
    </div>
    <div class="pages">
        <?php $p = (isset($_GET['p']) && !empty($_GET['p']))?$_GET['p']:"1";
        for($q=1;$q<=$pages;$q++): ?>
        <a href="<?php echo BASE_URL; ?>inventory?p=<?php echo $q; ?>" class="btn <?php echo ($p == $q)?"btn-info":"btn-default"; ?> page_item"><?php echo $q; ?></a>
        <?php endfor;?>
    </div>
</div>


