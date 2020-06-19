<?php
 if(!isset($_SESSION)){
    session_start();
 }

if(!$_SESSION['usuario']){
    header('location:index.php');
    exit();
    
}
?>