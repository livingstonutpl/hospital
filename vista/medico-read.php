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
			<section class="content-header">
				<h1>Médicos</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<a href="medico-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Médico</a>
						<a href="medicoespecialidad-read.php" class="btn btn-danger"><i class="fas fa-stethoscope"></i> Asignar Especialidades</a>
					</div>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								
								<tr>
									<th>Id</th>
									<!-- <th>Médico</th> -->
									<th>Cedula</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Email</th>
									<th>Teléfono</th>
									<th>Dirección</th>
									<th>Ciudad de Residencia</th>
									<th>Fecha de Nacimiento</th>
									<th>Género</th>
									<th>Uusario</th>
									<th style="width:65px">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<!-- <?php
									require_once("../modelo/Medico.php");
									$res = Medico::read();
								?> -->
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->id_medico."</td>";
										
										// VARIABLE TIPO FK
										// require_once("../modelo/Persona.php");
										// $res2 = Persona::read();
										// while ($dato2 = mysqli_fetch_object($res2)){
										// if ($dato->id_persona2 == $dato2->id_persona){
										// echo "<td>".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</td>";
										// }
										// }
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->cedula_per."</td>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->nombre_per."</td>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->apellido_per."</td>";
										
										// VARIABLE TIPO EMAIL
										echo "<td>".$dato->email_per."</td>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->telefono_per."</td>";
										
										// VARIABLE TIPO TEXTAREA
										echo "<td>".$dato->direccion_per."</td>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->ciudadresi_per."</td>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->fechanaci_per."</td>";
										
										// VARIABLE TIPO RADIO
										echo "<td>".$dato->genero_per."</td>";
										
										// VARIABLE TIPO FK
										require_once("../modelo/Usuario.php");
										$res2 = Usuario::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_usuario1 == $dato2->id_usuario){
												echo "<td>".$dato2->nombre_usu."</td>";
											}
										}
										
										// OPCIONES
										echo "<td>";
										echo "<a href='medico-update.php?id_medico=".$dato->id_medico."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
										echo "<a href='medico-delete.php?id_medico=".$dato->id_medico."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
										echo "</td>";
										echo "</tr>";
									}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>Id</th>
									<!-- <th>Médico</th> -->
									<th>Cedula</th>
									<th>Nombre</th>
									<th>Apellido</th>
									<th>Email</th>
									<th>Teléfono</th>
									<th>Dirección</th>
									<th>Ciudad de Residencia</th>
									<th>Fecha de Nacimiento</th>
									<th>Género</th>
									<th>Uusario</th>
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
