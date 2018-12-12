<?php
	include("session.php");
?>
	<div>
		<h5 class="bg-info text-white" style="text-align: center; padding: 10px;"><img src="../img/grupo.png" style="width: 24px;" > <b>PERSONAS</b></h5>
		<table class="table table-striped">
			<thead>
				<tr>
					<th style="padding: 6px" scope="col"></th>
					<th style="padding: 6px" scope="col">NOMBRE</th>
					<th style="padding: 6px" scope="col">CURSO</th>
					<th style="padding: 6px" scope="col">CORREO</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$db = new MySQL();

					$consulta = "select  concat(a.nombre,' ',a.apaterno,' ',a.amaterno) as nombre, c.curso, a.correo
								from curso c inner join alumno_curso ac on c.clave=ac.clave
								inner join alumno a on ac.correo=a.correo
								where c.clave = '".$_SESSION['clave_curso']."'";
					$db->consulta($consulta);

					for($i=0;$i<$db->filas;$i++):
						$registro = $db->getRegistro();
				?>
					<tr>
						<th style="padding: 6px" scope="row"><img src="../img/usuario.png" style="height: 16px;"></th>
						<td style="padding: 6px"><?=$registro['nombre']?></td>
						<td style="padding: 6px"><?=$registro['curso']?></td>
						<td style="padding: 6px"><?=$registro['correo']?></td>
					</tr>
				<?php
					endfor;
				?>
			</tbody>
		</table>
	</div>