<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql ="SELECT * FROM mq_office
		WHERE office_id <> 0";  
$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Empresa...</td></tr>"; 
	else:
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("office_id");?></td>
		<td><?=$rs->fld("office_desc");?></td>
		<td><?=$rs->fld("office_versao");?></td>  
		<td>
			<div class="button-group">
				<a 	class="btn btn-xs btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar' a href="at_alt_Office.php?token=<?=$_SESSION['token']?>&acao=N&officeid=<?=$rs->fld('office_id');?>"><i class="fa fa-pencil"></i></a>
				<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("office_id");?>,"exc_Office","o item");'><i class="fa fa-trash"></i></a> 
			</div>
		</td> 
		  
	</tr>	
<?php  
}
echo "<tr><td colspan=7><strong>".$rs->linhas." Offices Cadastrados</strong></td></tr>";    
endif;
?> 