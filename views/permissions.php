<h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem activetab">Grupo de Permissões</div>
    <div class="tabitem">Permissões</div>
</div>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        <div class="button"><a href="<?php echo BASE_URL; ?>permissions/group_add">Adicionar</a></div>
        <?php if(!empty($error)):?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <table border="0" width="100%">
            <tr>
                <th>Nome do Grupo de Permissões</th>
                <th>Ações</th>
            </tr>
            <?php foreach($groups_all as $group):?>
                <tr>
                    <td><?php echo $group['name']; ?></td>
                    <td width="200">
                        <div class="button button_small"><a href="<?php echo BASE_URL;?>permissions/group_edit/<?php echo $group['id'];?>" >Editar</a></div>
                        <div class="button button_small"><a href="<?php echo BASE_URL;?>permissions/group_del/<?php echo $group['id'];?>" onclick=" return confirm('Deseja realmente excluir esta permissão?')" >Excluir</a></div>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
    <div class="tabbody">
        <div class="button"><a href="<?php echo BASE_URL; ?>permissions/add">Adicionar</a></div>
        <table border="0" width="100%">
            <tr>
                <th>Nome da Permissão</th>
                <th>Ações</th>
            </tr>
            <?php foreach($permissions_all as $permission):?>
                <tr>
                    <td><?php echo utf8_encode($permission['name']); ?></td>
                    <td width="50">
                        <div class="button button_small"><a href="<?php echo BASE_URL;?>permissions/del/<?php echo $permission['id'];?>" onclick="confirm('Deseja realmente excluir esta permissão?')" >Excluir</a></div>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
