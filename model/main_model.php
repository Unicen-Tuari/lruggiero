<?php

	// Inclusion del Archivo de Configuracion de la Base de Datos
	REQUIRE_ONCE(__DIR__ . '/../config/db_config.php');

	// Definicion del Modelo Principal
	class MainModel{
		protected $db;

		function __construct(){
			$this->db = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASS);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
	}
?>