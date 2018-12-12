<?php include("session.php"); $_SESSION['menu']="perfil";?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-generales.css">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<title>Perfil</title>
</head>
<body>
	<?php include('cabecera.php')?>
	
	<?php
		if(isset($_GET['m'])):
			switch ($_GET['m']):
				case 1:
	?>
					<div class="alert alert-dismissible alert-warning">
						Credenciales no enviadas
					</div>
	<?php
					break;
				case 2:
	?>
					<div class="alert alert-dismissible alert-success">
						Datos guardados
					</div>
	<?php
			endswitch;
		endif;
	?>
	<br/>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10 " class="" style="background: white;">
				<br/>
				<div class="row">
					<div class="col-sm-1"></div>
					<div class="col-sm-2">
						<img src="../data/perfil.jpg" style="width: 120px; border:2px solid orange; border-radius: 4px;">
					</div>
					<div class="col-sm-8" style="text-align: left;">
						<br/>
						<h5><b><?=$_SESSION['nombre']?></b></h5>
						<h5><b><?=$_SESSION['correo']?><b/></h5>
					</div>
					<div class="col-sm-1"></div>

				</div>
				<br/>
				<hr/>
				<br/>
				<?php
					$db = new MySQL();
					$consulta = "select * from alumno where correo='".$_SESSION['correo']."'";
					$db->consulta($consulta);

					$regitro = $db->getRegistro();
				?>
				<form method="post" action="perfil.actualizar.php">
					<div class="row">		
						<div class="col-sm-1"></div>
						<div class="col-sm-5">
							<label for="idNombre" class="col-form-label col-form-label-sm">Nombre</label><br>
								<input type="text" id="idNombre" name="nombre" class="form-control form-control-sm" required autocomplete="off" value="<?=$regitro['nombre']?>" />
								<label for="idApaterno" class="col-form-label col-form-label-sm">Apellido paterno</label><br>
								<input type="text" id="idApaterno" name="apaterno" class="form-control form-control-sm" required autocomplete="off" value="<?=$regitro['apaterno']?>"/>
								<label for="idAmaterno" class="col-form-label col-form-label-sm">Apellido materno</label><br>
								<input type="text" id="idAmaterno" name="amaterno" class="form-control form-control-sm" required  autocomplete="off" value="<?=$regitro['amaterno']?>"/>
								
						</div>
						<div class="col-sm-5">
							<label for="idCorreo" class="col-form-label col-form-label-sm">Correo</label><br>
							<input type="email" id="idCorreo" name="correo" class="form-control form-control-sm" required autocomplete="off" value="<?=$regitro['correo']?>"/>
							<label for="idClave" class="col-form-label col-form-label-sm">Clave</label><br>
							<input type="text" id="idClave" name="clave" class="form-control form-control-sm" autocomplete="false"/>
						</div>
						<div class="col-sm-1"></div>
					</div>
					<br/>
					<div class="row">
						<div class="col-sm-12" style="text-align:center;">
							<button type="submit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
					<br/>
				</form>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>

	<?php include('pie-pagina.php')?>
</body>
</html>