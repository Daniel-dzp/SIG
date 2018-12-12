<?php
	include("session.php");

	if(isset($_POST['no_elementos']))
	{
		$db = new MySQL();
		$no_elementos = $_POST['no_elementos'];

		for($i=0;$i<$no_elementos;$i++)
		{
			$consulta = "update entrega set calificacion='".$_POST['valor'.$i]."' where id_entrega=".$_POST['idEntrega'.$i];
			$db->consulta($consulta);	
		}
	}
?>