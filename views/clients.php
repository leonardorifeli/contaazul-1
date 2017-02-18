<h1>Clientes</h1>

<div class="tabcontent">
    <div class="tabbody" style="display: block;">
        <div class="button"><a href="<?php echo BASE_URL; ?>clients/add">Adicionar Cliente</a></div>
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
                        <div class="button button_small"><a href="<?php echo BASE_URL;?>clients/edit/<?php echo $client['id'];?>" >Editar</a></div>
                        <div class="button button_small"><a href="<?php echo BASE_URL;?>clients/del/<?php echo $client['id'];?>" onclick=" return confirm('Deseja realmente excluir este usuário?')" >Excluir</a></div>
                    </td>
                </tr>
            <?php endforeach;?>
        </table>
    </div>
</div>


