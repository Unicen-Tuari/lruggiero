<?php

	// Inclusion del Archivo de Controlador Base
	REQUIRE_ONCE('main_controller.php');

	// Definicion del Controlador de Usuarios
	class UsuarioController extends MainController{

		// Carga el Login de la Seccion del Gestor de Administrador Si Existe una Sesion Valida
		function loginGestorAdmin(){
			if($this->verificarSesion()){
				$this->usuarioView->showGestorAdmin();
			} else {
				$this->usuarioView->showLoginGestorAdmin();
			}
		}

		// Realiza la Comprobacion de Usuario para Crear una Sesion y Acceder al Gestor de Administrador
		function iniciarSesion(){
			if(isset($_POST['usuario']) && isset($_POST['password'])){
				$password = $this->usuarioModel->leerPassword($_POST['usuario']);
				if(sha1($_POST['password']) === $password['password']){
					session_start();
					$_SESSION['usuario'] = $_POST['usuario'];
					$_SESSION['creacion'] = time();
					$_SESSION['validez'] = 600;
					$this->usuarioView->showGestorAdmin();
				} else {
					echo 'error';
				}
			}
		}

		// Finaliza la Sesion
		function cerrarSesion(){
			session_start();
			if(isset($_SESSION['usuario'])){
				session_destroy();
				$this->loginGestorAdmin();
			}
		}

		// Verifica Si la Sesion es Valida
		function verificarSesion(){
			session_start();
			if(isset($_SESSION['usuario'])){
				if((time() - $_SESSION['creacion']) > $_SESSION['validez']){
					session_destroy();
					return false;
				} else {
					return true;
				}
			} else {
				return false;
			}
		}
	}
?>