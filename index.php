<?php

	// Inclusion del Archivo de Configuracion del Router
	REQUIRE_ONCE('config/router_config.php');

	// Inclusion del Controlador Principal
	REQUIRE_ONCE('controller/main_controller.php');
	$mainController = new MainController();

	// Resolucion del Enrutamiento
	if(!array_key_exists(RouterConfig::$ACTION, $_REQUEST)){
		// Carga el Head, Nav y Footer
		$mainController->index();
	} else {
		switch($_REQUEST[RouterConfig::$ACTION]){
			case RouterConfig::$ACTION_INICIO:
				// Carga la Seccion de Inicio
				$mainController->inicio();
				break;

			case RouterConfig::$ACTION_NOTICIA:
				// Carga la Seccion de Inicio con la Noticia Indicada
				$mainController->noticia();
				break;

			case RouterConfig::$ACTION_INFORMACION:
				// Carga la Seccion de Informacion
				$mainController->informacion();
				break;

			case RouterConfig::$ACTION_GALERIA:
				// Carga la Seccion de Galeria
				$mainController->galeria();
				break;

			case RouterConfig::$ACTION_CONTACTO:
				// Carga la Seccion de Contacto
				$mainController->contacto();
				break;

			case RouterConfig::$ACTION_AGREGAR_CONSULTA:
				// Almacena la Consulta Enviada
				$mainController->agregarConsulta();
				break;

			case RouterConfig::$ACTION_GESTOR_ADMIN:
				// Carga la Seccion del Gestor de Administrador
				$mainController->gestorAdmin();
				break;
		}
	}

?>