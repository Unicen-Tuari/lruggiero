<?php

	// Inclusion de la API Principal
	REQUIRE_ONCE('main_api.php');

	// Inclusion del Modelo Noticia
	REQUIRE_ONCE('../model/noticia_model.php');

	// Clase de Noticias
	class NoticiaAPI extends MainAPI{
		private $model;

		function __construct($request){
			parent::__construct($request);
			$this->model = new NoticiaModel();
		}

		// Funcion que Ejecuta la Solicitud Correspondiente Segun el Metodo Indicado
		function noticia(){
			switch($this->method){
				case 'POST':
					if(count($this->args) === 0 &&
					   isset($_POST['id_categoria']) &&
					   isset($_POST['titulo']) &&
					   isset($_POST['contenido']) &&
					   isset($_FILES['imagenes'])){
						return $this->model->agregarNoticia($_POST['id_categoria'], $_POST['titulo'], $_POST['contenido'], $_FILES['imagenes']);
					} elseif(count($this->args) === 1 && 
					   isset($_FILES['imagenesAjax'])){
						return $this->model->agregarImagenes($this->args[0], $_FILES['imagenesAjax']);
					} else {
						return 'Datos Mal Enviados';
					}
					break;

				case 'PUT':
					if(count($this->args) === 1 &&
					   isset($this->formData->id_categoria) &&
					   isset($this->formData->titulo) &&
					   isset($this->formData->contenido)){
						$this->model->modificarNoticia($this->args[0], $this->formData->id_categoria, $this->formData->titulo, $this->formData->contenido);
					} else {
						return 'Datos Mal Enviados';
					}
					break;

				case 'DELETE':
					if(count($this->args) === 1){
						return $this->model->eliminarNoticia($this->args[0]);
					} else {
						return 'Datos Mal Enviados';
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