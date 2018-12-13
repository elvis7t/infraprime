<?php
//----- Função de maquinas por empresa ----
$rs = new recordset();
$sql ="SELECT * FROM eq_manutencao
WHERE man_eqempId = 1" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$niff = $rs->linhas;

$sql ="SELECT * FROM eq_manutencao
WHERE man_eqempId = 2 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eovg = $rs->linhas;

$sql ="SELECT * FROM eq_manutencao
WHERE man_eqempId = 9 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$vug = $rs->linhas;

$sql ="SELECT * FROM eq_manutencao
WHERE man_eqempId = 8 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$lavras = $rs->linhas;

$sql ="SELECT * FROM eq_manutencao 
WHERE man_eqempId = 5 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$aruja = $rs->linhas;

$sql ="SELECT * FROM eq_manutencao 
WHERE man_eqempId = 6";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$abc = $rs->linhas;

$sql ="SELECT * FROM eq_manutencao 
WHERE man_eqempId = 4 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$campbus = $rs->linhas;

$sql ="SELECT * FROM eq_manutencao 
WHERE man_eqempId = 3 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$rapdo = $rs->linhas;


$sql ="SELECT * FROM eq_manutencao 
WHERE man_eqempId = 7 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$cisne= $rs->linhas;



//----- Fim da Função de maquinas por empresa ----	  			

//------funcao soma valores---------------

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = 1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $manniff = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = 2" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $maneovg = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = 9" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $manvug = $rs->fld("SUM(man_valor)"); }
   
$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = 8" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $manlavras = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = 6" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $manabc = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = 4" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $mancamp = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = 3" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $manrap = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = 5" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $manaruja = $rs->fld("SUM(man_valor)"); }

 
$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId = 7" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $mancisne = $rs->fld("SUM(man_valor)"); }

$total = $manniff + $maneovg + $manvug + $manlavras + $manabc + $mancamp + $manrap + $manaruja + $mancisne;

//------- fim da funcao soma--------///

//-------- FUNCAO PRESTADORAS POR Atendimento----

$sql ="SELECT * FROM eq_manutencao 	WHERE man_preId =  2"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$imasic = $rs->linhas; 
$sql ="SELECT * FROM eq_manutencao 	WHERE man_preId =  1"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$trix = $rs->linhas;  
 
$sql ="SELECT * FROM eq_manutencao 	WHERE man_preId =  3"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$luctel = $rs->linhas; 

$sql ="SELECT * FROM eq_manutencao 	WHERE man_preId =  4"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$dimep = $rs->linhas; 
//-----FIM DA FUCAO QUANTIDADE DE ATENDIMENTO POR PRESTADORA------\\\

//-------- FUNCAO PRESTADORAS POR VALOR----

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_preId = 1" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $trixvl = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_preId = 2" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $imasicvl = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_preId = 3" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $luctelvl = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_preId = 4" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $dimepvl = $rs->fld("SUM(man_valor)"); }


//-----FIM DA FUCAO SOMA VALOR PRESTADORA------\\\

//----- Função de sistema operacional ----

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$win786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$winxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$win10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$win764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$win81 = $rs->linhas;




//----- Fim da Função de sistema operacional ----\\\	

//----- FUNCAO DE S O POR EMPRESAS----\\
/*NIFF*/

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 and mq_empId =1" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Niffwin786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 and mq_empId =1";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Niffwinxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 and mq_empId =1";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Niffwin10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 and mq_empId =1";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Niffwin764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 and mq_empId =1";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$Niffwin81 = $rs->linhas;
/*FIM -NIFF*/

/*EOVG*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 and mq_empId =2" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Eovgwin786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 and mq_empId =2";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Eovgwinxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 and mq_empId =2";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Eovgwin10 = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 and mq_empId =2";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Eovgwin764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 and mq_empId =2";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$Eovgwin81 = $rs->linhas;
/*FIM - EOVG*/

