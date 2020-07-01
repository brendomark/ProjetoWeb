<?php 
session_start();
include('verifica_login.php');
include_once 'conexao.php';
?>
<!DOCTYPE HTML>

<html>





<head>
	<title>Quality - RH</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="assets/css/main.css" />
	<link rel="stylesheet" href="assets/css/stylesheet.css"/>
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
					
					<form method="POST" action="#">
						<section>
								
							<div class="row gtr-uniform" id='div1'>
									<div class="col-12">
										<h3>Identificação</h3>
									</div>										
									<div class="col-6 col-12-xsmall">
										<h5>Nome</h5>
										<input type="text" name="Nome" id="Nome" value="" placeholder="Nome" style="text-transform:uppercase;" />
									</div>
									
									<div class="col-6 col-12-xsmall">
										<h5>Data nascimento</h5>
										<input type="text" name="dtnasce" id="dtnasc" value="" placeholder="Data nascimento" maxlength="10" onkeyup="formatar(this,'##/##/####',event)" style="text-transform:uppercase;"/>
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>Naturalidade</h5>	
										<input type="text" name="naturalidade" id="naturalidade" value="" placeholder="naturalidade" style="text-transform:uppercase;" />
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>Nacionalidade</h5>
										<input type="text" name="nacionalidade" id="nacionalidade" value="" placeholder="Nacionalidade" style="text-transform:uppercase;" />
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>Estado civil</h5>
										<select name="estadocivil" id="estadocivil" style="text-transform:uppercase;">
											<option value="">Estado civil</option>
											<option value="1">Solteiro</option>
											<option value="2">Casado</option>
											<option value="3">Divorciado</option>
											<option value="4">Viúvo</option>
											<option value="5">Outros</option>
										</select>
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>Sexo</h5>
											<select name="sexo" id="sexo" style="text-transform:uppercase;">	
											<option value="">Sexo</option>
											<option value="1">Masculino</option>
											<option value="2">Feminino</option>
										</select>
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>Grau de Instrução</h5>
										<select name="grauinst" id="grauinst" style="text-transform:uppercase;">
											<option value="">Grau de Instrução</option>
											<option value="1">Ensino médio completo</option>
											<option value="2">Ensino superior completo</option>
											<option value="3">Pós-graduação completo</option>
											<option value="4">Pós-graduação incompleto</option>
											<option value="5">Ensino médio incompleto</option>
											<option value="6">Ensino superior incompleto</option>
										</select>
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>Raça</h5>
										<select name="raca" id="raca" style="text-transform:uppercase;">
											<option value="">Raça</option>
											<option value="1">Negro</option>
											<option value="2">Branco</option>
											<option value="3">Amarela</option>
											<option value="4">Indígena</option>
											<option value="5">Parda</option>
										</select>
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>Nome Pai</h5>
										<input type="text" name="npai" id="npai" value="" placeholder="Nome Pai" style ="text-transform:uppercase" />
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>Nome Mãe</h5>
										<input type="text" name="nmae" id="nmae" value="" placeholder="Nome Mãe" style="text-transform:uppercase"/>
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>Email</h5>
										<input type="text" name="email" id="email" value="" placeholder="Email" style = "text-transform:uppercase" />
									</div>
									<div class="col-3 col-12-xsmall">
										<h5>Telefone</h5>
										<input type="text" name="demo-name" id="demo-name" value="" placeholder="DD 0000-0000" maxlength="12" onkeyup="formatar(this,'## ####-####',event)" />
									</div>
									<div class="col-3 col-12-xsmall">
										<h5>Celular</h5>
										<input type="text" name="demo-name" id="demo-name" value="" placeholder="DD 00000-0000" maxlength="13" onkeyup="formatar(this,'## #####-####',event)" />
									</div>
								

								
									<div class="col-12">
										<hr class="major" />
										<h3>CPF / RG</h3>
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>CPF</h5>
										<input type="text" name="cpf" id="cpf" value="" placeholder="CPF" maxlength="14" onkeyup="formatar(this,'###.###.###-##',event)" style="text-transform:uppercase"/>
									</div>
									<div class="col-6 col-12-xsmall">
										<h5>RG</h5>
										<input type="text" name="rg" id="rg" value="" placeholder="RG" maxlength="10" onkeyup="formatar(this,'###.###-##',event)" style="text-transform:uppercase"/>
									</div>
									<div class="col-4 col-12-xsmall">
										<h5>Data de Emissão</h5>
										<input type="text" name="dtemissaorg" id="dtemissaorg" value="" placeholder="Data Emissão" maxlength="10" onkeyup="formatar(this,'##/##/####',event)" style="text-transform:uppercase"/>
									</div>
									<div class="col-4 col-12-xsmall">
										<h5>Órgão Emissor</h5>
										<input type="text" name="orgaorg" id="orgaorg" value=""placeholder="Órgão Emissor"style="text-transform:uppercase" />
									</div>
									<div class="col-4 col-12-xsmall">
										<h5>Estado Emissor</h5>
										<select id="estadorg" name="estadorg" style="text-transform:uppercase">
											<option value="">UF</option>
											<option value="AC">Acre</option>
											<option value="AL">Alagoas</option>
											<option value="AP">Amapá</option>
											<option value="AM">Amazonas</option>
											<option value="BA">Bahia</option>
											<option value="CE">Ceará</option>
											<option value="DF">Distrito Federal</option>
											<option value="ES">Espírito Santo</option>
											<option value="GO">Goiás</option>
											<option value="MA">Maranhão</option>
											<option value="MT">Mato Grosso</option>
											<option value="MS">Mato Grosso do Sul</option>
											<option value="MG">Minas Gerais</option>
											<option value="PA">Pará</option>
											<option value="PB">Paraíba</option>
											<option value="PR">Paraná</option>
											<option value="PE">Pernambuco</option>
											<option value="PI">Piauí</option>
											<option value="RJ">Rio de Janeiro</option>
											<option value="RN">Rio Grande do Norte</option>
											<option value="RS">Rio Grande do Sul</option>
											<option value="RO">Rondônia</option>
											<option value="RR">Roraima</option>
											<option value="SC">Santa Catarina</option>
											<option value="SP">São Paulo</option>
											<option value="SE">Sergipe</option>
											<option value="TO">Tocantins</option>
											<option value="EX">Estrangeiro</option>
										</select>
									</div>
								
								
								
									<div class="col-12">
										<hr class="major" />
										<h3>Titulo eleitoral</h3>
									</div>
									<div class="col-4 col-12-xsmall">
										<h5>Número</h5>
										<input type="text" name="ntitulo" id="ntitulo" value=""placeholder="Número Título" style="text-transform:uppercase" />
									</div>
									<div class="col-4 col-12-xsmall">
										<h5>Zona</h5>
										<input type="text" name="zona" id="zona" value="" placeholder="Zona Eleitoral" style="text-transform:uppercase"/>
									</div>
									<div class="col-4 col-12-xsmall">
										<h5>Seção</h5>
										<input type="text" name="secao" id="secao" value="" placeholder="Seção" style="text-transform:uppercase" />
									</div>
									<div class="col-4 col-12-xsmall">
										<h5>Data Emissão</h5>
										<input type="text" name="dtemissaotitulo" id="dtemissaotitulo" value="" placeholder="Data Emissão" style="text-transform:uppercase" maxlength="10" onkeyup="formatar(this,'##/##/####',event)"/>
									</div>
									<div class="col-4 col-12-xsmall">
										<h5>Estado Emissor</h5>
										<select id="estadotitulo" name="estadotitulo" style="text-transform:uppercase">
											<option value="">UF</option>
											<option value="AC">Acre</option>
											<option value="AL">Alagoas</option>
											<option value="AP">Amapá</option>
											<option value="AM">Amazonas</option>
											<option value="BA">Bahia</option>
											<option value="CE">Ceará</option>
											<option value="DF">Distrito Federal</option>
											<option value="ES">Espírito Santo</option>
											<option value="GO">Goiás</option>
											<option value="MA">Maranhão</option>
											<option value="MT">Mato Grosso</option>
											<option value="MS">Mato Grosso do Sul</option>
											<option value="MG">Minas Gerais</option>
											<option value="PA">Pará</option>
											<option value="PB">Paraíba</option>
											<option value="PR">Paraná</option>
											<option value="PE">Pernambuco</option>
											<option value="PI">Piauí</option>
											<option value="RJ">Rio de Janeiro</option>
											<option value="RN">Rio Grande do Norte</option>
											<option value="RS">Rio Grande do Sul</option>
											<option value="RO">Rondônia</option>
											<option value="RR">Roraima</option>
											<option value="SC">Santa Catarina</option>
											<option value="SP">São Paulo</option>
											<option value="SE">Sergipe</option>
											<option value="TO">Tocantins</option>
											<option value="EX">Estrangeiro</option>
										</select>
									</div>
								</div>
						</section>
					</br></br>
						<ul class="icons">
							<li id="bt1"><a href="#" class="icon brands fa fa-ravelry"></a></li>
							<li id="bt2"><a href="#" class="icon brands fa fa-ravelry"></a></li>
							<li id="bt3"><a href="#" class="icon brands fa fa-ravelry"></a></li>
						</ul>
					</form>
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
						<li><a href="generic.php">Alterar Empresa</a></li>
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
	<script src="assets/js/javascript.js"></script>
	<script>
		
		$("#add-dep").click(function () {
			alert("Falta Implementar")
			//$("#brendoteste").append( '');
		});
	</script>

</body>

</html>