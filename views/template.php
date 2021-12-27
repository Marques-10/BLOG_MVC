<html>
    <head>
        <title>Bis2Bis</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css">
    </head>
    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">BLOG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Posts</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contato</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <?php if (isset($_SESSION['adminLogged']) && !empty($_SESSION['adminLogged'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bem-vindo: <?php echo $_SESSION['adminName']; ?></a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/admin">Posts</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/logout">Deslogar</a>
                            </li>
                        <?php elseif (isset($_SESSION['userLogged']) && !empty($_SESSION['userLogged'])): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Bem-vindo: <?php echo $_SESSION['userName']; ?></a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/logout">Deslogar</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/admin">Login de administradores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/cadastro">Cadastre-se</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>