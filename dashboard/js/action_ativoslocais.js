$(document).ready(function(){
	

	
	
	/*-----|FUNCAO PARA CADASTRO DE DEPARTAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_cadDp", function(){
        var container = $("#formerrosDp"); 
		$("#cadDp").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
				dp_nome : {required: true, minlength: 2}	 
			}, 
			messages:{
				
				dp_nome : {required:"Informe o nome do Departamento", minlength: "M&iacute;nimo de 2 caracteres."}
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#cadDp").valid()==true){ 
			$("#btn_cadDp").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{
				acao:			"cadDepartamentos",
				dp_empId:	    $("#dp_empId").val(),
				dp_nome:		$("#dp_nome").val()  
			
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#cadDp")[0].reset();
						console.log(data.query);
						location.reload();
		 			}
					else {
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Departamento j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_cadDp").html("<i class='fa fa-save'></i> Salvar");
				}, "json");
			}
		});

/*---------------|FIM DO CADASTRO DEPARTAMENTO |------------------*/

/*------------------------|ALTERAR  DEPARTAMENTO|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
	
		$(document.body).on("click","#btn_Altdp",function(){   
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#dp_id").val();
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_dp",
				dp_id: cod,
				dp_nome: $("#dp_nome").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_departamentoslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
		
	/*---------------|FIM DE ALTERAR DEPARTAMENTO|------------------*/
	
	
		
/*---------------|FUNCAO PARA CADASTRO DE USUARIOS  ATIVOS|---------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_cadUsu", function(){
        var container = $("#formerrosUsuAd"); 
		$("#cadUsu").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				
                sel_dp   : {required: true},
				usu_nome : {required: true, minlength: 5}	 
			}, 
			messages:{
				
                sel_dp	 : {required: "Selecione um departamento"},
				usu_nome : {required:"Informe o nome do Usu&aacute;rio", minlength: "M&iacute;nimo de 5 caracteres."}
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#cadUsu").valid()==true){ 
			$("#btn_cadUsu").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{
				acao:			"cadUsuarios",
				sel_emp:	    $("#sel_emp").val(), 
			    sel_dp:	    	$("#sel_dp").val(),
				usu_nome:		$("#usu_nome").val()  
			 
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#cadUsu")[0].reset();
						console.log(data.query);
						location.reload();
		 			}
					else {
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Nome j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_cadUsu").html("<i class='fa fa-save'></i> Salvar");
				}, "json");
			}
		});
/*---------------|FIM DO CADASTRO DE USUARIOS ATIVOS |------------------*/	
 
/*------------------------|ALTERAR  USUARIOS ATIVOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
		$(document.body).on("click","#btn_Altusu",function(){   
			console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#usu_id").val();    
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_usu",
				usu_id: cod,
				usu_dpId:  $("#usu_dpId").val(),      
				usu_nome:  $("#usu_nome").val(),
				usu_ativo: $("input[name=usu_ativo]:checked").val()   
				  
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_usuarioslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
		
	/*---------------|FIM DE ALTERAR USUARIOS ATIVOS|------------------*/	

	
	/*---------------|FUNCAO PARA CADASTRAR TIPO DE EQUIPAMENTO|----------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
$(document.body).on("click","#btn_cadEqtipo", function(){
	var container = $("#formerrosEqtipo"); 
	$("#tipo").validate({  
		debug: true,
		errorClass: "error", 
		errorContainer: container,
		errorLabelContainer: $("ol", container), 
		wrapper: 'li', 
		rules: {
			tipo_empId : {required: true}, 
			tipo_desc  : {required: true} 
				 
		},  
		messages:{
			tipo_empId : {required:"Selecione uma Empresa"},  
			tipo_desc  : {required:"Informe um nome valido"}  
			 
		},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}  
	});     
	if($("#tipo").valid()==true){
		$("#btn_cadEqtipo").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_acao.php",
			{   
			acao:			"cad_Eqtipo", 
			tipo_empId:		$("#tipo_empId").val(),  
			tipo_desc:		$("#tipo_desc").val()  
					  
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#tipo")[0].reset();
					console.log(data.query);
					location.reload();
				}
				else { 
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadEqtipo").html("<i class='fa fa-save'></i> Salvar");
			}, "json");
		} 
	});
/*---------------|FIM DO CADASTRO TIPO DE EQUIPAMENTO|------------------*/	

	/*-------------------------|ALTERAR TIPO DE EQUIPAMENTO|---------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
	
		$(document.body).on("click","#btn_AltEqtipo",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#tipo_id").val(); 
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_Eqtipo",
				tipo_id: cod,
				tipo_desc: $("#tipo_desc").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_eqtipo.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
		
	/*---------------|FIM DE ALTERAR TIPO DE EQUIPAMENTO |------------------*/	


	

/*---------------|FUNCAO PARA CADASTRAR MARCA|----------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
$(document.body).on("click","#btn_cadMarca", function(){
	var container = $("#formerrosMarca"); 
	$("#marca").validate({  
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container), 
		wrapper: 'li',
		rules: {
			
			sel_tipoId : {required: true}, 
			marc_nome  : {required: true} 
				
		},
		messages:{
			 
			sel_tipoId : {required:"Selecione um Tipo"},  
			marc_nome  : {required:"Informe um nome valido"}  
			 
		},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		} 
	});   
	if($("#marca").valid()==true){  
		$("#btn_cadMarca").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_acao.php",
			{
			acao:			"cad_Marca", 
			sel_emptp  :	    $("#sel_emptp").val(),  
			sel_tipoId :	    $("#sel_tipoId").val(),  
			marc_nome  :		$("#marc_nome").val()   
					  
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#marca")[0].reset();
					console.log(data.query);
					location.reload(); 
				}
				else { 
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadMarca").html("<i class='fa fa-save'></i> Salvar");
			}, "json");
		} 
	});
/*---------------|FIM DO CADASTRO MARCA|------------------*/	

	/*-------------------------|ALTERAR MARCA|---------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
	
		$(document.body).on("click","#btn_Altmarc",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#marc_id").val();
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_marca",
				marc_id: cod,
				marc_nome: $("#marc_nome").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_eqmarcalocal.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
		
	/*---------------|FIM DE ALTERAR MARCA |------------------*/	



	/*---------------|FUNCAO PARA SELECIONAR USUARIO REF A EMPRESA|-----------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_emp").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",
		{
			acao: "populaCheckUsuAd",  
			fami: $(this).val()
		},function(data){
			$("#aguarde").modal("hide"); 
			$("#sel_usu").html(data);  
		},"html");
	});
/*---------------|FIM DA FUNCAO populaCheckUsuAd |------------------*/

 



	/*------------|FUNCA PARA SELECIONAR O TIPO REF A EMPRESA|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_empeq").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",
		{
			acao: "populaCheckTipoeq",  
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_tipoeq").html(data);
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckTipoeq  |------------------*/

/*------------|FUNCA PARA SELECIONAR O MARCA REF AO TIPO|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_tipoeq").on("change", function(){ 
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",
		{
			acao: "populaCheckMarcaeq",  
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_marcaeq").html(data);
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckMarcaeq |------------------*/
  
/*------------|FUNCA PARA SELECIONAR O FABRICANTE REF AO TIPO|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_tipoeq").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",
		{
			acao: "populaCheckFabmq",   
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_fabmq").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckFabmq |------------------*/ 

/*------------|FUNCA PARA SELECIONAR O MAQUINA REF AO FABRICANTE|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_fabmq").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",
		{
			acao: "populaCheckMq",   
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_mq").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckMq |------------------*/ 
 	
	
	/*---------------|FUNCAO PARA CADASTRO DE EQUIPAMENTOS|-----------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_cadEq", function(){
        var container = $("#formerrosEq"); 
		$("#cadEq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				
                sel_tipoeq : {required: true},
                sel_marcaeq: {required: true},
                eq_modelo  : {required: true, minlength: 2},
                eq_serial  : {required: true, minlength: 5},
                eq_desc    : {required: true, minlength: 5},
                sel_eqstatus  : {required: true},
                eq_valor   : {required: true}
                
			}, 
			messages:{
				 
                sel_tipoeq  : {required: "Selecione um Tipo"},
                sel_marcaeq : {required: "Selecione uma Marca"},
                eq_modelo   : {required: "Desc. o Modelo", minlength: "M&iacute;nimo de 2 caracteres."},
                eq_serial   : {required: "Desc. o serial", minlength: "M&iacute;nimo de 5 caracteres."},
                eq_desc	    : {required: "Des. o equipamento", minlength: "M&iacute;nimo de 5 caracteres."},
                sel_eqstatus   : {required: "Selecione o Status"},
                eq_valor    : {required: "Desc. o Valor R$"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#cadEq").valid()==true){ 
			$("#btn_cadEq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao:			"cadEquipamentos",  
				sel_empeq:		$("#sel_empeq").val(), 
			    sel_tipoeq:	   	$("#sel_tipoeq").val(), 
			    sel_marcaeq:   	$("#sel_marcaeq").val(),  
			    eq_modelo:    	$("#eq_modelo").val(), 
			    eq_serial:    	$("#eq_serial").val(), 
			    eq_desc:	   	$("#eq_desc").val(),  
			    sel_eqstatus:	$("#sel_eqstatus").val(),
			    eq_valor:	   	$("#eq_valor").val()
							 
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#cadEq")[0].reset();
						console.log(data.query);
						location.reload(); 
		 			}
					else { 
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Serial j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_cadEq").html("<i class='fa fa-save'></i> Salvar");
				}, "json");
			}
		}); 
/*---------------|FIM DO CADASTRO DE EQUIPAMENTOS |------------------*/	

/*------------------------|ATRIBUIR  EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
		$(document.body).on("click","#btn_AtrEq", function(){
        	console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#eq_id").val();    
					
						
			$.post("../controller/sys_acao.php",{ 
				acao: "Atribuir_Eq",
				eq_id: cod,
				
				sol_emp:   $("#sol_emp").val(),   				     
				sol_dp:    $("#sol_dp").val(),   				     
				sol_usu:   $("#sol_usu").val(),   				     
				sol_mq:    $("#sol_mq").val()  				     
			   
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_equipamentoslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		
		});	  
		 	
		
	/*---------------|FIM DE ATRIBUIR EQUIPAMENTOS|------------------*/	 
	


	
	/*------------------------|ALTERAR  EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
	
	$(document.body).on("click","#btn_AltEq", function(){
        var container = $("#formerrosAlteq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#eq_id").val();    
					
		$("#alt_eq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                
			}, 
			messages:{
				
                
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		}); 
	
		
		if($("#alt_eq").valid()==true){ 
			$("#btn_AltEq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_Eq", 
				eq_id: cod,
				
				eq_serial:    $("#eq_serial").val(),
				eq_desc:      $("#eq_desc").val(),
				eq_modelo:    $("#eq_modelo").val(), 
				sel_eqstatus: $("#sel_eqstatus").val(),   				     
				eq_valor:     $("#eq_valor").val()
				 
				
				   
			   
			},function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					location.reload();  
				} 
				else{
					alert(data.mensagem);	
				}
			},	"json");
			} 
		}); 
	/*---------------|FIM DE ALTERAR EQUIPAMENTOS|------------------*/	
	
	
	/*------------------------|ALTERAR USUARIO DE EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
	    
		$(document.body).on("click","#btn_AltusuEq",function(){
			console.log("CLICK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#eq_id").val(); 
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_usuEq",
				eq_id: cod,
				sol_emp:   $("#sol_emp").val(),   				     
				sol_dp:    $("#sol_dp").val(),   				     
				sol_usu:   $("#sol_usu").val()
				
			},
			function(data){ 
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_equipamentoslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
	/*---------------|FIM DE ALTERAR USUARIO EQUIPAMENTOS|------------------*/	
	

	/*------------------------|ALTERAR MAQUINA DE EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$(document.body).on("click","#btn_AltmqEq",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#eq_id").val();
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_mqEq",
				eq_id: cod,
				sol_emp: $("#sol_emp").val(),
				sol_mq: $("#sol_mq").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_equipamentoslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});	
 	
	
	
	/*---------------|FIM DE ALTERAR MAQUINA EQUIPAMENTOS|------------------*/	
	
	/*------------------------|LIMPAR DE  EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$(document.body).on("click","#btn_limpaEq",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val(); 
			cod = $("#eq_id").val();
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Limpar_Eq",
				eq_id: cod, 
				  
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide"); 
					$("#aguarde").modal("show");
					$(location).attr('href','at_equipamentoslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});	
 	
	
	
	/*---------------|FIM DE LIMPAR  EQUIPAMENTOS|------------------*/	
	

	
	
	
/*------------------------|DESCARTAR  EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
		$(document.body).on("click","#btn_Desceq", function(){
        var container = $("#formerrosDesceq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#eq_id").val();    
					
		$("#Desceq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                eq_descmotivo   : {required: true}
                
			}, 
			messages:{
				
                eq_descmotivo   : {required: "Desc. o Motivo, em Ativo marque inativo"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#Desceq").valid()==true){ 
			$("#btn_Desceq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao: "Descartar_Eq",
				eq_id: cod,
				eq_descmotivo: $("#eq_descmotivo").val()  
							 
				},function(data){ 
					if (data.status == "OK") {
						$("#confirma").modal("hide");
						$("#aguarde").modal("show");
						$(location).attr('href','at_descarteslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			}, "json");
			}
		}); 
		
		$(document.body).on("click","#btn_Desceq", function(){
        var container = $("#formerrosDesceq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#eq_id").val();    
					
		$("#Desceq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                eq_descmotivo   : {required: true}
                
			}, 
			messages:{
				
                eq_descmotivo   : {required: "Desc. o Motivo, em Ativo marque inativo"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#Desceq").valid()==true){ 
			$("#btn_Desceq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao: "Descartar_Eq_mailSender",
				eq_id: cod,
				eq_descmotivo: $("#eq_descmotivo").val()  
							 
				},function(data){ 
					if (data.status == "OK") {
						$("#confirma").modal("hide");
						$("#aguarde").modal("show");
						$(location).attr('href','at_descarteslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			}, "json");
			}
		});
			
	/*---------------|FIM DE DESCARTAR EQUIPAMENTOS|------------------*/	
	
	
	
	/*------------|FUNCA PARA SELECIONAR O Tipo REF AO EQUIPAMENTO|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sol_emp").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php", 
		{
			acao: "populaCheckSoltipo",  
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sol_tipo").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckSoltipo |------------------*/

	/*------------|FUNCA PARA SELECIONAR O MARCA REF AO EQUIPAMENTO|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sol_tipo").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",    
		{
			acao: "populaCheckSolmarca",   
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sol_marca").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckSolmarca |------------------*/
			
	/*------------|FUNCA PARA SELECIONAR O EQUIPAMNETO REF A Empresa|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sol_marca").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",  
		{
			acao: "populaCheckSoleq",    
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sol_eq").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckSoleq  |------------------*/

	/*---|FUNCA PARA SELECIONAR O SERIAL REF AO EQUIPAMENTO|--------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sol_eq").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",  
		{
			acao: "populaCheckSoleqserial",     
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sol_eqserial").html(data);  
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckSoleqserial  |------------------*/
			
/*|FUNCA PARA SELECIONAR O DEPARTAMENTO REF A EMPRESA Solicitação|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sol_emp").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php", 
		{
			acao: "populaCheckSoldp",  
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");  
			$("#sol_dp").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckSoldp  |------------------*/
			

	/*------------|FUNCA PARA SELECIONAR O USUARIO REF AO DEPARTAMENTO Solicitação|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sol_dp").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php", 
		{
			acao: "populaCheckSolusu",  
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sol_usu").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckSolusu  |------------------*/

	/*------------|FUNCA PARA SELECIONAR O MAQUINA REF A EMPRESA|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sol_emp").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php", 
		{
			acao: "populaCheckSolmq",   
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sol_mq").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckSolusu  |------------------*/



			
	/*----|FUNCAO PARA CADASTRO DE SOLICITAÇÂO DE EQUIPAMENTOS|-----\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_cadSol", function(){
        var container = $("#formerrosSol"); 
		$("#cadSol").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				
                sol_dp       : {required: true},
                sol_usu      : {required: true},
                solic_ticket : {required: true},
                solic_desc   : {required: true}
                
			}, 
			messages:{
				
                sol_dp       : {required: "Selecione um Departamento"},
                sol_usu	     : {required: "Selecione um Usu&aacute;rio"},
                solic_ticket : {required: "Desc. N&ordm; do Chamado"},
                solic_desc   : {required: "Desc. o Motivo"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#cadSol").valid()==true){ 
			$("#btn_cadSol").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao:			"cadEqsolicitacao",  
				sol_emp:		$("#sol_emp").val(), 
				eq_id:	    	$("#eq_id").val(), 
				tipo_id:    	$("#tipo_id").val(), 
				marc_id:    	$("#marc_id").val(),  
				eq_serial:    	$("#eq_serial").val(),  
				sol_dp:     	$("#sol_dp").val(),  
			    sol_usu:	   	$("#sol_usu").val(),  
			    sol_mq: 	   	$("#sol_mq").val(),  
			    solic_ticket:  	$("#solic_ticket").val(), 
			    solic_desc:	   	$("#solic_desc").val()  
							 
				},function(data){ 
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#cadSol")[0].reset();
						console.log(data.query);
						location.reload(); 
		 			}
					else { 
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Departamento j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_cadSol").html("<i class='fa fa-save'></i> Salvar");
				}, "json");
			}
		}); 
/*---------------|FIM DO CADASTRO DE SOLICITAÇÂO DE EQUIPAMENTOS |------------------*/	

/*------------------------|ALTERAR SOLICITAÇÂO DE EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
		$(document.body).on("click","#btn_AltSol",function(){   
			console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#solic_id").val();    
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_Sol",
				solic_id: cod,
				solic_ticket: $("#solic_ticket").val(),
				solic_desc:   $("#solic_desc").val() 
				
				   
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_eqsolicitacaolocal.php?token='+token);  
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
		
	/*---------------|FIM DE ALTERAR SOLICITAÇÂO DE EQUIPAMENTOS|------------------*/	
	
	/*---------------|FUNCAO PARA CADASTRAR A PRESTADORA|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/
$(document.body).on("click","#btn_cadPre", function(){
	var container = $("#formerrosCadPre"); 
	$("#cadPre").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			pre_nome    : {required: true, minlength: 10},	
			pre_alias   : {required: true, minlength: 2},	
			pre_cnpj    : {required: true, minlength: 10},	
			pre_ie      : {required: true, minlength: 9},	
			cep         : {required: true, minlength: 8},	
			num         : {required: true},	
			pre_contato : {required: true, minlength: 5},
			pre_email   : {required: true, email:true},		
			pre_tel     : {required: true, minlength: 12},	
			pre_site    : {required: true, minlength: 10} 	
			
		},
		messages:{
			pre_nome    : {required:"Informe a Raz&atilde;o social", minlength: "M&iacute;nimo de 10 caracteres."},
			pre_alias   : {required:"Informe o Apelido", minlength: "M&iacute;nimo de 2 caracteres."},
			pre_cnpj    : {required:"Informe o CNPJ ", minlength: "M&iacute;nimo de 10 caracteres."},
			pre_ie      : {required:"Informe a Insc. Estadual", minlength: "M&iacute;nimo de 9 caracteres."},
			cep         : {required:"Informe Um CEP", minlength: "M&iacute;nimo de 8 caracteres."},
			num         : {required:"Informe Um N&uacute;mero"},
			pre_contato : {required:"Informe Um nome valido", minlength: "M&iacute;nimo de 5 caracteres."},
			pre_email	: {required: "Informe um e-mail valido", email:"Email Invalido"},
			pre_tel     : {required:"Informe o Telefone", minlength: "M&iacute;nimo de 12 caracteres."},
			pre_site    : {required:"Informe um Site", minlength: "M&iacute;nimo de 10 caracteres."}
				
		},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
	});
	if($("#cadPre").valid()==true){
		$("#btn_cadPre").html("<i class='fa fa-spin fa-spinner'></i> Processando..."); 
		$.post("../controller/sys_acao.php",
			{
			acao:			"cadPrestadoras", 
			pre_nome:		$("#pre_nome").val(), 
			pre_alias:		$("#pre_alias").val(),  
			pre_cnpj:		$("#pre_cnpj").val(),
			pre_ie:     	$("#pre_ie").val(), 
			cep:    	    $("#cep").val(),
			log:    	    $("#log").val(),
			num:    	    $("#num").val(),
			compl:    	    $("#compl").val(),
			bai:    	    $("#bai").val(),
			cid:    	    $("#cid").val(),
			uf:    	        $("#uf").val(),						
			pre_contato:	$("#pre_contato").val(), 
			pre_email:		$("#pre_email").val(), 
			pre_tel:		$("#pre_tel").val(),
			pre_site:		$("#pre_site").val() 
			
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#cadPre")[0].reset();  
					console.log(data.query);
					$("#Pre_cad").load("../view/at_tbPrestadoraslocais.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> CNPJ j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadPre").html("<i class='fa fa-save'></i> Salvar");
			}, "json");
		}
	});
/*---------------|FIM DO CADASTRO PRESTADORA |------------------*/		


/*---------------|ALTERAR  PRESTADORA|----------------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
	
		$(document.body).on("click","#btn_Altpre",function(){ 
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#pre_id").val();
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_pre",
				pre_id: cod,
				pre_nome:		$("#pre_nome").val(), 
				pre_email:		$("#pre_email").val(), 
				pre_alias:		$("#pre_alias").val(), 
				pre_site:		$("#pre_site").val(), 
				pre_tel:		$("#pre_tel").val(), 
				pre_contato:	$("#pre_contato").val(), 
				pre_ie:     	$("#pre_ie").val(), 
				pre_end:	    $("#pre_end").val(), 
				pre_cep:	    $("#pre_cep").val(), 
				pre_cnpj:		$("#pre_cnpj").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_prestadoraslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
		
	/*---------------|FIM DE ALTERAR PRESTADORA|------------------*/	


/*----|FUNCAO PARA CADASTRO DE MANUTENÇÂO DE EQUIPAMENTOS|-----\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_Man", function(){
        var container = $("#formerrosMan"); 
		$("#cadMan").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				sel_pres     : {required: true},
				man_desc     : {required: true, minlength: 5}
                
			}, 
			messages:{
				sel_pres     : {required: "Selecione uma Prestadora"},
			    man_desc     : {required: "Desc. o Motivo",minlength: "M&iacute;nimo de 5 caracteres."}
             	 			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}  
		});
		if($("#cadMan").valid()==true){ 
			$("#btn_cadMan").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao:			"cadmanu",  
				eq_id:		$("#eq_id").val(), 
			    emp_id:	   	$("#emp_id").val(), 
			    tipo_id:    $("#tipo_id").val(),  
			    marc_id:    $("#marc_id").val(), 
			    eq_modelo:  $("#eq_modelo").val(), 
			    eq_serial:  $("#eq_serial").val(), 
			    eq_desc:    $("#eq_desc").val(), 
			    man_desc:   $("#man_desc").val(), 
			    eq_valor:	$("#eq_valor").val(),  
			    sel_pres:	$("#sel_pres").val()
							  
				},function(data){  
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
			}
		}); 
		
		
		$(document.body).on("click","#btn_Man", function(){
        var container = $("#formerrosMan"); 
		console.log("CLICK Status");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#eq_id").val(); 
		$("#cadMan").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				sel_pres     : {required: true},
				man_desc     : {required: true, minlength: 5}
                
			}, 
			messages:{
				 			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}  
		});
		if($("#cadMan").valid()==true){ 
			$("#btn_cadMan").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao: "Altera_StatusEq",
				eq_id: cod,
				eq_id:		$("#eq_id").val() 
							  
				},function(data){  
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
			}
		}); 
		
/*---------------|FIM DO CADASTRO DE  MANUTENÇÂO DE EQUIPAMENTOS |------------------*/	

/*------------------------|ALTERAR  MANUTENÇÂO DE EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
	$(document.body).on("click","#btn_AltMan",function(){ 
			 var container = $("#formerrosAltman");
			 console.log("CLICK Eq manut");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#man_id").val();    
			 
			$("#alt_man").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li', 
			rules: {
				 
               man_os   : {required: true}
                
			}, 
			messages:{
				
                man_os   : {required: "Des. a Ordem de servi&ccedil;o"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#alt_man").valid()==true){ 
			$("#btn_AltMan").html("<i class='fa fa-spin fa-spinner'></i> Processando...");				
			$.post("../controller/sys_acao.php",{ 
				acao: "Alt_ManEquipamanto",
				man_id: cod,
				man_valor:	   		$("#man_valor").val(), 
			    man_os:   			$("#man_os").val(),  
			    man_dataretorno:    $("#man_dataretorno").val(), 
			    man_desc: 			CKEDITOR.instances.man_desc.getData(), 
			    man_obs: 			$("#man_obs").val()
			     
				 
				
				   
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_ger_Manlocal.php?token='+token+'&acao=N&manid='+cod);  
				} 
				else{
					alert(data.mensagem);	
				}
			},  "json");
			}
		});

		  
		
		
	/*---------------|FIM DE ALTERAR MANUTENÇÂO DE EQUIPAMENTOS|------------------*/

 
 /*------------------------|FINALIZAR  MANUTENÇÂO DE EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
	$(document.body).on("click","#btn_FinMan",function(){ 
			 var container = $("#formerrosAltman");
			 console.log("CLICK Eq manut");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#man_id").val();    
			 
			$("#alt_man").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li', 
			rules: {
				 
               man_os   : {required: true},
               man_desc   : {required: true},
               man_dataretorno   : {required: true}
                
			}, 
			messages:{
				
                man_os            : {required: "Des. a Ordem de servi&ccedil;o"},
                man_dataretorno   : {required: "Informe a Data"},
                man_desc          : {required: "Des. os ser&ccedil;os Realizados"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#alt_man").valid()==true){ 
			$("#btn_FinMan").html("<i class='fa fa-spin fa-spinner'></i> Processando...");				
			$.post("../controller/sys_acao.php",{ 
				acao: "Fin_ManEquipamanto",
				man_id: cod,
				man_valor:	   		$("#man_valor").val(), 
			    man_os:   			$("#man_os").val(),  
			    man_dataretorno:    $("#man_dataretorno").val(), 
			    man_desc: 			CKEDITOR.instances.man_desc.getData(),   
			    man_obs: 			$("#man_obs").val(), 
			   	
				   
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_eqmanutencaolocal.php?token='+token);  
				} 
				else{
					alert(data.mensagem);	
				}
			},  "json"); 
			}
		});

		$(document.body).on("click","#btn_FinMan",function(){ 
			 var container = $("#formerrosAltman");
			console.log("CLICK finMan");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#eq_id").val();    
			
			$("#alt_man").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li', 
			rules: {
				 
               man_os   : {required: true},
               man_desc   : {required: true},
               man_dataretorno   : {required: true}
                
			}, 
			messages:{
				
                man_os            : {required: "Des. a Ordem de servi&ccedil;o"},
                man_dataretorno   : {required: "Informe a Data"},
                man_desc          : {required: "Des. os ser&ccedil;os Realizados"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#alt_man").valid()==true){  
			$("#btn_FinMan").html("<i class='fa fa-spin fa-spinner'></i> Processando...");				
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_StatusEq2",
				eq_id: cod,
				eq_id:		$("#eq_id").val()   
				 
				
				   
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_eqmanutencaolocal.php?token='+token);  
				} 
				else{
					alert(data.mensagem);	
				}
			},  "json");
			}
		});
  
		
		
	/*---------------|FIM DE FINALIZAR MANUTENÇÂO DE EQUIPAMENTOS|------------------*/
 
 
/*---------------|FUNCAO PARA CADASTRAR FABRICANTE|----------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
$(document.body).on("click","#btn_cadFabri", function(){
	var container = $("#formerrosFab"); 
	$("#fabricante").validate({  
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container), 
		wrapper: 'li',
		rules: {
			sel_emptp  : {required: true}, 
			sel_tipoId : {required: true}, 
			fab_nome  : {required: true} 
				
		},
		messages:{
			sel_emptp  : {required:"Selecione uma Empresa"},  
			sel_tipoId : {required:"Selecione um Tipo"},  
			fab_nome  : {required:"Informe um nome valido"}  
			 
		},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		} 
	});   
	if($("#fabricante").valid()==true){  
		$("#btn_cadFabri").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_acao.php",
			{
			acao:			"cad_Fabri", 
			sel_emptp  :	    $("#sel_emptp").val(),  
			sel_tipoId :	    $("#sel_tipoId").val(),  
			fab_nome   :	    $("#fab_nome").val()    
					  
			},function(data){ 
				if (data.status == "OK") { 
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#fabricante")[0].reset();
					console.log(data.query);
					location.reload();
				} 
				else { 
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadFabri").html("<i class='fa fa-save'></i> Salvar");
			}, "json");
		} 
	});
/*---------------|FIM DO CADASTRO FABRICANTE|------------------*/	

	/*-------------------------|ALTERAR FABRICANTE|---------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
	
		$(document.body).on("click","#btn_AltFab",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#fab_id").val();
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_fabri",
				fab_id: cod,
				fab_nome: $("#fab_nome").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_mqfabricantelocal.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
		
	/*---------------|FIM DE ALTERAR FABRICANTE |------------------*/	


	
	
	/*---------------|FUNCAO PARA CADASTRAR SISTEMA|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/
$(document.body).on("click","#btn_cadOs", function(){
	var container = $("#formerrosCadOs"); 
	$("#cadOs").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			os_desc  : {required: true, minlength: 5},	
			os_versao : {required: true, minlength: 2}  
			
		},
		messages:{
			os_desc : {required:"Des. o sistema ", minlength: "M&iacute;nimo de 5 caracteres."},
			os_versao : {required:"Des. a vers&atilde;o", minlength: "M&iacute;nimo de 2 caracteres."}
			
		},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
	});
	if($("#cadOs").valid()==true){
		$("#btn_cadOs").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_acao.php",
			{
			acao:			"cadSistema",
			os_desc:		$("#os_desc").val(), 
			os_versao:		$("#os_versao").val()
			
		
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#cadOs")[0].reset(); 
					console.log(data.query); 
					$("#Os_cad").load("../view/at_tbOslocal.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadOs").html("<i class='fa fa-save'></i> Salvar");
			}, "json");
		}
	});
/*---------------|FIM DO CADASTRO SISTEMA |------------------*/		


/*---------------|ALTERAR  SISTEMA|--------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
			$(document.body).on("click","#btn_Altos",function(){
			console.log("CLICK @");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#os_id").val();
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_Os",
				os_id: cod,
				os_desc:   $("#os_desc").val(),
				os_versao: $("#os_versao").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide"); 
					$("#aguarde").modal("show");
					$(location).attr('href','at_mqoslocal.php?token='+token); 
				} 
				else{
					alert(data.mensagem);
										
				}
			}, 
			"json"); 
		});
			
	
		
		
	/*---------------|FIM DE ALTERAR SISTEMA|------------------*/	


/*---------------|FUNCAO PARA CADASTRAR OFFICE|----------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
$(document.body).on("click","#btn_cadOffice", function(){
	var container = $("#formerrosCadOffice"); 
	$("#Office").validate({  
		debug: true,
		errorClass: "error", 
		errorContainer: container,
		errorLabelContainer: $("ol", container), 
		wrapper: 'li', 
		rules: {
			office_desc : {required: true, minlength: 2},
			office_versao  : {required: true, minlength: 3}
				 
		},  
		messages:{
			office_desc : {required:"Des. o Office ", minlength: "M&iacute;nimo de 2 caracteres."},
			office_versao  : {required:"Des. a vers&atilde;o", minlength: "M&iacute;nimo de 3 caracteres."}
			 
		},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {  
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}    
	});     
	if($("#Office").valid()==true){
		$("#btn_cadOffice").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_acao.php",
			{   
			acao:			"cad_Office", 
			office_desc:		$("#office_desc").val(),  
			office_versao:		$("#office_versao").val()   
					  
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#Office")[0].reset();
					console.log(data.query);
					$("#Office_cad").load("at_tbOfficelocal.php");// atualiza a pagina com o campo inserido 
				}
				else { 
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadOffice").html("<i class='fa fa-save'></i> Salvar");
			}, "json");
		} 
	});
/*---------------|FIM DO CADASTRO OFFICE|------------------*/	

	/*-------------------------|ALTERAR OFFICE|---------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$(document.body).on("click","#btn_AltOffice",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#office_id").val(); 
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_office",
				office_id: cod,
				office_desc: $("#office_desc").val(),
				office_versao: $("#office_versao").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_mqofficelocal.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");  
		});  
	
		
		
	/*---------------|FIM DE ALTERAR OFFICE |------------------*/	



	/*---------------|FUNCAO PARA CADASTRAR MEMORIA|----------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
$(document.body).on("click","#btn_cadMem", function(){
	var container = $("#formerrosMem"); 
	$("#memoria").validate({  
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container), 
		wrapper: 'li',
		rules: {
			mem_tipo  : {required: true}, 
			mem_cap  : {required: true} 
				
		},
		messages:{
			mem_tipo  : {required:"Informe o Tipo"},  
			mem_cap   : {required:"Informe  a Capacidade"}
			
			 
		},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		} 
	});   
	if($("#memoria").valid()==true){  
		$("#btn_cadMem").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_acao.php",
			{
			acao:			"cad_Mem", 
			mem_tipo  :	    $("#mem_tipo").val(),  
			mem_cap   :	    $("#mem_cap").val()    
					  
			},function(data){ 
				if (data.status == "OK") { 
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#memoria")[0].reset();
					console.log(data.query);
					$("#cad_mem").load("at_tbMemorialocal.php");// atualiza a pagina com o campo inserido 
				} 
				else { 
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadMem").html("<i class='fa fa-save'></i> Salvar");
			}, "json");
		} 
	});
/*---------------|FIM DO CADASTRO MEMORIA|------------------*/	 
	

	/*---------------|FUNCAO PARA CADASTRAR Hd|----------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
$(document.body).on("click","#btn_cadHd", function(){
	var container = $("#formerrosHd"); 
	$("#hd").validate({  
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container), 
		wrapper: 'li',
		rules: {
			hd_tipo  : {required: true}, 
			hd_cap  : {required: true} 
				
		},
		messages:{
			hd_tipo  : {required:"Informe o Tipo"},  
			hd_cap   : {required:"Informe  a Capacidade"}
			
			 
		},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		} 
	});   
	if($("#hd").valid()==true){  
		$("#btn_cadHd").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
		$.post("../controller/sys_acao.php",
			{
			acao:			"cad_Hd", 
			hd_tipo  :	    $("#hd_tipo").val(),  
			hd_cap   :	    $("#hd_cap").val()   
					  
			},function(data){ 
				if (data.status == "OK") { 
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#hd")[0].reset();
					console.log(data.query);
					$("#cad_hd").load("at_tbHdlocal.php");// atualiza a pagina com o campo inserido 
				} 
				else { 
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadHd").html("<i class='fa fa-save'></i> Salvar");
			}, "json");
		} 
	});
/*---------------|FIM DO CADASTRO Hd|------------------*/	
	

/*---------------|FUNCAO PARA CADASTRO DE MAQUINAS|-----------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_cadMq", function(){
        var container = $("#formerrosMq"); 
		$("#cadMq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				sel_empeq      : {required: true},
                sel_tipoeq     : {required: true},
                sel_fabmq      : {required: true},
                mq_modelo      : {required: true, minlength: 2},
                mq_nome        : {required: true, minlength: 6},
                mq_tag         : {required: true, minlength: 4},
                sel_mqmemoria  : {required: true},
                sel_mqhd       : {required: true},
                mq_proc        : {required: true, minlength: 5},
                sel_mqos       : {required: true},
                sel_mqoffice   : {required: true},
                sel_mqstatus   : {required: true},
                mq_nf          : {required: true, minlength: 5},
                mq_valor   	   : {required: true},
                mq_datacad 	   : {required: true},
                mq_datagar 	   : {required: true}
                
			}, 
			messages:{
				sel_empeq   	: {required: "Selecione uma Empresa"},
                sel_tipoeq  	: {required: "Selecione um Tipo"},
                sel_fabmq   	: {required: "Selecione um Fabricante"},
                mq_modelo   	: {required: "Desc. o Modelo", minlength: "M&iacute;nimo de 2 caracteres."},
                mq_nome   		: {required: "Desc. o Nome no padr&atilde;o WK01FIN01", minlength: "M&iacute;nimo de 6 caracteres."},
                mq_tag	   		: {required: "Desc.  a service tag", minlength: "M&iacute;nimo de 4 caracteres."},
                sel_mqmemoria   : {required: "Selecione   a Mem&oacute;ria"},
                sel_mqhd        : {required: "Selecione   o disco r&iacute;gido"},
                mq_proc         : {required: "Desc.  o Precessador", minlength: "M&iacute;nimo de 5 caracteres."},
                sel_mqos        : {required: "Selecione   o Sistema operacional"},
                sel_mqoffice    : {required: "Selecione   o Office"},
                sel_mqstatus    : {required: "Desc. o Satatus"},
                mq_nf           : {required: "Desc. o N&ordm da nota fiscal", minlength: "M&iacute;nimo de 5 caracteres."},
                mq_valor    	: {required: "Desc.  o Valor R$"},
                mq_datacad   	: {required: "Desc.  a Data de compra"},
                mq_datagar    	: {required: "Desc.  a Data de garantia"}
            	 			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#cadMq").valid()==true){ 
			$("#btn_cadMq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao:			"cadMaquinas",   
				sel_empeq:		    $("#sel_empeq").val(), 
			    sel_tipoeq:	     	$("#sel_tipoeq").val(), 
			    sel_fabmq:   	    $("#sel_fabmq").val(),  
			    mq_modelo:       	$("#mq_modelo").val(), 
			    mq_nome:    	    $("#mq_nome").val(), 
			    mq_tag:	     	    $("#mq_tag").val(),  
			    sel_mqmemoria:	   	$("#sel_mqmemoria").val(),
			    sel_mqhd:	    	$("#sel_mqhd").val(),
			    mq_proc:	    	$("#mq_proc").val(),
			    sel_mqos:       	$("#sel_mqos").val(),
			    sel_mqoffice:    	$("#sel_mqoffice").val(),
			    sel_mqstatus:      	$("#sel_mqstatus").val(),
			    mq_nf:      	    $("#mq_nf").val(),
			    mq_valor:	     	$("#mq_valor").val(),
			    mq_datacad:	     	$("#mq_datacad").val(),
			    mq_datagar:	     	$("#mq_datagar").val(),
				mq_licenca:			$("input[name=mq_licenca]:checked").val() 
							 
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#cadMq")[0].reset();
						console.log(data.query);
						location.reload(); 
		 			}
					else { 
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Nome j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_cadMq").html("<i class='fa fa-save'></i> Salvar");
				}, "json");
			}
		}); 
/*---------------|FIM DO CADASTRO DE MAQUINAS |------------------*/		 



/*------------------------|ATRIBUIR  MAQUINA|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
		$(document.body).on("click","#btn_AtrMq", function(){
        var container = $("#formerrosAtrmq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#mq_id").val();    
					
		$("#atr_mq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
               
                sol_dp    : {required: true},
                sol_usu   : {required: true}
                
			}, 
			messages:{
				
                
                sol_dp     : {required: "Sel. um departamento"}, 
                sol_usu    : {required: "Sel. um usu&aacute;rio"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#atr_mq").valid()==true){ 
			$("#btn_AtrMq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");			
			$.post("../controller/sys_acao.php",{ 
				acao: "Atribuir_Mq",
				mq_id: cod,
				
				sol_emp:   $("#sol_emp").val(),   				     
				sol_dp:    $("#sol_dp").val(),   				     
				sol_usu:   $("#sol_usu").val()
				  				     
			   
			},function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					location.reload();
				} 
				else{
					alert(data.mensagem);	
				}
			},	"json");
			} 
		});
		
		 	
		
	/*---------------|FIM DE ATRIBUIR MAQUINA|------------------*/	


/*------------------------|ALTERAR  MAQUINAS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	$(document.body).on("click","#btn_AltMq",function(){
			
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#mq_id").val(); 
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_Mq",
				mq_id: cod,
				mq_nome:         $("#mq_nome").val(),
				mq_tag:    		 $("#mq_tag").val(),
				mq_proc:   		 $("#mq_proc").val(),
				sel_mqmemoria:   $("#sel_mqmemoria").val(),
				sel_mqhd:        $("#sel_mqhd").val(),
				sel_mqos:        $("#sel_mqos").val(),
				sel_mqoffice:    $("#sel_mqoffice").val(),
				sel_mqstatus:    $("#sel_mqstatus").val(),
				mq_valor:        $("#mq_valor").val(),
				mq_nf:           $("#mq_nf").val(),
				mq_datagar:	     $("#mq_datagar").val(),
				mq_licenca: 	 $("input[name=mq_licenca]:checked").val()  
				
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
	/*---------------|FIM DE ALTERAR MAQUINAS|------------------*/	

	/*------------------------|ALTERAR USUARIO DE MAQUINAS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
	
		$(document.body).on("click","#btn_AltusuMq",function(){
			console.log("CLICK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#mq_id").val(); 
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_usuMq",
				mq_id: cod,
				sol_emp:   $("#sol_emp").val(),   				     
				sol_dp:    $("#sol_dp").val(),   				     
				sol_usu:   $("#sol_usu").val()
				
			},
			function(data){ 
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_maquinas.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
	/*---------------|FIM DE ALTERAR USUARIO MAQUINAS|------------------*/	
	
	/*----|FUNCAO PARA CADASTRO DE MANUTENÇÂO DE MAQUINAS SEM USUARIO |-----\
	|	Author: 	Cleber Marrara Prado							  | 
	|	E-mail: 	cleber.marrara.prado@gmail.com					  |
	|	Version:	1.0						 						  |
	|	Date:       26/06/2017			     		   				  |
	\-----------------------------------------------------------------*/ 
	$(document.body).on("click","#btn_Mqmansemusu", function(){
        var container = $("#formerrosMqman"); 
		$("#cadMqmansemusu").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li', 
			rules: {
				man_motivo     : {required: true, minlength: 5},
				//man_ticket     : {required: true, minlength: 2}
                
			}, 
			messages:{
				 man_motivo     : {required: "Desc. o Motivo",minlength: "M&iacute;nimo de 5 caracteres."},
				 //man_ticket     : {required: "Informe o N&ordm; do chamado",minlength: "M&iacute;nimo de 2 caracteres."}
             	 			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}  
		});
		if($("#cadMqmansemusu").valid()==true){ 
			$("#btn_Mqmansemusu").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao:			"cadMqmanutencaosemusulocal",  
				mq_id:		$("#mq_id").val(), 
			    mqemp_id:	$("#mqemp_id").val(), 
			    tipo_id:    $("#tipo_id").val(),   
			    fab_id:     $("#fab_id").val(), 
			    mq_modelo:  $("#mq_modelo").val(), 
			    mq_nome:    $("#mq_nome").val(), 
			    mq_tag:     $("#mq_tag").val(), 
			    emp_id:     $("#emp_id").val(), 
			    dp_id:      $("#dp_id").val(), 
			    usu_id:     $("#usu_id").val(), 
			   // man_ticket: $("#man_ticket").val(), 
			    man_motivo: $("#man_motivo").val()
			    			  
				},function(data){  
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
			} 
		}); 
		
		$(document.body).on("click","#btn_Mqmansemusu", function(){
        var container = $("#formerrosMqman"); 
		console.log("CLICK Status");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#mq_id").val(); 
		$("#cadMqmansemusu").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li', 
			rules: {
				man_motivo     : {required: true, minlength: 5},
				//man_ticket     : {required: true, minlength: 2}
                
			}, 
			messages:{
				
             	 			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}  
		});
		if($("#cadMqmansemusu").valid()==true){ 
			$("#btn_Mqmansemusu").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao: "Altera_StatusMamMqsemusu", 
				mq_id: cod,
				mq_id:	$("#mq_id").val()    
			    			  
				},function(data){  
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
			}
		}); 
		
