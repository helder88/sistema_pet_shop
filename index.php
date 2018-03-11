<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Iniciao</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
	<header>
		<?php include ("pgs/menu_geral.html"); ?>
	</header>
	<main class="container">
		<form action="controle/autenticar.php" method="POST" class="row justify-content-md-center">
			<fieldset class="col-md-4 field-form">
				<legend class="legend">Entre</legend>
				<div class="form-group">
					<label for="usuario">Usuário:</label>
					<input type="text" name="usuario" id="usuario" class="form-control" required="">	
				</div>
				<div class="form-group">
					<label for="senha">Senha:</label>
					<input type="password" name="senha" id="senha" class="form-control" required="">	
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-md btn-block btn-primary">ENTRAR</button>
				</div>
			</fieldset>
		</form>
	</main>
	<div>
		<?php include("pgs/footer.html"); ?>
	</div>
</body>
</html>