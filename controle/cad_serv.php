<?php 
	include("conexao.php");

	$nome = $_POST['nome_serv'];
	$tempo = $_POST['tempo'];
	$grupo = $_POST['grupo'];
	$observ = $_POST['observacao'];

	$sql = $con -> query("SELECT * FROM servico WHERE nome_serv = '$nome'");
	$row = $sql -> num_rows;
	
	if ($row >=1){
		echo "<script>alert('Serviço já cadastrado!'); history.back();</script>";
	}else{
		$con -> query("INSERT INTO `servico` (`nome_serv`, `tempo`, `grupo`, `observacao`) VALUES ('$nome', '$tempo', '$grupo', '$observ')");
		echo "<script>alert('Serviço adicnionado com sucesso!');</script>";
		echo "<meta http-equiv='refresh' content='0, url=../admin/cad_servico.php'>";
	}	
 ?>