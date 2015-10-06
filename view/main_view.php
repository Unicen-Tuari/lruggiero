<?php

// Inclusion del Motor de Templates Smarty
	REQUIRE_ONCE('libs/smarty/Smarty.class.php');

// Definicion de la Vista Principal
	class MainView{
		private $smarty;

		function __construct(){
			$this->smarty = new Smarty;
			$this->smarty->setCompileDir('libs/smarty/templates_c');
		}

	// Carga el Head, Nav y Footer
		function showIndex(){
			$this->smarty->display('index.tpl');
		}

	// Carga la Seccion de Inicio
		function showInicio($noticias){
			$this->smarty->assign('noticias', $noticias);
			$this->smarty->display('inicio.tpl');
		}

	// Carga la Seccion de Inicio
		function showNoticia($noticia){
			$this->smarty->assign('noticia', $noticia);
			$this->smarty->display('noticia.tpl');
		}

	// Carga la Seccion de Informacion
		function showInformacion(){
			$this->smarty->display('informacion.tpl');
		}

	// Carga la Seccion de Galeria
		function showGaleria(){
			$this->smarty->display('galeria.tpl');
		}

	// Carga la Seccion de Contacto
		function showContacto(){
			$this->smarty->display('contacto.tpl');
		}

	// Carga la Seccion del Gestor de Administrador
		function showGestorAdmin($categorias, $noticias){
			$this->smarty->assign('categorias', $categorias);
			$this->smarty->assign('noticias', $noticias);
			$this->smarty->display('gestorAdmin.tpl');
		}

	}
?>