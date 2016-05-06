<?php
include ("panel/funcao_usuario.php");
include ("../conect.php");

$db = Database::getInstance();
$mysqli = $db->getConnection(); 

$sql_query = "SELECT * FROM usuarios WHERE email = '".$_POST['email']."' and senha = '".$_POST['senha']."'";
$result = $mysqli->query($sql_query);
$usuario = mysqli_fetch_assoc($result);
if($usuario == null){
	header("Location: index.php?login=0");
}else{
	session_start();
	fazlogin($usuario['id'], $usuario['email'], $usuario['empresa'], $usuario['nome']);
	header("Location: panel/");
}
?>