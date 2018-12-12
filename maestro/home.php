<?php
	include("session.php");

	$_SESSION['menu']="home";
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos-generales.css">
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/funciones.js"></script>
	<title>Home</title>
</head>
<body>
	<?php include('cabecera.php')?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-4">
				<br/>
				<table class="table table-dark table-striped table-hover">
					<thead>
						<tr style="text-align: center;">
							<th colspan="5">
								<img src="../img/actualizar.png" class="actualizar" onclick="ajaxCursos();" />
								<img src="../img/agregar.png" class="curso-alumnos-agregar" onclick="cursoAgregarMostrar();" />
								<b>Cursos</b>
							</th>
						</tr>
						<tr>
							<th style="padding: 4px" scope="col">NO</th>
							<th style="padding: 4px" scope="col">CLAVE</th>
							<th style="padding: 4px" scope="col">NOMBRE</th>
							<th style="padding: 4px" scope="col">FECHA</th>
							<th style="padding: 4px" scope="col">ALUMNOS</th>
						</tr>
					</thead>
					<tbody  id="idCursos">
					</tbody>
				</table>
			</div>
			<div class="col-sm-8" id="idPanel">
				<div>
					<hr/>
					<h5 class="text-white bg-dark" style="text-align: center; padding: 10px;"><img src="../img/curso.png" style="width: 24px;" > <b id="idTitulo">Curso</b></h5>
					<hr/>
					<ul class="nav nav-pills nav-justified text-white-50 bg-dark">
						<li class="nav-item">
							<a class="nav-link  active show text-white bg-dark" data-toggle="tab" href="#trabajos" onclick="ajaxTrabajos();">
							Trabajos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white bg-dark" data-toggle="tab" href="#calificar" onclick="ajaxTrabajosParcial(1);">Calificar</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white bg-dark" data-toggle="tab" href="#recursos" onclick="ajaxRecursos();">Recursos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white bg-dark" data-toggle="tab" href="#alumnos" onclick="ajaxPersonas();">Alumnos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white bg-dark" data-toggle="tab" href="#idAvisos" onclick="ajaxAvisos();">Avisos</a>
						</li>
					</ul>

					<input type="hidden" name="clave" id="idClave" value="">
					<hr/>
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane fade show active " id="trabajos">
						</div>
						<div class="tab-pane fade" id="calificar">
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link  active show" data-toggle="tab" href="#parcial1" onclick="ajaxTrabajosParcial(1)">PARCIAL 1</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#parcial2" onclick="ajaxTrabajosParcial(2)">PARCIAL 2</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#parcial3" onclick="ajaxTrabajosParcial(3)">PARCIAL 3</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#parcial4" onclick="ajaxTrabajosParcial(4)">PARCIAL 4</a>
								</li>
							</ul>
							<div id="" class="tab-content">
								<div class="tab-pane fade show active" id="parcial1">
								</div>
								<div class="tab-pane fade" id="parcial2">
								</div>
								<div class="tab-pane fade" id="parcial3">
								</div>
								<div class="tab-pane fade" id="parcial4">
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="recursos">
						</div>
						<div class="tab-pane fade" id="alumnos">
						</div>
						<div class="tab-pane fade" id="idAvisos">
						</div>
					</div>

				</div>
			</div>
			
		</div>
	</div>

<div class="modal fade" id="idCursoAgregar">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">CREAR CURSO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="curso.crear.php" enctype="multipart/form-data">
					<label class="col-form-label col-form-label-sm">Nombre</label>
					<input type="text" name="nombre" class="form-control form-control-sm" required>
					<label class="col-form-label col-form-label-sm">Clave</label>
					<input type="text" name="clave" class="form-control form-control-sm" required>
					<br/>
					<button class="btn btn-primary" name="subir">Crear</button>
				</form>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="idRecursoAgregar">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">AGREGAR RECURSO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="curso.descargas.agregar.php" enctype="multipart/form-data">
					<label class="col-form-label col-form-label-sm">Archivo</label>
					<input type="file" name="documento" class="form-control-file form-control-file-sm" required>
					<label class="col-form-label col-form-label-sm">Descripcion</label>
					<textarea name="descripcion" class="form-control"></textarea>

					<input type="hidden" id="idRecursoClave" name="clave" value="">
					<br/>
					<button class="btn btn-primary" name="subir">Agregar</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="idTrabajoAgregar">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">AGREGAR TRABAJO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<label class="col-form-label col-form-label-sm">Nombre</label>
					<input type="text" id="idTrabajoNombre" name="nombre" class="form-control form-control-sm" required>
					<label class="col-form-label col-form-label-sm">Descripcion</label>
					<textarea  id="idTrabajoDescripcion" name="descripcion" class="form-control" required></textarea>
					<label class="col-form-label col-form-label-sm">No parcial</label>
					<select id="idTrabajoNoParcial" name="no_parcial" class="form-control">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
					</select>
					<label class="col-form-label col-form-label-sm">Valor</label>
					<input type="number" id="idTrabajoValor" name="valor" class="form-control form-control-sm" required>
					<label class="col-form-label col-form-label-sm">Fecha de finalizado</label>
					<input type="date" id="idTrabajoFechaFinaliza" name="fecha_finaliza" class="form-control form-control-sm" required>
					
				</form>
				<br/>
				<button class="btn btn-primary" name="subir" data-dismiss="modal" onclick="ajaxTrabajoAgregar();">Agregar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="idTrabajoActualizar" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">ACTUALIZAR TRABAJO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ajaxTrabajoActualizar();">Actualizar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="idTrabajoEliminar" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">ELIMINAR TRABAJO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ajaxTrabajoEliminar();">Eliminar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="idRecursoEliminar" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">ELIMINAR RECURSO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ajaxRecursosEliminar();">Eliminar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="idCalificarActualizar" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">ACTUALIZAR CALIFICACIONES</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ajaxCalificacionesActualizar();">Actualizar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="idAvisoEliminar" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">ELIMINAR AVISO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ajaxAvisoEliminar();">Eliminar</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="idAvisoAgregar" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">AGREGAR AVISO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="ajaxAvisoAgregar();">Agregar</button>
			</div>
		</div>
	</div>
</div>

<div id="dzp">
	
</div>

	<?php include('pie-pagina.php')?>
</body>
</html>

