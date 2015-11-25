<?php

	// Verifica Si la Sesion es Valida
	function verificarSesion(){
		session_start();
		if(isset($_SESSION['usuario'])){
			if((time() - $_SESSION['creacion']) > $_SESSION['validez']){
				session_destroy();
				return false;
			} else {
				return true;
			}
		} else {
			return false;
		}
	}

	if(verificarSesion()){
		// Inclusion de la API Categoria
		REQUIRE_ONCE('categoria_api.php');
		// Inclusion de la API Noticia
		REQUIRE_ONCE('noticia_api.php');

		// Extrae el Nombre del Endpoint Solicitado
		$datos = explode('/', rtrim($_REQUEST['parametros'], '/'));
		$endpoint = $datos[0];

		// Chequea que el Endpoint Solicitado Sea Valido
		switch($endpoint){
			case 'categoria':
				// Instancia la Clase CategoriaAPI
				$categoriaAPI = new CategoriaAPI($_REQUEST['parametros']);
				echo $categoriaAPI->procesarAPI();
				break;

			case 'noticia':
				// Instancia la Clase NoticiaAPI
				$noticiaAPI = new NoticiaAPI($_REQUEST['parametros']);
				echo $noticiaAPI->procesarAPI();
				break;

			default:
				echo 'Endpoint Invalido';
				break;
		}
	} else {
		echo 'sesionCaducada';
	}
?>