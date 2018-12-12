<?php
	include("session.php");

	if(isset($_POST['id_actividad'])
		&& isset($_POST['nombre'])
		&& isset($_POST['descripcion'])
		&& isset($_POST['valor_parcial'])
		&& isset($_POST['clave'])
		&& isset($_POST['no_parcial'])
		&& isset($_POST['fecha_finaliza']))
	{
		$db = new MySQL();
		$id_actividad = $_POST['id_actividad'];
		$nombre = $_POST['nombre'];
		$descripcion = $_POST['descripcion'];
		$valor_parcial = $_POST['valor_parcial'];
		$clave = $_POST['clave'];
		$no_parcial = $_POST['no_parcial'];
		$fecha_finaliza = $_POST['fecha_finaliza'];

		$consulta = "update actividad set nombre='$nombre', fecha_finaliza='$fecha_finaliza', no_parcial=$no_parcial, valor_parcial='$valor_parcial', clave='$clave', descripcion='$descripcion' where id_actividad=$id_actividad";
		$db->consulta($consulta);
	}
?>