/*---------------|FIM DO CADASTRO DE  MANUTENÇÂO DE MAQUINAS MAQUINAS SEM USUARIO |------------------*/

	
/*----|FUNCAO PARA CADASTRO DE MANUTENÇÂO DE MAQUINAS|-----\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$(document.body).on("click","#btn_Mqman", function(){
        var container = $("#formerrosMqman"); 
		$("#cadMqman").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li', 
			rules: {
				man_motivo     : {required: true, minlength: 5},
				//man_ticket     : {required: true, minlength: 2}
                
			}, 
			messages:{
				 man_motivo     : {required: "Desc. o Motivo",minlength: "M&iacute;nimo de 5 caracteres."},
				 //man_ticket     : {required: "Informe o N&ordm; do chamado",minlength: "M&iacute;nimo de 2 caracteres."}
             	 			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}  
		});
		if($("#cadMqman").valid()==true){ 
			$("#btn_Mqman").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao:			"cadMqmanutencaolocal",  
				mq_id:		$("#mq_id").val(), 
			    mqemp_id:	$("#mqemp_id").val(), 
			    tipo_id:    $("#tipo_id").val(),   
			    fab_id:     $("#fab_id").val(), 
			    mq_modelo:  $("#mq_modelo").val(), 
			    mq_nome:    $("#mq_nome").val(), 
			    mq_tag:     $("#mq_tag").val(), 
			    emp_id:     $("#emp_id").val(), 
			    dp_id:      $("#dp_id").val(), 
			    usu_id:     $("#usu_id").val(), 
			    //man_ticket: $("#man_ticket").val(), 
			    man_motivo: $("#man_motivo").val()
			    			  
				},function(data){  
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
			}
		}); 
		
		$(document.body).on("click","#btn_Mqman", function(){
        var container = $("#formerrosMqman"); 
		console.log("CLICK Status");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#mq_id").val(); 
		$("#cadMqman").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li', 
			rules: {
				man_motivo     : {required: true, minlength: 5},
				//man_ticket     : {required: true, minlength: 2}
                
			}, 
			messages:{
				
             	 			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}  
		});
		if($("#cadMqman").valid()==true){ 
			$("#btn_Mqman").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao: "Altera_StatusMq",
				mq_id: cod,
				mq_id:	$("#mq_id").val()    
			    			  
				},function(data){  
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
			}
		}); 
		
/*---------------|FIM DO CADASTRO DE  MANUTENÇÂO DE MAQUINAS |------------------*/	

