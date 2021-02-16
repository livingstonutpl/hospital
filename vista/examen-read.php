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
				<h1>Exámenes</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					
					<!-- <div class="box-header with-border">
						<a href="examen-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</a>
					</div> -->
					
					<!-- <?php
						if ($_SESSION["rol"] == "administrador"){
							require_once("../modelo/Examen.php");
							$res = Examen::read();
						}
						
						if ($_SESSION["rol"] == "medico" or $_SESSION["rol"] == "cliente"){
							if(isset($_GET["id_historiaclinica"]) and !empty($_GET["id_historiaclinica"])){
								require_once("../modelo/Examen.php");
								$id_historiaclinica = Connection::sanitize($_GET["id_historiaclinica"]);
								$res = Examen::read2($id_historiaclinica);
							}
						}
					?> -->
					
					<div class="box-header with-border">
						<a href="../vista/imprimir-examen.php?id_historiaclinica=<?php echo $id_historiaclinica;?>" target="_blank" class="btn btn-warning"><i class="fas fa-print"></i> Imprimir Examen</a>
					</div> 
					
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								<tr>
									<!-- <th>Id</th> -->
									<th>Cédula</th>
									<th>Paciente</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Tipo</th>
									<th>Descripción</th>
									<th>Resultado</th>
									<th>Estado</th>
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
						
						<?php
						while ($dato = mysqli_fetch_object($res)){
						echo "<tr>";
						
						// VARIABLE TIPO TEXTO
						// echo "<td>".$dato->id_examen."</td>";
						
						// VARIABLE TIPO FK
						require_once("../modelo/Historiaclinica.php");
						$res2 = Historiaclinica::read();
						while ($dato2 = mysqli_fetch_object($res2)){
						if ($dato->id_historiaclinica3 == $dato2->id_historiaclinica){
						echo "<td>"
						.$dato2->cedula_per."</td>";
						}
						}
						
						// $dato2->fechaatencion_his
						// $dato2->horaatencion_his
						
						// VARIABLE TIPO FK
						require_once("../modelo/Historiaclinica.php");
						$res2 = Historiaclinica::read();
						while ($dato2 = mysqli_fetch_object($res2)){
						if ($dato->id_historiaclinica3 == $dato2->id_historiaclinica){
						echo "<td>"
						.$dato2->nombre_per." ".$dato2->apellido_per."</td>";
						}
						}
						
						// VARIABLE TIPO DATE
						echo "<td>".$dato->fecha_exa."</td>";
						
						// VARIABLE TIPO TIME
						echo "<td>".$dato->hora_exa."</td>";
						
						// VARIABLE TIPO TIME
						echo "<td>".$dato->tipo_exa."</td>";
						
						// VARIABLE TIPO TEXTAREA
						echo "<td>".$dato->descripcion_exa."</td>";
						
						// VARIABLE TIPO TEXTAREA
						echo "<td>".$dato->resultado_exa."</td>";
						
						// VARIABLE TIPO RADIO
						echo "<td>".$dato->estado_exa."</td>";
						
						// OPCIONES
						if ($_SESSION["rol"] == "medico"){
						echo "<td>";
						// echo "<a href='examen-update.php?id_examen=".$dato->id_examen."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
						echo "<a href='examen-delete.php?id_examen=".$dato->id_examen."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
						echo "</td>";
						}
						echo "</tr>";
						}
						?>
						</tbody>
						<tfoot>
						<tr> 
						<!-- <th>Id</th> -->
						<th>Cédula</th>
						<th>Paciente</th>
						<th>Fecha</th>
						<th>Hora</th>
						<th>Tipo</th>
						<th>Descripción</th>
						<th>Resultado</th>
						<th>Estado</th>
						<?php
						if ($_SESSION["rol"] == "medico"){
						?>
						<th style="width:65px">Opciones</th>
						<?php
						}
						?>
						</tr>
						</tfoot> 
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
												