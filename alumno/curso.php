<?php include("session.php");
	
	if(isset($_POST['clave']))
	{
		$_SESSION['clave_curso'] = $_POST['clave']; 
	}

	$_SESSION['menu']="curso";
	$_SESSION['curso.menu']="";

	$correo = $_SESSION['correo'];
	$clave = $_SESSION['clave_curso'];
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-generales.css">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<title>Perfil</title>
</head>

<body onload="inicio('<?=$clave?>')">
	<?php include('cabecera.php')?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2" style="padding: 0px; border: 0px;">
				<ul class="nav nav-pills flex-column " role="tablist" aria-orientation="vertical" style="background:white;">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#idTrabajos">
							<img src="../img/tarea.png">
							Trabajos
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#idCalificaciones">
							<img src="../img/calificaciones.png">
							Calificaciones
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#idRecursos" onclick="ajaxDescargas();">
							<img src="../img/descarga.png">
							Recursos
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#idAlumnos" onclick="ajaxAlumnos();">
							<img src="../img/grupo.png">
							Alumnos
						</a>
					</li>
				</ul>
			</div>
			<div class="col-sm-8">
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade show active curso-panel" id="idTrabajos">

						<div class="bg-info text-white" style="padding:6px;">
							<h5 style="text-align: center;">
								<img src="../img/tarea.png" style="width: 24px;">
								<b>Tareas</b>
							</h5>
						</div>
						<ul class="nav nav-tabs nav-fill">
							<li class="nav-item">
								<a class="nav-link active show" data-toggle="tab" href="#idTareasParcial1" onclick="ajaxTrabajosParcialAlumno(1, 'idTareasParcial1', '<?=$correo?>', '<?=$clave?>');">PARCIAL 1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#idTareasParcial2" onclick="ajaxTrabajosParcialAlumno(2, 'idTareasParcial2','<?=$correo?>', '<?=$clave?>');">PARCIAL 2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#idTareasParcial3" onclick="ajaxTrabajosParcialAlumno(3, 'idTareasParcial3','<?=$correo?>', '<?=$clave?>');">PARCIAL 3</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#idTareasParcial4" onclick="ajaxTrabajosParcialAlumno(4, 'idTareasParcial4','<?=$correo?>', '<?=$clave?>');">PARCIAL 4</a>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade show active" id="idTareasParcial1">
							</div>

							<div class="tab-pane fade" id="idTareasParcial2">
							</div>

							<div class="tab-pane fade" id="idTareasParcial3">
							</div>

							<div class="tab-pane fade" id="idTareasParcial4">
							</div>
						</div>
					</div>
					<div class="tab-pane fade curso-panel" id="idCalificaciones">
						<div class="bg-info text-white" style="padding:6px;">
							<h5 style="text-align: center;">
								<img src="../img/calificaciones.png" style="width: 24px;">
								<b>Calificaciones</b>
							</h5>
						</div>
						<ul class="nav nav-tabs nav-fill">
							<li class="nav-item">
								<a class="nav-link active show " data-toggle="tab" href="#idCalificacionGeneral" onclick="ajaxCalificacionesGenerales('idCalificacionGeneral', '<?=$clave?>', '<?=$correo?>')">GENERAL</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#idCalificacionParcial1" onclick="ajaxCalificaciones('idCalificacionParcial1', 1, '<?=$clave?>', '<?=$correo?>');">PARCIAL 1</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#idCalificacionParcial2" onclick="ajaxCalificaciones('idCalificacionParcial2', 2, '<?=$clave?>', '<?=$correo?>');">PARCIAL 2</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#idCalificacionParcial3" onclick="ajaxCalificaciones('idCalificacionParcial3', 3, '<?=$clave?>', '<?=$correo?>');">PARCIAL 3</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#idCalificacionParcial4" onclick="ajaxCalificaciones('idCalificacionParcial4', 4, '<?=$clave?>', '<?=$correo?>');">PARCIAL 4</a>
							</li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div class="tab-pane fade show active" id="idCalificacionGeneral">
							</div>
							<div class="tab-pane fade" id="idCalificacionParcial1">
							</div>

							<div class="tab-pane fade" id="idCalificacionParcial2">
							</div>

							<div class="tab-pane fade" id="idCalificacionParcial3">
							</div>

							<div class="tab-pane fade" id="idCalificacionParcial4">
							</div>
						</div>
					</div>
					<div class="tab-pane fade curso-panel" id="idRecursos">
					</div>
					<div class="tab-pane fade curso-panel" id="idAlumnos">
					</div>
				</div>
			</div>
			<div class="col-sm-2" id="idAvisos" style="margin: 0px; padding: 0px;"></div>
		</div>
	</div>

	<?php include('pie-pagina.php')?>

	<div class="modal" id="idEntregarEvidencia">
		<div class="modal-dialog card border-success mb-3" role="document">
			<div class="modal-content">
				<div class="modal-header card-header">
					<h5 class="modal-title">Entregar Evidencia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="curso.tareas.entregar.php" enctype="multipart/form-data">
						<label class="col-form-label col-form-label-sm">Archivo</label>
						<input type="file" name="documento" class="form-control-file form-control-file-sm" required>
						<input type="hidden" name="correo" value="<?=$_SESSION['correo']?>">
						<input type="hidden" id="idActividad" name="id_actividad" value="">
						<br />
						<button class="btn btn-primary" name="subir">Entregar</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal" id="idEliminarEvidencia">
		<div class="modal-dialog card border-success mb-3" role="document">
			<div class="modal-content">
				<div class="modal-header card-header">
					<h5 class="modal-title">Eliminar Evidencia</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" action="curso.tareas.eliminar.php">
						<input type="hidden" id="idEntrega" name="id_entrega" value="">
						<input type="hidden" name="correo" value="<?=$_SESSION['correo']?>">
						<br />
						<button class="btn btn-primary" name="subir">Eliminar</button>
					</form>
				</div>
			</div>
		</div>
	</div>


