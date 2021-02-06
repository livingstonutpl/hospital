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
						<h3 class="box-title">Actualizar Persona Rol</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_personarol"]) && !empty($_GET["id_personarol"])){
							require_once("../modelo/Personarol.php");
							$id_personarol = Connection::sanitize($_GET["id_personarol"]);
							$res = personarol::single_row($id_personarol);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_personarol" value="<?php echo $res->id_personarol;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Persona:</label>
								<div class="col-sm-10">
									<select name="id_persona1" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Persona</option>
										<?php
											require_once("../modelo/Persona.php");
											$res2 = Persona::read();
											while ($dato2 = mysqli_fetch_object($res2)){ 
												$selected = ($res->id_persona1 == $dato2->id_persona) ? "selected" : "" ;
												echo "<option ".$selected." value='".$dato2->id_persona."'>".$dato2->cedula_per." - ".$dato2->nombre_per." - ".$dato2->apellido_per."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Rol:</label>
								<div class="col-sm-10">
									<select name="id_rol1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Rol</option>
										<?php
											require_once("../modelo/Rol.php");
											$res2 = Rol::read();
											while ($dato2 = mysqli_fetch_object($res2)){ 
												$selected = ($res->id_rol1 == $dato2->id_rol) ? "selected" : "" ;
												echo "<option ".$selected." value='".$dato2->id_rol."'>".$dato2->id_rol." - ".$dato2->nombre_rol."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
							<a class="btn btn-info" href="personarol-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
		require_once("../controlador/ControladorPersonarol.php");
		ControladorPersonarol::update();
	?>
	
	<?php
	}
	ob_end_flush();
?>
