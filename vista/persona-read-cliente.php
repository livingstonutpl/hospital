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
				<h1>Clientes</h1>
			</section>
			<section class="content">
				<div class="box box-primary">
					<div class="box-header with-border">
						<a href="persona-create-cliente.php" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo Cliente</a>
					</div>
					<div class="box-body table-responsive">
						<table id="myTable" class="display table table-bordered table-striped table-condensed table-hover" width="100%">
							<thead>
								
								<tr>
									<th>Id</th>
									<th>Cédula</th>
									<th>Persona</th>
									<th>Email</th>
									<th>Teléfono</th>
									<th>Dirección</th>
									<th>Ciudad de Residencia</th>
									<th>Fecha de Nacimiento</th>
									<th>Género</th>
									<th>Usuario</th>
									<th style="width:65px">Opciones</th>
								</tr>
							</thead>
							<tbody>
								<!-- <?php
									require_once("../modelo/Persona.php");
									$res = Persona::readcliente();
								?> -->
								<?php
									while ($dato = mysqli_fetch_object($res)){
										echo "<tr>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->id_persona."</td>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->cedula_per."</td>";
										
										// VARIABLE TIPO TEXTO
										echo "<td>".$dato->nombre_per." ".$dato->apellido_per."</td>";
										
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
										echo "<a href='persona-update-cliente.php?id_persona=".$dato->id_persona."' title='Actualizar'><i class='fas fa-pen text-green'></i></a>&nbsp;&nbsp;";
										echo "<a href='persona-delete-cliente.php?id_persona=".$dato->id_persona."' title='Eliminar'><i class='fas fa-trash text-red'></i></a>";
										echo "</td>";
										echo "</tr>";
									}
								?>
							</tbody>
							<tfoot>
								<tr>
									<th>Id</th>
									<th>Cedula</th>
									<th>Persona</th>
									<th>Email</th>
									<th>Teléfono</th>
									<th>Dirección</th>
									<th>Ciudad de Residencia</th>
									<th>Fecha de Nacimiento</th>
									<th>Género</th>
									<th>Usuario</th>
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
