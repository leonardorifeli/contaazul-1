<h1>Adicionar Grupo de Permissões</h1>
<form method="POST">
    <label for="name">Nome do Grupo de Permisssões:</label>
    <input type="text" name="name" id="name" autofocus /><br/><br/>
    <?php foreach($permissions_all as $permission):?>
    <div class="permissions">      
        <input type="checkbox" name="permissions[]" value="<?php echo $permission['id']; ?>" id="p<?php echo $permission['id']; ?>"/>
        <label for="p<?php echo $permission['id']; ?>"><?php echo $permission['name']; ?></label>
    </div>
    <?php endforeach;?>
    <input type="submit" value="Adicionar Grupo de Permisssão" />
</form>
