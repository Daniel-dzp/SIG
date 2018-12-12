<?php
	include("session.php");

	$db = new MySQL();
	$consulta = "select c.clave, c.curso, c.fecha, count(ac.correo) as no_alumnos
				from curso c left join alumno_curso ac on c.clave=ac.clave
				where c.correo = '".$_SESSION['correo']."'
				group by c.clave, c.curso, c.fecha
				order by c.fecha desc";
	$db->consulta($consulta);
?>
				
						<?php
							for($i=0;$i<$db->filas;$i++):
								$registro = $db->getRegistro();
						?>
						<tr onclick="seleccionarCurso('<?=$registro['clave']?>')" class="small">
							<th style="padding: 4px" scope="row"><?=$i+1?></th>
							<td style="padding: 4px"><?=$registro['clave']?></td>
							<td style="padding: 4px"><?=$registro['curso']?></td>
							<td style="padding: 4px"><?=$registro['fecha']?></td>
							<td style="padding: 4px"><?=$registro['no_alumnos']?></td>
						</tr>
						<?php endfor;?>
