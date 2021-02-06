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
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Nueva Receta F&aacute;rmaco</h3>
					</div>
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Receta:</label>
								<div class="col-sm-10">
									<select name="id_receta1" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Receta</option>
										<?php
											require_once("../modelo/Receta.php");
											$res2 = Receta::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_receta."'>".$dato2->id_receta." - ".$dato2->fecha_rec."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Farmaco:</label>
								<div class="col-sm-10">
									<select name="id_farmaco1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Farmaco</option>
										<?php
											require_once("../modelo/Farmaco.php");
											$res2 = Farmaco::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_farmaco."'>".$dato2->id_farmaco." - ".$dato2->nombre_far."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cantidad:</label>
								<div class="col-sm-10">
									<input type="number" name="cantidad_recfar" placeholder="Cantidad" step="1" min="1" max="1000000000" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Posologia:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="posologia_recfar" class="form-control" placeholder="Posologia" required></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Duracion:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="duracion_recfar" class="form-control" placeholder="Duracion" required></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Indicaciones:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="indicaciones_recfar" class="form-control" placeholder="Indicaciones" required></textarea>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Guardar</button>
							<a class="btn btn-info" href="recetafarmaco-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
						require_once("../controlador/ControladorRecetafarmaco.php");
						ControladorRecetafarmaco::create();
						?>
						
						<?php
						}
						ob_end_flush();
						?>
												