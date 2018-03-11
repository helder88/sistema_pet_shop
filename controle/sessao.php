<?php 
	session_start();
	if(!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])){
		header("Location: ../index.php");
		exit;
	}
?>