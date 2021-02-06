<?php
	
	class ControladorHistoriaclinica{
		
		//id_historiaclinica
		//id_persona3
		//id_medicoespecialidad1
		//anamnesis_his
		//examenfisico_his
		//tratamiento_his
		//fechaatencion_his
		//horaatencion_his
		//estado_his
		//verificador_his
		//verificador2_his
		
		function create(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Historiaclinica.php");
					// $id_persona3 = Connection::sanitize($_POST["id_persona3"]);
					// $id_medicoespecialidad1 = Connection::sanitize($_POST["id_medicoespecialidad1"]);
					$anamnesis_his = Connection::sanitize($_POST["anamnesis_his"]);
					$examenfisico_his = Connection::sanitize($_POST["examenfisico_his"]);
					$tratamiento_his = Connection::sanitize($_POST["tratamiento_his"]);
					// $fechaatencion_his = Connection::sanitize($_POST["fechaatencion_his"]);
					// $horaatencion_his = Connection::sanitize($_POST["horaatencion_his"]);
					$estado_his = Connection::sanitize($_POST["estado_his"]);					
					// $verificador_his = $id_persona3."-".$fechaatencion_his."-".$horaatencion_his;
					// $verificador2_his = $id_medicoespecialidad1."-".$fechaatencion_his."-".$horaatencion_his;
					//$res = Historiaclinica::create($id_persona3, $id_medicoespecialidad1, $anamnesis_his, $examenfisico_his, $tratamiento_his, $fechaatencion_his, $horaatencion_his, $estado_his, $verificador_his, $verificador2_his);
					$res = Historiaclinica::create($anamnesis_his, $examenfisico_his, $tratamiento_his, $estado_his);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro guardado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Cita no disponible');</script>");
					}
					header ("Location: historiaclinica-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo guardar');</script>";
				}
			}
		}
		
		function update(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Historiaclinica.php");
					$id_historiaclinica = Connection::sanitize($_POST["id_historiaclinica"]);
					// $id_persona3 = Connection::sanitize($_POST["id_persona3"]);
					// $id_medicoespecialidad1 = Connection::sanitize($_POST["id_medicoespecialidad1"]);
					$anamnesis_his = Connection::sanitize($_POST["anamnesis_his"]);
					$examenfisico_his = Connection::sanitize($_POST["examenfisico_his"]);
					$tratamiento_his = Connection::sanitize($_POST["tratamiento_his"]);
					// $fechaatencion_his = Connection::sanitize($_POST["fechaatencion_his"]);
					// $horaatencion_his = Connection::sanitize($_POST["horaatencion_his"]);
					$estado_his = Connection::sanitize($_POST["estado_his"]);
					// $verificador_his = $id_persona3."-".$fechaatencion_his."-".$horaatencion_his;
					// $verificador2_his = $id_medicoespecialidad1."-".$fechaatencion_his."-".$horaatencion_his;
					// $res = Historiaclinica::update($id_historiaclinica, $id_persona3, $id_medicoespecialidad1, $anamnesis_his, $examenfisico_his, $tratamiento_his, $fechaatencion_his, $horaatencion_his, $estado_his, $verificador_his, $verificador2_his);
					$res = Historiaclinica::update($id_historiaclinica, $anamnesis_his, $examenfisico_his, $tratamiento_his, $estado_his);
					if($res){
						$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
						}else{
						$msg = base64_encode("<script>toastr.error('Cita no disponible');</script>");
					}
					header ("Location: historiaclinica-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo actualizar');</script>";
				}
			}
		}
		
		function delete(){
			if(isset($_POST) && !empty($_POST)){
				if(isset($_SESSION["token"]) && $_POST["token"] == $_SESSION["token"]){
					require_once("../modelo/Historiaclinica.php");
					$id_historiaclinica = Connection::sanitize($_POST["id_historiaclinica"]);
					$res = Historiaclinica::delete($id_historiaclinica);
					if($res){
					$msg = base64_encode("<script>toastr.success('Registro eliminado correctamente');</script>");
					}else{
					$msg = base64_encode("<script>toastr.error('El registro no se pudo eliminar');</script>");
					}
					header ("Location: historiaclinica-read.php?msg=$msg");
					}else{
					echo "<script>toastr.error('El registro no se pudo eliminar');</script>";
					}
					}
					}
					
					}
					
					?>
										