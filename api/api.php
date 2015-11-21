<?php

	// Inclusion de la API Categoria
	REQUIRE_ONCE('categoria_api.php');

	// Instancia la Clase CategoriaAPI
	$categoriaAPI = new CategoriaAPI($_REQUEST['parametros']);

	// Extrae el Nombre del Endpoint Solicitado
	$datos = explode('/', rtrim($_REQUEST['parametros'], '/'));
	$endpoint = $datos[0];

	// Chequea que el Endpoint Solicitado Sea Valido
	switch($endpoint){
		case 'categoria':
			echo $categoriaAPI->procesarAPI();
			break;
		default:
			echo 'Endpoint Invalido';
			break;
	}

?>