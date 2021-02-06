<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		require_once("header.php");
		if ($_SESSION["rol"] == "administrador" or $_SESSION["rol"] == "cliente"){
		?>
		
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Recetas</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						
						<?php
							if ($_SESSION["rol"] == "administrador"){ //VISIBLE PARA ADMINISTRADOR
							?>
							<a href="receta-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</a>
							<?php
							}
						?>
						
					</div>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								
								<tr>
									<th>Id</th>
									<th>Historia Clínica</th>
									<th>Fecha</th>
									<th>Hora</th>
									<th>Estado</th>
									<?php
										if ($_SESSION["rol"] == "administrador"){
										?>
										<th style="width:65px">Opciones</th>
										<?php
										}
									?>
								</tr>
							</thead>
							<tbody>
							<!-- <?php
							require_once("../modelo/Receta.php");
							$res = Receta::read();
							?> -->
							<?php
							while ($dato = mysqli_fetch_object($res)){
							echo "<tr>";
							
							// VARIABLE TIPO TEXTO
							echo "<td>".$dato->id_receta."</td>";
							
							// VARIABLE TIPO FK
							require_once("../modelo/Historiaclinica.php");
							$res2 = Historiaclinica::read();
							while ($dato2 = mysqli_fetch_object($res2)){
							if ($dato->id_historiaclinica1 == $dato2->id_historiaclinica){
							echo "<td>".$dato2->id_historiaclinica." - ".$dato2->fechaatencion_his."</td>";
							}
							}
							
							// VARIABLE TIPO DATE
							echo "<td>".$dato->fecha_rec."</td>";
							
							// VARIABLE TIPO TIME
							echo "<td>".$dato->hora_rec."</td>";
							
							// VARIABLE TIPO RADIO
							echo "<td>".$dato->estado_rec."</td>";
							
							// OPCIONES
							if ($_SESSION["rol"] == "administrador"){ //VISIBLE PARA ADMINISTRADOR
							echo "<td>";
							echo "<a href='receta-update.php?id_receta=".$dato->id_receta."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
							echo "<a href='receta-delete.php?id_receta=".$dato->id_receta."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
							echo "</td>";
							echo "</tr>";
							}
							}
							?>
							</tbody>
							<tfoot>
							<tr>
							<th>Id</th>
							<th>Historia Clínica</th>
							<th>Fecha</th>
							<th>Hora</th>
							<th>Estado</th>
							<?php
							if ($_SESSION["rol"] == "administrador"){
							?>
							<th style="width:65px">Opciones</th>
							<?php
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
							if(isset($_GET["msg"]) && !empty($_GET["msg"])){
							echo base64_decode($_GET["msg"]);
							}
							?>
							
							<?php
							}
							ob_end_flush();
							?>
														