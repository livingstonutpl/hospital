<?php
	
	class ControladorUsuario{
		
		//id_usuario
		//nombre_usu
		//password_usu
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Usuario.php");
					$nombre_usu = Connection::sanitize($_POST["nombre_usu"]);
					$password_usu = md5(Connection::sanitize($_POST["password_usu"]));
					$res = Usuario::create($nombre_usu, $password_usu);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: usuario-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Usuario.php");
					$id_usuario = Connection::sanitize($_POST["id_usuario"]);
					$nombre_usu = Connection::sanitize($_POST["nombre_usu"]);
					$password_usu = md5(Connection::sanitize($_POST["password_usu"]));
					$res = Usuario::update($id_usuario, $nombre_usu, $password_usu);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
					}
					header ("Location: usuario-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Usuario.php");
					$id_usuario = Connection::sanitize($_POST["id_usuario"]);
					$res = Usuario::delete($id_usuario);
				if($res){
				$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
				}else{
				$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
				}
				header ("Location: usuario-read.php?msg=$msg");
				}else{
				echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
				}
				}
				}
				
				}
				
				?>
								