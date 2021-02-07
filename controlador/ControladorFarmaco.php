<?php
	
	class ControladorFarmaco{
		
		//id_farmaco
		//nombre_far
		//presentacion_far
		//administracion_far
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Farmaco.php");
					$nombre_far = Connection::sanitize($_POST["nombre_far"]);
					$presentacion_far = Connection::sanitize($_POST["presentacion_far"]);
					$administracion_far = Connection::sanitize($_POST["administracion_far"]);
					$res = Farmaco::create($nombre_far, $presentacion_far, $administracion_far);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: farmaco-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Farmaco.php");
					$id_farmaco = Connection::sanitize($_POST["id_farmaco"]);
					$nombre_far = Connection::sanitize($_POST["nombre_far"]);
					$presentacion_far = Connection::sanitize($_POST["presentacion_far"]);
					$administracion_far = Connection::sanitize($_POST["administracion_far"]);
					$res = Farmaco::update($id_farmaco, $nombre_far, $presentacion_far, $administracion_far);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: farmaco-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Farmaco.php");
					$id_farmaco = Connection::sanitize($_POST["id_farmaco"]);
					$res = Farmaco::delete($id_farmaco);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
					}else{
					$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: farmaco-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
					}
					}
					}
					
					}
					
					?>
										