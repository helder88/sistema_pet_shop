<?php 
	include("conexao.php");
	include("sessao.php");

	$id_user = $_SESSION['id_user'];

	$recebido = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $filtrado = array_map('strip_tags', $recebido);
    $dados = array_map('trim', $filtrado);

    if(in_array('', $dados)){#verifica campos vazios ------------------------------------------------------->
    	$_SESSION['msg'] = "Existem campos vazios!";
		echo "<script>history.back();</script>";
    }else{
    	$agenda = $con -> query("SELECT * FROM agenda WHERE data_ag = '".$dados['data-ag']."' AND pet = '".$dados['pet']."'");
		$row = $agenda ->num_rows;

		if ($row >= 1) {
			$_SESSION['msg'] = "Você já possui um agendamento nesta data para o mesmo Pet! </br> Caso queira pode reagenda-lo!";
			echo "<script>history.back();</script>";
		}else{
			$servico = $_POST['servico'];
			$hora_ag = $_POST['hora-ag'];

			$con -> query("INSERT INTO  `agenda` (`id_user`, `data_ag`, `hora`, `servico`, `pet`) VALUES ('$id_user', '".$dados['data-ag']."', '".$dados['hora-ag']."', '".$dados['servico']."', '".$dados['pet']."')");

			$_SESSION['msg'] = "Agendamento realizado com sucesso!";
			header("Location: ../cliente/agenda.php");
		}
    }
 ?>