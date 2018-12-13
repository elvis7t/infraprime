<?php
	require_once("../model/recordset.php");
	$rs = new recordset();
	$sql ="SELECT * FROM eq_modelo
			WHERE mod_id <> 0";
	$rs->FreeSql($sql);
	if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhuma Modelo...</td></tr>";
	else:  
	while($rs->GeraDados()){ ?> 
		<tr>
				<td><?=$rs->fld("mod_id");?></td>
				<td><?=$rs->fld("mod_desc");?></td>   
			<td>
				<div class="button-group">
					<a 	class="btn btn-xs btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar' a href="at_alt_Eqmodelo.php?token=<?=$_SESSION['token']?>&acao=N&modid=<?=$rs->fld('mod_id');?>"><i class="fa fa-pencil"></i></a>
					<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("mod_id");?>,"exc_Eqmodelo","o item");'><i class="fa fa-trash"></i></a>
				</div>
			</td> 
			
		</tr>	  
<?php 
  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Cadastradas</strong></td></tr>";   
endif;
?>      