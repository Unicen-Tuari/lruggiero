<?php

	// Inclusion del Archivo de Modelo Base
	REQUIRE_ONCE('main_model.php');

	// Clase de Usuarios
	class UsuarioModel extends MainModel{

		// Lee la Password del Usuario
		function leerPassword($usuario){
			$querySelect = $this->db->prepare('SELECT password FROM usuario WHERE usuario = ?');
			$querySelect->execute(array($usuario));
			$password = $querySelect->fetch(PDO::FETCH_ASSOC);
			return $password;
		}
	}
?>