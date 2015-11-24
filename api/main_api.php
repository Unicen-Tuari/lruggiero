<?php

	// Clase de la API Principal
	abstract class MainAPI{
		protected $method = '';
		protected $endpoint = '';
		protected $args = array();
		protected $formData = '';

		function __construct($request){
			header("Content-Type: application/json");
			$this->args = explode('/', rtrim($request, '/'));
			$this->endpoint = array_shift($this->args);
			$this->method = $_SERVER['REQUEST_METHOD'];
			$this->formData = json_decode(file_get_contents('php://input'));
		}

		// Funcion que Retorna la Respuesta de lo Solicitado al Endpoint
		function procesarAPI(){
			if(method_exists($this, $this->endpoint)){
				return $this->_pedirStatus($this->{$this->endpoint}($this->args), 200);
			} else {
				return $this->_pedirStatus('Error Interno del Endpoint: ' . $this->endpoint, 404);
			}
		}

		// Funcion que Empaqueta en Formato JSON la Respuesta y el Status 
		private function _pedirStatus($datos, $codigo){
			header('HTTP/1.1 ' . $codigo . ' ' . $this->_pedirMensaje($codigo));
			return json_encode($datos);
		}

		// Funcion que Identifica el Mensaje Correspondiente al Codigo de Respuesta
		private function _pedirMensaje($codigo){
			switch($codigo){
				case 200:
					return 'Ok';
					break;

				case 404:
					return 'No Encontrado';
					break;

				default:
					return 'Error Interno del Server';
					break;
			}
		}
	}
?>