<?php
	include("session.php");

	if(!isset($_POST['correo']) || !isset($_POST['clave']))
		exit();

	$clave = $_POST['clave'];
	$correo = $_POST['correo'];
?>
<div style="margin:10px 20px 40px 20px;">
	<table class="table table-striped">
	
		<?php
			$db = new MySQL();
			$consulta = "select a.no_parcial, sum(e.calificacion) as calificacion from
						curso c inner join actividad a on c.clave=a.clave
						inner join entrega e on a.id_actividad=e.id_actividad
						where c.clave ='$clave' and e.correo='$correo'
						group by a.no_parcial";
			$db->consulta($consulta);
		
			$parcial1 = $parcial2 = $parcial3 = $parcial4 = 0;
			
			while($registro = $db->getRegistro())
			{
				switch($registro['no_parcial'])
				{
					case 1:
						$parcial1 = intval($registro['calificacion']);
						break;
					case 2:
						$parcial2 = intval($registro['calificacion']);
						break;
					case 3:
						$parcial3 = intval($registro['calificacion']);
						break;
					case 4:
						$parcial4 = intval($registro['calificacion']);
						break;
				}
			}
		
			$calificacion = ($parcial1+$parcial2+$parcial3+$parcial4)/4;
		
		?>
		<thead>
			<tr class="table-light">
				<th style="padding: 6px" scope="col">PARCIAL</th>
				<th style="padding: 6px" scope="col">CALIFICACION</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td><?=$parcial1?></td>
			</tr>
			<tr>
				<td>2</td>
				<td><?=$parcial2?></td>
			</tr>
			<tr>
				<td>3</td>
				<td><?=$parcial3?></td>
			</tr>
			<tr>
				<td>4</td>
				<td><?=$parcial4?></td>
			</tr>
			<tr>
				<td>Total:</td>
				<td><?=$calificacion?></td>
			</tr>
		</tbody>
	</table>
</div>