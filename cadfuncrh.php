<?php 
session_start();
include('verifica_login.php');
include_once 'conexao.php';
include_once 'mensagem.php';

$coligada = $_SESSION['coligada'];

$sqlsecao = "SELECT codigo,descricao FROM psecao where codcoligada = '$coligada'";
$result_secao = mysqli_query($conexao, $sqlsecao);

$sqlfuncao = "SELECT codigo,descricao FROM pfuncao where codcoligada = '$coligada'";
$result_funcao = mysqli_query($conexao, $sqlfuncao);

$sqlhorario = "SELECT codigo,descricao FROM AHORARIO where codcoligada = '$coligada'";
$result_horario = mysqli_query($conexao, $sqlhorario);

?>
<!DOCTYPE HTML>

<html>
	<head>
		<title>Quality - RH</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						<div class="inner">

							<!-- Header -->
								<header id="header">
									<a href="painel.php" class="logo"><strong>Seja</strong> bem vindo</a>
									<ul class="icons">
										<li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
										<li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
										<li><a href="#" class="icon brands fa-snapchat-ghost"><span class="label">Snapchat</span></a></li>
										<li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
										
									</ul>
								</header>
								
								<section>
                                    <form method="post" action="cadastrouser.php" enctype="multipart/form-data">
                                        <div class="logo">
                                            <h3>Login usuario</h3>
												
                                        </div>
                                        <div class="row gtr-uniform">
                                            
                                            <div class="col-4 col-12-xsmall">
                                                <h5>Usuário</h5>
                                                <input type="text" name="usuario" id="usuario" value="" placeholder="Usuário" style="text-transform:uppercase;" />
                                            </div>
                                            <div class="col-4 col-12-xsmall">
                                                <h5>CPF</h5>
                                                <input type="text" name="cpf" id="cpf" value="" placeholder="CPF" maxlength="11"  style="text-transform:uppercase"/>
                                            </div>
                                            <br>
                                            <div class="col-4 col-12-xsmall"></div>
                                            <br>
                                            <div class="col-4 col-12-xsmall">
                                                <h5>Senha</h5>
                                                <input type="password" name="password" id="password" value="" placeholder="Senha" style ="text-transform:uppercase" />
                                            </div>
                                            <div class="col-4 col-12-xsmall">
                                                <h5>Email</h5>
                                                <input type="text" name="email" id="email" value="" placeholder="Email" style = "text-transform:uppercase" />
                                            </div>

											<div class="col-12">
												<hr class="major" />
												<h3>Empresa</h3>
											</div>
											<div class="col-3 col-12-xsmall">
												<h5>Seção</h5>
												<select name="secao" id="secao" style="text-transform:uppercase";>
												<option value="">Seção</option>
													<?php while($dados_secao = mysqli_fetch_array($result_secao)):?> 
														<option value="<?php echo $dados_secao['codigo'];?>"><?php echo utf8_encode($dados_secao['descricao']);?></option>
													<?php endwhile; ?>
												</select>
											</div>
											<div class="col-3 col-12-xsmall">
												<h5>Primeiro emprego?</h5>		
												<select id="primeiroemp" name="primeiroemp" style="text-transform:uppercase">	
													<option value="">Primeiro emprego?</option>
													<option value="0">Sim</option>
													<option value="1">Não</option>
												</select>
											</div>
											<div class="col-3 col-12-xsmall">
												<h5>Data de Admissão</h5>
												<input type="text" name="dtadmissao" id="dtadmissao" value="" placeholder="Admissão" maxlength="10" onkeyup="formatar(this,'##/##/####',event)" style="text-transform:uppercase"/>
											</div>
											<div class="col-3 col-12-xsmall">
												<h5>Gestor</h5>
												<input type="text" name="gestor" id="gestor" value="" placeholder="Gestor" style="text-transform:uppercase"/>
											</div>
											<div class="col-4 col-12-xsmall">
												<h5>Função</h5>
												<select name="funcao" id="funcao" style="text-transform:uppercase";>
												<option value="">Função</option>
													<?php while($dados_funcao = mysqli_fetch_array($result_funcao)):?> 
														<option value="<?php echo $dados_funcao['codigo'];?>"><?php echo utf8_encode($dados_funcao['descricao']);?></option>
													<?php endwhile; ?>
												</select>
											</div>
											<div class="col-4 col-12-xsmall">
												<h5>Tipo de salario?</h5>		
												<select id="tpsalario" name="tpsalario" style="text-transform:uppercase">	
													<option value="">Tipo de salario?</option>
													<option value="D">Diarista</option>
													<option value="H">Horista</option>
													<option value="M">Mensalista</option>
													<option value="O">Outros</option>
													<option value="P">Horista (Professor)</option>
													<option value="Q">Quinzenalista</option>
													<option value="S">Semanalista</option>
													<option value="T">Tarefeiro</option>
												</select>
											</div>
											<div class="col-4 col-12-xsmall">
												<h5>Salario</h5>
												<input type="text" name="salario" id="salario" value="" placeholder="Salario" style="text-transform:uppercase"/>
											</div>
											<div class="col-4 col-12-xsmall">
												<h5>Jornada</h5>		
												<input type="text" name="jornada" id="jornada" value="" placeholder="Jornada" style="text-transform:uppercase"/>
											</div>
											<div class="col-4 col-12-xsmall">
												<h5>Horarios</h5>
												<select name="tphorario" id="tphorario" style="text-transform:uppercase";>		
												<option value="">Horarios</option>
													<?php while($dados_horario = mysqli_fetch_array($result_horario)):?> 
														<option value="<?php echo $dados_horario['codigo'];?>"><?php echo utf8_encode($dados_horario['descricao']);?></option>
													<?php endwhile; ?>
												</select>
											</div>
											<div class="col-3 col-12-xsmall">
												<h5>Matricula</h5>
												<input type="text" name="matricula" id="matricula" value="" placeholder="Matricula" style="text-transform:uppercase"/>
											</div>
											<div class="col-3 col-12-xsmall">
												<h5>Local de prestação de Serv.</h5>
												<input type="text" name="localserve" id="localserve" value="" placeholder="Local" style="text-transform:uppercase"/>
											</div>
											<div class="col-3 col-12-xsmall">
												<h5>Tipo de Jornada</h5>		
												<select id="tpjornada" name="tpjornada" style="text-transform:uppercase">	
													<option value="">Tipo de Jornada</option>
													<option value="1">Submetido a Horário de Trabalho</option>
													<option value="2">Atividade Externa</option>
													<option value="3">Confiança</option>
													<option value="4">Teletrabalho</option>
												</select>
											</div>
											<div class="col-3 col-12-xsmall">
												<h5>Forma de Contratação</h5>		
												<select id="contratacao" name="contratacao" style="text-transform:uppercase">	
													<option value="">Forma de Contratação</option>
													<option value="1">Experiência</option>
													<option value="2">Indeterminado</option>
													<option value="3">Determinado</option>
												</select>
											</div>
											<div class="col-3 col-12-xsmall">
												<h5>Prazo</h5>		
												<select id="prazo" name="prazo" style="text-transform:uppercase">	
													<option value="">Prazo</option>
													<option value="0">45+45</option>
													<option value="1">30+60</option>
												</select>
											</div>

                                            <div class="col-12">
                                                <ul class="actions">
                                                    <li><input type="submit" value="Cadastrar" class="primary"/></li>
                                                </ul>
                                            </div>
                                            <div class="col-12">
                                                <hr class="major"/>
                                            </div>
                                        </div>
                                    </form>
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
										<li><a href="painelrh.php">Inicio</a></li>
										<li><a href="lista_func_rh.php">Funcionarios</a></li>
										<li><a href="coligadarh.php">Alterar Empresa</a></li>
										<li><a href="cadfuncrh.php">Cadastrar Usuarios</a></li>
										<li><a href="cadastrorh.php">Cadastrar Funcionarios</a></li>
										<li><a href="alterarsenharh.php">Alterar senha</a></li>
										<li>
											<span class="opener">Sair</span>
											<ul>
												<li><a href="fechar.php">Logout</a></li>
											</ul>
										</li>
									</ul>
								</nav>

							<!-- Section 
								<section>
									<header class="major">
										<h2>Ante interdum</h2>
									</header>
									<div class="mini-posts">
										<article>
											<a href="#" class="image"><img src="images/pic07.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic08.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
										<article>
											<a href="#" class="image"><img src="images/pic09.jpg" alt="" /></a>
											<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore aliquam.</p>
										</article>
									</div>
									<ul class="actions">
										<li><a href="#" class="button">More</a></li>
									</ul>
								</section>
							-->

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Quality RH</h2>
									</header>
									<p>A Quality RH é uma empresa com foco estratégico em Recursos Humanos, trabalhando como extensão do cliente e aprimorando a gestão da Folha de Pagamento. Com expertise nos segmentos de Óleo e Gás, Tecnologia da Informação, Advocacia, Indústria e Empregadores Domésticos.</p>
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

	</body>
</html>