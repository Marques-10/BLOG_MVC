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
                    <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/admin">Login de administradores</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo BASE_URL; ?>/cadastro">Cadastre-se</a>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php

        if (!empty($resposta)) {

            if ($resposta == "success") {
                ?>
                    <div class="alert alert-success">
                        <strong>Parabéns</strong> Cadastrado com sucesso. <a href="<?php echo BASE_URL; ?>/login" class="alert-link">Faça o login agora!</a>
                    </div>
                <?php
            } else if ($resposta == "warning"){
                ?>
                    <div class="alert alert-warning">
                        Este usuário já existe! <a href="<?php echo BASE_URL; ?>/login" class="alert-link">Faça o login agora!</a>
                    </div>
                <?php
            } else if ($resposta == "empty") {
                ?>
                    <div class="alert alert-warning">
                        Preencha todos os campos
                    </div>
                <?php
            } else {
                ?>
                    <div class="alert alert-warning">
                        Erro ao efetuar o cadastro =(
                    </div>
                <?php
            }
        }

        ?>

        <div class="container">
            <h3>Cadastre-se</h3>
            <form method="POST" action="<?php echo BASE_URL; ?>/cadastro/novousuario">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" />
                    
                    <label for="email">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-control" />

                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control" />
                    
                    <br>

                    <input type="submit" value="Cadastrar" class="btn btn-info" />
                </div>
            </form>
        </div>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>