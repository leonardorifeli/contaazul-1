<h1>Permissões</h1>

<div class="tabarea">
    <div class="tabitem activetab">Grupo de Permissões</div>
    <div class="tabitem">Permissões</div>
</div>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        GRUPOS DE PERMISSÕES
    </div>
    <div class="tabbody">
        <div class="button"><a href="<?php echo BASE_URL; ?>permissions/add">Adicionar</a></div>
        <table border="0" width="100%">
            <tr>
                <th>Nome da Permissão</th>
                <th>Ações</th>
            </tr>
            <?php foreach($user['permissions'] as $permission):?>
                <tr>
                    <td><?php echo utf8_encode($permission['name']); </td>
                    <td>
                        <a href="<?php echo BASE_URL;?>permissions/edit/<?php echo $permission['id'];?>">Editar</a>
                        <a href="<?php echo BASE_URL;?>permissions/del/<?php echo $permission['id'];?>">Excluir</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
