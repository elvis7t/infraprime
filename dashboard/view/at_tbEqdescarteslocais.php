<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();
$sql ="	SELECT *
FROM at_equipamentos a
JOIN at_empresas b ON a.eq_empId = b.emp_id
JOIN eq_marca c ON a.eq_marcId = c.marc_id
JOIN sys_usuarios d ON a.eq_usudes = d.usu_cod
JOIN eq_tipo e ON a.eq_tipoId = e.tipo_id
WHERE eq_ativo = '0' AND id_inst = '0' AND eq_empId=".$_SESSION['usu_empresa']; 
		$rs->FreeSql($sql);
		 
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Equipamento...</td></tr>";  
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?> 
	<tr>
		<td><input type="checkbox" id="emp_cods" name="emp_cods[]" value="<?=$rs->fld("eq_id");?>" /></td>
		<td><?=$rs->fld("eq_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("tipo_desc");?></td>
		<td><?=$rs->fld("marc_nome");?></td>
		<td><?=$rs->fld("eq_modelo");?></td>		
		<td><?=$rs->fld("eq_desc");?></td> 
		<td><?=$fn->data_hbr($rs->fld("eq_datades"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td>
		
	<td>   
			<div class="button-group">  
				
				 
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("eq_id");?>,"exc_Eq","o item");'><i class="fa fa-trash"></i></a> -->
				<a 	class="btn btn-xs btn-danger" data-toggle='tooltip' data-placement='bottom' title='Detalhes'  a href="at_ver_Eqdescartelocal.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$rs->fld('eq_id');?>"><i class="fa fa-thumbs-down"></i></a> 
				
			</div>  
		</td> 
		
	</tr>	
<?php }
endif; 
?>

<script>
// Atualizar a cada 10 segundos
	 
	

	

</script>