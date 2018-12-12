<?php
	include("session.php");

	if(isset($_POST['correo']) && isset($_POST['clave']))
	{
		$correo = $_POST['correo'];
		$clave = $_POST['clave'];
		$db = new MySQL();
		if($db->existeCurso($clave))
		{
			if(!$db->estaSubcritoCurso($correo, $clave))
			{
				$consulta = "insert into alumno_curso(clave, correo)
					value('$clave', '$correo');";
				echo $consulta;
				$db->consulta($consulta);
				header("location: home.php?m=4");
			}
			else
				header("location: home.php?m=3");
		}
		else
			header("location: home.php?m=2");
	}
	else
		header("location: home.php?m=1");
?>