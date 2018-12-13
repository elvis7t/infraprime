<?php
	require_once("../model/recordset.php");
	$rs = new recordset();
	$sql ="SELECT * FROM eq_tipo a
			JOIN at_empresas b ON a.tipo_empId = b.emp_id
			WHERE tipo_empId=".$_SESSION['usu_empresa'];
	$rs->FreeSql($sql);
	if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Tipo...</td></tr>";
	else:  
	while($rs->GeraDados()){ ?> 
		<tr>
				<td><?=$rs->fld("tipo_id");?></td>
				<td><?=$rs->fld("emp_nome");?></td>
				<td><?=$rs->fld("tipo_desc");?></td>    
			<td>
				<div class="button-group">
					<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar' a href="at_alt_Eqtipolocal.php?token=<?=$_SESSION['token']?>&acao=N&tipoid=<?=$rs->fld('tipo_id');?>"><i class="fa fa-pencil"></i></a>
					<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("tipo_id");?>,"exc_Eqtipo","o item");'><i class="fa fa-trash"></i></a>-->
				</div>
			</td> 
			
		</tr>	  
<?php 
  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Cadastradas</strong></td></tr>";   
endif;
?>      