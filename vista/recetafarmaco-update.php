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
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Actualizar Receta Fármacos</h3>
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
									<select name="id_receta1" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Receta</option>
										<?php
											require_once("../modelo/Receta.php");
											$res2 = Receta::read();
											while ($dato2 = mysqli_fetch_object($res2)){ 
												$selected = ($res->id_receta1 == $dato2->id_receta) ? "selected" : "" ;
												echo "<option ".$selected." value='".$dato2->id_receta."'>".$dato2->id_receta." - ".$dato2->fecha_rec."</option>";
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
												$selected = ($res->id_farmaco1 == $dato2->id_farmaco) ? "selected" : "" ;
												echo "<option ".$selected." value='".$dato2->id_farmaco."'>".$dato2->nombre_far." - ".$dato2->presentacion_far." - ".$dato2->administracion_far."</option>";
											}
										?>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Cantidad:</label>
								<div class="col-sm-10">
									<input type="number" name="cantidad_recfar" value="<?php echo $res->cantidad_recfar;?>" step="1" min="1" max="1000000000" class="form-control" required>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Posologia:</label>
								<div class="col-sm-10">
								<textarea rows="3" name="posologia_recfar" class="form-control" required><?php echo $res->posologia_recfar;?></textarea>
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-2 control-label">Duracion:</label>
								<div class="col-sm-10">
								<textarea rows="3" name="duracion_recfar" class="form-control" required><?php echo $res->duracion_recfar;?></textarea>
								</div>
								</div>
								
								<div class="form-group">
								<label class="col-sm-2 control-label">Indicaciones:</label>
								<div class="col-sm-10">
								<textarea rows="3" name="indicaciones_recfar" class="form-control" required><?php echo $res->indicaciones_recfar;?></textarea>
								</div>
								</div>
								
								</div>
								<div class="box-footer">
								<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
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
								ControladorRecetafarmaco::update();
								?>
								
								<?php
								}
								ob_end_flush();
								?>
																