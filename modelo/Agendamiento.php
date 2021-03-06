<?php
	
	require_once("../config/Connection.php");
	
	class Agendamiento{
		
		public static function create($id_persona3, $id_medicoespecialidad1, $anamnesis_his, $examenfisico_his, $tratamiento_his, $fechaatencion_his, $horaatencion_his, $estado_his, $verificador_his, $verificador2_his){
			$sql = "INSERT INTO historiaclinica (id_persona3, id_medicoespecialidad1, anamnesis_his, examenfisico_his, tratamiento_his, fechaatencion_his, horaatencion_his, estado_his, verificador_his, verificador2_his)
			VALUES ('$id_persona3', '$id_medicoespecialidad1', '$anamnesis_his', '$examenfisico_his', '$tratamiento_his', '$fechaatencion_his', '$horaatencion_his', '$estado_his', '$verificador_his', '$verificador2_his')";
			return Connection::runQuery($sql);
		}
		
		public static function read($estado){
			$sql = "SELECT * FROM historiaclinica
			INNER JOIN Persona on Persona.id_persona = HistoriaClinica.id_persona3
			WHERE estado_his = '$estado'
			";
			return Connection::runQuery($sql);
		}
		
		public static function read2($estado){
			$sql = "SELECT * FROM historiaclinica
			INNER JOIN Persona on Persona.id_persona = HistoriaClinica.id_persona3
			WHERE estado_his = '$estado'";
			return Connection::runQuery($sql);
		}
		
		// PARA CLIENTE
		public static function read3($estado, $id_usuario){
			$sql = "SELECT * FROM historiaclinica
			INNER JOIN Persona on Persona.id_persona = HistoriaClinica.id_persona3
			WHERE estado_his = '$estado'
			AND id_usuario1 = '$id_usuario'			
			";
			return Connection::runQuery($sql);
		}
		
		// date_default_timezone_set('America/Bogota');
		// $fechaval = date('Y-m-d', time());
		// $horavali = date('H:i', time());	
		
		// CONSULTAR DISPONIBILIDAD
		public static function disponibilidad($id_medicoespecialidad1){
			$sql = "SELECT * FROM historiaclinica
			WHERE estado_his = 'disponible'
			AND id_medicoespecialidad1 = '$id_medicoespecialidad1'
			AND CONCAT(fechaatencion_his, ' ', horaatencion_his) >= CURRENT_TIMESTAMP()
			ORDER BY fechaatencion_his ASC, horaatencion_his ASC
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_historiaclinica, $id_persona3, $id_medicoespecialidad1, $anamnesis_his, $examenfisico_his, $tratamiento_his, $fechaatencion_his, $horaatencion_his, $estado_his, $verificador_his, $verificador2_his){
			$sql = "UPDATE historiaclinica SET
			id_persona3 = '$id_persona3',
			id_medicoespecialidad1 = '$id_medicoespecialidad1',
			anamnesis_his = '$anamnesis_his',
			examenfisico_his = '$examenfisico_his',
			tratamiento_his = '$tratamiento_his',
			fechaatencion_his = '$fechaatencion_his',
			horaatencion_his = '$horaatencion_his',
		estado_his = '$estado_his',
		verificador_his = '$verificador_his',
		verificador2_his = '$verificador2_his'
		WHERE id_historiaclinica = $id_historiaclinica";
		return Connection::runQuery($sql);
		}
		
		public static function updatecita($id_persona, $id_medesp, $fecha, $hora, $estado, $verificador_his, $verificador2_his){
		$sql = "UPDATE historiaclinica SET
		id_persona3 = $id_persona,			
		estado_his = '$estado',
		verificador_his = '$verificador_his',
		verificador2_his = '$verificador2_his'
		WHERE id_medicoespecialidad1 = $id_medesp		
		AND fechaatencion_his = '$fecha'			
		AND horaatencion_his = '$hora'
		AND estado_his = 'disponible'			
		";
		return Connection::runQuery($sql);
		}
		
		public static function delete($id_historiaclinica){
		$sql = "DELETE FROM historiaclinica WHERE id_historiaclinica = $id_historiaclinica";
		return Connection::runQuery($sql);
		}
		
		public static function single_row($id_historiaclinica){
		$sql = "SELECT * FROM historiaclinica WHERE id_historiaclinica = '$id_historiaclinica'";
		return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
		$sql = "SELECT MAX(id_historiaclinica) AS id_historiaclinica FROM historiaclinica";
		return Connection::rowQuery($sql);
		}
		
		}
		
		?>
				