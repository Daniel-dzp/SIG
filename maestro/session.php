<?php
	session_start();
	if(!isset($_SESSION['correo']))
		header("location: ../index.php");
	if($_SESSION['tipo'] != "M")
		header("location: ../index.php");

	include("../tools/MySQL.php");
?>