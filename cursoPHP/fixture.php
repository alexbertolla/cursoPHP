<?php

include_once './conexaoBD.php';


try {
    
$conn = conexaoDB();
echo "## INICIO ##<br>";
echo "removendo tabela páginas";
$conn->query('DROP TABLE IF EXISTS site;');
echo "-OK <br>";

echo "criando tabela de páginas";
$conn->query('CREATE TABLE site (
  id int(11) NOT NULL AUTO_INCREMENT,
  nome text,
  arquivo text,
  titulo text,
  conteudo text,
  PRIMARY KEY (`id`));
  ');
echo "-OK <br>";

echo "inserindo dados na tabela da páginas";
$sql = 'INSERT INTO site (nome, arquivo, titulo) VALUES '
        . '(\'home\',\'home.php\',\'Home\'),'
        . '(\'contato\',\'contato.php\',\'Contato\'), '
        . '(\'empresa\',\'empresa.php\',\'Empresa\'),'
        . '(\'produto\',\'produto.php\',\'Produto\'),'
        . '(\'telefone\',\'telefone.php\',\'Telefone\'),'
        . '(\'email\',\'email.php\',\'Email\'); ';
$stm = $conn->prepare($sql);
$stm->execute();
echo "-OK <br>";

echo "removendo tabela login";
$conn->query('DROP TABLE IF EXISTS login;');
echo "-OK <br>";

echo "criando tabela de login";
$conn->query('CREATE TABLE login (
  usuario text,
  senha text);
  ');
echo "-OK <br>";


echo "inserindo dados na tabela da login";
$usuario = 'admin';
$senha = password_hash('admin', PASSWORD_DEFAULT);
$sql = "insert into login (usuario, senha) values (:usuario, :senha);";
$stm = $conn->prepare($sql);
$stm->bindParam('usuario', $usuario);
$stm->bindParam('senha', $senha);
$stm->execute();
echo '## FIM ##';
} catch (PDOException $ex) {
    echo $ex->getMessage();
}