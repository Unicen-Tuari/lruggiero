<?php

	// Inclusion del Archivo de Modelo Base
	REQUIRE_ONCE('main_model.php');

	// Clase de Contacto
	class ContactoModel extends MainModel{

		// Almacena la Consulta Enviada
		function agregarConsulta($nombre, $nick, $email, $ubicacion, $consulta){
			if(strlen($nombre) > 1 && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($consulta) > 49){
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				$tracking = uniqid();
				try{
					$this->db->beginTransaction();
					$queryInsert = $this->db->prepare('INSERT INTO consulta(tracking, nombre, nick, email, ubicacion, consulta, fecha, hora) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
					$queryInsert->execute(array($tracking, $nombre, $nick, $email, $ubicacion, $consulta, date('d/m/y'), date('H:i')));
					$this->db->commit();
					echo $tracking;
				} catch(Exception $e){
					$this->db->rollBack();
				}
			}
		}
	}
?>