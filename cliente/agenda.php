<?php
	include('../controle/sessao.php');
	include('../controle/conexao.php');
	$id_user = $_SESSION['id_user'];
	$servico1 = $con -> query("SELECT nome_serv FROM servico");
	$pet1 = $con -> query("SELECT nome_pet FROM pet WHERE id_user = '$id_user'");
	$servico2 = $con -> query("SELECT nome_serv FROM servico");
	$pet2 = $con -> query("SELECT nome_pet FROM pet WHERE id_user = '$id_user'");
	$slq2 = $con -> query("SELECT * FROM agenda WHERE id_user = '$id_user' ORDER BY data_ag");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Agendar</title>
	<?php include ("../pgs/head.html"); ?>
	<style type="text/css">
		.agenda{	
			background: rgba(4, 172, 131, 1);
			border-bottom:solid 3px rgba(4, 172, 131, 1);
			border-top:solid 3px rgba(4, 172, 131, 1);
		}
	</style>
</head>
<body>
	<header>
		<?php include ("../pgs/menu_cliente.html"); ?>
	</header>

	<main class="container">
		<div class="row justify-content-md-center mb-5 pb-2 border-b">
			<div class="col-md-12">
				<div class="titulo row justify-content-md-center">
					<div class="col">
						<h4 class="text-center text-white">Agendamentos existentes: <button class="btn btn-sm btn-secondary" id="btn-ag" style="color: #ffd166" title="Click para exibir">EXIBIR</button></h4>		
					</div>
				</div>
			</div>			
			<table class="table table-hover table-responsive col-md-7 col-sm-12 col-xs-12 col-12 text-center tb-ag" style="height: 20em; display: none;">
			  	<thead>
			    	<tr>
			    		<th class="text-center">Data</th>
				      	<th class="text-center">Horário</th>
				      	<th class="text-center">Serviço</th>
				      	<th class="text-center">Pet</th>
				      	<th class="text-center">Reagendar</th>
				      	<th class="text-center">Cancelar</th>
			    	</tr>
			  	</thead>
			  	<tbody>			    	
			    	<?php 
						while ($agenda = $slq2 -> fetch_assoc()) {
							echo "<tr>";
							echo '<td id="data_atu'.$agenda['data_ag'].'">'.$agenda['data_ag'].'</td>';
				      		echo '<td id="hora_atu">'.$agenda['hora'].'</td>';
				      		echo "<td>".$agenda['servico']."</td>";
				      		echo "<td>".$agenda['pet']."</td>";
				      		echo '<td><button value="'.$agenda['id_ag'].'" class="btn btn-sm btn-info btn-block btn-rg" data-toggle="modal" data-target="#reagendar">Reagendar</button></td>';
				      		echo '<td><button value="'.$agenda['id_ag'].'" class="btn btn-sm btn-danger btn-block btn-cl" data-toggle="modal" data-target="#cancelar" id="btn-cl">Cancelar</button></td>';
				    		echo "</tr>";
						}
					 ?>
			  	</tbody>
			</table>	
		</div>

		<div class="row justify-content-center mb-4">
			<?php 
				if(isset($_SESSION['msg'])){
					echo "<div class='alert alert-success text-center' role='alert'>".$_SESSION['msg']."</div>";
					unset($_SESSION['msg']);
				}			 
			  ?>
		 </div>

		<form action="../controle/cadastrar_ag.php" method="post" class="row justify-content-md-center">
			<fieldset class="col-md-12 field-form">
				<legend class="legend">Novo Agendamento</legend>				
				<div class="row justify-content-md-center">
					<div class="col-md-6">
						<div class="form-group">
							<label for="servico">Serviço:</span></label>
							<select class="form-control" name="servico" id="servico" required>
								<option value="">Selecione</option>
								<?php 
									while ($dados1 = $servico1 -> fetch_assoc()) {
										echo "<option value='".$dados1['nome_serv']."'>".$dados1['nome_serv']."</option>";
									}
								 ?>
							</select>
						</div>
						<div class="form-group">
							<label for="pet">Pet:</label>
							<select class="form-control" name="pet" id="pet" required>
								<option value="">Selecione</option>
								<?php 
									while ($dados2 = $pet1 -> fetch_assoc()) {
										echo "<option value='".$dados2['nome_pet']."'>".$dados2['nome_pet']."</option>";
									}
								 ?>
							</select>
						</div>						
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="data-ag">Data:</label>
							<input type="text" name="data-ag" class="form-control data" id="data-ag" required>
						</div>
						<div class="form-group">
							<label for="hora-ag">Horário:</label>
							<select class="form-control" name="hora-ag" id="hora-ag" required="">
								<option value="">Selecione</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-6">
						<button type="submit" class="btn btn-md btn-block btn-success">AGENDAR</button>
					</div>
				</div>
			</fieldset>						
		</form>
	</main>

	<!-- div modal reagendar -->
	<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="reagendar">
	  	<div class="modal-dialog modal-md my-modal modal-mobile">
	    	<div class="modal-content container">
	    		<div class="modal-header">
	    			<h4 class="modal-title">Selecione o novo horário</h4>
	    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	    				<span aria-hidden="true">&times;</span>
			        </button>	    			
	    		</div>
	    		<form action="../controle/edit_ag.php" method="post">
		    		<div class="modal-body">
		      			<div class="form-group">
		      				<label for"nv-data">Nova data:</label>
		      				<input type="text" name="nv-data" id="nv-data" class="form-control data" maxlength="10" required="">
		      			</div>
		      			<div class="form-group">
		      				<label for"nv-hora">Novo horário:</label>
		      				<select class="form-control" name="nv-hora" id="nv-hora" required="">
								<option value="">Selecione</option>
							</select>
		      			</div>
		      			<div class="form-group">
		      				<label for="nv-servico">Serviço:</label>
							<select class="form-control" name="nv-servico" id="nv-servico" required>
								<option value="">Selecione</option>
								<?php 
									while ($dados3 = $servico2 -> fetch_assoc()) {
										echo "<option value='".$dados3['nome_serv']."'>".$dados3['nome_serv']."</option>";
									}
								 ?>
							</select>
						</div>
						<div class="form-group">
							<label for="nv-pet">Pet:</label>
							<select class="form-control" name="nv-pet" id="nv-pet" required>
								<option value="">Selecione</option>
								<?php 
									while ($dados4 = $pet2 -> fetch_assoc()) {
										echo "<option value='".$dados4['nome_pet']."'>".$dados4['nome_pet']."</option>";
									}
								 ?>
							</select>
						</div>
		      			<input type="hidden" id="id_ag" name="id_ag" value="">
		      			<input type="hidden" name="acao" value="1">				        
				    </div>
		    		<div class="row padding-1">
		      			<div class="col-md-6 col-xs-6 col-sm-6 col-6">
		      				<button type="submit" class="btn btn-md btn-block btn-success">Confirmar</button>
		      			</div>
		      			<div class="col-md-6 col-xs-6 col-sm-6 col-6">
		      				<button type="button" class="btn btn-md btn-block btn-warning" data-dismiss="modal" aria-label="Close">Fechar</button>
		      			</div>
		    		</div>
	    		</form>      		
	    	</div>
	  	</div>
	</div>
	<!-- div modal cancelar agendamento -->
	<div class="modal fade bd-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="cancelar">
	  	<div class="modal-dialog modal-md my-modal modal-mobile">
	    	<div class="modal-content container">
	    		<div class="modal-header">
	    			<h4 class="modal-title">Deseja realente excuir seu agendamento?</h4>
	    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>	    			
	    		</div>
	    		<form action="../controle/edit_ag.php" method="post">
		    		<div class="modal-body">
		    			<label id="teste"></label>
		      			<input type="hidden" id="id_ag_cl" name="id_ag_cl" value="">
		      			<input type="hidden" name="acao" value="2">				        
				    </div>
		    		<div class="row padding-1">
		      			<div class="col-md-6 col-xs-6 col-sm-6 col-6">
		      				<button type="submit" class="btn btn-md btn-block btn-success">Sim</button>
		      			</div>
		      			<div class="col-md-6 col-xs-6 col-sm-6 col-6">
		      				<button type="button" class="btn btn-md btn-block btn-warning" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">Não</button>
		      			</div>
		    		</div>
	    		</form>      		
	    	</div>
	  	</div>
	</div>

	<?php include("../pgs/footer.html"); ?>
</body>
</html>