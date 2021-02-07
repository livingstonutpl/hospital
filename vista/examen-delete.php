<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		require_once("header.php");
		if ($_SESSION["rol"] == "administrador" or $_SESSION["rol"] == "medico" or $_SESSION["rol"] == "cliente"){
		?>
		
		<div class="content-wrapper">
			<section class="content">
				<div class="box box-danger">
					<div class="box-header with-border">
						<h3 class="box-title">Eliminar Examen</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_examen"]) and !empty($_GET["id_examen"])){
							require_once("../modelo/Examen.php");
							$id_examen = Connection::sanitize($_GET["id_examen"]);
							$res = examen::single_row($id_examen);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_examen" value="<?php echo $res->id_examen;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Historial:</label>
								<div class="col-sm-10">
									<?php
										require_once("../modelo/Historiaclinica.php");
										$res2 = Historiaclinica::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($res->id_historiaclinica3 == $dato2->id_historiaclinica){
												$id_historiaclinica3 = $dato2->cedula_per." - "
												.$dato2->nombre_per." ".$dato2->apellido_per." - "
												.$dato2->fechaatencion_his." - "
												.$dato2->horaatencion_his;
											}
										}
									?>
									<input type="text" name="id_historiaclinica3" value="<?php echo $id_historiaclinica3;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fecha Examen:</label>
								<div class="col-sm-10">
									<input type="text" name="fecha_exa" value="<?php echo $res->fecha_exa;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Hora Examen:</label>
								<div class="col-sm-10">
									<input type="text" name="hora_exa" value="<?php echo $res->hora_exa;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Tipo:</label>
								<div class="col-sm-10">
									<input type="text" name="tipo_exa" value="<?php echo $res->tipo_exa;?>" class="form-control" readonly>
								</div>
							</div>
							
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Descripción:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="descripcion_exa" class="form-control" readonly><?php echo $res->descripcion_exa;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Resultado:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="resultado_exa" class="form-control" readonly><?php echo $res->resultado_exa;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Estado:</label>
								<div class="col-sm-10">
									<input type="text" name="estado_exa" value="<?php echo $res->estado_exa;?>" class="form-control" readonly>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<p>¿Está seguro que desea eliminar el registro?</p>
							<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
							<a class="btn btn-info" href="examen-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
		require_once("../controlador/ControladorExamen.php");
		ControladorExamen::delete();
	?>
	
	<?php
	}
	ob_end_flush();
?>
