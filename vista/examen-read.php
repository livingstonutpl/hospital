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
				<h1>Ex&aacute;menes</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<?php
						if ($_SESSION["rol"] == "medico"){
						?>
						<div class="box-header with-border">
							<a href="examen-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</a>
						</div>
						<?php
						}
					?>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								<tr>
									<th>Id</th>
									<th>Historial</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Tipo</th>
									<th>Descripción</th>
									<th>Resultado</th>
									<th>Estado</th>
									<th style="width:65px">Opciones</th>
								</tr>
							</thead>
							<tbody>
								
								<!-- <?php
									if ($_SESSION["rol"] == "cliente"){
										require_once("../modelo/Examen.php");
										$res = Examen::read3($_SESSION["id_usuario1"]);
										}else{
										require_once("../modelo/Examen.php");
										$res = Examen::read();
									}
								?> -->
								
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->id_examen."</td>";
										
										// VARIABLE TIPO FK
										require_once("../modelo/Historiaclinica.php");
										$res2 = Historiaclinica::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_historiaclinica3 == $dato2->id_historiaclinica){
												echo "<td>"
												.$dato2->cedula_per." - "
												.$dato2->nombre_per." ".$dato2->apellido_per." - "
												.$dato2->fechaatencion_his." - "
												.$dato2->horaatencion_his."</td>";
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
										echo "<td>";
										if ($_SESSION["rol"] == "medico"){
											echo "<a href='examen-update.php?id_examen=".$dato->id_examen."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
											echo "<a href='examen-delete.php?id_examen=".$dato->id_examen."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
										}
										echo "</td>";
										echo "</tr>";
									}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Historial</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Tipo</th>
									<th>Descripción</th>
									<th>Resultado</th>
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
