<?php
	ob_start();
	session_start();
	if (!isset($_SESSION["sesion"])){
		header("Location: portada.php");
		}else{
		require_once("header.php");
		if ($_SESSION["rol"] == "administrador" or $_SESSION["rol"] == "medico" or $_SESSION["rol"] == "cliente"){
		?>
		
		<?php
			if(isset($_GET["msg"]) and !empty($_GET["msg"])){
				if($_GET["msg"]=="salir"){
					session_start();
					session_unset();
					session_destroy();
					header ("Location: portada.php");
				}
			}
		?>
		
		<div class="content-wrapper">
			<section class="content-header">
				<h1>Salir</h1>
			</section>
			<section class="content">
				<div class="box box-primary"> 
					<div class="box-header with-border">
						<h3 class="box-title">¿Está seguro que desea salir?</h3>
					</div>
					<div class="box-body">
						<a href="logout.php?msg=salir" class="btn btn-primary"><i class="fas fa-power-off"></i> Salir</a>
						<a class="btn btn-info" href="#" onClick="history.back()" role="button"><i class="fas fa-times"></i> Cancelar</a>
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
	
	<script type="text/javascript">
	</script>
	
	<?php 
	}
	ob_end_flush();
?>