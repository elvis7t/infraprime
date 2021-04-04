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
				JOIN at_empresas b ON a.mq_empId = b.emp_id 
				JOIN mq_fabricante c ON a.mq_fabId = c.fab_id 
				JOIN sys_usuarios d ON a.mq_usucad = d.usu_cod 
				JOIN eq_tipo e ON a.mq_tipoId = e.tipo_id 
				JOIN at_status f ON a.mq_statusId = f.status_id 
				JOIN mq_os g ON a.mq_osId = g.os_id 							
				WHERE mq_ativo = '1' AND mq_tipoId  IN  ('10','51','84','85','86','87')"; 			
	$sql.=" ORDER BY emp_alias  "; 	
	
	$rs->FreeSql($sql); 	
	while($rs->GeraDados()):  	
	?>	
	<tr>	
		<td><?=$rs->fld("emp_alias");?></td>		
		<td><?=$rs->fld("mq_nome");?></td> 
		<td><?=$rs->fld("fab_nome");?></td>		
		<td><?=$rs->fld("mq_modelo");?></td>		
		<td><?=$rs->fld("os_desc");?></td>  		 
		<td><?php if($rs->fld("mq_servtp")==v ): ?>
			Virtual				
			<?php else: ?>
			Fisico					
			<?php endif; ?> 	
		</td> 
		<td><?php if($rs->fld("mq_licenca")==1 ): ?>
			OEM					
			<?php else: ?>
			Open					
			<?php endif; ?> 	
		</td>  
	</tr>								
<?php endwhile;
echo "<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
echo"<a id='bt_print' href='#' target='_blank' class='btn btn-sm btn-default'><i class='fa fa-print'></i> Imprimir</a>";							
	
									
//echo "<tr><td><address>".$filtro."</address></td></tr>";	
?>
	