<?php
//sessao
session_start();
include('verifica_login.php');
//conexao
require_once 'conexao.php';

if(isset($_POST['btn-cadastrar']));
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
    
$sql = "SELECT * FROM ppessoa WHERE cpf = '{$CPF}'";
$resultado = mysqli_query($conexao, $sql);
$dados = mysqli_fetch_array($resultado);
$ID = $dados["ID"];
$COLIGADA = $dados["CODCOLIGADA"];

$FORMATOS = array("png","jpeg","jpg","gif");
$EXTENSAO = pathinfo($_FILES["imagem"]["name"], PATHINFO_EXTENSION);
    if(in_array($EXTENSAO,$FORMATOS)):
        $PASTA = "fotos_clientes/";
        $TEMP = $_FILES["imagem"]["tmp_name"];
        $novoNome = $CPF.".$EXTENSAO";

        if(move_uploaded_file($TEMP,$PASTA.$novoNome)):
            $_SESSION['mensagem'] = "sucesso!";
        else:    
            $_SESSION['mensagem'] = "Erro!";
        endif;
    else:
        $_SESSION['mensagem'] = "Formato errado!";
    endif;

$sql = "INSERT INTO pfunc(codcoligada,id,nome,dtnasc,naturalidade,nacionalidade,estadocivil,sexo,grauinstrucao,raca,nomepai,nomemae,email,telefone,celular,cpf)
 VALUES('$COLIGADA','$ID',UPPER('$NOME'),STR_TO_DATE('$DATANASC', '%d/%m/%Y'),UPPER('$NATURALIDADE'),UPPER('$NACIONALIDADE'),UPPER('$ESTADOCIVIL'),'$SEXO','$GRAUINSTRUCAO','$RACA',UPPER('$NOMEPAI'),UPPER('$NOMEMAE'),'$EMAIL','$TELEFONE','$CELULAR','$CPF')";

    
    if(mysqli_query($conexao,$sql)){
        $ACESSO=$_SESSION['nivelacesso'];
        if($ACESSO==1){
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('location: lista_func_rh.php');
            exit();
        }else{
            $_SESSION['mensagem'] = "Cadastrado com sucesso!";
            header('location: lista_func.php');
            exit();
        }
        
    }else{
        if($ACESSO==0){
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            header('location: lista_func_rh.php');
            exit();
        }else{
            $_SESSION['mensagem'] = "Erro ao cadastrar!";
            header('location: lista_func.php');
            exit();
        }
    }
?>
