<?php
	include("session.php");

	if(isset($_POST['id_recurso']))
	{
		$db = new MySQL();
		$id_recurso = $_POST['id_recurso'];
		$correo = $_SESSION['correo'];

		$consulta = "select recurso from recurso where id_recurso = $id_recurso";
		$db->consulta($consulta);
		$registro = $db->getRegistro();

		unlink("../data/maestros/".$correo."/documentos/".$registro['recurso']);
		$consulta = "delete from recurso where id_recurso = $id_recurso";
		$db->consulta($consulta);
	}
?>