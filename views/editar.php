<?php 

// echo "<pre>";

// print_r($data);

// echo "</pre>";

// exit;

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
                            <a class="nav-link" href="#">Administrador: <?php echo $_SESSION['adminName']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo BASE_URL; ?>/logout">Deslogar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
        <h1>Meus Posts - Editar posts</h1>

            <form method="POST" enctype="multipart/form-data" action="<?php echo BASE_URL; ?>/admin/atualizar/<?php echo $data['id'] ?>">
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" name="titulo" id="titulo" class="form-control" value="<?php echo $data['post_title']; ?>">
                </div>
                <div class="form-group">
                    <label for="subtitulo">Sub-título:</label>
                    <input type="text" name="subtitulo" id="subtitulo" class="form-control" value="<?php echo $data['post_subtitle'];?>">
                </div>
                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea name="description" id="description" class="form-control"><?php echo $data['post_description'];?></textarea>
                </div>

                <div class="form-group">
                    <label for="add_foto">Alterar foto do Post:</label>
                    <input type="file" name="foto[]" multiple /><br>

                    <div class="panel panel-default mt-4">
                        <div class="panel-heading">Foto atual do Post:</div>
                        <div class="panel-body">
                            <?php foreach($data['fotos'] as $foto): ?>
                                <div class="foto_item">
                                    <img src="<?php echo BASE_URL."/assets/images/posts/".$foto['url']; ?>" width="400px" class="img-thumbnail" border="0"><br>
                                    <a class="btn btn-danger mt-4" href="<?php echo BASE_URL; ?>/admin/deletarfoto/<?php echo $foto['id']; ?>">Excluir Imagem</a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <input type="submit" value="Salvar" class="btn btn-info">
            </form>
        </div>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/jQuery.js"></script>
        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/bootstrap.min.js"></script>
    </body>
</html>