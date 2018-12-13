<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql ="	SELECT * FROM at_usuarios a
		JOIN at_empresas b ON a.usu_empId = b.emp_id 
		JOIN at_departamentos c ON a.usu_dpId = c.dp_id
		WHERE usu_ativo <> 1 AND usu_empId=".$_SESSION['usu_empresa'];
		$rs->FreeSql($sql);
		
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Usu&aacute;rio...</td></tr>"; 
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("usu_id");?></td>
		<td><?=$rs->fld("emp_nome");?></td> 
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("at_usu_nome");?></td>
	<td> 
			<div class="button-group">
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar Usu&aacute;rio' a href="at_alt_Usulocal.php?token=<?=$_SESSION['token']?>&acao=N&usuid=<?=$rs->fld('usu_id');?>"><i class="fa fa-pencil"></i></a>
				<a 	class="btn btn-sm btn-warning" data-toggle='tooltip' data-placement='bottom' title='Detalhes' a href="at_ver_Usulocal.php?token=<?=$_SESSION['token']?>&acao=N&usuid=<?=$rs->fld('usu_id');?>"><i class="fa fa-search"></i></a>  
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("dp_id");?>,"exc_Usu","o item");'><i class="fa fa-trash"></i></a> -->
			</div>
		</td> 
		
	</tr>	 
<?php } 
endif;
?>