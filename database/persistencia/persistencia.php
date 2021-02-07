<?php	
	
	for ($x = 1; $x <= 10; $x++) {
		
		//TIEMPO INICIAL
		$cadena = date("s", time());
		$registros = $x*100;
		
		//PRUEBA DE PERSISTENCIA
		$con = mysqli_connect("localhost", "root", "", "bpersistencia");
		for ($i = 1; $i <= $registros; $i++) {
			$sql = "INSERT INTO tpersistencia VALUES (NULL, 'prueba')";
			mysqli_query($con, $sql);
		}
		
		//TIEMPO FINAL
		$cadena2 = date("s", time());
		
		//INFORME
		echo "".$registros." registros ";
		echo round(abs($cadena - $cadena2),2)." segundos.<br>";
		
	}
	
?>

