<?php
require_once("../class/class.functions.php");
require_once("../model/recordset.php");
	$rs = new recordset();
	$func 	= new functions();
	/*echo "<pre>";
	print_r($_GET);
	echo "</pre>";*/ 
	extract($_GET);
	$filtro='';
	$campo = "solic_data";

	$sql = "SELECT * FROM ".$tabela."  a		
			JOIN  at_usuarios      b ON a.solic_usuId    = b.usu_id 
			JOIN  sys_usuarios     c ON a.solic_usucad   = c.usu_cod
			JOIN  at_equipamentos  d ON a.solic_eqId     = d.eq_id
			JOIN  eq_tipo          e ON a.solic_eqtipoId = e.tipo_id
			JOIN  eq_marca         f ON a.solic_marcId   = f.marc_id
			JOIN  at_empresas      g ON a.solic_empId    = g.emp_id 
			JOIN  at_departamentos h ON a.solic_dpId     = h.dp_id

			WHERE usu_id =".$usu ;   
		 
		
		if(isset($di) AND $di<>""){
		$sql.=" AND ".$campo." >='".$func->data_usa($di)." 00:00:00'";
		$filtro.= "Data Inicial: ".$di."<br>";
	}
	if(isset($df) AND $df<>""){
		$sql.=" AND ".$campo." <='".$func->data_usa($df)." 23:59:59'";
		$filtro.= "Data Final: ".$df."<br>";
	}	
		if(isset($ep)AND $df<>"" AND $di<>""){
		$empresa = $rs->pegar("emp_alias","at_empresas","emp_id = '".$ep."'");
		$depart = $rs->pegar("dp_nome","at_departamentos","dp_id = '".$dp."'");
		$usuario = $rs->pegar("at_usu_nome","at_usuarios","usu_id = '".$usu."'");
		$filtro.= "Empresa: ".$empresa."<br>";
		$filtro.= "Departamento: ".$depart."<br>";
		$filtro.= "Usu&aacute;rio: ".$usuario."<br>";
	}

	$sql.=" ORDER BY solic_data ASC  ";   
	$rs->FreeSql($sql); 
	while($rs->GeraDados()):    
	?>   
	<tr>
		<td><?=$rs->fld("emp_alias");?></td> 
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("at_usu_nome");?></td> 
		<td><?=$rs->fld("marc_nome");?></td>   
		<td><?=$rs->fld("eq_desc");?></td>        
		<td><?=$func->data_hbr($rs->fld("solic_data"));?></td>  	
		<td><?=$rs->fld("usu_nome");?></td> 
		<td><?=$rs->fld("solic_ticket");?></td>  
	</tr>
	<?php endwhile;
	echo "<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
	echo "<tr><td><address>".$filtro."</address></td></tr>";
	?>

	