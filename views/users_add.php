<?php if($user_add) :?>
    <h1>Adicionar Usuário</h1>
    <?php if(!empty($error)): ?>
    <div class="alert alert-warning"><?php echo $error; ?></div>
    <?php endif; ?>
    <form method="POST">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required autofocus /><br/><br/>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" required /><br/><br/>

        <label for="password">Senha</label>
        <input type="password" name="password" id="password" required /><br/><br/>

        <select name="id_group">
            <?php foreach($groups_all as $group):?>
            <option value="<?php echo $group['id']; ?>"><?php echo $group['name']; ?></option>
            <?php endforeach; ?>
        </select><br/><br/>

        <input type="submit" value="Adicionar Usuário" />
    </form>
<?php else :?>
    <?php header("Location: ".BASE_URL); ?>
<?php endif; ?>

