<?php
	include("session.php");

	if(isset($_POST['correo']) && isset($_POST['id_entrega']))
	{
		$correo = $_POST['correo'];
		$id_entrega = $_POST['id_entrega'];
		$db = new MySQL();

		$consulta = "select * from entrega where id_entrega=$id_entrega and correo='$correo'";
		$db->consulta($consulta);
		if($db->filas == 1)
		{
			$registro = $db->getRegistro(); 
			$consulta = "delete from entrega where id_entrega=$id_entrega and correo='$correo'";
			$db->consulta($consulta);
			unlink("../data/alumnos/".$correo."/actividades/".$registro['archivo']);
			header("location: curso.php?m=7");
		}
		else
			header("location: curso.php?m=6");
	}
	else
		header("location: curso.php?m=5");

?>