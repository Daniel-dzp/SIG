<?php 
	include "../tools/mysql.php";

	if(isset($_POST['clave'])):
		$clave = $_POST['clave'];
		$db = new MySQL();

		$consulta = "select * from aviso where clave = '$clave'";
		$db->consulta($consulta);
?>
				<div class="container mt-3" style="padding: 0px; margin: 0px;">
					<h4 class="list-group-item-success list-group-item">Avisos</h4>
					<ul class="list-group" >
	<?php
		for($i=0;$i<$db->filas;$i++):
			$registro = $db->getRegistro();
	?>
						<li class="list-group-item list-group-item-success" style="padding: 4px;">
							<span><?=$registro['aviso']?></span>
							<span class="fecha"><?=$registro['fecha']?></span>
						</li>
<?php	endfor;?>
					</ul>
				</div>
<?php endif;?>
