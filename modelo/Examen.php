<?php
	
	require_once("../config/Connection.php");
	
	class Examen{
		
		public static function create($id_historiaclinica3, $fecha_exa, $hora_exa, $tipo_exa, $descripcion_exa, $resultado_exa, $estado_exa, $verificador_exa){
			$sql = "INSERT INTO examen (id_historiaclinica3, fecha_exa, hora_exa, tipo_exa, descripcion_exa, resultado_exa, estado_exa, verificador_exa)
			VALUES ('$id_historiaclinica3', '$fecha_exa', '$hora_exa', '$tipo_exa', '$descripcion_exa', '$resultado_exa', '$estado_exa', '$verificador_exa')";
			return Connection::runQuery($sql);
		}
		
		// ADMINISTRADOR
		public static function read(){
			$sql = "SELECT * FROM examen
			ORDER BY fecha_exa DESC 
			";
			return Connection::runQuery($sql);
		}
		
		// MEDICO
		public static function read2($id_historiaclinica3){
			$sql = "SELECT * FROM examen
			INNER JOIN HistoriaClinica on HistoriaClinica.id_historiaclinica = Examen.id_historiaclinica3
			INNER JOIN Persona on Persona.id_persona = HistoriaClinica.id_persona3
			WHERE id_historiaclinica3 = $id_historiaclinica3
			ORDER BY fecha_exa DESC 
			";
			return Connection::runQuery($sql);
		}
		
		// CLIENTE
		public static function read3($id_usuario){
			$sql = "SELECT * FROM examen
			INNER JOIN HistoriaClinica on HistoriaClinica.id_historiaclinica = Examen.id_historiaclinica3
			INNER JOIN Persona on Persona.id_persona = HistoriaClinica.id_persona3
			WHERE id_usuario1 = $id_usuario
			ORDER BY fecha_exa DESC 
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_examen, $id_historiaclinica3, $fecha_exa, $hora_exa, $tipo_exa, $descripcion_exa, $resultado_exa, $estado_exa, $verificador_exa){
			$sql = "UPDATE examen SET
			id_historiaclinica3 = '$id_historiaclinica3',
			fecha_exa = '$fecha_exa',
			hora_exa = '$hora_exa',
			tipo_exa = '$tipo_exa',
			descripcion_exa = '$descripcion_exa',
			resultado_exa = '$resultado_exa',
			estado_exa = '$estado_exa',
			verificador_exa = '$verificador_exa'
			WHERE id_examen = $id_examen";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_examen){
			$sql = "DELETE FROM examen WHERE id_examen = $id_examen";
			return Connection::runQuery($sql);
		}
	
	public static function single_row($id_examen){
	$sql = "SELECT * FROM examen WHERE id_examen = '$id_examen'";
	return Connection::rowQuery($sql);
	}
	
	public static function ultimo_id(){
	$sql = "SELECT MAX(id_examen) AS id_examen FROM examen";
	return Connection::rowQuery($sql);
	}
	
	}
	
	?>
		