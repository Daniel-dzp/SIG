var $clave;
var $id_recurso;
var $id_actividad;
var $correo;
var $no_parcial=1;
var $i;
var $no_elementos;
var $id_aviso;
var cargando = '<br/><div class="progress"><div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div></div>';

function cursoTrabajoEliminar(id_actividad)
{
	$id_actividad = id_actividad;
	$('#idTrabajoEliminar').modal();
}

function cursoAviso()
{
	$('#idAvisoAgregar').modal();
}

function cursoAvisoEliminar(id_aviso)
{
	$id_aviso = id_aviso;
	$('#idAvisoEliminar').modal();
}

function cursoCalificarActualizar(no_parcial,i, no_elementos)
{
	$no_parcial = no_parcial;
	$i = i;
	$no_elementos = no_elementos;
	$('#idCalificarActualizar').modal();
}

function cursoTrabajoActualizar(id_actividad)
{
	$id_actividad = id_actividad;
	$('#idTrabajoActualizar').modal();
}

function cursoTrabajoAgregar()
{
	$('#idTrabajoAgregar').modal();
}

function cursoAgregarMostrar()
{
	$('#idCursoAgregar').modal();
}

function curso_recurso_eliminar(id_recurso)
{
	$id_recurso = id_recurso;
	$('#idRecursoEliminar').modal();
}

function curso_recurso_agregar()
{
	$('#idRecursoAgregar').modal();
}

function seleccionarCurso(clave)
{
	$clave = clave;
	$('#idClave').val(clave);
	$('#idTitulo').html('CURSO: '+clave);
	$('#idRecursoClave').val(clave);

	ajaxTrabajosParcial(1);
	ajaxTrabajosParcial(2);
	ajaxTrabajosParcial(3);
	ajaxTrabajosParcial(4);
	ajaxTrabajos();
	ajaxRecursos();
	ajaxPersonas();
	ajaxAvisos();
}

function ajaxTrabajoEliminar()
{
	var parametros = {
		"id_actividad" : $id_actividad
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.trabajos.eliminar.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			//$("#recursos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			$("#dzp").html(response);
			ajaxTrabajos();
		}
	});
}

function ajaxCalificacionesActualizar()
{
	no_parcial = $no_parcial;
	i = $i;
	no_elementos = $no_elementos;

	var parametros = {
	};

	var t=0;
	for(cont=0;cont<$no_elementos;cont++)
	{
		if($('#idEntrega'+no_parcial+i+cont).val() > '')
		{
			parametros['idEntrega'+t] = $('#idEntrega'+no_parcial+i+cont).val();
			parametros['valor'+t] = $('#idActividadValor'+no_parcial+i+cont).val();
			t++;
		}
	}
	parametros['no_elementos'] = t;


	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.calificaciones.actualizar.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			//$("#recursos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve	
			ajaxTrabajosParcial(no_parcial);
			//$('#ejemplo1').html(response);
		}
	});
}

function ajaxTrabajoActualizar()
{
	id_actividad = $id_actividad;
	nombre = $("#idTANombre"+id_actividad).val();
	descripcion = $("#idTADescripcion"+id_actividad).val();
	valor_parcial = $("#idTAValorParcial"+id_actividad).val();
	clave = $clave;
	no_parcial = $("#idTANoParcial"+id_actividad).val();
	fecha_finaliza = $("#idTAFechaFinaliza"+id_actividad).val();

	var parametros = {
		"id_actividad" : id_actividad,
		"nombre" : nombre,
		"descripcion": descripcion,
		"valor_parcial": valor_parcial,
		"clave": clave,
		"no_parcial": no_parcial,
		"fecha_finaliza": fecha_finaliza
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.trabajos.actualizar.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			//$("#recursos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve	
			ajaxTrabajos();
		}
	});
}

function ajaxTrabajoAgregar()
{
	nombre = $("#idTrabajoNombre").val();
	descripcion = $("#idTrabajoDescripcion").val();
	valor_parcial = $("#idTrabajoValor").val();
	clave = $clave;
	no_parcial = $("#idTrabajoNoParcial").val();
	fecha_finaliza = $("#idTrabajoFechaFinaliza").val();

	var parametros = {
		"nombre" : nombre,
		"descripcion": descripcion,
		"valor_parcial": valor_parcial,
		"clave": clave,
		"no_parcial": no_parcial,
		"fecha_finaliza": fecha_finaliza
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.trabajos.agregar.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			//$("#recursos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			ajaxTrabajos();
		}
	});
}

function ajaxRecursosEliminar()
{
	var parametros = {
		"id_recurso" : $id_recurso
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.descargas.eliminar.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			//$("#recursos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			//$("#recursos").html(response);
			ajaxRecursos();
		}
	});
}

function ajaxTrabajosParcial(no_parcial)
{
	$no_parcial = no_parcial;

	var parametros = {
		"clave" : $clave,
		"no_parcial": no_parcial
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.trabajos.parcial.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			$("#parcial"+no_parcial).html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			$("#parcial"+no_parcial).html(response);
		}
	});
}

function ajaxTrabajos()
{
	var parametros = {
		"clave" : $('#idClave').val()
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.trabajos.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			$("#trabajos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			$("#trabajos").html(response);
		}
	});
}

function ajaxRecursos()
{
	var parametros = {
		"clave" : $('#idClave').val()
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.descargas.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			$("#recursos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			$("#recursos").html(response);
		}
	});
}

function ajaxPersonas()
{
	var parametros = {
		"clave" : $('#idClave').val()
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.alumnos.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			$("#alumnos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			$("#alumnos").html(response);
		}
	});
}

function ajaxAvisos()
{
	var parametros = {
		"clave" : $clave
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.avisos.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			$("#idAvisos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			$("#idAvisos").html(response);
		}
	});
}

function ajaxAvisoEliminar()
{
	var parametros = {
		"id_aviso" : $id_aviso
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.aviso.eliminar.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			//$("#idAvisos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			//$("#idAvisos").html(response);
			ajaxAvisos();
		}
	});
}

function ajaxAvisoAgregar()
{
	clave = $clave;
	aviso = $("#idAviso").val();
	
	var parametros = {
		"clave" : clave,
		"aviso" : aviso
	};
	$.ajax({
		data:  parametros, //datos que se envian a traves de ajax
		url:   'curso.aviso.agregar.php', //archivo que recibe la peticion
		type:  'post', //método de envio
		beforeSend: function () {
			//$("#idAvisos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			//$("#idAvisos").html(response);
			ajaxAvisos();
		}
	});
}

ajaxCursos();

function ajaxCursos()
{
	$.ajax({
		url:   'cursos.php', //archivo que recibe la peticion
		type:  'get', //método de envio
		beforeSend: function () {
			$("#idCursos").html("Procesando, espere por favor...");
		},
		success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
			$("#idCursos").html(response);
		}
	});
}
