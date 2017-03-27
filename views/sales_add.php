<h1>Adicionar Venda</h1>
<?php if(!empty($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>
<label for="searchClients">Nome do Cliente</label><br/>
<input type="text" id="searchClients" name="searchClients" data-type="searchClients" autofocus />
<button class="client_add_button">+</button>
<div style="clear: both;"></div><br/>
<form method="POST">
    <input type="hidden" name='id_client' id='id_client'>      
    <label for="status">Status da Venda</label>
    <select name="status" id="status">
        <option value="0">Aguardando Pgto.</option>
        <option value="1">Pago</option>
    </select>
    <br/><br/> 
    <hr/>
    <h4>Produtos</h4>
    <fieldset>
        <legend>Adicionar Produto</legend>
        <input type="text" id="add_prod" data-type="searchProducts" />
    </fieldset>
    <table border="0" width="100%" id="products_table">
        <tr>
            <th>Nome do Produto</th>
            <th>Quantidade</th>
            <th>Preço Unit</th>
            <th>Sub-Total</th>
            <th>Excluir</th>
        </tr>
    </table>
    <hr/>
    <div style="clear:both;"></div>
    <div id="total_price">0,00</div>
    <div class="total">Total: R$</div> 
    <div style="clear:both;"></div><br/>
    <input type="submit" value="Adicionar Venda" />
</form>
<script type="text/javascript">var BASE_URL = "<?php echo BASE_URL; ?>";</script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/sales_add.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>