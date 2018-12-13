<?php
require_once("../class/class.functions.php");
require_once("../model/recordset.php");
error_reporting(E_ALL & E_NOTICE & E_WARNING);
session_start();

	$rs = new recordset();
	 
	$func 	= new functions();
	/*echo "<pre>";
	print_r($_GET);
	echo "</pre>";*/
	extract($_GET);
	$d1;
	$d2;
	
	$campo = "mq_datadoa";
	$filtro ="";
		if($di ==""){
		//$d1    = date('Y-m-d');	
		$filtro.= "Data Inicial: ".$di."<br>";
	}else{
		//$d1   = $func->data_usa($di);	
		$filtro.= "Data Inicial: ".$di."<br>";
		
	}
	if($df ==""){
		//$d2   = date('Y-m-d');	
		$filtro.= "Data Final: ".$df."<br>";
	}else{
		//$d2   = $func->data_usa($df);	
		$filtro.= "Data Final: ".$df."<br>";
		
	}
		

	
	$sql = "SELECT eq_id, emp_alias, tipo_desc, marc_nome, eq_modelo, eq_desc, status_desc, eq_datadoa, usu_nome
			FROM at_equipamentos a
			JOIN at_empresas b ON a.eq_empId = b.emp_id
			JOIN eq_marca c ON a.eq_marcId = c.marc_id
			JOIN sys_usuarios d ON a.eq_usudoa = d.usu_cod
			JOIN eq_tipo e ON a.eq_tipoId = e.tipo_id
			JOIN at_instituicoes f ON a.id_inst = f.inst_id
			JOIN at_status h ON a.eq_statusId = h.status_id

			WHERE eq_ativo = '0' AND id_inst =".$sel_inst." AND eq_datadoa >='".$func->data_usa($di)."'
			AND eq_datadoa <='".$func->data_usa($df)."' AND eq_empId=".$_SESSION['usu_empresa']."
			UNION ALL
			SELECT mq_id, emp_alias, tipo_desc, fab_nome, mq_modelo, mq_nome, status_desc, mq_datadoa, usu_nome
			FROM at_maquinas a
			JOIN at_empresas b ON a.mq_empId = b.emp_id
			JOIN mq_fabricante c ON a.mq_fabId = c.fab_id
			JOIN sys_usuarios d ON a.mq_usudoa = d.usu_cod
			JOIN eq_tipo e ON a.mq_tipoId = e.tipo_id
			JOIN at_instituicoes f ON a.id_inst = f.inst_id
			JOIN at_status h ON a.mq_statusId = h.status_id

			WHERE mq_ativo = '0' AND id_inst ='".$sel_inst."' AND mq_datadoa >=	'".$func->data_usa($di)."'
			AND mq_datadoa <='".$func->data_usa($df)."' AND mq_empId=".$_SESSION['usu_empresa'].""; 

	
	
	   
	
	
	$rs->FreeSql($sql); 
	
	while($rs->GeraDados()):    
	?>
	<tr> 
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("tipo_desc");?></td>
		<td><?=$rs->fld("marc_nome");?></td>
		<td><?=$rs->fld("eq_modelo");?></td>		
		<td><?=$rs->fld("eq_desc");?></td>
		<td><?=$func->data_br($rs->fld("eq_datadoa"));?></td>
		<td><?=$rs->fld("usu_nome");?></td>	 		
		<td><?=$rs->fld("status_desc");?></td>   
	</tr>
	<?php endwhile;
	echo "<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
	echo "<tr><td><address>".$filtro."</address></td></tr>";
	
    
	
	
	
	?>
	