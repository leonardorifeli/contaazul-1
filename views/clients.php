<h1>Clientes</h1>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        <?php foreach($user['permissions'] as $permission){
            if (in_array("client_add",$permission)):?>
                <div class="button"><a href="<?php echo BASE_URL; ?>clients/add">Adicionar Cliente</a></div>
        <?php endif;} ?>  
                <input type="text" id="search" data-type="searchClients"/>
        <table border="0" width="100%">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php foreach($clients_all as $client):?>
                <tr>
                    <td><?php echo $client['name']; ?></td>
                    <td><?php echo $client['email']; ?></td>
                    <td width="200">
                    <?php foreach($user['permissions'] as $permission){
                        if (in_array("client_edit",$permission)):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>clients/edit/<?php echo $client['id'];?>" >Editar</a></div>
                    <?php endif;} ?>  
                    <?php foreach($user['permissions'] as $permission){
                        if (in_array("client_del",$permission)):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>clients/del/<?php echo $client['id'];?>" onclick=" return confirm('Deseja realmente excluir este usuário?')" >Excluir</a></div>
                    <?php endif;} ?>    
                        
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
        
    </div>
    <div class="pages">
        <?php $p = (isset($_GET['p']) && !empty($_GET['p']))?$_GET['p']:"1";
        for($q=1;$q<=$pages;$q++): ?>
        <a href="<?php echo BASE_URL; ?>clients?p=<?php echo $q; ?>" class="btn <?php echo ($p == $q)?"btn-info":"btn-default"; ?> page_item"><?php echo $q; ?></a>
        <?php endfor;?>
    </div>
</div>


