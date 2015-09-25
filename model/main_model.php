<?php

// Inclusion del Archivo de Configuracion de la Base de Datos
	REQUIRE_ONCE('config/db_config.php');

// Definicion del Modelo Principal
	class MainModel{
		private $db;
		private $categoria;
		private $noticia;

		function __construct(){
			$this->db = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASS);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

	// Crea una Nueva Categoria de Noticias
		function agregarCategoria($categoria){
			try{
				$this->db->beginTransaction();
				$querySelect = $this->db->prepare('SELECT 1 FROM categoria WHERE nombre=?');
				$querySelect->execute(array($categoria));
				if(!$querySelect->fetch()){
					echo 'De los Andes';
					$queryInsert = $this->db->prepare('INSERT INTO categoria(nombre) VALUES(?)');
					$queryInsert->execute(array($categoria));
					$this->db->commit();
				}
			} catch(Exception $e){
				$this->db->rollBack();
				//echo 'Excepción capturada: ',  $e->getMessage(), "\n";
			}
		}

	// Lee las Categorias de las Noticias
		function leerCategorias(){
			$categorias = array();
			$categoria = '';
			$querySelect = $this->db->prepare('SELECT * FROM categoria');
			$querySelect->execute();
			while($categoria = $querySelect->fetch()){
				$categorias[] = $categoria;
			}
			if(!$categorias){
				$categorias[]['id'] = '';
				$categorias[]['nombre'] = 'No Existen Categorias';
			}
			return $categorias;
		}

	}
?>