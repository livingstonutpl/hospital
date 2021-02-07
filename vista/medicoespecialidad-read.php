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
				<h1>M&eacute;dico Especialidades</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<a href="medicoespecialidad-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</a>
					</div>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								<tr>
									<th>Id</th>
									<th>Médico</th>
									<th>Especialidad</th>
									<th style="width:65px">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<!-- <?php
									require_once("../modelo/Medicoespecialidad.php");
									$res = Medicoespecialidad::read();
								?> -->
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->id_medicoespecialidad."</td>";
										
										// VARIABLE TIPO FK
										require_once("../modelo/Medico.php");
										$res2 = Medico::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_medico1 == $dato2->id_medico){
												echo "<td>".$dato2->id_medico." - ".$dato2->cedula_per." - ".$dato2->nombre_per." ".$dato2->apellido_per."</td>";
											}
											}
											
											// VARIABLE TIPO FK
											require_once("../modelo/Especialidad.php");
											$res2 = Especialidad::read();
											while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_especialidad1 == $dato2->id_especialidad){
											echo "<td>".$dato2->id_especialidad." - ".$dato2->nombre_esp."</td>";
											}
											}
											
											// OPCIONES
											echo "<td>";
											echo "<a href='medicoespecialidad-update.php?id_medicoespecialidad=".$dato->id_medicoespecialidad."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
											echo "<a href='medicoespecialidad-delete.php?id_medicoespecialidad=".$dato->id_medicoespecialidad."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
											echo "</td>";
											echo "</tr>";
											}
											?>
											</tbody>
											<tfoot>
											<tr>
											<th>Id</th>
											<th>Médico</th>
											<th>Especialidad</th>
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
																						