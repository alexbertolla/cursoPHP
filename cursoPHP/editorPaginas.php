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
        <script src="//cdn.ckeditor.com/4.5.11/full/ckeditor.js"></script>
    </head>
    <body>
        <?php
        session_start();
        if (!$_SESSION['LOGADO']) {
            header('location:index.php');
            exit();
        }
        
        
        include_once './conexaoBD.php';
        $nome = $_REQUEST['nome'];
        $pdo = conexaoDB();
        $sql = "SELECT * FROM site WHERE nome = :nome ";
        $stm = $pdo->prepare($sql);
        $stm->bindParam('nome', $nome);
        $stm->execute();
        $pagina = $stm->fetch(PDO::FETCH_ASSOC);
        ?>
        <form method="POST" action="salvarPagina.php">
            <input type="hidden" name="id" value="<?= $pagina['id'] ?>"/>
            <input type="hidden" name="nome" value="<?= $pagina['nome'] ?>"/>
            <input type="hidden" name="arquivo" value="<?= $pagina['arquivo'] ?>"/>
            <input type="hidden" name="titulo" value="<?= $pagina['titulo'] ?>"/>
            <h1 align="center"><?= $pagina['titulo'] ?></h1>
            <textarea id="conteudo" name="conteudo"><?= $pagina['conteudo'] ?></textarea>
            <button type="submit">Salvar</button>
        </form>
        <script>CKEDITOR.replace('conteudo')</script>
    </body>
</html>
