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
				<h1>Citas Médicas</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<a href="agendamiento-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Agendar Cita</a>
						<a href="agendamiento-read.php?estado=agendado" class="btn btn-success"><i class="fas fa-user-clock"></i> Agendado</a>
						<a href="agendamiento-read.php?estado=atendido" class="btn btn-danger"><i class="fas fa-user-check"></i> Atendido</a>
						<a href="agendamiento-read.php?estado=ausente" class="btn btn-warning"><i class="fas fa-user-alt-slash"></i> Ausente</a>
					</div>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								
								<tr>
									<th>Id</th> 
									<th>Paciente</th>
									<th>Médico</th>
									<th>Fecha de Atención</th>
									<th>Hora de Atención</th>
									<th>Estado</th>
									<th style="width:65px">Opciones</th>
								</tr>
							</thead>
							<tbody>
								
								<?php
									if(isset($_GET["estado"]) and !empty($_GET["estado"])){
										$estado = $_GET["estado"];
										}else{
										$estado = "agendado";
									}
								?>
								
								<!-- <?php
									if ($_SESSION["rol"] == "cliente"){
										require_once("../modelo/Agendamiento.php");
										$res = Agendamiento::read3($estado, $_SESSION["id_usuario1"]);
										}else{
										require_once("../modelo/Agendamiento.php");
										$res = Agendamiento::read2($estado);
									}
								?> -->
								
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->id_historiaclinica."</td>";
										
										// VARIABLE TIPO FK
										require_once("../modelo/Persona.php");
										$res2 = Persona::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_persona3 == $dato2->id_persona){
												echo "<td>".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</td>";
											}
										}
										
										// VARIABLE TIPO FK
										require_once("../modelo/MedicoEspecialidad.php");
										$res2 = MedicoEspecialidad::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_medicoespecialidad1 == $dato2->id_medicoespecialidad){
												echo "<td>".$dato2->nombre_per." ".$dato2->apellido_per." - ".$dato2->nombre_esp."</td>";
											}
										}
										
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
										
										// OPCIONES
										echo "<td>";
										if ($dato->estado_his <> "atendido"){
											echo "<a href='agendamiento-update.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
											echo "<a href='agendamiento-delete.php?id_historiaclinica=".$dato->id_historiaclinica."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
										}
										echo "</td>";
										echo "</tr>";
									}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>Id</th> 
									<th>Paciente</th>
									<th>Médico</th>
									<th>Fecha de Atención</th>
									<th>Hora de Atención</th>
									<th>Estado</th>
									<th style="width:65px">Opciones</th>
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
