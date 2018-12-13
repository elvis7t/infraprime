<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions(); 
$rs = new recordset();									
$sql ="SELECT * FROM mq_emprestimo a
			JOIN at_empresas      b ON a.empre_usuempId    = b.emp_id 
			JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
			JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
			JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
		WHERE empre_mqId =".$mq_id;   
		$rs->FreeSql($sql);
		
if($rs->linhas==0): 
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum emprestimo...</td></tr>"; 
	else:
$rs->FreeSql($sql);	 
while($rs->GeraDados()){ ?>
	<tr> 
		<td><?=$rs->fld("empre_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("at_usu_nome");?></td> 
		<td><?=$fn->data_br($rs->fld("empre_datade"));?></td>  	
		<td><?=$fn->data_br($rs->fld("empre_dataate"));?></td>  	
		<td><?=$rs->fld("usu_nome");?></td> 
		<td><?=$rs->fld("empre_ticket");?></td>  
		
		
	</tr>	
<?php     
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Manuten&ccedil;&otilde;es</strong></td></tr>";    
endif;
?>   