<?php
	
	require_once("../config/Connection.php");
	
	class Varios{
		
		public function loginUsuario($nombre_usu, $password_usu, $id_rol1){
			$sql = "SELECT * FROM Usuario
			INNER JOIN Persona on Persona.id_usuario1 = Usuario.id_usuario
			INNER JOIN PersonaRol on PersonaRol.id_persona1 = Persona.id_persona 
			INNER JOIN Rol on Rol.id_rol = PersonaRol.id_rol1
			WHERE nombre_usu = '$nombre_usu'
			AND password_usu = '$password_usu'
			AND id_rol1 = '$id_rol1'";
			return Connection::rowQuery($sql);
		}
		
		public function loginUsuarioMedico($nombre_usu, $password_usu, $id_rol1){
			$sql = "SELECT * FROM Usuario
			INNER JOIN Persona on Persona.id_usuario1 = Usuario.id_usuario
			INNER JOIN PersonaRol on PersonaRol.id_persona1 = Persona.id_persona 
			INNER JOIN Rol on Rol.id_rol = PersonaRol.id_rol1
			INNER JOIN Medico on Persona.id_persona = Medico.id_persona2			
			WHERE nombre_usu = '$nombre_usu'
			AND password_usu = '$password_usu'
			AND id_rol1 = '$id_rol1'";
			return Connection::rowQuery($sql);
		}
		
		public function registerUsuario($nombre_usu, $password_usu){
			$sql = "INSERT INTO Usuario (nombre_usu, password_usu)
			VALUES ('$nombre_usu', '$password_usu')";
			return Connection::runQuery($sql);
		}
		
		public static function leerTablasBD($database){
			$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$database'";
			return Connection::runQuery($sql);
		}
		
		public static function leerFilasTabla($database, $tabla){
			$sql = "SELECT * FROM INFORMATION_SCHEMA.TABLES
			WHERE TABLE_SCHEMA = '$database'
			AND TABLE_NAME = '$tabla'";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>