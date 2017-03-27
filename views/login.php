<html>
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css"/>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/angular.min.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script.js"></script>
        <title>Login</title>  
    </head>
    <body>
        <div class="loginarea">
            <form method="POST">
                <?php if(!empty($error)): ?>
                    <div class="alert alert-warning"><?php echo $error; ?></div>
                <?php endif;?>
                <input type="email" name="email" class="form-control" value="admin@empresa123.com.br" placeholder="Digite seu e-mail" autofocus />
                <input type="password" name="password" value="123" class="form-control" placeholder="Digite sua senha" />
                <input type="submit" value="Entrar" class="btn btn-info form-control" />
            </form>
        </div>
    </body>
</html>

