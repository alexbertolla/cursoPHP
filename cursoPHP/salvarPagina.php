<?php

session_start();
if (!$_SESSION['LOGADO']) {
    header('location:index.php');
    exit();
}

include_once './conexaoBD.php';

print_r($_POST);

$id = $_POST['id'];
$nome = $_POST['nome'];
$arquivo = $_POST['arquivo'];
$titulo = $_POST['titulo'];
$conteudo = $_POST['conteudo'];


$pdo = conexaoDB();
$sql = "UPDATE site SET nome=:nome, arquivo=:arquivo, titulo=:titulo, conteudo=:conteudo WHERE id=:id";
$stm = $pdo->prepare($sql);
$stm->bindParam('id', $id);
$stm->bindParam('nome', $nome);
$stm->bindParam('arquivo', $arquivo);
$stm->bindParam('titulo', $titulo);
$stm->bindParam('conteudo', $conteudo);
$stm->execute();
//print_r($pagina);


header('location:listaPaginas.php');
