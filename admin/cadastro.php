<?php include('../controle/sessao.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
	<?php include ("../pgs/head.html"); ?>
	<style type="text/css">
		.cadastro{	
			background: rgba(4, 172, 131, 1);
			border-bottom:solid 3px rgba(4, 172, 131, 1);
			border-top:solid 3px rgba(4, 172, 131, 1);
		}
	</style>
</head>
<body>
	<header>
		<?php include ("../pgs/menu_admin.html"); ?>
	</header>
	<main class="container">		
		<form action="../controle/cadastrar.php" method="post" enctype="multipart/form-data" class="row justify-content-md-center">
			<fieldset class="col-md-12 field-form">
				<legend class="legend">Dados Pessoais</legend>				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nome">Nome: <span class="obgtr">*</span></label>
							<input type="text" name="nome" class="form-control" id="nome" placeholder="Nome completo" required>
						</div>
						<div class="form-group date">
							<label for="data_nacs">Data de Nascimento: <span class="obgtr">*</span></label>
							<input type="text" name="data_nacs" class="form-control" id="data_nacs" required>
						</div>
						<div class="form-group">
							<label for="telefone">Telefone: <span class="obgtr">*</span></label>
							<input type="text" name="telefone" class="form-control" id="telefone" placeholder="Somente números" required>
						</div>
						<div class="form-group">
							<label for="whatsapp">WhatSapp:</label>
							<input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="Somente números">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="rua">Rua: <span class="obgtr">*</span></label>
							<input type="text" name="rua" class="form-control" id="rua" required>
						</div>
						<div class="form-group">
							<label for="numero">Número: <span class="obgtr">*</span></label>
							<input type="text" name="numero" class="form-control" id="numero" required>
						</div>
						<div class="form-group">
							<label for="bairro">Bairro: <span class="obgtr">*</span></label>
							<input type="text" name="bairro" class="form-control" id="bairro" required>
						</div>
						<div class="form-group">
							<label for="cidade">Cidade: <span class="obgtr">*</span></label>
							<input type="text" name="cidade" class="form-control" id="cidade" required>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset class="col-md-12 field-form">
				<legend class="legend text-center">Dados do Pet</legend>				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nomeAnimal">Nome: <span class="obgtr">*</span></label>
							<input type="text" name="nome_pet" class="form-control" id="nomeAnimal" required>
						</div>
						<div class="form-group">
							<label for="especie">Especie: <span class="obgtr">*</span></label>
							<select name="especie" class="form-control" id="especie" required>
								<option>Selecione</option>
								<option value="gato">Gato</option>
								<option value="cao">Cão</option>
								<option value="porco">Porco</option>
							</select>
						</div>
						<div class="form-group">
							<label for="data_pet">Data Nascimento:</label>
							<input type="text" name="data_pet" class="form-control" id="data_pet">
						</div>
						<div class="form-group">
							<label for="raca">Raça:</label>
							<input type="text" name="raca" class="form-control" id="raca">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="peso">Peso:</label>
							<input type="text" name="peso" class="form-control" id="peso" placeholder="Somente números">
						</div>
						<div class="form-group">
							<label for="foto">Foto:</label>
							<input type="file" accept="image/*" name="foto" class="form-control" id="foto">
						</div>
						<div class="form-group">
							<label for="cuidados">Cuidados/Restrições:</label>
							<textarea name="cuidados" class="form-control text-height" id="cuidados"></textarea>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset class="col-md-12 field-form">
				<legend class="legend">Dados de Acesso</legend>				
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="usuario">Usuário: <span class="obgtr">*</span></label>
							<input type="text" name="usuario" class="form-control" id="usuario" placeholder="Ex: joao85, maria19..." required>
						</div>
						<div class="form-group">
							<label for="email">E-mail: <span class="obgtr">*</span></label>
							<input type="email" name="email" class="form-control" id="email" placeholder="exemplo@exemplo.com" required>
						</div>						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="senha">Senha: <span class="obgtr">*</span></label>
							<input type="password" name="senha" class="form-control" id="senha" required placeholder="Mínimo 06 dígitos(números ou letras)">
						</div>
						<div class="form-group">
							<label for="senha2">Confirmar Senha: <span class="obgtr">*</span></label>
							<input type="password" name="senha2" class="form-control" id="senha2" required>
						</div>
					</div>
				</div>
			</fieldset>
			<div class="col-md-6 form-group">
				<button type="submit" class="btn btn-md btn-block btn-primary" id="btn-cadastrar" title="Verifique sua senha">CADASTRAR</button>
			</div>
		</form>
	</main>

	<?php include("../pgs/footer.html"); ?>

	<script type="text/javascript">
		//mascaras e calendario dos forms de data.
		 $('#telefone').mask("(99) 99999-9999");
		 $('#whatsapp').mask("(99) 99999-9999");
		 $('#data_nacs').mask("99/99/9999"); 
		 $('#data_pet').mask("99/99/9999");  

		 $( function() {
			$( "#data_nacs").datepicker({
				showOtherMonths: true,
        		selectOtherMonths: true,
        		changeYear: true,
				minDate: "-100Y",
				maxDate: "-18Y",
            	monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
				monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            	dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            	dateFormat: 'dd/mm/yy'
			});
		});

		 $( function() {
			$( "#data_pet").datepicker({
				showOtherMonths: true,
        		selectOtherMonths: true,
				changeYear: true,
				minDate: "-30Y",
				maxDate: 0,
            	monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
				monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            	dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            	dateFormat: 'dd/mm/yy'
			});
		});
	</script>
</html>