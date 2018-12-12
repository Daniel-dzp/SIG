<?php
	session_start();

	include("tools/mysql.php");

	if(isset($_POST['correo']) && isset($_POST['clave']) && isset($_POST['tipo']))
	{
		$db = new MySQL();
		$correo = $_POST['correo'];
		$clave = $_POST['clave'];
		$tipo = $_POST['tipo'];

		if($db->login($correo, $clave, $tipo))
		{
			$registro = $db->getRegistro();

			$_SESSION['correo'] = $correo;
			$_SESSION['tipo'] = $tipo;
			$_SESSION['nombre'] = $registro['nombre'].' '.$registro['apaterno'].' '.$registro['amaterno'];
			$_SESSION['menu'] = "home";
			$_SESSION['curso'] = "";

			if($tipo == 'M')
				header("location: maestro/home.php");
			else
				if($tipo == 'A')
					header("location: alumno/home.php");
				else
					header("location: index.php?m=1");
		}
		else
			header("location: index.php?m=2");
	}
	else
		header("location: index.php?m=1");

?>