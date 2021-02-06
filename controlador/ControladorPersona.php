<?php
	
	class ControladorPersona{
		
		//id_persona
		//cedula_per
		//nombre_per
		//apellido_per
		//email_per
		//telefono_per
		//direccion_per
		//ciudadresi_per
		//fechanaci_per
		//genero_per
		//id_usuario1
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Persona.php");
					$cedula_per = Connection::sanitize($_POST["cedula_per"]);
					$nombre_per = Connection::sanitize($_POST["nombre_per"]);
					$apellido_per = Connection::sanitize($_POST["apellido_per"]);
					$email_per = Connection::sanitize($_POST["email_per"]);
					$telefono_per = Connection::sanitize($_POST["telefono_per"]);
					$direccion_per = Connection::sanitize($_POST["direccion_per"]);
					$ciudadresi_per = Connection::sanitize($_POST["ciudadresi_per"]);
					$fechanaci_per = Connection::sanitize($_POST["fechanaci_per"]);
					$genero_per = Connection::sanitize($_POST["genero_per"]);
					$id_usuario1 = Connection::sanitize($_POST["id_usuario1"]);
					
					
					$res = Persona::create($cedula_per, $nombre_per, $apellido_per, $email_per, $telefono_per, $direccion_per, $ciudadresi_per, $fechanaci_per, $genero_per, $id_usuario1);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: persona-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Persona.php");
					$id_persona = Connection::sanitize($_POST["id_persona"]);
					$cedula_per = Connection::sanitize($_POST["cedula_per"]);
					$nombre_per = Connection::sanitize($_POST["nombre_per"]);
					$apellido_per = Connection::sanitize($_POST["apellido_per"]);
					$email_per = Connection::sanitize($_POST["email_per"]);
					$telefono_per = Connection::sanitize($_POST["telefono_per"]);
					$direccion_per = Connection::sanitize($_POST["direccion_per"]);
					$ciudadresi_per = Connection::sanitize($_POST["ciudadresi_per"]);
					$fechanaci_per = Connection::sanitize($_POST["fechanaci_per"]);
					$genero_per = Connection::sanitize($_POST["genero_per"]);
					$id_usuario1 = Connection::sanitize($_POST["id_usuario1"]);
					$res = Persona::update($id_persona, $cedula_per, $nombre_per, $apellido_per, $email_per, $telefono_per, $direccion_per, $ciudadresi_per, $fechanaci_per, $genero_per, $id_usuario1);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: persona-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Persona.php");
					$id_persona = Connection::sanitize($_POST["id_persona"]);
					$res = Persona::delete($id_persona);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: persona-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
				}
			}
		}
		
	}
	
?>
