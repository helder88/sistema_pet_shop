//validar senha
$(document).ready(function(e){
	$("#senha").keyup(function(){
		var senha1 = $("#senha").val();
		var senha2 = $("#senha2").val();		
		var p1 = $("#senha").val().length;

		if (senha1 == senha2 && p1 >=6){
			$("#senha").css("background", "#54FF9F");
			$("#senha2").css("background", "#54FF9F");
			$("#btn-cadastrar").removeAttr("disabled");
			$("#btn-cadastrar").removeAttr("title");
		}else{
			$("#senha").css("background", "#fff");
			$("#senha2").css("background", "#fff");
			$("#btn-cadastrar").attr("disabled", "disabled");
			$("#btn-cadastrar").attr("title", "As senhas não conferem");
		}
	});
	$("#senha2").keyup(function(){
		var senha1 = $("#senha").val();
		var senha2 = $("#senha2").val();
		var p2 =$("#senha2").val().length;

		if (senha1 == senha2 && p2 >=6){
			$("#senha").css("background", "#54FF9F");
			$("#senha2").css("background", "#54FF9F");
			$("#btn-cadastrar").removeAttr("disabled");
			$("#btn-cadastrar").removeAttr("title");
		}else{
			$("#senha2").css("background", "#fff");
			$("#senha").css("background", "#fff");
			$("#btn-cadastrar").attr("disabled", "disabled");
			$("#btn-cadastrar").attr("title", "As senhas não conferem");
		}
	});
//____________________________________________________________________
	//cadastro
	//mascaras e calendario dos forms de data.
	 $('#telefone').mask("(99) 99999-9999");
	 $('#whatsapp').mask("(99) 99999-9999");
	 $('#data_nasc').mask("99/99/9999"); 
	 $('#data_pet').mask("99/99/9999");  

	 $( function() {
		$( "#data_nasc").datepicker({
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
//____________________________________________________________________

//agendamento cliente
	$('.data').mask("99/99/9999"); 
		
	$(".btn-rg").click(function(){//id do agendamendo no input hidem para reagendar
		$("#id_ag").val($(this).val());
	});

	$(".btn-cl").click(function(){//id do agendamendo no input hidem para cancelar
	  	$("#id_ag_cl").val($(this).val());
	});

	$("#btn-ag").click(function(){//mostrar agendamentos existentes
		$(".tb-ag").slideToggle();
	});

	$( function() {//form de reagendamento no modal
		$( "#nv-data").datepicker({
			showOtherMonths: true,
    		selectOtherMonths: true,
			minDate: 0,
			maxDate: "+4M",
        	monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        	dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        	dateFormat: 'dd/mm/yy'
		});
	});
	
	$( function() {//form de novo agendamento
		$( "#data-ag").datepicker({
			showOtherMonths: true,
    		selectOtherMonths: true,
			minDate: 0,
			maxDate: "+4M",
        	monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
        	dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
        	dateFormat: 'dd/mm/yy'
		});
	});	

	$(document).ready(function(e) {
		$("#data-ag").change(function(){//exibir horarios disponiveis - novo agendamento
			var data = $(this).val();
			$.ajax({
				type:"POST",
				url:"../controle/busca_hora.php?data="+data,
				dataType:"text",
				success: function(res){
					$("#hora-ag").children(".hora").remove();
					$("#hora-ag").append(res);
				}
			});
		});

		$("#nv-data").change(function(){//exibir horarios disponiveis - reagendamento
			var data = $(this).val();
			$.ajax({
				type:"POST",
				url:"../controle/busca_hora.php?data="+data,
				dataType:"text",
				success: function(res){
					$("#nv-hora").children(".hora").remove();
					$("#nv-hora").append(res);
				}
			});
		});
	});
});