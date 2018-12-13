<?php
//session_start();
date_default_timezone_set('America/Sao_paulo');
require_once("../model/recordset.php");
$rs = new recordset();
extract($_POST);/*Extrai os dados do post */
$resul = array();
$dados = array();


/*---------------|ACAO PARA CONTATO DO SITE|------------------------\
|	Author: 	Elvis Leite da Silva								|
|	E-mail: 	elvis7t@gmail.com 									|
|	Version:	1.0													|
\------------------------------------------------------------------*/	
	
if($acao == "contato_site"){
	$dados["ou_contato_nome"]			= trim($contato_nome);
	$dados["ou_contato_titulo"] 		= trim($contato_titulo);
	$dados["ou_contato_mensagem"] 		= trim($contato_mensagem);
	$dados["ou_contato_data"] 		    = date('Y-m-d H:i:s');
	$dados["ou_contato_status"] 		= 'pendente';
	$dados["ou_cod_data"] 		        = date('d-H-i');
	$dados["ou_contato_cod"] 			= $dados["ou_cod_data"] .'-'.$dados["ou_contato_titulo"];
	
		
	if(!$rs->Insere($dados,"ou_contato_site")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Mensagem enviada com sucesso!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;
		
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM CONTATO SITE|------------------*/	 

/*---------------|FUNCAO PARA ALTERAR O STATUS|---------------------\
|	Author: 	Elvis Leite da Silva								|
|	E-mail: 	elvis7t@gmail.com 									|
|	Version:	1.0													|
\------------------------------------------------------------------*/	

if($acao == "altera_status"){

	$dados["ou_contato_status"] 		= 'visualizado';
	
	if (!$rs->Altera($dados,"ou_contato_site","ou_contato_Id =".$id)) {
        $resul["status"] = "OK";
        $resul["mensagem"] = "Cliente Alterado!";
        $resul["sql"] = $rs_eve->sql;
    } else {
		$resul["status"] = "ERRO";
        $resul["mensagem"] = "Falha no envio";
        $resul["sql"] = $rs_eve->sql;
    }
	echo json_encode($resul);
	exit;
}
/*---------------|FIM ALTERA STATUS|------------------*/	