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
$res = array();
$dados = array();


/*---|FUNCA PARA SELECIONAR O CNPJ REF A EMPRESA|------------*\
	| Author: 	Cleber Marrara Prado 				          	|
	| Version: 	1.0 			            					|
	| Email: 	cleber.marrara.prado@gmail.com 			        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/	
	
if($acao == "populaCheckCnpj"){
	$sql = "SELECT * FROM at_empresas WHERE emp_id=".$id;
	$rs->FreeSql($sql);
	$opt = "";
	while($rs->GeraDados()){
		$opt .= "<option value='".$rs->fld('emp_cnpj')."'>".$rs->fld('emp_cnpj')."</option>";
	}
	echo $opt; 
}
/*---------------|FIM DA FUNCAO "populaCheckCnpj |------------------*/

   


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

	/*---------------|AÇÂO PARA CADASTRAR USUARIOS|------------*\
	| Author: 	Elvis Leite 				                 	|
	| Version: 	1.0 			            					|
	| Email: 	elvis7t@gmail.com 						        |
	| Date: 	16/10/2016									    |	
	\*---------------------------------------------------------*/
	
if($acao == "cadusuarios"){
	$dados["usu_nome"] 		= $usu_nome;
	$dados["usu_senha"] 	= trim(md5($usu_senha));
	$dados["usu_empId"] 	= $sel_emp ; 
	$dados["usu_emp_cnpj"] 	= $sel_cnpj;
	$dados["usu_dpId"] 	    = $sel_dp ;
	$dados["usu_classe"] 	= $usu_classe;
	$dados["usu_email"] 	= $usu_email;
	$dados['usu_foto']	    = "/assets/perfil/masc.jpg" ;  
	$dados["usu_ativo"] 	= "1";
	$dados["usu_online"] 	= "0";
	$dados["usu_datacad"]   = date("Y-m-d H:i:s");
		
	if(!$rs->Insere($dados,"sys_usuarios")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Usuario cadastrado com sucesso!";
	}
	else{ 
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;
		
	}
	echo json_encode($resul);
	exit; 
}

