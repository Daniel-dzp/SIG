<?php include("session.php");

	$_SESSION['menu']="home";
	$_SESSION['curso.menu.actual'] = 1;
	?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-generales.css">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<title>Home</title>
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
					<div class="alert alert-dismissible alert-warning">
						El curso no existe
					</div>
	<?php
					break;
				case 3:
	?>
					<div class="alert alert-dismissible alert-warning">
						Ya esta subscrito al curso
					</div>
	<?php
					break;
				case 4:
	?>
					<div class="alert alert-dismissible alert-success">
						Suscrito al curso correctamente
					</div>
	<?php
			endswitch;
		endif;
	?>
	<br/>
	<div class="container-fluid">
		<div class="row" id="idCursos">
			<!--<?php
				$db = new MySQL();
				$db->cursosAlumno($_SESSION['correo']);
				for($i=0;$i<$db->filas;$i++):
					$curso = $db->getRegistro();
			?>
				<div class="col-sm-3">
						<div class="card border-success mb-3">
							<div class="card-header curso-cabecera">
								<form method="post" action="curso.php">
									<input type="hidden" name="clave" value="<?=$curso['clave']?>">
									<button type="submit">
										<img src="../img/grupo.png" style="width: 24px;"/>
										<?=$curso['curso']?>
									</button>
								</form>
							</div>
							<div class="card-body">
								<p class="card-text"><img src="../img/maestro.png"> <?=$curso['maestro']?></p>
								<p class="card-text"><img src="../img/clave.png"> <?=$curso['clave']?></p>
								
								<span class="card-title" style="float: left; color: #aaa;font-size: 10px;"> <?=$curso['fecha']?></span>
								<img src="../img/grafica.png" style="position: absolute; bottom:25px; right: 25px;">
							</div>
						</div>
				</div>
			<?php
				endfor;
			?>-->
		</div>
	</div>
	
	<?php include('pie-pagina.php')?>
</body>
</html>
<script>
	ajaxCursos(0);
	function ajaxCursos(no_pagina)
	{
		var parametros = {
			"no_pagina": no_pagina,
		};
		
		$.ajax({
			data: parametros, //datos que se envian a traves de ajax
			url: 'cursos.php', //archivo que recibe la peticion
			type: 'post', //método de envio
			beforeSend: function() {
				//$("#idCursos").html("Procesando, espere por favor...");
			},
			success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				$("#idCursos").html(response);
			}
		});
	}
</script>