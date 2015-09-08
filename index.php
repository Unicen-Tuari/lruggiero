<?php

// Inclusion del Archivo de Configuracion del Router
	REQUIRE_ONCE('config/router_config.php');

// Inclusion del Controlador Principal
	REQUIRE_ONCE('controller/main_controller.php');

// Resolucion del Enrutamiento
	if(!array_key_exists(RouterConfig::$ACTION, $_REQUEST) OR $_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_HOME){

	// Carga la Home
		$mainController = new MainController();
		$mainController->home();
	}

?>