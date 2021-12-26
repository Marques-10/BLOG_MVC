<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

        <title>Signin Template for Bootstrap</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="<?php echo BASE_URL; ?>/assets/css/signin.css" rel="stylesheet">
    </head>

    <body class="text-center">
        <form class="form-signin" action="authAdmin" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Login Administradores</h1>
        <div class="form-group">
            <label for="inputEmail" class="sr-only">Email</label>
            <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus> -->
            <input type="email" 
                id="inputEmail" 
                class="form-control <?php echo(isset($email_wrong) && $email_wrong ? "is-invalid" : ""); ?>" 
                name="email" 
                placeholder="Email"
                value="<?php echo(!isset($email_wrong) && isset($email_ok) ? $email_ok : ""); ?>"
                <?php echo(!isset($email_wrong) && isset($email_ok) ? "" : "autofocus"); ?>
            />
        </div>
        <div class="form-group">
            <label for="inputPassword" class="sr-only">Senha</label>
            <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required> -->
            <input type="password" 
                id="inputPassword" 
                class="form-control <?php echo(isset($password_wrong) && $password_wrong ? "is-invalid" : ""); ?>" 
                name="password" 
                placeholder="Senha"
                <?php echo(!isset($password_wrong) && !empty($password_wrong) ? "" : "autofocus"); ?>
            />
        </div>
        <div class="checkbox mb-3">
            <label>
            <input type="checkbox" value="remember-me"> Lembrar
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
        <a class="btn btn-lg btn-default btn-block text-danger" href="<?php echo BASE_URL; ?>">Voltar</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
        
        <!-- <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label text-danger">Password</label>
            <div class="col-sm-7">
                <input type="password" class="form-control is-invalid" id="inputPassword" placeholder="Password">
            </div>
            <div class="col-sm-3">
                <small id="passwordHelp" class="text-danger">
                Must be 8-20 characters long.
                </small>      
            </div>
        </div> -->

        </form>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>