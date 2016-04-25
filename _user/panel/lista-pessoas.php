<?php
include ("funcao_usuario.php");
include("../../conect.php");
session_start();

if(usuarioLogado()){ 
	$usuario = retornaUsuario();
	$id = $usuario[0];

	$sql = "SELECT usuarios_empresas.empresas_id, empresas.id, empresas.nome, empresas.telefone from usuarios_pessoas inner join pessoas on usuarios_empresas.empresas_id = empresas.id where usuarios_empresas.usuarios_id = '$id'";
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$result = $mysqli->query($sql);
	?>
	<!DOCTYPE html>
	<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>GeoExplorer - Pessoas</title>

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
								Pessoas
								<small>visao geral</small>
							</h1>
							<ol class="breadcrumb">
								<li class="active">
									<i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
								</li>
								<li>
									<i class="fa fa-list"></i> Lista de pessoas
								</li>
							</ol>

							<!-- INICIO Avisos aqui! -->
							<div class="col-lg-12">
								<div class="alert alert-info alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<i class="fa fa-info-circle"></i>  Acompanhe a evoluçao dos potenciais clientes no <strong>funil de vendas</strong>, e nao perca nenhuma oportunidade!
								</div>
							</div>
							<!-- FIM Avisos aqui! -->
						</div>
					</div> 
					<!-- CONTEUDO -->
					<table class="table table-striped table-responsive">
						<thead>
							<tr>
								<th>Id</th>
								<th>Nome</th>
								<th>E-mail</th>
								<th>Editar / Excluir</th>
							</tr>
						</thead>
						<tbody>
						<?php 
						while ($row = mysqli_fetch_array($result)) { ?>
							<tr>
								<td><?php echo $row[1]; ?></td>
								<td><?php echo $row[2]; ?></td>
								<td><?php echo $row[3]; ?></td>
								<td><a href="edit-empresas.php?id=<?php echo $row[1]; ?>"><button type="btn" class="btn btn-warning">Editar</button></a>
								<a href="empresas.php?status=del?id=<?php echo $row[1]; ?>"><button type="button" class="btn btn-danger">Excluir</button></a></td>
							</tr>
						<?php }
						?>
						</tbody>
					</table>



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