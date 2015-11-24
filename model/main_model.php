<?php

	// Inclusion del Archivo de Configuracion de la Base de Datos
	REQUIRE_ONCE(__DIR__ . '/../config/db_config.php');

	// Definicion del Modelo Principal
	class MainModel{
		private $db;

		function __construct(){
			$this->db = new PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASS);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}

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

		// Crea una Nueva Categoria
		function agregarCategoria($categoria){
			if(strlen($categoria) > 4){
				try{
					$this->db->beginTransaction();
					$queryInsert = $this->db->prepare('INSERT INTO categoria(nombre) VALUES(?)');
					$queryInsert->execute(array($categoria));
					$ultimoInsertId = $this->db->lastInsertId();
					$this->db->commit();
					return $ultimoInsertId;
				} catch(Exception $e){
					$this->db->rollBack();
					return 'error';
				}
			}
		}

		// Modifica el Nombre de una Categoria Existente
		function modificarCategoria($id, $categoria){
			if(strlen($categoria) > 4){
				try{
					$this->db->beginTransaction();
					$queryUpdate = $this->db->prepare('UPDATE categoria SET nombre = ? WHERE id = ?');
					$queryUpdate->execute(array($categoria, $id));
					$this->db->commit();
					return 0;
				} catch(Exception $e){
					$this->db->rollBack();
					return 'error';
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
					return 0;
				} catch(Exception $e){
					$this->db->rollBack();
					return 'error';
				}
			}
		}

		// Lee las Categorias Existentes
		function leerCategorias(){
			$categorias = array();
			$categoria = '';
			$querySelect = $this->db->prepare('SELECT * FROM categoria ORDER BY id');
			$querySelect->execute();
			while($categoria = $querySelect->fetch(PDO::FETCH_ASSOC)){
				$categorias[] = $categoria;
			}
			return $categorias;
		}

		// Crea una Nueva Noticia
		function agregarNoticia($id_categoria, $titulo, $contenido, $imagenesTmp){
			if($id_categoria && strlen($titulo) > 9 && strlen($contenido) > 139){
				date_default_timezone_set('America/Argentina/Buenos_Aires');
				try{
					$this->db->beginTransaction();
					$queryInsert = $this->db->prepare('INSERT INTO noticia(id_categoria, titulo, contenido, fecha, hora) VALUES(?, ?, ?, ?, ?)');
					$queryInsert->execute(array($id_categoria, $titulo, $contenido, date('d/m/y'), date('H:i')));
					$retorno['id'] = $this->db->lastInsertId();
					$retorno['fecha'] = date('d/m/y');
					$retorno['hora'] = date('H:i');
					if($imagenesTmp['name'][0]){
						$imagenes = $this->subirImagenes($imagenesTmp);
						foreach($imagenes as $ruta){
							$queryInsert = $this->db->prepare('INSERT INTO imagen(id_noticia, ruta) VALUES(?, ?)');
							$queryInsert->execute(array($retorno['id'], $ruta));
						}
					}
					$this->db->commit();
					return $retorno;
				} catch(Exception $e){
					$this->db->rollBack();
					return 'error';
				}
			}
		}

		// Modifica una Noticia Existente
		function modificarNoticia($id, $id_categoria, $titulo, $contenido){
			if($id_categoria && strlen($titulo) > 9 && strlen($contenido) > 139){
				try{
					$this->db->beginTransaction();
					$queryUpdate = $this->db->prepare('UPDATE noticia SET id_categoria = ?, titulo = ?, contenido = ? WHERE id = ?');
					$queryUpdate->execute(array($id_categoria, $titulo, $contenido, $id));
					$this->db->commit();
					return 0;
				} catch(Exception $e){
					$this->db->rollBack();
					return 'error';
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
					while($imagen = $queryImagenes->fetch(PDO::FETCH_ASSOC)){
						unlink($imagen['ruta']);
					}
					$this->db->commit();
					return 0;
				} catch(Exception $e){
					$this->db->rollBack();
					return 'error';
				}
			}
		}

		// Agrega Imagenes a una Noticia
		function agregarImagenes($id_noticia, $imagenesTmp){
			if($id_noticia && $imagenesTmp['name'][0]){
				$imagenes = '';
				try{
					$this->db->beginTransaction();
					$imagenes = $this->subirImagenes($imagenesTmp);
					foreach($imagenes as $ruta){
						$queryInsert = $this->db->prepare('INSERT INTO imagen(id_noticia, ruta) VALUES(?, ?)');
						$queryInsert->execute(array($id_noticia, $ruta));
					}
					$this->db->commit();
					return 0;
				} catch(Exception $e){
					$this->db->rollBack();
					return 'error';
				}
			}
		}

		// Almacena las Imagenes en la Carpeta de Uploads
		function subirImagenes($imagenesTmp){
			$directorio = '../uploads/imagenes/';
			$imagenes = array();
			foreach($imagenesTmp['tmp_name'] as $key => $value){
				$imagenes[] = $directorio . uniqid() . $imagenesTmp['name'][$key];
				move_uploaded_file($value, end($imagenes));
			}
			return $imagenes;
		}

		// Lee las Noticias
		function leerNoticias($id = 0){
			$noticias = array();
			$noticia = array();
			$nombreCategoria = '';
			if($id){
				$querySelect = $this->db->prepare('SELECT * FROM noticia WHERE id_categoria = ? ORDER BY id DESC');
				$querySelect->execute(array($id));
			} else {
				$querySelect = $this->db->prepare('SELECT * FROM noticia ORDER BY id DESC');
				$querySelect->execute();
			}
			while($noticia = $querySelect->fetch(PDO::FETCH_ASSOC)){
				$queryCategoria = $this->db->prepare('SELECT nombre FROM categoria WHERE id=?');
				$queryCategoria->execute(array($noticia['id_categoria']));
				$nombreCategoria = $queryCategoria->fetch(PDO::FETCH_ASSOC);
				$noticia['nombreCategoria'] = $nombreCategoria['nombre'];
				$queryImagenes = $this->db->prepare('SELECT ruta FROM imagen WHERE id_noticia=?');
				$queryImagenes->execute(array($noticia['id']));
				$noticia['cantidadImagenes'] = 0;
				while($imagen = $queryImagenes->fetch(PDO::FETCH_ASSOC)) {
					$noticia['imagenes'][] = $imagen['ruta'];
					$noticia['cantidadImagenes']++;
				}
				$noticias[] = $noticia;
			}
			return $noticias;
		}

		// Lee la Noticia Por ID
		function leerNoticia($id){
			if($id){
				$noticia = array();
				$nombreCategoria = '';
				$querySelect = $this->db->prepare('SELECT * FROM noticia WHERE id=?');
				$querySelect->execute(array($id));
				if($temp = $querySelect->fetch(PDO::FETCH_ASSOC)){
					$noticia = $temp;
					$queryCategoria = $this->db->prepare('SELECT nombre FROM categoria WHERE id=?');
					$queryCategoria->execute(array($noticia['id_categoria']));
					$nombreCategoria = $queryCategoria->fetch(PDO::FETCH_ASSOC);
					$noticia['nombreCategoria'] = $nombreCategoria['nombre'];
					$queryImagenes = $this->db->prepare('SELECT ruta FROM imagen WHERE id_noticia=?');
					$queryImagenes->execute(array($noticia['id']));
					while($imagen = $queryImagenes->fetch(PDO::FETCH_ASSOC)){
						$noticia['imagenes'][] = $imagen['ruta'];
					}
				}
				return $noticia;
			}
		}
	}
?>