<?php 
	include("conexao.php");
	include("sessao.php");

    $recebido = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    $filtrado = array_map('strip_tags', $recebido);
    $dados = array_map('trim', $filtrado);

    #var_dump($dados);

    if (in_array('', $dados)) {
    	$_SESSION['msg'] = "Existem campos vazios!";
		echo "<script>history.back();</script>";
    	
    }else{
    	if ($dados['acao'] == 1) {
			$sql = $con -> query("UPDATE `agenda` SET `data_ag`='".$dados['nv-data']."', `hora`='".$dados['nv-hora']."', `servico`='".$dados['nv-servico']."', `pet`='".$dados['nv-pet']."' WHERE `id_ag`='".$dados['id_ag']."'");

			$_SESSION['msg'] = "Reagendado com sucesso!";
			header("Location: ../cliente/agenda.php");

		}elseif ($dados['acao']== 2) {
			$sql = $con -> query("DELETE FROM `agenda` WHERE `id_ag`='".$dados['id_ag_cl']."'");

			$_SESSION['msg'] = "Agendamento cancelado com sucesso!";
			header("Location: ../cliente/agenda.php");
		}
    }
?>