/*RAPDO*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 and mq_empId =3" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Rpdowin786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 and mq_empId =3";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Rpdowinxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 and mq_empId =3";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Rpdowin10 = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 and mq_empId =3";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Rpdowin764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 and mq_empId =3";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$Rpdowin81 = $rs->linhas;
/*FIM - RAPDO*/

/*CAMPBUS*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 and mq_empId =4" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Campwin786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 and mq_empId =4";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Campwinxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 and mq_empId =4";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Campwin10 = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 and mq_empId =4";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Campwin764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 and mq_empId =4";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$Campwin81 = $rs->linhas;
/*FIM - CAMPBUS*/

/*ARUJA*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 and mq_empId =5" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Arujawin786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 and mq_empId =5";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Arujawinxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 and mq_empId =5";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Arujawin10 = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 and mq_empId =5";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Arujawin764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 and mq_empId =5";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$Arujawin81 = $rs->linhas;
/*FIM - ARUJA*/

/*ABC*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 and mq_empId =6" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$ABCwin786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 and mq_empId =6";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$ABCwinxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 and mq_empId =6";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$ABCwin10 = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 and mq_empId =6";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$ABCwin764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 and mq_empId =6";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$ABCwin81 = $rs->linhas;
/*FIM - ABC*/

/*CISNE*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 and mq_empId =7" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Cisnewin786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 and mq_empId =7";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Cisnewinxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 and mq_empId =7";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Cisnewin10 = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 and mq_empId =7";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Cisnewin764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 and mq_empId =7";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$Cisnewin81 = $rs->linhas;
/*FIM - CISNE*/

/*LAVRAS*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 and mq_empId =8" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Lavraswin786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 and mq_empId =8";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Lavraswinxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 and mq_empId =8";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Lavraswin10 = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 and mq_empId =8";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Lavraswin764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 and mq_empId =8";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$Lavraswin81 = $rs->linhas;
/*FIM - LAVRAS*/

/*VUG*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 and mq_empId =9" ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Vugwin786 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 and mq_empId =9";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Vugwinxp = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 and mq_empId =9";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Vugwin10 = $rs->linhas;
 
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 and mq_empId =9";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$Vugwin764 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 and mq_empId =9";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$Vugwin81 = $rs->linhas;
/*FIM - VUG*/

//----- FIM FUNCAO DE S O POR EMPRESAS ----\\\


// ------- QUANTIDADE DE MAQUINAS---------\\\
$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' ";
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$maquinas = $rs->linhas;  

///----------- FIM ----------------\\\\\\	


//----- Função de maquinas por empresa ----
$rs = new recordset();
$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=  1"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniff = $rs->linhas;  

$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=  2"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovg = $rs->linhas;  

$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=  3"; 
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqrapdo = $rs->linhas;  

$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=  4"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcamp= $rs->linhas;  

$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=  5"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqaruja = $rs->linhas; 

$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=  6"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabc = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=  7"; 
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqcisne = $rs->linhas; 
								
$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=  8"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavras = $rs->linhas; 

$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=  9"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvug = $rs->linhas; 
//----- Fim da Função de maquinas por empresa ----	  			



//----- Função de Equipamentos por empresa ----
$rs = new recordset();
$sql ="SELECT * FROM at_equipamentos
		WHERE eq_ativo = '1' AND eq_empId=  1"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqniff = $rs->linhas;  

$sql ="SELECT * FROM at_equipamentos
		WHERE eq_ativo = '1' AND eq_empId=  2"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqeovg = $rs->linhas;  

$sql ="SELECT * FROM at_equipamentos
		WHERE eq_ativo = '1' AND eq_empId=  3"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqrapdo = $rs->linhas;  

$sql ="SELECT * FROM at_equipamentos
		WHERE eq_ativo = '1' AND eq_empId=  4"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqcamp= $rs->linhas;  

$sql ="SELECT * FROM at_equipamentos
		WHERE eq_ativo = '1' AND eq_empId=  5"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqaruja = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
		WHERE eq_ativo = '1' AND eq_empId=  6"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqabc = $rs->linhas; 


