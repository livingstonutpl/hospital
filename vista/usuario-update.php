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
			<section class="content">
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Actualizar Usuario</h3>
					</div>

					<!-- <?php
						if(isset($_GET["id_usuario"]) and !empty($_GET["id_usuario"])){
							require_once("../modelo/Usuario.php");
							$id_usuario = Connection::sanitize($_GET["id_usuario"]);
							$res = usuario::single_row($id_usuario);
						}
					?> -->

					<form action="#" class="form-horizontal" method="POST" enctype="multipart/form-data">
						<div class="box-body">

							<input type="hidden" name="token" value="<?php echo $_SESSION["token"]; ?>">

							<div class="form-group">
								<label class="col-sm-2 control-label">Id:</label>
								<div class="col-sm-10">
									<input type="text" name="id_usuario" value="<?php echo $res->id_usuario;?>" class="form-control" readonly>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Usuario:</label>
								<div class="col-sm-10">
									<input type="text" name="nombre_usu" value="<?php echo $res->nombre_usu;?>" class="form-control" required autofocus>
								</div>
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Password:</label>
								<div class="col-sm-10">
									<input type="password" name="password_usu" value="<?php echo $res->password_usu;?>" class="form-control" required>
								</div>
							</div>

						</div>
						<div class="box-footer">
							<button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Actualizar</button>
							<a class="btn btn-info" href="usuario-read.php" role="button"><i class="fas fa-times"></i> Cancelar</a>
						</div>
					</form>
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
		require_once("../controlador/ControladorUsuario.php");
		ControladorUsuario::update();
	?>

	<?php
	}
	ob_end_flush();
?>
