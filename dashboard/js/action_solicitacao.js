$(document).ready(function(){
/*---------------|FUNCAO PARA SELECIONAR DIRETOR REF A EMPRESA|-----------------\
|	Author: 	Cleber Marrara Prado								|
|	E-mail: 	cleber.arrara.prado@gmail.com						|
|	Version:	1.0													|
\------------------------------------------------------------------*/
	$("#sel_emp").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_Solicitacao.php",
		{
			acao: "populaCheckCat",
			fami: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_dir").html(data);
		},"html");
	});


	
/*---------------|FUNCAO PARA CADASTRO DE DIRETORES|---------------\
|	Author: 	Elvis Leite da Silva								|
|	E-mail: 	elvis7t@gmail.com 									|
|	Version:	1.0													|
\------------------------------------------------------------------*/
$(document.body).on("click","#btn_cadDir",function(){
        var container = $("#formerros1"); 
		$("#cadDir").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
			wrapper: 'li',
			rules: {
				dir_emp_id: {required: true },
				dir_nome : {required: true, minlength: 5}	
			},
			messages:{
				dir_emp_id: {required:"Informe uma empresa para esse Diretor"},
				dir_nome : {required:"Informe o nome do diretor", minlength: "M&iacute;nimo de 5 caracteres."} 
			}
		});
		$("#btn_cadDir").html("<i class='fa fa-spinner fa-spin'></i> Processando...");
		if($("#cadDir").valid()==true){
			$.post("../controller/sys_Solicitacao.php",
				{
				acao:		"caddiretores", 
				dir_emp_id:	$("#dir_emp_id").val(),	
				dir_nome:	$("#dir_nome").val()
			
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#cadDir")[0].reset();
						console.log(data.query);
						$("#c_cad").load("../controller/sys_tbDiretores.php");// atualiza a pagina com o campo inserido
				}				
                else {
                    $("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
                }
				$("#btn_cadDir").html("<i class='fa fa-save'></i> Salvar");
            },"json");
		}
			
 });


/*---------------|FUNCAO PARA CADASTRO DE SOLICITACAO|-----------------\
|	Author: 	Elvis Leite da Silva								|
|	E-mail: 	elvis7t@gmail.com 									|
|	Version:	1.0													|
\------------------------------------------------------------------*/	
	$(document.body).on("click","#btn_cadSolic",function(){
        var container = $("#formerros1");
		$("#cadSolic").validate({ 
            debug: true,
            errorClass: "error",
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li',
            rules: {
                sel_emp			: {required: true},
                sel_dir	  		: {required: true},
                solic_titulo	: {required: true},
                solic_desc		: {required: true}
            },
            messages: {
                sel_emp 		: {required: "Selecione uma Empresa"},
                sel_dir			: {required: "Selecione o diretor"},
                solic_titulo	: {required: "Descreva sua Solicitação "},
                solic_desc		: {required: "Descreva a Altura"}
            }
        });
		$("#btn_cadSolic").html("<i class='fa fa-spinner fa-spin'></i> Processando...");
		if($("#cadSolic").valid()==true){		
			$.post("../controller/sys_Solicitacao.php",
			{
			acao:			"cadSolicitacao",
			solic_emp:		$("#sel_emp").val(), 
			solic_dir:		$("#sel_dir").val(),
			solic_titulo:	$("#solic_titulo").val(),
			solic_desc:		$("#solic_desc").val()
			
			
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					 $("#cadSolic")[0].reset();// apaga os campos
					console.log(data.query);
					$("#p_cad").load("../controller/sys_tbAutorizacao.php");// atualiza a pagina com o campo inserido
				
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadSolic").html("<i class='fa fa-save'></i> Enviar");  
			}, "json");  
		}
	});
	
});	
