<?php

	// Inclusion de la API Principal
	REQUIRE_ONCE('main_api.php');
	// Inclusion del Modelo Principal
	REQUIRE_ONCE('../model/main_model.php');

	// Clase de Noticias
	class NoticiaAPI extends MainAPI{
		private $model;

		function __construct($request){
			parent::__construct($request);
			$this->model = new MainModel();
		}

		// Funcion que Ejecuta la Solicitud Correspondiente Segun el Metodo Indicado
		function noticia(){
			switch($this->method){
				case 'POST':
					if(isset($_REQUEST['id_categoria']) &&
					   isset($_REQUEST['titulo']) &&
					   isset($_REQUEST['contenido']) &&
					   isset($_FILES['imagenes'])){
						$this->model->agregarNoticia($_REQUEST['id_categoria'], $_REQUEST['titulo'], $_REQUEST['contenido'], $_FILES['imagenes']);
					} elseif(isset($_REQUEST['id_noticia']) && 
					   isset($_FILES['imagenesAjax'])){
						$this->model->agregarImagenes($_REQUEST['id_noticia'], $_FILES['imagenesAjax']);
					}
					break;

				case 'PUT':
					/*if(isset(EL ID CATEGORIA) &&
					   isset(EL TITULO) &&
					   isset(EL CONTENIDO)){
						$this->model->modificarNoticia(EL ID CATEGORIA, EL TITULO, EL CONTENIDO);
					}*/
					break;

				case 'DELETE':
					if(count($this->args) === 1){
						return $this->model->eliminarNoticia($this->args[0]);
					}
					break;

				case 'GET':
					if(count($this->args) === 1){
						return $this->model->leerNoticia($this->args[0]);
					} else {
						return $this->model->leerNoticias();	
					}
					break;

				default:
					return 'Metodo Desconocido';
					break;
			}
		}
	}
?>