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
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Nueva Receta Fármaco</h3>
					</div>
					
					<!-- <?php
						if(isset($_GET["id_receta"]) and !empty($_GET["id_receta"])){
							require_once("../modelo/Receta.php");
							$id_receta = Connection::sanitize($_GET["id_receta"]);
							$res = receta::single_row($id_receta);
						}
					?> -->
					
					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">
							
							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">
							
							<input type="hidden" name="id_receta1" value="<?php echo $id_receta; ?>">
							
							<!-- <div class="form-group">
								<label class="col-sm-2 control-label">Receta:</label>
								<div class="col-sm-10">
								<select name="id_receta1" class="form-control select2" style="width: 100%;" required autofocus>
								<option value=''>Receta</option>
								<?php
									// require_once("../modelo/Receta.php");
									// $res2 = Receta::read();
									// while ($dato2 = mysqli_fetch_object($res2)){
									// echo "<option value='".$dato2->id_receta."'>".$dato2->id_receta." - ".$dato2->fecha_rec."</option>";
									// }
								?>
								</select>
								</div>
							</div> -->
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Fármaco:</label>
								<div class="col-sm-10">
									<select name="id_farmaco1" class="form-control select2" style="width: 100%;" required>
										<option value=''>Fármaco</option>
										<?php
											require_once("../modelo/Farmaco.php");
											$res2 = Farmaco::read();
											while ($dato2 = mysqli_fetch_object($res2)){
												echo "<option value='".$dato2->id_farmaco."'>".$dato2->nombre_far." - ".$dato2->presentacion_far." - ".$dato2->administracion_far."</option>";
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
								<label class="col-sm-2 control-label">Posología:</label>
								<div class="col-sm-10">
									<textarea rows="3" name="posologia_recfar" class="form-control" placeholder="Posologia" required></textarea>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Duración:</label>
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
							<a class="btn btn-info" href="receta-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
				header ("Location: historiaclinica-read.php?msg=$msg");
				}else{
				echo "<script>toastr.error('El registro no se pudo guardar');</script>";
			}
		}
	?>
	
	<?php
	}
	ob_end_flush();
?>
