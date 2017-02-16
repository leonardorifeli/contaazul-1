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
                    <td width="50">
                        <a href="<?php echo BASE_URL;?>permissions/del/<?php echo $permission['id'];?>" class="button button_small" onclick="confirm('Deseja realmente excluir esta permissão?')" >Excluir</a>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>
