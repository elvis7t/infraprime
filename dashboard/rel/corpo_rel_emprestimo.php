<?php
require_once("../class/class.functions.php");
require_once("../model/recordset.php");


	$rs = new recordset();
	 
	$func 	= new functions();
	/*echo "<pre>";
	print_r($_GET);
	echo "</pre>";*/
	extract($_GET);
	$campo = "empre_dataate";
	$filtro='';
	
	$sql = "SELECT * FROM ".$tabela."  a
			JOIN at_empresas      b ON a.empre_eqempId    = b.emp_id 
			JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
			JOIN eq_marca         d ON a.empre_eqmarcaId   = d.marc_id
			JOIN at_equipamentos  e ON a.empre_eqId     = e.eq_id
			JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
			JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
			JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
			
		WHERE empre_id <> 0"; 
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
		<td><?=$rs->fld("at_usu_nome");?></td> 
		<td><?=$rs->fld("marc_nome");?></td>
		<td><?=$rs->fld("eq_modelo");?></td>  
		<td><?=$rs->fld("eq_desc");?></td>  
		<td><?=$func->data_br($rs->fld("empre_datade"));?></td>  	
		<td><?=$func->data_br($rs->fld("empre_dataate"));?></td>  	
		<td><?=$rs->fld("usu_nome");?></td> 
		<td><?=$rs->fld("empre_ticket");?></td>  
	</tr>
	<?php endwhile;
	echo "<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
	echo "<tr><td><address>".$filtro."</address></td></tr>";

	
	?>
	