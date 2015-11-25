<?php

	// Inclusion del Archivo de Controlador Base
	REQUIRE_ONCE('main_controller.php');

	// Definicion del Controlador de Navegacion
	class NavegacionController extends MainController{

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
	}
?>