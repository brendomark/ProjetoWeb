<?php 
    session_start();
    include_once 'conexao.php';
    
  /*  if (isset($_POST['email'])){

        $email = $mysqli->escape_string($_POST['email']);
             
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
             $erro[]= "email invalido";
            }

        if(count($erro) == 0){

            $novasenha = substr(md5(time()),0,6);
            $nscriptografada = md5(md5($novasenha));
           
            if(mail($email, "Sua nova senha", "Sua nova senha: ".$novasenha)){
                $sql_code = "UPDATE USUARIOS SET senha = '$nscriptografada' WHERE email ='$email'";
                $sql_query = $mysqli->query($sql_code) or die($mysqli->erro);
            }
        }
    }*/
?>

<!DOCTYPE html>
<html>
    
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema quality</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/bulma.min.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
</head>


<body>
    <section class="hero is-success is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="column is-4 is-offset-4">
                     <div class="box">
                        <form action="index.php" method="POST">
                            <div class="field">
                                <div class="control">
                                    <input name="email" class="input is-large" placeholder="E-mail" autofocus="">
                                </div>
                            </div>
                                    <button type="submit" id="redefinir" class="button is-block is-link is-large is-fullwidth">Redefinir</button>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
		
		$("#redefinir").click(function () {
			alert("novas senha enviado para o email")
			
		});
	</script>
</body>

</html>