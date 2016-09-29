<?php
include_once './conexaoBD.php';


$usuario = $_POST['usuario'];
$senha = $_POST['senha'];


$conn = conexaoDB();
$sql = 'select * from login where usuario=:usuario';
$stm = $conn->prepare($sql);
$stm->bindParam('usuario', $usuario);
$stm->execute();
$login = $stm->fetch(PDO::FETCH_ASSOC);

session_start();
if ($login && password_verify($senha, $login['senha'])) {
    $_SESSION['LOGADO'] = TRUE;
    header('location:listaPaginas.php');
} else {
    $_SESSION['LOGADO'] = FALSE;
//    header('location:index.php');
    echo 'LOGIN INVÁLIDO!';
}

