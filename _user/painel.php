<?php
session_start();
if(!$_SESSION['usuario']){
	header("Location: index.php");
}else{
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Uma ferramenta online que auxília na prospecção de clientes, ajudando a equipe de vendas no processo de identificação dos clientes potenciais para a gestão de seus negócios.">
  <meta name="author" content="GeoProspect">
  <title>Dashboard - GeoProspect</title>
  <link href="../assets/bootstrap.css" rel="stylesheet">
  <link href="../assets/main.css" rel="stylesheet">
  <link href="../assets/fonts.css" rel="stylesheet">
</head>
<body>
<a href="logout.php"><h2>Logout</h2></a>
</body>
</html>
<?php 
} 
?>