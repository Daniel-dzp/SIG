<?php
	include("session.php");

	if(isset($_POST['nombre'])
		&& isset($_POST['descripcion'])
		&& isset($_POST['valor_parcial'])
		&& isset($_POST['clave'])
		&& isset($_POST['no_parcial'])
		&& isset($_POST['fecha_finaliza']))
	{
		$db = new MySQL();
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$valor_parcial = $_POST['valor_parcial'];
		$clave = $_POST['clave'];
		$no_parcial = $_POST['no_parcial'];
		$fecha_finaliza = $_POST['fecha_finaliza'];

		$consulta = "insert into actividad(nombre, fecha_inicio, fecha_finaliza, no_parcial, valor_parcial, clave, descripcion)
					value('$nombre', now(), '$fecha_finaliza', $no_parcial, '$valor_parcial', '$clave', '$descripcion')";
		$db->consulta($consulta);
	}
?>