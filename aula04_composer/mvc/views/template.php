<!--Aula 06-->
<html>
    <head>
        <title>Titulo do site</title>
        <!--Aula 08 - Uso da BASE_URL para carregar arquivos .js e .css-->
        <script type="text/javascript" src="/modulo7_1_superavancado/aula02_09_mvc/assets/js"></script>
        <link href="<?php echo BASE_URL; ?>/assets/css/style.css" rel="stylesheet" />
    </head>
    <body>
        <h1>Topo do Site</h1>
        
        <?php $this->loadViewInTemplate($viewName, $viewData); ?>
        
        <h1>Rodape do Site</h1>
    </body>
</html>