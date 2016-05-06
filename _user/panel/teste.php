<?php
include ("funcao_usuario.php");
include("../../conect.php");
session_start();

if(usuarioLogado()){ 
	$usuario = retornaUsuario();
    $id = $usuario[0];
    echo $id;
    $sql = "SELECT * FROM empresas WHERE ID = '(SELECT empresas_id FROM usuarios-empresas WHERE usuarios_id = '$id')'";
    $db = Database::getInstance();
    $mysqli = $db->getConnection();
    $result = $mysqli->query($sql);
    var_dump($result);

    /*
    $sql = "SELECT * FROM empresas WHERE id = '$result'";
    $empresas = $mysqli->query($sql);
	*/
}

?>