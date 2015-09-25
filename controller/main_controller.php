<?php

// Inclusion del Modelo Principal
	REQUIRE_ONCE('model/main_model.php');

// Inclusion de la Vista Principal
	REQUIRE_ONCE('view/main_view.php');

// Definicion del Controlador Principal
	class MainController{
		private $model;
		private $view;

		function __construct(){
			$this->model = new MainModel();
			$this->view = new MainView();
		}

	// Carga el Head, Nav y Footer
		function index(){
			$this->view->showIndex();
		}

	// Carga la Seccion de Inicio
		function inicio(){
			$this->view->showInicio();
		}

	// Carga la Seccion de Actividades
		function actividades(){
			$this->view->showActividades();
		}

	// Carga la Seccion de Galeria
		function galeria(){
			$this->view->showGaleria();
		}

	// Carga la Seccion de Contacto
		function contacto(){
			$this->view->showContacto();
		}

	// Carga la Seccion del Gestor de Administrador
		function gestorAdmin(){
			$this->view->showGestorAdmin($this->model->leerCategorias());
		}

	// Crea una Nueva Categoria de Noticias
		function agregarCategoria(){
			if(isset($_REQUEST['categoria'])){
				$this->model->agregarCategoria($_REQUEST['categoria']);
				$this->gestorAdmin();
			}
		}

	}
?>