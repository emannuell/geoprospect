<?php
header('Content-Type: text/html; charset=utf-8',true);
require_once '../../conect.php';

/*
$db = Database::getInstance();
$mysqli = $db->getConnection();

*/

$db = Database::getInstance();
$mysqli = $db->getConnection();

$chave = 'AIzaSyDErUb9c8c0z3tMO-kamCC_ZTZ8AcHCtbY';

function buscaCidade($cidade, $local){
	if (!empty($cidade)) {
		//Pega Lat e Lng do local, se for cidade/estado pega o centro, se for cidade/bairro pega o centro do bairro.
		$geocode = "http://maps.google.com/maps/api/geocode/json?address=".$cidade.",".$local."&sensor=false";
		$string = file_get_contents($geocode);
		$json = json_decode($string);
		$resultado = $json->results;
		$latitude = $json->results[0]->geometry->location->lat;
		$longitude = $json->results[0]->geometry->location->lng;
		$latLng = array($latitude , $longitude);
		return $latLng;
	}
}

function buscaLocais($latitude, $longitude, $raio, $palavra){
  global $chave;
	$url = "https://maps.googleapis.com/maps/api/place/radarsearch/json?location=".$latitude.",".$longitude."&radius=".$raio."&keyword=".$palavra."&key=".$chave;

	$string = file_get_contents($url);
	$json = json_decode($string);
	$resultado = $json->results;

	echo count($resultado);
	exit;

        return $resultado;
}

function placesSearch($usuario_id, $cidade, $local, $raio, $palavra){
  global $chave, $mysqli;
	$cidade = strtolower(str_replace(" ","",$cidade));
	$local = strtolower(str_replace(" ","",$local));
	$raio = str_replace(" ","",$raio);
	$palavra = strtolower(str_replace(" ","",$palavra));

	$i = 0;
	if (!empty($cidade)){
		$latLng = buscaCidade($cidade, $local);
		$resultado = buscaLocais($latLng[0], $latLng[1], $raio, $palavra);

		foreach ($resultado as $resultados) {
			$placeid = $resultados->place_id;
			$sql = "SELECT place_id FROM places WHERE place_id = $placeid";

			$verid = $mysqli->query($sql);

			print_r( $verid );

			if($verid == 0){
				$mapsdetails = "https://maps.googleapis.com/maps/api/place/details/json?placeid=".$placeid."&key=".$chave;

				echo $mapsdetails;
				exit;

				$string = file_get_contents($mapsdetails);
				$json = json_decode($string);
				$detalhes = $json->result;

				$nome = $detalhes->name;
				$lat = $detalhes->geometry->location->lat;
				$lng = $detalhes->geometry->location->lng;
				$endereco = $detalhes->formatted_address;
				$telefone = $detalhes->formatted_phone_number;
				$gplus = $detalhes->url;

				print_r( $detalhes );
				exit;

				if ($detalhes->website)
					$website = $detalhes->website;

				foreach($detalhes->address_components as $address_componenets) {
					if($address_componenets->types[0] == "locality") {
						$locality = $address_componenets->long_name;
					}
					if($address_componenets->types[0] == "route") {
						$rua = $address_componenets->long_name;
					}
					if($address_componenets->types[0] == "street_number") {
						$ruanumero = $address_componenets->long_name;
					}
					if($address_componenets->types[0] == "administrative_area_level_1") {
						$estado = $address_componenets->long_name;
					}
					if($address_componenets->types[0] == "country") {
						$pais = $address_componenets->long_name;
					}
					if($address_componenets->types[0] == "sublocality") {
						$bairro = $address_componenets->long_name;
					}
					if($address_componenets->types[0] == "sublocality_level_1") {
						$bairro = $address_componenets->long_name;
					}
					if($address_componenets->types[0] == "neighborhood") {
						$bairro = $address_componenets->long_name;
					}
					if($address_componenets->types[0] == "postal_code") {
						$cep = $address_componenets->long_name;
					}
				}
				mysql_query("INSERT INTO CONSULTAS (id, place_id, nome, endereco, lat, lng, telefone, url, website, rua, ruanumero, cidade, estado, bairro, cep, pais, date_add)
				values (null,'$placeid','$nome','$endereco','$lat','$lng','$telefone','$gplus','$website','$rua','$ruanumero','$locality','$estado','$bairro','$cep','$pais', timestamp)");
				$i++;
				//Criar relação registro / usuario
				//mysql_query("INSERT INTO places_has_usuarios(places_id, usuarios_id) values ($place_id, $usuario_id)");
			}
		}
		//Insere registro no indice
		mysql_query("INSERT INTO consultas (id, usuario_id, palavra, total, date_add) VALUES (null,'$usuario_id','$palavra','$i', current_time)");
		return $i;
	}
}

placesSearch(1, 'pato branco', 'paraná', 5000, 'mecanica');
