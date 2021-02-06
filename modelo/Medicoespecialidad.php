<?php
	
	require_once("../config/Connection.php");
	
	class Medicoespecialidad{
		
		public static function create($id_medico1, $id_especialidad1, $verificador_medesp){
			$sql = "INSERT INTO medicoespecialidad (id_medico1, id_especialidad1, verificador_medesp)
			VALUES ('$id_medico1', '$id_especialidad1', '$verificador_medesp')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM medicoespecialidad			
			INNER JOIN Especialidad on Especialidad.id_especialidad = MedicoEspecialidad.id_especialidad1
			INNER JOIN Medico on Medico.id_medico = MedicoEspecialidad.id_medico1
			INNER JOIN Persona on Persona.id_persona = Medico.id_persona2			
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_medicoespecialidad, $id_medico1, $id_especialidad1, $verificador_medesp){
			$sql = "UPDATE medicoespecialidad SET
			id_medico1 = '$id_medico1',
			id_especialidad1 = '$id_especialidad1',			
			verificador_medesp = '$verificador_medesp'
			WHERE id_medicoespecialidad = $id_medicoespecialidad";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_medicoespecialidad){
			$sql = "DELETE FROM medicoespecialidad WHERE id_medicoespecialidad = $id_medicoespecialidad";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_medicoespecialidad){
			$sql = "SELECT * FROM medicoespecialidad WHERE id_medicoespecialidad = '$id_medicoespecialidad'";
			return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
			$sql = "SELECT MAX(id_medicoespecialidad) AS id_medicoespecialidad FROM medicoespecialidad";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>
