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
				<h1>Roles de Personas</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<a href="personarol-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Rol de Persona</a>
					</div>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								
								<tr>
									<th>Id</th>
									<th>Cédula</th>
									<th>Persona</th>
									<th>Rol</th>
									<th style="width:65px">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<!-- <?php
									require_once("../modelo/Personarol.php");
									$res = Personarol::read();
								?> -->
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->id_personarol."</td>";
										
										echo "<td>".$dato->cedula_per."</td>";
										
										echo "<td>".$dato->nombre_per."</td>";
										
										echo "<td>".$dato->nombre_rol."</td>";																	
										
										// OPCIONES
										echo "<td>";
										// echo "<a href='personarol-update.php?id_personarol=".$dato->id_personarol."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
										echo "<a href='personarol-delete.php?id_personarol=".$dato->id_personarol."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
										echo "</td>";
										echo "</tr>";
									}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Cédula</th>
									<th>Persona</th>
									<th>Rol</th>
									<th style="width:65px">Opciones</th>
								</tr>
							</tfoot>
						</table>
					</div>
					<div class="box-footer">
						<a class="btn btn-info" href="rol-read.php" role="button"><i class="fas fa-undo-alt"></i> Regresar</a>
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