</body>

</html>
<script>
	function inicio(clave)
	{
		ajaxAvisos(clave);
		//ajaxCalificacionesGenerales('idCalificacionGeneral', '<?=$clave?>', '<?=$correo?>');
	}

	function ajaxAvisos(clave)
	{
		var parametros = {
			"clave": clave
		};
		
		$.ajax({
			data: parametros, //datos que se envian a traves de ajax
			url: 'curso.avisos.php', //archivo que recibe la peticion
			type: 'post', //método de envio
			beforeSend: function() {
				//$("#idAvisos").html("Procesando, espere por favor...");
			},
			success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				$("#idAvisos").html(response);
			}
		});
	}

	function ajaxCalificaciones(id, no_parcial, clave, correo)
	{
		ajaxAvisos(clave);

		var parametros = {
			"no_parcial": no_parcial,
			"correo": correo,
			"clave": clave
		};
		
		$.ajax({
			data: parametros, //datos que se envian a traves de ajax
			url: 'curso.calificaciones.php', //archivo que recibe la peticion
			type: 'post', //método de envio
			beforeSend: function() {
				$("#" + id).html("Procesando, espere por favor...");
			},
			success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				$("#" + id).html(response);
			}
		});
	}
	
	function ajaxCalificacionesGenerales(id, clave, correo)
	{
		ajaxAvisos(clave);

		var parametros = {
			"correo": correo,
			"clave": clave
		};
		
		$.ajax({
			data: parametros, //datos que se envian a traves de ajax
			url: 'curso.calificaciones.generales.php', //archivo que recibe la peticion
			type: 'post', //método de envio
			beforeSend: function() {
				$("#" + id).html("Procesando, espere por favor...");
			},
			success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				$("#" + id).html(response);
			}
		});
	}

	function ajaxTrabajosParcialAlumno(no_parcial, id, correo, clave) {
		ajaxAvisos(clave);

		var parametros = {
			"no_parcial": no_parcial,
			"correo": correo,
			"clave": clave
		};
		$.ajax({
			data: parametros, //datos que se envian a traves de ajax
			url: 'tarea.php', //archivo que recibe la peticion
			type: 'post', //método de envio
			beforeSend: function() {
				$("#" + id).html("Procesando, espere por favor...");
			},
			success: function(response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
				$("#" + id).html(response);
			}
		});
	}


	function ajaxDescargas() {
		var xmlhttp;

		xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("idRecursos").innerHTML = xmlhttp.responseText;
			}
		}

		xmlhttp.open("GET", "curso.descargas.php", true);
		xmlhttp.send();
	}

	function ajaxAlumnos() {
		var xmlhttp;
		//document.getElementById("idMenuPersonas").style. = xmlhttp.responseText;

		xmlhttp = new XMLHttpRequest();

		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("idAlumnos").innerHTML = xmlhttp.responseText;
			}
		}

		xmlhttp.open("GET", "curso.alumnos.php", true);
		xmlhttp.send();
	}

</script>
<script>
	function subirArchivo(id) {
		$('#idActividad').val(id);
		$("#idEntregarEvidencia").modal();

	}

	function eliminarArchivo(id) {
		$('#idEntrega').val(id);
		$("#idEliminarEvidencia").modal();

	}
</script>
