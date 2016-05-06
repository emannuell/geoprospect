<?php
header('Content-type: text/html; charset=utf-8');
setlocale( LC_ALL, 'pt_BR.utf-8', 'pt_BR', 'Portuguese_Brazil');

include "conect.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$empresa = $_POST['empresa'];
$telefone = $_POST['telefone'];
$senha = $_POST['senha'];

$db = Database::getInstance();
$mysqli = $db->getConnection(); 

$sql_query = "SELECT email FROM usuarios where email = '$email'";
$result = $mysqli->query($sql_query);
$conta = $result->num_rows;

$sql_query = "INSERT INTO usuarios(id, nome, empresa, email, telefone, senha, date_add) values (null, '$nome', '$empresa', '$email', '$telefone', '$senha', now())";

if($conta > 0){
	header("Location: cadastro.php?status=1");
}else{
	if($result = $mysqli->query($sql_query)){
		header("Location: _user/");
	}else{
		echo"Deu Merda";
	}
}
?>