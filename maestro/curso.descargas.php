<?php
	include("session.php");
	
	if(!isset($_POST['clave']))
	{
		exit();
	}
	if($_POST['clave'] == '')
	{
		exit();
	}
?>
	<div>
		<table class="table table-bordered">
			<thead>
				<tr class="table-light" >
					<th style="padding: 6px" scope="col" >
						<img src="../img/agregar.png" class="curso-alumnos-agregar" data-toggle="modal" data-target="#idRecursoAgregar" data-toggle="tooltip" data-placement="top" title="Agregar"/>
					</th>
					<th style="padding: 6px" scope="col">NOMBRE</th>
					<th style="padding: 6px" scope="col">DESCRIPCION</th>
					<th style="padding: 6px" scope="col">FECHA</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$db = new MySQL();

					$consulta = "select r.id_recurso,concat('../data/maestros/',m.correo,'/documentos/',r.recurso) as dir, r.descripcion, r.recurso, r.fecha
								from maestro m inner join curso c on m.correo=c.correo
								inner join recurso r on c.clave=r.clave
								where c.clave = '".$_POST['clave']."'";
					$db->consulta($consulta);

					for($i=0;$i<$db->filas;$i++):
						$registro = $db->getRegistro();
				?>
					<tr class="small">
						<th style="padding: 6px" scope="row">
							<img src="../img/eliminar.png" class="curso-alumnos-eliminar" onclick="curso_recurso_eliminar(<?=$registro['id_recurso']?>)"data-toggle="tooltip" data-placement="top" title="Eliminar"/>
							<img src="../img/archivo.png" style="height: 16px;">
						</th>
						<td style="padding: 6px">
							<a href="<?=$registro['dir']?>" target="_blank" >
								<?=$registro['recurso']?>
							</a>
						</td>
						<td style="padding: 6px"><?=$registro['descripcion']?></td>
						<td style="padding: 6px"><?=$registro['fecha']?></td>
					</tr>
				<?php
					endfor;
				?>
			</tbody>
		</table>
	</div>
<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>