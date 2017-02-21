<h1>Usuarios</h1>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        <?php foreach($user['permissions'] as $permission){
            if (in_array("user_add",$permission)):?>
            <div class="button"><a href="<?php echo BASE_URL; ?>users/add">Adicionar Usuário</a></div>
        <?php endif;} ?>  
        <?php if(isset($error) && !empty($error)):?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <table border="0" width="100%">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php  foreach($users_all as $users):?>
                <tr>
                    <td><?php echo $users['name']; ?></td>
                    <td><?php echo $users['email']; ?></td>
                    <td width="200">
                    <?php foreach($user['permissions'] as $permission){
                        if (in_array("user_edit",$permission)):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>users/edit/<?php echo $user['id'];?>" >Editar</a></div>
                    <?php endif;} ?> 
                    <?php foreach($user['permissions'] as $permission){
                        if (in_array("user_del",$permission)):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>users/del/<?php echo $user['id'];?>" onclick=" return confirm('Deseja realmente excluir este usuário?')" >Excluir</a></div>
                    <?php endif;} ?>    
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>


