<meta charset="utf-8">
<meta https-equiv="X-UA-Compatible" content="IE=edge">
<?php
date_default_timezone_set('America/Sao_paulo');
session_start();
require_once("../model/recordset.php");
date_default_timezone_set("America/Sao_Paulo");
$rs = new recordset();
$resul = array(); 
$res = array();
$dados = array();

	$sql ="SELECT * FROM at_maquinas
		WHERE DATEDIFF(mq_datagar, CURDATE()) = 180  AND mq_servtp ='f' AND mq_tipoId   IN  ('10','51','84','85','86','87')";
				$rs->FreeSql($sql);
				if($rs->linhas ==" "){
	//echo "---------------------------Nao ha email para enviar--------------------------";
	//$fileLocation = "LOGS\MAIL_LOG.txt";
	
}else{
 	$rs->GeraDados();	
	$mq_empId 	= $rs->fld("mq_empId");
	$mq_id 		= $rs->fld("mq_id");
	$mq_nome  	= $rs->fld("mq_nome");	
	$empresa    = $rs->pegar("emp_alias","at_empresas","emp_id = '".$mq_empId."'");			
	$mensagem   = file_get_contents("../view/at_serv_semgar_emailSender.html");	
	$mensagem   = str_replace("{empresa}", $empresa, $mensagem );
	$mensagem   = str_replace("{servidor}", $mq_nome, $mensagem );
	$mensagem   = str_replace("{id}", $mq_id, $mensagem );	
	
	 $cod = $rs->autocod("ims_id","at_mailsender");
		$dados['ims_id']    	    = $cod;
		$dados["ims_dest"]    		= "elsilva@vilagalvao.com.br"; 
		$dados["ims_arquivo"]		= '0'; 
		$dados["ims_nomearquivo"]	= '0';  
		$dados["ims_assunto"]	    = "SERVIDOR - TERMINANDO A GARANTIA - GRUPO NIFF"; 
		$dados["ims_message"]  		= $mensagem; 
		$dados["ims_clicpf"]	    = '0'; 
		$dados["ims_star"]	        = '0'; 
		$dados["ims_enviado"]       = '0'; 
		$dados["ims_hora"]   		= date('Y-m-d H:i:s'); 		
		$dados["ims_user"]  		= $_SESSION['nome_usu'];   
	
	if(!$rs->Insere($dados,"at_mailsender")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Email enviado com sucesso!"; 
		
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
 
 echo json_encode($resul);
	
}
?>