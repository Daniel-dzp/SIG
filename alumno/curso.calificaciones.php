<?php
	include("session.php");

	if(!isset($_POST['correo']) || !isset($_POST['clave']) || !isset($_POST['no_parcial']))
		exit();

	$clave = $_POST['clave'];
	$correo = $_POST['correo'];
	$no_parcial = $_POST['no_parcial'];
?>
<div style="margin:10px 20px 40px 20px;">
	<table class="table table-striped">
		<?php
			$db = new MySQL();
			$consulta = "select a.id_actividad, a.nombre, a.valor_parcial
							from curso c inner join actividad a on c.clave=a.clave
							where a.no_parcial = $no_parcial and a.clave='$clave'";
			$db->consulta($consulta);
		
			$noTrabajos = $db->filas;
			$trabajos = array();
		
			for($i=0;$i<$db->filas;$i++):
				$registro = $db->getRegistro();
				$trabajos["id_actividad_".$i] = $registro['id_actividad'];
				$trabajos["nombre_".$i] = $registro['nombre'];
				$trabajos["valor_parcial_".$i] = $registro['valor_parcial'];
			endfor;
		?>
		<thead>
			<tr class="table-light">
				<th style="padding: 6px" scope="col">TRABAJO</th>
				<th style="padding: 6px" scope="col">MAX</th>
				<th style="padding: 6px" scope="col">CALIFICACION</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$calificacion = 0;

				for($i=0;$i<$noTrabajos;$i++):
					$consulta = "select * from entrega where id_actividad=".$trabajos["id_actividad_".$i]." and correo ='$correo'";
					$db->consulta($consulta);
					if($db->filas == 0)
						$registro['calificacion'] = '-';
					else
						$registro = $db->getRegistro();
					$calificacion += intval($registro['calificacion']);
			?>
				<tr>
					<td>
						<?=$i+1?>
						<?=$trabajos['nombre_'.$i]?>
					</td>
					<td>
						<?=$trabajos['valor_parcial_'.$i]?>
					</td>
					<td>
						<?=$registro['calificacion']?>
					</td>
				</tr>
			<?php
				endfor;
			?>
				<tr>
					<td></td>
					<td><b>Total</b></td>
					<td><b><?=$calificacion?></b></td>
				</tr>
		</tbody>
	</table>
</div>