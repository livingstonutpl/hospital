<?php
	
	class ControladorEspecialidad{
		
		//id_especialidad
		//nombre_esp
		//descripcion_esp
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Especialidad.php");
					$nombre_esp = Connection::sanitize($_POST["nombre_esp"]);
					$descripcion_esp = Connection::sanitize($_POST["descripcion_esp"]);
					$res = Especialidad::create($nombre_esp, $descripcion_esp);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: especialidad-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Especialidad.php");
					$id_especialidad = Connection::sanitize($_POST["id_especialidad"]);
					$nombre_esp = Connection::sanitize($_POST["nombre_esp"]);
					$descripcion_esp = Connection::sanitize($_POST["descripcion_esp"]);
					$res = Especialidad::update($id_especialidad, $nombre_esp, $descripcion_esp);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: especialidad-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Especialidad.php");
					$id_especialidad = Connection::sanitize($_POST["id_especialidad"]);
					$res = Especialidad::delete($id_especialidad);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: especialidad-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
				}
			}
		}
		
	}
	
?>
