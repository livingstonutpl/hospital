<?php
	
	class ControladorExamen{
		
		//id_examen
		//id_historiaclinica3
		//fecha_exa
		//hora_exa
		//tipo_exa
		//descripcion_exa
		//resultado_exa
		//estado_exa
		//verificador_exa
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Examen.php");
					$id_historiaclinica3 = Connection::sanitize($_POST["id_historiaclinica3"]);
					$fecha_exa = Connection::sanitize($_POST["fecha_exa"]);
					$hora_exa = Connection::sanitize($_POST["hora_exa"]);
					$tipo_exa = Connection::sanitize($_POST["tipo_exa"]);
					$descripcion_exa = Connection::sanitize($_POST["descripcion_exa"]);
					$resultado_exa = Connection::sanitize($_POST["resultado_exa"]);
					$estado_exa = Connection::sanitize($_POST["estado_exa"]);					
					$verificador_exa = $id_historiaclinica3."-".$fecha_exa."-".$hora_exa;
					$res = Examen::create($id_historiaclinica3, $fecha_exa, $hora_exa, $tipo_exa, $descripcion_exa, $resultado_exa, $estado_exa, $verificador_exa);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Cita no disponible');</script>");
					}
					header ("Location: examen-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Examen.php");
					$id_examen = Connection::sanitize($_POST["id_examen"]);
					$id_historiaclinica3 = Connection::sanitize($_POST["id_historiaclinica3"]);
					$fecha_exa = Connection::sanitize($_POST["fecha_exa"]);
					$hora_exa = Connection::sanitize($_POST["hora_exa"]);
					$tipo_exa = Connection::sanitize($_POST["tipo_exa"]);
					$descripcion_exa = Connection::sanitize($_POST["descripcion_exa"]);
					$resultado_exa = Connection::sanitize($_POST["resultado_exa"]);
					$estado_exa = Connection::sanitize($_POST["estado_exa"]);
					$verificador_exa = $id_historiaclinica3."-".$fecha_exa."-".$hora_exa;
					$res = Examen::update($id_examen, $id_historiaclinica3, $fecha_exa, $hora_exa, $tipo_exa, $descripcion_exa, $resultado_exa, $estado_exa, $verificador_exa);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Cita no disponible');</script>");
					}
					header ("Location: examen-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Examen.php");
					$id_examen = Connection::sanitize($_POST["id_examen"]);
					$res = Examen::delete($id_examen);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: examen-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
				}
			}
		}
		
	}
	
?>