/*------------------------|ALTERAR  MANUTENÇÂO DE MAQUINAS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		$(document.body).on("click","#btn_AltManMq",function(){ 
			 var container = $("#formerrosAltmanMq");
			 console.log("CLICK Mq manut");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#man_id").val();    
			 
			
		if($("#alt_manMq").valid()==true){ 
			$("#btn_AltManMq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");				
			$.post("../controller/sys_acao.php",{ 
				acao: "Alt_ManMaquina", 
				man_id: cod,
				mq_id:              $("#mq_id").val(), 				
			    man_desc: 			CKEDITOR.instances.man_desc.getData(),  
			    man_obs: 			$("#man_obs").val()
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_ger_Manmq.php?token='+token+'&acao=N&manid='+cod);  
				} 
				else{
					alert(data.mensagem);	
				}
			},  "json");
			}
		});  
		
	
	/*---------------|FIM DE ALTERAR MANUTENÇÂO DE MAQUINAS|------------------*/


	/*------------------------|FINALIZAR   MANUTENÇÂO DE MAQUINAS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		$(document.body).on("click","#btn_FinManMq",function(){ 
			 var container = $("#formerrosAltmanMq");
			 console.log("CLICK Mq manut");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#man_id").val();    
			 
			$("#alt_manMq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li', 
			rules: {
				 
              
               man_dataretorno   : {required: true} 
			}, 
			messages:{
				
               
            	man_dataretorno   : {required: "Informe a Data"}			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#alt_manMq").valid()==true){ 
			$("#btn_FinManMq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");				
			$.post("../controller/sys_acao.php",{ 
				acao: "Fin_ManMaquina",
				man_id: cod,
				mq_id:              $("#mq_id").val(), 
				man_dataretorno:    $("#man_dataretorno").val(), 
			    man_desc: 			CKEDITOR.instances.man_desc.getData(), 
			    man_obs: 			$("#man_obs").val()
				  //man_desc: 			CKEDITOR.instances.man_desc.getData(), 
			    //man_obs: 			CKEDITOR.instances.man_obs.getData()
 

				 
				
				   
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_eqmanutencaolocal.php?token='+token);  
				} 
				else{
					alert(data.mensagem);	
				}
			},  "json");
			}
		});  

		$(document.body).on("click","#btn_FinManMq",function(){ 
			 var container = $("#formerrosAltmanMq");
			console.log("CLICK altman");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#mq_id").val();    
			
			$("#alt_manMq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li', 
			rules: {
				 
              man_dataretorno   : {required: true}
               
			}, 
			messages:{
				
                man_dataretorno          : {required: "Des. os servi&ccedil;os realizados"},
            	man_dataretorno   : {required: "Informe a Data"}			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#alt_manMq").valid()==true){ 
			$("#btn_FinManMq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");				
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_StatusMq2",
				mq_id: cod,
				mq_id:		$("#mq_id").val()   
				 
				
				   
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_eqmanutencaolocal.php?token='+token);  
				} 
				else{
					alert(data.mensagem);	
				}
			},  "json");
			}
		});
 	
	
	/*---------------|FIM DE FINALIZAR MANUTENÇÂO DE MAQUINAS|------------------*/

	/*------------------------|LIMPAR MAQUINAS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$(document.body).on("click","#btn_limpaMq",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val(); 
			cod = $("#mq_id").val();
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Limpar_Mq",
				mq_id: cod, 
				
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_maquinaslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});	
 	
	
	
	/*---------------|FIM DE LIMPAR  MAQUINAS|------------------*/	

	
