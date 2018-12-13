<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql ="SELECT * FROM mq_os
		WHERE os_id <> 0";  
$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Sistema...</td></tr>"; 
	else:
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("os_id");?></td>
		<td><?=$rs->fld("os_desc");?></td>
		<td><?=$rs->fld("os_versao");?></td>  
		
		<td>
			<div class="button-group">
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar' a href="at_alt_Oslocal.php?token=<?=$_SESSION['token']?>&acao=N&osid=<?=$rs->fld('os_id');?>"><i class="fa fa-pencil"></i></a>
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("os_id");?>,"exc_Os","o item");'><i class="fa fa-trash"></i></a> -->
			</div>
		</td> 
		  
	</tr>	
<?php  
}
echo "<tr><td colspan=7><strong>".$rs->linhas." Sistemas Cadastrados</strong></td></tr>";    
endif;
?> 