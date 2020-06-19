<?php
//sessao
session_start();
include('verifica_login.php');
//conexao
require_once 'conexao.php';

if(isset($_POST['btn-cadastrar']));
$ID = $_SESSION['id_user'];
$NOME = mysqli_escape_String($conexao, $_POST['nome']);
$CPF = mysqli_escape_String($conexao, $_POST['cpf']);
$SENHA = mysqli_escape_String($conexao, $_POST['password']);
$EMAIL = mysqli_escape_String($conexao, $_POST['email']);

$sql = "INSERT INTO usuarios(id,nome,cpf,senha,email)
 VALUES('$ID',UPPER('$NOME'),'$CPF',$SENHA,'$EMAIL')";

    
    if(mysqli_query($conexao,$sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('location: painelrh.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar, favor entrar em contato com RH";
        header('location: painelrh.php');
    endif;
?>
