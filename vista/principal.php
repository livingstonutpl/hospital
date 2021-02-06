<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: login.php");
		}else{
		require_once("header.php");
		if ($_SESSION["rol"] == "administrador" or $_SESSION["rol"] == "cliente" or $_SESSION["rol"] == "medico"){
		?>
		
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Principal</h1>
			</section>
			<section class="content">
				
				<!-- INICIO SMALL BOXES -->
				<div class="row">
					
					<?php
						
						if ($_SESSION["rol"] == "administrador"){
							
							$tabla = "usuario"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Usuarios"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-user-alt"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "personarol"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Personas Roles"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-user-cog"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "rol"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Roles"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-user-circle"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "persona"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Personas"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-user-friends"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "medico"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Médicos"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-user-md"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "medicoespecialidad"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Médicos Especialidades"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-stethoscope"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "especialidad"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Especialidades"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-briefcase-medical"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "farmaco"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Fármacos"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-tablets"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "historiaclinica"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Historias Clínicas"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-user-friends"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "historiaclinicadiagnostico"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Historias Clínicas Diagnósticos"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-book-medical"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "diagnostico"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Diagnósticos"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-comment-medical"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "receta"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Recetas"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-file-medical"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "recetafarmaco"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Recetas Fármacos"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-pills"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
							$tabla = "examen"; // (1) NOMBRE DE TABLA EN MYSQL
							$nombre = "Exámenes"; // (2) NOMBRE DE TABLA EN PLURAL
							$color = "bg-aqua"; // (3) COLOR DE LA CAJA (VER COLORES EN CONFIG)
							$icono = '<i class="fas fa-microscope"></i>'; // (4) ICONO DE LA TABLA
							require_once("../modelo/Varios.php");
							$res = Varios::leerFilasTabla(DB_NAME, $tabla);
							echo "<div class='col-lg-3 col-xs-6'><div class='small-box ".$color."'>";
							echo "<div class='inner'><h3>".$res->TABLE_ROWS."</h3><p>".$nombre."</p></div><div class='icon'>".$icono."</div>";
							echo "<a href='".$tabla."-read.php' class='small-box-footer'>Más información <i class='fa fa-arrow-circle-right'></i></a>";
							echo "</div></div>";
							
						}
						
					?>
					
				</div>
				<!-- FIN SMALL BOXES -->
				
				
				
				<!-- INICIO FILA -->
				<div class="row">
					<div class="col-md-6">
						
						
						<!-- INICIO BOX -->
						<div class="box box-primary"> 
							<div class="box-header with-border">
								<h3 class="box-title">Usuario logeado</h3>
							</div>
							<div class="box-body">
								<?php echo "<table class='table table-condensed' style='width:100%'>"; ?>
								<?php echo "<tr><th class='pull-right'>ROL:</th><td>".$_SESSION["rol"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>ID USUARIO:</th><td>".$_SESSION["id_usuario"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>NOMBRE:</th><td>".$_SESSION["nombre_per"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>APELLIDO:</th><td>".$_SESSION["apellido_per"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>CÉDULA:</th><td>".$_SESSION["cedula_per"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>EMAIL:</th><td>".$_SESSION["email_per"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>TELÉFONO:</th><td>".$_SESSION["telefono_per"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>DIRECCIÓN:</th><td>".$_SESSION["direccion_per"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>CIUDAD DE RESIDENCIA:</th><td>".$_SESSION["ciudadresi_per"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>FECHA DE NACIMIENTO:</th><td>".$_SESSION["fechanaci_per"]."</td></tr>"; ?>
								<?php echo "<tr><th class='pull-right'>GÉNERO:</th><td>".$_SESSION["genero_per"]."</td></tr>"; ?>
								<?php echo "</table>"; ?>
							</div> 
							<div class="box-footer">
								<!-- <button type="submit" class="btn btn-primary">Button</button> -->
							</div>
						</div> 
						<!-- FIN BOX -->
						
						
					</div> 
					<div class="col-md-6">
						
						
					<!-- INICIO BOX -->
					<div class="box box-primary"> 
					<div class="box-header with-border">
					<h3 class="box-title">Hospital Nuestra Familia</h3>
					</div>
					<div class="box-body">
					<p>Hospital Nuestra Familia, es una institución que brinda atención de salud especializada a través de estándares nacionales e internacionales a los usuarios que acuden a sus citas médicas, dentro de instalaciones modernas con equipamiento y tecnología de punta a fin de garantizar la salud de los pacientes.</p> 
					</div> 
					<div class="box-footer">
					<!-- <button type="submit" class="btn btn-primary">Button</button> -->
					</div>
					</div> 
					<!-- FIN BOX -->
					
					
					</div> 
					</div> 
					<!-- FIN FILA -->
					
					
					</section>
					</div>
					
					<?php
					}else{
					require_once("noacceso.php");
					}
					require_once("footer.php");
					?>
					
					<script type="text/javascript">
					</script>
					
					<?php 
					}
					ob_end_flush();
					?>																