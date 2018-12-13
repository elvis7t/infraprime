$(document).ready(function(){
	console.log("JS OK");
	
	$(document).ajaxStart(function () {
        console.log(tipo);
        $('#load').fadeIn('show');
    });
    $(document).ajaxStop(function () {
        $('#load').fadeOut('hide');
    });
	
	
	$("#btnEnvia").on("click", function(){
		
		$.post("../controller/fale.php",
		{
			nome: 	$("#nome").val(),
			email: 	$("#email").val(),
			msn: 	$("#msn").val()
		},
		function(data){
			if(data.status == 1){
				$("<div></div>").addClass("alert alert-success alert-dismissible").html(data.mensagem +'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>').appendTo("#ret");
				$('#frm1').each(function(){
					this.reset();
				});
					
			}
			else{
				$("<div></div>").addClass("alert alert-danger alert-dismissible").html(data.mensagem).appendTo("#ret");
				console.log(data.sql);
			}
		},
		"json");
		
	});

});
