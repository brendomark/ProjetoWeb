<?php 

include_once 'verifica_login.php';
include_once 'conexao.php';

if(isset($_SESSION['mensagem'])): ?>
<script>
    //mensagem
    window.onload = function(){
        alert('<?php echo $_SESSION['mensagem'];?>');
    };
</script>

<?php endif;
unset($_SESSION["mensagem"]);

?>