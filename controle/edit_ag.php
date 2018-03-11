<?php 
	include("conexao.php");
	$acao = $_POST['acao'];
	if ($acao == 1) {
		$nv_data = $_POST['nv-data'];
		$nv_hora = $_POST['nv-hora'];
		$nv_serv = $_POST['nv-servico'];
		$nv_pet = $_POST['nv-pet'];
		$id_ag = $_POST['id_ag'];

		$sql = $con -> query("UPDATE `agenda` SET `data_ag`='$nv_data', `hora`='$nv_hora', `servico`='$nv_serv', `pet`='$nv_pet' WHERE `id_ag`='$id_ag'");
		echo "<meta http-equiv='refresh' content='0, url=../cliente/agenda.php'>";
	}elseif ($acao == 2) {
		$id_ag = $_POST['id_ag_cl'];
		$sql = $con -> query("DELETE FROM `agenda` WHERE `id_ag`='$id_ag'");
		echo "<meta http-equiv='refresh' content='0, url=../cliente/agenda.php'>";
	}
?>