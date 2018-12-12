<header>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark" style="padding: 0px;">
        <a class="navbar-brand btn btn-dark <?=($activarMenu=='acceso'?'active':'')?>" href="index.php">
            <img src="img/logo.png" style="width: 34px; background: lightgrey;">
            CIG
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-dark <?=($activarMenu=='acceso'?'active':'')?>" href="index.php">
                        <img src="img/login.png" style="width: 24px;">
                        Iniciar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark <?=($activarMenu=='registro'?'active':'')?>" href="registrarse.php">
                        <img src="img/registrar.png" style="width: 24px;">
                        Registrar
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-dark <?=($activarMenu=='acerca'?'active':'')?>" href="acerca.php">
                        <img src="img/info.png" style="width: 24px;">
                        Acerca
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>