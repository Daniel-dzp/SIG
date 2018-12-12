<header>
	<nav class="navbar navbar-expand-lg bg-dark navbar-dark" style="padding: 0px;">
	    <a class="navbar-brand btn btn-dark <?=($_SESSION['menu']=='home'?'active':'')?>" href="home.php">
	    	<img src="../img/home.png" style="width: 30px;">
	    	Inicio
	    </a>
	    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarColor01">
	        <ul class="navbar-nav mr-auto">
	            <li class="nav-item">
	                <a class="nav-link btn btn-dark <?=($_SESSION['menu']=='perfil'?'active':'')?>" href="perfil.php">
	                	<img src="../img/perfil.png" style="width: 24px;">
	                	Perfil
	                </a>
	            </li>
	        </ul>
	    </div>


		<div class="btn-group" role="group" aria-label="Button group with nested dropdown">
			<button type="button" class="btn btn-dark">
				<img src="../img/usuario.png">&nbsp;
				<span style="color:white;"><?=$_SESSION['nombre']?>&nbsp;</span>
			</button>
			<div class="btn-group" role="group">
				<button id="btnGroupDrop1" type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					
				</button>
				<div class="dropdown-menu bg-dark navbar-dark" aria-labelledby="btnGroupDrop1" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 15px; left: -140px; transform: translate3d(0px, 37px, 0px);">
					<a class="dropdown-item bg-dark text-secondary" href="perfil.php">
						<img src="../img/config.png" style="width: 24px;">
						Config
					</a>
					<a class="dropdown-item bg-dark text-secondary" href="../index.php">
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