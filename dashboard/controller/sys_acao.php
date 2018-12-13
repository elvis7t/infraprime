<?php
date_default_timezone_set('America/Sao_paulo');
session_start();
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
date_default_timezone_set("America/Sao_Paulo");
$fn = new functions(); 

$rs = new recordset();
extract($_POST);
$resul = array(); 
$resul2 = array(); 
$res = array();
$dados = array();
$dados2 = array();

/*--------|FUNCAO PARA CADASTRO DE DIRETORES|-------------------\ 
	| Author: 	Cleber Marrara Prado 		                 	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	
if($acao == "caddiretores"){
	/*
	$cod_cat = $rs->autocod("ec_cat_id","ec_categorias");
	$dados['ec_cat_id']		= $cod_cat;
	*/
	$dados["sys_dir_emp_id"]	= $dir_emp_id;	
	$dados["sys_dir_nome"] 	= trim($dir_nome);
	
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
/*---------------|FIM DO CADASTRO DIRETORES |------------------*/	

	/*-------|FUNCAO PARA CADASTRO DE SOLICITAÇÃO|--------------\
	| Author: 	Cleber Marrara Prado 		                 	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/		
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
/*---------------|FIM DO CADASTRO SOLICITACAO |------------------*/	
 

	/*---------------|FUNCAO PARA CADASTRAR A EMPRESA|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadEmpresas"){
	//Busca informação no bando se o nome já exixte
		$rs->seleciona("emp_cnpj","at_empresas","mq_nome='{$emp_cnpj}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "Nome j&aacute; cadastrado";
			$resul['mensagem'] = $rs->sql;  
		}ELSE{
	
	$cod = $rs->autocod("emp_id","at_empresas");
		$dados['emp_id']        = $cod;
		$dados["emp_nome"]	    = $emp_nome; 
		$dados["emp_alias"] 	= $emp_alias; 
		$dados["emp_cnpj"]   	= $emp_cnpj;
		$dados["emp_ie"]	    = $emp_ie; 
		$dados["emp_cep"]	    = $cep;   
		$dados["emp_log"]	    = $log;
		$dados["emp_num"]	    = $num;   
		$dados["emp_compl"]	    = $compl;   
		$dados["emp_bai"]	    = $bai;   
		$dados["emp_cid"]	    = $cid;   
		$dados["emp_uf"]	    = $uf;   
		$dados["emp_contato"]	= $emp_contato; 
		$dados["emp_email"]	    = $emp_email; 
		$dados["emp_tel"]		= $emp_tel; 
		$dados["emp_site"]		= $emp_site;   
											
	if(!$rs->Insere($dados,"at_empresas")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Empresa cadastrada com sucesso!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;
		
	}
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO EMPRESA |------------------*/	

/*---------------|FUNCAO PARA ALTERAR A EMPRESA|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_emp"){
	$dados['emp_nome']		= $emp_nome; 	
	$dados['emp_alias']		= $emp_alias;	
	$dados['emp_cnpj']		= $emp_cnpj;
	$dados["emp_ie"]	    = $emp_ie; 
	$dados["emp_cep"]	    = $cep;   
	$dados["emp_log"]	    = $log;
	$dados["emp_num"]	    = $num;   
	$dados["emp_compl"]	    = $compl;   
	$dados["emp_bai"]	    = $bai;   
	$dados["emp_cid"]	    = $cid;   
	$dados["emp_uf"]	    = $uf;   
	$dados["emp_contato"]	= $emp_contato; 
	$dados["emp_email"]	    = $emp_email; 
	$dados["emp_tel"]		= $emp_tel; 
	$dados["emp_site"]		= $emp_site; 
	$whr = "emp_id=".$emp_id; 
	
	if(!$rs->Altera($dados, "at_empresas",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Empresa atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA A EMPRESA |------------------*/	

/*---------------|FUNCAO PARA EXCLUIR EMPRESA|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Empresa"){    
	
	if(!$rs->Exclui("at_empresas","emp_id=".$emp_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR EMPRESA |------------------*/

	
	/*-----|FUNCAO PARA CADASTRO DE DEPARTAMENTOS|--------------\
	| Author: 	Cleber Marrara Prado 				           	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/
	
if($acao == "cadDepartamentos"){  
		$cod = $rs->autocod("dp_id","at_departamentos");
		$dados['dp_id']     = $cod;
		$dados["dp_empId"]	= $dp_empId; 
		$dados["dp_nome"]	= $dp_nome;
	
	if(!$rs->Insere($dados,"at_departamentos")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Departamento cadastrado com sucesso!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;
		
	}
	
	echo json_encode($resul); 
	exit;
}
/*---------------|FIM DO CADASTRO DEPARTAMENTO |------------------*/	

/*---------------|FUNCAO PARA ALTERAR A DEPARTAMENTO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_dp"){
	$dados['dp_nome']	= $dp_nome;	 
	$whr = "dp_id=".$dp_id; 
	
	if(!$rs->Altera($dados, "at_departamentos",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Departamento atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA A DEPARTAMENTO |------------------*/	

/*---------------|FUNCAO PARA EXCLUIR DEPARTAMENTO|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Departamento"){    
	
	if(!$rs->Exclui("at_departamentos","dp_id=".$dp_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		   
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR DEPARTAMENTO |------------------*/

/*---|FUNCA PARA SELECIONAR O DP REF A EMPRESA|------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	 
	
if($acao == "populaCheckDp"){
	$sql = "SELECT * FROM at_departamentos WHERE dp_empId=".$fami;
	$rs->FreeSql($sql); 
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('dp_id')."'>".$rs->fld('dp_nome')."</option>";
	}
	echo $opt;
}
/*---------------|FIM DA FUNCAO "populaCheckDp |------------------*/
	
	
	/*---------------|FUNCAO PARA CADASTRO DE USUARIOS DE ATIVOS|---------------\
	|	          Author: 	Cleber Marrara Prado da Silva						|
	|	          E-mail: 	cleber.marrara.prado@gmail.com 						|
	|	          Data:     05/10/2016                                          |
	|	          Version:	1.0							                        |
	\--------------------------------------------------------------------------*/
