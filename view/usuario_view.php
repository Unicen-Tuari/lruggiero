<?php

	// Inclusion del Archivo de la Vista Base
	REQUIRE_ONCE('main_view.php');

	// Definicion de la Vista de Usuario
	class UsuarioView extends MainView{

		// Carga el Login de la Seccion del Gestor de Administrador
		function showLoginGestorAdmin(){
			$this->smarty->display('loginGestorAdmin.tpl');
		}

		// Carga la Seccion del Gestor de Administrador
		function showGestorAdmin(){
			$this->smarty->display('gestorAdmin.tpl');
		}
	}
?>