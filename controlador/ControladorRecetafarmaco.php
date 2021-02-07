<?php
	
	class ControladorRecetafarmaco{
		
		//id_recetafarmaco
		//id_receta1
		//id_farmaco1
		//cantidad_recfar
		//posologia_recfar
		//duracion_recfar
		//indicaciones_recfar
		//verificador_recfar
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Recetafarmaco.php");
					$id_receta1 = Connection::sanitize($_POST["id_receta1"]);
					$id_farmaco1 = Connection::sanitize($_POST["id_farmaco1"]);
					$cantidad_recfar = Connection::sanitize($_POST["cantidad_recfar"]);
					$posologia_recfar = Connection::sanitize($_POST["posologia_recfar"]);
					$duracion_recfar = Connection::sanitize($_POST["duracion_recfar"]);
					$indicaciones_recfar = Connection::sanitize($_POST["indicaciones_recfar"]);
					$verificador_recfar = $id_receta1."-".$id_farmaco1;
					$res = Recetafarmaco::create($id_receta1, $id_farmaco1, $cantidad_recfar, $posologia_recfar, $duracion_recfar, $indicaciones_recfar, $verificador_recfar);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: recetafarmaco-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Recetafarmaco.php");
					$id_recetafarmaco = Connection::sanitize($_POST["id_recetafarmaco"]);
					$id_receta1 = Connection::sanitize($_POST["id_receta1"]);
					$id_farmaco1 = Connection::sanitize($_POST["id_farmaco1"]);
					$cantidad_recfar = Connection::sanitize($_POST["cantidad_recfar"]);
					$posologia_recfar = Connection::sanitize($_POST["posologia_recfar"]);
					$duracion_recfar = Connection::sanitize($_POST["duracion_recfar"]);
					$indicaciones_recfar = Connection::sanitize($_POST["indicaciones_recfar"]);
					$verificador_recfar = $id_receta1."-".$id_farmaco1;
					$res = Recetafarmaco::update($id_recetafarmaco, $id_receta1, $id_farmaco1, $cantidad_recfar, $posologia_recfar, $duracion_recfar, $indicaciones_recfar, $verificador_recfar);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: recetafarmaco-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
		if(isset($_POST) && !empty($_POST)){
		if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
		require_once("../modelo/Recetafarmaco.php");
		$id_recetafarmaco = Connection::sanitize($_POST["id_recetafarmaco"]);
		$res = Recetafarmaco::delete($id_recetafarmaco);
		if($res){
		$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
		}else{
		$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
		}
		header ("Location: recetafarmaco-read.php?msg=$msg");
		}else{
		echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
		}
		}
		}
		
		}
		
		?>
				