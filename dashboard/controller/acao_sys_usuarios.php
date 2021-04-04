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
$foto_elvis = $hosted."/dashboard/".$rs->fld('usu_foto');
 
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
$foto_anderson = $hosted."/dashboard/".$rs->fld('usu_foto');
 
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
$foto_peterson = $hosted."/dashboard/".$rs->fld('usu_foto');
 
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

/* -----------GEOVANE----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod =17";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$geovane_id = $rs->fld("usu_cod");
$geovane = $rs->fld("usu_nome"); 
$geovane_empId = $rs->fld("usu_empId");				
$foto_geovane = $hosted."/dashboard/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$geovane_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$geovane_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$geovane_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_geovane = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId =".$geovane_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_geovane = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo = '1' AND eq_empId =".$geovane_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_geovane = $rs->linhas; 

 /* ----------FIM GEOVANE----------------------*/


 /* -----------FERNANDO----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod = 5";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$fernando_id = $rs->fld("usu_cod");
$fernando = $rs->fld("usu_nome");
$fernando_empId = $rs->fld("usu_empId");				
$foto_fernando = $hosted."/dashboard/".$rs->fld('usu_foto');
 
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

 /* -----------Nícolas----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod = 18";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$nicolas_id = $rs->fld("usu_cod");
$nicolas = $rs->fld("usu_nome");
$nicolas_empId = $rs->fld("usu_empId");				
$foto_nicolas = $hosted."/dashboard/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$nicolas_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$nicolas_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$nicolas_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_nicolas = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND mq_empId =".$nicolas_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_nicolas = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND eq_empId =".$nicolas_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_nicolas = $rs->linhas; 

 /* ----------FIM Nícolas----------------------*/

 /* -----------SIMONE----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod = 15";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$simone_id = $rs->fld("usu_cod");
$simone = $rs->fld("usu_nome");
$simone_empId = $rs->fld("usu_empId");				
$foto_simone = $hosted."/dashboard/".$rs->fld('usu_foto');
 
}

$sql ="SELECT * FROM at_empresas
WHERE emp_id =".$simone_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$simone_emp = $rs->fld("emp_alias");				
 
}

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$simone_id;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$at_simone = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo <> 1 AND mq_empId =".$simone_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){} 
$mq_simone = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo <> 1 AND eq_empId =".$simone_empId;  
$rs->FreeSql($sql);
while($rs->GeraDados()){}
$eq_simone = $rs->linhas; 

 /* ----------FIM SOMONE----------------------*/

 /* -----------VALMAR----------------------*/
$sql ="SELECT * FROM sys_usuarios
WHERE usu_cod = 8";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ 
$valmar_id = $rs->fld("usu_cod");
$valmar = $rs->fld("usu_nome");
$valmar_empId = $rs->fld("usu_empId");				
$foto_valmar = $hosted."/dashboard/".$rs->fld('usu_foto');
 
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
$foto_andre = $hosted."/dashboard/".$rs->fld('usu_foto');
 
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

