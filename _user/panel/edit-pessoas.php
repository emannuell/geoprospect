<?php
include ("funcao_usuario.php");
include ("../../conect.php");
session_start();

$id = $_GET['id'];
if(empty($id)){
	header("Location: index.php");
}

$sql = "SELECT * FROM pessoas WHERE id = '$id' where status='1'";
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
										<small>editar pessoas</small>
									</h1>
									<ol class="breadcrumb">
										<li>
											<i class="fa fa-dashboard"></i>  <a href="index.html"> Dashboard</a>
										</li>
										<li>
											<i class="fa fa-user"></i><a href="lista-empresas.php"> Empresas</a>
										</li>
										<li class="active">
											<i class="fa fa-pencil"></i> Editar Pessoas
										</li>
									</ol>

									<!-- Avisos aqui! -->

								</div>
							</div> 
							<!-- CONTEUDO -->
							<form class="form-group" action="pessoas.php?status=edit&id=<?php echo $id; ?>" method="post">
								<!-- area de campos do form -->
								<div class="row">
									<div class="form-group col-md-4">
										<label for="nome">Nome</label>
										<input type="text" class="form-control" name="nome" id="nome" value="<?php echo $dados["nome"] ?>" required>
									</div>
								</div>
								<div class="row">
									<div class="form-group col-md-4">
										<label for="empresa">Empresa</label>
										<input type="text" class="form-control" name="empresas_id" id="empresas_id" value="<?php echo $dados["empresas_id"] ?>" required>
									</div>
								</div>
								<div class="row">    
									<div class="form-group col-md-4">
										<label for="email">E-mail</label>
										<input type="email" class="form-control" name="email" id="email" value="<?php echo $dados["email"] ?>">
									</div>
								</div>
								<div class="row">
								<label for="descricao">Descriçao</label>
									<textarea class="form-control" rows="3"><?php echo dados["descricao"]; ?></textarea>
								</div>
								<div class="row">
									<div class="col-md-12">
										<button type="submit" class="btn btn-primary">Salvar</button>
										<a href="lista-pessoas.php" class="btn btn-default">Cancelar</a>
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