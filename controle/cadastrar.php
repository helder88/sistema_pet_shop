<?php 
	include('conexao.php');

    $nome = $_POST['nome'];
    $data_nasc = $_POST['data_nacs'];
    $telefone = $_POST['telefone'];
    $whatsapp = $_POST['whatsapp'];
    $rua = $_POST['rua'];
    $numero = $_POST['numero'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = md5($_POST['senha']);

    $nome_pet = $_POST['nome_pet'];
    $especie = $_POST['especie'];
    $data_pet = $_POST['data_pet'];
    $raca = $_POST['raca'];
    $peso = $_POST['peso'];
    $foto = strtolower(substr($_FILES['foto']['name'], -4));
    if (!empty($foto)) {
    	/*Upload de foto*/
		$nome_foto= md5(time()).$foto;
	    $diretorio = "../fotos/";
		move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$nome_foto);
    }else{
    	$nome_foto = null;
    }

    $cuidados = $_POST['cuidados']; 

	/*verificar usuario e email existentes*/
    $verif_user = $con->query("select usuario from usuario where usuario = '$usuario'");
    $num_user = $verif_user->num_rows;

    $verif_email = $con->query("select email from usuario where email = '$email'");
    $num_email = $verif_user->num_rows;

    if($num_user>0){
    	echo "<script>alert('Usuário já existente! Por favor tente um Usuário diferente!'); history.back();</script>";
    }elseif($num_email>0){
    	echo "<script>alert('E-mail já existente! Por favor tente um E-mail diferente!'); history.back();</script>";
    }else{/*cadastra o usuario e o pet*/
    	$con -> query("INSERT INTO `usuario` (`nome`, `data_nasc`, `telefone`, `whatsapp`, `rua`, `numero`, `bairro`, `cidade`, `usuario`, `email`, `senha`) VALUES ('$nome', '$data_nasc', '$telefone', '$whatsapp', '$rua', '$numero', '$bairro', '$cidade', '$usuario', '$email ', '$senha')") or die($con -> error);

    	$dados = $con->query("select id_user from usuario where usuario = '$usuario'");
    	$user = $dados -> fetch_assoc();/*pega o id do dono do pet*/
    	$id = $user['id_user'];
    	$con -> query("INSERT INTO `pet` (`id_user`, `nome_pet`, `especie`, `data_pet`, `raca`, `peso`, `foto`, `cuidados`) VALUES ('$id', '$nome_pet', '$especie', '$data_pet', '$raca', '$peso', '$nome_foto', '$cuidados')") or die($con -> error);
    	echo "<script>alert('Cliente adastrado com sucesso!');</script>";
		echo "<meta http-equiv='refresh' content='0, url=../admin/cadastro.php'>";
    }
 ?>