$sql ="SELECT * FROM at_equipamentos
		WHERE eq_ativo = '1' AND eq_empId=  7"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqcisne = $rs->linhas; 
								
$sql ="SELECT * FROM at_equipamentos
		WHERE eq_ativo = '1' AND eq_empId=  8"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqlavras = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
		WHERE eq_ativo = '1' AND eq_empId=  9"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqvug = $rs->linhas; 
//----- Fim da Função de maquinas por empresa ----	  	


//--------FUNCAO INDEX-----------\\\

/* CLIENTES*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId=".$_SESSION['usu_empresa']; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$maquinaslocal = $rs->linhas;  

$sql ="SELECT * FROM at_empresas
WHERE emp_id=".$_SESSION['usu_empresa']; 
$rs->FreeSql($sql);
while($rs->GeraDados()){$empresas  = $rs->fld("emp_alias"); }

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo = '1' AND eq_empId=".$_SESSION['usu_empresa'];   
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$equipamentoslocal = $rs->linhas;     

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$_SESSION['usu_cod'];  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$atendimentos = $rs->linhas;     

$sql ="SELECT * FROM mq_manutencao
WHERE man_id <> 0" ;  
$rs->FreeSql($sql);  
while($rs->GeraDados()){ }
$atendimentostotais = $rs->linhas; 
				
$sql ="SELECT * FROM at_usuarios
WHERE usu_ativo = '1' AND usu_empId=".$_SESSION['usu_empresa']; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$usuarioslocal = $rs->linhas; 

$sql ="SELECT * FROM eq_solicitacao
WHERE solic_empId=".$_SESSION['usu_empresa']; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$soliclocal = $rs->linhas;     

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo = 1 AND eq_empId=".$_SESSION['usu_empresa']; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqdescartelocal = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = 1 AND mq_empId=".$_SESSION['usu_empresa'];  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqdescartelocal = $rs->linhas;      

$sql ="SELECT * FROM at_equipamentos
WHERE eq_desc = 'Monitor'
AND eq_ativo = '1'  
AND eq_usuId = 0  
AND eq_mqId  = 0
AND eq_empId =".$_SESSION['usu_empresa'];  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$monitorlocal = $rs->linhas; 

$sql ="SELECT * FROM at_equipamentos
WHERE eq_desc = 'Mouse'
AND eq_ativo = '1'  
AND eq_usuId = 0  
AND eq_mqId  = 0 
AND eq_empId =".$_SESSION['usu_empresa'];  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mouselocal = $rs->linhas;				


$sql ="SELECT * FROM at_equipamentos
WHERE eq_desc = 'Teclado'
AND eq_ativo = '1'  
AND eq_usuId = 0  
AND eq_mqId  = 0 
AND eq_empId =".$_SESSION['usu_empresa'];  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$tecladolocal = $rs->linhas; 

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1'  
AND mq_usuId = 0 
AND mq_empId =".$_SESSION['usu_empresa'];  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$maquinalocal = $rs->linhas; 

$sql ="SELECT * FROM mq_manutencao
WHERE man_ativo = '1'  AND man_mqempId =".$_SESSION['usu_empresa'];  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$manmqlocal = $rs->linhas;       

$sql ="SELECT * FROM eq_manutencao
WHERE man_ativo = '1'  AND man_eqempId =".$_SESSION['usu_empresa'];  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$maneqlocal = $rs->linhas;   

/* ----------FIM DA AREA DO CLIENTE ----------------------------*/ 

/*USUARIO + ADMIM*/   

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1'";
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$maquinas = $rs->linhas;  

$sql ="SELECT * FROM at_empresas
WHERE emp_id=".$_SESSION['usu_empresa']; 
$rs->FreeSql($sql);
while($rs->GeraDados()){$empresas  = $rs->fld("emp_alias"); }

$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo = '1'";   
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$equipamentos = $rs->linhas;

$sql ="SELECT * FROM mq_manutencao
WHERE man_usucad =".$_SESSION['usu_cod']; ;  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$atendimentos = $rs->linhas;

