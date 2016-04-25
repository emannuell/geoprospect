<?php
include ("panel/funcao_usuario.php");
session_start();
/*
if(usuarioLogado()){ 
	$usuario = retornaUsuario();*/
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Uma ferramenta online que auxília na prospecção de clientes, ajudando a equipe de vendas no processo de identificação dos clientes potenciais para a gestão de seus negócios.">
		<meta name="author" content="GeoProspect">
		<title>GeoProspect - Login</title>
		<link href="../assets/bootstrap.css" rel="stylesheet">
		<link href="../assets/main.css" rel="stylesheet">
		<link href="../assets/fonts.css" rel="stylesheet">
	</head>
	<body>
		<div id="wrapper">
			<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php">GeoProspect</a>
				</div>
				<!-- Top Menu Items -->
				<ul class="nav navbar-right top-nav">

						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Nome do loco<?php echo $usuario[3]; ?> <b class="caret"></b></a>
				</ul>
				<!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav side-nav">
						<li class="active">
							<a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
						</li>
						<li>
							<a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Nova busca</a>
						</li>
						<li>
							<a href="tables.html"><i class="fa fa-fw fa-table"></i> Buscas</a>
						</li>
						<li>
							<a href="bootstrap-grid.html"><i class="fa fa-fw fa-history"></i> Follow-up</a>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</nav>			
		</div>
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	</html>

	<?php/*
}else{
	verificaUsuario();
}*/
?>