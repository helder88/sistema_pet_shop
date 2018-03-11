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
});