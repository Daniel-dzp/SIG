<?php
	include("session.php");

	if(isset($_POST['id_aviso']))
	{
		$db = new MySQL();
		$id_aviso = $_POST['id_aviso'];

		$consulta = "delete from aviso where id_aviso=$id_aviso";
		$db->consulta($consulta);
	}
?>