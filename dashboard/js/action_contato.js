/*---------------|FUNCAO PARA CONTATO DO SITE|-----------------*/
/*	|	Author: 	Elvis Leite da Silva	|
	|	E-mail: 	elvis7t@gmail.com 		|
	|	Version:	1.0						|*/
	
	 
/*---------------|FIM CADASTRO DE USUARIOS|------------------*/	

  $(document.body).on("click","#btn_altera_status", function(){ 
	  var cod = $("#btn_altera_status").data("id");
        $.post("../controller/ou_contato.php",
            {
                acao	: "altera_status",
                id		: cod

            },function(data){
                if (data.status == "OK") {
                    $("<div></div>").addClass("alert alert-success alert-dismissable").html('<i class="fa fa-check"></i> ('+data.mensagem+') <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta");
                    console.log(data.query);
					$(location).attr("href","ou_vis_msn.php?ou_contato_Id="+cod);
                }
                else {
                    $("<div></div>").addClass("alert alert-warning alert-dismissable").html('<i class="fa fa-warning"></i> Cliente j&aacute; cadastrado <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>').appendTo("#consulta");
                   }
            }, "json");
    });
	

/*---------------|FIM CADASTRO DE USUARIOS|------------------*/
 
























