<h1>Adicionar Venda</h1>
<label for="searchClients">Nome do Cliente</label><br/>
<input type="text" id="searchClients" name="searchClients" data-type="searchClients" autofocus />
<button class="client_add_button">+</button>
<div style="clear: both;"></div><br/>
<form method="POST">
    <input type="hidden" name='id_client' id='id_client'>
    <label for="total_price">Preço da Venda</label>
    <input type="text" name="total_price" id="total_price" disabled="disabled" /><br/><br/>       
    <label for="status">Status da Venda</label>
    <select name="status" id="status">
        <option value="0">Aguardando Pgto.</option>
        <option value="1">Pago</option>
    </select>
    <br/><br/>   
    <input type="submit" value="Adicionar Venda" />
</form>
<script type="text/javascript">var BASE_URL = "<?php echo BASE_URL; ?>";</script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/sales_add.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>