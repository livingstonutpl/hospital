<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		require_once("header.php");
		if ($_SESSION["rol"] == "cliente"){
		?>
		
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Historial Diagnósticos</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<div class="box-body table-responsive">
						<table id="myTableNODATATABLES" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								
								<tr>
									<th>Historial</th>
									<th>Diagnóstico</th>
									<?php
										if ($_SESSION["rol"] == "medico"){
										?>
										<th style="width:65px">Opciones</th>
										<?php
										}
									?>
								</tr>
							</thead>
							<tbody>
								
								<!-- <?php									
									if(isset($_GET["id_historiaclinica"]) and !empty($_GET["id_historiaclinica"])){
										$id_historiaclinica = $_GET["id_historiaclinica"];
									}									
									require_once("../modelo/Historiaclinicadiagnostico.php");
									$res = Historiaclinicadiagnostico::read2($id_historiaclinica);
								?> -->
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										//echo "<td>".$dato->id_historiaclinicadiagnostico."</td>";
										
										// VARIABLE TIPO FK
										require_once("../modelo/Historiaclinica.php");
										$res2 = Historiaclinica::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_historiaclinica2 == $dato2->id_historiaclinica){
												echo "<td>".$dato2->cedula_per." - "
												.$dato2->nombre_per." ".$dato2->apellido_per." - "
												.$dato2->fechaatencion_his." - "
												.$dato2->horaatencion_his."</td>";
											}
										}
										
										// VARIABLE TIPO FK
										require_once("../modelo/Diagnostico.php");
										$res2 = Diagnostico::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_diagnostico1 == $dato2->id_diagnostico){
												echo "<td>".$dato2->cie10_dia." - ".$dato2->descripcion_dia."</td>";
											}
										}
										
										// OPCIONES
										echo "<td>";
										if ($_SESSION["rol"] == "medico"){
											echo "<a href='historiaclinicadiagnostico-update.php?id_historiaclinicadiagnostico=".$dato->id_historiaclinicadiagnostico."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
											echo "<a href='historiaclinicadiagnostico-delete.php?id_historiaclinicadiagnostico=".$dato->id_historiaclinicadiagnostico."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
										}
										echo "</td>";
										echo "</tr>";
									}
								?>
							</tbody>
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
