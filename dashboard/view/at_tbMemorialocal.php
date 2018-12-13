<?php
	require_once("../model/recordset.php");
	$rs = new recordset();
	$sql ="SELECT * FROM mq_memoria
			WHERE mem_id <> 0";
	$rs->FreeSql($sql);
	if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhuma M&eacute;moria...</td></tr>";
	else:  
	while($rs->GeraDados()){ ?> 
		<tr>
				<td><?=$rs->fld("mem_id");?></td>
				<td><?=$rs->fld("mem_tipo");?></td> 
				<td><?=$rs->fld("mem_cap");?></td>    
			<td>
				<div class="button-group">
					<!--<a 	class="btn btn-xs btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar' a href="at_alt_Fabri.php?token=<?=$_SESSION['token']?>&acao=N&fabid=<?=$rs->fld('fab_id');?>"><i class="fa fa-pencil"></i></a>
					<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("mem_id");?>,"exc_Men","o item");'><i class="fa fa-trash"></i></a>-->
				</div>
			</td> 
			
		</tr>	  
<?php 

}
echo "<tr><td colspan=7><strong>".$rs->linhas." Cadastradas</strong></td></tr>";   
endif;
?>      