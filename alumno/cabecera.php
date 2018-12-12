<header>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="padding: 0px;">
	    <a class="navbar-brand btn btn-primary <?=($_SESSION['menu']=='home'?'active':'')?>" href="home.php">
	    	<img src="../img/home.png" style="width: 30px;">
	    	Inicio
	    </a>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarColor01">
	        <ul class="navbar-nav mr-auto">
	            <li class="nav-item">
	                <a class="nav-link btn btn-primary <?=($_SESSION['menu']=='perfil'?'active':'')?>" href="perfil.php">
	                	<img src="../img/perfil.png" style="width: 24px;">
	                	Perfil
	                </a>
	            </li>
	            <li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle  btn btn-primary" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						<img src="../img/grupo.png" style="width: 24px;">
						Grupos
					</a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 41px, 0px); top: 0px; left: 0px; will-change: transform;">
						<a class="dropdown-item" data-toggle="modal" data-target="#idCurso">Inscribirse</a>
						<div class="dropdown-divider"></div>
						<?php
							$db = new MySQL();
							$db->cursosAlumno($_SESSION['correo']);
							for($i=0;$i<$db->filas;$i++):
								$curso = $db->getRegistro();
						?>
							<form method="post" action="curso.php" class="dropdown-item">
								<input type="hidden" name="clave" value="<?=$curso['clave']?>">
								<button type="submit" class="cabecera-curso"><?=$curso['curso']?></button>
							</form>
						<?php
							endfor;
						?>
					</div>
				</li>
	        </ul>
	    </div>


		<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
			<button type="button" class="btn btn-primary">
				<img src="../img/usuario.png">&nbsp;
				<span style="color:white;"><?=$_SESSION['nombre']?>&nbsp;</span>
			</button>
			<div class="btn-group" role="group">
				<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					
				</button>
				<div class="dropdown-menu" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 15px; left: -140px; transform: translate3d(0px, 37px, 0px);">
					<a class="dropdown-item" href="perfil.php">
						<img src="../img/config.png" style="width: 24px;">
						Config
					</a>
					<a class="dropdown-item" href="../index.php">
						<img src="../img/salir.png" style="width: 24px;">
						Salir
					</a>
				</div>
			</div>
		</div>

	</nav>
</header>

<div class="modal" id="idCurso">
	<div class="modal-dialog card border-success mb-3" role="document">
		<div class="modal-content">
			<div class="modal-header card-header">
				<h5 class="modal-title">Inscribirse a un curso</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="curso.suscribir.php">
					<label class="col-form-label col-form-label-sm">Clave del curso</label>
					<input type="text" name="clave" class="form-control form-control-sm" required>
					<input type="hidden" name="correo" value="<?=$_SESSION['correo']?>">
					<br/>
					<button class="btn btn-primary">Inscribir</button>
				</form>
			</div>
		</div>
	</div>
</div>