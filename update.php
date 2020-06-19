<?php
//sessao
session_start();
include('verifica_login.php');
//conexao
require_once 'conexao.php';

if(isset($_POST['btn-editar']));

$nome = mysqli_escape_String($conexao, $_POST['nome']);
$naturalidade = mysqli_escape_String($conexao, $_POST['naturalidade']);
$dtnasc = mysqli_escape_String($conexao, $_POST['dtnasc']);

$CPF = $_SESSION['cpf'];
$sql = "UPDATE pfunc set NOME = UPPER('$nome'), DTNASC= STR_TO_DATE('$dtnasc', '%d/%m/%Y'), NATURALIDADE= UPPER('$naturalidade') WHERE CPF = '{$CPF}' ";



    if(mysqli_query($conexao,$sql)):
        $_SESSION['mensagem'] = "Atualizado com sucesso!";
        header('location: lista_func.php');
    else:
        $_SESSION['mensagem'] = "Erro ao Atualizar!";
        header('location: lista_func.php');
    endif;
?>
