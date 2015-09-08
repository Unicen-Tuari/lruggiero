<?php

// Inclusion de la Vista Principal
	REQUIRE_ONCE('view/main_view.php');

// Definicion del Controlador Principal
	class MainController{
		private $view;

		function __construct(){
			$this->view = new MainView();
		}

		function home(){
			$this->view->showHome();
		}
	}

?>