if($acao == "cadUsuarios"){ 
		//Busca informação no bando se o nome já exixte
		$rs->seleciona("at_usu_nome","at_usuarios","at_usu_nome='{$usu_nome}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "Nome j&aacute; cadastrado";
			$resul['mensagem'] = $rs->sql;  
		}ELSE{
		$cod = $rs->autocod("usu_id","at_usuarios");
		$dados['usu_id']      = $cod;
		$dados["usu_empId"]	  = $sel_emp; 
		$dados["usu_dpId"]    = $sel_dp; 
		$dados["at_usu_nome"] = trim($usu_nome);
		$dados["usu_ativo"]   = "1";	
	
	
	if(!$rs->Insere($dados,"at_usuarios")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Usu&aacute;rio cadastrado com sucesso!";
	}
	else{
		$resul['status'] = "Erro"; 
		$resul['mensagem'] = $rs->sql;  
		
	}
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO DE USUARIOS ATIVOS |------------------*/	


/*---------------|FUNCAO PARA ALTERAR USUARIOS ATIVOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_usu"){
	$dados['usu_dpId']	    = $usu_dpId;	   
	$dados['at_usu_nome']	= trim($usu_nome);  
	$dados['usu_ativo']	    = $usu_ativo; 
	$whr = "usu_id=".$usu_id; 
	
	if(!$rs->Altera($dados, "at_usuarios",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA A USUARIOS ATIVOS |------------------*/	

/*---------------|FUNCAO PARA EXCLUIR USUARIOS ATIVOS|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Usuario"){    
	
	if(!$rs->Exclui("at_usuarios","usu_id=".$usu_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{ 
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR USUARIOS ATIVOS |------------------*/


/*---------------|FUNCAO PARA CADASTRA TIPO DE EQUIPAMENTO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cad_Eqtipo"){ 
		$cod = $rs->autocod("tipo_id","eq_tipo");
		$dados['tipo_id']      = $cod;
		$dados["tipo_empId"]   = $tipo_empId;   
		$dados["tipo_desc"]    = $tipo_desc;   
		 
	if(!$rs->Insere($dados,"eq_tipo")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Tipo cadastrado com sucesso!";
	} 
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;     
		  
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO TIPO DE EQUIPAMENTO |------------------*/
	
/*---------------|FUNCAO PARA ALTERAR TIPO DE EQUIPAMENTO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
 
if($acao == "Altera_Eqtipo"){
	$dados['tipo_desc']	= $tipo_desc;	
	$whr = "tipo_id=".$tipo_id; 
	
	if(!$rs->Altera($dados, "eq_tipo",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Tipo atualizado!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	    
	 

/*---------------|FIM DO ALTERA TIPO DE EQUIPAMENTO |------------------*/	

/*---------------|FUNCAO PARA EXCLUIR TIPO DE EQUIPAMENTO|------------------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Eqtipo"){    
	
	if(!$rs->Exclui("eq_tipo","tipo_id=".$tipo_id)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul); 
    exit;
}
/*---------------|FIM DO EXCLUIR TIPO DE EQUIPAMENTO |------------------*/	

/*---|FUNCA PARA SELECIONAR O TIPO REF A EMPRESA|--------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaChecktipo"){
	$sql = "SELECT * FROM eq_tipo WHERE tipo_empId=".$id;
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('tipo_id')."'>".$rs->fld('tipo_desc')."</option>";
	}
	echo $opt;
}
/*---------------|FIM DA FUNCAO "populaChecktipo |------------------*/

/*---------------|FUNCAO PARA CADASTRAR MARCA|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cad_Marca"){ 
		$cod = $rs->autocod("marc_id","eq_marca");
		$dados['marc_id']       = $cod;
		$dados["marc_empId"]    = $sel_emptp; 
		$dados["marc_tipoId"]   = $sel_tipoId; 
		$dados["marc_nome"]     = $marc_nome;  
		 
	if(!$rs->Insere($dados,"eq_marca")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Marca cadastrada com sucesso!";
	} 
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;      
		  
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO MARCA |------------------*/
	
/*---------------|FUNCAO PARA ALTERAR MARCA|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_marca"){
	$dados['marc_nome']	= $marc_nome;	
	$whr = "marc_id=".$marc_id; 
	
	if(!$rs->Altera($dados, "eq_marca",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "MArca atualizado!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA MARCA |------------------*/	

/*---------------|FUNCAO PARA EXCLUIR MARCA|------------------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Marca"){    
	
	if(!$rs->Exclui("eq_marca","marc_id=".$marc_id)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR MARCA |------------------*/
 

/*---|FUNCA PARA SELECIONAR O USUARIO REF A EMPRESA|------------*\
	| Author: 	Cleber Marrara Prado 				            |
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 					|
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckUsuAd"){ 
	$sql = "SELECT * FROM at_usuarios_ad WHERE usu_emp_id=".$fami;
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('usu_id')."'>".$rs->fld('usu_nome')."</option>";
	}
	echo $opt;
}
/*---------------|FIM DA FUNCAO "populaCheckUsuAd |------------------*/





/*---|FUNCAO PARA SELECIONAR O MARCA TIPO REF A EMPRESA|------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckTipoeq"){
	$sql = "SELECT * FROM eq_tipo WHERE tipo_empId=".$id;
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('tipo_id')."'>".$rs->fld('tipo_desc')."</option>";
	}
	echo $opt;  
}
/*---------------|FIM DA FUNCAO "populaCheckTipoeq |------------------*/


/*---|FUNCAO PARA SELECIONAR O MARCA REF AO TIPO|------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckMarcaeq"){
	$sql = "SELECT * FROM eq_marca WHERE marc_tipoId=".$id;
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('marc_id')."'>".$rs->fld('marc_nome')."</option>";
	}
	echo $opt;
}
/*---------------|FIM DA FUNCAO "populaCheckMarcaeq |------------------*/

/*---|FUNCAO PARA SELECIONAR O FABRICANTE REF AO TIPO|------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckFabmq"){
	$sql = "SELECT * FROM mq_fabricante WHERE fab_tipoId=".$id;
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('fab_id')."'>".$rs->fld('fab_nome')."</option>";
	}
	echo $opt;
}
/*---------------|FIM DA FUNCAO "populaCheckFabmq |------------------*/

/*---|FUNCAO PARA SELECIONAR O MAQUINA REF AO FABRICANTE|------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckMq"){ 
	$sql = "SELECT * FROM at_maquinas WHERE mq_ativo <> 1 and mq_fabId=".$id;
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('mq_id')."'>".$rs->fld('mq_nome')."</option>";
	}
	echo $opt;
}
/*---------------|FIM DA FUNCAO "populaCheckMq |------------------*/


/*---------------|FUNCAO PARA CADASTRAR EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadEquipamentos"){ 
		//Busca informação no bando se o nome já exixte
		$rs->seleciona("eq_serial","at_equipamentos","eq_serial='{$eq_serial}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "Nome j&aacute; cadastrado";  
			$resul['mensagem'] = $rs->sql;  
		}ELSE{
		$cod = $rs->autocod("eq_id","at_equipamentos");
		$dados['eq_id']       	= $cod;		
		$dados["eq_empId"]    	= $sel_empeq; 		
		$dados["eq_usuEmpId"] 	= '0'; 		
		$dados["eq_dpId"] 		= '0'; 		
		$dados["eq_usuId"] 		= '0'; 		
		$dados["eq_mqEmpId"]	= '0'; 		
		$dados["eq_mqId"]		= '0'; 		
		$dados["eq_tipoId"]   	= $sel_tipoeq;		
		$dados["eq_marcId"]   	= $sel_marcaeq;	  	
		$dados["eq_modelo"]   	= $eq_modelo;	  	
		$dados["eq_serial"]   	= trim($eq_serial);		
		$dados["eq_desc"]       = $eq_desc; 	
		$dados["eq_statusId"]   = $sel_eqstatus;			
		$dados["eq_valor"]    	= $eq_valor;			
		$dados["eq_ativo"]    	= "1";			
		$dados["eq_datacad"]  	= date('Y-m-d H:i:s');		
		$dados["eq_usucad"]   	= $_SESSION['usu_cod']; 
		
		 
	if(!$rs->Insere($dados,"at_equipamentos")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Equipamento cadastrado com sucesso!";
	} 
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;        
		  
	}
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO EQUIPAMENTOS|--------------\ |------------------*/

/*---------------|FUNCAO PARA ATRIBUIR EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Atribuir_Eq"){
	if($sol_dp ==""){$sol_dp ='0';}	
	if($sol_usu ==""){$sol_usu='0';}
	if($sol_mq ==""){$sol_mq='0';}
	
	$dados['eq_usuEmpId']	= $sol_emp; 	
	$dados['eq_mqEmpId']	= $sol_emp; 	
	$dados['eq_dpId']   	= $sol_dp; 	
	$dados['eq_usuId']	    = $sol_usu; 	
	$dados['eq_mqId']	    = $sol_mq; 	
	$whr = "eq_id=".$eq_id; 
	
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";
 
	$resul['mensagem'] = " atualizado!";  
 
	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	 echo json_encode($resul);
    exit;
}	
	  

if($acao == "Atribuir_Eq_mailSender"){
/////////////////////EOVG MOUSE	
if($emp_id ==1 OR $emp_id ==2 OR $emp_id ==9 ){$emp_id;}ELSE{$emp_id ==0;}
$sql = "SELECT *
FROM at_equipamentos
WHERE eq_desc='".$eq_desc."' AND eq_ativo = '1'
AND eq_usuId = 0 
AND eq_mqId  = 0
AND eq_empId =".$emp_id;

$rs->FreeSql($sql);
$rs->GeraDados();
if($rs->linhas == 0 ){	
	if($emp_id ==1){$destino = "Renata"; $email ="rfsouza@niff.com.br";}
	if($emp_id == 2 OR $emp_id == 9){ $destino = "Vinicius"; $email ="vfreis@vilagalvao.com.br";}	
	if($eq_desc=="Mouse"){$Solicitacao = "Solicitamos a compra de : 3 Mouses Logitech M90";}
	if($eq_desc=="Teclado"){$Solicitacao = "Solicitamos a compra de : 3 Teclados Logitech K120";}
	if($eq_desc=="Telefone"){$Solicitacao = "Solicitamos a compra de : 3 Telefones Intelbras TC 50 PREMIUM";}
	
	$mensagem = file_get_contents("../view/at_atreq_emailSender.html");
	$empresa  = $rs->pegar("emp_nome","at_empresas","emp_id =".$emp_id);
	$mensagem = str_replace("{empresa}", $empresa, $mensagem );
	$mensagem = str_replace("{equipamento}", $Solicitacao, $mensagem );
	$mensagem = str_replace("{destinatario}", $destino, $mensagem );
	
	 $cod = $rs->autocod("ims_id","at_mailsender");
		$dados['ims_id']    	    = $cod;
		$dados["ims_dest"]    		= $email; 
		$dados["ims_arquivo"]		= '0'; 
		$dados["ims_nomearquivo"]	= '0';  
		$dados["ims_assunto"]	    = "SOLICITACAO DE COMPRA"; 
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
    
	$cod = $rs->autocod("comp_id","at_compras");
		$dados2['comp_id']    	   = $cod;
		$dados2["comp_empId"]      = $emp_id; 
		$dados2["comp_dpId"]       = '1'; 
		$dados2["comp_titulo"]     = "Compra de ".$eq_desc; 
		$dados2["comp_valor"]	   = "00"; 
		$dados2["comp_desc"]       = $Solicitacao; 
		$dados2["comp_datacad"]	   = date('Y-m-d'); 
		$dados2["comp_datafin"]	   = '00/00/0000'; 				
		$dados2["comp_ativo"]	   = "1"; 
		$dados2["comp_statusId"]   = "2";
		$dados2["comp_usucad"]     = $_SESSION['usu_cod'];        
		
											
	if(!$rs->Insere($dados2,"at_compras")){ 
		$resul2['status'] = "OK";
		$resul2['mensagem'] = "Enviado a Emprestado com sucesso!"; 
	}
	else{
		$resul2['status'] = "Erro";
		$resul2['mensagem'] = $rs->sql;  
		
	} 
	
	echo json_encode($resul2);

 exit;
	
	
}	
/////////////////FIN TELEFONE NIFF


}	  
/*---------------|FIM DO ATRIBUIR EQUIPAMENTOS |------------------*/	


/*---------------|FUNCAO PARA ALTERAR EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_Eq"){
	$dados['eq_serial']		= trim($eq_serial);   
	$dados['eq_desc']		= trim($eq_desc); 
	$dados["eq_modelo"] 	= $eq_modelo;	
	$dados['eq_statusId']	= $sel_eqstatus; 	
	$dados['eq_valor']		= $eq_valor; 	 	
	$whr = "eq_id=".$eq_id; 
	
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Equipamento atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA A EQUIPAMENTOS |------------------*/

/*---------------|FUNCAO PARA ALTERAR USUARIO EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_usuEq"){
		
	$dados['eq_usuEmpId']	= $sol_emp; 	
	$dados['eq_dpId']		= $sol_dp; 	
	$dados['eq_usuId']		= $sol_usu; 	
	 	
	 	
	$whr = "eq_id=".$eq_id; 
	
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
 
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA USUARIO EQUIPAMENTOS |------------------*/

/*---------------|FUNCAO PARA ALTERAR MAQUINA de EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_mqEq"){
		
	$dados['eq_mqEmpId']	= $sol_emp; 	
	$dados['eq_mqId']		= $sol_mq; 	
	 	
	 	
	$whr = "eq_id=".$eq_id; 
	
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA MAQUINA de EQUIPAMENTOS |------------------*/

/*---------------|FUNCAO PARA LIMPAR de EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Limpar_Eq"){
		
	$dados['eq_usuEmpId']	= '0'; 	
	$dados['eq_mqEmpId']	= '0'; 	
	$dados['eq_dpId']		= '0'; 	
	$dados['eq_usuId']		= '0'; 	
	$dados['eq_mqId']		= '0';  	
	 	
	 	
	$whr = "eq_id=".$eq_id; 
	
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul); 
    exit;
}	
	 

/*---------------|FIM DO LIMPAR  EQUIPAMENTOS |------------------*/

/*---------------|FUNCAO PARA DESCARTE DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Descartar_Eq"){
	$dados['eq_descmotivo']	= $eq_descmotivo;
	$dados['eq_usuEmpId']	= '0'; 	
	$dados['eq_mqEmpId']	= '0'; 	
	$dados['eq_dpId']		= '0'; 	
	$dados['eq_usuId']		= '0'; 	
	$dados['eq_mqId']		= '0';  	
	$dados['eq_statusId']	= "4"; 
	$dados["eq_datades"]    = date('Y-m-d H:i:s');	
	$dados['eq_ativo']  	= "0";  	
	$dados['eq_usudes']  	= $_SESSION['usu_cod']; 
	$whr = "eq_id=".$eq_id; 
	 
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	} 
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	

if($acao == "Descartar_Eq_mailSender"){
	$sql ="SELECT * FROM at_usuarios a
				JOIN at_empresas b ON a.usu_empId = b.emp_id 
				JOIN at_departamentos c ON a.usu_dpId = c.dp_id 
				WHERE usu_id = ".$_SESSION['usu_cod'];
				$rs->FreeSql($sql);
 				$rs->GeraDados();
	$departamento = $rs->fld("dp_nome");	 		
		
	$empresa      = $rs->pegar("emp_alias","at_empresas","emp_id = '".$_SESSION['usu_empresa']."'");
	//$departamento = $rs->pegar("dp_nome","at_departamentos","dp_id = '".$_SESSION['usu_departamento']."'");
	$equipamento      = $rs->pegar("eq_desc","at_equipamentos","eq_id = '".$eq_id."'");
	$usuario      = $rs->pegar("usu_nome","sys_usuarios","usu_cod = '".$_SESSION['usu_cod']."'");
	 
	$mensagem = file_get_contents("../view/at_desceq_emailSender.html");
	$mensagem = str_replace("{usuario}", $usuario, $mensagem );
	$mensagem = str_replace("{departamento}", $departamento, $mensagem ); 
	$mensagem = str_replace("{empresa}", $empresa, $mensagem );
	$mensagem = str_replace("{equipamento}", $equipamento, $mensagem );
	$mensagem = str_replace("{id}", $eq_id, $mensagem );
	$mensagem = str_replace("{motivo}", $eq_descmotivo, $mensagem );
	
	 $cod = $rs->autocod("ims_id","at_mailsender");
		$dados['ims_id']    	    = $cod;
		$dados["ims_dest"]    		= "elsilva@vilagalvao.com.br"; 
		$dados["ims_arquivo"]		= '0'; 
		$dados["ims_nomearquivo"]	= '0';  
		$dados["ims_assunto"]	    = "DESCARTES - GRUPO NIFF"; 
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
    exit;
}	
 	  	  

/*---------------|FIM DO DESCARTE DE EQUIPAMENTOS |------------------*/	

/*---------------|FUNCAO PARA EXCLUIR EQUIPAMENTOS|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Equipamento"){    
	
	if(!$rs->Exclui("at_equipamentos","eq_id=".$eq_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{ 
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR EQUIPAMENTOS |------------------*/	


/*---|FUNCAO PARA SELECIONAR O TIPO REF A EMPRESA|------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	19/12/2016									    |	
	\*--------------------------------- ------------------------*/	
	
if($acao == "populaCheckSoltipo"){  
	$sql = "SELECT * FROM eq_tipo  
				WHERE tipo_empId =".$id;
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>"; 
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('tipo_id')."'>".$rs->fld('tipo_desc')."</option>";
	}
	echo $opt;  
	$tipo = $rs->fld('tipo_id'); 
}
/*---------------|FIM DA FUNCAO "populaCheckSoltipo |------------------*/

/*---|FUNCAO PARA SELECIONAR O MARCA REF A EMPRESA|------------*\ 
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	19/12/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckSolmarca"){  
	$sql = "SELECT * FROM eq_marca 
				WHERE marc_tipoId =".$id; 
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>"; 
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('marc_id')."'>".$rs->fld('marc_nome')."</option>";
	}
	echo $opt;  
}
/*---------------|FIM DA FUNCAO "populaCheckSolmarca |------------------*/

/*---|FUNCAO PARA SELECIONAR O EQUIPAMENTO REF A EMPRESA|------------*\ 
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |  
	| Date: 	19/12/2016									    |	
	\*---------------------------------------------------------*/	
	   
if($acao == "populaCheckSoleq"){    
    
	$sql = "SELECT * FROM at_equipamentos 
			WHERE eq_ativo <> 1 and eq_marcId =".$id;   
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>"; 
	while($rs->GeraDados()){
		$var = $rs->fld('eq_desc').'-'. $rs->fld('eq_modelo');
		$opt .= "<option value='".$rs->fld('eq_id')."'>".$var."</option>";
	}
	echo $opt;  
}
/*---------------|FIM DA FUNCAO "populaCheckSoleq |------------------*/

/*---|FUNCAO PARA SELECIONAR O SERIAL REF AO EQUIPAMENTO|------------*\ 
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |  
	| Date: 	19/12/2016									    |	
	\*---------------------------------------------------------*/	
	   
if($acao == "populaCheckSoleqserial"){    
    
	$sql = "SELECT * FROM at_equipamentos 
			WHERE eq_ativo <> 1 and eq_marcId =".$id;   
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";  
	while($rs->GeraDados()){
		
		$opt .= "<option value='".$rs->fld('eq_id')."'>".$rs->fld('eq_serial')."</option>";
	}
	echo $opt;  
}
/*---------------|FIM DA FUNCAO "populaCheckSoleqserial |------------------*/
 
/*---|FUNCAO PARA SELECIONAR O DEPARTAMENTO REF A EMPRESA SOLICITACAO|------------*\ 
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	19/12/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckSoldp"){  
	$sql = "SELECT * FROM at_departamentos WHERE dp_empId =".$id; 
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('dp_id')."'>".$rs->fld('dp_nome')."</option>";
	}
	echo $opt;  
}
/*---------------|FIM DA FUNCAO "populaCheckSoldp |------------------*/

/*---|FUNCAO PARA SELECIONAR O USUARIO REF A DEPARTAMENTO SOLICITACAO|------------*\ 
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	19/12/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckSolusu"){   
	$sql = "SELECT * FROM at_usuarios WHERE usu_ativo <> 1 AND usu_dpId =".$id;  
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('usu_id')."'>".$rs->fld('at_usu_nome')."</option>";
	}
	echo $opt;  
}
/*---------------|FIM DA FUNCAO "populaCheckSolusu |------------------*/

/*---|FUNCAO PARA SELECIONAR A MAQUINA REF  DEPARTAMENTO A EMPRESA|------------*\ 
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	19/12/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckSolmq"){  
	$sql = "SELECT * FROM at_maquinas WHERE mq_ativo <> 1 and mq_empId =".$id;  
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('mq_id')."'>".$rs->fld('mq_nome')."</option>";
	}
	echo $opt;  
}
/*---------------|FIM DA FUNCAO "populaCheckSolusu |------------------*/

/*---------------|FUNCAO PARA CADASTRAR SOLICITAÇÂO DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadEqsolicitacao"){ 
		$cod = $rs->autocod("solic_id","eq_solicitacao");
		 
		$dados['solic_id']         = $cod;		
		$dados["solic_empId"]      = $sol_emp; 		
		$dados["solic_eqtipoId"]   = $tipo_id;		
		$dados["solic_marcId"]     = $marc_id;	  	
		$dados["solic_eqserial"]   = $eq_serial;	  	
		$dados["solic_eqId"]       = $eq_id;	  	
		$dados["solic_dpId"]       = $sol_dp; 	
		$dados["solic_usuId"]      = $sol_usu;			
		$dados["solic_mqId"]       = $sol_mq;			
		$dados["solic_ticket"]     = $solic_ticket;			
		$dados["solic_desc"]       = $solic_desc;			
		$dados["solic_data"]       = date('Y-m-d H:i:s');		
		$dados["solic_usucad"]     = $_SESSION['usu_cod']; 
		
		 
	if(!$rs->Insere($dados,"eq_solicitacao")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Solicita&ccedil;&atilde;o cadastrada com sucesso!";
	} 
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;        
		  
	}
	echo json_encode($resul);
	exit;
}

 

 	
/*---------------|FIM DO CADASTRO SOLICITAÇÂO DE EQUIPAMENTOS|--------------\ |------------------*/

/*---------------|FUNCAO PARA ALTERAR SOLICITAÇÂO DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_Sol"){
	$dados["solic_ticket"]     = $solic_ticket;			
	$dados["solic_desc"]       = $solic_desc; 	
	$whr = "solic_id=".$solic_id; 
	
	if(!$rs->Altera($dados, "eq_solicitacao",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA A SOLICITAÇÂO DE EQUIPAMENTOS |------------------*/	

/*---------------|FUNCAO PARA CADASTRAR A PRESTADORA|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadPrestadoras"){
	//Busca informação no bando se o nome já exixte
		$rs->seleciona("pre_cnpj","eq_prestadoras","pre_cnpj='{$pre_cnpj}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "Nome j&aacute; cadastrado";
			$resul['mensagem'] = $rs->sql;  
		}ELSE{
	
		$cod = $rs->autocod("pre_id","eq_prestadoras");
		$dados['pre_id']    	= $cod;
		$dados["pre_nome"]		= $pre_nome;  
		$dados["pre_alias"]		= $pre_alias; 
		$dados["pre_cnpj"] 		= $pre_cnpj; 
		$dados["pre_ie"]	    = $pre_ie; 
		$dados["pre_cep"]	    = $cep;   
		$dados["pre_log"]	    = $log;
		$dados["pre_num"]	    = $num;   
		$dados["pre_compl"]	    = $compl;   
		$dados["pre_bai"]	    = $bai;   
		$dados["pre_cid"]	    = $cid;   
		$dados["pre_uf"]	    = $uf;   
		$dados["pre_contato"]	= $pre_contato; 
		$dados["pre_email"]	    = $pre_email; 
		$dados["pre_tel"]		= $pre_tel; 
		$dados["pre_site"]		= $pre_site;  
	    
		
											
	if(!$rs->Insere($dados,"eq_prestadoras")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Prestadora cadastrada com sucesso!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	}
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO PRESTADORA |------------------*/	

/*---------------|FUNCAO PARA ALTERAR A PRESTADORA|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_pre"){
		$dados["pre_nome"]		= $pre_nome; 
		$dados["pre_alias"]		= $pre_alias; 
		$dados["pre_cnpj"] 		= $pre_cnpj; 
		$dados["pre_ie"]	    = $pre_ie; 
		$dados["pre_cep"]	    = $cep;   
		$dados["pre_log"]	    = $log;
		$dados["pre_num"]	    = $num;   
		$dados["pre_compl"]	    = $compl;   
		$dados["pre_bai"]	    = $bai;   
		$dados["pre_cid"]	    = $cid;   
		$dados["pre_uf"]	    = $uf;   
		$dados["pre_contato"]	= $pre_contato; 
		$dados["pre_email"]	    = $pre_email; 
		$dados["pre_tel"]		= $pre_tel; 
		$dados["pre_site"]		= $pre_site;	
	$whr = "pre_id=".$pre_id; 
	
	if(!$rs->Altera($dados, "eq_prestadoras",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Prestadora atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA A PRESTADORA |------------------*/	

/*---------------|FUNCAO PARA EXCLUIR PRESTADORA|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Prestadora"){    
	
	if(!$rs->Exclui("eq_prestadoras","pre_id=".$pre_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR PRESTADORA |------------------*/

/*---------------|FUNCAO PARA CADASTRAR DE MANUTENÇÂO DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadmanu"){
	
	$cod = $rs->autocod("man_id","eq_manutencao");
		$dados['man_id']    		= $cod;
		$dados["man_eqempId"] 		= $emp_id; 
		$dados["man_eqId"]			= $eq_id; 
		$dados["man_eqtipoId"]		= $tipo_id; 
		$dados["man_eqmarcId"]		= $marc_id; 
		$dados["man_eqmodelo"]		= $eq_modelo; 
		$dados["man_preId"]			= $sel_pres;
	  //$dados["man_eqdpId"]		= "0";
		$dados["man_eqserial"]		= $eq_serial; 
		$dados["man_eqdesc"]		= $eq_desc; 
		$dados["man_valor"]	    	= "00000.00"; 
	  //$dados["man_desc"]	    	= "0"; 		
		$dados["man_motivo"]    	= $man_desc; 
		$dados["man_eqvalor"]		= $eq_valor; 
	  //$dados["man_os"]	    	= "0"; 
	  //$dados["man_equsuId"]		= "0"; 
	  //$dados["man_eqmqId"]		= "0"; 		
		$dados["man_dataida"]   	= date('Y-m-d H:i:s');		
	    $dados["man_dataretorno"]   = '00/00/0000';		
	  //$dados["man_obs"]   		= '0';		
		$dados["man_usucad"]    	= $_SESSION['usu_cod'];
		$dados["man_ativo"]			= "1";	
		
											
	if(!$rs->Insere($dados,"eq_manutencao")){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Enviado a Manuten&ccedil;&atilde;o com sucesso!"; 
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	}
	echo json_encode($resul);
	exit;
}

if($acao == "Altera_StatusEq"){
		
	$dados['eq_statusId']	= "3"; 	     
		
	 	
	 	
	$whr = "eq_id=".$eq_id; 
	
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO CADASTRO DE MANUTENÇÂO DE EQUIPAMENTOS |------------------*/	

/*---------------|FUNCAO PARA ALTERAR A MANUTENÇÂO DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Alt_ManEquipamanto"){
		if($man_dataretorno==''){
			$man_dataretorno       = '00/00/0000';
		}			
		$dados["man_valor"]				= $man_valor; 
		$dados["man_os"] 				= $man_os; 
		$dados['man_dataretorno']	    = $fn->data_usa($man_dataretorno);
		$dados["man_desc"]				= $man_desc; 
		$dados["man_obs"]				= $man_obs; 
		  
		 	
	$whr = "man_id=".$man_id; 
	
	if(!$rs->Altera($dados, "eq_manutencao",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = " atualizada!"; 
		$resul['sql'] = $rs->sql; 
		  
	} 
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA A MANUTENÇÂO DE EQUIPAMENTOS |------------------*/	

/*---------------|FUNCAO PARA FINALIZAR A MANUTENÇÂO DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Fin_ManEquipamanto"){
		$dados["man_valor"]				= $man_valor; 
		$dados["man_os"] 				= $man_os; 
		$dados['man_dataretorno']	    = $fn->data_usa($man_dataretorno);
		$dados["man_desc"]				= $man_desc; 
		$dados["man_obs"]				= $man_obs; 
		$dados["man_ativo"]  			= "0"; 
		 	
	$whr = "man_id=".$man_id;  
	
	if(!$rs->Altera($dados, "eq_manutencao",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = " atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	} 
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
if($acao == "Altera_StatusEq2"){ 
		
	$dados['eq_statusId']	= "2"; 	      
		
	 	
	 	
	$whr = "eq_id=".$eq_id; 
	
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	 

/*---------------|FIM DO FINALIZAR A MANUTENÇÂO DE EQUIPAMENTOS |------------------*/	


/*---------------|FUNCAO PARA CADASTRAR FABRICANTE|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cad_Fabri"){ 
		$cod = $rs->autocod("fab_id","mq_fabricante");
		$dados['fab_id']       = $cod;
		$dados["fab_empId"]    = $sel_emptp; 
		$dados["fab_tipoId"]   = $sel_tipoId; 
		$dados["fab_nome"]     = $fab_nome;  
		 
	if(!$rs->Insere($dados,"mq_fabricante")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Fabricante cadastrado com sucesso!";
	} 
	else{
		$resul['status'] = "Erro"; 
		$resul['mensagem'] = $rs->sql;      
		  
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO FABRICANTE |------------------*/
	
/*---------------|FUNCAO PARA ALTERAR FABRICANTE|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_fabri"){
	$dados['fab_nome']	= $fab_nome;	
	$whr = "fab_id=".$fab_id; 
	
	if(!$rs->Altera($dados, "mq_fabricante",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Fabricante atualizado!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA FABRICANTE |------------------*/	

/*---------------|FUNCAO PARA EXCLUIR FABRICANTE|------------------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Fabri"){    
	
	if(!$rs->Exclui("mq_fabricante","fab_id=".$fab_id)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR FABRICANTE |------------------*/


	/*---------------|FUNCAO PARA CADASTRAR A SISTEMA|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadSistema"){  
	
	$cod = $rs->autocod("os_id","mq_os");
		$dados['os_id']    = $cod;
		$dados["os_desc"]	= $os_desc; 
		$dados["os_versao"]	= $os_versao; 
		
											
	if(!$rs->Insere($dados,"mq_os")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Sistema cadastrado com sucesso!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;
		
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO SISTEMA|--------------\

/*---------------|FUNCAO PARA ALTERAR  SISTEMA|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
	if($acao == "Altera_Os"){
	$dados['os_desc']	= $os_desc;	
	$dados['os_versao']	= $os_versao;	
	$whr = "os_id=".$os_id; 
	
	if(!$rs->Altera($dados, "mq_os",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Sistema atualizado!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}


/*---------------|FIM DO ALTERA A SISTEMA|------------------*/	

/*---------------|FUNCAO PARA EXCLUIR SISTEMA|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Os"){    
	
	if(!$rs->Exclui("mq_os","os_id=".$os_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR SISTEMA|------------------*/



	/*---------------|FUNCAO PARA CADASTRAR A OFFICE|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cad_Office"){  
	
	$cod = $rs->autocod("office_id","mq_office");
		$dados['office_id']    = $cod;
		$dados["office_desc"]	= $office_desc; 
		$dados["office_versao"]	= $office_versao; 
		
											
	if(!$rs->Insere($dados,"mq_office")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Office cadastrado com sucesso!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;
		
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO OFFICE|--------------\

/*---------------|FUNCAO PARA ALTERAR OFFICE|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 
		
	if($acao == "Altera_office"){
	$dados['office_desc']	= $office_desc;	
	$dados['office_versao']	= $office_versao;	
	$whr = "office_id=".$office_id;  
	
	if(!$rs->Altera($dados, "mq_office",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "office atualizado!"; 
		$resul['sqlk'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}


/*---------------|FIM DO ALTERA OFFICE|------------------*/	

/*---------------|FUNCAO PARA EXCLUIR OFFICE|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_office"){    
	
	if(!$rs->Exclui("mq_office","office_id=".$office_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR OFFICE|------------------*/

/*---------------|FUNCAO PARA CADASTRAR MEMORIA|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cad_Mem"){ 
		$cod = $rs->autocod("mem_id","mq_memoria");
		$dados['mem_id']       = $cod;
		$dados["mem_tipo"]     = $mem_tipo; 
		$dados["mem_cap"]      = $mem_cap; 
		  
		 
	if(!$rs->Insere($dados,"mq_memoria")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Mem&oacute;ria cadastrada com sucesso!";
	} 
	else{
		$resul['status'] = "Erro"; 
		$resul['mensagem'] = $rs->sql;      
		  
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO MEMORIA |------------------*/


/*---------------|FUNCAO PARA EXCLUIR MEMORIA|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_memoria"){    
	
	if(!$rs->Exclui("mq_memoria","mem_id=".$mem_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR MEMORIA|------------------*/


/*---------------|FUNCAO PARA CADASTRAR HD|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cad_Hd"){ 
		$cod = $rs->autocod("hd_id","mq_hd");
		$dados['hd_id']       = $cod;
		$dados["hd_tipo"]     = $hd_tipo; 
		$dados["hd_cap"]      = $hd_cap; 
		  
		 
	if(!$rs->Insere($dados,"mq_hd")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "HD cadastrado com sucesso!";
	} 
	else{
		$resul['status'] = "Erro"; 
		$resul['mensagem'] = $rs->sql;      
		  
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO HD |------------------*/


/*---------------|FUNCAO PARA EXCLUIR HD|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_hd"){     
	
	if(!$rs->Exclui("mq_hd","hd_id=".$hd_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR HD|------------------*/

/*---------------|FUNCAO PARA CADASTRAR MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadMaquinas"){ 
		//Busca informação no bando se o nome já exixte
		$rs->seleciona("mq_nome","at_maquinas","mq_nome='{$mq_nome}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "Nome j&aacute; cadastrado";
			$resul['mensagem'] = $rs->sql;  
		}ELSE{
		$cod = $rs->autocod("mq_id","at_maquinas");
		
		$dados['mq_id']            = $cod;		
		$dados["mq_empId"]        = $sel_empeq; 		
		$dados["mq_tipoId"]       = $sel_tipoeq;		
		$dados["mq_fabId"]        = $sel_fabmq;	  	
		$dados["mq_modelo"]       = $mq_modelo;	  	
		$dados["mq_nome"]         = trim($mq_nome);		
		$dados["mq_tag"]          = $mq_tag; 	
		$dados["mq_memId"]        = $sel_mqmemoria;			
		$dados["mq_hdId"]         = $sel_mqhd;			
		$dados["mq_proc"]         = $mq_proc;			
		$dados["mq_osId"]         = $sel_mqos;			
		$dados["mq_officeId"]     = $sel_mqoffice;			
		$dados["mq_statusId"]     = $sel_mqstatus;			
		$dados["mq_nf"]           = $mq_nf;			
		$dados["mq_valor"]        = $mq_valor;			
		$dados["mq_ativo"]        = "1";			
		$dados["mq_datacad"]      = $fn->data_usa($mq_datacad);
		$dados["mq_datagar"]      = $fn->data_usa($mq_datagar);  		
		$dados["mq_usucad"]       = $_SESSION['usu_cod']; 
		$dados["mq_licenca"]      = $mq_licenca; 
		
		 
	if(!$rs->Insere($dados,"at_maquinas")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "M&aacute;quina cadastrada com sucesso!"; 
	} 
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;        
		  
	}
		}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO MAQUINAS|--------------\ 

/*---------------|FUNCAO PARA ATRIBUIR MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Atribuir_Mq"){
		
	$dados['mq_usuempId']	= $sol_emp; 	
	$dados['mq_dpId']   	= $sol_dp; 	
	$dados['mq_usuId']	    = $sol_usu;    	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = " atualizado!";  
 
	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ATRIBUIR MAQUINAS |------------------*/


/*---------------|FUNCAO PARA ALTERAR MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_Mq"){
		$dados["mq_nome"]			= trim($mq_nome);   
		$dados["mq_tag"]			= $mq_tag;  
		$dados["mq_proc"] 	        = $mq_proc;	
		$dados["mq_memId"]		    = $sel_mqmemoria; 	
		$dados["mq_hdId"]			= $sel_mqhd; 	
		$dados["mq_osId"]			= $sel_mqos;  
		$dados["mq_officeId"]		= $sel_mqoffice;
		$dados["mq_statusId"]		= $sel_mqstatus; 	
		$dados['mq_datagar']        = $fn->data_usa($mq_datagar);  
		$dados["mq_valor"]			= $mq_valor; 	
		$dados["mq_nf"]				= $mq_nf;
		$dados["mq_licenca"]      = $mq_licenca; 	
		
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "atualizado!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA A MAQUINAS |------------------*/


/*---------------|FUNCAO PARA ALTERAR USUARIO MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_usuMq"){
		
	$dados['mq_usuEmpId']	= $sol_emp; 	
	$dados['mq_dpId']		= $sol_dp; 	
	$dados['mq_usuId']		= $sol_usu;
	 	
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
 
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;  
}	
	 

/*---------------|FIM DO ALTERA USUARIO MAQUINAS |------------------*/

/*---------------|FUNCAO PARA CADASTRAR DE MANUTENÇÂO DE MAQUINAS SEM USUARIO|--------------\
	|	Author: 	Cleber Marrara Prado				    		         | 
	|	E-mail: 	cleber.marrara.prado@gmail.com					 		 |
	|	Version:	1.0														 |
	|	Date:       26/06/2017		 					   						 |
	\------------------------------------------------------------------------*/

if($acao == "cadMqmanutencaosemusu"){ 
	 
	$cod = $rs->autocod("man_id","mq_manutencao");
		$dados['man_id']    	    = $cod;
		$dados["man_mqempId"]    	= $mqemp_id; 
		$dados["man_mqId"]		    = $mq_id; 
		$dados["man_eqtipoId"]	    = $tipo_id; 
		$dados["man_mqfabId"]	    = $fab_id; 
		$dados["man_mqmodelo"]  	= $mq_modelo;  
		$dados["man_mqnome"]	    = $mq_nome; 
		$dados["man_mqtag"]	        = $mq_tag; 
		$dados["man_motivo"]        = $man_motivo; 
		$dados["man_mqusuempId"]	= $_SESSION['usu_empresa']; 
		$dados["man_mqusudpId"]	    = $_SESSION['usu_departamento']; 
		$dados["man_mqusuId"]	    = $_SESSION['usu_cod']; 		
		$dados["man_ticket"]	    = $man_ticket; 		
		$dados["man_ativo"]			= "1";
		$dados["man_dataida"]   	= date('Y-m-d H:i:s');		
		$dados["man_usucad"]    	= $_SESSION['usu_cod'];         
		
											
	if(!$rs->Insere($dados,"mq_manutencao")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Enviado a Manuten&ccedil;&atilde;o com sucesso!"; 
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	}
	echo json_encode($resul);
	exit;
}

if($acao == "Altera_StatusMamMqsemusu"){
		
	$dados['mq_statusId']	= "3"; 	     
		
	 	
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO CADASTRO DE MANUTENÇÂO DE MAQUINAS SEM USUARIO |------------------*/	

/*---------------|FUNCAO PARA CADASTRAR DE MANUTENÇÂO DE MAQUINAS SEM USUARIO LOCAL|--------------\
	|	Author: 	Cleber Marrara Prado				    		         | 
	|	E-mail: 	cleber.marrara.prado@gmail.com					 		 |
	|	Version:	1.0														 |
	|	Date:       26/06/2017		 					   						 |
	\------------------------------------------------------------------------*/

if($acao == "cadMqmanutencaosemusulocal"){ 
	 
	$cod = $rs->autocod("man_id","mq_manutencao");
		$dados['man_id']    	    = $cod;
		$dados["man_mqempId"]    	= $mqemp_id; 
		$dados["man_mqId"]		    = $mq_id; 
		$dados["man_eqtipoId"]	    = $tipo_id; 
		$dados["man_mqfabId"]	    = $fab_id; 
		$dados["man_mqmodelo"]  	= $mq_modelo;  
		$dados["man_mqnome"]	    = $mq_nome; 
		$dados["man_mqtag"]	        = $mq_tag; 
		$dados["man_motivo"]        = $man_motivo; 
		$dados["man_mqusuempId"]	= $_SESSION['usu_empresa']; 
		$dados["man_mqusudpId"]	    = $_SESSION['usu_departamento']; 
		$dados["man_mqusuId"]	    = $_SESSION['usu_cod']; 		
		$dados["man_ticket"]	    = $cod; 		
		$dados["man_ativo"]			= "1";
		$dados["man_dataida"]   	= date('Y-m-d H:i:s');		
		$dados["man_usucad"]    	= $_SESSION['usu_cod'];         
		
											
	if(!$rs->Insere($dados,"mq_manutencao")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Enviado a Manuten&ccedil;&atilde;o com sucesso!"; 
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	}
	echo json_encode($resul);
	exit;
}

if($acao == "Altera_StatusMamMqsemusu"){
		
	$dados['mq_statusId']	= "3"; 	     
		
	 	
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO CADASTRO DE MANUTENÇÂO DE MAQUINAS SEM USUARIO LOCAL|------------------*/	


/*---------------|FUNCAO PARA CADASTRAR DE MANUTENÇÂO DE MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadMqmanutencao"){ 
	 
	$cod = $rs->autocod("man_id","mq_manutencao");
		$dados['man_id']    	    = $cod;
		$dados["man_mqempId"]    	= $mqemp_id; 
		$dados["man_mqId"]		    = $mq_id; 
		$dados["man_eqtipoId"]	    = $tipo_id; 
		$dados["man_mqfabId"]	    = $fab_id; 
		$dados["man_mqmodelo"]  	= $mq_modelo;  
		$dados["man_mqnome"]	    = $mq_nome; 		
		$dados["man_mqtag"]	        = $mq_tag; 
		$dados["man_motivo"]        = $man_motivo; 
		$dados["man_mqusuempId"]	= $emp_id; 
		$dados["man_mqusudpId"]	    = $dp_id; 
		$dados["man_mqusuId"]	    = $usu_id; 		
		$dados["man_ticket"]	    = $man_ticket; 		
		$dados["man_ativo"]			= "1";
		$dados["man_dataida"]   	= date('Y-m-d H:i:s');		
		$dados["man_dataretorno	"]  = '00/00/0000';		
		$dados["man_usucad"]    	= $_SESSION['usu_cod'];         
		
											
	if(!$rs->Insere($dados,"mq_manutencao")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Enviado a Manuten&ccedil;&atilde;o com sucesso!"; 
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	}
	echo json_encode($resul);
	exit;
}

if($acao == "Altera_StatusMamMq"){
		
	$dados['mq_statusId']	= "3"; 	     
		
	 	
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO CADASTRO DE MANUTENÇÂO DE MAQUINAS |------------------*/	

/*---------------|FUNCAO PARA CADASTRAR DE MANUTENÇÂO DE MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadMqmanutencaolocal"){ 
	 
	$cod = $rs->autocod("man_id","mq_manutencao");
		$dados['man_id']    	    = $cod;
		$dados["man_mqempId"]    	= $mqemp_id; 
		$dados["man_mqId"]		    = $mq_id; 
		$dados["man_eqtipoId"]	    = $tipo_id; 
		$dados["man_mqfabId"]	    = $fab_id; 
		$dados["man_mqmodelo"]  	= $mq_modelo;  
		$dados["man_mqnome"]	    = $mq_nome; 		
		$dados["man_mqtag"]	        = $mq_tag; 
		$dados["man_motivo"]        = $man_motivo; 
		$dados["man_mqusuempId"]	= $emp_id; 
		$dados["man_mqusudpId"]	    = $dp_id; 
		$dados["man_mqusuId"]	    = $usu_id; 		
		$dados["man_ticket"]	    = $cod; 		
		$dados["man_ativo"]			= "1";
		$dados["man_dataida"]   	= date('Y-m-d H:i:s');		
		$dados["man_dataretorno	"]  = '00/00/0000';		
		$dados["man_usucad"]    	= $_SESSION['usu_cod'];         
		
											
	if(!$rs->Insere($dados,"mq_manutencao")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Enviado a Manuten&ccedil;&atilde;o com sucesso!"; 
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	}
	echo json_encode($resul);
	exit;
}

if($acao == "Altera_StatusMamMq"){
		
	$dados['mq_statusId']	= "3"; 	     
		
	 	
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO CADASTRO DE MANUTENÇÂO DE MAQUINAS |------------------*/	


/*---------------|FUNCAO PARA ALTERAR A MANUTENÇÂO DE MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Alt_ManMaquina"){
	
		$dados['man_dataretorno']      = '00/00/0000';	
		$dados["man_desc"]				= $man_desc; 
		$dados["man_obs"]				= $man_obs; 
	 	
		 	
	$whr = "man_id=".$man_id; 
	
	if(!$rs->Altera($dados, "mq_manutencao",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = " atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	} 
	else{    
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
 

/*---------------|FIM DO ALTERAR A MANUTENÇÂO DE MAQUINAS |------------------*/	


/*---------------|FUNCAO PARA FINALIZAR A MANUTENÇÂO DE MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Fin_ManMaquina"){
		$dados['man_dataretorno']	    = $fn->data_usa($man_dataretorno);
		$dados["man_desc"]				= $man_desc; 
		$dados["man_obs"]				= $man_obs; 
		$dados["man_ativo"]  			= "0"; 
		 	
	$whr = "man_id=".$man_id; 
	
	if(!$rs->Altera($dados, "mq_manutencao",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = " atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	} 
	else{    
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
if($acao == "Altera_StatusMq2"){ 
		
	$dados['mq_statusId']	= "2"; 	      
		
	 	
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	 

/*---------------|FIM DO FINALIZAR A MANUTENÇÂO DE MAQUINAS |------------------*/	


/*---------------|FUNCAO PARA LIMPAR MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Limpar_Mq"){  
		
	$dados['mq_usuEmpId']	= '0'; 	
	$dados['mq_dpId']		= '0'; 	
	$dados['mq_usuId']		= '0'; 	
	
	 	
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO LIMPAR MAQUINAS |------------------*/

/*---------------|FUNCAO PARA DESCARTE DE MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Descartar_Mq"){
	$dados['mq_usuEmpId']	= '0'; 	   
	$dados['mq_dpId']		= '0'; 	
	$dados['mq_usuId']		= '0'; 
	$dados['mq_statusId']	= "4"; 	 
	$dados['mq_descmotivo']	= $mq_descmotivo; 
	$dados["mq_datades"]    = date('Y-m-d H:i:s');	
	$dados['mq_ativo']  	= "0";  	 
	$dados['mq_usudes']  	= $_SESSION['usu_cod']; 	 
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	$resul['sql'] = $rs->sql; 
	  	
	}	
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}
	echo json_encode($resul);
    exit;  

	}
if($acao == "Descartar_Mq_mailSender"){
	$sql ="SELECT * FROM at_usuarios a
				JOIN at_empresas b ON a.usu_empId = b.emp_id 
				JOIN at_departamentos c ON a.usu_dpId = c.dp_id 
				WHERE usu_id = ".$_SESSION['usu_cod'];
				$rs->FreeSql($sql);
 				$rs->GeraDados();
	$departamento = $rs->fld("dp_nome");	 		
		
	$empresa      = $rs->pegar("emp_alias","at_empresas","emp_id = '".$_SESSION['usu_empresa']."'");
	//$departamento = $rs->pegar("dp_nome","at_departamentos","dp_id = '".$_SESSION['usu_departamento']."'");
	$maquina      = $rs->pegar("mq_nome","at_maquinas","mq_id = '".$mq_id."'");
	$usuario      = $rs->pegar("usu_nome","sys_usuarios","usu_cod = '".$_SESSION['usu_cod']."'");
	 
	$mensagem = file_get_contents("../view/at_emailSender.html");
	$mensagem = str_replace("{usuario}", $usuario, $mensagem );
	$mensagem = str_replace("{departamento}", $departamento, $mensagem ); 
	$mensagem = str_replace("{empresa}", $empresa, $mensagem );
	$mensagem = str_replace("{maquina}", $maquina, $mensagem );
	$mensagem = str_replace("{id}", $mq_id, $mensagem );
	$mensagem = str_replace("{motivo}", $mq_descmotivo, $mensagem );
	
	
	 $cod = $rs->autocod("ims_id","at_mailsender");
		$dados['ims_id']    	    = $cod;
		$dados["ims_dest"]    		= "elsilva@vilagalvao.com.br"; 
		$dados["ims_arquivo"]		= '0'; 
		$dados["ims_nomearquivo"]	= '0';  
		$dados["ims_assunto"]	    = "DESCARTES - GRUPO NIFF";  
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
    exit;
}	
 	    

/*---------------|FIM DO DESCARTE DE MAQUINAS |------------------*/	

/*---------------|FUNCAO PARA EXCLUIR MAQUINAS|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "exclui_Equipamento"){    
	
	if(!$rs->Exclui("at_equipamentos","eq_id=".$eq_id)){  
		$resul['status'] = "OK";
		$resul['mensagem'] = "Dados Excluidos!"; 
		  
	}  
	else{ 
		$resul['mensagem']	= "Ocorreu um erro...";   
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO EXCLUIR MAQUINA |------------------*/	 

/*----------|FUNCAO PARA CADASTRAR DE EMPRESTIMO  DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadeqEmpre"){
	 
	$cod = $rs->autocod("empre_id","eq_emprestimo");
		$dados['empre_id']    	   = $cod;
		$dados["empre_eqempId"]	   = $eq_empId; 
		$dados["empre_eqtipoId"]   = $tipo_id; 
		$dados["empre_eqmarcaId"]  = $marc_id; 
		$dados["empre_eqId"]	   = $eq_id; 
		$dados["empre_eqdesc"]     = $eq_desc; 
		$dados["empre_eqmodelo"]   = $eq_modelo; 
		$dados["empre_eqserial"]   = $eq_serial; 		
		$dados["empre_usuempId"]   = $sol_emp; 
		$dados["empre_usudpId"]    = $sol_dp;
		$dados["empre_usuId"]	   = $sol_usu; 
		$dados["empre_datade"]	   = $fn->data_usa($empre_datade); 
		$dados["empre_dataate"]	   = "00/00/0000"; 			
		$dados["empre_ticket"]	   = $empre_ticket;
		$dados["empre_ativo"]	   = "1"; 
		$dados["empre_usucad"]     = $_SESSION['usu_cod'];        
		
											
	if(!$rs->Insere($dados,"eq_emprestimo")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Enviado a Emprestado com sucesso!"; 
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	}
	echo json_encode($resul);
	exit;
}

if($acao == "Altera_StatusEqempre"){
		
	$dados['eq_statusId']	= "5"; 	     
		
	 	
	 	
	$whr = "eq_id=".$eq_id; 
	
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO CADASTRO DE EMPRESTIMO  DE DE EQUIPAMENTOS |------------------*/	


/*---------------|FUNCAO PARA FINALIZAR EMPRESTIMO  DE DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Fin_Eqemprestimo"){
		$dados['empre_dataate']	= $fn->data_usa($empre_dataate);
		$dados["empre_obs"]		= $empre_obs; 
		$dados["empre_ativo"]  	= "0"; 
		 	
	$whr = "empre_id=".$empre_id; 
	
	if(!$rs->Altera($dados, "eq_emprestimo",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = " atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	} 
	else{    
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
if($acao == "Altera_Status_Eqemp"){ 
		
	$dados['eq_statusId']	= "2"; 	      
			 	
	 	
	$whr = "eq_id=".$eq_id; 
	
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	 

/*---------------|FIM DO FINALIZAR A EMPRESTIMO  DE DE EQUIPAMENTOS |------------------*/	

/*---------------|FUNCAO PARA CADASTRAR DE EMPRESTIMO  DE MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadMqempre"){
	 
	$cod = $rs->autocod("empre_id","mq_emprestimo");
		$dados['empre_id']    	   = $cod;
		$dados["empre_mqempId"]	   = $mq_empId; 
		$dados["empre_eqtipoId"]   = $tipo_id; 
		$dados["empre_mqfabId"]    = $fab_id; 
		$dados["empre_mqId"]	   = $mq_id; 
		$dados["empre_mqnome"]     = $mq_nome; 
		$dados["empre_mqmodelo"]   = $mq_modelo; 
		$dados["empre_mqtag"]      = $mq_tag; 		
		$dados["empre_usuempId"]   = $sol_emp; 
		$dados["empre_usudpId"]    = $sol_dp;
		$dados["empre_usuId"]	   = $sol_usu; 
		$dados["empre_datade"]	   = $fn->data_usa($empre_datade); 		
		$dados["empre_dataate"]	   = "00/00/0000"; 		
		$dados["empre_ticket"]	   = $empre_ticket;
		$dados["empre_ativo"]	   = "1"; 
		$dados["empre_usucad"]     = $_SESSION['usu_cod'];        
		
											
	if(!$rs->Insere($dados,"mq_emprestimo")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Enviado a Emprestado com sucesso!"; 
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	}
	echo json_encode($resul);
	exit;
}

if($acao == "Altera_StatusMqempre"){
		
	$dados['mq_statusId']	= "5"; 	     
		
	 	
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}
/*---------------|FIM DO CADASTRO DE EMPRESTIMO DE MAQUINAS |------------------*/	
  

/*---------------|FUNCAO PARA FINALIZAR EMPRESTIMO DE MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Fin_Mqemprestimo"){
		$dados['empre_dataate']	= $fn->data_usa($empre_dataate);
		$dados["empre_obs"]		= $empre_obs; 
		$dados["empre_ativo"]  	= "0"; 
		 	
	$whr = "empre_id=".$empre_id; 
	
	if(!$rs->Altera($dados, "mq_emprestimo",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = " atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	} 
	else{    
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
if($acao == "Altera_Status_Mqemp"){ 
		
	$dados['mq_statusId']	= "2"; 	      
			 	
	 	
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	 

/*---------------|FIM DO FINALIZAR EMPRESTIMO DE MAQUINAS |------------------*/	


/*---------------|FUNCAO PARA CADASTRO DE COMPRA|-------------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadCompras"){
	 
	$cod = $rs->autocod("comp_id","at_compras");
		$dados['comp_id']    	   = $cod;
		$dados["comp_empId"]       = $sel_emp; 
		$dados["comp_dpId"]        = $sel_dp; 
		$dados["comp_titulo"]      = $comp_titulo; 
		$dados["comp_valor"]	   = $comp_valor; 
		$dados["comp_desc"]        = $comp_desc; 
		$dados["comp_datacad"]	   = $fn->data_usa($comp_datacad); 		
		$dados["comp_datafin"]	   = '00/00/0000'; 		
		$dados["comp_ativo"]	   = "1"; 
		$dados["comp_statusId"]	   = "1"; 
		$dados["comp_usucad"]      = $_SESSION['usu_cod'];        
		
											
	if(!$rs->Insere($dados,"at_compras")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Enviado a Emprestado com sucesso!"; 
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	} 
	echo json_encode($resul);
	exit;
}


/*---------------|FIM DO CADASTRO DE COMPRA |------------------*/	

/*---------------|FUNCAO PARA CADASTRO DE CADASTRO DE INTERACAO NA  COMPRA|-------------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "interagir_comp"){
	 
	$cod = $rs->autocod("compobs_id","comp_obs");
		$dados['compobs_id']        = $cod;
		$dados["compobs_compId"]    = $comp_id; 
		$dados["compobs_usuId"]     = $_SESSION['usu_cod'];
		$dados["compobs_data"]	    = date("Y-m-d H:i:s") ;	
		$dados["compobs_obs"]	    = $comp_obs;	
		$dados["compobs_statusId"]	= $sel_status; 
		
		
											
	if(!$rs->Insere($dados,"comp_obs")){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Enviado a Emprestado com sucesso!"; 
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	} 
	echo json_encode($resul);
	exit;
}


/*---------------|FIM DO CADASTRO DE CADASTRO DE INTERACAO NA  COMPRA |------------------*/	

/*---------------|FUNCAO PARA ALTERAR SOLICITACO DE COMPRAS|--------------\

	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Alt_Compra"){
		//$dados["comp_valor"]	= str_replace(",",".",$comp_valor);  
		$dados["comp_valor"]	= $comp_valor;  
		$dados["comp_desc"]     = $comp_desc;
		$dados["comp_statusId"]	= $sel_status; 	 
		 	
	$whr = "comp_id=".$comp_id; 
	
	if(!$rs->Altera($dados, "at_compras",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = " atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	}  
	else{    
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	   
	echo json_encode($resul);
    exit;
}	 
/*---------------|FIM DE ALTERAR SOLICITACO DE COMPRAS|------------------*/

/*---------------|FUNCAO PARA FINALIZAR  SOLICITACO DE COMPRAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Fin_Compra"){
		$dados["comp_datafin"]	    = date("Y-m-d H:i:s") ;	
		$dados["comp_statusId"]  	= "5"; 	
		$dados["comp_ativo"]  	    = "0"; 	
		 	
	$whr = "comp_id=".$comp_id; 
	 
	if(!$rs->Altera($dados, "at_compras",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = " atualizada!"; 
		$resul['sql'] = $rs->sql;
		   
	}  
	else{    
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
/*---------------|FIM DE FINALIZAR  SOLICITACO DE COMPRAS|------------------*/

/*---------------|FUNCAO PARA CADASTRAR DE TERMO DE UTILIZAÇÃO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadTermo"){ 
		
		$cod = $rs->autocod("trm_Id","at_usu_termo_utilizacao");
		
		$dados['trm_id']			= $cod;		
		$dados["trm_usuempId"]    	= $usu_empId; 		
		$dados["trm_usudpId"]      	= $usu_dpId; 		
		$dados["trm_usuId"]       	= $usu_Id;
		$dados["trm_eqtipoId"]     	= $eq_tipoId; 		
		$dados["trm_eqmarcId"]      = $mq_fabId; 		
		$dados["trm_eqId"]        	= $eq_Id; 		
		$dados["trm_usucad"]       	= $_SESSION['usu_cod'];		
		$dados["trm_usuchapa"]      = $usu_chapa;	  	
		$dados["trm_usucargo"]      = $usu_cargo;	  	
		$dados["trm_usuctps"]       = $usu_cpts;		
		$dados["trm_usurg"]         = $usu_rg; 	
		$dados["trm_usucpf"]        = $usu_cpf;			
		$dados["trm_item1"]         = $item1;			
		$dados["trm_item1_qtde"]    = $item1_qtde;			
		$dados["trm_item2"]         = $item2;			
		$dados["trm_item2_qtde"]    = $item2_qtde;			
		$dados["trm_chamado "]      = $chamado ;			
		$dados["trm_data"]         	= date("Y-m-d H:i:s") ;
		
		 
	if(!$rs->Insere($dados,"at_usu_termo_utilizacao")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Termo cadastrado com sucesso!"; 
	} 
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;        
		  
	}
		
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO TERMO DE UTILIZAÇÃO|--------------\ 

/*---------------|FUNCAO PARA ALTERAR O ALTERAR TERMO DE UTILIZAÇÃO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_Trm"){
	$dados['trm_usuchapa']		= $usu_chapa; 	
	$dados['trm_usucargo']		= $usu_cargo; 	
	$dados['trm_usuctps']		= $usu_cpts; 	
	$dados['trm_usurg']			= $usu_rg; 	
	$dados['trm_usucpf']		= $usu_cpf; 	
	$dados['trm_item1']			= $item1; 	
	$dados['trm_item1_qtde']	= $item1_qtde; 	
	$dados['trm_item2']			= $item2; 	
	$dados['trm_item2_qtde']	= $item2_qtde; 	
	$dados['trm_chamado']		= $chamado; 	
	 
	$whr = "trm_id=".$trm_id; 
	
	if(!$rs->Altera($dados, "at_usu_termo_utilizacao",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Termo atualizado!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DE ALTERAR TERMO DE UTILIZAÇÃO|------------------*/	

/*---------------|FUNCAO PARA CADASTRAR CHIP|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadChips"){ 
		//Busca informação no bando se o nome já exixte
		$rs->seleciona("chip_serial","eq_chips","chip_serial='{$chip_serial}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "Chip j&aacute; cadastrado";  
			$resul['mensagem'] = $rs->sql;  
		}ELSE{
		$cod = $rs->autocod("chip_id","eq_chips");
		$dados['chip_id']       	= $cod;		
		$dados["chip_eqId"]    	    = '0'; 		 
		$dados["chip_empId"]    	= $sel_empchip; 		
		$dados["chip_operadora"]   	= $chip_operadora;		
		$dados["chip_serial"]   	= trim($chip_serial);	  	
		$dados["chip_linha"]   		= $chip_linha;	  	
		$dados["chip_pin"]   		= trim($chip_pin);		
		$dados["chip_pin2"]   		= trim($chip_pin2);		
		$dados["chip_puk"]   		= trim($chip_puk);		
		$dados["chip_puk2"]   		= trim($chip_puk2);		
		$dados["chip_ativo"]    	= "1";			
		$dados["chip_datacad"]  	= date('Y-m-d H:i:s');		
		$dados["chip_usucad"]   	= $_SESSION['usu_cod']; 
		
		 
	if(!$rs->Insere($dados,"eq_chips")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Chip cadastrado com sucesso!";
	} 
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;        
		  
	}
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO CHIPS|--------------------------------*/


/*---|FUNCAO PARA SELECIONAR O TIPO REF A EMPRESA|------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	19/12/2016									    |	
	\*--------------------------------- ------------------------*/	
	
if($acao == "populaCheckCeltp"){  
	$sql = "SELECT * FROM eq_tipo  
				WHERE tipo_desc = 'Celular Corporativo' AND tipo_empId =".$id;
	$rs->FreeSql($sql);
	
	$opt = "<option value=''>Selecione...</option>"; 
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('tipo_id')."'>".$rs->fld('tipo_desc')."</option>";
	}
	echo $opt;  
	
}
/*---------------|FIM DA FUNCAO "populaCheckCeltp" |------------------*/

/*---|FUNCAO PARA SELECIONAR O MARCA REF AO TIPO|------------*\ 
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	19/12/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckCelmarca"){  
	$sql = "SELECT * FROM eq_marca 
				WHERE marc_tipoId =".$id; 
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>"; 
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('marc_id')."'>".$rs->fld('marc_nome')."</option>";
	}
	echo $opt;  
}
/*---------------|FIM DA FUNCAO "populaCheckCelmarca" |------------------*/

/*---|FUNCAO PARA SELECIONAR O EQUIPAMENTO REF A MARCA|------------*\ 
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |  
	| Date: 	19/12/2016									    |	
	\*---------------------------------------------------------*/	
	   
if($acao == "populaCheckChipeq"){    
    
	$sql = "SELECT * FROM at_equipamentos 
			WHERE eq_ativo <> 1 AND eq_marcId =".$id;   
	$rs->FreeSql($sql);
	$opt = "<option value=''>Selecione...</option>"; 
	while($rs->GeraDados()){
		$var = $rs->fld('eq_id').'-'. $rs->fld('eq_modelo').'-'. $rs->fld('eq_desc');
		$opt .= "<option value='".$rs->fld('eq_id')."'>".$var."</option>";
	}
	echo $opt;  
}
/*---------------|FIM DA FUNCAO "populaCheckChipeq" |------------------*/


/*---------------|FUNCAO PARA ATRIBUIR CHIPS|---------------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Atribuir_Chip"){
		
	$dados['chip_eqId']	= $sel_eqchip; 	
	
	$whr = "chip_id=".$chip_id; 
	
	if(!$rs->Altera($dados, "eq_chips",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = " atualizado!";  
 
	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	 echo json_encode($resul);
    exit;
}	
	  

/*---------------|FIM DO ATRIBUIR CHIPS |------------------*/	


/*---------------|FUNCAO PARA ALTERAR CHIPS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_Chip"){
	$dados["chip_operadora"] 	= $chip_operadora;	
	$dados['chip_serial']		= trim($chip_serial);   
	$dados['chip_linha']		= $chip_linha; 	
	$dados["chip_pin"]   		= trim($chip_pin);		
	$dados["chip_pin2"]   		= trim($chip_pin2);		
	$dados["chip_puk"]   		= trim($chip_puk);		
	$dados["chip_puk2"]   		= trim($chip_puk2); 
	$dados['chip_ativo']	  	= $chip_ativo; 	
	$whr = "chip_id=".$chip_id; 
	
	if(!$rs->Altera($dados, "eq_chips",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Chip atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA CHIPS |------------------*/

/*---------------|FUNCAO PARA ALTERAR EQUIPAMENTOS DO CHIP|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_ChipEq"){
	
	$dados['chip_eqId']	= $sel_eqchip; 	
	
	$whr = "chip_id=".$chip_id; 
	
	if(!$rs->Altera($dados, "eq_chips",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = " atualizado!";  
 
	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	 echo json_encode($resul);
    exit;
}	
	
	
/*---------------|FIM DO ALTERA USUARIO EQUIPAMENTOS |------------------*/


/*---------------|FUNCAO PARA LIMPAR CHIP DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Limpar_Chip"){
		
	$dados['chip_eqId']	= '0'; 	
	
	 	
	 	
	$whr = "chip_id=".$chip_id; 
	
	if(!$rs->Altera($dados, "eq_chips",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Chip atualizado!"; 

	 $resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul); 
    exit;
}	
	 

/*---------------|FIM DO LIMPAR CHIP DE EQUIPAMENTOS |------------------*/

/*---------------|FUNCAO PARA CADASTRAR IMEI2|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Cad_imei2"){
	//Busca informação no bando se o nome já exixte
		$rs->seleciona("eq_serial2","at_equipamentos","eq_serial2='{$imei2}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "IME2 j&aacute; cadastrado";  
			$resul['mensagem'] = $rs->sql;  
		}ELSE{
	$dados['eq_serial2']	= trim($imei2);   
	$whr = "eq_id=".$eq_id; 
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 
	$resul['status'] = "OK";
	$resul['mensagem'] = "Equipamento atualizado!"; 
	 
	}
	else{
		$resul['status'] = "Erro";
		$resul['sql']		= $rs->sql;   
	}	
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO CADASTRAR IMEI2 |------------------*/

/*---------------|FUNCAO PARA CADASTRAR A INSTITUIÇÂO|--------------\
	|	Author: 	Cleber Marrara Prado				    		| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       15/10/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "cadInstituicoes"){
	//Busca informação no bando se o nome já exixte
		$rs->seleciona("inst_cnpj","at_instituicoes","inst_cnpj='{$inst_cnpj}'");
		if($rs->linhas<>0){
			$resul['status'] = "Erro";
			$resul['status'] = "Nome j&aacute; cadastrado";
			$resul['mensagem'] = $rs->sql;  
		}ELSE{
	
		$cod = $rs->autocod("inst_id","at_instituicoes");
		$dados['inst_id']    	= $cod;
		$dados["inst_nome"]		= $inst_nome;  
		$dados["inst_alias"]	= $inst_alias; 
		$dados["inst_cnpj"] 	= $inst_cnpj; 
		$dados["inst_ie"]	    = $inst_ie; 
		$dados["inst_cep"]	    = $cep;   
		$dados["inst_log"]	    = $log;
		$dados["inst_num"]	    = $num;   
		$dados["inst_compl"]	= $compl;   
		$dados["inst_bai"]	    = $bai;   
		$dados["inst_cid"]	    = $cid;   
		$dados["inst_uf"]	    = $uf;   
		$dados["inst_contato"]	= $inst_contato; 
		$dados["inst_email"]	= $inst_email; 
		$dados["inst_tel"]		= $inst_tel; 
		$dados["inst_site"]		= $inst_site;  
		$dados["inst_ativo"]	= "1";	 
	    
		
											
	if(!$rs->Insere($dados,"at_instituicoes")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Institui&ccedil;&atilde;o cadastrada com sucesso!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;  
		
	}
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM DO CADASTRO INSTITUIÇÂO |------------------*/	

/*---------------|FUNCAO PARA ALTERAR A INSTITUIÇÂO|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Altera_inst"){
		$dados["inst_nome"]		= $inst_nome;  
		$dados["inst_alias"]	= $inst_alias; 
		$dados["inst_cnpj"] 	= $inst_cnpj; 
		$dados["inst_ie"]	    = $inst_ie; 
		$dados["inst_cep"]	    = $cep;   
		$dados["inst_log"]	    = $log;
		$dados["inst_num"]	    = $num;   
		$dados["inst_compl"]	= $compl;   
		$dados["inst_bai"]	    = $bai;   
		$dados["inst_cid"]	    = $cid;   
		$dados["inst_uf"]	    = $uf;   
		$dados["inst_contato"]	= $inst_contato; 
		$dados["inst_email"]	= $inst_email; 
		$dados["inst_tel"]		= $inst_tel; 
		$dados["inst_site"]		= $inst_site;  	
	$whr = "inst_id=".$inst_id; 
	
	if(!$rs->Altera($dados, "at_instituicoes",$whr)){ 
		$resul['status'] = "OK";
		$resul['mensagem'] = "Institui&ccedil;&atilde;o atualizada!"; 
		$resul['sql'] = $rs->sql;
		  
	}
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	
	 

/*---------------|FIM DO ALTERA A INSTITUIÇÂO |------------------*/


/*---------------| EQUIPAMENTOS PARA DOAÇÂO|--------------------*\
| Author:   Cleber Marrara Prado                                |
| Version:  1.0                                                 |
| Email:    cleber.marrara.prado@gmail.com                      |
| Date:     27/09/2016                                          |
\*-------------------------------------------------------------*/
if($acao == "eq_doacao"){
	
	
		$dados['id_inst'] 		= $instituicao ;
		$dados["eq_datadoa"]    = date('Y-m-d H:i:s');	
		$dados['eq_statusId']	= "6"; 
		$dados['eq_usudoa']  	= $_SESSION['usu_cod']; 
		$whr = "eq_id IN (".$doacoes.")";
		
		if(!$rs->Altera($dados, "at_equipamentos", $whr)){
		
			$resul['status'] = "OK";
			$resul['mensagem']="Equipamentos Doados!";
			$resul['sql']=$rs->sql;
		}
		else{
			$resul['status']="NOK";
			$resul['mensagem']="Falha no SQL";
			$resul['sql']=$rs->sql;
		}
	
	$resul['status'] = "OK";
	echo json_encode($resul);
	//echo json_encode($dados2);
    exit;
}

/*---------------|FIM DE EQUIPAMENTOS PARA DOAÇÂO|-----------------------*\

/*---------------| MAQUINAS PARA DOAÇÂO|--------------------*\
| Author:   Cleber Marrara Prado                                |
| Version:  1.0                                                 |
| Email:    cleber.marrara.prado@gmail.com                      |
| Date:     27/09/2016                                          |
\*-------------------------------------------------------------*/
if($acao == "mq_doacao"){
	
	
		$dados['id_inst'] 		= $instituicao ;
		$dados["mq_datadoa"]    = date('Y-m-d H:i:s');
		$dados['mq_statusId']	= "6";
		$dados['mq_usudoa']  	= $_SESSION['usu_cod']; 		
		$whr = "mq_id IN (".$doacoes.")";
		
		if(!$rs->Altera($dados, "at_maquinas", $whr)){
		
			$resul['status'] = "OK";
			$resul['mensagem']="Equipamentos Doados!";
			$resul['sql']=$rs->sql;
		}
		else{
			$resul['status']="NOK";
			$resul['mensagem']="Falha no SQL";
			$resul['sql']=$rs->sql;
		}
	
	$resul['status'] = "OK";
	echo json_encode($resul);
	//echo json_encode($dados2);
    exit;
}

/*---------------|FIM DE MAQUINAS PARA DOAÇÂO|-----------------------*\

/*---------------|FUNCAO PARA OUTRAS OCORRENCIAS DE MAQUINAS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Outros_Mq"){
	$dados['mq_usuEmpId']	= '0'; 	   
	$dados['mq_dpId']		= '0'; 	
	$dados['mq_usuId']		= '0'; 
	$dados['mq_statusId']	= "7"; 	 
	$dados['mq_descmotivo']	= $mq_descmotivo; 
	$dados["mq_datades"]    = date('Y-m-d H:i:s');	
	$dados['mq_ativo']  	= "0";  	 
	$dados['mq_usudes']  	= $_SESSION['usu_cod']; 	 
	$whr = "mq_id=".$mq_id; 
	
	if(!$rs->Altera($dados, "at_maquinas",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	$resul['sql'] = $rs->sql; 
	  	
	}	
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}
	echo json_encode($resul);
    exit;  

	}
/*---------------|FIM DE OUTRAS OCORRENCIAS DE MAQUINAS|-----------------------*\

/*---------------|FUNCAO PARA OUTRAS OCORRENCIAS DE EQUIPAMENTOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 

if($acao == "Outros_Eq"){
	$dados['eq_descmotivo']	= $eq_descmotivo;
	$dados['eq_usuEmpId']	= '0'; 	
	$dados['eq_mqEmpId']	= '0'; 	
	$dados['eq_dpId']		= '0'; 	
	$dados['eq_usuId']		= '0'; 	
	$dados['eq_mqId']		= '0';  	
	$dados['eq_statusId']	= "7"; 
	$dados["eq_datades"]    = date('Y-m-d H:i:s');	
	$dados['eq_ativo']  	= "0";  	
	$dados['eq_usudes']  	= $_SESSION['usu_cod']; 
	$whr = "eq_id=".$eq_id; 
	 
	if(!$rs->Altera($dados, "at_equipamentos",$whr)){ 

	$resul['status'] = "OK";

	$resul['mensagem'] = "Usu&aacuterio atualizado!"; 

	 $resul['sql'] = $rs->sql; 
		  
	} 
	else{
		$resul['mensagem']	= "Ocorreu um erro..."; 
		$resul['sql']		= $rs->sql;  
	}	
	echo json_encode($resul);
    exit;
}	

/*---------------|FIM DE OUTRAS OCORRENCIAS DE EQUIPAMENTOS|-----------------------*\


/*---------------|FIM DA FUNCAO |------------------*/	
