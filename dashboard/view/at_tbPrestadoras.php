<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql ="SELECT * FROM eq_prestadoras 
		WHERE pre_id <> 0";  
$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Empresa...</td></tr>"; 
	else:
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("pre_id");?></td>
		<td><?=$rs->fld("pre_nome");?></td>
		<td><?=$rs->fld("pre_alias");?></td>
		<td><?=$rs->fld("pre_cnpj");?></td>
		
		<td>
			<div class="button-group">
				<a 	class="btn btn-xs btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar ' a href="at_alt_Pre.php?token=<?=$_SESSION['token']?>&acao=N&preid=<?=$rs->fld('pre_id');?>"><i class="fa fa-pencil"></i></a>
				<a 	class="btn btn-xs btn-warning"
						data-toggle='tooltip' 
						data-placement='bottom'     
						title='Detalhes'
						a href="at_ver_Prestadora.php?token=<?=$_SESSION['token']?>&acao=N&preid=<?=$rs->fld('pre_id');?>"><i class="fa fa-search"></i> 
					</a>
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("pre_id");?>,"exc_Pre","o item");'><i class="fa fa-trash"></i></a> -->
			</div>
		</td> 
		  
	</tr>	
<?php  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Empresas Cadastradas</strong></td></tr>";    
endif;
?> 