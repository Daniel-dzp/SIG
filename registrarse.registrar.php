<?php

	session_start();
	

	include("tools/mysql.php");
	include("tools/generar-clave.php");
	include("tools/class.phpmailer.php");
	include("tools/class.smtp.php");

	if (isset($_POST['nombre']) && isset($_POST['apaterno']) && isset($_POST['amaterno']) &&
		isset($_POST['correo']) && isset($_POST['tipo']))
	{
		$nombre = $_POST['nombre'];
		$apaterno = $_POST['apaterno'];
		$amaterno = $_POST['amaterno'];
		$correo = $_POST['correo'];
		$tipo = $_POST['tipo'];


		$db = new MySQL();
		// generar clave de acceso
		$clave = generarClave(8);

		$db->existeCorreo($tipo, $correo);

		if($db->filas == 0)
		{
			// para mandar el email
			$mail = new PHPMailer();
			$mail->IsSMTP();

			$mail->Host = "smtp.gmail.com"; //mail.google
			$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
			$mail->Port = 465; // set the SMTP port for the GMAIL server
			$mail->SMTPDebug = 1; // enables SMTP debug information (for testing)
			// 1 = errors and messages
			// 2 = messages only
			$mail->SMTPAuth = true; //enable SMTP authentication
			
			// correo del remitente
			$mail->Username = "1994.dzp@gmail.com"; // SMTP account username
			$mail->Password = "Akagami123"; // SMTP account password
			  
			$mail->From="1994.dzp@gmail.com";
			$mail->FromName="Registro a SIG";
			$mail->Subject = "Registro completo";
			$mail->MsgHTML("<h1>Bienvenido $nombre $apaterno $amaterno</h1><h2> tu clave de acceso es : $clave</h2>");
			$mail->AddAddress($correo);
			//$mail->AddAddress("admin@admin.com");
			if(!$mail->Send())
			{
				echo "Error: " . $mail->ErrorInfo;
				header("location: registrarse.php?error=5");
			}
			else
			{
				if($tipo == "M")
					$consulta = "insert into maestro(nombre, apaterno, amaterno, correo, clave, nombre_escuEla)
								value('$nombre', '$apaterno', '$amaterno', '$correo', '".md5($clave)."', '".$_POST['nombre_escuela']."')";
				else
					$consulta = "insert into alumno(nombre, apaterno, amaterno, correo, clave)
								value('$nombre', '$apaterno', '$amaterno', '$correo', '".md5($clave)."')";

				$db->consulta($consulta);
				$consulta;
				$db->cerrar();
				echo $consulta;
				if($tipo == 'M')
				{
					mkdir('data/maestros/'.$correo);
					mkdir('data/maestros/'.$correo.'/documentos');
					copy('data/perfil.jpg', 'data/maestros/'.$correo.'/perfil.jpg');
				}
				else
				{
					mkdir('data/alumnos/'.$correo);
					mkdir('data/alumnos/'.$correo.'/actividades');
					copy('data/perfil.jpg', 'data/alumnos/'.$correo.'/perfil.jpg');
				}

				header("location: index.php?m=7");
			}
		}
		else{
			$db->cerrar();
			header("location: registrarse.php?m=9");
		}
	}
	else
		header("location: registrarse.php?m=1");

?>