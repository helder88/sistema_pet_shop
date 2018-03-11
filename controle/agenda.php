<?php 
	include("conexao.php");

	@$status = $_GET['status'];
	@$servico = $_GET['servico'];
	@$data = $_GET['data'];
	@$cliente = $_GET['cliente'];
	
	$sql = "SELECT usuario.nome, agenda.data_ag, agenda.hora, agenda.servico, agenda.condicao FROM agenda JOIN usuario WHERE agenda.id_user = usuario.id_user";

	if ($data != "") {
		$sql .= " AND agenda.data_ag = '".$data."'";
	}
	if ($servico != "") {
		$sql .= " AND agenda.servico = '".$servico."'";
	}
	if ($status != "") {
		$sql .= " AND agenda.condicao = '".$status."'";
	}
	if ($cliente != "") {
		$sql .= " AND usuario.nome LIKE '%".$cliente."%'";
	}

	$sql .= " ORDER BY agenda.data_ag";
	$linhas = $con -> query($sql);

	while ($dados = $linhas -> fetch_assoc()) {
		echo '<tr class="tr-table">';
		echo '<td>'.$dados['data_ag'].'</td>';
		echo '<td>'.$dados['hora'].'</td>';
		echo '<td>'.$dados['nome'].'</td>';
		echo '<td>'.$dados['servico'].'</td>';
		echo '<td>'.$dados['condicao'].'</td>';
		echo '<td>';
		echo '<button type="button" class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#editar">Editar</button>';
		echo '</td>';
		echo '</tr>';
	}
?>