if($acao == "cadusuariosDados"){
	
	$dados["dados_usu_email"] 	= $usu_email;

		
	if(!$rs->Insere($dados,"sys_dados_user")){
		$resul['status'] = "OK";
		$resul['mensagem'] = "Usuario cadastrado com sucesso!";
	}
	else{
		$resul['status'] = "Erro";
		$resul['mensagem'] = $rs->sql;
		
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM CADASTRO DE USUARIOS|------------------*/	


	/*---------------|ALTERAÇÃO DO PERFIL|-----------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016
	| Botao para alterar ou caastrar os dados do usuário
	\*-------------------------------------------------------------*/


if($acao == "altera_perfil"){

	$arr_habil = implode(";",$habil);
	//echo $arr_habil;
	$dados["dados_escol"] 	= $escol;
	$dados["dados_cep"] 	= $cep;
	$dados["dados_rua"] 	= $log;
	$dados["dados_num"] 	= $num;
	$dados["dados_compl"] 	= $compl;
	$dados["dados_bairro"] 	= $bai;
	$dados["dados_cidade"] 	= $cid;
	$dados["dados_uf"] 		= $uf;
	$dados["dados_nasc"] 	= $fn->data_usa($data);
	$dados["dados_habil"] 	= $arr_habil;
	$dados["dados_notas"] 	= $notas;
	$dados["dados_tel"] 	= $usu_tel;
	$dados["dados_ramal"] 	= $usu_ramal;
	$dados["dados_cel"] 	= $usu_cel;
	
	$whr = "dados_usu_email ='".$usu_email."'";   
	
	if(!$rs->Altera($dados, "sys_dados_user",$whr)){
			$resul["status"] = "OK";
	        $resul["mensagem"] = "Dados Alterados!";
	        $resul["sql"] = $rs->sql;
	    } else {
			$resul["status"] = "ERRO";
	        $resul["mensagem"] = "Falha no envio";
	        $resul["sql"] = $rs->sql;
	    }
	 
	echo json_encode($resul);
	exit;
}
/*---------------|FIM ALTERAÇÃO DE PERFIL|-----------------------------*\|------------------*/	

/*---------------|ALTERAÇÃO DE SENHAS DOS USUÁRIOS DO PORTAL|--*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016
	| Botao para alterar senhas de usuário
	\*-------------------------------------------------------------*/
	

if($acao == "Altera_Senha"){
		$dados["usu_senha"] = md5($nsenha);
		
		$whr = "usu_cod =".$_SESSION['usu_cod'];
		
		if(!$rs->Altera($dados, "sys_usuarios",$whr)){
			$resul["status"] = "OK";
	        $resul["mensagem"] = "Senha Alterada!";
	        $resul["sql"] = $rs->sql;
	    } else {
			$resul["status"] = "ERRO";
	        $resul["mensagem"] = "Falha no envio";
	        $resul["sql"] = $rs->sql; 
	    }
				
	echo json_encode($resul);
	exit;
}


/*---------------|FIM ALTERAÇÃO DE SENHA|-----------------------------*\|------------------*/	

/*---------------|FUNCAO PARA ALTERAR USUARIOS ATIVOS|--------------\
	|	Author: 	Cleber Marrara Prado							| 
	|	E-mail: 	cleber.marrara.prado@gmail.com					|
	|	Version:	1.0												|
	|	Date:       31/10/2016						   				|
	\--------------------------------------------------------------*/ 


	
if($acao == "Altera_usu2"){
	
	$dados["usu_dpId"]	    = $usu_dpId;	   
	$dados["usu_nome"]	    = $usu_nome;  
	$dados["usu_email"]	    = $usu_email_alt; 
	$dados["usu_senha"]	    = md5($usu_senha); 
	$dados["usu_classe"]	= $sel_class; 
	$dados["usu_ativo"]	    = $usu_ativo; 
	$whr = "usu_cod=".$usucod; 
	if(!$rs->Altera($dados, "sys_usuarios",$whr)){
			$resul["status"] = "OK";
	        $resul["mensagem"] = "Senha Alterada!";
	        $resul["sql"] = $rs->sql;
	    } else {
			$resul["status"] = "ERRO";
	        $resul["mensagem"] = "Falha no envio";
	        $resul["sql"] = $rs->sql; 
	    }
			
	echo json_encode($resul); 
    exit; 
}	

/*-|ALTERAR  EMAIL NA TABELA sys_dados_user|*\
		\*/	

if($acao == "Altera_email"){
		  
	$dados["dados_usu_email"]	    = $usu_email_alt; 
	
	$whr = "dados_usu_email ='".$usu_email."'";   
	
	if(!$rs->Altera($dados, "sys_dados_user",$whr)){
			$resul["status"] = "OK";
	        $resul["mensagem"] = "Dados Alterados!";
	        $resul["sql"] = $rs->sql;
	    } else {
			$resul["status"] = "ERRO";
	        $resul["mensagem"] = "Falha no envio";
	        $resul["sql"] = $rs->sql;
	    }	
	echo json_encode($resul); 
    exit; 
}	
	 

/*---------------|FIM DO ALTERA A USUARIOS ATIVOS |------------------*/	

/*---------------|FUNCAO PARA TRUNCAR TABELA LOGADOS|--------------\
	| Autor: cleber Marrara Prado                                   |
	| Version:  1.0                                                 |
	| Email: cleber.Marrara.Prado@gmail.com                         |											
	|	Date:       30/11/2016						   				|
	\--------------------------------------------------------------*/

if($acao == "truncar_logados"){    
	$whr = "log_id <>1"; 
	if(!$rs->Exclui("sys_logado",$whr)){  
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
/*---------------|FIM DO TRUNCAR TABELA LOGADOS |------------------*/

/*---------------|ALTERAÇÃO DO PERFIL|-----------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016  				|
	| Botao para alterar ou caastrar os dados do usuário			|
	\*-------------------------------------------------------------*/


if($acao == "altera_perfil_usu"){

	
	//echo $arr_habil;
	$dados["dados_escol"] 	= $escol;
	$dados["dados_cep"] 	= $cep;
	$dados["dados_rua"] 	= $log;
	$dados["dados_num"] 	= $num;
	$dados["dados_compl"] 	= $compl;
	$dados["dados_bairro"] 	= $bai;
	$dados["dados_cidade"] 	= $cid;
	$dados["dados_uf"] 		= $uf;
	$dados["dados_nasc"] 	= $fn->data_usa($data);
	$dados["dados_tel"] 	= $usu_tel;
	$dados["dados_ramal"] 	= $usu_ramal;
	$dados["dados_cel"] 	= $usu_cel;
	
	
	$whr = "dados_usu_email ='".$usu_email."'";   
	
	if(!$rs->Altera($dados, "sys_dados_user",$whr)){
			$resul["status"] = "OK";
	        $resul["mensagem"] = "Dados Alterados!";
	        $resul["sql"] = $rs->sql;
	    } else {
			$resul["status"] = "ERRO";
	        $resul["mensagem"] = "Falha no envio";
	        $resul["sql"] = $rs->sql;
	    }
	 
	echo json_encode($resul);
	exit;
}
/*---------------|FIM ALTERAÇÃO DE PERFIL|-----------------------------*\|------------------*/	

/*---------------|ACAO PARA CONTATO DO SITE|------------------------\
|	Author: 	Elvis Leite da Silva								|
|	E-mail: 	elvis7t@gmail.com 									|
|	Version:	1.0													|
\------------------------------------------------------------------*/	
	
if($acao == "Envia_mensagen"){
		foreach ($sel_contato as $value) {
		$cod = $rs->autocod("mail_Id","sys_mail");
		$dados["mail_Id"]		            = $cod;
		$dados["mail_envio_usuempId"]		= $_SESSION['usu_empresa']; 
		$dados["mail_envio_usudpId"]	    = $_SESSION['usu_departamento']; 
		$dados["mail_envio_usuId"]	        = $_SESSION['usu_cod']; 	
		$dados["mail_destino_usuId"] 	    = addslashes($value);
		$dados["mail_assunto"]          	= $assunto;
		$dados["mail_mensagem"] 		    = $Mensagen;
		$dados["mail_data"] 		        = date('Y-m-d H:i:s');
		$dados["mail_envio_statusId"] 		= '3';
		$dados["mail_statusId"] 		    = '1';
		
		if(!$rs->Insere($dados,"sys_mail")){
			$resul['status'] = "OK";
			$resul['mensagem'] = "Mensagem enviada com sucesso!";
		}
		else{
			$resul['status'] = "Erro";
			$resul['mensagem'] = $rs->sql;
		}
	}
	echo json_encode($resul);
	exit;
}
/*---------------|FIM CONTATO SITE|------------------*/	

/*---------------|ALTERAÇÃO DE MENSAGEN LIDA|-----------------------------*\
	| Author: 	Cleber Marrara Prado 								|
	| Version: 	1.0 												|
	| Email: 	cleber.marrara.prado@gmail.com 						|
	| Date: 														|
	| Alteração - Cleber Marrara Prado - 07/03/2016  				|
	| Botao para alterar ou caastrar os dados do usuário			|
	\*-------------------------------------------------------------*/


if($acao == "Ler_msn"){

	
	//echo $arr_habil;
	$dados["mail_statusId"] 		    = "2";
	
	
	$whr = "mail_Id =".$mail_Id;   
	
	if(!$rs->Altera($dados, "sys_mail",$whr)){
			$resul["status"] = "OK";
	        $resul["mensagem"] = "Dados Alterados!";
	        $resul["sql"] = $rs->sql;
	    } else {
			$resul["status"] = "ERRO";
	        $resul["mensagem"] = "Falha no envio";
	        $resul["sql"] = $rs->sql;
	    }
	 
	echo json_encode($resul);
	exit;
}
/*---------------|FIM ALTERAÇÃO DE MENSAGEN LIDA|-----------------------------*\|------------------*/	

/*---------------|FIM DA FUNCAO|------------------*/		