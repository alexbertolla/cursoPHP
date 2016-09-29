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
        <div>
            <form method="POST" action="efetuarLogin.php">
                Usuário <input type="text" name="usuario">
                Senha <input type="password" name="senha">
                <button type="submit">Entrar</button>
            </form>
        </div>
    </body>
</html>
