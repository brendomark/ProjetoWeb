<?php 
    session_start();
?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Quality - RH</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<style>
			.container {
			  position: relative;
			}
			.center {
				display: block;
  				margin-left: auto;
  				margin-right: auto;
				width: 20%;
				text-align:center;
				background: rgba(210, 215, 217, 0.1);
				border-radius: 0.375em;
				border: solid 2px rgba(210, 215, 217, 0.1);
				content: '';
					}
			img { 
			  width: 20%;
			  height: auto;
			  }
			</style>
	</head>
	<body class="is-preload">

		<div id="wrapper">
			<div id="main">
				<div class="inner">
						<header id="header">
						<span class="label"><img src="logo/logo.png" alt="" /></span> 
						</header>

						<section>
							<div class="container">
								<div class="center">
									<?php 
										if(isset($_SESSION['nao_autenticado'])):
									?>
										<div class="notification is-danger">
											<p>Usuário ou senha inválidos.</p>
										</div>
									<?php 
										endif;
										unset($_SESSION['nao_autenticado']);
									?>

									<form method="POST" action="login.php">
										<div class="col-2 col-12-xsmall">
											<h5>Login</h5>
											<input type="text" name="usuario" id="usuario" value="" placeholder="Usuario"/>
										</div>
										</br>
										<div class="col-4 col-12-xsmall">
											<h5>Senha</h5>
											<input type="password" name="senha" id="senha" value="" placeholder="Senha"/>
										</div>
										</br>
										<div class="col-4 col-12-xsmall">
											<input type="submit" value="Logar" class="primary" />
										</div>
										</br>	
										<a href="redefinir.php">Redefinir senha</a>
									</form>

								</div>
							</div>
						</section>
				</div>
			</div>
		</div>

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>	
</html>