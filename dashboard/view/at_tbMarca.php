<?php
	require_once("../model/recordset.php");
	$rs = new recordset();
	$sql ="SELECT * FROM eq_marca a
		JOIN at_empresas b ON a.marc_empId = b.emp_id 
		JOIN eq_tipo c ON c.tipo_id = a.marc_tipoId
			WHERE marc_id <> 0";
	$rs->FreeSql($sql);
	if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhuma Marca...</td></tr>";
	else:  
	while($rs->GeraDados()){ ?> 
		<tr>
				<td><?=$rs->fld("marc_id");?></td>
				<td><?=$rs->fld("emp_nome");?></td>
				<td><?=$rs->fld("tipo_desc");?></td> 
				<td><?=$rs->fld("marc_nome");?></td>   
			<td>
				<div class="button-group">
					<a 	class="btn btn-xs btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar' a href="at_alt_Marca.php?token=<?=$_SESSION['token']?>&acao=N&marcid=<?=$rs->fld('marc_id');?>"><i class="fa fa-pencil"></i></a>
					<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("marc_id");?>,"exc_Marca","o item");'><i class="fa fa-trash"></i></a>
				</div>
			</td> 
			
		</tr>	  
<?php 

}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Cadastradas</strong></td></tr>";   
endif;
?>      