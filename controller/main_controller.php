<?php

	// Inclusion del Modelo Categoria
	REQUIRE_ONCE('model/categoria_model.php');

	// Inclusion del Modelo Noticia
	REQUIRE_ONCE('model/noticia_model.php');

	// Inclusion del Modelo Contacto
	REQUIRE_ONCE('model/contacto_model.php');

	// Inclusion del Modelo Usuario
	REQUIRE_ONCE('model/usuario_model.php');

	// Inclusion de la Vista de Navegacion
	REQUIRE_ONCE('view/navegacion_view.php');

	// Inclusion de la Vista de Usuario
	REQUIRE_ONCE('view/usuario_view.php');

	// Definicion del Controlador Principal
	class MainController{
		protected $categoriaModel;
		protected $noticiaModel;
		protected $contactoModel;
		protected $usuarioModel;
		protected $navegacionView;
		protected $usuarioView;

		function __construct(){
			$this->categoriaModel = new CategoriaModel();
			$this->noticiaModel = new NoticiaModel();
			$this->contactoModel = new ContactoModel();
			$this->usuarioModel = new UsuarioModel();
			$this->navegacionView = new NavegacionView();
			$this->usuarioView = new UsuarioView();
		}
	}
?>