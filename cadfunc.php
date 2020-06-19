<?php
//sessao
session_start();
include('verifica_login.php');
//conexao
require_once 'conexao.php';

if(isset($_POST['btn-cadastrar']));
$ID = $_SESSION['id_user'];
$NOME = mysqli_escape_String($conexao, $_POST['nome']);
$DATANASC = mysqli_escape_String($conexao, $_POST['dtnasc']);
$NATURALIDADE = mysqli_escape_String($conexao, $_POST['naturalidade']);
$NACIONALIDADE = mysqli_escape_String($conexao, $_POST['nacionalidade']);
$ESTADOCIVIL = mysqli_escape_String($conexao, $_POST['estadocivil']);
$SEXO = mysqli_escape_String($conexao, $_POST['sexo']);
$GRAUINSTRUCAO = mysqli_escape_String($conexao, $_POST['grauinstrucao']);
$RACA = mysqli_escape_String($conexao, $_POST['raca']);
$NOMEPAI = mysqli_escape_String($conexao, $_POST['nomepai']);
$NOMEMAE = mysqli_escape_String($conexao, $_POST['nomemae']);
$EMAIL = mysqli_escape_String($conexao, $_POST['email']);
$TELEFONE = mysqli_escape_String($conexao, $_POST['telefone']);
$CELULAR = mysqli_escape_String($conexao, $_POST['celular']);
$CPF = mysqli_escape_String($conexao, $_POST['cpf']);


$sql = "INSERT INTO pfunc(id,nome,dtnasc,naturalidade,nacionalidade,estadocivil,sexo,grauinstrucao,raca,nomepai,nomemae,email,telefone,celular,cpf)
 VALUES('$ID',UPPER('$NOME'),STR_TO_DATE('$DATANASC', '%d/%m/%Y'),UPPER('$NATURALIDADE'),UPPER('$NACIONALIDADE'),UPPER('$ESTADOCIVIL'),'$SEXO','$GRAUINSTRUCAO','$RACA',UPPER('$NOMEPAI'),UPPER('$NOMEMAE'),'$EMAIL','$TELEFONE','$CELULAR','$CPF')";

    
    if(mysqli_query($conexao,$sql)):
        $_SESSION['mensagem'] = "Cadastrado com sucesso!";
        header('location: lista_func.php');
    else:
        $_SESSION['mensagem'] = "Erro ao cadastrar, favor entrar em contato com RH";
        header('location: lista_func.php');
    endif;
?>
