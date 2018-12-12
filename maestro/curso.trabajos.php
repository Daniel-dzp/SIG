<?php
	include("session.php");
	
	if(!isset($_POST['clave']))
		exit();
	if($_POST['clave'] == '')
		exit();
?>
	<div>
		<table class="table table-bordered">
			<thead>
				<tr class="table-light">
					<th style="padding: 6px" scope="col">
						<img src="../img/agregar.png" class="curso-agregar" data-toggle="tooltip" data-placement="top" title="Nuevo" onclick="cursoTrabajoAgregar();" />
					</th>
					<th style="padding: 6px" scope="col">NOMBRE</th>
					<th style="padding: 6px" scope="col">DESCRIPCION</th>
					<th style="padding: 6px" scope="col">NO PARCIAL</th>
					<th style="padding: 6px" scope="col">FECHA INICIO</th>
					<th style="padding: 6px" scope="col">FECHA FINALIZA</th>
					<th style="padding: 6px" scope="col">VALOR</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$db = new MySQL();

					$consulta = "select * from actividad
								where clave = '".$_POST['clave']."' order by no_parcial, fecha_inicio desc";
					$db->consulta($consulta);

					for($i=0;$i<$db->filas;$i++):
						$registro = $db->getRegistro();
				?>
					<tr class="small">
						<th style="padding: 6px" scope="row">
							<img src="../img/eliminar.png" class="curso-eliminar" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="cursoTrabajoEliminar(<?=$registro['id_actividad']?>);"/>
							<img src="../img/guardar.png" class="curso-guardar" data-toggle="tooltip" data-placement="top" title="Guardar cambios" onclick="cursoTrabajoActualizar(<?=$registro['id_actividad']?>);"/>
						</th>
						<td style="padding: 6px">
							<?=$i+1?>
							<input type="text" id="idTANombre<?=$registro['id_actividad']?>" value="<?=$registro['nombre']?>" style="width: 150px;" data-toggle="tooltip" data-placement="top" title="<?=$registro['nombre']?>">
						</td>
						<td style="padding: 6px">
							<input type="text" id="idTADescripcion<?=$registro['id_actividad']?>" value="<?=$registro['descripcion']?>" style="width: 150px;" data-toggle="tooltip" data-placement="top" title="<?=$registro['descripcion']?>">
						</td>
						<td style="padding: 6px">
							<input type="number" id="idTANoParcial<?=$registro['id_actividad']?>" value="<?=$registro['no_parcial']?>" min="1" max="4" style="width: 40px;" data-toggle="tooltip" data-placement="top" title="No parcial: <?=$registro['no_parcial']?>">
						</td>
						<td style="padding: 6px">
							<input type="date" value="<?=$registro['fecha_inicio']?>" data-toggle="tooltip" data-placement="top" title="<?=$registro['fecha_inicio']?>">
						</td>
						<td style="padding: 6px">
							<input type="date" id="idTAFechaFinaliza<?=$registro['id_actividad']?>" value="<?=$registro['fecha_finaliza']?>" data-toggle="tooltip" data-placement="top" title="<?=$registro['fecha_finaliza']?>">
						</td>
						<td style="padding: 6px">
							<input type="number" id="idTAValorParcial<?=$registro['id_actividad']?>" value="<?=$registro['valor_parcial']?>" min="0" max="100" style="width: 50px;" data-toggle="tooltip" data-placement="top" title="Valor: <?=$registro['valor_parcial']?>">
						</td>
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