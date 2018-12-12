<?php

	class MySQL
	{
		var $filas;
		var $conexion;
		var $bloque;
		var $error;
		var $columnas;
		
		//var_dump($_POST);

		function MySQL()
		{
			$this->conexion = mysqli_connect
			(
				'localhost',
				'root',
				'',
				'cursos'
			);
		}

		function getRegistro(){
			return $this->bloque->fetch_array();
		}

		function getObjeto(){
			return $this->bloque->fetch_object();
		}

		function cerrar()
		{
			mysqli_close($this->conexion);
		}

		function consulta($consulta)
		{
			$this->bloque = mysqli_query( $this->conexion, $consulta);
			$this->error = mysqli_error($this->conexion);

			if($this->error == "")
			{
				if(stripos(strtoupper($consulta), "SELECT") !== false && stripos(strtoupper($consulta), "SELECT") ==0)
					$this->filas = mysqli_num_rows($this->bloque);
			}
			else
				$this->filas = -1;
		}

		function getGeneros()
		{
			$consulta = "select * from genero";
			$this->consulta($consulta);
		}

		function existeCorreo($tipo, $correo)
		{
			if($tipo == "M")
				$consulta = "select * from maestro where correo='$correo'";
			else
				$consulta = "select * from alumno where correo='$correo'";
			$this->consulta($consulta);
		}

		function login($correo, $clave, $tipo)
		{
			if($tipo == "M")
				$consulta = "select * from maestro where correo='$correo' and clave='".md5($clave)."'";
			else
				$consulta = "select * from alumno where correo='$correo' and clave='".md5($clave)."'";
			$this->consulta($consulta);
			if($this->filas == 1)
				return true;
			else
				return false;
		}

		function cursosAlumno($correo)
		{
			$consulta = "select c.clave, c.curso, c.fecha, concat(m.nombre,' ',m.apaterno,' ',m.amaterno) as maestro
						from alumno a inner join alumno_curso ac USING(correo)
							inner join curso c on ac.clave=c.clave
							inner join maestro m on c.correo=m.correo
						WHERE a.correo = '$correo' order by c.fecha desc";
			$this->consulta($consulta);
		}

		function existeCurso($clave)
		{
			$consulta = "select * from curso where clave='$clave'";
			$this->consulta($consulta);

			if($this->filas == 1)
				return true;
			else
				return false;
		}

		function estaSubcritoCurso($correo, $clave)
		{
			$consulta = "select * from alumno_curso where correo='$correo' and clave='$clave'";
			$this->consulta($consulta);

			if($this->filas == 1)
				return true;
			else
				return false;
		}


	}

?>