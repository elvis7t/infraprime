$(document).ready(function(){	
	
	
	/*------------|FUNCA PARA SELECIONAR O DP REF A EMPRESA|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_emp").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_cadUsuarios.php",
		{
			acao: "populaCheckCnpj",  
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_cnpj").html(data);
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckCnpj |------------------*/
 
	
	/*------------|FUNCA PARA SELECIONAR O DP REF A EMPRESA|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_emp").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_cadUsuarios.php",
		{
			acao: "populaCheckDp",  
			fami: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_dp").html(data);
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckDp |------------------*/

	
	
	/*---------------|CADASTRAR USUARIOS|----------------------*\
	| Author: 	Elvis Leite 				                 	|
	| Version: 	1.0 			            					|
	| Email: 	elvis7t@gmail.com 						        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/
	
	$("#btn_cadusu").on("click",function(){
		$(this).html("<i class='fa fa-spinner fa-spin'></i> Processando..."); 
		var container = $("#formerrosCadusu");
		$("#cadUsu").validate({
            debug: true, 
            errorClass: "error",
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li',
            rules: {
                usu_nome	: {required: true, minlength: 9},
                usu_email	: {required: true, email:true},
                usu_senha	: {required: true, minlength: 6 },
                usu_csenha	: {required: true, equalTo:"#usu_senha"},
                sel_emp  	: {required: true},
                sel_cnpj  	: {required: true},
                sel_dp	    : {required: true}, 
                sel_class	: {required: true} 
            },
            messages: {
                usu_nome	: {required: "Digite o Nome Completo do usuario" , minlength: "Mome e sobrenome."},
                usu_email	: {required: "Informe um e-mail valido", email:"Email Invalido"},
                usu_senha	: {required: "Digite uma senha valida (Minimo 6 caracteres )", minlength: "M&iacute;nimo de 6 caracteres."},
                usu_csenha	: {required: "Digite a senha novamente (Confirme a senha)",equalTo:"As senhas não coincidem"},
                sel_emp  	: {required: "Selecione uma Empresa "},
                sel_dp	    : {required: "Selecione um Departamento"},
                sel_class	: {required: "Selecione uma classe (Selecione uma Classe)"}
            },
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
        });
		$("#btn_cadusu").html("<i class='fa fa-save'></i> Salvar");
		if($("#cadUsu").valid()==true){
			$.post("../controller/sys_cadUsuarios.php",
				{
				acao:			"cadusuarios",
				usu_nome:		$("#usu_nome").val(), 
				usu_senha:		$("#usu_senha").val(),
				sel_emp:		$("#sel_emp").val(),
				sel_cnpj:		$("#sel_cnpj").val(),
				sel_dp:		    $("#sel_dp").val(),
				usu_classe:		$("#sel_class").val(),
				usu_email:		$("#usu_email").val()
				
				
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						 $("#cadUsu")[0].reset();// apaga os campos
						console.log(data.query);
						$("#usu_cad").load("sys_tbUsuarios.php");// atualiza a pagina com o campo inserido
						
					}
					else {
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_cadusu").html("<i class='fa fa-save'></i> Salvar");
				}, "json");
		}
    });
	
	
	
	$("#btn_cadusu").on("click",function(){
		$(this).html("<i class='fa fa-spinner fa-spin'></i> Processando..."); 
		var container = $("#formerrosCadusu");
		$("#cadUsu").validate({
            debug: true, 
            errorClass: "error",
            errorContainer: container,
            errorLabelContainer: $("ol", container),
            wrapper: 'li',
            rules: {
                
                usu_email	: {required: true, email:true},
                sel_emp  	: {required: true}
                
            },
            messages: {
                 
            },
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
        });
		$("#btn_cadusu").html("<i class='fa fa-save'></i> Salvar");
		if($("#cadUsu").valid()==true){
			$.post("../controller/sys_cadUsuarios.php",
				{
				acao:			"cadusuariosDados",
				
				usu_email:		$("#usu_email").val()
				
				
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						 $("#cadUsu")[0].reset();// apaga os campos
						console.log(data.query);
						$("#uusu_cad").load("sys_tbUsuarios.php");// atualiza a pagina com o campo inserido
						
					}
					else {
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_cadusu").html("<i class='fa fa-save'></i> Salvar");
				}, "json");
		}
    });
/*---------------|FIM CADASTRO DE USUARIOS|------------------*/	


/*---------------|ALTERAÇÃO DOS DADOS do PERFIL|-----------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016					|
	| Botao para alterar ou caastrar os dados do usuário 			|
	\*-------------------------------------------------------------*/
	

		$("#bt_altera_func").on("click", function(){
			$(this).html("<i class='fa fa-spinner fa-spin'></i> Alterando...");
			$.post("../controller/sys_cadUsuarios.php",{
				acao		: "altera_perfil",
				usu_cod 	: $("#usu_cod").val(),
				escol 		: $("#escol").val(),
				cep 		: $("#cep").val(),
				log 		: $("#log").val(), 
				num 		: $("#num").val(),
				compl 		: $("#compl").val(),
				bai 		: $("#bai").val(),
				cid 		: $("#cid").val(),
				uf 			: $("#uf").val(),
				data 		: $("#data").val(),
				habil 		: $("#habil").val(),
				notas 		: $("#notas").val(),
				usu_email	: $("#usu_email").val(),
				usu_tel		: $("#usu_tel").val(),
				usu_ramal	: $("#usu_ramal").val(),
				usu_cel		: $("#usu_cel").val()

				},
				function(data){
					if(data.status=="OK"){
						$("#bt_altera_func").html("<i class='fa fa-pencil'></i> Alterar");
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> Alterado OK - ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta");	
						location.reload();
					} 
					else{
						$("<div></div>").addClass("alert alert-danger alert-dismissable").html('<i class="fa fa-times"></i> Ocorreu um erro! ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta");	
					}
					
					console.log(data.mensagem);//TO DO mensagem OK
				},
				"json"
			);
		});
/*---------------|FIM ALTERAÇÃO DE PERFIL|-----------------------------*\|------------------*/	
		
	/*---------------|ALTERAÇÃO DE SENHAS DOS USUÁRIOS DO PORTAL|--*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016
	| Botao para alterar senhas de usuário
	\*-------------------------------------------------------------*/
		$("#bt_alt_senha").on("click", function(){
			var container = $("#formerros_senha");
			$("#alt_senha").validate({
	            debug: true,
	            errorClass: "error",
	            errorContainer: container,
	            errorLabelContainer: $("ol", container),
	            wrapper: 'li',
	            rules: {
	                sen_atual	: {required: true},
	                sen_nova	: {required:true},
	                rsen_nova	: {equalTo:"#sen_nova"}

	            },
	            messages: {
	                sen_atual: {required: "A senha atual deve ser digitada"},
	                sen_nova : {required: "Digite uma nova senha"},
	                rsen_nova: {equalTo: "As senhas devem coincidir!"}
	            }
	        });
			
			if($("#alt_senha").valid()==true){
				$(this).html("<i class='fa fa-cog fa-spin'></i> Processando...");
				$.post("../controller/sys_cadUsuarios.php",{
					acao	: "Altera_Senha",
					senha	: $("#senhaatual").val(),
					nsenha	: $("#sen_nova").val() 
					},
					function(data){
						if(data.status=="OK"){
							//altera o status tal qual url
							$("#bt_alt_senha").html("<i class='fa fa-pencil'></i> Alterar");
							$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> Alterado OK - ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta2");
							location.reload();
							
						} 
						
						else{
							$("<div></div>").addClass("alert alert-danger alert-dismissable").html('<i class="fa fa-times"></i> Ocorreu um erro! ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta2");	
							$("#bt_alt_senha").html("<i class='fa fa-pencil'></i> Alterar");
						}
						
						console.log(data.sql);//TO DO mensagem OK
					},
					"json"
				);
			}

		});
/*---------------|FIM ALTERAÇÃO DE SENHA|-----------------------------*\|------------------*/	


/*------------------------|ALTERAR  USUARIOS ATIVOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
		$(document.body).on("click","#btn_Altusus",function(){   
			console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#usu_cod").val();
			
			
			$.post("../controller/sys_cadUsuarios.php",{ 
				acao: "Altera_usu2",
				usu_cod: cod,
				usucod:  		$("#usucod").val(),        
				usu_dpId:  		$("#usu_dpId").val(),        
				usu_nome:  		$("#usu_nome").val(),
				usu_email_alt:  $("#usu_email_alt").val(),
				usu_senha:  	$("#usu_senha").val(),
				sel_class:  	$("#sel_class").val(),
				usu_ativo: 		$("input[name=usu_ativo]:checked").val()   
				  
			},
			function(data){ 
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					location.reload();
				} 
				else{
					alert(data.mensagem);	 
				}
			},
			"json");
		});
		
		/*-|ALTERAR  EMAIL NA TABELA sys_dados_user|*\
		\*/		
	
		$(document.body).on("click","#btn_Altusus",function(){   
			console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#usu_cod").val();
			
			
			$.post("../controller/sys_cadUsuarios.php",{ 
				acao: "Altera_email",
				usu_cod: cod,
				usu_email:  $("#usu_email").val(),
				usu_email_alt:  $("#usu_email_alt").val()
				  
				  
			},
			function(data){ 
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					location.reload();
				} 
				else{
					alert(data.mensagem);	 
				}
			},
			"json");
		});
		
	/*---------------|FIM DE ALTERAR USUARIOS ATIVOS|------------------*/		
	
	/*---------------|TRUNCAR TABELA LOGADOS|-----------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	
		
		/*|COM A CLASSE excHoras, FAZER A EXCLUSÃO DO BD|*/
		$(document.body).on("click","#btn_truncate",function(){
			console.log("CLICK OK");
			cod = $(this).data("reg");
			$.post("../controller/sys_cadUsuarios.php",{
				acao: "truncar_logados"

			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide"); 
					$("#aguarde").modal("show");
					
					$(location).attr('href','login.php?'); 
				} 
				else{
					alert(data.mensagem);
										
				}
			}, 
			"json");
		});
	/*---------------|FIM DE TRUNCAR TABELA LOGADOS |------------------*/	
	
	/*---------------|ALTERAÇÃO DOS DADOS do PERFIL 2|-----------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016
	| Botao para alterar ou caastrar os dados do usuário
	\*-------------------------------------------------------------*/
		$("#bt_altera_perfil").on("click", function(){
			$(this).html("<i class='fa fa-spinner fa-spin'></i> Alterando...");
			$.post("../controller/sys_cadUsuarios.php",{
				acao		: "altera_perfil_usu",
				usu_cod 	: $("#usu_cod").val(),
				escol 		: $("#escol").val(),
				cep 		: $("#cep").val(),
				log 		: $("#log").val(),
				num 		: $("#num").val(),
				compl 		: $("#compl").val(),
				bai 		: $("#bai").val(),
				cid 		: $("#cid").val(),
				uf 			: $("#uf").val(),
				data 		: $("#data").val(),
				usu_tel		: $("#usu_tel").val(),
				usu_ramal	: $("#usu_ramal").val(),
				usu_cel		: $("#usu_cel").val(),
				usu_email	: $("#usu_email").val()
				
				},
				function(data){
					if(data.status=="OK"){
						$("#bt_altera_perfil").html("<i class='fa fa-pencil'></i> Alterar");
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> Alterado OK - ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta");	
						location.reload();
					} 
					else{
						$("<div></div>").addClass("alert alert-danger alert-dismissable").html('<i class="fa fa-times"></i> Ocorreu um erro! ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta");	
					}
					
					console.log(data.mensagem);//TO DO mensagem OK
				},
				"json"
			);
		});
/*---------------|FIM ALTERAÇÃO DE PERFIL 2|-----------------------------*\|------------------*/	

/*------------------------|ENVIAR MENSAGEN|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
	$(document.body).on("click","#btn_Enviamsn",function(){ 
		var container = $("#formerrosEnviamsn");
		console.log("CLICK Staus");
		var token = $("#token").val(); 
		var lista = $("#lista").val();
			$("#Envia").validate({
				debug: true,
				errorClass: "error",
				errorContainer: container,
				errorLabelContainer: $("ol", container),
				wrapper: 'li',
				rules: {
					sel_contato     : {required: true},
					assunto     	: {required: true, minlength: 5},
					Mensagen    	: {required: true, minlength: 5}
					
				}, 
				messages:{				
                sel_contato  	: {required: "Selecione um Contato "},
                assunto	    	: {required: "Informe o Assunto"},
                Mensagen		: {required: "Escreva a mensagen"}			
				},
					highlight: function(element) {
						$(element).closest('.form-group').addClass('has-error');
					},
					unhighlight: function(element) {
						$(element).closest('.form-group').removeClass('has-error');
					}  
			});	  			 
			
		if($("#Envia").valid()==true){ 
			$("#btn_Enviamsn").html("<i class='fa fa-spin fa-spinner'></i> Processando...");				
			$.post("../controller/sys_cadUsuarios.php",{ 
				acao: "Envia_mensagen",				
				sel_contato:	   		$("#sel_contato").val(), 
			    assunto:   				$("#assunto").val(),
			    Mensagen: 				CKEDITOR.instances.Mensagen.getData()				    
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
						location.reload();  
				} 
				else{
					alert(data.mensagem);	
				}
			},  "json");
		}
	});		
	/*---------------|FIM DE ENVIAR MENSAGEN|------------------*/

	
	/*---------------|ALTERAÇÃO MENSAGEN LIDA|-----------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016
	| Botao para alterar ou caastrar os dados do usuário
	\*-------------------------------------------------------------*/
		$(document.body).on("click","#btn_Lermsn",function(){ 
			 console.log("CLICK Ver msn");
			var token = $("#token").val();			
			
			$("#btn_Lermsn").html("<i class='fa fa-spin fa-spinner'></i> Alterando...");
			$.post("../controller/sys_cadUsuarios.php",{
				acao		: "Ler_msn",
				mail_Id 	: $("#mail_Id").val()
				},
				function(data){
					if(data.status=="OK"){
						$("#confirma").modal("hide");
					$("#aguarde").modal("show");
						$(location).attr('href','sys_mailbox.php?token='+token);   
					} 
					else{
						alert(data.mensagem);	
					}
					
					
				},
				"json");
			
			
		});
/*---------------|FIM ALTERAÇÃO DE ALTERAÇÃO MENSAGEN LIDA|-----------------------------*\|------------------*/	


/*---------------|FIM DA FUNCAO|------------------*/		
});	
 