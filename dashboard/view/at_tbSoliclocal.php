<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();									
$sql ="SELECT * FROM eq_solicitacao a
			JOIN  at_usuarios     b ON a.solic_usuId   = b.usu_id 
			JOIN  sys_usuarios    c ON a.solic_usucad  = c.usu_cod
			JOIN  at_equipamentos d ON a.solic_eqId    = d.eq_id
		WHERE usu_id =".$usuid;   
		$rs->FreeSql($sql);
		
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhuma Solicita&ccedil;&atilde;o...</td></tr>"; 
	else:
$rs->FreeSql($sql);	
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("solic_id");?></td>
		<td><?=$rs->fld("eq_desc");?></td>
		<td><?=$rs->fld("solic_desc");?></td>
		<td><?=$fn->data_hbr($rs->fld("solic_data"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td>
		<td><?=$rs->fld("solic_ticket");?></td>
	<td>     
			<div class="button-group">
				
				<a 	class="btn btn-xs btn-warning"
						data-toggle='tooltip' 
						data-placement='bottom'     
						title='Detalhes'
						a href="at_ver_Solicitacaolocal.php?token=<?=$_SESSION['token']?>&acao=N&solid=<?=$rs->fld('solic_id');?>"><i class="fa fa-bullhorn"></i> 
					</a>   
			</div>
		</td>	
		
		 
		   
	</tr>	
<?php    
}
echo "<tr><td colspan=7><strong>".$rs->linhas." Solicita&ccedil;&otilde;es</strong></td></tr>";    
endif;
?>   