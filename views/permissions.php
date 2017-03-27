<?php if (isset($permissions) && $permissions):?>
    <h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem activetab">Grupo de Permissões</div>
    <div class="tabitem">Permissões</div>
</div>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        <?php if (isset($permissions_group_add) && $permissions_group_add):?>
            <div class="button"><a href="<?php echo BASE_URL; ?>permissions/group_add">Adicionar</a></div>
        <?php endif; ?>
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
                        <?php if (isset($permissions_group_edit) && $permissions_group_edit):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>permissions/group_edit/<?php echo $group['id'];?>" >Editar</a></div>
                        <?php endif; ?>
                        <?php if (isset($permissions_group_del) && $permissions_group_del):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>permissions/group_del/<?php echo $group['id'];?>" onclick=" return confirm('Deseja realmente excluir esta permissão?')" >Excluir</a></div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
    <div class="tabbody">
        <?php if (isset($permissions_add) && $permissions_add):?>
            <div class="button"><a href="<?php echo BASE_URL; ?>permissions/add">Adicionar</a></div>
        <?php endif; ?>
        <table border="0" width="100%">
            <tr>
                <th>Nome da Permissão</th>
                <th>Ações</th>
            </tr>
            <?php foreach($permissions_all as $permission):?>
                <tr>
                    <td><?php echo utf8_encode($permission['name']); ?></td>
                    <td width="50">
                        <?php if (isset($permissions_del) && $permissions_add):?>
                            <div class="button button_small"><a href="<?php echo BASE_URL;?>permissions/del/<?php echo $permission['id'];?>" onclick="confirm('Deseja realmente excluir esta permissão?')" >Excluir</a></div>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
<?php else :?>
    <?php header("Location: ".BASE_URL); exit; ?>
<?php endif; ?> 

