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
		<form action="../controle/cad_serv.php" method="post" class="row justify-content-md-center">
			<fieldset class="col-md-12 field-form">
				<legend class="legend">Cadastro de Serviço</legend>				
				<div class="row justify-content-md-center">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nome_serv">Nome do Serviço: <span class="obgtr">*</span></label>
							<input type="text" name="nome_serv" class="form-control" id="nome_serv" required>
						</div>
						<div class="form-group date">
							<label for="tempo">Tempo Sessão: <span class="obgtr">*</span></label>
							<select type="text" name="tempo" class="form-control" id="tempo" required>
								<option value="">Selecione</option>
								<option value="01:00">1 hora</option>
								<option value="02:00">2 horas</option>
							</select>
						</div>						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="grupo">Grupo: <span class="obgtr">*</span></label>
							<select name="grupo" class="form-control" id="grupo" required>
								<option value="">Selecione</option>
								<option value="Higiene">Higienico</option>
								<option value="Estético">Estético</option>
								<option value="Veterinário">Veterinário</option>
							</select> 
						</div>
						<div class="form-group">
							<label for="observacao">Observações: </label>
							<textarea type="text" rows="4" name="observacao" class="form-control" id="observacao"></textarea>
						</div>												
					</div>
					<div class="col-md-6">
						<button type="submit" class="btn btn-md btn-block btn-primary" id="btn-cadastrar" title="Verifique sua senha">CADASTRAR</button>
					</div>
				</div>
			</fieldset>
		</form>
	</main>

	<?php include("../pgs/footer.html"); ?>
</html>