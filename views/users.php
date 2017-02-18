<h1>Usuarios</h1>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        <div class="button"><a href="<?php echo BASE_URL; ?>users/add">Adicionar Usuário</a></div>
        <?php if(isset($error) && !empty($error)):?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <table border="0" width="100%">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
            <?php foreach($users_all as $user):?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td width="200">
                        <div class="button button_small"><a href="<?php echo BASE_URL;?>users/edit/<?php echo $user['id'];?>" >Editar</a></div>
                        <div class="button button_small"><a href="<?php echo BASE_URL;?>users/del/<?php echo $user['id'];?>" onclick=" return confirm('Deseja realmente excluir este usuário?')" >Excluir</a></div>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>


