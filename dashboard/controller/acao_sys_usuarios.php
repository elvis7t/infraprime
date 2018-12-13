<?php

$rs = new recordset();

//----- ELVIS ----
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod =1";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$elvis_id = $rs->fld("usu_cod");
$elvis = $rs->fld("usu_nome");
$elvis_empId = $rs->fld("usu_empId");				
$foto_elvis = $hosted."/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas 
WHERE emp_id =".$elvis_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$elvis_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$elvis_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_elvis = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND  ( 
				mq_empId =1

				OR mq_empId =2

				OR mq_empId =9

				)";
				   
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$mq_elvis = $rs->linhas; 
 
$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND ( 
				eq_empId =1

				OR eq_empId =2

				OR eq_empId =9

				)";
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_elvis = $rs->linhas; 
/* ----------FIM ELVIS----------------------------*/ 

/* -----------ANDERSON----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod =2";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$anderson_id = $rs->fld("usu_cod");
$anderson = $rs->fld("usu_nome");
$anderson_empId = $rs->fld("usu_empId");				
$foto_anderson = $hosted."/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$anderson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$anderson_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$anderson_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_anderson = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND mq_empId =".$anderson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$mq_anderson = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND eq_empId =".$anderson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_anderson = $rs->linhas; 

 /* ----------FIM ANDERSON----------------------*/


/* -----------PETERRSON----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod =3";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$peterson_id = $rs->fld("usu_cod");
$peterson = $rs->fld("usu_nome");
$peterson_empId = $rs->fld("usu_empId");				
$foto_peterson = $hosted."/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$peterson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$peterson_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$peterson_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_peterson = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND mq_empId =".$peterson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_peterson = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND eq_empId =".$peterson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_peterson = $rs->linhas; 

 /* ----------FIM PETERRSON----------------------*/

/* -----------MATIAS----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod =4";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$matias_id = $rs->fld("usu_cod");
$matias = $rs->fld("usu_nome"); 
$matias_empId = $rs->fld("usu_empId");				
$foto_matias = $hosted."/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$matias_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$matias_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$matias_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_matias = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId =".$matias_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_matias = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo = '1' AND eq_empId =".$matias_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_matias = $rs->linhas; 

 /* ----------FIM MATIAS----------------------*/


 /* -----------FERNANDO----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod = 5";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$fernando_id = $rs->fld("usu_cod");
$fernando = $rs->fld("usu_nome");
$fernando_empId = $rs->fld("usu_empId");				
$foto_fernando = $hosted."/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$fernando_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$fernando_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$fernando_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_fernando = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND mq_empId =".$fernando_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_fernando = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND eq_empId =".$fernando_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_fernando = $rs->linhas; 

 /* ----------FIM FERNANDO----------------------*/

 /* -----------WILSON----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod = 6";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$wilson_id = $rs->fld("usu_cod");
$wilson = $rs->fld("usu_nome");
$wilson_empId = $rs->fld("usu_empId");				
$foto_wilson = $hosted."/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$wilson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$wilson_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$wilson_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_wilson = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND mq_empId =".$wilson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_wilson = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND eq_empId =".$wilson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_wilson = $rs->linhas; 

 /* ----------FIM WILSON----------------------*/

 /* -----------EMERSON----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod = 7";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$emerson_id = $rs->fld("usu_cod");
$emerson = $rs->fld("usu_nome");
$emerson_empId = $rs->fld("usu_empId");				
$foto_emerson = $hosted."/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$emerson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$emerson_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$emerson_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_emerson = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND mq_empId =".$emerson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_emerson = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND eq_empId =".$emerson_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_emerson = $rs->linhas; 

 /* ----------FIM EMERSON----------------------*/

 /* -----------VALMAR----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod = 8";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$valmar_id = $rs->fld("usu_cod");
$valmar = $rs->fld("usu_nome");
$valmar_empId = $rs->fld("usu_empId");				
$foto_valmar = $hosted."/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$valmar_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$valmar_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$valmar_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_valmar = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND mq_empId =".$valmar_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_valmar = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND eq_empId =".$valmar_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_valmar = $rs->linhas; 

 /* ----------FIM VALMAR----------------------*/
 
 /* -----------ANDRE----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod = 10";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$andre_id = $rs->fld("usu_cod");
$andre = $rs->fld("usu_nome");
$andre_empId = $rs->fld("usu_empId");				
$foto_andre = $hosted."/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$andre_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$andre_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$andre_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_andre = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND mq_empId =".$andre_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_andre = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND eq_empId =".$andre_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_andre = $rs->linhas; 

 /* ----------FIM ANDRE----------------------*/


//------------ FIM DA FUNCAO -------------\\\\

?>

