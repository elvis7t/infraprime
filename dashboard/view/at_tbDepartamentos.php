<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql ="SELECT * FROM at_departamentos a
		JOIN at_empresas b ON b.emp_id = a.dp_empId
		WHERE dp_id <> 0";
		$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Departamento...</td></tr>"; 
	else:

$rs->FreeSql($sql);
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("dp_id");?></td>
		<td><?=$rs->fld("emp_nome");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td>
			<div class="button-group">
				<a 	class="btn btn-xs btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar Departamento' a href="at_alt_Dp.php?token=<?=$_SESSION['token']?>&acao=N&dpid=<?=$rs->fld('dp_id');?>"><i class="fa fa-pencil"></i></a>
				<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("dp_id");?>,"exc_Dp","o item");'><i class="fa fa-trash"></i></a> 
			</div>
		</td> 
		
	</tr>	
<?php  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Departamentos Cadastrados</strong></td></tr>";    
endif;
?>  