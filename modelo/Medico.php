<?php
	
	require_once("../config/Connection.php");
	
	class Medico{
		
		public static function create($id_persona2){
			$sql = "INSERT INTO medico (id_persona2)
			VALUES ('$id_persona2')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM medico
			INNER JOIN Persona on Persona.id_persona = Medico.id_persona2
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_medico, $id_persona2){
			$sql = "UPDATE medico SET
			id_persona2 = '$id_persona2'
			WHERE id_medico = $id_medico";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_medico){
			$sql = "DELETE FROM medico WHERE id_medico = $id_medico";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_medico){
			$sql = "SELECT * FROM medico
			INNER JOIN Persona on Persona.id_persona = Medico.id_persona2
			WHERE id_medico = '$id_medico'";
			return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
			$sql = "SELECT MAX(id_medico) AS id_medico FROM medico";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>
