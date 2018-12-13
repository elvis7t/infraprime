
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
				<a 	class="btn btn-md btn-primary" data-toggle='tooltip' data-placement='bottom' title='Manuten&ccedil;&atilde;o' a href="cabecario_rel_Manutencao.php?token=<?=$_SESSION['token']?>&acao=N&preid=<?=$rs->fld('pre_id');?>"><i class="fa fa-file-text-o"></i></a>
			</div>
		</td>   
		  
	</tr>	
<?php  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Empresas Cadastradas</strong></td></tr>";    
endif;
?>     