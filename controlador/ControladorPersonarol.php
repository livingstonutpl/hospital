<?php
	
	class ControladorPersonarol{
		
		//id_personarol
		//id_persona1
		//id_rol1
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Personarol.php");
					$id_persona1 = Connection::sanitize($_POST["id_persona1"]);
					$id_rol1 = Connection::sanitize($_POST["id_rol1"]);
					$verificador_perrol = strval($id_persona1)."-".strval($id_rol1);
					$res = Personarol::create($id_persona1, $id_rol1, $verificador_perrol);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: personarol-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Personarol.php");
					$id_personarol = Connection::sanitize($_POST["id_personarol"]);
					$id_persona1 = Connection::sanitize($_POST["id_persona1"]);
					$id_rol1 = Connection::sanitize($_POST["id_rol1"]);
					$verificador_perrol = strval($id_persona1)."-".strval($id_rol1);
					$res = Personarol::update($id_personarol, $id_persona1, $id_rol1, $verificador_perrol);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: personarol-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Personarol.php");
					$id_personarol = Connection::sanitize($_POST["id_personarol"]);
					$res = Personarol::delete($id_personarol);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: personarol-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
				}
			}
		}
		
	}
	
?>
