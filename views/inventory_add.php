<h1>Adicionar Produto</h1>
<form method="POST">
    <label for="name">Nome</label>
    <input type="text" name="name" id="name" required autofocus /><br/><br/>
    
    <label for="price">Preço</label>
    <input type="text" name="price" id="price" required /><br/><br/>
    
    <label for="quantity">Quantidade</label>
    <input type="number" name="quantity" id="quantity" required /><br/><br/>
    
    <label for="min_quantity">Quantidade Mínima</label>
    <input type="number" name="min_quantity" id="min_quantity" required /><br/><br/>
    
    <input type="submit" value="Adicionar Produto" />
</form>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script_inventory_add.js"></script>

