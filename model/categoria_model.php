<?php

	// Inclusion del Archivo de Modelo Base
	REQUIRE_ONCE('main_model.php');

	// Clase de Categorias
	class CategoriaModel extends MainModel{

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
	}
?>