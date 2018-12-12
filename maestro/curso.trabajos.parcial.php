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

	$clave = $_POST['clave'];
	$no_parcial = $_POST['no_parcial'];


?>
	<div>
		<table class="table table-bordered">
			<thead>
				<tr>

					<th style="padding: 2px" scope="col">
						NOMBRE
					</th>
					<?php
						$db = new MySQL();

						$consulta = "select a.id_actividad, a.nombre, a.valor_parcial, a.descripcion
									from curso c inner join actividad a on c.clave=a.clave
									where a.no_parcial = $no_parcial and a.clave='$clave'";
						$db->consulta($consulta);
						$idActividades = array();

						for($i=0;$i<$db->filas;$i++):
							$registro = $db->getRegistro();
							$idActividades[$i] = $registro['id_actividad'];
					?>
							<th style="padding: 2px" scope="col" >
								<span  class="texto-vertical" data-toggle="tooltip" data-placement="top" title="<?=$registro['nombre']?> - Valor: <?=$registro['valor_parcial']?>">
									<?=$registro['nombre']?>
								</span>
							</th>
					<?php
						endfor;
					?>
					<th style="padding: 2px" scope="col">CALIFICACION</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$db = new MySQL();

					$consulta = "select concat(a.apaterno,' ',a.amaterno,' ',a.nombre) as nombre, a.correo ";
					for($i=0;$i<count($idActividades);$i++)
					{
						$consulta .= "
						, (select concat('../data/alumnos/',correo,'/actividades/',archivo) from entrega where id_actividad='".$idActividades[$i]."' and correo=a.correo) as archivo$i
						, (select calificacion from entrega where id_actividad='".$idActividades[$i]."' and correo=a.correo) as calificacion$i
						, (select id_entrega from entrega where id_actividad='".$idActividades[$i]."' and correo=a.correo) as id$i";
					}
					$consulta .= " from alumno a inner join alumno_curso ac on a.correo=ac.correo 
									where ac.clave = '$clave' order by 1";

					//$consulta = "select concat(a.apaterno,' ',a.amaterno,' ',a.nombre) as nombre
					//			from alumno a inner join alumno_curso ac on a.correo=ac.correo
					//			where ac.clave = '$clave' order by 1";
					//echo $consulta;
					$db->consulta($consulta);

					for($i=0;$i<$db->filas;$i++):
						$calificacion = 0;
						$registro = $db->getRegistro();
				?>
					<tr class="small">
						<th style="padding: 2px" scope="row">
							<img src="../img/guardar.png" class="guardar" onclick="cursoCalificarActualizar(<?=$no_parcial?>,<?=$i?>, <?=count($idActividades)?>);" data-toggle="tooltip" data-placement="top" title="Guardar"/>
							<?=$registro['nombre']?>
						</th>
						<?php
							for($j=0;$j<count($idActividades);$j++):
						?>

						<th style="padding: 2px" scope="row">
							<input type="hidden" id="idEntrega<?=$no_parcial?><?=$i?><?=$j?>" value="<?=$registro['id'.$j]?>">
							<?php
								if($registro['archivo'.$j] > ''):
									$calificacion += intval($registro['calificacion'.$j]);
							?>
								<a href="<?=$registro['archivo'.$j]?>"  target="_blank" data-toggle="tooltip" data-placement="top" title="Ver">
									<img src="../img/documento.png" class="guardar">
								</a>
								<input type="number" id="idActividadValor<?=$no_parcial?><?=$i?><?=$j?>" value="<?=$registro['calificacion'.$j]?>" min="0" style="width: 40px;"/>
							<?php
								else:
							?>	
								<img src="../img/null.png" class="null" data-toggle="tooltip" data-placement="top" title="Evidencia no entregada"/>
							<?php
								endif;
							?>	
						</th>
					
						<?php
							endfor;
						?>
						<th style="padding: 2px" scope="row">
							<input type="text" value="<?=$calificacion?>" readonly style="width: 40px;"/>
						</th>
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