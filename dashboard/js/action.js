$(document).ready(function(){
/*------------------------|DESCARTAR  EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
		$(document.body).on("click","#btn_form", function(){
        var container = $("#formerros");
		console.log("CLICK OK");
		
			    
					
		$("#contato").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
               
                
			}, 
			messages:{
				
                name   : {required: "Desc. o Motivo, em Ativo marque inativo"},
                email   : {required: "Desc. o Motivo, em Ativo marque inativo"},
                subject    : {required: "Desc. o Motivo, em Ativo marque inativo"},
                message   : {required: "Desc. o Motivo, em Ativo marque inativo"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		}); 
		
				
		if($("#contato").valid()==true){ 
			$("#btn_form").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("sendemail.php",
				{  
				acao: "Sender",
				name     : $("#name").val(),
                email    : $("#email").val(),
                subject  : $("#subject").val(),
                message  : $("#message").val()
				//eq_ativo:  $("input[name=eq_ativo]:checked").val()   
							 
				},function(data){ 
					if (data.status == "OK") {
						$("#confirma").modal("hide");
						$("#aguarde").modal("show");
						$(location).attr('href','sendemail.php'); 
				} 
				else{
					alert(data.mensagem);	
				}
			}, "json");
			}
		});
			
	/*---------------|FIM DE DESCARTAR EQUIPAMENTOS|------------------*/	
/*---------------|FIM DA FUNCAO|------------------*/		
});	