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
			<section class="content-header">
				<h1>Recetas / Fármacos</h1>
			</section>
			
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						
						<!-- <?php
							if(isset($_GET["id_receta"]) and !empty($_GET["id_receta"])){
								require_once("../modelo/Receta.php");
								$id_receta = Connection::sanitize($_GET["id_receta"]);								
								$res = receta::single_row2($id_receta);
							}
						?> -->	
						
						
						<a href="../vista/imprimir-receta.php?id_receta=<?php echo $id_receta;?>" target="_blank" class="btn btn-warning"><i class="fas fa-print"></i> Imprimir Receta</a>
						<br>
						<br>
						
						<div class="row">
							<div class="col-sm-3 col-xs-6">
								<strong>Código:</strong>
							</div>
							<div class="col-sm-8 col-xs-5">
								<div><?php echo $res->id_receta;?></div>
							</div>
							
							<div class="col-sm-3 col-xs-6">
								<strong>Cédula:</strong>
							</div>
							<div class="col-sm-8 col-xs-5">
								<div><?php echo $res->cedula_per;?></div>
							</div>
							
							<div class="col-sm-3 col-xs-6">
								<strong>Paciente:</strong>
							</div>
							<div class="col-sm-8 col-xs-5">
								<div><?php echo $res->nombre_per." ".$res->apellido_per;?></div>
							</div>
							
							<div class="col-sm-3 col-xs-6">
								<strong>Fecha receta:</strong>
							</div>
							<div class="col-sm-8 col-xs-5">
								<div><?php echo $res->fecha_rec;?></div>
							</div>
							
							<div class="col-sm-3 col-xs-6">
								<strong>Hora receta:</strong>
							</div>
							<div class="col-sm-8 col-xs-5">
								<div><?php echo $res->hora_rec;?></div>
							</div>
							
							<div class="col-sm-3 col-xs-6">
								<strong>Estado:</strong>
							</div>
							<div class="col-sm-8 col-xs-5">
								<div><?php echo $res->estado_rec;?></div>
							</div>
						</div>
						
					</div>
				</div>
				
				<div class="box box-primary">
					<!-- <div class="box-header with-border">
						
					</div>  -->
					<div class="box-body table-responsive">
						<table id="myTableNODATATABLES" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>								
								<tr>
									<!-- <th>Id</th> -->
									<!-- <th>Receta</th> -->
									<th>Cantidad</th>
									<th>Fármaco</th>
									<th>Presentación</th>
									<th>Administración</th>
									<th>Posología</th>
									<th>Duración</th>
									<th>Indicaciones</th>
									<!-- <th style="width:65px">Opciones</th> -->
								</tr>
							</thead>
							<tbody>								
								
								<!-- <?php
									if(isset($_GET["id_receta"]) and !empty($_GET["id_receta"])){
										$id_receta = $_GET["id_receta"];
									}		
									require_once("../modelo/Recetafarmaco.php");
									$res = Recetafarmaco::read2($id_receta);
								?> -->								
								
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										// echo "<td>".$dato->id_recetafarmaco."</td>";
										
										// VARIABLE TIPO FK
										// require_once("../modelo/Receta.php");
										// $res2 = Receta::read();
										// while ($dato2 = mysqli_fetch_object($res2)){
										// if ($dato->id_receta1 == $dato2->id_receta){
										// echo "<td>".$dato2->id_receta." - ".$dato2->fecha_rec."</td>";
										// }
										// }
										
										// VARIABLE TIPO INTEGER
										echo "<td>".$dato->cantidad_recfar."</td>";
										
										// VARIABLE TIPO FK
										require_once("../modelo/Farmaco.php");
										$res2 = Farmaco::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_farmaco1 == $dato2->id_farmaco){
												echo "<td>".$dato2->nombre_far."</td>";
											}
										}
										
										// VARIABLE TIPO FK
										require_once("../modelo/Farmaco.php");
										$res2 = Farmaco::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_farmaco1 == $dato2->id_farmaco){
												echo "<td>".$dato2->presentacion_far."</td>";
											}
										}
										
										// VARIABLE TIPO FK
										require_once("../modelo/Farmaco.php");
										$res2 = Farmaco::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_farmaco1 == $dato2->id_farmaco){
												echo "<td>".$dato2->administracion_far."</td>";
											}
										}
										
										// VARIABLE TIPO TEXTAREA
										echo "<td>".$dato->posologia_recfar."</td>";
										
										// VARIABLE TIPO TEXTAREA
										echo "<td>".$dato->duracion_recfar."</td>";
										
										// VARIABLE TIPO TEXTAREA
										echo "<td>".$dato->indicaciones_recfar."</td>";
										
										// OPCIONES
										// echo "<td>";
										// echo "<a href='recetafarmaco-update.php?id_recetafarmaco=".$dato->id_recetafarmaco."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
										// echo "<a href='recetafarmaco-delete.php?id_recetafarmaco=".$dato->id_recetafarmaco."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
										// echo "</td>";
										// echo "</tr>";
									}
								?>
							</tbody>
							<!-- <tfoot>
								<tr>
							<!-- <th>Id</th> -->
							<!-- <th>Receta</th>
								<th>Farmaco</th>
								<th>Cantidad</th>
								<th>Posología</th>
								<th>Duración</th>
							<th>Indicaciones</th> -->
							<!-- <th style="width:65px">Opciones</th> -->
							<!-- </tr> -->
							<!-- </tfoot> -->
						</table>
					</div>
					<div class="box-footer">
						<a class="btn btn-info" href="historiaclinica-read.php" role="button"><i class="fas fa-undo-alt"></i> Regresar</a>
					</div>
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
		if(isset($_GET["msg"]) and !empty($_GET["msg"])){
			echo base64_decode($_GET["msg"]);
		}
	?>
	
	<?php
	}
	ob_end_flush();
?>
