<?php
	include("session.php");
	
	if(isset($_POST['aviso']))
	{
		$db = new MySQL();
		$aviso = $_POST['aviso'];
		$clave = $_POST['clave'];

		$consulta = "insert into aviso(aviso, clave) value('$aviso', '$clave')";
		$db->consulta($consulta);
	}
?>