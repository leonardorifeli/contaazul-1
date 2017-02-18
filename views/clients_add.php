<h1>Adicionar Cliente</h1>
<form method="POST">
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" required autofocus /><br/><br/>
    
    <label for="email">Email</label>
    <input type="email" name="email" id="email"  /><br/><br/>
    
    <label for="phone">Telefone</label>
    <input type="phone" name="phone" id="phone" onkeyup="maskTel(this)" /><br/><br/>
    
    <label for="address_zipcode">Cep</label>
    <input type="text" id="address_zipcode" name="address_zipcode" onkeyup="maskCep(this); getCep(this);" maxlength="9"/><br/><br/>
    
    <label for="address">Logradouro</label>
    <input type="text" name="address" id="address" /><br/><br/>

    <label for="address_number">Número</label>
    <input type="text" name="address_number" id="address_number" /><br/><br/>
    
    <label for="address_complement">Complemento</label>
    <input type="text" name="address_complement" id="address_complement" /><br/><br/>
    
    <label for="address_neighborhood">Bairro</label>
    <input type="text" name="address_neighborhood" id="address_neighborhood" /><br/><br/>
    
    <label for="address_city">Cidade</label>
    <input type="text" name="address_city" id="address_city" /><br/><br/>
    
    <label for="address_state">Estado</label>
    <input type="text" name="address_state" id="address_state" /><br/><br/>
    
    <label for="address_uf">UF</label>
    <select name="address_uf" name="address_uf" id="address_uf"></select><br/><br/>
    
    <label for="address_country">País</label>
    <input type="text" name="address_country" id="address_country" /><br/><br/>
       
    <label for="stars">Estrelas</label>
    <select name="stars" id="stars">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3" selected="selected">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
    </select>
    <br/><br/>
    
    <label for="internal_observation">Observações Internas</label>
    <textarea name="internal_observation" id="internal_observation"></textarea><br/><br/>
    
    <input type="submit" value="Adicionar Cliente" />
</form>
