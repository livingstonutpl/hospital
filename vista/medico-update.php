<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		require_once("header.php");
		if ($_SESSION["rol"] == "administrador"){
		?>
		
		<div class="content-wrapper">
			<section class="content">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Actualizar Médico</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_medico"]) and !empty($_GET["id_medico"])){
							require_once("../modelo/Medico.php");
							$id_medico = Connection::sanitize($_GET["id_medico"]);
							$res = medico::single_row($id_medico);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_medico" value="<?php echo $res->id_medico;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cedula:</label>
								<div class="col-sm-10">
									<input type="text" name="cedula_per" value="<?php echo $res->cedula_per;?>" class="form-control" required autofocus>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Nombre:</label>
								<div class="col-sm-10">
									<input type="text" name="nombre_per" value="<?php echo $res->nombre_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Apellido:</label>
								<div class="col-sm-10">
									<input type="text" name="apellido_per" value="<?php echo $res->apellido_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Email:</label>
								<div class="col-sm-10">
									<input type="email" name="email_per" value="<?php echo $res->email_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Telefono:</label>
								<div class="col-sm-10">
									<input type="text" name="telefono_per" value="<?php echo $res->telefono_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Dirección:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="direccion_per" class="form-control" required><?php echo $res->direccion_per;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Ciudad de Residencia:</label>
								<div class="col-sm-10">
									<input type="text" name="ciudadresi_per" value="<?php echo $res->ciudadresi_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha de Nacimiento:</label>
								<div class="col-sm-10">
									<input type="date" name="fechanaci_per" value="<?php echo $res->fechanaci_per;?>" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Género:</label>
								<div class="col-sm-10">
									<div class="radio">
										<label><input <?php if($res->genero_per == "masculino"){ echo "checked"; } ?> type="radio" name="genero_per" value="masculino">masculino</label>
									</div>
									<div class="radio">
										<label><input <?php if($res->genero_per == "femenino"){ echo "checked"; } ?> type="radio" name="genero_per" value="femenino">femenino</label>
									</div>
								</div>
							</div>
							
							<input type="hidden" name="id_persona" value="<?php echo $res->id_persona;?>" >
							
							
							<!-- <div class="form-group">
								<label class="col-sm-2 control-label">Médico:</label>
								<div class="col-sm-10">
								<select name="id_persona2" class="form-control select2" style="width: 100%;" required autofocus>
								<option value=''>Médico</option>
								<?php
									// require_once("../modelo/Persona.php");
									// $res2 = Persona::read();
									// while ($dato2 = mysqli_fetch_object($res2)){ 
									// $selected = ($res->id_persona2 == $dato2->id_persona) ? "selected" : "" ;
									// echo "<option ".$selected." value='".$dato2->id_persona."'>".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</option>";
									// }
								?>
								</select>
								</div>
							</div> -->
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
							<a class="btn btn-info" href="medico-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
						</div>
					</form>
				</div>
			</section>
		</div>
		
		<?php
			}else{
			require_once("noacceso.php");
		}
		require_once("footer.php");
	?>
	
	<?php
		
		
		
		if(isset($_POST) && !empty($_POST)){
			
			require_once("../modelo/Paciente.php");
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
			$res = Paciente::update2($id_persona, $cedula_per, $nombre_per, $apellido_per, $email_per, $telefono_per, $direccion_per, $ciudadresi_per, $fechanaci_per, $genero_per);
			if($res){
				$msg = base64_encode("<script>toastr.success('Registro actualizado correctamente');</script>");
				}else{
				$msg = base64_encode("<script>toastr.error('Registro duplicado');</script>");
			}
			header ("Location: medico-read.php?msg=$msg");
			
		}
		
		
		// CODIGO ORIGINAL DEL CRUD
		// require_once("../controlador/ControladorMedico.php");
		// ControladorMedico::update();
	?>
	
	<?php
	}
	ob_end_flush();
?>
