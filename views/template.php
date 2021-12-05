<html>
    <head>
        <title>Bis2Bis</title>
        <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>/assets/css/style.css">
    </head>
    <body>
        <h1>Sistema de blog</h1>
        <a href="<?php echo BASE_URL; ?>">Home</a>
        <hr>
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>

        <script type="text/javascript" src="<?php echo BASE_URL; ?>/assets/js/script.js"></script>
    </body>
</html>