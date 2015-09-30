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
			if(strlen($categoria) > 4){
				try{
					$this->db->beginTransaction();
					$queryInsert = $this->db->prepare('INSERT INTO categoria(nombre) VALUES(?)');
					$queryInsert->execute(array($categoria));
					$this->db->commit();
				} catch(Exception $e){
					$this->db->rollBack();
				}
			}
		}

	// Elimina la Categoria Seleccionada
		function eliminarCategoria($id){
			if($id){
				try{
					$this->db->beginTransaction();
					$queryDelete = $this->db->prepare('DELETE FROM categoria WHERE id = ?');
					$queryDelete->execute(array($id));
					$this->db->commit();
				} catch(Exception $e){
					$this->db->rollBack();
					echo 'errorEliminarCategoria';
				}
			}
		}

	// Lee las Categorias de las Noticias
		function leerCategorias(){
			$categorias = array();
			$categoria = '';
			$querySelect = $this->db->prepare('SELECT * FROM categoria ORDER BY id');
			$querySelect->execute();
			while($categoria = $querySelect->fetch()){
				$categorias[] = $categoria;
			}
			return $categorias;
		}

	// Crea una Nueva Noticia
		function agregarNoticia($id_categoria, $titulo, $contenido, $imagenesTmp){
			date_default_timezone_set('America/Argentina/Buenos_Aires');
			$imagenes = '';
			$idNoticia = '';
			if($id_categoria && strlen($titulo) > 9 && strlen($contenido) > 139){
				try{
					$this->db->beginTransaction();
					$queryInsert = $this->db->prepare('INSERT INTO noticia(id_categoria, titulo, contenido, fecha, hora) VALUES(?, ?, ?, ?, ?)');
					$queryInsert->execute(array($id_categoria, $titulo, $contenido, date('d/m/y'), date('H:i')));
					$idNoticia = $this->db->lastInsertId();
					if($imagenesTmp['name'][0]){
						$imagenes = $this->subirImagenes($imagenesTmp);
						foreach($imagenes as $ruta){
							$queryInsert = $this->db->prepare('INSERT INTO imagen(id_noticia, ruta) VALUES(?, ?)');
							$queryInsert->execute(array($idNoticia, $ruta));
						}
					}
					$this->db->commit();
				} catch(Exception $e){
					$this->db->rollBack();
				}
			}
		}

	// Elimina la Noticia Seleccionada
		function eliminarNoticia($id){
			if($id){
				try{
					$this->db->beginTransaction();
					$queryImagenes = $this->db->prepare('SELECT ruta FROM imagen WHERE id_noticia = ?');
					$queryImagenes->execute(array($id));
					$queryDelete = $this->db->prepare('DELETE FROM noticia WHERE id = ?');
					$queryDelete->execute(array($id));
					while($imagen = $queryImagenes->fetch()) {
						unlink($imagen['ruta']);
					}
					$this->db->commit();
				} catch(Exception $e){
					$this->db->rollBack();
					echo 'errorEliminarNoticia';
				}
			}
		}

	// Agrega Imagenes a una Noticia
		function agregarImagenes($id_noticia, $imagenesTmp){
			$imagenes = '';
			if($id_noticia && $imagenesTmp['name'][0]){
				try{
					$this->db->beginTransaction();
					$imagenes = $this->subirImagenes($imagenesTmp);
					foreach($imagenes as $ruta){
						$queryInsert = $this->db->prepare('INSERT INTO imagen(id_noticia, ruta) VALUES(?, ?)');
						$queryInsert->execute(array($id_noticia, $ruta));
					}
					$this->db->commit();
				} catch(Exception $e){
					$this->db->rollBack();
				}
			}
		}

	// Almacena las Imagenes en la Carpeta de Uploads
		function subirImagenes($imagenesTmp){
			$directorio = 'uploads/imagenes/';
			$imagenes = array();
			foreach($imagenesTmp['tmp_name'] as $key => $value){
				$imagenes[] = $directorio . uniqid() . $imagenesTmp['name'][$key];
				move_uploaded_file($value, end($imagenes));
			}
			return $imagenes;
		}

	// Lee las Noticias
		function leerNoticias(){
			$noticias = array();
			$noticia = array();
			$nombreCategoria = '';
			$querySelect = $this->db->prepare('SELECT * FROM noticia ORDER BY id DESC');
			$querySelect->execute();
			while($noticia = $querySelect->fetch()){
				$queryCategoria = $this->db->prepare('SELECT nombre FROM categoria WHERE id=?');
				$queryCategoria->execute(array($noticia['id_categoria']));
				$nombreCategoria = $queryCategoria->fetch();
				$noticia['nombreCategoria'] = $nombreCategoria['nombre'];
				$queryImagenes = $this->db->prepare('SELECT ruta FROM imagen WHERE id_noticia=?');
				$queryImagenes->execute(array($noticia['id']));
				while($imagen = $queryImagenes->fetch()) {
					$noticia['imagenes'][] = $imagen['ruta'];
				}
				$noticias[] = $noticia;
			}
			return $noticias;
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
			$queryImagenes = $this->db->prepare('SELECT ruta FROM imagen WHERE id_noticia=?');
			$queryImagenes->execute(array($noticia['id']));
			while($imagen = $queryImagenes->fetch()) {
				$noticia['imagenes'][] = $imagen['ruta'];
			}
			return $noticia;
		}

	}
?>