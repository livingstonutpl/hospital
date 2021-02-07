<?php
	
	require_once("../config/Connection.php");
	
	class Farmaco{
		
		public static function create($nombre_far, $presentacion_far, $administracion_far){
			$sql = "INSERT INTO farmaco (nombre_far, presentacion_far, administracion_far)
			VALUES ('$nombre_far', '$presentacion_far', '$administracion_far')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM farmaco
			";
			return Connection::runQuery($sql);
		}
		
		public static function read2(){
			$sql = "SELECT * FROM farmaco
			
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_farmaco, $nombre_far, $presentacion_far, $administracion_far){
			$sql = "UPDATE farmaco SET
			nombre_far = '$nombre_far',
			presentacion_far = '$presentacion_far',
			administracion_far = '$administracion_far'
			WHERE id_farmaco = $id_farmaco";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_farmaco){
			$sql = "DELETE FROM farmaco WHERE id_farmaco = $id_farmaco";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_farmaco){
			$sql = "SELECT * FROM farmaco WHERE id_farmaco = '$id_farmaco'";
			return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
			$sql = "SELECT MAX(id_farmaco) AS id_farmaco FROM farmaco";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>
