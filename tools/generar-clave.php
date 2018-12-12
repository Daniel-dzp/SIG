<?php
	function generarClave($longitud=8)
    {
        $cadena = "ABCDEFGHIJKLMNPQRSTUVWXYZ123456789123456789";
        $numeC = strlen($cadena);
        $nuevPWD = "";
        for($i = 0; $i < $longitud; $i++){
            $nuevPWD .= $cadena[rand()%$numeC];
        }

        return $nuevPWD;
    }

?>