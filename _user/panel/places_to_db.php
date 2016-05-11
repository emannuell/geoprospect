<?php

$arr = $_POST['data'];
$i = 0;
foreach ($arr as $place) {
	$i++;
}

/*
header('Content-Type: text/html; charset=utf-8',true);
require_once '../../conect.php';

$db = Database::getInstance();
$mysqli = $db->getConnection();
foreach ($arr as $place) {
	$i++;
	$placeid = $place['place_id'];
	$nome = $place['nome'];
	$endereco = $place['endereco'];
	$lat = $place['lat'];
	$lng = $place['lng'];
	$telefone = $place['telefone'];
	$url = $place['url'];
	$website = $place['website'];
	$rua = $place['rua'];

	$sql = "INSERT INTO consultas (id, usuarios_id, palavra, total, date_add) VALUES (null, '1', 'teste', '1', null)";
	$verid = $mysqli->query($sql);


	$sql = "SELECT id, place_id FROM places WHERE place_id = $placeid";
	$verid = $mysqli->query($sql);

	if ($verid == 0){
		$sql = "INSERT INTO CONSULTAS (id, place_id, nome, endereco, lat, lng, telefone, url, website, rua, ruanumero, cidade, estado, bairro, cep, pais, date_add)
			values (null,'$placeid','$nome','$endereco','$lat','$lng','$telefone','$gplus','$website','$rua','$ruanumero','$locality','$estado','$bairro','$cep','$pais', timestamp)";
		$mysqli->query($sql);
		
		$ultimoid = mysql_insert_id();

		//cria relação usuario/place
		$sql = "INSERT INTO places_has_usuarios (places_id, usuarios_id) VALUES ('$ultimoid', '$user_id')";
		$mysqli->query($sql);
	}else{
		$place_id = $verid['id']; 
		//cria relação usuario/place
		$sql = "INSERT INTO places_has_usuarios (places_id, usuarios_id) VALUES ('$place_id', '$user_id')";
		$mysqli->query($sql);
	} 
}*/
return $i;
?>