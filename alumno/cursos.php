<?php
	session_start();

	if(!isset($_SESSION['correo']))
		exit();

	include '../tools/mysql.php';

	if(isset($_POST['no_pagina']))
		$no_pagina = $_POST['no_pagina'];
	else
		$no_pagina = 0;
	$correo = $_SESSION['correo'];
?>

<?php
	$db = new MySQL();

	$elementosPagina = 8;

	$db->consulta("select count(*) as elementos
				from alumno a inner join alumno_curso ac USING(correo)
					inner join curso c on ac.clave=c.clave
					inner join maestro m on c.correo=m.correo
				WHERE a.correo = '$correo' order by c.fecha desc");
	$registro = $db->getRegistro();

	$totalPaginas = ceil($registro['elementos']/$elementosPagina);

	$consulta = "select c.clave, c.curso, c.fecha, concat(m.nombre,' ',m.apaterno,' ',m.amaterno) as maestro
				from alumno a inner join alumno_curso ac USING(correo)
					inner join curso c on ac.clave=c.clave
					inner join maestro m on c.correo=m.correo
				WHERE a.correo = '$correo' order by c.fecha desc limit ".($no_pagina*$elementosPagina).', '.($elementosPagina);

	$db->consulta($consulta);

	//$db->cursosAlumno($_SESSION['correo']);
	for($i=0;$i<$db->filas;$i++):
		$curso = $db->getRegistro();
?>
	<div class="col-sm-3">
			<div class="card border-success mb-3">
				<div class="card-header curso-cabecera">
					<form method="post" action="curso.php">
						<input type="hidden" name="clave" value="<?=$curso['clave']?>">
						<button type="submit">
							<img src="../img/grupo.png" style="width: 24px;"/>
							<?=$curso['curso']?>
						</button>
					</form>
				</div>
				<div class="card-body">
					<p class="card-text"><img src="../img/maestro.png"> <?=$curso['maestro']?></p>
					<p class="card-text"><img src="../img/clave.png"> <?=$curso['clave']?></p>
					
					<span class="card-title" style="float: left; color: #aaa;font-size: 10px;"> <?=$curso['fecha']?></span>
					<img src="../img/grafica.png" style="position: absolute; bottom:25px; right: 25px;">
				</div>
			</div>
	</div>
<?php
	endfor;
?>
	<div class="col-sm-12" style="text-align: center;">
		<ul class="pagination">
			<li class="page-item <?=($no_pagina==0?'disabled':'')?>"><a class="page-link" onclick="ajaxCursos(<?=$no_pagina-1?>);">Previous</a></li>
		<?php
			for($i=0;$i<$totalPaginas;$i++):
		?>
			<li class="page-item <?=($no_pagina==$i?'active':'')?>"><a class="page-link" onclick="ajaxCursos(<?=$i?>);"><?=$i+1?></a></li>
		<?php
			endfor;
		?>
			<li class="page-item <?=($no_pagina==$totalPaginas-1?'disabled':'')?>"><a class="page-link" onclick="ajaxCursos(<?=$no_pagina+1?>);">Next</a></li>
		</ul>
	</div>