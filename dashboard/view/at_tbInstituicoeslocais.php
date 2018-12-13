<?php
require_once("../model/recordset.php");
$rs = new recordset();
//$sql ="SELECT eq_id, eq_desc FROM at_equipamentos WHERE eq_empId = 1 UNION ALL SELECT mq_id, mq_nome FROM at_maquinas WHERE mq_empId = 1";  
$sql ="SELECT * FROM at_instituicoes 
		WHERE inst_id <> 0";  
$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Institui&ccedil;&atilde;o...</td></tr>"; 
	else:
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("inst_id");?></td>
		<td><?=$rs->fld("inst_nome");?></td>
		<td><?=$rs->fld("inst_alias");?></td>
		<td><?=$rs->fld("inst_cnpj");?></td>
		
		<td>
			<div class="button-group">
				<a 	class="btn btn-xs btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar ' a href="at_alt_Instlocal.php?token=<?=$_SESSION['token']?>&acao=N&instid=<?=$rs->fld('inst_id');?>"><i class="fa fa-pencil"></i></a>
				<a 	class="btn btn-xs btn-warning"
						data-toggle='tooltip' 
						data-placement='bottom'     
						title='Detalhes'
						a href="at_ver_Instituicaolocal.php?token=<?=$_SESSION['token']?>&acao=N&instid=<?=$rs->fld('inst_id');?>"><i class="fa fa-search"></i> 
					</a>
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("inst_id");?>,"exc_Pre","o item");'><i class="fa fa-trash"></i></a> -->
			</div>
		</td> 
		  
	</tr>	
<?php  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Empresas Cadastradas</strong></td></tr>";    
endif;
?> 