<?php
	
	require_once("../config/Connection.php");
	
	class Especialidad{
		
		public static function create($nombre_esp, $descripcion_esp){
			$sql = "INSERT INTO especialidad (nombre_esp, descripcion_esp)
			VALUES ('$nombre_esp', '$descripcion_esp')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM especialidad
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_especialidad, $nombre_esp, $descripcion_esp){
			$sql = "UPDATE especialidad SET
			nombre_esp = '$nombre_esp',
			descripcion_esp = '$descripcion_esp'
			WHERE id_especialidad = $id_especialidad";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_especialidad){
			$sql = "DELETE FROM especialidad WHERE id_especialidad = $id_especialidad";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_especialidad){
			$sql = "SELECT * FROM especialidad WHERE id_especialidad = '$id_especialidad'";
			return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
			$sql = "SELECT MAX(id_especialidad) AS id_especialidad FROM especialidad";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>
