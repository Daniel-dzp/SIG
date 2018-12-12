<?php
	session_start();
	if(!isset($_SESSION['correo']))
		header("location: ../index.php");
	if($_SESSION['tipo'] != "A")
		header("location: ../index.php");

	include("../tools/MySQL.php");
?>