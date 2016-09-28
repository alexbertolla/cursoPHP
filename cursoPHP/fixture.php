<?php

include_once './conexaoBD.php';

$conn = conexaoDB();

echo "## INICIO ##<br>";
echo "removendo tavela";
$conn->query('DROP TABLE IF EXISTS site;');
echo "-OK <br>";

echo "criando tavela";
$conn->query('CREATE TABLE site (
  id int(11) NOT NULL AUTO_INCREMENT,
  palavraChave text,
  arquivo text,
  titulo text,
  PRIMARY KEY (`id`));
  ');
echo "-OK <br>";

echo "inserindo dados";
$sql = 'INSERT INTO site (palavraChave, arquivo, titulo) VALUES '
        . '(\'home\',\'home.php\',\'Home\'),'
        . '(\'contato\',\'contato.php\',\'Contato\'), '
        . '(\'empresa\',\'empresa.php\',\'Empresa\'),'
        . '(\'produto\',\'produto.php\',\'Produto\'),'
        . '(\'telefone\',\'telefone.php\',\'Telefone\'),'
        . '(\'email\',\'email.php\',\'Email\'); ';
$stm = $conn->prepare($sql);
$stm->execute();
echo "-OK <br>";


echo '## FIM ##';
