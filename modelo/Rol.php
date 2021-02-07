<?php
	
	require_once("../config/Connection.php");
	
	class Rol{
		
		public static function create($nombre_rol){
			$sql = "INSERT INTO rol (nombre_rol)
			VALUES ('$nombre_rol')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM rol";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_rol, $nombre_rol){
			$sql = "UPDATE rol SET
			nombre_rol = '$nombre_rol'
			WHERE id_rol = $id_rol";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_rol){
			$sql = "DELETE FROM rol WHERE id_rol = $id_rol";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_rol){
			$sql = "SELECT * FROM rol WHERE id_rol = '$id_rol'";
			return Connection::rowQuery($sql);
		}
		
		public static function last_row_id($id_rol){
			$sql = "SELECT '$id_rol' FROM rol ORDER BY '$id_rol' DESC LIMIT 1";
			return Connection::runQuery($sql);
		}
		
	}
	
?>
