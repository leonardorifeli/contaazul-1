<h1>Relatório de Vendas</h1>
<form method="GET" onsubmit="return openPopUp(this)">

    <div class="report-grid-4">
        <input type="text" name="client_name" autofocus class="form-control" placeholder="Nome do Cliente">
    </div>
    <div class="report-grid-4">
        <input type="date" name="period1" class="form-control"><br/>
        Até:<br/>
        <input type="date" name="period2" class="form-control"><br/>
    </div>
    <div class="report-grid-4">
        <select name="status" class="form-control">
            <option value="">Todos os Status</option>
            <?php foreach($statuses as $key => $s): ?>
                <option value="<?=$key?>"><?=$s?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="report-grid-4">
        <select name="order" class="form-control">
            <option value="">Ordenação</option>
            <option value="date_desc">Mais Recente</option>
            <option value="date_asc">Mais Antigo</option>
            <option value="status">Status da Venda</option>
        </select>
    </div>

    <div class="clearfix"></div>

    <input type="submit" value="Gerar Relatório">

</form>

<script type="text/javascript" src="<?=BASE_URL?>assets/js/reports_sales.js"></script>