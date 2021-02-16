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
				<h1>Receta Fármacos</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<a href="recetafarmaco-create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo</a>
					</div>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								
								<tr>
									<th>Id</th>
									<th>Receta</th>
									<th>Farmaco</th>
									<th>Cantidad</th>
									<th>Posologia</th>
									<th>Duracion</th>
									<th>Indicaciones</th>
									<th style="width:65px">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<!-- <?php
									require_once("../modelo/Recetafarmaco.php");
									$res = Recetafarmaco::read();
								?> -->
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->id_recetafarmaco."</td>";
										
										// VARIABLE TIPO FK
										require_once("../modelo/Receta.php");
										$res2 = Receta::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_receta1 == $dato2->id_receta){
												echo "<td>".$dato2->id_receta." - ".$dato2->fecha_rec."</td>";
											}
										}
										
										// VARIABLE TIPO FK
										require_once("../modelo/Farmaco.php");
										$res2 = Farmaco::read();
										while ($dato2 = mysqli_fetch_object($res2)){
											if ($dato->id_farmaco1 == $dato2->id_farmaco){
												echo "<td>".$dato2->nombre_far." - ".$dato2->presentacion_far." - ".$dato2->administracion_far."</td>";
											}
										}
										
										// VARIABLE TIPO INTEGER
										echo "<td>".$dato->cantidad_recfar."</td>";
										
										// VARIABLE TIPO TEXTAREA
										echo "<td>".$dato->posologia_recfar."</td>";
										
										// VARIABLE TIPO TEXTAREA
										echo "<td>".$dato->duracion_recfar."</td>";
										
										// VARIABLE TIPO TEXTAREA
										echo "<td>".$dato->indicaciones_recfar."</td>";
										
										// OPCIONES
										echo "<td>";										
										// OPCIONES ADMINISTRADOR Y MEDICO
										if ($_SESSION["rol"] == "medico"){											
											echo "<a href='recetafarmaco-update.php?id_recetafarmaco=".$dato->id_recetafarmaco."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
											echo "<a href='recetafarmaco-delete.php?id_recetafarmaco=".$dato->id_recetafarmaco."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
										}
										echo "</td>";						
										
										echo "</tr>";
									}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Receta</th>
									<th>Farmaco</th>
									<th>Cantidad</th>
									<th>Posologia</th>
									<th>Duracion</th>
									<th>Indicaciones</th>
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
