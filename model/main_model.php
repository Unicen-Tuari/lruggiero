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
			if($categoria){
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
		function agregarNoticia($id_categoria, $titulo, $contenido){
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			if($id_categoria && $titulo && $contenido){
				try{
					$this->db->beginTransaction();
					$querySelect = $this->db->prepare('SELECT 1 FROM noticia WHERE titulo=?');
					$querySelect->execute(array($titulo));
					if(!$querySelect->fetch()){
						$queryInsert = $this->db->prepare('INSERT INTO noticia(id_categoria, titulo, contenido, fecha, hora) VALUES(?, ?, ?, ?, ?)');
						$queryInsert->execute(array($id_categoria, $titulo, $contenido, date('d/m/y'), date('H:i')));
						$this->db->commit();
					}
				} catch(Exception $e){
					$this->db->rollBack();
				}
			}
		}

	// Lee las Noticias
		function leerNoticias(){
			$noticias = array();
			$noticia = array();
			$nombreCategoria = '';
			$querySelect = $this->db->prepare('SELECT * FROM noticia');
			$querySelect->execute();
			while($noticia = $querySelect->fetch()){
				$queryCategoria = $this->db->prepare('SELECT nombre FROM categoria WHERE id=?');
				$queryCategoria->execute(array($noticia['id_categoria']));
				$nombreCategoria = $queryCategoria->fetch();
				$noticia['nombreCategoria'] = $nombreCategoria['nombre'];
				$noticias[] = $noticia;
			}
			return array_reverse($noticias);
		}

	// Lee la Noticia Por ID
		function leerNoticia($id){
			$noticia = array();
			$nombreCategoria = '';
			$querySelect = $this->db->prepare('SELECT * FROM noticia WHERE id=?');
			$querySelect->execute(array($id));
			$noticia = $querySelect->fetch();
			$queryCategoria = $this->db->prepare('SELECT nombre FROM categoria WHERE id=?');
			$queryCategoria->execute(array($noticia['id_categoria']));
			$nombreCategoria = $queryCategoria->fetch();
			$noticia['nombreCategoria'] = $nombreCategoria['nombre'];
			return $noticia;
		}

	}
?>