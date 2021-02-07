<li class="header">MENÚ</li>

<?php
	if ($_SESSION["rol"] == "administrador"){
	?>
	
	<li><a href="principal.php"><i class="fas fa-home"></i> <span>Principal</span></a></li>
	
	<li class="treeview">
		<a href="#">
			<i class="fas fa-user"></i> <span>Usuarios</span>
			<span class="pull-right-container">
				<i class="fas fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li><a href="rol-read.php"><i class="fas fa-user-circle"></i> <span>Roles</span></a></li>
			<li><a href="usuario-read.php"><i class="fas fa-user-alt"></i> <span>Usuarios</span></a></li>
			<li><a href="persona-read.php"><i class="fas fa-user-friends"></i> <span>Personas</span></a></li>
			<li><a href="personarol-read.php"><i class="fas fa-user-cog"></i> <span>Personas Roles</span></a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#">
			<i class="fas fa-user-md"></i> <span>Médicos</span>
			<span class="pull-right-container">
				<i class="fas fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li><a href="medico-read.php"><i class="fas fa-user-md"></i> <span>Médicos</span></a></li>
			<li><a href="medicoespecialidad-read.php"><i class="fas fa-stethoscope"></i> <span>Médicos Especialidades</span></a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#">
			<i class="fas fa-file-medical"></i> <span>Recetas</span>
			<span class="pull-right-container">
				<i class="fas fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li><a href="receta-read.php"><i class="fas fa-file-medical"></i> <span>Recetas</span></a></li>
			<li><a href="recetafarmaco-read.php"><i class="fas fa-pills"></i> <span>Recetas Fármacos</span></a></li>
		</ul>
	</li>
	
	<li class="treeview">
		<a href="#">
			<i class="fas fa-laptop-medical"></i> <span>Historias Clínicas</span>
			<span class="pull-right-container">
				<i class="fas fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
			<li><a href="historiaclinica-read.php"><i class="fas fa-laptop-medical"></i> <span>Historial</span></a></li>
			<li><a href="historiaclinicadiagnostico-read.php"><i class="fas fa-book-medical"></i> <span>Historial Diagnósticos</span></a></li>
		</ul>
	</li>
	
	<li><a href="diagnostico-read.php"><i class="fas fa-comment-medical"></i> <span>Diagnósticos</span></a></li>
	<li><a href="especialidad-read.php"><i class="fas fa-briefcase-medical"></i> <span>Especialidades</span></a></li>
	<li><a href="examen-read.php"><i class="fas fa-microscope"></i> <span>Exámenes</span></a></li>
	<li><a href="farmaco-read.php"><i class="fas fa-tablets"></i> <span>Fármacos</span></a></li>
	<li><a href="agendamiento-read.php"><i class="fas fa-book"></i> <span>Citas Médicas</span></a></li>
	
	<?php
	}
?>



<?php
	if ($_SESSION["rol"] == "cliente"){
	?>
	
	<li><a href="principal.php"><i class="fas fa-home"></i> <span>Principal</span></a></li>
	<li><a href="paciente-read.php"><i class="fas fa-user-circle"></i> <span>Pacientes</span></a></li>
	<li><a href="agendamiento-read.php"><i class="fas fa-book"></i> <span>Citas Médicas</span></a></li>
	<li><a href="historiaclinica-read.php"><i class="fas fa-laptop-medical"></i> <span>Historial</span></a></li>
	<li><a href="examen-read.php"><i class="fas fa-microscope"></i> <span>Exámenes</span></a></li>
	<li><a href="receta-read.php"><i class="fas fa-file-medical"></i> <span>Recetas</span></a></li>
	
	<?php
	}
?>



<?php
	if ($_SESSION["rol"] == "medico"){
	?>
	
	<li><a href="principal.php"><i class="fas fa-home"></i> <span>Principal</span></a></li>
	<li><a href="historiaclinica-read.php"><i class="fas fa-comment-medical"></i> <span>Historial</span></a></li>	
	<li><a href="agendamiento-read.php"><i class="fas fa-book"></i> <span>Citas Médicas</span></a></li>
	<li><a href="examen-read.php"><i class="fas fa-microscope"></i> <span>Exámenes</span></a></li>
	<li><a href="historiaclinicadiagnostico-read.php"><i class="fas fa-book-medical"></i> <span>Diagnósticos</span></a></li>
	
	<?php
	}
?>