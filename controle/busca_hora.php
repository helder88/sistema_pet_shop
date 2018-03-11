<?php 
	include("conexao.php");

	$data = $_GET['data'];
	$dados = $con -> query("SELECT horario.hora FROM horario WHERE horario.hora NOT IN (SELECT agenda.hora FROM agenda WHERE agenda.data_ag = '$data')");
	
	while ($hora = $dados -> fetch_assoc()) {
		echo '<option class="hora" value="'.$hora['hora'].'">'.$hora['hora'].'</option>';
	}
 ?>