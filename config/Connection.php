<?php
	
	require_once("Config.php");
	
	class Connection{
		
		function connect_DB(){
			$con = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
			if (mysqli_connect_error()){
				echo "Error: Falló la conexión a la Base de Datos.".PHP_EOL;
				echo "Error: ".mysqli_connect_errno().PHP_EOL;
				echo "Error: ".mysqli_connect_error().PHP_EOL;
				exit;
			}
			$con->set_charset('utf8');
			return $con;
		}
		
		public static function runQuery($sql){
			$con = Connection::connect_DB();
			$res = mysqli_query($con, $sql);
			return $res;
		}
		
		public static function rowQuery($sql){
			$con = Connection::connect_DB();
			$res = mysqli_query($con, $sql);
			return mysqli_fetch_object($res);
		}
		
		public static function sanitize($str){
			$con = Connection::connect_DB();
			$str = filter_var($str, FILTER_SANITIZE_STRING);
			$str = htmlspecialchars($str);
			$str = mysqli_real_escape_string($con, trim($str));
			return $str;
		}
		
	}
	
?>
