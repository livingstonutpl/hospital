<?php
	
	class ControladorMedicoespecialidad{
		
		//id_medicoespecialidad
		//id_medico1
		//id_especialidad1
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Medicoespecialidad.php");
					$id_medico1 = Connection::sanitize($_POST["id_medico1"]);
					$id_especialidad1 = Connection::sanitize($_POST["id_especialidad1"]);
					$verificador_medesp = strval($id_medico1)."-".$id_especialidad1;
					$res = Medicoespecialidad::create($id_medico1, $id_especialidad1, $verificador_medesp);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: medicoespecialidad-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Medicoespecialidad.php");
					$id_medicoespecialidad = Connection::sanitize($_POST["id_medicoespecialidad"]);
					$id_medico1 = Connection::sanitize($_POST["id_medico1"]);
					$id_especialidad1 = Connection::sanitize($_POST["id_especialidad1"]);
					$verificador_medesp = strval($id_medico1)."-".$id_especialidad1;
					$res = Medicoespecialidad::update($id_medicoespecialidad, $id_medico1, $id_especialidad1, $verificador_medesp);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: medicoespecialidad-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Medicoespecialidad.php");
					$id_medicoespecialidad = Connection::sanitize($_POST["id_medicoespecialidad"]);
					$res = Medicoespecialidad::delete($id_medicoespecialidad);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: medicoespecialidad-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
				}
			}
		}
		
	}
	
?>
