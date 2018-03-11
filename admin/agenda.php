<?php
	include('../controle/sessao.php');  
	include("../controle/conexao.php");

	$servico = $con -> query("SELECT nome_serv FROM servico");

	$sql = $con -> query("SELECT usuario.nome, agenda.data_ag, agenda.hora, agenda.servico, agenda.condicao FROM agenda JOIN usuario WHERE agenda.id_user = usuario.id_user ORDER BY agenda.hora");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadastro</title>
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
		<?php include ("../pgs/menu_admin.html"); ?>
	</header>
	<main class="container">
		<div class="row justify-content-center">
			<form action="#" id="form-data" class="col-md-12 col-sm-12 row justify-content-md-center">
				<div class="col-md-12 border-t">
					<legend class="lg-agenda">Filtrar por:</legend>
				</div>
				<div class="form-group col-md-2">
					<label for="status">Status:</label>
					<select class="form-control border-r-l" id="status">
						<option value="">Todos</option>
						<option value="Confirmado">Confirmados</option>
						<option value="3">Aguardando</option>
						<option value="4">Efetuados</option>
						<option value="5">Vencidos</option>
					</select>					
				</div>

				<div class="form-group col-md-2">
					<label for="servico">Serviço:</label>
					<select class="form-control border-r-n" id="servico">	
						<option value="">Todos</option>
						<?php 
							while ($dados1 = $servico -> fetch_assoc()) {
								echo "<option value='".$dados1['nome_serv']."'>".$dados1['nome_serv']."</option>";
							}
						?>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="data">Data:</label>
					<input type="text" class="form-control border-r-n" id="data" maxlength="10" placeholder="Todas">
				</div>
				<div class="form-group col-md-4">
					<label for="cliente">Nome:</label>
					<input type="text" class="form-control border-r-n" id="cliente" placeholder="nome ou sobrenome...">
				</div>
				<div class="form-group col-md-2 mt-4">
					<button type="button" class="btn btn-md btn-primary btn-block mt-2 border-r-r" id="buscar">BUSCAR</button>
				</div>

				<div class="col-md-12 mb-2"></div>
			</form>
			<div class="col-md-12" id="tb-relatorio">
				<table class="table table-hover mg-table">
					<thead class="th-table">
						<tr>						
							<th scope="col" class="text-center">Data</th>
							<th scope="col" class="text-center">Hora</th>						
							<th scope="col" class="text-center">Cliente</th>
							<th scope="col" class="text-center">Serviço</th>
							<th scope="col" class="text-center">Status</th>
							<th scope="col"class="text-center">Ação</th>
						</tr>
					</thead>
					<tbody class="text-center" id="id-agenda">
						<?php
							while ($dados = $sql -> fetch_assoc()) {
								echo '<tr class="tr-table">';
								echo '<td>'.$dados['data_ag'].'</td>';
								echo '<td>'.$dados['hora'].'</td>';
								echo '<td>'.$dados['nome'].'</td>';
								echo '<td>'.$dados['servico'].'</td>';
								echo '<td>'.$dados['condicao'].'</td>';
								echo '<td>';
								echo '<button type="button" class="btn btn-sm btn-block btn-success" data-toggle="modal" data-target="#editar">Editar</button>';
								echo '</td>';
								echo '</tr>';
							}
						?>
						<div class="load">
							<!--Animação load-->
						</div>						
					</tbody>
				</table>
			</div>
		</div>
		<button onclick="javascript:demoFromHTML();">TESTE RELATORIO</button>
	</main>	
	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="editar">
	  	<div class="modal-dialog modal-lg my-modal ">
	    	<div class="modal-content container">
	    		<div class="modal-header">
	    			<h4 class="modal-title">O que deseja fazer?</h4>
	    			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          	<span aria-hidden="true">&times;</span>
			        </button>	    			
	    		</div>
	    		<div class="row padding-1">
	    			<div class=" col-md-4"><button type="button" class="btn btn-md btn-block btn-danger">Excluir</button></div>
	      			<div class=" col-md-4"><button type="button" class="btn btn-md btn-block btn-info">Editar</button></div>
	      			<div class=" col-md-4"><button type="button" class="btn btn-md btn-block btn-success">Confirmar</button></div>
	    		</div>      		
	    	</div>
	  	</div>
	</div>
	<?php include("../pgs/footer.html"); ?>

	<script type="text/javascript">

		$(function() {
			$("#data").datepicker({
				showOtherMonths: true,
        		selectOtherMonths: true,
				minDate: "-1Y",
				maxDate: "+4M",
				monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
            	dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            	dateFormat: 'dd/mm/yy'
			});
		});
      	$(document).ready(function(e){
        	$("#buscar").click(function(){
        		var status = $("#status").val();
        		var servico = $("#servico").val();
        		var data = $("#data").val();
        		var cliente = $("#cliente").val();
        		$("#title-ag").text(data);
        		$(".load").fadeIn(0);
        		var filtro1 = $("#filtro1").val();
		        $.ajax({
		            type:"POST",
		            url:"../controle/agenda.php?status="+status+"&servico="+servico+"&data="+data+"&cliente="+cliente,
		            dataType:"text",
		            success: function(res){
		              	$(".tr-table").remove();	              			              	
		              	setTimeout(function(){	
			        		$(".load").fadeOut(0);
		              		$("#id-agenda").append(res);
	        			}, 800);
		        	}
		        });
	        });
	    });

      	$('#myModal').on('shown.bs.modal', function(){
		  	$('#myInput').focus()
		});

	  	//Função gerar pdf da tabela
		function demoFromHTML() {
		    var pdf = new jsPDF('p', 'pt', 'letter');
		    // source can be HTML-formatted string, or a reference
		    // to an actual DOM element from which the text will be scraped.
		    source = $('#tb-relatorio')[0];

		    // we support special element handlers. Register them with jQuery-style 
		    // ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
		    // There is no support for any other type of selectors 
		    // (class, of compound) at this time.
		    specialElementHandlers = {
		        // element with id of "bypass" - jQuery style selector
		        '#bypassme': function (element, renderer) {
		            // true = "handled elsewhere, bypass text extraction"
		            return true
		        }
		    };
		    margins = {
		        top: 80,
		        bottom: 60,
		        left: 40,
		        width: 1200
		    };
		    // all coords and widths are in jsPDF instance's declared units
		    // 'inches' in this case
		    pdf.fromHTML(
		    source, // HTML string or DOM elem ref.
		    margins.left, // x coord
		    margins.top, { // y coord
		        'width': margins.width, // max width of content on PDF
		        'elementHandlers': specialElementHandlers
		    },

		    function (dispose) {
		        var data = new Date();
		        var teste = data.getMonth()+1;
		        var format = data.getDate()+'-'+teste+'-'+data.getFullYear();
		        pdf.save('Relatorio-'+format+'.pdf');
		    }, margins);
		}
	</script>
</html>