$sql ="SELECT * FROM at_usuarios
WHERE usu_ativo = '1'" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$usuarios = $rs->linhas; 

$sql ="SELECT * FROM eq_solicitacao
WHERE solic_id <> 0"; 
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$solic = $rs->linhas; 
// ------
$sql ="SELECT * FROM at_equipamentos
WHERE eq_ativo ='0' AND eq_statusId = 4 AND id_inst = 0";
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$eqdescarte = $rs->linhas;     


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '0' AND mq_statusId = 4 AND id_inst = 0";
$rs->FreeSql($sql);
while($rs->GeraDados()){ $rs->fld("mq_id");}
$mqdescarte = $rs->linhas;     
 
$descartetotal =$mqdescarte + $eqdescarte;
//-------
//-------

$sql ="SELECT SUM(mq_valor) FROM at_maquinas WHERE mq_ativo = '1'" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $mqvalor = $rs->fld("SUM(mq_valor)"); }


$sql ="SELECT SUM(eq_valor) FROM at_equipamentos WHERE eq_ativo = '1'" ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $eqvalor = $rs->fld("SUM(eq_valor)"); }
 

$valortotal = $mqvalor + $eqvalor;
//-------

$sql ="SELECT * FROM at_maquinas WHERE mq_ativo = '1' AND mq_osId = 2";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$xp = $rs->linhas;

$sql ="SELECT *
FROM at_equipamentos
WHERE eq_desc='Monitor' AND eq_ativo = '1'
AND eq_usuId = 0 
AND eq_mqId  = 0
AND (
eq_empId =1
OR eq_empId =2
OR eq_empId =9
); " ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$monitorre = $rs->linhas; 

$sql ="SELECT *
FROM at_equipamentos
WHERE eq_desc='Mouse' AND eq_ativo = '1'
AND eq_usuId = 0 
AND eq_mqId  = 0
AND (
eq_empId =1
OR eq_empId =2
OR eq_empId =9
); " ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mousere = $rs->linhas; 

$sql ="SELECT *
FROM at_equipamentos
WHERE eq_desc='Teclado' AND eq_ativo = '1'
AND eq_usuId = 0 
AND eq_mqId  = 0
AND ( 
eq_empId =1
OR eq_empId =2
OR eq_empId =9
); " ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$tecladore = $rs->linhas; 

$sql ="SELECT *
FROM at_equipamentos
WHERE eq_ativo = '1'
AND eq_usuId = 0 
AND eq_mqId  = 0 
AND (
eq_tipoId = 11
OR
eq_tipoId = 12
OR
eq_tipoId = 45
OR
eq_tipoId = 53
OR
eq_tipoId = 57
)
AND (
eq_empId =1
OR eq_empId =2
OR eq_empId =5
OR eq_empId =8
OR eq_empId =9
); " ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$radiore = $rs->linhas; 

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1'  AND mq_usuId = 0 
AND mq_usuId = 0 
AND (
mq_empId =1
OR mq_empId =2
OR mq_empId =9
); ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$maquinare = $rs->linhas; 

$sql ="SELECT *
FROM at_equipamentos
WHERE eq_desc='Telefone' AND eq_ativo = '1'
AND eq_usuId = 0 
AND eq_mqId  = 0
AND ( 
eq_empId =1
OR eq_empId =2
OR eq_empId =9
); " ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$telefonere = $rs->linhas; 


$sql ="SELECT * FROM mq_manutencao
WHERE man_ativo = '1'  
AND (
man_mqempId = 1
OR man_mqempId = 2
OR man_mqempId = 8
OR man_mqempId = 5
OR man_mqempId = 9 
); ";
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$manmq = $rs->linhas;

$sql ="SELECT * FROM eq_manutencao
WHERE man_ativo = '1'   " ;     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$maneq = $rs->linhas;
/* ----------FIM DA FUNCAO INDEX ----------------------------*/ 


/* ----------FUNCAO MAQUINAS POR ANO ----------------------------*/ 

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano3 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano = $rs->linhas;
/* ----------FIM DE MAQUINAS POR ANO ----------------------------*/ 


