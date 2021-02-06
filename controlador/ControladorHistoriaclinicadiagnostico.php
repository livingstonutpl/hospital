<?php
	
	class ControladorHistoriaclinicadiagnostico{
		
		//id_historiaclinicadiagnostico
		//id_historiaclinica2
		//id_diagnostico1
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Historiaclinicadiagnostico.php");
					$id_historiaclinica2 = Connection::sanitize($_POST["id_historiaclinica2"]);
					$id_diagnostico1 = Connection::sanitize($_POST["id_diagnostico1"]);
					$res = Historiaclinicadiagnostico::create($id_historiaclinica2, $id_diagnostico1);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: historiaclinicadiagnostico-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Historiaclinicadiagnostico.php");
					$id_historiaclinicadiagnostico = Connection::sanitize($_POST["id_historiaclinicadiagnostico"]);
					$id_historiaclinica2 = Connection::sanitize($_POST["id_historiaclinica2"]);
					$id_diagnostico1 = Connection::sanitize($_POST["id_diagnostico1"]);
					$res = Historiaclinicadiagnostico::update($id_historiaclinicadiagnostico, $id_historiaclinica2, $id_diagnostico1);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: historiaclinicadiagnostico-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Historiaclinicadiagnostico.php");
					$id_historiaclinicadiagnostico = Connection::sanitize($_POST["id_historiaclinicadiagnostico"]);
					$res = Historiaclinicadiagnostico::delete($id_historiaclinicadiagnostico);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: historiaclinicadiagnostico-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
				}
			}
		}
		
	}
	
?>
