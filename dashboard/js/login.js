$(document).ready(function(){
	var tipo="";
	/*AjaxStart e AjaxStop*/
	$(document).ajaxStart(function(){ 
		console.log(tipo);
		$('#'+tipo).modal('show');
	});
	$(document).ajaxStop(function(){
		$('#'+tipo).modal('hide'); 
	});
	
	$("#lg_password").on("keypress",function(e){
    	//logar com o Enter
    	var tecla = (e.keyCode?e.keyCode:e.which);
    	if(tecla == 13){
    		$("#bt_entrar").trigger("click");
    	}
	});
	
	$("#bt_entrar").click(function(){
		//valida o e-mail 
		tipo="aguarde";
		$("#ers div").each(function(){//    remove as div  
			$(this).remove();//             remove as div
		});
		$.post("../config/entrar.php", 
		{
			usuario:	$("#lg_email").val(),
			senha:		$("#lg_password").val()
		}, 
		function(data){
			if(data.status=="OK"){
				$("<div></div>").addClass("alert alert-success alert-dismissable").html(data.mensagem+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#ers").fadeIn("slow");
				console.log(data.mensagem);
				$(location).attr('href','http://localhost/infraprime/dashboard/view/index.php?token='+data.token);
			}
			else{
				$("<div></div>").addClass("alert alert-danger alert-dismissable").html(data.mensagem+'<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#ers").fadeIn("slow");
				console.log(data.mensagem);
				
			}
		}, 
		"json");
	});
}); 