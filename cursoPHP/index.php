<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->


<?php
if (isset($_POST['submit']) && $_POST['submit'] == 1) {
    include_once './conexaoBD.php';
    $palavraChave = $_POST['palavaChave'];
    $pdo = conexaoDB();
    $sql = "SELECT * FROM site WHERE palavraChave = :palavraChave ";
    $stm = $pdo->prepare($sql);
    $stm->bindParam('palavraChave', $palavraChave);
    $stm->execute();
    $listaPaginas = $stm->fetchAll(PDO::FETCH_ASSOC);
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
//        include_once './menu.php';
        ?>
        <div>
            <form method="POST" action="">
                <p>
                    Digite a página que procura: <input type="text" name="palavaChave">
                    <button type="submit" value="pesquisar">Pesquisar</button>
                </p>
                <input type="hidden" name="submit" value="1"/>
            </form>
        </div>

        <div>
            <ul class="list-group">
                <?php
                foreach ($listaPaginas as $pagina) {
                    ?>
                    <li class="list-group-item">
                        <a href="<?= $pagina['arquivo'] ?>"><?= $pagina['titulo'] ?></a>
                    </li>
                    <?php
                }
                ?>
            </ul>

        </div>

        <?php
        include_once './rodape.php';
        ?>

    </body>
</html>
