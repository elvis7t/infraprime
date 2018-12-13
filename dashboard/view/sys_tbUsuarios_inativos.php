<?php
//require_once("../model/recordset.php");
//$rs = new recordset();
$sql ="SELECT * FROM sys_usuarios a
		JOIN sys_classe b ON a.usu_classe = b.classe_id
		JOIN at_empresas c ON a.usu_empId = c.emp_id
		JOIN at_departamentos d ON a.usu_dpId = d.dp_id
		WHERE usu_ativo = '0'";
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?>  
	<tr>
		<td><?=$rs->fld("usu_cod");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("usu_nome");?></td>
		<td><?=$rs->fld("classe_desc");?></td>
		<td> 
			<div class="button-group">
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar Usuário' a href="sys_alt_Usudes.php?token=<?=$_SESSION['token']?>&acao=N&usucod=<?=$rs->fld("usu_cod");?>"><i class="fa fa-pencil"></i></a>
				<button type="button" class="btn btn-sm btn-danger"  id="btn_excluir" data-toggle='tooltip' data-placement='bottom' title='Excluir'><i class="fa fa-trash"></i>  </button>  
			</div>   
		</td> 
		
	</tr>	
<?php }
?>