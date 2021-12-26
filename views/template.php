<html>
    <head>
        <title>Bis2Bis</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css">
    </head>
    <body>
        <div class="app">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">BLOG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION['adminLogged']) && !empty($_SESSION['adminLogged'])): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Bem-vindo: <?php echo $_SESSION['adminName']; ?></a>
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
        </nav>
        
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
            
        </div>
        
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>