<?php
	session_start();
	session_destroy();

	$activarMenu = 'acceso';
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/estilos-generales.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<?php include('cabecera.php')?>

	<br/><br/><br/><br/><br/>

	<section>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<?php
						if(isset($_GET['m']))
						{
							switch ($_GET['m'])
							{
								case '1':
									echo '<div class="alert alert-dismissible alert-danger">';
		  							echo 'Las credenciales son requeridas';
									echo '</div>';
									break;
								case '2';
									echo '<div class="alert alert-dismissible alert-danger">';
		  							echo 'Usuario o contraseña erroneas.';
									echo '</div>';
									break;
								case '7':
									echo '<div class="alert alert-dismissible alert-success">';
									echo 'Registro exitoso.';
									echo '</div>';
									break;
							}
							
						}
					?>
					
					
					<div class="card border-dark mb-3 color-fondo" >
						<div class="card-header">
							<img src="img/entrar.png" style="width: 24px;">
							Acceso
						</div>
						<div class="card-body">
							<form action="index.acceder.php" method="post">
								<select class="custom-select custom-select-sm" name="tipo" required>
									<option value="A">Alumno</option>
									<option value="M">Maestro</option>
								</select>
								<label for="idCorreo" class="col-form-label col-form-label-sm">Correo</label>
								<input type="email" name="correo" id="idCorreo" class="form-control form-control-sm" required /><br/>
								<label for="idClave" class="col-form-label col-form-label-sm">
									<img src="img/bloquear.png" style="width: 24px;">
									Clave
								</label>
								<input type="password" name="clave" id="idClave" class="form-control form-control-sm" required /><br/>

								<button type="submit" class="btn btn-dark">Acceder</button>
							</form>
						</div>
					</div>

				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</section>

	<br/><br/><br/><br/><br/>

	<?php include('pie-pagina.php')?>
</body>
</html>
