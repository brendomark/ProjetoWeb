<?php 
session_start();
include('verifica_login.php');
include_once 'conexao.php';
?>
<?php 
	$CPF = $_SESSION['cpf'];
	$sql = "SELECT 
	*
FROM 
	PFUNC FUN 
	INNER JOIN PCODNACAO NACAO ON FUN.NACIONALIDADE = NACAO.CODIGO 
    INNER JOIN ESTADOCIVIL CIVIL ON FUN.ESTADOCIVIL = CIVIL.ID
WHERE FUN.CPF ='{$CPF}'";
	$resultado_usuario = mysqli_query($conexao,$sql);
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);

	$sqlnacao = "SELECT codigo,nacao FROM pcodnacao order by nacao";
	$resultadonacao = mysqli_query($conexao, $sqlnacao);

	$sqlcivil = "SELECT id,descricao FROM estadocivil";
	$resultadocivil = mysqli_query($conexao, $sqlcivil);


?>

<!DOCTYPE HTML>

<html>

<head>
	<title>Quality - RH</title>
	<meta charset="utf-8" />
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

					<form method="post" action="update.php" enctype="multipart/form-data">
						<div class="logo">
							<h3>Identificação</h3>
							<img style="height: 150px; width: 150px;"><br>
							<label id="teste" for='imagem'>Selecionar uma Foto</label>
							<input type="file" name="imagem" id="imagem" onchange="previewImagem()" ><br>
							
						</div>
						<div class="row gtr-uniform">
							
							<div class="col-6 col-12-xsmall">
								<h5>Nome</h5>
								<input type="text" name="nome" id="nome" value="<?php echo $row_usuario['NOME'];?>"/>
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>Data nascimento</h5>
								<?php  
									$data = $row_usuario['DTNASC'];
									$dataP = explode('-', $data);
									$dataParaExibir = $dataP[2].'/'.$dataP[1].'/'.$dataP[0];
								?>
								<input type="text" name="dtnasc" id="dtnasc" value="<?php echo $dataParaExibir;?>" placeholder="Data nascimento" maxlength="10" onkeyup="formatar(this,'##/##/####',event)" style="text-transform:uppercase;"/>
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>Naturalidade</h5>	
								<input type="text" name="naturalidade" id="naturalidade" value="<?php echo $row_usuario['NATURALIDADE'];?>" placeholder="naturalidade" style="text-transform:uppercase;" />
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>Nacionalidade</h5>
								<select name="nacionalidade" id="nacionalidade" style="text-transform:uppercase";>
								<option value="<?php echo $row_usuario['NACIONALIDADE'];?>"><?php echo utf8_encode($row_usuario['nacao']);?></option>
									<?php while($dadosnacao = mysqli_fetch_array($resultadonacao)):?> 
										<option value="<?php echo $dadosnacao['codigo'];?>"><?php echo utf8_encode($dadosnacao['nacao']);?></option>
									<?php endwhile; ?>
								  </select>
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>Estado civil</h5>
								<select name="estadocivil" id="estadocivil" style="text-transform:uppercase;">
									<option value="<?php echo $row_usuario['ESTADOCIVIL'];?>"><?php echo utf8_encode($row_usuario['descricao']);?></option>

									<?php while($dadoscivil = mysqli_fetch_array($resultadocivil)):?> 
										<option value="<?php echo $dadoscivil['id'];?>"><?php echo utf8_encode($dadoscivil['descricao']);?></option>
									<?php endwhile; ?>
								</select>
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>Sexo</h5>
									<select name="sexo" id="sexo" style="text-transform:uppercase;">	
									<option value="<?php echo $row_usuario['SEXO'];?>"><?php echo $row_usuario['GRAUINSTRUCAO'];?></option>
									<option value="1">Masculino</option>
									<option value="2">Feminino</option>
									<option value="3">Personalizado</option>
								</select>
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>Grau de Instrução</h5>
								<select name="grauinstrucao" id="grauinstrucao" style="text-transform:uppercase;">
									<option value="<?php echo $row_usuario['GRAUINSTRUCAO'];?>"><?php echo $row_usuario['GRAUINSTRUCAO'];?></option>
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
									<option value="<?php echo $row_usuario['RACA'];?>"><?php echo $row_usuario['RACA'];?></option>
									<option value="1">Negro</option>
									<option value="2">Branco</option>
									<option value="3">Amarela</option>
									<option value="4">Indígena</option>
									<option value="5">Parda</option>
								</select>
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>Nome Pai</h5>
								<input type="text" name="nomepai" id="nomepai" value="<?php echo $row_usuario['NOMEPAI'];?>" placeholder="Nome Pai" style ="text-transform:uppercase" />
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>Nome Mãe</h5>
								<input type="text" name="nomemae" id="nomemae" value="<?php echo $row_usuario['NOMEMAE'];?>" placeholder="Nome Mãe" style="text-transform:uppercase"/>
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>Email</h5>
								<input type="text" name="email" id="email" value="<?php echo $row_usuario['EMAIL'];?>" placeholder="Email" style = "text-transform:uppercase" />
							</div>
							<div class="col-3 col-12-xsmall">
								<h5>Telefone</h5>
								<input type="text" name="telefone" id="telefone" value="<?php echo $row_usuario['TELEFONE'];?>" placeholder="DD 0000-0000" maxlength="12" onkeyup="formatar(this,'## ####-####',event)" />
							</div>
							<div class="col-3 col-12-xsmall">
								<h5>Celular</h5>
								<input type="text" name="celular" id="celular" value="<?php echo $row_usuario['CELULAR'];?>" placeholder="DD 00000-0000" maxlength="13" onkeyup="formatar(this,'## #####-####',event)" />
							</div>



							<div class="col-12">
								<hr class="major" />
								<h3>CPF / RG</h3>
							</div>
							<div class="col-6 col-12-xsmall">
								<h5>CPF</h5>
								<input type="text" name="cpf" id="cpf" value="<?php echo $row_usuario['CPF'];?>" placeholder="CPF" maxlength="11"  style="text-transform:uppercase"/>
							</div>
							<!--
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


							<div class="col-12">
								<hr class="major" />
								<h3>Carteira de Trabalho</h3>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Número</h5>
								<input type="text" name="numerocarteira" id="numerocarteira" value="" placeholder="Número" style="text-transform:uppercase" />
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Serie</h5>	
								<input type="text" name="seriecarteira" id="seriecarteira" value="" placeholder="Serie" style="text-transform:uppercase"/>
							</div>
							<div class="col-2 col-12-xsmall">
								<h5>Data Emissão</h5>	
								<input type="text" name="datacarteira" id="datacarteira" value="" placeholder="Data" style="text-transform:uppercase" maxlength="10" onkeyup="formatar(this,'##/##/####',event)"/>
							</div>
							<div class="col-2 col-12-xsmall">
								<h5>UF</h5>
								<select id="ufcarteira" name="ufcarteira" style="text-transform:uppercase">
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
								<h3>Certificado de Alistamento Militar</h3>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Número</h5>
								<input type="text" name="nmilitar" id="nmilitar" value="" placeholder="Numero" />
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Categoria</h5>
								<input type="text" name="categoriamilitar" id="categoriamilitar" value="" placeholder="Categoria" />
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>PIS</h5>
								<input type="text" name="pis" id="pis" value="" placeholder="PIS" />
							</div>


							<div class="col-12">
								<hr class="major" />
								<h3>Endereço</h3>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Cep</h5>
								<input type="text" name="cep" id="cep" value="" placeholder="CEP" maxlength="10" style="text-transform:uppercase" onkeyup="formatar(this,'##.###-###',event)" />
							</div>
							<div class="col-8 col-12-xsmall">
								<h5>Lagradouro</h5>
								<input type="text" name="logradouro" id="logradouro" value="" placeholder="Logradouro" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Número</h5>
								<input type="text" name="numero" id="numero" value="" placeholder="Numero" style="text-transform:uppercase" />
							</div>
							<div class="col-8 col-12-xsmall">
								<h5>Complemento</h5>
								<input type="text" name="complemento" id="complemento" value="" placeholder="Complemento" style="text-transform:uppercase" />
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Bairro</h5>
								<input type="text" name="bairro" id="bairro" value="" placeholder="Bairro" style="text-transform:uppercase" />
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Município</h5>
								<input type="text" name="municipio" id="municipio" value="" placeholder="Município" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Estado</h5>
								<select id="ufendereco" name="ufendereco" style="text-transform:uppercase">
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
								<h3>Banco</h3>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Banco</h5>
								<input type="text" name="banco" id="banco" value="" placeholder="ex: 341" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Agência</h5>
								<input type="text" name="agencia" id="agencia" value="" placeholder="ex: 0000" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Digito agência</h5>
								<input type="text" name="dagencia" id="dagencia" value="" placeholder="ex: 0" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Conta</h5>
								<input type="text" name="conta" id="conta" value="" placeholder="ex: 00000" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Digito conta</h5>
								<input type="text" name="dconta" id="dconta" value="" placeholder="ex: 0" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Tipo de Conta</h5>
								<select id="tpconta" name="tpconta" style="text-transform:uppercase">	
									<option value="">Tipo de Conta</option>
									<option value="1">Conta Corrente</option>
									<option value="0">Conta Poupança</option>
								</select>
							</div>


							<div class="col-12">
								<hr class="major" />
								<h3>Outras informações</h3>
							</div>
							<div class="col-4 col-12-small">
								<h5>Deficiente</h5>
								<input type="radio" id="demo-priority-low" name="per1">
								<label for="demo-priority-low">Sim</label>
								<input type="radio" id="demo-priority-normal" name="per1">
								<label for="demo-priority-normal">Não</label>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Tipo de Deficiência</h5>
								<select id="tpdeficiencia" name="tpdeficiencia" style="text-transform:uppercase">	
									<option value="">Tipo Deficiencia</option>
									<option value="0">Físico</option>
									<option value="1">auditivo</option>
									<option value="2">Fala</option>
									<option value="3">Visual</option>
									<option value="4">Mental</option>
									<option value="5">Reabilitado</option>
									<option value="6">Intelectual</option>
								</select>
							</div>
							<div class="col-12 col-12-small">
								<p>Deseja ser descontado da Contribuição sindical? Aplicável aos empregados lotados RJ, RS, PR e PE.</p>
								<input type="radio" id="demo-priority1" name="per2">
								<label for="demo-priority1">Sim</label>
								<input type="radio" id="demo-priority2" name="per2">
								<label for="demo-priority2">Não</label>
							</div>
							<div class="col-12 col-12-small">
								<p>Já descontou Contribuição sindical? Aplicável apenas aos empregados lotados em SP?</p>
								<input type="radio" id="demo1" name="per3">
								<label for="demo1">Sim</label>
								<input type="radio" id="demo2" name="per3">
								<label for="demo2">Não</label>
							</div>

							<div class="col-12">
								<hr class="major" />
								<h3>Dependentes</h3>
								</p><button type="button" id="add-dep">Add +</button>
							</div>
							<div class="col-4 col-12-xsmall" id="nometeste">
								<h5>Nome Completo</h5>
								<input type="text" name="nomedepend1" id="nomedepend1" value="" placeholder="Nome" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall" id="datanascimentoteste">
								<h5>Data Nascimento </h5>
								<input type="text" name="dtnascdep1" id="dtnascdep1" value="" placeholder="Data" style="text-transform:uppercase" maxlength="10" onkeyup="formatar(this,'##/##/####',event)"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Parentesco</h5>
								<select id="parentescodep1" name="parentescodep1" style="text-transform:uppercase">	
									<option value="">Parentesco</option>
									<option value="0">Filho(a)</option>
									<option value="1">Pai</option>
									<option value="2">Mãe</option>
									<option value="3">Outros</option>
								</select>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>CPF</h5>
								<input type="text" name="cpfdep1" id="cpfdep1" value="" placeholder="CPF" maxlength="14" onkeyup="formatar(this,'###.###.###-##',event)" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>I.R</h5>
								<select id="irdep1" name="irdep1" style="text-transform:uppercase">	
									<option value="">IR</option>
									<option value="0">Não</option>
									<option value="1">Sim</option>
								</select>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Mae do Dependente</h5>
								<input type="text" name="maedepend1" id="maedepend1" value="" placeholder="Nome" style="text-transform:uppercase"/>
							</div>
								
							<div class="col-12">
								<hr class="major" />
								<h3>Beneficios</h3>
							</div>
							<div class="col-3 col-12-xsmall">
								<h5>Vale Transporte?</h5>		
								<select id="irdep1" name="irdep1" style="text-transform:uppercase">	
									<option value="">Vale Transporte?</option>
									<option value="0">Não</option>
									<option value="1">Sim</option>
								</select>
							</div>
							<div class="col-3 col-12-xsmall">
								<h5>valor</h5>
								<input type="text" name="valorvt" id="valorvt" value="" placeholder="Valor VT" style="text-transform:uppercase"/>
							</div>
							<div class="col-3 col-12-xsmall">
								<h5>Operadoras e Tarifas</h5>
								<input type="text" name="operadora" id="operadora" value="" placeholder="operadora" style="text-transform:uppercase"/>
							</div>
							<div class="col-3 col-12-xsmall">
								<h5>VR ou VA?</h5>		
								<select id="irdep1" name="irdep1" style="text-transform:uppercase">	
									<option value="">VR ou VA ?</option>
									<option value="0">VR</option>
									<option value="1">VA</option>
									<option value="">Ambos</option>
								</select>
							</div>


							<div class="col-12">
								<hr class="major" />
								<h3>Empresa</h3>
							</div>
							<div class="col-3 col-12-xsmall">
								<h5>Seção</h5>
								<input type="text" name="secao" id="secao" value="" placeholder="Seção" style="text-transform:uppercase"/>
							</div>
							<div class="col-3 col-12-xsmall">
								<h5>Primeiro emprego?</h5>		
								<select id="primeiroemp" name="primeiroemp" style="text-transform:uppercase">	
									<option value=""> </option>
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
								<input type="text" name="funcao" id="funcao" value="" placeholder="Fuinção" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Tipo de salario?</h5>		
								<select id="tpsalario" name="tpsalario" style="text-transform:uppercase">	
									<option value=""> </option>
									<option value="0">Mensalista</option>
									<option value="1">Outros</option>
								</select>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Salario</h5>
								<input type="text" name="salario" id="salario" value="" placeholder="Salario" style="text-transform:uppercase"/>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Jornada</h5>		
								<select id="tpjornada" name="tpjornada" style="text-transform:uppercase">	
									<option value="">Jornada</option>
									<option value="0">120</option>
									<option value="1">150</option>
									<option value="1">220</option>
								</select>
							</div>
							<div class="col-4 col-12-xsmall">
								<h5>Horarios</h5>		
								<select id="tphorario" name="tphorario" style="text-transform:uppercase">	
									<option value=""> </option>
									<option value="0">09:00 18:00 H 12:00 13:00 R 11:00 16:00 T</option>
									<option value="1">ESCALA 14X14 - JORNADA DE 12 HORAS DIARIAS</option>
									<option value="1">Outros</option>
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
								<select id="tphorario" name="tphorario" style="text-transform:uppercase">	
									<option value=""> </option>
									<option value="0">Submetido a controle</option>
									<option value="1">Atividade Externa</option>
									<option value="2">Teletrabalho</option>
									<option value="3">Confiança</option>
								</select>
							</div>
							<div class="col-3 col-12-xsmall">
								<h5>Forma de Contratação</h5>		
								<select id="tphorario" name="tphorario" style="text-transform:uppercase">	
									<option value=""> </option>
									<option value="0">Experiência</option>
									<option value="1">Indeterminado</option>
									<option value="2">Determinado</option>
								</select>
							</div>
							
							<div class="col-3 col-12-xsmall">
								<h5>Prazo</h5>		
								<select id="prazo" name="prazo" style="text-transform:uppercase">	
									<option value=""> </option>
									<option value="0">45+45</option>
									<option value="1">30+60</option>
								</select>
							</div>

							-->
							<p> </p>
							
							<div class="col-12">
								<ul class="actions">
									<li><input type="submit" value="Atualizar Dados" class="primary" /></li>
								</ul>
							</div>
						</div>
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
						<li><a href="elements.php">Alterar senha</a></li>
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
								</section> -->

				<!-- Section -->
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
				previwq.src = "";
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