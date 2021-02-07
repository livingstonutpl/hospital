<?php
	
	require_once("../config/Connection.php");
	
	class Recetafarmaco{
		
		public static function create($id_receta1, $id_farmaco1, $cantidad_recfar, $posologia_recfar, $duracion_recfar, $indicaciones_recfar, $verificador_recfar){
			$sql = "INSERT INTO recetafarmaco (id_receta1, id_farmaco1, cantidad_recfar, posologia_recfar, duracion_recfar, indicaciones_recfar, verificador_recfar)
			VALUES ('$id_receta1', '$id_farmaco1', '$cantidad_recfar', '$posologia_recfar', '$duracion_recfar', '$indicaciones_recfar', '$verificador_recfar')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM recetafarmaco
			";
			return Connection::runQuery($sql);
		}
		
		public static function read2($id_receta){
			$sql = "SELECT * FROM recetafarmaco
			WHERE id_receta1 = $id_receta
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_recetafarmaco, $id_receta1, $id_farmaco1, $cantidad_recfar, $posologia_recfar, $duracion_recfar, $indicaciones_recfar, $verificador_recfar){
			$sql = "UPDATE recetafarmaco SET
			id_receta1 = '$id_receta1',
			id_farmaco1 = '$id_farmaco1',
			cantidad_recfar = '$cantidad_recfar',
			posologia_recfar = '$posologia_recfar',
			duracion_recfar = '$duracion_recfar',
			indicaciones_recfar = '$indicaciones_recfar',
			verificador_recfar = '$verificador_recfar'
			WHERE id_recetafarmaco = $id_recetafarmaco";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_recetafarmaco){
			$sql = "DELETE FROM recetafarmaco WHERE id_recetafarmaco = $id_recetafarmaco";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_recetafarmaco){
			$sql = "SELECT * FROM recetafarmaco WHERE id_recetafarmaco = '$id_recetafarmaco'";
			return Connection::rowQuery($sql);
		}
	
	public static function ultimo_id(){
	$sql = "SELECT MAX(id_recetafarmaco) AS id_recetafarmaco FROM recetafarmaco";
	return Connection::rowQuery($sql);
	}
	
	}
	
	?>
		