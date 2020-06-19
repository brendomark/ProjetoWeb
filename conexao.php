<?php 
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'base');

/*CONEXAO COM O BANCO*/
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Não foi possivel conectar');
mysqli_set_charset($conexao,"utf-8");
?>