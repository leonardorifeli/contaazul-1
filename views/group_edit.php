<h1>Editar Grupo de Permissões</h1>
<form method="POST">
    <label for="name">Nome do Grupo de Permisssões:</label>
    <input type="text" name="name" id="name" value="<?php echo $group['name']; ?>" autofocus /><br/><br/>
    <?php foreach($permissions_all as $permission):?>
    <div class="permissions">      
        <input type="checkbox" name="permissions[]" value="<?php echo $permission['id']; ?>" id="p<?php echo $permission['id']; ?>" <?php echo (in_array($permission['id'], $permissions_group))?"checked=checked":""; ?>/>
        <label for="p<?php echo $permission['id']; ?>"><?php echo $permission['name']; ?></label>
    </div>
    <?php endforeach;?>
    <input type="submit" value="Editar Grupo de Permisssão" />
</form>
