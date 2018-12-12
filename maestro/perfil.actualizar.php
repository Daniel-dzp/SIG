<?php
	include("session.php");

	if(isset($_POST['nombre'])
		&& isset($_POST['apaterno'])
		&& isset($_POST['amaterno'])
		&& isset($_POST['correo'])
		&& isset($_POST['clave']))
	{
		$nombre = $_POST['nombre'];
		$apaterno = $_POST['apaterno'];
		$amaterno = $_POST['amaterno'];
		$correo = $_POST['correo'];
		$clave = $_POST['clave'];
		$db = new MySQL();

		$consulta = "update maestro set nombre='$nombre', apaterno='$apaterno', amaterno='$amaterno', correo='$correo'
					".($clave>''?", clave='".md5($clave)."'":"")."
					 where correo='$correo'";
		$db->consulta($consulta);
		header("location: perfil.php?m=2");
	}
	else
		header("location: perfil.php?m=1");

?>