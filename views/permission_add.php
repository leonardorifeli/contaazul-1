<?php if(isset($permissions_add) && $permissions_add) :?>
<h1>Adicionar Permissões</h1>
<form method="POST">
    <label for="name">Nome da Permisssão:</label>
    <input type="text" name="name" id="name" autofocus /><br/><br/>
    <input type="submit" value="Adicionar Permisssão" />
</form>
<?php else :?>
    <?php header("Location: ".BASE_URL); exit; ?>
<?php endif; ?>
