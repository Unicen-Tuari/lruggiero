<?php

	// Inclusion de la API Principal
	REQUIRE_ONCE('main_api.php');
	// Inclusion del Modelo Principal
	REQUIRE_ONCE('../model/main_model.php');

	// Clase de Categorias
	class CategoriaAPI extends MainAPI{
		private $model;

		function __construct($request){
			parent::__construct($request);
			$this->model = new MainModel();
		}

		// Funcion que Ejecuta la Solicitud Correspondiente Segun el Metodo Indicado
		function categoria(){
			switch($this->method){
				case 'POST':
					if(isset($_POST['categoria'])){
						return $this->model->agregarCategoria($_POST['categoria']);
					} else {
						return 'Datos Mal Enviados';
					}
					break;

				case 'PUT':
					if(count($this->args) === 1 &&
					   isset($this->formData->categoria)){
						return $this->model->modificarCategoria($this->args[0], $this->formData->categoria);
					} else {
						return 'Datos Mal Enviados';
					}
					break;

				case 'DELETE':
					if(count($this->args) === 1){
						return $this->model->eliminarCategoria($this->args[0]);
					} else {
						return 'Datos Mal Enviados';
					}
					break;

				case 'GET':
					return $this->model->leerCategorias();
					break;

				default:
					return 'Metodo Desconocido';
					break;
			}
		}
	}
?>