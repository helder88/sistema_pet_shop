<?php 
	include('conexao.php');
    include('sessao.php');

    $btn_cad = filter_input(INPUT_POST, 'cadastro', FILTER_SANITIZE_STRING);

    if($btn_cad){
        $nome_foto = null;
        $recebido = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $filtrado = array_map('strip_tags', $recebido);
        $dados = array_map('trim', $filtrado);

        #var_dump($dados);

        #pegar nome da foto
        $foto = strtolower(substr($_FILES['foto']['name'], -4));

        if (($dados['nome'] == '') || ($dados['sobrenome'] == '') || ($dados['data_nasc'] == '') || ($dados['telefone'] == '') || ($dados['cidade'] == '') || ($dados['bairro'] == '') || ($dados['numero'] == '')) {#verifica campos dados pessoais vazios 
            echo "<script> alert('Dados pessoais faltando!'); history.back(); </script>"; 
            
        }elseif (($dados['pet'] == '') || ($dados['especie'] == '')) {#verifica campos dados do pet vazios 
            echo "<script> alert('Dados do pet faltando!'); history.back(); </script>"; 
            
        }elseif (($dados['usuario'] == '') || ($dados['email'] == '')) {#verifica campos dados do pet vazios 
            echo "<script> alert('Dados de acesso faltando!'); history.back(); </script>"; 
            
        }elseif (($dados['senha'] != $dados['senha2']) || ($dados['senha'] < 6)) {#verifica as senhas
            $_SESSION['msg'] = "As senhas não conferem!";
            echo "<script>history.back();</script>";

        }elseif (!empty($foto)) {#faz o upload da foto e muda o nome
    		$nome_foto= md5(time()).$foto;
    	    $diretorio = "../fotos/";
    		move_uploaded_file($_FILES['foto']['tmp_name'], $diretorio.$nome_foto);

        }else{#caso todas as outras sejam falsas
        	#criptografa a senha
            $dados['senha'] = md5($dados['senha']); 

            #verifica se o usuario já existe no banco
            $verif_user = $con->query("select usuario from usuario where usuario = '".$dados['usuario']."'");
            $num_user = $verif_user->num_rows;

            #verficar se o e-mail já existe no banco
            $verif_email = $con->query("select email from usuario where email = '".$dados['email']."'");
            $num_email = $verif_email->num_rows;

            if($num_user>0){#caso já exista um usuario
                $_SESSION['msg'] = "Usuário já existente! Por favor tente um Usuário diferente!";
                echo "<script>history.back();</script>";
            }elseif($num_email>0){#caso já exita o e-mail
                $_SESSION['msg'] = "E-mail já existente! Por favor tente um E-mail diferente!";
                echo "history.back();</script>";
            }else{#cadastra o usuario e o pet
                $con -> query("INSERT INTO `usuario` (`nome`, `sobrenome`, `data_nasc`, `telefone`, `whatsapp`, `rua`, `numero`, `bairro`, `cidade`, `usuario`, `email`, `senha`) VALUES ('".$dados['nome']."', '".$dados['sobrenome']."', '".$dados['data_nasc']."', '".$dados['telefone']."', '".$dados['whatsapp']."', '".$dados['rua']."', '".$dados['numero']."', '".$dados['bairro']."', '".$dados['cidade']."', '".$dados['usuario']."', '".$dados['email']."', '".$dados['senha']."')") or die($con -> error);

                $pet = $con->query("select id_user from usuario where usuario = '".$dados['usuario']."'");
                $user = $pet -> fetch_assoc();#pega o id do dono do pet
                $id_user = $user['id_user'];

                $result = $con -> query("INSERT INTO `pet` (`id_user`, `nome_pet`, `especie`, `data_pet`, `raca`, `peso`, `foto`, `cuidados`) VALUES ('$id_user', '".$dados['pet']."', '".$dados['especie']."', '".$dados['data_pet']."', '".$dados['raca']."', '".$dados['peso']."', '$nome_foto', '".$dados['cuidados']."');") or die($con -> error);
                
                echo "<script>alert('Cliente adastrado com sucesso!');</script>";
                echo "<meta http-equiv='refresh' content='0, url=../admin/cadastro.php'>";
            }
        }
    }
 ?>