<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/template.css"/>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript">var BASE_URL = "<?php echo BASE_URL; ?>";</script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/angular.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
        <title>Painel - <?php echo $company['name']; ?></title>  
    </head>
    <body>
        <div class="leftmenu">      
            <div class="company_name"><?php echo $company['name']; ?></div>
            <div class="menuarea">
                <ul>
                    <li><a href="<?php echo BASE_URL; ?>">Home</a></li> 
                    <?php  foreach($user['permissions'] as $permission){
                         if (in_array("permissions",$permission)):?>
                        <li><a href="<?php echo BASE_URL; ?>permissions">Permissões</a></li>
                    <?php endif;} ?>  
                    <?php  foreach($user['permissions'] as $permission){
                         if (in_array("users",$permission)):?>
                        <li><a href="<?php echo BASE_URL; ?>users">Usuários</a></li>
                    <?php endif;} ?>
                    <?php  foreach($user['permissions'] as $permission){
                         if (in_array("clients",$permission)):?>
                        <li><a href="<?php echo BASE_URL; ?>clients">Clientes</a></li>
                    <?php endif;} ?>
                    <?php  foreach($user['permissions'] as $permission){
                         if (in_array("inventory",$permission)):?>
                        <li><a href="<?php echo BASE_URL; ?>inventory">Estoque</a></li>
                    <?php endif;} ?> 
                    <?php  foreach($user['permissions'] as $permission){
                         if (in_array("sales",$permission)):?>
                        <li><a href="<?php echo BASE_URL; ?>sales">Vendas</a></li>
                    <?php endif;} ?> 
                    <?php  foreach($user['permissions'] as $permission){
                         if (in_array("puchases",$permission)):?>
                        <li><a href="<?php echo BASE_URL; ?>puchases">Compras</a></li>
                    <?php endif;} ?> 
                </ul>
            </div>
        </div>  
        <div class="containe">   
            <div class="top"> 
                <div class="top_right"><a href="<?php echo BASE_URL; ?>login/logOut">Sair</a></div>
                <div class="top_right"><?php echo $user['name']; ?></div>    
            </div>  
            <div class="area">
                <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            </div>       
        </div> 
    </body>
</html>
