<?php 
	include("conexao.php");
	include("sessao.php");
	$id_user = $_SESSION['id_user'];	
	$data_ag = $_POST['data-ag'];
	$pet = $_POST['pet'];

	$slq = $con -> query("SELECT * FROM agenda WHERE data_ag = '$data_ag' AND pet = '$pet'");

	$row = $slq ->num_rows;
	if ($row >= 1) {
		echo "<script>alert('Você já possui um agendamento nesta data para o mesmo Pet!'); history.back();</script>";
	}else{
		$servico = $_POST['servico'];
		$hora_ag = $_POST['hora-ag'];

		$con -> query("INSERT INTO  `agenda` (`id_user`, `data_ag`, `hora`, `servico`, `pet`) VALUES ('$id_user', '$data_ag ', '$hora_ag', '$servico', '$pet')");
		echo "<script>alert('Agendamento realizado com sucesso!');</script>";
		echo "<meta http-equiv='refresh' content='0, url=../cliente/agenda.php'>";
	}
 ?>