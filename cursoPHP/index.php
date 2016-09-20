<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

function verificarRota() {
    $rota = parse_url('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    $caminho = explode('/', $rota['path']);
    $path = $caminho[count($caminho) - 1];

    if (strlen($path) == 0) {
        $path = 'home';
    }

    $arrRotas = array('home' => 'home.php', 'empresa' => 'empresa.php', 'produtos' => 'produtos.php', 'servicos' => 'servicos.php', 'contato' => 'contato.php');
    $pagina = FALSE;
    foreach ($arrRotas as $chave => $arquivo) {
        if ($path === $chave) {
            $pagina = $arquivo;
            break;
        }
    }

    if (!$pagina) {
        echo '<p>Página ' . $path . ' não existe</p>';
    } else {
        include_once $pagina;
    }
}
?>


<html>
    <head>
        <meta charset="UTF-8">
        <script src="js/bootstrap.js"></script>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <title></title>
    </head>
    <body>
        <?php
        include_once './menu.php';
        verificarRota();
//        $pagina = $path . '.php';
//        if (file_exists($pagina)) {
//            include_once $pagina;
//        } else {
//            echo '<p>Página ' . $pagina . ' não existe</p>';
//        }
        include_once './rodape.php';
        ?>

    </body>
</html>
