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
					$queryInsert = $this->db->prepare('INSERT INTO categoria(nombre) VALUES(?)');
					$queryInsert->execute(array($categoria));
					$this->db->commit();
				}
			} catch(Exception $e){
				$this->db->rollBack();
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
			return $categorias;
		}

	// Crea una Nueva Noticia
		function agregarNoticia($categoria, $titulo, $resumen, $contenido){
			try{
				$this->db->beginTransaction();
				$querySelect = $this->db->prepare('SELECT 1 FROM noticia WHERE titulo=?');
				$querySelect->execute(array($titulo));
				if(!$querySelect->fetch()){
					$queryInsert = $this->db->prepare('INSERT INTO noticia(categoria, titulo, resumen, contenido) VALUES(?, ?, ?, ?)');
					$queryInsert->execute(array($categoria, $titulo, $resumen, $contenido));
					$this->db->commit();
				}
			} catch(Exception $e){
				$this->db->rollBack();
			}
		}

	}
?>