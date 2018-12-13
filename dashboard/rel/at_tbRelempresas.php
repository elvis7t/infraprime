<?php
require_once("../model/recordset.php");
$rs = new recordset();
$sql ="SELECT * FROM at_empresas
		WHERE emp_id <> 0";  
$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Empresa...</td></tr>"; 
	else:
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("emp_id");?></td>
		<td><?=$rs->fld("emp_nome");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("emp_cnpj");?></td> 
		<td>
			<div class="button-group">
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='M&aacute;quinas ativas' a href="cabecario_rel_Mqempresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs->fld('emp_id');?>"><i class="fa fa-desktop"></i></a>
				<a 	class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Equipamentos Ativos' a href="cabecario_rel_Eqempresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs->fld('emp_id');?>"><i class="fa fa-keyboard-o"></i></a>
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='M&aacute;quinas descartadas' a href="cabecario_rel_Mqdes_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs->fld('emp_id');?>"><i class="fa fa-recycle"></i></a>
				<a 	class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Equipamentos descartados' a href="cabecario_rel_Eqdes_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs->fld('emp_id');?>"><i class="fa fa-recycle"></i></a>     
				<a 	class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='bottom' title='Manuten&ccedil;&atilde;o de equipamentos' a href="cabecario_rel_Eqman_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$rs->fld('emp_id');?>"><i class="fa fa-exclamation-triangle"></i></a>     
				
			</div>
		</td>    
		  
	</tr>	
<?php  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Empresas Cadastradas</strong></td></tr>";    
endif;
?>     