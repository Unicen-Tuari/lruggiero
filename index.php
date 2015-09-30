<?php

// Inclusion del Archivo de Configuracion del Router
	REQUIRE_ONCE('config/router_config.php');

// Inclusion del Controlador Principal
	REQUIRE_ONCE('controller/main_controller.php');

// Resolucion del Enrutamiento
	$mainController = new MainController();

	if(!array_key_exists(RouterConfig::$ACTION, $_REQUEST) OR $_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_INDEX){

	// Carga el Head, Nav y Footer
		$mainController->index();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_INICIO && isset($_REQUEST['id'])){

	// Carga la Seccion de Inicio con la Noticia Indicada
		$mainController->noticia();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_INICIO){

	// Carga la Seccion de Inicio
		$mainController->inicio();

	}  elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_ACTIVIDADES){

	// Carga la Seccion de Actividades
		$mainController->actividades();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_GALERIA){

	// Carga la Seccion de Galeria
		$mainController->galeria();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_CONTACTO){

	// Carga la Seccion de Contacto
		$mainController->contacto();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_GESTOR_ADMIN){

	// Carga la Seccion del Gestor de Administrador
		$mainController->gestorAdmin();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_AGREGAR_CATEGORIA){

	// Crea una Nueva Categoria de Noticias
		$mainController->agregarCategoria();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_ELIMINAR_CATEGORIA && isset($_REQUEST['id'])){

	// Elimina la Categoria Seleccionada
		$mainController->eliminarCategoria();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_AGREGAR_NOTICIA){

	// Crea una Nueva Noticia
		$mainController->agregarNoticia();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_ELIMINAR_NOTICIA && isset($_REQUEST['id'])){

	// Elimina la Noticia Seleccionada
		$mainController->eliminarNoticia();

	} elseif ($_REQUEST[RouterConfig::$ACTION] === RouterConfig::$ACTION_AGREGAR_IMAGENES){

	// Agrega Imagenes a una Noticia
		$mainController->agregarImagenes();

	}

?>