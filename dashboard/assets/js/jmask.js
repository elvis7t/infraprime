$(document).ready(function(){
	$('.date').mask('11/11/1111');
	$('.time').mask('00:00:00');
	$('.cep').mask('99999999');
	$('.tel').keyup(function(){
		if($(this).val().length < 13){
			$('.tel').mask('(99)9999-9999');
		}
		else{
			$('.tel').mask('(99)9 9999-9999');
		}
	});
	
	$('.tel2').mask('(999) 9999-9999');
	$('.cel').mask('(99)9 9999-9999');
	$('.cnpj').mask('00.000.000/0000-00');
	//$('.moeda').mask('R$ 000.000,00')teste; 
	$('.moeda').mask('00000.00');
	$('.fone').mask('(99) 9999-9999');
});

$(document).ready(function(){
	console.log("Matt, funcionou!"); 
	
	$("input").focus(function(){
		$('.data_br').mask('99/99/9999');
		$('.shortdate').mask('99/9999');
		$('.time').mask('99:99:99');
		$('.cep').mask('99999999');
		$('.tel2').mask('(999) 9999-9999'); 
		$('.tel').mask('(99)9999-9999'); 
		$('.telsm').mask('9999-9999');
		$('.cel').mask('(99)9 9999-9999');
		$('.cpf').mask('999.999.999-99');
		$('.cnpj').mask('99.999.999/9999-99');
		$('.iest').mask('999.999.999.999');
		
		$('.moeda').mask('99999.99'); 
		$('.fone').mask('(99) 9999-9999');  
	});
});