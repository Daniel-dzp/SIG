<?php
	include("session.php");
	$_SESSION['curso.menu.actual'] = 4;
?>
	<div>
		<hr/>
		<h5 style="text-align: center;"><img src="../img/descarga.png" style="width: 24px;" > <b>DESCARGAS</b></h5>
		<hr/>
		<table class="table table-hover">
			<thead>
				<tr class="table-light">
					<th style="padding: 6px" scope="col"></th>
					<th style="padding: 6px" scope="col">NOMBRE</th>
					<th style="padding: 6px" scope="col">DESCRIPCION</th>
					<th style="padding: 6px" scope="col">FECHA</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$db = new MySQL();

					$consulta = "select concat('../data/maestros/',m.correo,'/documentos/',r.recurso) as dir, r.descripcion, r.recurso, r.fecha
								from maestro m inner join curso c on m.correo=c.correo
								inner join recurso r on c.clave=r.clave
								where c.clave = '".$_SESSION['clave_curso']."'";
					$db->consulta($consulta);

					for($i=0;$i<$db->filas;$i++):
						$registro = $db->getRegistro();
						if($i%2):
				?>
					<tr>
				<?php
						else:
				?>
					<tr class="table-success">
				<?php
						endif;
				?>
						<th style="padding: 6px" scope="row">
							<img src="../img/archivo.png" style="height: 16px;">
						</th>
						<td style="padding: 6px">
							<a href="<?=$registro['dir']?>" target="_blank" style="color:white;">
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