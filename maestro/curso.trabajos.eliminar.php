<?php
	if(!isset($_POST['id_actividad']))
		exit();

	include '../tools/mysql.php';
	$id_actividad = $_POST['id_actividad'];

	$db = new MySQL();

	$consulta = 'delete from entrega where id_actividad='.$id_actividad;
	$db->consulta($consulta);
	$consulta = 'delete from actividad where id_actividad='.$id_actividad;
	$db->consulta($consulta);
?>