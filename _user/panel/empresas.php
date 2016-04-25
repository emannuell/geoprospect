<?php

include("../../conect.php");
include("funcao_usuario.php");

$status = $_GET['status'];

$id = $_GET['id'];

$nome = $_POST['nome'];
$rua = $_POST['rua']; 
$numero = $_POST['numero'];
$estado = $_POST['estado'];
$cidade = $_POST['cidade'];
$bairro = $_POST['bairro'];
$telefone = $_POST['telefone'];
$pais = $_POST['pais'];
$cep = $_POST['cep'];
$website = $_POST['website'];
$gplus = $_POST['gplus'];

$usuario = retornaUsuario();
$usuario_id = $usuario[0];

/* ------------ Adicionar nova empresa ------------ */
if ($status == 'add') {
	$rua = str_replace(" ", "+", $_POST['rua']); 
	$numero = str_replace(" ", "+", $_POST['numero']);
	$estado = str_replace(" ", "+", $_POST['estado']);
	$cidade = str_replace(" ", "+", $_POST['cidade']);
	//Pega dados complementares do maps
	$address = $rua.",".$numero.",".$cidade.",".$estado.",".$pais;
	$geocode = file_get_contents('https://maps.google.com/maps/api/geocode/json?address='.$address.'&sensor=false&key=AIzaSyCmklj7x0FG4NZdl3bjD3VC9t_gnLm9l60');
	$output= json_decode($geocode);

	if ($output->status == 'OK') {
		echo "status OK - ";
		$lat = $output->results[0]->geometry->location->lat;
		$lng = $output->results[0]->geometry->location->lng;
		$endereco = $output->results[0]->formatted_address;
		$place_id = $output->results[0]->place_id;
		
		if(empty($pais)){
			foreach($output->results[0]->address_components as $address_components){
				if(isset($address_components->types) && $address_components->types[0] == 'country'){
					$pais = $address_components->long_name;            
				}
			}
		}
		if(empty($cep)){	
			foreach($output->results[0]->address_components as $address_components){
				if(isset($address_components->types) && $address_components->types[0] == 'postal_code'){
					$cep = str_replace("-", "", $address_components->long_name);            
				}
			}
		}
		if(empty($bairro)){
			foreach($output->results[0]->address_components as $address_components){
				if(isset($address_components->types) && $address_components->types[0] == 'administrative_area_level_1'){
					$bairro = $address_components->long_name;            
				}
				if(isset($address_components->types) && $address_components->types[0] == 'administrative_area_level_2'){
					$bairro = $address_components->long_name;            
				}
				if(isset($address_components->types) && $address_components->types[0] == 'administrative_area_level_3'){
					$bairro = $address_components->long_name;            
				}
				if(isset($address_components->types) && $address_components->types[0] == 'administrative_area_level_4'){
					$bairro = $address_components->long_name;            
				}
				if(isset($address_components->types) && $address_components->types[0] == 'administrative_area_level_5'){
					$bairro = $address_components->long_name;            
				}
			}
		}
	}	
	$sql = "INSERT INTO empresas(id, nome, endereco, rua, numero, estado, cidade, bairro, telefone, pais, lat, lng, cep, website, gplus, place_id, date_add) 
	values (null, '$nome', '$endereco', '$rua', '$numero', '$estado', '$cidade', '$bairro', '$telefone', '$pais', '$lat', '$lng', '$cep', '$website', '$gplus', '$place_id', now())";
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$mysqli->query($sql);
	$ultimoid = $mysqli->insert_id;
	$sql = "INSERT INTO usuarios_empresas(id, usuarios_id, empresas_id) values (null, '$usuario_id', '$ultimoid')";
	$mysqli->query($sql);
}

if ($status == 'edit') {
	$sql = "UPDATE empresas SET nome='$nome', rua='$rua', numero='$numero', estado='$estado', cidade='$cidade', bairro='$bairro', telefone='$telefone', pais='$pais', cep='$cep', website='$website', gplus='$gplus' WHERE id = '$id'";
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$mysqli->query($sql);
}
if ($status == 'del') {
	$sql = "UPDATE empresas SET status='0' WHERE id='$id'";
	$db = Database::getInstance();
	$mysqli = $db->getConnection();
	$mysqli->query($sql);
	
}
?>