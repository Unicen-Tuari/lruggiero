<?php

	// Inclusion del Modelo Categoria
	REQUIRE_ONCE('model/categoria_model.php');

	// Inclusion del Modelo Noticia
	REQUIRE_ONCE('model/noticia_model.php');

	// Inclusion del Modelo Consulta
	REQUIRE_ONCE('model/consulta_model.php');

	// Inclusion de la Vista Principal
	REQUIRE_ONCE('view/main_view.php');

	// Definicion del Controlador Principal
	class MainController{
		private $categoriaModel;
		private $noticiaModel;
		private $consultaModel;
		private $view;

		function __construct(){
			$this->categoriaModel = new CategoriaModel();
			$this->noticiaModel = new NoticiaModel();
			$this->consultaModel = new ConsultaModel();
			$this->view = new MainView();
		}

		// Carga el Head, Nav y Footer
		function index(){
			$this->view->showIndex();
		}

		// Carga la Seccion de Inicio
		function inicio(){
			$this->view->showInicio($this->categoriaModel->leerCategorias(), $this->noticiaModel->leerNoticias());
		}

		// Carga la Seccion de Inicio con las Noticias Correspondientes a la Categoria Indicada
		function noticias(){
			if(isset($_REQUEST['id'])){
				$this->view->showNoticias($this->categoriaModel->leerCategorias(), $this->noticiaModel->leerNoticias($_REQUEST['id']));
			}
		}

		// Carga la Seccion de Inicio con la Noticia Indicada
		function noticia(){
			if(isset($_REQUEST['id'])){
				$this->view->showNoticia($this->noticiaModel->leerNoticia($_REQUEST['id']));
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
			   isset($_REQUEST['email']) &&
			   isset($_REQUEST['consulta'])){
				$this->consultaModel->agregarConsulta($_REQUEST['nombre'], $_REQUEST['nick'], $_REQUEST['email'], $_REQUEST['ubicacion'], $_REQUEST['consulta']);
			}
		}

		// Carga la Seccion del Gestor de Administrador
		function gestorAdmin(){
			$this->view->showGestorAdmin($this->noticiaModel->leerNoticias());
		}
	}
?>