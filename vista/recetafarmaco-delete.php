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
						<h3 class="box-title">Eliminar Receta Fármacos</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_recetafarmaco"]) and !empty($_GET["id_recetafarmaco"])){
							require_once("../modelo/Recetafarmaco.php");
							$id_recetafarmaco = Connection::sanitize($_GET["id_recetafarmaco"]);
							$res = recetafarmaco::single_row($id_recetafarmaco);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_recetafarmaco" value="<?php echo $res->id_recetafarmaco;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Receta:</label>
								<div class="col-sm-10">
									<?php
										require_once("../modelo/Receta.php");
										$res2 = Receta::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($res->id_receta1 == $dato2->id_receta){
												$id_receta1 = $dato2->id_receta." - ".$dato2->fecha_rec;
											}
										}
									?>
									<input type="text" name="id_receta1" value="<?php echo $id_receta1;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Farmaco:</label>
								<div class="col-sm-10">
									<?php
										require_once("../modelo/Farmaco.php");
										$res2 = Farmaco::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($res->id_farmaco1 == $dato2->id_farmaco){
												$id_farmaco1 = $dato2->nombre_far." - ".$dato2->presentacion_far." - ".$dato2->administracion_far;
											}
										}
									?>
									<input type="text" name="id_farmaco1" value="<?php echo $id_farmaco1;?>" class="form-control" readonly>
								</div>
							</div>							
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cantidad:</label>
								<div class="col-sm-10">
									<input type="text" name="cantidad_recfar" value="<?php echo $res->cantidad_recfar;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Posologia:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="posologia_recfar" class="form-control" readonly><?php echo $res->posologia_recfar;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Duracion:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="duracion_recfar" class="form-control" readonly><?php echo $res->duracion_recfar;?></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Indicaciones:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="indicaciones_recfar" class="form-control" readonly><?php echo $res->indicaciones_recfar;?></textarea>
								</div>
							</div>
							
						</div>
						<div class="box-footer">
							<p>¿Está seguro que desea eliminar el registro?</p>
							<button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Eliminar</button>
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
		ControladorRecetafarmaco::delete();
	?>
	
	<?php
	}
	ob_end_flush();
?>
+