////* ----------FUNCAO MAQUINAS POR ANO E POR EMPRESA----------------------------*/ 

/// NIFF
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_ativo = '1' AND mq_empId = 1 and YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano3 = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqniffano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND mq_empId = 1 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffano = $rs->linhas;
//FIM NIFF

/// EOVG
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgano3 = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqeovgano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND mq_empId = 2 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqeovgano = $rs->linhas;
//FIM EOVG

/// VUG
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano3 = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqvugano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND mq_empId = 9 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugano = $rs->linhas;
//FIM VUG

/// ARUJA*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasano3 = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqlavrasano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$mqlavrasano = $rs->linhas;
//FIM LAVRAS*/

/// NIFF ARUJA*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano3 = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqarujaano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND mq_empId = 8 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujaano = $rs->linhas; 
//FIM ARUJA*/

/// ABC*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano3 = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqabcano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND mq_empId = 6 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcano = $rs->linhas;
//FIM ABC*/

/// CAMPBUS*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano3 = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqcampano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND mq_empId = 4 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampano = $rs->linhas;
//FIM CAMPBUS*/ 

/// RAPDO*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano3 = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqrapdoano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND mq_empId = 3 and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdoano = $rs->linhas; 
//FIM RAPDO*/

/// CISNE*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano10 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano9 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano8 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano7 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano6 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano5 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano4 = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano3 = $rs->linhas; 


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano2 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)";     
$rs->FreeSql($sql); 
while($rs->GeraDados()){ }
$mqcisneano1 = $rs->linhas;

$sql ="SELECT * FROM at_maquinas 
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisneano = $rs->linhas;
//FIM CISNE*/

/* ----------FIM DE MAQUINAS POR ANO ----------------------------*/ 


/* ----------FUNCAO TOTAL DE MAQUINAS POR GARANTIA ----------------------------*/ 

//SEM*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqtotalsemgar  = $rs->linhas;

//COM*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqtotalgar = $rs->linhas;

/* ---------- FIM FUNCAO TOTAL DE MAQUINAS POR GARANTIA ----------------------------*/ 



/* ----------FUNCAO TOTAL DE MAQUINAS POR GARANTIA E POR EMPRESA----------------------------*/ 


//NIFF*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1  and  YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqniffsemgar  = $rs->linhas;
 

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 1  and  YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$mqniffgar = $rs->linhas;
//FIM NIFF*/

//EOVG*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2  and  YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovgsemgar  = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 2  and  YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqeovggar = $rs->linhas;
//FIM EOVG*/

//VUG*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9  and  YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvugsemgar  = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 9  and  YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqvuggar = $rs->linhas;
//FIM VUG*/

//LAVRAS*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8  and  YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrassemgar  = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 8  and  YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqlavrasgar = $rs->linhas;
//FIM LAVRAS*/

//ARUJA*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5  and  YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujasemgar  = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 5  and  YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqarujagar = $rs->linhas;
//FIM ARUJA*/

//ABC*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6  and  YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcsemgar  = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 6  and  YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqabcgar = $rs->linhas;
//FIM ABC*/

//CAMPBUS*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4  and  YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampsemgar  = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 4  and  YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcampgar = $rs->linhas;
//FIM CAMPBUS*/

//RAPDO*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdosemgar  = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 3  and  YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqrapdogar = $rs->linhas;
//FIM RAPDO*/

//CISNE*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisnesemgar  = $rs->linhas;


$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_empId = 7  and  YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqcisnegar = $rs->linhas;
//FIM CISNE*/

/* ----------FUNCAO TOTAL DE MAQUINAS POR GARANTIA E POR EMPRESA----------------------------*/



/*------------GRAFICOS LOCAIS----------------------- */

