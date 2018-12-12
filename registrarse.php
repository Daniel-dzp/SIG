<?php include("tools/mysql.php"); $activarMenu = 'registro'; ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/estilos-generales.css">
</head>
<body>
	<?php include('cabecera.php')?>
	


	<section>
		<div class="container-fluid" on>
			<div class="row"><div class="col-12"></div></div>
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<?php 
						if(isset($_GET['m'])){
							echo '<div class="alert alert-dismissible alert-danger">';
							switch ($_GET['m']) {
								case '1':
									echo '<button type="button" class="close" data-dismiss="alert">&times;</button>
												Error de campos. Llene todos los campos';
									break;
								case '5':
									echo '<button type="button" class="close" data-dismiss="alert">&times;</button>
												Error al conectarse. conexico fallida';
									break;
								case '9':
									echo '<button type="button" class="close" data-dismiss="alert">&times;</button>
												Error al registrar. correo ya esta en uso';
							}
							echo '</div>';
						}
					?>
					<div class="card border-dark mb-3 color-fondo" >
						<div class="card-header">
							<img src="img/registrar.png" style="width: 24px;">
							Registro
						</div>
						<div class="card-body">
							<div class="form-group form-group-sm">
								<label for="idSeleccion">Seleccione</label>
								<select class="custom-select custom-select-sm" id="idSeleccion" required onchange="mostrarFormulario(this.value);">
									<option value="A" >ALUMNO</option>
									<option value="M" >MAESTRO</option>
								</select>
							</div>
								<hr/>
							<form method="post" action="registrarse.registrar.php" id="idFormularioA">
								<label for="idNombre" class="col-form-label col-form-label-sm">Nombre</label><br>
								<input type="text" id="idNombre" name="nombre" class="form-control form-control-sm" required autocomplete="off"/ >
								<label for="idApaterno" class="col-form-label col-form-label-sm">Apellido paterno</label><br>
								<input type="text" id="idApaterno" name="apaterno" class="form-control form-control-sm" required autocomplete="off"/>
								<label for="idAmaterno" class="col-form-label col-form-label-sm">Apellido materno</label><br>
								<input type="text" id="idAmaterno" name="amaterno" class="form-control form-control-sm" required  autocomplete="off"/>
								
								<label for="idCorreo" class="col-form-label col-form-label-sm">Correo</label><br>
								<input type="email" id="idCorreo" name="correo" class="form-control form-control-sm" required autocomplete="off"/><br/>
								<input type="hidden" name="tipo" value="A"/>
								<button type="submit" class="btn btn-dark">Registrar</button>
							</form>

							<form method="post" action="registrarse.registrar.php" id="idFormularioM">
								<label for="idNombreInstitucion" class="col-form-label col-form-label-sm">Nombre Institución</label><br>
								<input type="text" id="idNombreInstitucion" name="nombre_escuela" class="form-control form-control-sm" required autocomplete="off"/ >
								<label for="idNombre" class="col-form-label col-form-label-sm">Nombre</label><br>
								<input type="text" id="idNombre" name="nombre" class="form-control form-control-sm" required autocomplete="off"/ >
								<label for="idApaterno" class="col-form-label col-form-label-sm">Apellido paterno</label><br>
								<input type="text" id="idApaterno" name="apaterno" class="form-control form-control-sm" required autocomplete="off"/>
								<label for="idAmaterno" class="col-form-label col-form-label-sm">Apellido materno</label><br>
								<input type="text" id="idAmaterno" name="amaterno" class="form-control form-control-sm" required  autocomplete="off"/>
								
								<label for="idCorreo" class="col-form-label col-form-label-sm">Correo</label><br>
								<input type="email" id="idCorreo" name="correo" class="form-control form-control-sm" required autocomplete="off"/><br/>
								<input type="hidden" name="tipo" value="M"/>
								<button type="submit" class="btn btn-dark">Registrar</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-sm-4"></div>
			</div>
		</div>
	</section>

	<?php include('pie-pagina.php')?>
</body>
</html>

<script>
	var formA = document.getElementById('idFormularioA');
	var formM = document.getElementById('idFormularioM');
	var selec = document.getElementById('idSeleccion');
	mostrarFormulario(selec.value);

	// funcion para ocultar y mostrar los formularios.
	function mostrarFormulario(valor)
	{
		formA.style.display = "none";
		formM.style.display = "none";
		if(valor == 'A')
			formA.style.display = "block";
		if(valor == 'M')
			formM.style.display = "block";
	}
</script>