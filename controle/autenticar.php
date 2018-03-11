<?php 
	include('conexao.php');

	$usuario = $_POST['usuario'];
	$senha = md5($_POST['senha']);

	$sql = $con -> query("select * from usuario where usuario ='$usuario' and senha = '$senha'");
	$dados = $sql->fetch_assoc();
	$row = $sql->num_rows;

	if ($dados['tipo']==1){
		session_start();
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['senha'] = $_POST['senha'];
		$_SESSION['nome'] = $dados['nome'];
		$_SESSION['tipo'] = $dados['tipo'];
		$_SESSION['id_user'] = $dados['id_user'];
		header("Location: ../admin/agenda.php");
	}elseif ($dados['tipo']==2){
		session_start();
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['senha'] = $_POST['senha'];
		$_SESSION['nome'] = $dados['nome'];
		$_SESSION['tipo'] = $dados['tipo'];
		$_SESSION['id_user'] = $dados['id_user'];
		header("Location: ../cliente/home.php");
	}else{
		echo "<script>alert('Ops! Seus dados estão incorretos!'); history.back();</script>";
	}
?>