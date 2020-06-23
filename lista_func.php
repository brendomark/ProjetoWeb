<?php 
session_start();
include('verifica_login.php');
include_once 'conexao.php';
include_once 'mensagem.php';
?>
<!DOCTYPE HTML>

<html>

<head>
	<title>Quality - RH</title>
	<meta charset="utf-8" />
	<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/stylesheet.css"/>
    
	

</head>

<body class="is-preload">

	<!-- Wrapper -->
	<div id="wrapper">

		<!-- Main -->
		<div id="main">
			<div class="inner">

				<!-- Header -->
				<header id="header">
					<a href="#" class="logo"><strong>Formulario</strong> de adimissão</a>
					<ul class="icons">
						<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
						<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>

					</ul>
				</header>


				<section>

						<div class = "row">
						<div class = "col s12 m6 push-m3">
							<h3 class = "light">Funcionario</h3>
							<table class = "striped">
								<thead>
									<tr>
										<th>Nome:</th>
										<th>Data nascimento:</th>
										<th>Naturalidade:</th>
										<th>Estado Civil:</th>
										<th>Nacionalidade:</th>
										<th>CPF:</th>
									</tr>
								</thead>

								<tbody>
									<?php 
									$cpf = $_SESSION['cpf'];
									$sql = "SELECT 
												*
											FROM 
												PFUNC FUN 
												INNER JOIN PCODNACAO NACAO ON FUN.NACIONALIDADE = NACAO.CODIGO 
												INNER JOIN ESTADOCIVIL CIVIL ON FUN.ESTADOCIVIL = CIVIL.ID
												inner join ppessoa pes on pes.cpf = fun.cpf
											where fun.cpf = '{$cpf}'";
									$resultado = mysqli_query($conexao, $sql);
									while($dados = mysqli_fetch_array($resultado)):
									?>
										<tr>
											<td><?php echo $dados['NOME'];?></td>
											<?php 
												$data = $dados['DTNASC'];
												$dataP = explode('-', $data);
												$dataParaExibir = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
											?>
											<td><?php echo $dataParaExibir ;?></td>
											<td><?php echo $dados['NATURALIDADE'];?></td>
											<td><?php echo utf8_encode($dados['descricao'])?></td>
											<td><?php echo utf8_encode($dados['nacao']);?></td>
											<td><?php echo $dados['CPF'];?></td>
											<td> <a href = "editar.php?id=<?php echo $dados['id'];?>" class = "btn-floating orange"><i class ="material-icons">edit</i></a></td>
											
										</tr>
									<?php endwhile; ?>
								</tbody>
							</table>
							 
						</div>

					</div>
				</section>

			</div>
		</div>

		<!-- Sidebar -->
		<div id="sidebar">
			<div class="inner">

				<!-- Search -->
				<section id="search" class="alt">
					<form method="post" action="#">
						<input type="text" name="query" id="query" placeholder="Search" />
					</form>
				</section>

				<!-- Menu -->
				<nav id="menu">
					<header class="major">
						<h2>Menu</h2>
					</header>
					<ul>
						<li><a href="painel.php">Inicio</a></li>
						<li><a href="elements.php">Alterar senha</a></li>
						<li>
							<span class="opener">Sair</span>
							<ul>
								<li><a href="fechar.php">Logout</a></li>
							</ul>
						</li>
					</ul>
				</nav>

				<section>
					<header class="major">
						<h2>Quality RH</h2>
					</header>
					<p>A Quality RH é uma empresa com foco estratégico em Recursos Humanos, trabalhando como extensão do
						cliente e aprimorando a gestão da Folha de Pagamento. Com expertise nos segmentos de Óleo e Gás,
						Tecnologia da Informação, Advocacia, Indústria e Empregadores Domésticos.</p>
					<ul class="contact">
						<li class="icon solid fa-envelope"><a href="#">contato@qualityrhrio.com.br</a></li>
						<li class="icon solid fa-phone">(21) 3559-3936</li>
						<li class="icon solid fa-home">
							R. Eng. Enaldo Cravo Peixoto,<br />
							215 - Sala 908 a 910 -
							<br />
							Tijuca, Rio de Janeiro - RJ, 20540-106
						</li>
					</ul>
				</section>

				<!-- Footer -->
				<footer id="footer">
					<p class="copyright">&copy; Untitled <a href="https://qualityrhrio.com.br/">Quality - RH </a></p>
				</footer>

			</div>
		</div>

	</div>

	<!-- Scripts -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/browser.min.js"></script>
	<script src="assets/js/breakpoints.min.js"></script>
	<script src="assets/js/util.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
				function formatar(src, mask,e) 
			{
				var tecla =""
				if (document.all) // Internet Explorer
					tecla = event.keyCode;
				else
					tecla = e.which;
				//code = evente.keyCode;
				if(tecla != 8){


				if (src.value.length == src.maxlength){
				return;
				}
			var i = src.value.length;
			var saida = mask.substring(0,1);
			var texto = mask.substring(i);
			if (texto.substring(0,1) != saida) 
			{
				src.value += texto.substring(0,1);
			}
				}
			}
	</script>

	<script>
		function previewImagem(){
			var imagem = document.querySelector('input[name=imagem]').files[0];
			var preview = document.querySelector('img');
			
			var reader = new FileReader();
			reader.onloadend = function() {
				preview.src = reader.result;			
			}
			if(imagem){
				reader.readAsDataURL(imagem);
			} else{
				preview.src = "";
			}

		}
	</script>

	<script>
		
		$("#add-dep").click(function () {
		alert("falta implementar");
			$("#nometeste").append('<div class="col-4 col-12-xsmall" id="brendoteste"><h5>Nome Completo</h5><input type="text" name="nomedepend1" id="nomedepend1" value="" placeholder="Nome" style="text-transform:uppercase"/></div>');
			$("#datanascimentoteste").append('<div class="col-4 col-12-xsmall"><h5>Data Nascimento </h5><input type="text" name="dtnascdep1" id="dtnascdep1" value="" placeholder="Data" style="text-transform:uppercase" maxlength="10"/></div><div class="col-4 col-12-xsmall">');
				$("#datanascimentoteste").append('<div class="col-4 col-12-xsmall"><h5>Data Nascimento </h5><input type="text" name="dtnascdep1" id="dtnascdep1" value="" placeholder="Data" style="text-transform:uppercase" maxlength="10"/></div><div class="col-4 col-12-xsmall">');
					$("#datanascimentoteste").append('<div class="col-4 col-12-xsmall"><h5>Data Nascimento </h5><input type="text" name="dtnascdep1" id="dtnascdep1" value="" placeholder="Data" style="text-transform:uppercase" maxlength="10"/></div><div class="col-4 col-12-xsmall">');
		});
	</script>

</body>

</html>