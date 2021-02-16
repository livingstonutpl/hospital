<?php
	
	require_once("../config/Connection.php");
	
	class Receta{
		
		public static function create($id_historiaclinica1, $fecha_rec, $hora_rec, $estado_rec){
			$sql = "INSERT INTO receta (id_historiaclinica1, fecha_rec, hora_rec, estado_rec)
			VALUES ('$id_historiaclinica1', '$fecha_rec', '$hora_rec', '$estado_rec')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM receta
			ORDER BY fecha_rec DESC 
			";
			return Connection::runQuery($sql);
		}
		
		// CLIENTE Y MEDICO PARA REPORTAR RECETAS EN EL PANEL HISTORIAL (receta-read.php)
		public static function read2($id_historiaclinica){
			$sql = "SELECT * FROM receta
			WHERE id_historiaclinica1 = $id_historiaclinica
			ORDER BY fecha_rec DESC 
			";
			return Connection::runQuery($sql);
		}
		
		public static function read3($id_usuario){
			$sql = "SELECT * FROM receta
			INNER JOIN HistoriaClinica on HistoriaClinica.id_historiaclinica = Receta.id_historiaclinica1
			INNER JOIN Persona on Persona.id_persona = HistoriaClinica.id_persona3
			WHERE id_usuario1 = $id_usuario
			ORDER BY fecha_rec DESC 
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_receta, $id_historiaclinica1, $fecha_rec, $hora_rec, $estado_rec){
			$sql = "UPDATE receta SET
			id_historiaclinica1 = '$id_historiaclinica1',
			fecha_rec = '$fecha_rec',
			hora_rec = '$hora_rec',
			estado_rec = '$estado_rec'
			WHERE id_receta = $id_receta";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_receta){
			$sql = "DELETE FROM receta WHERE id_receta = $id_receta";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_receta){
			$sql = "SELECT * FROM receta WHERE id_receta = '$id_receta'";
			return Connection::rowQuery($sql);
		}
		
	public static function single_row2($id_receta){
	$sql = "SELECT * FROM receta
	INNER JOIN HistoriaClinica on HistoriaClinica.id_historiaclinica = Receta.id_historiaclinica1
	INNER JOIN Persona on Persona.id_persona = HistoriaClinica.id_persona3
	WHERE id_receta = '$id_receta'";
	return Connection::rowQuery($sql);
	}
	
	public static function ultimo_id(){
	$sql = "SELECT MAX(id_receta) AS id_receta FROM receta";
	return Connection::rowQuery($sql);
	}
	
	}
	
	?>
		