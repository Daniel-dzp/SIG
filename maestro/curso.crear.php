<?php
	include("session.php");

	if(isset($_POST['clave'])
		&& isset($_POST['nombre']))
	{
		$db = new MySQL();
		$clave = $_POST['clave'];
		$correo = $_SESSION['correo'];
		$curso = $_POST['nombre'];

		$consulta = "insert into curso(clave, correo, curso, fecha)
					value('$clave', '$correo', '$curso', now())";
		$db->consulta($consulta);
		header("location: home.php?m=2");
	}
	else
		header("location: home.php?m=1");
?>