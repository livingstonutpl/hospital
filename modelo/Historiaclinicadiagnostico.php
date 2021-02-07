<?php
	
	require_once("../config/Connection.php");
	
	//verificador_hisclidia
	
	class Historiaclinicadiagnostico{
		
		public static function create($id_historiaclinica2, $id_diagnostico1, $verificador_hisclidia){
			$sql = "INSERT INTO historiaclinicadiagnostico (id_historiaclinica2, id_diagnostico1, verificador_hisclidia)
			VALUES ('$id_historiaclinica2', '$id_diagnostico1', '$verificador_hisclidia')";
			return Connection::runQuery($sql);
		}
		
		public static function read(){
			$sql = "SELECT * FROM historiaclinicadiagnostico
			";
			return Connection::runQuery($sql);
		}
		
		public static function read2($id_historiaclinica){
			$sql = "SELECT * FROM historiaclinicadiagnostico
			WHERE id_historiaclinica2 = $id_historiaclinica
			";
			return Connection::runQuery($sql);
		}
		
		public static function update($id_historiaclinicadiagnostico, $id_historiaclinica2, $id_diagnostico1, $verificador_hisclidia){
			$sql = "UPDATE historiaclinicadiagnostico SET
			id_historiaclinica2 = '$id_historiaclinica2',
			id_diagnostico1 = '$id_diagnostico1',
			verificador_hisclidia = '$verificador_hisclidia'
			WHERE id_historiaclinicadiagnostico = $id_historiaclinicadiagnostico";
			return Connection::runQuery($sql);
		}
		
		public static function delete($id_historiaclinicadiagnostico){
			$sql = "DELETE FROM historiaclinicadiagnostico WHERE id_historiaclinicadiagnostico = $id_historiaclinicadiagnostico";
			return Connection::runQuery($sql);
		}
		
		public static function single_row($id_historiaclinicadiagnostico){
			$sql = "SELECT * FROM historiaclinicadiagnostico WHERE id_historiaclinicadiagnostico = '$id_historiaclinicadiagnostico'";
			return Connection::rowQuery($sql);
		}
		
		public static function ultimo_id(){
			$sql = "SELECT MAX(id_historiaclinicadiagnostico) AS id_historiaclinicadiagnostico FROM historiaclinicadiagnostico";
			return Connection::rowQuery($sql);
		}
		
	}
	
?>
