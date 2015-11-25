<?php

	// Inclusion del Archivo de Controlador Base
	REQUIRE_ONCE('main_controller.php');

	// Definicion del Controlador de Contacto
	class ContactoController extends MainController{

		// Almacena la Consulta Enviada
		function agregarConsulta(){
			if(isset($_REQUEST['nombre']) &&
			   isset($_REQUEST['email']) &&
			   isset($_REQUEST['consulta'])){
				$this->contactoModel->agregarConsulta($_REQUEST['nombre'], $_REQUEST['nick'], $_REQUEST['email'], $_REQUEST['ubicacion'], $_REQUEST['consulta']);
			}
		}
	}
?>