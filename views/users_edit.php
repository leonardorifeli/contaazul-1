<?php if($user_edit) :?>
    <h1>Editar Usuário</h1>
    <form method="POST">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="<?php echo $user_id['name']; ?>" required autofocus /><br/><br/>

        <label><?php echo $user_id['email']; ?></label><br/><br/>

        <label for="password">Senha</label>
        <input type="password" name="password" id="password" /><br/><br/>

        <select name="id_group">
            <?php foreach($groups_all as $group):?>
            <option value="<?php echo $group['id']; ?>" <?php echo ($user_id['id_group']==$group['id'])?"selected=selected":""; ?>><?php echo $group['name']; ?></option>
            <?php endforeach; ?>
        </select><br/><br/>

        <input type="submit" value="Editar Usuário" />
    </form>
<?php else :?>
    <?php header("Location: ".BASE_URL); ?>
<?php endif; ?>
