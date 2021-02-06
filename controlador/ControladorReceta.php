<?php
	
	class ControladorReceta{
		
		//id_receta
		//id_historiaclinica1
		//fecha_rec
		//hora_rec
		//estado_rec
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Receta.php");
					$id_historiaclinica1 = Connection::sanitize($_POST["id_historiaclinica1"]);
					$fecha_rec = Connection::sanitize($_POST["fecha_rec"]);
					$hora_rec = Connection::sanitize($_POST["hora_rec"]);
					$estado_rec = Connection::sanitize($_POST["estado_rec"]);
					$res = Receta::create($id_historiaclinica1, $fecha_rec, $hora_rec, $estado_rec);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: receta-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Receta.php");
					$id_receta = Connection::sanitize($_POST["id_receta"]);
					$id_historiaclinica1 = Connection::sanitize($_POST["id_historiaclinica1"]);
					$fecha_rec = Connection::sanitize($_POST["fecha_rec"]);
					$hora_rec = Connection::sanitize($_POST["hora_rec"]);
					$estado_rec = Connection::sanitize($_POST["estado_rec"]);
					$res = Receta::update($id_receta, $id_historiaclinica1, $fecha_rec, $hora_rec, $estado_rec);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: receta-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Receta.php");
					$id_receta = Connection::sanitize($_POST["id_receta"]);
					$res = Receta::delete($id_receta);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: receta-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
				}
			}
		}
		
	}
	
?>
