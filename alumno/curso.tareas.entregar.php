<?php
	include("session.php");

	if(isset($_POST['correo']) && isset($_POST['id_actividad']))
	{
		$correo = $_POST['correo'];
		$id_actividad = $_POST['id_actividad'];
		$db = new MySQL();

		if($_FILES['documento']['size'] > 10000000)
			header("location: curso.php?m=2");
		else
		{
			$datos = explode(".", strtoupper($_FILES['documento']['name']));

			$extensiones = array('PDF', 'JPG', 'PNG', 'DOC', 'DOCX', 'ZIP','RAR');
			
			if(!(in_array($datos[count($datos)-1], $extensiones)))
				header("location: curso.php?m=3");
			else
			{
				move_uploaded_file($_FILES['documento']['tmp_name'],"../data/alumnos/".$correo."/actividades/".$_FILES['documento']['name']);
				$consulta = "insert into entrega(correo, id_actividad, fecha, archivo)
								value('$correo', $id_actividad, now(),'".$_FILES['documento']['name']."')";
				$db->consulta($consulta);
				header("location: curso.php?m=4");
			}

		}
	}
	else
		header("location: curso.php?m=1");

?>