/*------------------------|DESCARTAR  MAQUINAS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
		$(document.body).on("click","#btn_Descmq", function(){
        var container = $("#formerrosDescmq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#mq_id").val();    
					
		$("#Descmq").validate({ 
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                mq_descmotivo   : {required: true}
                
			}, 
			messages:{
				
                mq_descmotivo   : {required: "Desc. o Motivo, em Ativo marque inativo"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#Descmq").valid()==true){ 
			$("#btn_Descmq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao: "Descartar_Mq",
				mq_id: cod,
				mq_descmotivo: $("#mq_descmotivo").val()
				//mq_ativo:  $("input[name=mq_ativo]:checked").val()   
							 
				},function(data){ 
					if (data.status == "OK") {
						$("#confirma").modal("hide");
						$("#aguarde").modal("show");
						$(location).attr('href','at_descarteslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			}, "json"); 
			}
		}); 
		
		$(document.body).on("click","#btn_Descmq", function(){
        var container = $("#formerrosDescmq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#mq_id").val();    
					
		$("#Descmq").validate({ 
			debug: true, 
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                mq_descmotivo   : {required: true}
                
			}, 
			messages:{
				
                mq_descmotivo   : {required: "Desc. o Motivo, em Ativo marque inativo"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#Descmq").valid()==true){ 
			$("#btn_Descmq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao: "Descartar_Mq_mailSender",
				mq_id: cod,
				mq_descmotivo: $("#mq_descmotivo").val()
				//mq_ativo:  $("input[name=mq_ativo]:checked").val()   
							 
				},function(data){ 
					if (data.status == "OK") {
						$("#confirma").modal("hide");  
						$("#aguarde").modal("show");
						$(location).attr('href','at_descarteslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			}, "json"); 
			}
		}); 
			
	/*---------------|FIM DE DESCARTAR MAQUINAS|------------------*/	
	
	
	/*---------------|EXCLUIR  MAQUINAS|----------------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
		/*|COM A CLASSE excHoras, FAZER A EXCLUSÃO DO BD|*/
		$(document.body).on("click",".exc_Eq",function(){
			console.log("CLICK OK");
			cod = $(this).data("reg");
			$.post("../controller/sys_acao.php",{
				acao: "exclui_Equipamento", 
				eq_id: cod

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
	/*---------------|FIM DE EXCLUIR MAQUINA |------------------*/	
	
	/*---------------|RELATORIO DE MAQUINAS ATIVAS|-----------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/
		$(document.body).on("click","#bt_relMq", function(){
			var tabela 	= $("#rel_tbl").val();
			if(tabela == ""){
				alert("Preencha o campo Tabela!"); 
			}   
			else{
				$(this).html("<i class='fa fa-spin fa-spinner'></i> Gerando...");
				var emp = $("#emp_usu").val();
				$("#rls").load('corpo_rel_mqlocal.php?tabela='+tabela+'&emp='+emp);
				$("#bt_print").attr({
					'href':'rel_print_mqlocal.php?tabela='+tabela+'&emp='+emp 
				});
				$("#bt_excel").attr({
					'href':'rel_excelmqlocal.php?tabela='+tabela+'&emp='+emp
				}); 
				console.log('corpo_relmqlocal.php?tabela='+tabela+'&emp='+emp);			
			}
			$(this).html("<i class='fa fa-file-pdf-o'></i> Gerar Relatorio");
		});
	
/*---------------|FIM DE MAQUINAS ATIVAS||------------------*/

/*---------------|RELATORIO DE EQUIPAMENTO ATIVAS|-----------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/
		$(document.body).on("click","#bt_relEq", function(){
			var tabela 	= $("#rel_tbl").val();
			if(tabela == ""){
				alert("Preencha o campo Tabela!");  
			} 
			else{
				$(this).html("<i class='fa fa-spin fa-spinner'></i> Gerando...");
				var emp = $("#emp_usu").val();
				$("#rls").load('corpo_rel_eqlocal.php?tabela='+tabela+'&emp='+emp);
				$("#bt_print").attr({
					'href':'rel_print_eqlocal.php?tabela='+tabela+'&emp='+emp
				});
				$("#bt_excel").attr({
					'href':'rel_excel_eqlocal.php?tabela='+tabela+'&emp='+emp
				}); 
				console.log('corpo_rel_eqlocal.php?tabela='+tabela+'&emp='+emp);			
			}
			$(this).html("<i class='fa fa-file-pdf-o'></i> Gerar Relatorio");
		}); 
	
/*---------------|FIM DE EQUIPAMENTO ATIVAS||------------------*/


/*---------------|RELATORIO DE MAQUINAS INATIVAS|-----------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/
		$(document.body).on("click","#bt_relMqDesc", function(){
			var tabela 	= $("#rel_tbl").val();
			var di 		= $("#rel_di").val(); 
			var df 		= $("#rel_df").val();
			if(tabela == ""){
				alert("Preencha o campo Tabela!"); 
			}  
			else{
				$(this).html("<i class='fa fa-spin fa-spinner'></i> Gerando...");
				var emp = $("#emp_usu").val();
				$("#rls").load('corpo_rel_mqdesclocal.php?tabela='+tabela+'&emp='+emp+'&di='+di+'&df='+df);
				$("#bt_print").attr({
					'href':'rel_print_mqdesclocal.php?tabela='+tabela+'&emp='+emp+'&di='+di+'&df='+df
				});
				$("#bt_excel").attr({
					'href':'rel_excel_mqdesclocal.php?tabela='+tabela+'&emp='+emp+'&di='+di+'&df='+df
				}); 
				console.log('corpo_rel_mqdesclocal.php?tabela='+tabela+'&emp='+emp+'&di='+di+'&df='+df);			
			}
			$(this).html("<i class='fa fa-file-pdf-o'></i> Gerar Relatorio");
		});
	
/*---------------|FIM DE MAQUINAS INATIVAS||------------------*/

/*---------------|RELATORIO DE EQUIPAMENTOS INATIVOS|-----------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/
		$(document.body).on("click","#bt_relEqdesc", function(){
			var tabela 	= $("#rel_tbl").val();
			var di 		= $("#rel_di").val(); 
			var df 		= $("#rel_df").val();
			if(tabela == ""){
				alert("Preencha o campo Tabela!"); 
			} 
			else{
				$(this).html("<i class='fa fa-spin fa-spinner'></i> Gerando...");
				var emp = $("#emp_usu").val();
				$("#rls").load('corpo_rel_eqdesclocal.php?tabela='+tabela+'&emp='+emp+'&di='+di+'&df='+df);
				$("#bt_print").attr({
					'href':'rel_print_eqdesclocal.php?tabela='+tabela+'&emp='+emp+'&di='+di+'&df='+df
				});
				$("#bt_excel").attr({
					'href':'rel_excel_eqdesclocal.php?tabela='+tabela+'&emp='+emp+'&di='+di+'&df='+df
				}); 
				console.log('corpo_rel_eqdesclocal.php?tabela='+tabela+'&emp='+emp+'&di='+di+'&df='+df);			
			}
			$(this).html("<i class='fa fa-file-pdf-o'></i> Gerar Relatorio");
		});
	
/*---------------|FIM DE EQUIPAMENTO INATIVOS|------------------*/

/*------------|RELATORIO DE MANUTENÇÂO DE EQUIPAMENTOS POR EMPRESA|-----------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/
		$(document.body).on("click","#bt_relEqman_empresa", function(){
			var tabela 	= $("#rel_tbl").val();
			var sel_emp = $("#sel_emp").val();
			var di 		= $("#rel_di").val(); 
			var df 		= $("#rel_df").val();
			if(tabela == ""){
				alert("Preencha o campo Tabela!"); 
			}  
			else{
				$(this).html("<i class='fa fa-spin fa-spinner'></i> Gerando...");
		
				$("#rls").load('corpo_relEqman_empresalocal.php?tabela='+tabela+'&sel_emp='+sel_emp+'&di='+di+'&df='+df);
				$("#bt_print").attr({
					'href':'rel_print_relEqman_empresalocal.php?tabela='+tabela+'&sel_emp='+sel_emp+'&di='+di+'&df='+df
				});
				$("#bt_excel").attr({
					'href':'rel_excel_relEqman_empresalocal.php?tabela='+tabela+'&sel_emp='+sel_emp+'&di='+di+'&df='+df
				}); 
				console.log('corpo_relEqman_empresalocal.php?tabela='+tabela+'&sel_emp='+sel_emp+'&di='+di+'&df='+df);			
			}
			$(this).html("<i class='fa fa-file-pdf-o'></i> Gerar Relatorio");
		}); 
	
/*---------------|FIM DE MANUTENÇÂO DE EQUIPAMENTOS POR EMPRESA|------------------*/


/*---------------|FUNCAO PARA CADASTRO DE TERMO DE UTILIZAÇÃO|-----------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_cadTrm", function(){
        var container = $("#formerrostrm"); 
		$("#cadTrm").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				usu_chapa      : {required: true},
                usu_cargo      : {required: true},
                usu_cpts   	   : {required: true},
                usu_rg		   : {required: true, minlength: 7},
                usu_cpf        : {required: true, minlength: 7},
                chamado        : {required: true}
                
			}, 
			messages:{
				usu_chapa   	: {required: "Desc. a chapa	"},
                usu_cargo 	 	: {required: "Desc. o cargo"},
                usu_cpts	   	: {required: "Desc. a CTPS"},
                usu_rg		   	: {required: "Desc. o RG", minlength: "M&iacute;nimo de 7 caracteres."},
                usu_cpf   		: {required: "Desc. o CPF", minlength: "M&iacute;nimo de 7 caracteres."},
                chamado   		: {required: "Desc. o N&ordm; do chamado"}
            	 			
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#cadTrm").valid()==true){ 
			$("#btn_cadTrm").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao:			"cadTermo",   
				usu_empId:		    $("#usu_empId").val(), 
				usu_dpId:		    $("#usu_dpId").val(),
				usu_Id:	     	    $("#usu_Id").val(), 				
				eq_tipoId:		    $("#eq_tipoId").val(), 
				mq_fabId:		    $("#mq_fabId").val(), 
				eq_Id:			   	$("#eq_Id").val(),
				usu_chapa:		    $("#usu_chapa").val(), 
			    usu_cargo:	     	$("#usu_cargo").val(), 
			    usu_cpts:   	    $("#usu_cpts").val(),  
			    usu_rg:   	     	$("#usu_rg").val(), 
			    usu_cpf:    	    $("#usu_cpf").val(), 
			    item1:    	  		$("#item1").val(),
			    item1_qtde:    	    $("#item1_qtde").val(), 
			    item2:    	        $("#item2").val(), 
			    item2_qtde:    	    $("#item2_qtde").val(), 
			    chamado:    	    $("#chamado").val() 
			      
			     
							 
				},function(data){
					if(data.status=="OK"){
					$("#confirma").modal("hide"); 
					$("#aguarde").modal("show");
					location.reload();
				} 
				else{
					alert(data.mensagem);
										
				}
				}, "json");
			}
		}); 
/*---------------|FIM DO CADASTRO DE TERMO DE UTILIZAÇÃO |------------------*/	

/*------------------------|ALTERAR  TERMO DE UTILIZAÇÃO MQ|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	$(document.body).on("click","#btn_altTrmMq",function(){
			console.log("CLICK"); 
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#trm_id").val(); 
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_Trm",
				trm_id: cod,
				usu_chapa:   	 $("#usu_chapa").val(),
				usu_cargo:       $("#usu_cargo").val(),
				usu_cpts:        $("#usu_cpts").val(),
				usu_rg:          $("#usu_rg").val(),
				usu_cpf:         $("#usu_cpf").val(),
				item1:		     $("#item1").val(),
				item1_qtde:      $("#item1_qtde").val(),
				item2:           $("#item2").val(),
				item2_qtde:	     $("#item2_qtde").val(),
				chamado: 	 	 $("#chamado").val() 
				 
			},
			function(data){ 
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_termo_Mqlocal.php?token='+token+'&acao=N&trmid='+cod); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
	/*---------------|FIM DE ALTERAR TERMO DE UTILIZAÇÃO MQ|------------------*/	

/*------------------------|ALTERAR  TERMO DE UTILIZAÇÃO EQ|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	$(document.body).on("click","#btn_altTrmEq",function(){
			console.log("CLICK"); 
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#trm_id").val(); 
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_Trm",
				trm_id: cod,
				usu_chapa:   	 $("#usu_chapa").val(),
				usu_cargo:       $("#usu_cargo").val(),
				usu_cpts:        $("#usu_cpts").val(),
				usu_rg:          $("#usu_rg").val(),
				usu_cpf:         $("#usu_cpf").val(),
				item1:		     $("#item1").val(),
				item1_qtde:      $("#item1_qtde").val(),
				item2:           $("#item2").val(),
				item2_qtde:	     $("#item2_qtde").val(),
				chamado: 	 	 $("#chamado").val() 
				 
			},
			function(data){ 
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_termo_Eqlocal.php?token='+token+'&acao=N&trmid='+cod); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
	/*---------------|FIM DE ALTERAR TERMO DE UTILIZAÇÃO EQ|------------------*/	

	/*------------------------|FUNÇÂO GERAR QRCODE  DE  EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$(document.body).on("click","#btn_qrcodeEq",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val(); 
			cod = $("#eq_id").val();
			
			
			$.post("../images/qrcode_img/acao_Qrcode.php",{ 
				acao: "Gerar_qrcodeEq",
				eq_id: cod, 
				  
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_ger_Eqlocal.php?token='+token+'&acao=N&eqid='+cod); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});	
 	
	
	
	/*---------------|FIM DE FUNÇÂO GERAR QRCODE  DE  EQUIPAMENTOS|------------------*/	
	
	
	/*------------------------|FUNÇÂO GERAR QRCODE  DE  MAQUINAS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$(document.body).on("click","#btn_qrcodeMq",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val(); 
			cod = $("#mq_id").val();
			
			
			$.post("../images/qrcode_img/acao_Qrcode.php",{ 
				acao: "Gerar_qrcodeMq",
				mq_id: cod,  
				  
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_ger_Mqlocal.php?token='+token+'&acao=N&mqid='+cod); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});	
 	
	
	
	/*---------------|FIM DE FUNÇÂO GERAR QRCODE  DE  MAQUINAS|------------------*/	
	
	/*---------------|RELATORIO DE EQUIPAMENTOS QRCODE|-----------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/
		$(document.body).on("click","#bt_relEqQrcode", function(){
			var tabela 	= $("#rel_tbl").val();
			if(tabela == ""){
				alert("Preencha o campo Tabela!"); 
			} 
			else{
				$(this).html("<i class='fa fa-spin fa-spinner'></i> Gerando...");
				var emp = $("#emp_usu").val();
				$("#rls").load('corpo_rel_eqQrcodelocal.php?tabela='+tabela+'&emp='+emp);
				$("#bt_print").attr({
					'href':'rel_print_eqQrcodelocal.php?tabela='+tabela+'&emp='+emp
				});
				
				console.log('corpo_rel_eqQrcodelocal.php?tabela='+tabela+'&emp='+emp);			
			}
			$(this).html("<i class='fa fa-file-pdf-o'></i> Gerar Relatorio");
		});
	
	
/*---------------|FIM DE RELATORIO EQUIPAMENTO QRCODE||------------------*/	

/*---------------|RELATORIO DE MAQUINAS QRCODE|-----------------------*\  
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/
		$(document.body).on("click","#bt_relMqQrcode", function(){
			var tabela 	= $("#rel_tbl").val();
			if(tabela == ""){
				alert("Preencha o campo Tabela!"); 
			} 
			else{
				$(this).html("<i class='fa fa-spin fa-spinner'></i> Gerando...");
				var emp = $("#emp_usu").val();
				$("#rls").load('corpo_rel_mqQrcodelocal.php?tabela='+tabela+'&emp='+emp);
				$("#bt_print").attr({
					'href':'rel_print_mqQrcodelocal.php?tabela='+tabela+'&emp='+emp
				});
				
				console.log('corpo_rel_mqQrcodelocal.php?tabela='+tabela+'&emp='+emp);			
			}
			$(this).html("<i class='fa fa-file-pdf-o'></i> Gerar Relatorio");
		});
	
/*---------------|FIM DE MAQUINAS QRCODE||------------------*/	
 
/*---------------|FUNCAO PARA CADASTRO DE CHIPS|-----------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       12/10/2017						   				|
	\--------------------------------------------------------------*/ 
	
	$(document.body).on("click","#btn_cadChip", function(){
        var container = $("#formerrosChip"); 
		$("#cadChip").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				
				chip_operadora  : {required: true},
                chip_serial  	: {required: true, minlength: 10},
                chip_linha    	: {required: true, minlength: 11},
                chip_pin      	: {required: true, minlength: 4},
                chip_pin2    	: {required: true, minlength: 4},
                chip_puk    	: {required: true, minlength: 8},
                chip_puk2    	: {required: true, minlength: 8}
                
                
			}, 
			messages:{
				
                chip_operadora  : {required: "Desc. A Operadora"},
                chip_serial  	: {required: "Desc. o serial", minlength: "M&iacute;nimo de 10 caracteres."},
                chip_linha	    : {required: "Des. a Linha com DDD", minlength: "M&iacute;nimo de 11 caracteres."},
                chip_pin	    : {required: "Des. o Pin", minlength: "M&iacute;nimo de 4 caracteres."},
                chip_pin2	    : {required: "Des. o Pin2", minlength: "M&iacute;nimo de 4 caracteres."},
                chip_puk	    : {required: "Des. o Puk", minlength: "M&iacute;nimo de 8 caracteres."},
                chip_puk2	    : {required: "Des. o Puk2", minlength: "M&iacute;nimo de 8 caracteres."}
                
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#cadChip").valid()==true){ 
			$("#btn_cadChip").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao:			"cadChips",  
				sel_empchip:	$("#sel_empchip").val(), 
			    chip_operadora:	$("#chip_operadora").val(), 
			    chip_serial:    $("#chip_serial").val(), 
			    chip_linha:	   	$("#chip_linha").val(),  
			    chip_pin:	   	$("#chip_pin").val(),  
			    chip_pin2:	   	$("#chip_pin2").val(),  
			    chip_puk:	   	$("#chip_puk").val(),  
			    chip_puk2:	   	$("#chip_puk2").val()
			    
							 
				},function(data){
					if (data.status == "OK") {
						$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
						$("#cadChip")[0].reset();
						console.log(data.query);
						location.reload(); 
		 			}
					else { 
						$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Serial j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					}
					$("#btn_cadChip").html("<i class='fa fa-save'></i> Salvar");
				}, "json");
			}
		}); 
/*---------------|FIM DO CADASTRO DE CHIPS |------------------*/	


/*------------|FUNCA PARA SELECIONAR O MARCA REF AO TIPO|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_tpCel").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",    
		{
			acao: "populaCheckCelmarca",   
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_marcaCel").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckCelmarca" |------------------*/
			
	/*------------|FUNCA PARA SELECIONAR O EQUIPAMNETO REF A MARCA|------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$("#sel_marcaCel").on("change", function(){
		$("#aguarde").modal("show");
		$.post("../controller/sys_acao.php",  
		{
			acao: "populaCheckChipeq",    
			id: $(this).val()
		},function(data){
			$("#aguarde").modal("hide");
			$("#sel_eqchip").html(data); 
		},"html");  
	});
/*---------------|FIM DA FUNCAO "populaCheckChipeq"  |------------------*/

/*------------------------|ATRIBUIR  CHIPS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
		$(document.body).on("click","#btn_AtrChip", function(){
        var container = $("#formerrosAtrchip");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#chip_id").val();    
					
		$("#atr_chip").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				  
                sel_empChip   : {required: true},
                sel_eqchip   : {required: true}
                
			}, 
			messages:{
				 
                sel_empChip   : {required: "Sel. uma empresa"},
                sel_eqchip   : {required: "Sel. um equipamento"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		}); 
		if($("#atr_chip").valid()==true){ 
			$("#btn_AtrChip").html("<i class='fa fa-spin fa-spinner'></i> Processando...");			
			$.post("../controller/sys_acao.php",{ 
				acao: "Atribuir_Chip",
				chip_id: cod,
				
				  				     
				sel_empChip:     $("#sel_empChip").val(),  				     
				sel_eqchip:     $("#sel_eqchip").val()  				     
			   
			},function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_chipslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},	"json");
			} 
		}); 
		 
		 	
		
	/*---------------|FIM DE ATRIBUIR CHIPS|------------------*/	 
	
	
	/*------------------------|ALTERAR  CHIPS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
	
	$(document.body).on("click","#btn_AltChip", function(){
        var container = $("#formerrosAlteq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#chip_id").val();    
					
		$("#alt_chip").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                
			}, 
			messages:{
				
                
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		}); 
	
		
		if($("#alt_chip").valid()==true){ 
			$("#btn_AltChip").html("<i class='fa fa-spin fa-spinner'></i> Processando...");			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_Chip", 
				chip_id: cod,
				
				chip_operadora:  $("#chip_operadora").val(),
				chip_serial:	 $("#chip_serial").val(),
				chip_linha:      $("#chip_linha").val(), 
				chip_pin:  		 $("#chip_pin").val(),   				     
				chip_pin2: 		 $("#chip_pin2").val(),   				     
				chip_puk: 		 $("#chip_puk").val(),   				     
				chip_puk2: 		 $("#chip_puk2").val(),
				chip_ativo: 	 $("input[name=chip_ativo]:checked").val()   
			   
			},function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					location.reload(); 
				} 
				else{
					alert(data.mensagem);	
				}
			},	"json");
			} 
		}); 
	/*---------------|FIM DE ALTERAR CHIP|------------------*/	
	
	
	/*------------------------|ALTERAR CHIP DE EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
	    
		$(document.body).on("click","#btn_AltchipEq", function(){
        var container = $("#formerrosAltchip");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#chip_id").val();    
					
		$("#alt_chipeq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				  
                sel_empChip   : {required: true},
                sel_eqchip   : {required: true}
                
			}, 
			messages:{
				 
                sel_empChip   : {required: "Sel. uma empresa"},
                sel_eqchip   : {required: "Sel. um equipamento"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		}); 
		if($("#alt_chipeq").valid()==true){ 
			$("#btn_AltchipEq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");			
			$.post("../controller/sys_acao.php",{ 
				acao: "Altera_ChipEq",
				chip_id: cod,
				
				  				     
				sel_empChip:     $("#sel_empChip").val(),  				     
				sel_eqchip:     $("#sel_eqchip").val()  				     
			   
			},function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_ger_Chiplocal.php?token='+token+'&acao=N&chipid='+cod); 
				} 
				else{
					alert(data.mensagem);	
				}
			},	"json");
			} 
		}); 
		 
		
	/*---------------|FIM DE ALTERAR EQUIPAMENTO DO CHIP|------------------*/	
	
/*------------------------|LIMPAR CHIP|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
	$(document.body).on("click","#btn_limpaChip",function(){
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val(); 
			cod = $("#chip_id").val();
			
			
			$.post("../controller/sys_acao.php",{ 
				acao: "Limpar_Chip",
				chip_id: cod, 
				  
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_chipslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});	
 	
	
	
	/*---------------|FIM DE LIMPAR  CHIP|------------------*/

	/*------------------------|CADASTRAR IMEI2|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
	$(document.body).on("click","#btn_cadImei2", function(){
        var container = $("#formerrosImei2");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#eq_id").val();    
					
		$("#cadimei2").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
			imei2   : {required: true, minlength: 10}	 
                
			}, 
			messages:{
				
            imei2   : {required: "Desc. o IMEI2", minlength: "M&iacute;nimo de 10 caracteres."},    
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		}); 
	
		
		if($("#cadimei2").valid()==true){ 
			$("#btn_cadImei2").html("<i class='fa fa-spin fa-spinner'></i> Processando...");			
			$.post("../controller/sys_acao.php",{ 
				acao: "Cad_imei2", 
				eq_id: cod,
			   
				imei2:  $("#imei2").val()
				   
			},function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_ger_Eqlocal.php?token='+token+'&acao=N&eqid='+cod); 
				} 
				else{
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> IMEI2 j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
			},	"json");
			} 
		}); 
	/*---------------|FIM DE CADASTRAR IMEI2|------------------*/

/*---------------|FUNCAO PARA CADASTRAR A INSTITUIÇÂO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/
$(document.body).on("click","#btn_cadInst", function(){
	var container = $("#formerrosCadInst"); 
	$("#cadInst").validate({
		debug: true,
		errorClass: "error",
		errorContainer: container,
		errorLabelContainer: $("ol", container),
		wrapper: 'li',
		rules: {
			inst_nome    : {required: true, minlength: 10},	
			inst_alias   : {required: true, minlength: 2},	
			inst_cnpj    : {required: true, minlength: 10},	
			inst_ie      : {required: true, minlength: 9},	
			cep          : {required: true, minlength: 8},	
			num          : {required: true},	
			inst_contato : {required: true, minlength: 5},
			inst_email   : {required: true, email:true},		
			inst_tel     : {required: true, minlength: 12},	
			inst_site    : {required: true, minlength: 10} 	
			
		},
		messages:{
			inst_nome    : {required:"Informe a Raz&atilde;o social", minlength: "M&iacute;nimo de 10 caracteres."},
			inst_alias   : {required:"Informe o Apelido", minlength: "M&iacute;nimo de 2 caracteres."},
			inst_cnpj    : {required:"Informe o CNPJ ", minlength: "M&iacute;nimo de 10 caracteres."},
			inst_ie      : {required:"Informe a Insc. Estadual", minlength: "M&iacute;nimo de 9 caracteres."},
			cep          : {required:"Informe Um CEP", minlength: "M&iacute;nimo de 8 caracteres."},
			num          : {required:"Informe Um N&uacute;mero"},
			inst_contato : {required:"Informe Um nome valido", minlength: "M&iacute;nimo de 5 caracteres."},
			inst_email	 : {required: "Informe um e-mail valido", email:"Email Invalido"},
			inst_tel     : {required:"Informe o Telefone", minlength: "M&iacute;nimo de 12 caracteres."},
			inst_site    : {required:"Informe um Site", minlength: "M&iacute;nimo de 10 caracteres."}
				
		},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
	});
	if($("#cadInst").valid()==true){
		$("#btn_cadInst").html("<i class='fa fa-spin fa-spinner'></i> Processando..."); 
		$.post("../controller/sys_acao.php",
			{
			acao:			"cadInstituicoes", 
			inst_nome:		$("#inst_nome").val(), 
			inst_alias:		$("#inst_alias").val(),  
			inst_cnpj:		$("#inst_cnpj").val(),
			inst_ie:     	$("#inst_ie").val(), 
			cep:    	    $("#cep").val(),
			log:    	    $("#log").val(),
			num:    	    $("#num").val(),
			compl:    	    $("#compl").val(),
			bai:    	    $("#bai").val(),
			cid:    	    $("#cid").val(),
			uf:    	        $("#uf").val(),						
			inst_contato:	$("#inst_contato").val(), 
			inst_email:		$("#inst_email").val(), 
			inst_tel:		$("#inst_tel").val(),
			inst_site:		$("#inst_site").val() 
		 
			},function(data){
				if (data.status == "OK") {
					$("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
					$("#cadInst")[0].reset(); 
					console.log(data.query);
					$("#Inst_cad").load("../view/at_tbInstituicoes.php");// atualiza a pagina com o campo inserido 
				}
				else {
					$("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Nome j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#mens");
				}
				$("#btn_cadInst").html("<i class='fa fa-save'></i> Salvar");
			}, "json");
		}
	});
/*---------------|FIM DO CADASTRO INSTITUIÇÂO |------------------*/		

/*---------------|ALTERAR  INSTITUIÇÂO|----------------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com	    				|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
	
		$(document.body).on("click","#btn_Altinst",function(){ 
			console.log("CLICK OK");
			var token = $("#token").val();
			var lista = $("#lista").val();
			cod = $("#inst_id").val(); 
			
			
			$.post("../controller/sys_acao.php",{ 
			acao: "Altera_inst",
			inst_id: cod,
			inst_nome:		$("#inst_nome").val(), 
			inst_alias:		$("#inst_alias").val(),  
			inst_cnpj:		$("#inst_cnpj").val(),
			inst_ie:     	$("#inst_ie").val(), 
			cep:    	    $("#cep").val(),
			log:    	    $("#log").val(),
			num:    	    $("#num").val(),
			compl:    	    $("#compl").val(),
			bai:    	    $("#bai").val(),
			cid:    	    $("#cid").val(),
			uf:    	        $("#uf").val(),						
			inst_contato:	$("#inst_contato").val(), 
			inst_email:		$("#inst_email").val(), 
			inst_tel:		$("#inst_tel").val(),
			inst_site:		$("#inst_site").val()			 
			},
			function(data){
				if(data.status=="OK"){
					$("#confirma").modal("hide");
					$("#aguarde").modal("show");
					$(location).attr('href','at_instituicoeslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			},
			"json");
		});
		
	/*---------------|FIM DE ALTERAR INSTITUIÇÂO|------------------*/	

	/*---------------|EQUIPAMENTOS PARA DOAÇÂO|--------------------*\
| Author:   Cleber Marrara Prado                                |
| Version:  1.0                                                 |
| Email:    cleber.marrara.prado@gmail.com                      |
| Date:     27/09/2016                                          |
\*-------------------------------------------------------------*/
$(document.body).on("change","#cc_colab",function(){
    console.log($(this).val());
    if($(this).val()==0){
        $("#gccart").attr("disabled",true);
    }
    else{
        $("#gccart").attr("disabled",false);
        
    }
});

$(document.body).on("click","#gccart", function () {
    $(this).html("<i class='fa fa-spinner fa-spin'></i> Gerando...");
    
    // solução para pegar todos os check de IR marcados para a geraçao do boleto
    var checkeditems = $('input:checkbox[name="emp_cods[]"]:checked')
                   .map(function() { return $(this).val() })
                   .get()
                   .join(",");
    if(checkeditems==""){
        alert("Selecione os Equipamentos !");
        
    }
    else{
        $.post("../controller/sys_acao.php",
            {
                acao     	: "eq_doacao",
                doacoes  	: checkeditems,
                instituicao : $("#cc_colab").val()
            },
            function(data){
                if(data.status=="OK"){
                        $("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-flag-checkered"></i> '+data.mensagem+' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta");
                        location.reload();
                        
                    } else{
                        $("<div></div>").addClass("alert alert-danger alert-dismissable").html('<i class="fa fa-times"></i> Ocorreu um erro! ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta");
                    }
                    console.log(data.sql);//TO DO mensagem OK
            },
            "json"
        );
    }
    $("#gccart").html("<i class='fa fa-bank'></i> Doar para");
}); 
/*---------------|FIM DE EQUIPAMENTOS PARA DOAÇÂO|-----------------------*\


/*---------------|MAQUINAS PARA DOAÇÂO|--------------------*\
| Author:   Cleber Marrara Prado                                |
| Version:  1.0                                                 |
| Email:    cleber.marrara.prado@gmail.com                      |
| Date:     27/09/2016                                          |
\*-------------------------------------------------------------*/
$(document.body).on("change","#cc_colab1",function(){
    console.log($(this).val());
    if($(this).val()==0){
        $("#gccart1").attr("disabled",true);
    }
    else{
        $("#gccart1").attr("disabled",false);
        
    }
});

$(document.body).on("click","#gccart1", function () {
    $(this).html("<i class='fa fa-spinner fa-spin'></i> Gerando...");
    
    // solução para pegar todos os check de IR marcados para a geraçao do boleto
    var checkeditems = $('input:checkbox[name="mq_cods[]"]:checked')
                   .map(function() { return $(this).val() })
                   .get()
                   .join(",");
    if(checkeditems==""){
        alert("Selecione as Maquinas !");
        
    }
    else{
        $.post("../controller/sys_acao.php",
            {
                acao     	: "mq_doacao",
                doacoes  	: checkeditems,
                instituicao : $("#cc_colab1").val()
            },
            function(data){
                if(data.status=="OK"){
                        $("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-flag-checkered"></i> '+data.mensagem+' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consultar");
                        location.reload();
                        
                    } else{
                        $("<div></div>").addClass("alert alert-danger alert-dismissable").html('<i class="fa fa-times"></i> Ocorreu um erro! ('+data.mensagem+')<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consultar");
                    }
                    console.log(data.sql);//TO DO mensagem OK
            },
            "json"
        );
    }
    $("#gccart1").html("<i class='fa fa-bank'></i> Doar para");
}); 
/*---------------|FIM DE MAQUINAS PARA DOAÇÂO|-----------------------*\

/*---------------|RELATORIO DE DOAÇÂO A INSTITUIÇÂO|-----------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	\*-------------------------------------------------------------*/
		$(document.body).on("click","#bt_relDoacao", function(){
			var tabela 	 = $("#rel_tbl").val();
			var sel_inst = $("#sel_inst").val();
			var di 		 = $("#rel_di").val(); 
			var df 		 = $("#rel_df").val();
			if(di == ""|| df == "" ){
				alert("Informe as datas Incial e final!"); 
			}  
			else{
				$(this).html("<i class='fa fa-spin fa-spinner'></i> Gerando...");
		
				$("#rls").load('corpo_relDoacaolocal.php?tabela='+tabela+'&sel_inst='+sel_inst+'&di='+di+'&df='+df);
				$("#bt_print").attr({
					'href':'rel_print_Doacaolocal.php?tabela='+tabela+'&sel_inst='+sel_inst+'&di='+di+'&df='+df
				});
				$("#bt_excel").attr({
					'href':'rel_excel_Doacaolocal.php?tabela='+tabela+'&sel_inst='+sel_inst+'&di='+di+'&df='+df
				}); 
				console.log('corpo_relDoacaolocal.php?tabela='+tabela+'&sel_inst='+sel_inst+'&di='+di+'&df='+df);			
			}
			$(this).html("<i class='fa fa-file-pdf-o'></i> Gerar Relatorio");
		});
	
/*---------------|FIM DE DOAÇÂO A INSTITUIÇÂO|------------------*/

/*------------------------|OUTRAS OCORRENCIAS DE MAQUINAS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
		$(document.body).on("click","#btn_outmq", function(){
        var container = $("#formerrosOutmq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#mq_id").val();    
					
		$("#Outmq").validate({ 
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                mq_descmotivo   : {required: true}
                
			}, 
			messages:{
				
                mq_descmotivo   : {required: "Desc. o Motivo, em Ativo marque inativo"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#Outmq").valid()==true){ 
			$("#btn_outmq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao: "Outros_Mq",
				mq_id: cod,
				mq_descmotivo: $("#mq_descmotivo").val()
				//mq_ativo:  $("input[name=mq_ativo]:checked").val()   
							 
				},function(data){ 
					if (data.status == "OK") {
						$("#confirma").modal("hide");
						$("#aguarde").modal("show");
						$(location).attr('href','at_outroslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			}, "json"); 
			}
		}); 
		
		$(document.body).on("click","#btn_Descmq", function(){
        var container = $("#formerrosDescmq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#mq_id").val();    
					
		$("#Outmq").validate({ 
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                mq_descmotivo   : {required: true} 
                
			}, 
			messages:{
				
                mq_descmotivo   : {required: "Desc. o Motivo, em Ativo marque inativo"}
            		 		
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		} 
		});
	});


/*---------------|FIM DE OUTRAS OCORRENCIAS DE MAQUINAS|------------------*/

/*------------------------|OUTRAS OCORRENCIAS DE EQUIPAMENTOS|-----------------------*\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
 	
		$(document.body).on("click","#btn_Outeq", function(){
        var container = $("#formerrosOuteq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#eq_id").val();    
					
		$("#Outeq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                eq_descmotivo   : {required: true}
                
			}, 
			messages:{
				
                eq_descmotivo   : {required: "Desc. o Motivo, em Ativo marque inativo"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		if($("#Outeq").valid()==true){ 
			$("#btn_Outeq").html("<i class='fa fa-spin fa-spinner'></i> Processando...");
			$.post("../controller/sys_acao.php",
				{  
				acao: "Outros_Eq",
				eq_id: cod,
				eq_descmotivo: $("#eq_descmotivo").val()
				//eq_ativo:  $("input[name=eq_ativo]:checked").val()   
							 
				},function(data){ 
					if (data.status == "OK") {
						$("#confirma").modal("hide");
						$("#aguarde").modal("show");
						$(location).attr('href','at_outroslocais.php?token='+token); 
				} 
				else{
					alert(data.mensagem);	
				}
			}, "json");
			}
		}); 
		
			
		$(document.body).on("click","#btn_Outeq", function(){
        var container = $("#formerrosOuteq");
		console.log("CLICK OK");
			var token = $("#token").val(); 
			var lista = $("#lista").val();
			cod = $("#eq_id").val();    
					
		$("#Outeq").validate({
			debug: true,
			errorClass: "error",
			errorContainer: container,
			errorLabelContainer: $("ol", container),
   			wrapper: 'li',
			rules: {
				 
                eq_descmotivo   : {required: true}
                
			}, 
			messages:{
				
                eq_descmotivo   : {required: "Desc. o Motivo, em Ativo marque inativo"}
            				
			},
	            highlight: function(element) {
	        		$(element).closest('.form-group').addClass('has-error');
	    		},
	    		unhighlight: function(element) {
	        		$(element).closest('.form-group').removeClass('has-error');
	    		}
		});
		});
/*---------------|FIM DE OUTRAS OCORRENCIAS DE EQUIPAMENTOS|------------------*/

 
/*---------------|FIM DA FUNCAO|------------------*/		
});	
