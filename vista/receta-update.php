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
						<h3 class="box-title">Actualizar Receta</h3>
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
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_receta" value="<?php echo $res->id_receta;?>" class="form-control" readonly>
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Historial:</label>
								<div class="col-sm-10">
									<select name="id_historiaclinica1" class="form-control select2" style="width: 100%;" required autofocus>
										<option value=''>Historial</option>
										<?php
											require_once("../modelo/Historiaclinica.php");
											$res2 = Historiaclinica::read();
											while ($dato2 = mysqli_fetch_object($res2)){ 
												$selected = ($res->id_historiaclinica1 == $dato2->id_historiaclinica) ? "selected" : "" ;
											echo "<option ".$selected." value='".$dato2->id_historiaclinica."'>".
											$dato2->cedula_per." - "
											.$dato2->nombre_per." ".$dato2->apellido_per." - "
											.$dato2->fechaatencion_his." - "
											.$dato2->horaatencion_his."</option>";
											}
											?>
											</select>
											</div>
											</div>
											
											<div class="form-group">
											<label class="col-sm-2 control-label">Fecha:</label>
											<div class="col-sm-10">
											<input type="date" name="fecha_rec" value="<?php echo $res->fecha_rec;?>" class="form-control" min="<?php echo gmdate("Y-m-d",time() + 3600*(-5+date("I"))); ?>" required>
											</div>
											</div>
											
											<div class="form-group">
											<label class="col-sm-2 control-label">Hora:</label>
											<div class="col-sm-10">
											<select name="hora_rec" class="form-control select2" style="width: 100%;" required>
											<option value=''>Hora</option>
											<option <?php if($res->hora_rec == "09:00"){ echo "selected"; } ?> value="09:00">09:00</option>
											<option <?php if($res->hora_rec == "09:30"){ echo "selected"; } ?> value="09:30">09:30</option>
											<option <?php if($res->hora_rec == "10:00"){ echo "selected"; } ?> value="10:00">10:00</option>
											<option <?php if($res->hora_rec == "10:30"){ echo "selected"; } ?> value="10:30">10:30</option>
											<option <?php if($res->hora_rec == "11:00"){ echo "selected"; } ?> value="11:00">11:00</option>
											<option <?php if($res->hora_rec == "11:30"){ echo "selected"; } ?> value="11:30">11:30</option>
											<option <?php if($res->hora_rec == "16:00"){ echo "selected"; } ?> value="16:00">16:00</option>
											<option <?php if($res->hora_rec == "16:30"){ echo "selected"; } ?> value="16:30">16:30</option>
											<option <?php if($res->hora_rec == "17:00"){ echo "selected"; } ?> value="17:00">17:00</option>
											<option <?php if($res->hora_rec == "17:30"){ echo "selected"; } ?> value="17:30">17:30</option>
											</select>
											</div>
											</div>
											
											<div class="form-group">
											<label class="col-sm-2 control-label">Estado:</label>
											<div class="col-sm-10">
											<div class="radio">
											<label><input <?php if($res->estado_rec == "pendiente"){ echo "checked"; } ?> type="radio" name="estado_rec" value="pendiente">pendiente</label>
											</div>
											<div class="radio">
											<label><input <?php if($res->estado_rec == "entregado"){ echo "checked"; } ?> type="radio" name="estado_rec" value="entregado">entregado</label>
											</div>
											<div class="radio">
											<label><input <?php if($res->estado_rec == "anulado"){ echo "checked"; } ?> type="radio" name="estado_rec" value="anulado">anulado</label>
											</div>
											</div>
											</div>
											
											</div>
											<div class="box-footer">
											<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
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
											require_once("../controlador/ControladorReceta.php");
											ControladorReceta::update();
											?>
											
											<?php
											}
											ob_end_flush();
											?>
																						