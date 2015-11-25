<?php

	// Inclusion del Archivo de Configuracion del Router
	REQUIRE_ONCE('config/router_config.php');

	// Inclusion del Controlador de Navegacion
	REQUIRE_ONCE('controller/navegacion_controller.php');

	// Inclusion del Controlador de Contacto
	REQUIRE_ONCE('controller/contacto_controller.php');

	// Inclusion del Controlador de Usuarios
	REQUIRE_ONCE('controller/usuario_controller.php');

	$navegacionController = new NavegacionController();
	$contactoController = new ContactoController();
	$usuarioController = new UsuarioController();

	// Resolucion del Enrutamiento
	if(!array_key_exists(RouterConfig::$ACTION, $_REQUEST)){
		// Carga el Head, Nav y Footer
		$navegacionController->index();
	} else {
		switch($_REQUEST[RouterConfig::$ACTION]){
			case RouterConfig::$ACTION_INICIO:
				// Carga la Seccion de Inicio
				$navegacionController->inicio();
				break;

			case RouterConfig::$ACTION_NOTICIAS:
				// Carga la Seccion de Inicio con las Noticias Correspondientes a la Categoria Indicada
				$navegacionController->noticias();
				break;

			case RouterConfig::$ACTION_NOTICIA:
				// Carga la Seccion de Inicio con la Noticia Indicada
				$navegacionController->noticia();
				break;

			case RouterConfig::$ACTION_INFORMACION:
				// Carga la Seccion de Informacion
				$navegacionController->informacion();
				break;

			case RouterConfig::$ACTION_GALERIA:
				// Carga la Seccion de Galeria
				$navegacionController->galeria();
				break;

			case RouterConfig::$ACTION_CONTACTO:
				// Carga la Seccion de Contacto
				$navegacionController->contacto();
				break;

			case RouterConfig::$ACTION_AGREGAR_CONSULTA:
				// Almacena la Consulta Enviada
				$contactoController->agregarConsulta();
				break;

			case RouterConfig::$ACTION_LOGIN_GESTOR_ADMIN:
				// Carga el Login de la Seccion del Gestor de Administrador
				$usuarioController->loginGestorAdmin();
				break;

			case RouterConfig::$ACTION_INICIAR_SESION:
				// Realiza la Comprobacion de Usuario para Acceder al Gestor de Administrador
				$usuarioController->iniciarSesion();
				break;

			case RouterConfig::$ACTION_CERRAR_SESION:
				// Finaliza la Sesion
				$usuarioController->cerrarSesion();
				break;
		}
	}

?>