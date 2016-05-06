<?php

include("../../conect.php");
include("funcao_usuario.php");

$status = $_GET['status'];

$id = $_GET['id'];

$nome = $_POST['nome'];
$empresas_id = $_POST['empresas_id']; 
$email = $_POST['email'];
$descricao = $_POST['descricao'];

$usuario = retornaUsuario();
$usuario_id = $usuario[0];

/* ------------ Adicionar nova empresa ------------ */
if ($status == 'add') {
	$sql = "INSERT INTO pessoas SET id=null, nome='$nome',  email='$email', empresas_id='$empresas_id', descricao='$descricao'";
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$mysqli->query($sql);
	header("Location: edit-pessoas.php");
}

if ($status == 'edit') {
	$sql = "UPDATE pessoas SET nome='$nome',  email='$email', empresas_id='$empresas_id', descricao='$descricao'";
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$mysqli->query($sql);
	header("Location: edit-pessoas.php");
}
if ($status == 'del') {
	$sql = "UPDATE pessoas SET status='0' WHERE id='$id'";
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$mysqli->query($sql);
	header("Location: edit-pessoas.php");
}
?>