<?php
require_once("../model/recordset.php");
$rs = new recordset();

if($_SESSION['usu_empresa']==1):

$sql ="SELECT * FROM at_departamentos a
		JOIN at_empresas b ON b.emp_id = a.dp_empId
		WHERE  dp_empId =1 OR  dp_empId =7";
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
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar Departamento' a href="at_alt_Dppessoal.php?token=<?=$_SESSION['token']?>&acao=N&dpid=<?=$rs->fld('dp_id');?>"><i class="fa fa-pencil"></i></a>
			</div>
		</td> 
		
	</tr>	
<?php  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Departamentos Cadastrados</strong></td></tr>";    
 
endif;  
endif;?>  

<?php


if($_SESSION['usu_empresa']==3):

$sql ="SELECT * FROM at_departamentos a
		JOIN at_empresas b ON b.emp_id = a.dp_empId
		WHERE  dp_empId =3 OR dp_empId =11 OR  dp_empId =12";
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
				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar Departamento' a href="at_alt_Dppessoal.php?token=<?=$_SESSION['token']?>&acao=N&dpid=<?=$rs->fld('dp_id');?>"><i class="fa fa-pencil"></i></a>				
			</div>
		</td> 
		
	</tr>	
<?php  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Departamentos Cadastrados</strong></td></tr>";    
 
endif;  
endif;?> 