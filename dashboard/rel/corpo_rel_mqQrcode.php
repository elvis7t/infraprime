<?php
require_once("../class/class.functions.php");
require_once("../model/recordset.php");


	$rs = new recordset();
	
	$func 	= new functions();
	/*echo "<pre>";
	print_r($_GET);
	echo "</pre>";*/
	extract($_GET);
	
	
	$sql = "SELECT * FROM ".$tabela."   a
			JOIN at_empresas    	b ON a.mq_empId    = b.emp_id 
			JOIN mq_fabricante  	c ON a.mq_fabId    = c.fab_id
			JOIN sys_usuarios   	d ON a.mq_usucad   = d.usu_cod
			JOIN eq_tipo        	e ON a.mq_tipoId   = e.tipo_id
						 
		WHERE mq_ativo <> 1 ";  
	
	
	
	$sql.=" ORDER BY emp_alias  "; 
	
	
	
	$rs->FreeSql($sql); 
	
	while($rs->GeraDados()):  
	
	?>
	
	
	<tr>
		<td><?=$rs->fld("mq_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("fab_nome");?></td>
		<td><?=$rs->fld("tipo_desc");?></td>
		<td><?=$rs->fld("mq_modelo");?></td>
		<td><?=$rs->fld("mq_nome");?></td> 
		<td><img src="../images/qrcode_img/<?=$rs->fld("mq_id");?>mq.png" /></td>
		
	</tr>
	<?php endwhile;
	echo "<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
	//echo "<tr><td><address>".$filtro."</address></td></tr>";

	
	?>
	