<?php
	include("session.php");

	if(!isset($_POST['no_parcial']))
		exit();
	if($_POST['no_parcial'] == '')
		exit();

	$no_parcial = $_POST['no_parcial'];
	$correo = $_POST['correo'];
	$clave = $_POST['clave'];

	$_SESSION['curso.menu.actual'] = 1;
?>

<?php
	$db = new MySQL();
	$consulta = "select  a.*,
					if(now() between fecha_inicio and fecha_finaliza, 0,1) as finalizo_entrega,
					(select id_entrega from entrega where correo='$correo' and id_actividad=a.id_actividad) as id_entrega,
					(select archivo from entrega where correo='$correo' and id_actividad=a.id_actividad) as archivo,
					(select fecha from entrega where correo='$correo' and id_actividad=a.id_actividad) as fecha_entrega
				from curso c inner join actividad a on c.clave=a.clave
				where c.clave='$clave' and a.no_parcial=$no_parcial order by a.fecha_inicio asc";
	$db->consulta($consulta);

?>
<table class="table table-striped">
		<thead>
			<tr class="bg-info text-white">
				<th scope="col">Nombre</th>
				<th scope="col">Fechas</th>
				<th scope="col">Archivo</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
<?php
	for($i=0;$i<$db->filas;$i++):
		$registro = $db->getRegistro();
?>				
			<tr  style="padding: 2px;">
				<th scope="row" style="padding: 2px;">
					<?=$i+1?>.
					<?=$registro['nombre']?>
				</th>
				<td style="padding: 2px;">
					<span style="color: black; font-size: 8px;">
						<?=$registro['fecha_inicio']?> - <?=$registro['fecha_finaliza']?>
					</span>
				</td>

				<td style="padding: 2px;">
					<?php
						if(isset($registro['fecha_entrega'])):
					?>
						<a href="../data/alumnos/<?=$_SESSION['correo']?>/actividades/<?=$registro['archivo']?>" target="_blank">
							<?=$registro['archivo']?>
						</a>
					<?php
						else:
					?>
						-
					<?php
						endif;
					?>
				</td>

				<td style="padding: 2px;">
					<?php
						if(isset($registro['fecha_entrega'])):
					?>
						<button class="btn btn-danger btn-sm" onclick="eliminarArchivo(<?=$registro['id_entrega']?>);" style="margin:0px; padding: 2px; border:1px;">Eliminar</button>
					<?php
						else:
							if($registro['finalizo_entrega']==0):
					?>
								<button class="btn btn-success btn-sm" onclick="subirArchivo(<?=$registro['id_actividad']?>);" style="margin:0px; padding: 2px; border:1px;">Entregar</button>
					<?php
							endif;
						endif;
					?>
				</td>
			</tr>
<?php
	endfor;
?>
		</tbody>
	</table>