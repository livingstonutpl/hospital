<?php
	
	require_once("../config/Connection.php");
	
	class Usuario{
		
		public static function create($nombre_usu, $password_usu){
			$sql = "INSERT INTO usuario (nombre_usu, password_usu)
			VALUES ('$nombre_usu', '$password_usu')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM usuario
			";
			return Connection::runQuery($sql);
		}
		
		public static function readcrearpaciente(){
			$sql = "SELECT * FROM usuario
			INNER JOIN Persona on Persona.id_usuario1 = Usuario.id_usuario
			INNER JOIN PersonaRol on PersonaRol.id_persona1 = Persona.id_persona 
			INNER JOIN Rol on Rol.id_rol = PersonaRol.id_rol1
			WHERE id_rol1 = 2
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_usuario, $nombre_usu, $password_usu){
			$sql = "UPDATE usuario SET
			nombre_usu = '$nombre_usu',
			password_usu = '$password_usu'
			WHERE id_usuario = $id_usuario";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_usuario){
			$sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_usuario){
			$sql = "SELECT * FROM usuario WHERE id_usuario = '$id_usuario'";
			return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
			$sql = "SELECT MAX(id_usuario) AS id_usuario FROM usuario";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>
