<?php
	include("session.php");

	if(!isset($_POST['clave']))
		exit();
	if($_POST['clave'] == '')
		exit();

	$db = new MySQL();
	$clave = $_POST['clave'];





?>

<div class="card border-dark mb-3">
	<div class="card-header" style="text-align: center; padding: 4px;">
		<textarea id="idAviso" placeholder="Aviso" class="form-control" style="width: 100%; margin-bottom: 4px;"></textarea>
		<button class="btn btn-dark btn-sm" onclick="cursoAviso();">Añadir</button>
	</div>
	<div class="card-body" style="padding: 0px;">
		<div class="list-group">
<?php
	$consulta = "select * from aviso where clave='$clave' order by fecha desc";
	$db->consulta($consulta);

	for($i=0;$i<$db->filas;$i++):
		$registro = $db->getRegistro();
?>
			<div class="list-group-item list-group-item-action" style="padding: 4px;">
				<img src="../img/eliminar.png" class="eliminar" onclick="cursoAvisoEliminar(<?=$registro['id_aviso']?>);">
				<span class="fecha"><?=$registro['fecha']?></span>
				<span><?=$registro['aviso']?></span>
			</div>
<?php
	endfor;
?>
		</div>
	</div>
</div>