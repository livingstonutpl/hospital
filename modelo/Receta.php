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
		
		public static function ultimo_id(){
			$sql = "SELECT MAX(id_receta) AS id_receta FROM receta";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>
