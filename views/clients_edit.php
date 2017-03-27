<?php if($client_edit) :?>
    <h1>Editar Cliente</h1>
    <form method="POST">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="<?php echo $clients['name']; ?>" required autofocus /><br/><br/>

        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo $clients['email']; ?>" id="email"  /><br/><br/>

        <label for="phone">Telefone</label>
        <input type="phone" name="phone" id="phone" value="<?php echo $clients['phone']; ?>" onkeyup="maskTel(this)" /><br/><br/>

        <label for="address_zipcode">Cep</label>
        <input type="text" id="address_zipcode" name="address_zipcode" value="<?php echo $clients['address_zipcode']; ?>" onkeyup="maskCep(this); getCep(this);" maxlength="9"/><br/><br/>

        <label for="address">Logradouro</label>
        <input type="text" name="address" value="<?php echo $clients['address']; ?>" id="address" /><br/><br/>

        <label for="address_number">Número</label>
        <input type="text" name="address_number" value="<?php echo $clients['address_number']; ?>" id="address_number" /><br/><br/>

        <label for="address_complement">Complemento</label>
        <input type="text" name="address_complement" value="<?php echo $clients['address_complement']; ?>" id="address_complement" /><br/><br/>

        <label for="address_neighborhood">Bairro</label>
        <input type="text" name="address_neighborhood" value="<?php echo $clients['address_neighborhood']; ?>" id="address_neighborhood" /><br/><br/>

        <label for="address_city">Cidade</label>
        <input type="text" name="address_city" value="<?php echo $clients['address_city']; ?>" id="address_city" /><br/><br/>

        <label for="address_state">Estado</label>
        <input type="text" name="address_state" value="<?php echo $clients['address_state']; ?>" id="address_state" /><br/><br/>

        <label for="address_uf">UF</label>
        <select name="address_uf" name="address_uf" id="address_uf">
            <option  value="<?php echo $clients['address_uf']; ?>"><?php echo $clients['address_uf']; ?></option>
        </select><br/><br/>

        <label for="address_country">País</label>
        <input type="text" name="address_country" value="<?php echo $clients['address_country']; ?>" id="address_country" /><br/><br/>

        <label for="stars">Estrelas</label>
        <select name="stars" id="stars">
            <option value="1" <?php echo ($clients['stars'] == '1')?"selected=selected":""; ?>>1</option>
            <option value="2" <?php echo ($clients['stars'] == '2')?"selected=selected":""; ?>>2</option>
            <option value="3" <?php echo ($clients['stars'] == '3')?"selected=selected":""; ?>>3</option>
            <option value="4" <?php echo ($clients['stars'] == '4')?"selected=selected":""; ?>>4</option>
            <option value="5" <?php echo ($clients['stars'] == '5')?"selected=selected":""; ?>>5</option>
        </select>
        <br/><br/>

        <label for="internal_observation">Observações Internas</label>
        <textarea name="internal_observation" id="internal_observation"><?php echo $clients['internal_observation']; ?> </textarea><br/><br/>

        <input type="submit" value="Editar Cliente" />
    </form>
<?php else :?>
    <?php header("Location: ".BASE_URL."clients"); exit;?>
<?php endif; ?>



