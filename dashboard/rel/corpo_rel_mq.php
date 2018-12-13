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
			JOIN at_status      	f ON a.mq_statusId = f.status_id
			JOIN mq_os              g ON a.mq_osId     = g.os_id
			JOIN at_usuarios        h ON a.mq_usuId    = h.usu_id
			JOIN at_departamentos	i ON a.mq_dpId     = i.dp_id
			JOIN mq_office			j ON a.mq_officeId = j.office_id
			
			 
		WHERE mq_ativo <> 1 ";  
	
	
	
	$sql.=" ORDER BY emp_alias  "; 
	
	
	
	$rs->FreeSql($sql); 
	
	while($rs->GeraDados()):  
	
	?>
	
	
	<tr>
		  
		
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("at_usu_nome");?></td>
		<td><?=$rs->fld("mq_nome");?></td> 
		<td><?=$rs->fld("fab_nome");?></td>
		<td><?=$rs->fld("tipo_desc");?></td>
		<td><?=$rs->fld("mq_modelo");?></td>
		<td><p 	class="<?=$rs->fld("status_color");?>"><i class="<?=$rs->fld("status_classe");?>"></i></p></td>
		<td><?=$rs->fld("os_desc");?></td>   
		<td><?=$rs->fld("office_desc");?></td>   
		<td><?=$func->data_br($rs->fld("mq_datacad"));?></td>  
		<td><?=$func->data_br($rs->fld("mq_datagar"));?></td> 
		<td><?php if($rs->fld("mq_licenca")==1 ): ?>
					OEM
					
					<?php else: ?>
					Open
					
					<?php
					endif;
					?> 	
		</td>  
	</tr>
	<?php endwhile;
	echo "<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
	//echo "<tr><td><address>".$filtro."</address></td></tr>";

	
	?>
	