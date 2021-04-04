<?php
require_once("../model/recordset.php");
$rs = new recordset();

if($_SESSION['usu_empresa']==1):
$sql ="	SELECT * FROM at_usuarios a
		JOIN at_empresas b ON a.usu_empId = b.emp_id 
		JOIN at_departamentos c ON a.usu_dpId = c.dp_id
		WHERE usu_ativo = '1' AND (dp_empId =1 OR  dp_empId =7)";
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
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar Usu&aacute;rio' a href="at_alt_UsuDP.php?token=<?=$_SESSION['token']?>&acao=N&usuid=<?=$rs->fld('usu_id');?>"><i class="fa fa-pencil"></i></a>				
			</div>
		</td> 
		
	</tr>	 
<?php } 
endif;
endif;
?>

<?php
if($_SESSION['usu_empresa']==3):
$sql ="	SELECT * FROM at_usuarios a
		JOIN at_empresas b ON a.usu_empId = b.emp_id 
		JOIN at_departamentos c ON a.usu_dpId = c.dp_id
		WHERE usu_ativo = '1' AND (dp_empId =3 OR dp_empId =11 OR  dp_empId =12)";
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
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar Usu&aacute;rio' a href="at_alt_UsuDP.php?token=<?=$_SESSION['token']?>&acao=N&usuid=<?=$rs->fld('usu_id');?>"><i class="fa fa-pencil"></i></a>				
			</div>
		</td> 
		
	</tr>	 
<?php } 
endif;
endif;
?>