/* ----------FUNCAO MAQUINAS POR ANO LOCAL ----------------------------*/ 

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -10)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano10local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -9)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano9local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -8)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano8local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -7)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano7local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -6)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano6local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -5)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano5local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -4)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$mqano4local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -3)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano3local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -2)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano2local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) -1)AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqano1local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR( mq_datacad ) = (SELECT EXTRACT(YEAR FROM CURDATE()) )AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqanolocal = $rs->linhas;
/*-----------------FIM DE FUNCAO MAQUINAS POR ANO LOCAL------------------------------------------*/


/*------------  QUANTIDADE DE MAQUINAS LOCAIS-----------------------*/  


$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$maquinas_local = $rs->linhas;  
/*-----------------FIM DE QUANTIDADE DE MAQUINAS LOCAIS------------------------------------------*/

/*------------  EMPRESA LOCAL -----------------------*/  

$sql ="SELECT * FROM at_empresas
		WHERE emp_Id=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ $empresa_local = $rs->fld("emp_nome");   }
/*-----------------FIM EMPRESA LOCA------------------------------------------*/


/* ----------FUNCAO TOTAL DE MAQUINAS POR GARANTIA LOCAL----------------------------*/ 

//SEM*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR(mq_datagar) < YEAR(CURDATE( )) AND mq_empId=".$_SESSION['usu_empresa'] ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqtotalsemgarlocal  = $rs->linhas;

//COM*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND YEAR(mq_datagar) >= YEAR(CURDATE( )) AND mq_empId=".$_SESSION['usu_empresa'];     
$rs->FreeSql($sql);
while($rs->GeraDados()){ } 
$mqtotalgarlocal = $rs->linhas;
 
/* ---------- FIM FUNCAO TOTAL DE MAQUINAS POR GARANTIA LOCAL ----------------------------*/ 

//-------- FUNCAO PRESTADORAS POR VALOR LOCAL----

$sql ="SELECT * FROM eq_manutencao 	WHERE man_preId =  2 AND man_eqempId=".$_SESSION['usu_empresa'] ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$imasiclocal = $rs->linhas; 


$sql ="SELECT * FROM eq_manutencao 	WHERE man_preId =  1 AND man_eqempId=".$_SESSION['usu_empresa'] ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$trixlocal = $rs->linhas; 

$sql ="SELECT * FROM eq_manutencao 	WHERE man_preId =  3 AND man_eqempId=".$_SESSION['usu_empresa'] ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$luctellocal = $rs->linhas; 

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_eqempId=".$_SESSION['usu_empresa'] ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $totallc = $rs->fld("SUM(man_valor)"); }
$totallocal = $totallc;

//-----FIM DA FUCAO SOMA VALOR PRESTADORA LOCAL------\\\

//-------- FUNCAO PRESTADORAS POR VALOR LOCAL----\\\

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_preId = 1 AND man_eqempId=".$_SESSION['usu_empresa'] ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $trixvllocal = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_preId = 2 AND man_eqempId=".$_SESSION['usu_empresa'] ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $imasicvllocal = $rs->fld("SUM(man_valor)"); }

$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_preId = 3 AND man_eqempId=".$_SESSION['usu_empresa'] ;
$rs->FreeSql($sql);
while($rs->GeraDados()){ $luctelvllocal = $rs->fld("SUM(man_valor)"); }


//-----FIM DA FUCAO SOMA VALOR PRESTADORA LOCAL------\\\

//----- Função de sistema operacional ----

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 1 AND mq_empId=".$_SESSION['usu_empresa'];  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$win786local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 2 AND mq_empId=".$_SESSION['usu_empresa'];
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$winxplocal = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 7 AND mq_empId=".$_SESSION['usu_empresa'];
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$win10local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 4 AND mq_empId=".$_SESSION['usu_empresa'];
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$win764local = $rs->linhas;

$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 6 AND mq_empId=".$_SESSION['usu_empresa'];
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$win81local = $rs->linhas; 




//----- Fim da Função de sistema operacional ----\\\	

 

//------------ FIM DA FUNCAO -------------\\\\

?>

