<?php
require_once("../class/class.functions.php");
require_once("../model/recordset.php");


	$rs = new recordset();
	 
	$func 	= new functions();
	/*echo "<pre>";
	print_r($_GET);
	echo "</pre>";*/ 
	extract($_GET);
	$campo = "comp_datacad";
	$filtro='';
	
	$sql = "SELECT * FROM ".$tabela."  a
			JOIN  at_departamentos   c ON a.comp_dpId  = c.dp_id 
			JOIN  sys_usuarios       d ON a.comp_usucad = d.usu_cod
			JOIN  at_empresas        e ON a.comp_empId = e.emp_id
			JOIN  comp_status        f ON a.comp_statusId = f.status_id
			
		WHERE comp_ativo<>1"; 
	if(isset($di) AND $di<>""){
		$sql.=" AND ".$campo." >='".$func->data_usa($di)." 00:00:00'";
		$filtro.= "Data Inicial: ".$di."<br>";
	}
	if(isset($df) AND $df<>""){
		$sql.=" AND ".$campo." <='".$func->data_usa($df)." 23:59:59'";
		$filtro.= "Data Final: ".$df."<br>";
	}
	
	
	$sql.=" ORDER BY emp_alias  ";   
	
	
	$rs->FreeSql($sql); 
	
	while($rs->GeraDados()):   
	?>
	<tr>
		  
		
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("comp_titulo");?></td>  
		<td><?=$func->data_br($rs->fld("comp_datacad"));?></td>  	
		<td><?=$rs->fld("usu_nome");?></td> 
		<td><p 	class="<?=$rs->fld("status_color");?>"><?=$rs->fld("status_desc");?></p></td>   
		<td><?=$func->formata_din($rs->fld("comp_valor"));?></td>  
	</tr> 
	<?php endwhile;
	echo "<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
	echo "<tr><td><address>".$filtro."</address></td></tr>";

	
	?>
	