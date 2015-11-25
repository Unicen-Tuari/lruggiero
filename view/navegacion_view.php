<?php

	// Inclusion del Archivo de la Vista Base
	REQUIRE_ONCE('main_view.php');

	// Definicion de la Vista de Navegacion
	class NavegacionView extends MainView{

		// Carga el Head, Nav y Footer
		function showIndex(){
			$this->smarty->display('index.tpl');
		}

		// Carga la Seccion de Inicio
		function showInicio($categorias, $noticias){
			$this->smarty->assign('categorias', $categorias);
			$this->smarty->assign('noticias', $noticias);
			$this->smarty->display('inicio.tpl');
		}

		// Carga la Seccion de Inicio con las Noticias Correspondientes a la Categoria Indicada
		function showNoticias($categorias, $noticias){
			$this->smarty->assign('categorias', $categorias);
			$this->smarty->assign('noticias', $noticias);
			$this->smarty->display('inicio.tpl');
		}

		// Carga la Seccion de Inicio con la Noticia Indicada
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
	}
?>