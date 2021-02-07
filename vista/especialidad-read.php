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
				<h1>Especialidades</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<a href="especialidad-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</a>
					</div>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								
								<tr>
									<th>Id</th>
									<th>Nombre</th>
									<th>Descripción</th>
									<th style="width:65px">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<!-- <?php
									require_once("../modelo/Especialidad.php");
									$res = Especialidad::read();
								?> -->
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->id_especialidad."</td>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->nombre_esp."</td>";
										
										// VARIABLE TIPO TEXTAREA
									echo "<td>".$dato->descripcion_esp."</td>";
									
									// OPCIONES
									echo "<td>";
									echo "<a href='especialidad-update.php?id_especialidad=".$dato->id_especialidad."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
									echo "<a href='especialidad-delete.php?id_especialidad=".$dato->id_especialidad."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
									echo "</td>";
									echo "</tr>";
									}
									?>
									</tbody>
									<tfoot>
									<tr>
									<th>Id</th>
									<th>Nombre</th>
									<th>Descripción</th>
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
																		