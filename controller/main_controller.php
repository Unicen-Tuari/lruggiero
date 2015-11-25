<?php

	// Inclusion del Modelo Categoria
	REQUIRE_ONCE('model/categoria_model.php');

	// Inclusion del Modelo Noticia
	REQUIRE_ONCE('model/noticia_model.php');

	// Inclusion del Modelo Contacto
	REQUIRE_ONCE('model/contacto_model.php');

	// Inclusion del Modelo Usuario
	REQUIRE_ONCE('model/usuario_model.php');

	// Inclusion de la Vista Principal
	REQUIRE_ONCE('view/main_view.php');

	// Definicion del Controlador Principal
	class MainController{
		protected $categoriaModel;
		protected $noticiaModel;
		protected $contactoModel;
		protected $usuarioModel;
		protected $view;

		function __construct(){
			$this->categoriaModel = new CategoriaModel();
			$this->noticiaModel = new NoticiaModel();
			$this->contactoModel = new ContactoModel();
			$this->usuarioModel = new UsuarioModel();
			$this->view = new MainView();
		}
	}
?>