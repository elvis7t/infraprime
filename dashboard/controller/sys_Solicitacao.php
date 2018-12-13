<?php
date_default_timezone_set('America/Sao_paulo');
require_once("../model/recordset.php");
$rs = new recordset();
extract($_POST);
$resul = array();
$res = array();
$dados = array();

/*---------------|FUNCAO PARA SELECIONAR DIRETOR REF A EMPRESA|-----------------\
|	Author: 	Elvis Leite da Silva								|
|	E-mail: 	elvis7t@gmail.com 									|
|	Version:	1.0													|
\------------------------------------------------------------------*/	
	
if($acao == "populaCheckCat"){
	$sql = "SELECT * FROM sys_diretores WHERE sys_dir_emp_id=".$fami;
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('sys_dir_id')."'>".$rs->fld('sys_dir_nome')."</option>";
	}
	echo $opt;
}

/*---------------|FUNCAO PARA CADASTRO DE DIRETORES|---------------\ 
|	Author: 	Elvis Leite da Silva								|
|	E-mail: 	elvis7t@gmail.com 									|
|	Version:	1.0													|
\------------------------------------------------------------------*/	
if($acao == "caddiretores"){
	/*
	$cod_cat = $rs->autocod("ec_cat_id","ec_categorias");
	$dados['ec_cat_id']		= $cod_cat;
	*/
	$dados["sys_dir_emp_id"]	= trim($dir_emp_id);	
	$dados["sys_dir_nome"] 	    = trim($dir_nome);
	
	if(!$rs->Insere($dados,"sys_diretores")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Diretor cadastrado com sucesso!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;
		
	}
	echo json_encode($resul);
	exit;
} 

/*---------------|FUNCAO PARA CADASTRO DE SOLICITAÇÃO|-----------------\
|	Author: 	Elvis Leite da Silva								|
|	E-mail: 	elvis7t@gmail.com 									|
|	Version:	1.0													|
\------------------------------------------------------------------*/		
if($acao == "cadSolicitacao"){
	/*
	$cod_pro = $rs->autocod("ec_prod_id","ec_produtos");
	$dados['ec_prod_id']		= $cod_pro;
	*/
	$dados["sys_solic_emp_id"]	= trim($solic_emp);
	$dados["sys_solic_dir_id"] 	= trim($solic_dir);
	$dados["sys_solic_usu_cad"] = '3';
	$dados["sys_solic_titulo"] 	= trim($solic_titulo);
	$dados["sys_solic_desc"] 	= trim($solic_desc);
	$dados["sys_solic_dat_cad"] = date("Y-m-d H:i:s");
	$dados["sys_solic_status"] 	= '1';
	
	if(!$rs->Insere($dados,"sys_solicitacao")){ 
		$res["status"] = "OK";
		$res["mensagem"] = "Solicitação enviada com sucesso!";
		$res["query"] = $rs->sql;
	}
	else{
		$res["status"] = "Erro";
		$res["mensagem"] = $rs->sql;
		
	}
	
	echo json_encode($res);
	exit;
}
if($acao == "altitimagem"){
	$dados['ec_img_desc'] = $desc;
	$whr = "ec_img_id = ".$id_img;
	if(!$rs->Altera($dados, "ec_imagens", $whr)){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Titulo Alterado!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;
		
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM CADASTRO DE PRODUTOS|------------------*/	

