<?php
	
	require_once("../config/Connection.php");
	
	class Personarol{
		
		public static function create($id_persona1, $id_rol1, $verificador_perrol){
			$sql = "INSERT INTO personarol (id_persona1, id_rol1, verificador_perrol)
			VALUES ('$id_persona1', '$id_rol1', '$verificador_perrol')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM PersonaRol
			INNER JOIN Persona on Persona.id_persona = PersonaRol.id_persona1
			INNER JOIN Rol on Rol.id_rol = PersonaRol.id_rol1
			";
			return Connection::runQuery($sql);
		}
		
		public static function leerrolconpersona($id_personarol){
			$sql = "SELECT * FROM personarol
			INNER JOIN Persona on Persona.id_persona = PersonaRol.id_persona1
			WHERE id_personarol = '$id_personarol'";
			return Connection::rowQuery($sql);
		}
		
		public static function update($id_personarol, $id_persona1, $id_rol1, $verificador_perrol){
			$sql = "UPDATE personarol SET
			id_persona1 = '$id_persona1',
			id_rol1 = '$id_rol1',
			verificador_perrol = '$verificador_perrol',
			WHERE id_personarol = $id_personarol";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_personarol){
			$sql = "DELETE FROM personarol WHERE id_personarol = $id_personarol";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_personarol){
			$sql = "SELECT * FROM personarol WHERE id_personarol = '$id_personarol'";
			return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
			$sql = "SELECT MAX(id_personarol) AS id_personarol FROM personarol";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>
