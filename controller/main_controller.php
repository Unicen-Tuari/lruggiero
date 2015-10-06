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
			$this->view->showInicio($this->model->leerNoticias());
		}

	// Carga la Seccion de Inicio con la Noticia Indicada
		function noticia(){
			if(isset($_REQUEST['id'])){
				$this->view->showNoticia($this->model->leerNoticia($_REQUEST['id']));
			}
		}

	// Carga la Seccion de Informacion
		function informacion(){
			$this->view->showInformacion();
		}

	// Carga la Seccion de Galeria
		function galeria(){
			$this->view->showGaleria();
		}

	// Carga la Seccion de Contacto
		function contacto(){
			$this->view->showContacto();
		}

	// Almacena la Consulta Enviada
		function agregarConsulta(){
			if(isset($_REQUEST['nombre']) &&
			   isset($_REQUEST['nick']) &&
			   isset($_REQUEST['email']) &&
			   isset($_REQUEST['ubicacion']) &&
			   isset($_REQUEST['consulta'])){
				$this->model->agregarConsulta($_REQUEST['nombre'], $_REQUEST['nick'], $_REQUEST['email'], $_REQUEST['ubicacion'], $_REQUEST['consulta']);
			}
		}

	// Carga la Seccion del Gestor de Administrador
		function gestorAdmin(){
			$this->view->showGestorAdmin($this->model->leerCategorias(), $this->model->leerNoticias());
		}

	// Crea una Nueva Categoria de Noticias
		function agregarCategoria(){
			if(isset($_REQUEST['categoria'])){
				$this->model->agregarCategoria($_REQUEST['categoria']);
			}
		}

	// Elimina la Categoria Seleccionada
		function eliminarCategoria(){
			if(isset($_REQUEST['id'])){
				$this->model->eliminarCategoria($_REQUEST['id']);
			}
		}

	// Crea una Nueva Noticia
		function agregarNoticia(){
			if(isset($_REQUEST['id_categoria']) &&
			   isset($_REQUEST['titulo']) &&
			   isset($_REQUEST['contenido']) &&
			   isset($_FILES['imagenes'])){
				$this->model->agregarNoticia($_REQUEST['id_categoria'], $_REQUEST['titulo'], $_REQUEST['contenido'], $_FILES['imagenes']);
			}
		}

	// Elimina la Noticia Seleccionada
		function eliminarNoticia(){
			if(isset($_REQUEST['id'])){
				$this->model->eliminarNoticia($_REQUEST['id']);
			}
		}

	// Agrega Imagenes a una Noticia
		function agregarImagenes(){
			if(isset($_REQUEST['id_noticia']) && 
			   isset($_FILES['imagenesAjax'])){
				$this->model->agregarImagenes($_REQUEST['id_noticia'], $_FILES['imagenesAjax']);
			}
		}

	}
?>