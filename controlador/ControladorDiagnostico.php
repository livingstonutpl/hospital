<?php
	
	class ControladorDiagnostico{
		
		//id_diagnostico
		//cie10_dia
		//descripcion_dia
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Diagnostico.php");
					$cie10_dia = Connection::sanitize($_POST["cie10_dia"]);
					$descripcion_dia = Connection::sanitize($_POST["descripcion_dia"]);
					$res = Diagnostico::create($cie10_dia, $descripcion_dia);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: diagnostico-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Diagnostico.php");
					$id_diagnostico = Connection::sanitize($_POST["id_diagnostico"]);
					$cie10_dia = Connection::sanitize($_POST["cie10_dia"]);
					$descripcion_dia = Connection::sanitize($_POST["descripcion_dia"]);
					$res = Diagnostico::update($id_diagnostico, $cie10_dia, $descripcion_dia);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: diagnostico-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Diagnostico.php");
					$id_diagnostico = Connection::sanitize($_POST["id_diagnostico"]);
					$res = Diagnostico::delete($id_diagnostico);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: diagnostico-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
				}
			}
		}
		
	}
	
?>
