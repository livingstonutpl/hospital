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
				<?php
					if ($_SESSION["rol"] == "medico"){
						echo "<h1>Mi Agenda</h1>";
						}else{
						echo "<h1>Historial</h1>";
					}
				?>
			</section>
			<section class="content">
				<div class="box box-primary">
					<!-- <div class="box-header with-border">
						<a href="historiaclinica-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</a> 
						<a href="historiaclinicadiagnostico-read.php" class="btn btn-primary"><i class="fas fa-book-medical"></i> Historial Diagnósticos</a> 
					</div> -->
					<?php
						if ($_SESSION["rol"] == "medico"){
						?>
						<div class="box-header with-border">
							<a href="historiaclinica-read.php?rango=hoy" class="btn btn-primary"><i class="far fa-bookmark"></i> Agenda de Hoy</a> 
							<a href="historiaclinica-read.php?rango=todo" class="btn btn-info"><i class="fas fa-bookmark"></i> Toda la Agenda</a> 
						</div> 
						<?php
						}
					?>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								<tr>
									<th>Id</th>
									<th>Cédula</th>
									<th>Paciente</th>
									<th>Médico</th>
									<th>Especialidad</th>
									
									<!-- <th>Anamnesis</th> -->
									<!-- <th>Examen Físico</th> -->
									<!-- <th>Tratamiento</th> -->
									
									<th>Fecha</th>
									<th>Hora</th>
									<th>Estado</th> 
									<?php
										if ($_SESSION["rol"] == "medico"){
											echo "<th>Atención</th>";
											echo "<th>Diagnósticos</th>";
											echo "<th>Exámenes</th>";
											echo "<th>Recetas</th>";
										}
										if ($_SESSION["rol"] == "cliente"){
											echo "<th>Atención</th>";
											echo "<th>Diagnósticos</th>";
											echo "<th>Exámenes</th>";
											echo "<th>Recetas</th>";
										}
										if ($_SESSION["rol"] == "administrador"){
											echo "<th>Historial</th>";
										}
									?>
								</tr>
							</thead>
							<tbody>
								
								<!-- <?php
									if ($_SESSION["rol"] == "cliente"){
										require_once("../modelo/Historiaclinica.php");
										$res = Historiaclinica::read3($_SESSION["id_usuario1"]);
									}
									
									if ($_SESSION["rol"] == "administrador"){
										require_once("../modelo/Historiaclinica.php");
										$res = Historiaclinica::read2();
									}
									
									if ($_SESSION["rol"] == "medico"){
										if(isset($_GET["rango"]) and !empty($_GET["rango"])){
											$rango = $_GET["rango"];
											}else{
											$rango = "todo";
										}
										if ($rango == "hoy"){
											require_once("../modelo/Historiaclinica.php");
											$res = Historiaclinica::read4($_SESSION["id_medico"]);
										}
										if ($rango == "todo"){
											require_once("../modelo/Historiaclinica.php");
											$res = Historiaclinica::read5($_SESSION["id_medico"]);
										}
									}
								?> -->
								
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// ID DE HISTORIA CLICNICA
										echo "<td>".$dato->id_historiaclinica."</td>";
										
										// VARIABLE TIPO FK
										require_once("../modelo/Persona.php");
										$res2 = Persona::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_persona3 == $dato2->id_persona){
												echo "<td>".$dato2->cedula_per."</td>";
											}
										}
										
										// VARIABLE TIPO FK
										require_once("../modelo/Persona.php");
										$res2 = Persona::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_persona3 == $dato2->id_persona){
												echo "<td>".$dato2->nombre_per." ".$dato2->apellido_per."</td>";
											}
										}
										
										// VARIABLE TIPO FK
										require_once("../modelo/MedicoEspecialidad.php");
										$res2 = MedicoEspecialidad::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_medicoespecialidad1 == $dato2->id_medicoespecialidad){
												echo "<td>".$dato2->nombre_per." ".$dato2->apellido_per."</td>";
												$medico = $dato2->nombre_per." ".$dato2->apellido_per;
											}
										}
										
										// VARIABLE TIPO FK
										require_once("../modelo/MedicoEspecialidad.php");
										$res2 = MedicoEspecialidad::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_medicoespecialidad1 == $dato2->id_medicoespecialidad){
												echo "<td>".$dato2->nombre_esp."</td>";
											}
										}
										
										// VARIABLE TIPO TEXTAREA
										// echo "<td>".$dato->anamnesis_his."</td>";
										
										// VARIABLE TIPO TEXTAREA
										// echo "<td>".$dato->examenfisico_his."</td>";
										
										// VARIABLE TIPO TEXTAREA
										// echo "<td>".$dato->tratamiento_his."</td>";
										
										// VARIABLE TIPO DATE
										echo "<td>".$dato->fechaatencion_his."</td>";
										
										// VARIABLE TIPO TIME
										echo "<td>".$dato->horaatencion_his."</td>";
										
										// VARIABLE TIPO RADIO
										if ($dato->estado_his == "agendado"){
											echo "<td><span class='label label-success'>agendado</span></td>";
										}
										if ($dato->estado_his == "atendido"){
											echo "<td><span class='label label-danger'>atendido</span></td>";
										}
										if ($dato->estado_his == "ausente"){
											echo "<td><span class='label label-warning'>ausente</span></td>";
										}
										
										if ($_SESSION["rol"] == "medico"){
											// ATENCION
											echo "<td>";
											echo "<a href='historiaclinica-update.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Registrar Atención Médica'><i class='fas fa-hand-paper text-blue'></i></a>&nbsp;&nbsp;";
											// echo "<a href='historiaclinica-delete.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
											echo "</td>";
											
											// DIAGNOSTICOS
											echo "<td>";
											echo "<a href='historiaclinicadiagnostico-create.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Registrar Diagnósticos'><i class='fas fa-book-medical text-green'></i></a>&nbsp;&nbsp;";
											echo "<a href='historiaclinicadiagnostico-read.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Reportar Diagnósticos'><i class='fas fa-search text-red'></i></a>&nbsp;&nbsp;";
											echo "</td>";
											
											// EXAMENES
											echo "<td>";
											echo "<a href='examen-create.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Registrar Exámenes'><i class='fas fa-microscope text-green'></i></a>&nbsp;&nbsp;";
											echo "<a href='examen-read.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Reportar Exámenes'><i class='fas fa-search text-red'></i></a>&nbsp;&nbsp;";
											echo "</td>";
											
											// RECETAS
											echo "<td>";
											echo "<a href='receta-create.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Registrar Recetas'><i class='fas fa-file-medical text-green'></i></a>&nbsp;&nbsp;";
											echo "<a href='receta-read.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Reportar Recetas'><i class='fas fa-search text-red'></i></a>&nbsp;&nbsp;";
											echo "</td>";
										}
										
										if ($_SESSION["rol"] == "cliente"){
											// ATENCION
											echo "<td>";
											echo "<a href='historiaclinica-update.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Reportar Atención Médica'><i class='fas fa-hand-paper text-blue'></i></a>&nbsp;&nbsp;";
											// echo "<a href='historiaclinica-delete.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
											echo "</td>";
											
											// DIAGNOSTICOS
											echo "<td>";
											echo "<a href='historiaclinicadiagnostico-read.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Reportar Diagnósticos'><i class='fas fa-search text-red'></i></a>&nbsp;&nbsp;";
											echo "</td>";
											
											// EXAMENES
											echo "<td>";
											echo "<a href='examen-read.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Reportar Exámenes'><i class='fas fa-search text-red'></i></a>&nbsp;&nbsp;";
											echo "</td>";
											
											// RECETAS
											echo "<td>";
											echo "<a href='receta-read.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Reportar Recetas'><i class='fas fa-search text-red'></i></a>&nbsp;&nbsp;";
											echo "</td>";
										}
										
										
										// if ($_SESSION["rol"] == "cliente"){
										// echo "<td>";
										// if ($dato->estado_his == "atendido"){
										// echo "<a href='historiaclinicadiagnostico-read2.php?id_historiaclinica=".$dato->id_historiaclinica."'> Diagnósticos</a>";
										// }
										// echo "</td>";
										// }
										
										if ($_SESSION["rol"] == "administrador"){
											echo "<td>";
											if ($dato->estado_his == "atendido"){
												echo "<a href='historiaclinicadiagnostico-read2.php?id_historiaclinica=".$dato->id_historiaclinica."&medico=".$medico."' title='Ver Historial'><i class='fas fa-search text-green'></i></a>";
											}
											echo "</td>";
										}
										
										echo "</td>";
										echo "</tr>";
									}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Cédula</th>
									<th>Paciente</th>
									<th>Médico</th>
									<th>Especialidad</th>
									
									<!-- <th>Anamnesis</th> -->
									<!-- <th>Examen Físico</th> -->
									<!-- <th>Tratamiento</th> -->
									
									<th>Fecha</th>
									<th>Hora</th>
									<th>Estado</th> 
									<?php
										if ($_SESSION["rol"] == "medico"){
											echo "<th>Atención</th>";
											echo "<th>Diagnósticos</th>";
											echo "<th>Exámenes</th>";
											echo "<th>Recetas</th>";
										}
										if ($_SESSION["rol"] == "cliente"){
											echo "<th>Atención</th>";
											echo "<th>Diagnósticos</th>";
											echo "<th>Exámenes</th>";
											echo "<th>Recetas</th>";
										}
										if ($_SESSION["rol"] == "administrador"){
											echo "<th>Historial</th>";
										}
									?>
								</tr>
							</tfoot>
						</table>
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
