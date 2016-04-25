<?php
include ("funcao_usuario.php");
include ("../../conect.php");
session_start();

$id = $_GET['id'];

$sql = "SELECT * FROM empresas WHERE id = '$id'";
$db = Database::getInstance();
$mysqli = $db->getConnection();
$result = $mysqli->query($sql);
$dados = $result->fetch_assoc();

if(usuarioLogado()){ 
	$usuario = retornaUsuario();
	?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>GeoExplorer - Dashboard</title>

		<!-- Bootstrap Core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="css/sb-admin.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
				<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
				<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
				<![endif]-->
			</head>
			<body>
				<div id="wrapper">

				 <!-- Topo de pagina e menu -->
			<?php include ("menu.html"); ?>
					<div id="page-wrapper">

						<div id="main" class="container-fluid">
							<!-- Page Heading -->
							<div class="row">
								<div class="col-lg-12">
									<h1 class="page-header">
										<?php echo $dados["nome"] ?>
										<small>editar empresa</small>
									</h1>
									<ol class="breadcrumb">
										<li>
											<i class="fa fa-dashboard"></i>  <a href="index.html"> Dashboard</a>
										</li>
										<li>
											<i class="fa fa-building"></i><a href="lista-empresas.php"> Empresas</a>
										</li>
										<li class="active">
											<i class="fa fa-pencil"></i> Editar Empresa
										</li>
									</ol>

									<!-- Avisos aqui! -->

								</div>
							</div> 
							<!-- CONTEUDO -->
							<form class="form-group" action="empresas.php?status=edit&id=<?php echo $id; ?>" method="post">
								<!-- area de campos do form -->
								<div class="row">
									<div class="form-group col-md-4">
										<label for="nome">Nome</label>
										<input type="text" class="form-control" name="nome" id="nome" value="<?php echo $dados["nome"] ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label for="empresa">Rua</label>
										<input type="text" class="form-control" name="rua" id="rua" value="<?php echo $dados["rua"] ?>" required>
									</div>
									<div class="form-group col-md-2">
										<label for="numero">Numero</label>
										<input type="text" class="form-control" name="numero" id="numero" value="<?php echo $dados["numero"] ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-2">
										<label for="estado">Estado</label>
										<select name="estado" class="form-control" id="estado" required>
											<option selected="" value="">Selecione o Estado (UF)</option>
											<option value="Acre">Acre</option>
											<option value="Alagoas">Alagoas</option>
											<option value="Amapá">Amapá</option>
											<option value="Amazonas">Amazonas</option>
											<option value="Bahia">Bahia</option>
											<option value="Ceará">Ceará</option>
											<option value="Distrito Federal">Distrito Federal</option>
											<option value="Espírito Santo">Espírito Santo</option>
											<option value="Goiás">Goiás</option>
											<option value="Maranhão">Maranhão</option>
											<option value="Mato Grosso">Mato Grosso</option>
											<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
											<option value="Minas Gerais">Minas Gerais</option>
											<option value="Pará">Pará</option>
											<option value="Paraíba">Paraíba</option>
											<option value="Paraná">Paraná</option>
											<option value="Pernambuco">Pernambuco</option>
											<option value="Piauí">Piauí</option>
											<option value="Rio de Janeiro">Rio de Janeiro</option>
											<option value="Rio Grande do Sul">Rio Grande do Sul</option>
											<option value="Rio Grande do Norte">Rio Grande do Norte</option>
											<option value="Rondônia">Rondônia</option>
											<option value="Roraima">Roraima</option>
											<option value="Santa Catarina">Santa Catarina</option>
											<option value="São Paulo">São Paulo</option>
											<option value="Sergipe">Sergipe</option>
											<option value="Tocantins">Tocantins</option>
										</select>
									</div>
									<div class="form-group col-md-2">
										<label for="cidade">Cidade</label>
										<input type="text" class="form-control" name="cidade" id="cidade" value="<?php echo $dados["cidade"] ?>" required>
									</div>
									<div class="form-group col-md-2">
										<label for="bairro">Bairro</label>
										<input type="text" class="form-control" name="bairro" id="bairro" value="<?php echo $dados["bairro"] ?>">
									</div>
								</div>
								<div class="row">    
									<div class="form-group col-md-4">
										<label for="empresa">Telefone</label>
										<input type="tel" class="form-control" name="telefone" id="telefone" value="<?php echo $dados["telefone"] ?>" required>
									</div>
									<div class="form-group col-md-2">
										<label class="pais">Pais</label>
										<input type="text" class="form-control" name="pais" id="pais" value="<?php echo $dados["pais"] ?>" value="Brasil">
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-2">
										<label for="cep">CEP</label>
										<input type="text" class="form-control" name="cep" id="cep" maxlength="8" value="<?php echo $dados["cep"] ?>">
									</div>
									<div class="form-group col-md-4">
										<label for="website">Website</label>
										<input type="text" class="form-control" name="website" id="website" value="<?php echo $dados["website"] ?>">
									</div>
									<div class="form-group col-md-4">
										<label for="glus">Redes Sociais</label>
										<input type="text" class="form-control" name="gplus" id="gplus" value="<?php echo $dados["gplus"] ?>">
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary">Salvar</button>
										<a href="lista-empresas.php" class="btn btn-default">Cancelar</a>
									</div>
								</div>
							</form>

							<!-- FIM CONTEUDO -->                   
						</div>
						<!-- /.container-fluid -->
					</div>
					<!-- /#page-wrapper -->
				</div>
				<!-- /#wrapper -->
				<script src="js/jquery.js"></script>
				<script src="js/bootstrap.min.js"></script>
			</body>
			</html>
			<?php
		}else{
		 verificaUsuario();
	 }
	 ?>