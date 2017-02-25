<h1>Editar Venda</h1>

<strong>Nome do Cliente</strong><br/>
<?php echo $sale['name']; ?><br/><br/>

<strong>Data</strong><br/>
<?php echo date("d/m/Y",strtotime($sale['date_sale'])); ?><br/><br/>

<strong>Total</strong><br/>
<?php echo number_format($sale['total_price'], 2, ",", "."); ?><br/><br/>

<form method="POST">
<strong>Status</strong><br/>
<select name="status">
    <option value="">-Selecione-</option>
    <?php foreach($statuses as $key => $status): ?>
    <option value="<?php echo $key; ?>" <?php echo ($sale['status'] == $key)?"selected=selected":""; ?>><?php echo $status; ?></option>
    <?php endforeach; ?>
</select><br/><br/>
<input type="submit" value="Salvar">
</form>