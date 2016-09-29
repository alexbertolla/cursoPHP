<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div>
            <ul class="list-group">
                <?php
                session_start();
                if (!$_SESSION['LOGADO']) {
                    header('location:index.php');
                    exit();
                }


                include_once './conexaoBD.php';
                $pdo = conexaoDB();
                $nome = 'empresa';
                $sql = "SELECT * FROM site";
                $stm = $pdo->prepare($sql);
                $stm->bindParam('nome', $nome);
                $stm->execute();
                $paginas = $stm->fetchAll(PDO::FETCH_ASSOC);

                foreach ($paginas as $pagina) {
                    ?>


                    <li class="list-group-item">
                        <a href="editorPaginas.php?nome=<?= $pagina['nome'] ?>"><?= $pagina['titulo'] ?></a>
                    </li>



                    <?php
                }
                ?>
            </ul>
        </div>
    </body>
</html>
