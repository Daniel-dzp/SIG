<?php
	include("session.php");

	if(isset($_POST['descripcion'])
		&& isset($_POST['clave']))
	{
		$descripcion = $_POST['descripcion'];
		$clave = $_POST['clave'];
		$correo = $_SESSION['correo'];
		$db = new MySQL();

		if($_FILES['documento']['size'] > 10000000)
			header("location: home.php?m=2");
		else
		{
			$datos = explode(".", strtoupper($_FILES['documento']['name']));

			$extensiones = array('PDF', 'JPG', 'PNG', 'DOC', 'DOCX', 'ZIP','RAR');
			
			if(!(in_array($datos[count($datos)-1], $extensiones)))
				header("location: home.php?m=3");
			else
			{
				move_uploaded_file($_FILES['documento']['tmp_name'],"../data/maestros/".$correo."/documentos/".$_FILES['documento']['name']);
				$consulta = "insert into recurso(recurso, fecha, descripcion, clave)
								value('".$_FILES['documento']['name']."', now(),'$descripcion', '$clave')";
				$db->consulta($consulta);
				header("location: home.php?m=4");
			}
		}
	}
	else
		header("location: home.php?m=1");
?>