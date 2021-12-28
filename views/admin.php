<?php

// echo "<pre>";

// print_r($posts);

// echo "</pre>";

?>

<html>
    <head>
        <title>Bis2Bis</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/style.css">
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/bootstrap.min.css">
    </head>
    <body>

        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="<?php echo BASE_URL; ?>">BLOG</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/admin">Administrador: <?php echo $_SESSION['adminName']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/logout">Deslogar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
            <h3>Meus Posts</h3>

            <a href="<?php echo BASE_URL; ?>/admin/adicionar" class="btn btn-success mb-3">Adicionar Post</a>
        
            <?php
    
            if (isset($posts['status'])) {

                ?>
                    <div class="alert alert-success">
                        Post adicionado com sucesso!
                    </div>
                <?php

            }
            
            ?>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Título</th>
                        <th>Sub-título</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php
                    foreach($posts as $post):
                        if (isset($post['post_title'])) {
                ?>
                    <tr>
                        <td>
                            <?php if( !empty($post['url']) ): ?>
                                <img src="<?php echo BASE_URL . "/assets/images/posts/" . $post['url']; ?>" height="100px" border="0">
                            </td>
                            <?php else: ?>
                                <img src="<?php echo BASE_URL . "/assets/images/posts/default.jpg"; ?>" height="100px" border="0">
                            <?php endif; ?>
                        </td>
                        <td width="150px">
                            <?php echo $post['post_title']; ?>
                        </td>
                        <td width="170px">
                            <?php echo $post['post_subtitle']; ?>
                        </td>
                        <td>
                            <?php echo $post['post_description']; ?>
                        </td>
                        <td width="180px">
                            <a href="<?php echo BASE_URL; ?>/admin/editar/<?php echo $post['id']; ?>" class="btn btn-primary">Editar</a>
                            <a href="<?php echo BASE_URL; ?>/admin/excluir/<?php echo $post['id']; ?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>
                <?php 
                        }
                    endforeach; ?>
            </table>
        </div>
        
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>