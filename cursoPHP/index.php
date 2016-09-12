<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
        if ($_GET) {
            $pagina = $_GET['pagina'];

            if (file_exists($pagina)) {
                include_once './' . $pagina;
            } else {
                echo '<p>Página ' . $pagina . ' não existe</p>';
            }
        }
        include_once './rodape.php';
        ?>

    </body>
</html>
