<?php
//----- Função de maquinas por empresa ----


// ------- QUANTIDADE DE SERVIDORES TOTAIS---------\\\
$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND  mq_tipoId IN  ('10','51','84','85','86','87') ";
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$servidor = $rs->linhas;  

///----------- FIM ----------------\\\\\\	

// ------- QUANTIDADE DE SERVIDORES Virtuais---------\\\
$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND  mq_servtp = 'v' AND mq_tipoId IN  ('10','51','84','85','86','87') ";
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$servidorvirtual = $rs->linhas;  

///----------- FIM ----------------\\\\\\	

// ------- QUANTIDADE DE SERVIDORES FISICOS---------\\\
$sql ="SELECT * FROM at_maquinas
		WHERE mq_ativo = '1' AND  mq_servtp = 'F' AND mq_tipoId IN  ('10','51','84','85','86','87') ";
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$servidorfisico = $rs->linhas;  

///----------- FIM ----------------\\\\\\	

// ------- QUANTIDADE DE SERVIDORES FORA DA GARANTIA---------\\\
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_servtp ='f' AND mq_tipoId   IN  ('10','51','84','85','86','87') AND YEAR(mq_datagar) < YEAR(CURDATE( ))";   
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$servidorsemgar = $rs->linhas;  

///----------- FIM ----------------\\\\\\	

// ------- QUANTIDADE DE WINDOWS SERVER---------\\\
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId IN  ('5','10','11','12')";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$windowsserver = $rs->linhas;  

///----------- FIM ----------------\\\\\\	

// ------- QUANTIDADE DE Linux---------\\\
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 9 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$linux = $rs->linhas;  

///----------- FIM ----------------\\\\\\	

// ------- QUANTIDADE DE SERVIDORES EM CLUSTER---------\\\
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_servtp ='v' AND mq_servcluster ='1' AND mq_tipoId   IN  ('10','51','84','85','86','87')";   
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$incluster = $rs->linhas;  

///----------- FIM ----------------\\\\\\	

// ------- QUANTIDADE DE EINDOWS SERVER 2008---------\\\
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_osId = 10 ";  
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$win2008 = $rs->linhas;  
///----------- FIM ----------------\\\\\\	

/* ----------FUNCAO TOTAL DE SERVIDORES POR GARANTIA ----------------------------*/ 

//SEM*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_servtp ='f' AND  mq_tipoId   IN  ('10','51','84','85','86','87') AND YEAR(mq_datagar) < YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqtotalsemgar  = $rs->linhas;

//COM*/
$sql ="SELECT * FROM at_maquinas
WHERE mq_ativo = '1' AND mq_servtp ='f' AND  mq_tipoId   IN  ('10','51','84','85','86','87') AND YEAR(mq_datagar) >= YEAR(CURDATE( ))";     
$rs->FreeSql($sql);
while($rs->GeraDados()){ }
$mqtotalgar = $rs->linhas;

///----------- FIM ----------------\\\\\\	

//------------ FIM DA FUNCAO -------------\\\\

?>

