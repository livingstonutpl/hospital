<?php
	
	require_once("../config/Connection.php");
	
	class Diagnostico{
		
		public static function create($cie10_dia, $descripcion_dia){
			$sql = "INSERT INTO diagnostico (cie10_dia, descripcion_dia)
			VALUES ('$cie10_dia', '$descripcion_dia')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM diagnostico
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_diagnostico, $cie10_dia, $descripcion_dia){
			$sql = "UPDATE diagnostico SET
			cie10_dia = '$cie10_dia',
			descripcion_dia = '$descripcion_dia'
			WHERE id_diagnostico = $id_diagnostico";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_diagnostico){
			$sql = "DELETE FROM diagnostico WHERE id_diagnostico = $id_diagnostico";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_diagnostico){
			$sql = "SELECT * FROM diagnostico WHERE id_diagnostico = '$id_diagnostico'";
			return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
			$sql = "SELECT MAX(id_diagnostico) AS id_diagnostico FROM diagnostico";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>
