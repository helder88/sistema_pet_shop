<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$bd = "bd_pet";
	$link = $con = new mysqli($host, $user, $pass, $bd);
	mysqli_set_charset( $link, 'utf8');
 ?>