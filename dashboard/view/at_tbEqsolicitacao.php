<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();
$sql ="	SELECT * FROM eq_solicitacao a
			JOIN at_empresas      b ON a.solic_empId    = b.emp_id 
			JOIN eq_tipo          c ON a.solic_eqtipoId = c.tipo_id
			JOIN eq_marca         d ON a.solic_marcId   = d.marc_id
			JOIN at_equipamentos  e ON a.solic_eqId     = e.eq_id
			JOIN at_departamentos f ON a.solic_dpId     = f.dp_id
			JOIN at_usuarios      g ON a.solic_usuId    = g.usu_id
			JOIN sys_usuarios     h ON a.solic_usucad   = h.usu_cod
			
		WHERE solic_id <> 0";
		$rs->FreeSql($sql);
		
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhuma Solicita&ccedil;&atilde;o...</td></tr>"; 
	else:
$rs->FreeSql($sql); 
while($rs->GeraDados()){ ?> 
	<tr> 
		<td><?=$rs->fld("solic_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("marc_nome");?></td>
		<td><?=$rs->fld("eq_desc");?></td>  
		<td><?=$rs->fld("eq_modelo");?></td>  
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("at_usu_nome");?></td>
		<td><?=$fn->data_hbr($rs->fld("solic_data"));?></td>  	
		<td><?=$rs->fld("usu_nome");?></td> 
		<td><?=$rs->fld("solic_ticket");?></td>  
		<td>     
			<div class="button-group">
				<a 	class="btn btn-xs btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar' a href="at_alt_Sol.php?token=<?=$_SESSION['token']?>&acao=N&solid=<?=$rs->fld('solic_id');?>"><i class="fa fa-pencil"></i></a>
				<a 	class="btn btn-xs btn-warning"
						data-toggle='tooltip' 
						data-placement='bottom'     
						title='Detalhes'
						a href="at_ver_Solicitacao.php?token=<?=$_SESSION['token']?>&acao=N&solid=<?=$rs->fld('solic_id');?>"><i class="fa fa-search"></i> 
					</a>   
			</div>
		</td> 
		
	</tr>	
<?php }
endif; 
?> 