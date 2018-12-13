<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions(); 
$rs = new recordset();		

$sql ="SELECT * FROM at_usu_termo_utilizacao A 
		JOIN at_usuarios B       ON B.usu_id  =  A.trm_usuId
		JOIN at_empresas C       ON C.emp_id  =  A.trm_usuempId
		JOIN at_departamentos D  ON D.dp_id   =  A.trm_usudpId
		JOIN eq_tipo E           ON E.tipo_Id =  A.trm_eqtipoId
		JOIN sys_usuarios F      ON F.usu_cod =  A.trm_usucad
		WHERE trm_usuempId =".$_SESSION['usu_empresa']; 
		$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Termo...</td></tr>"; 
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("trm_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("at_usu_nome");?></td>
		<td><?=$rs->fld("tipo_desc");?></td>
		<td><?=$rs->fld("usu_nome");?></td>
		<td><?=$rs->fld("trm_chamado");?></td>
		<td><?=$fn->data_hbr($rs->fld("trm_data"));?></td>  	
		<td>
			<div class="button-group">
			<?php 
					if($rs->fld("trm_eqtipoId")==12 or $rs->fld("trm_eqtipoId")==45 or $rs->fld("trm_eqtipoId")==45 or $rs->fld("trm_eqtipoId")==11): ?>
					<a 	class="btn btn-ms btn-primary" data-toggle='tooltip' data-placement='bottom' title='Ver termo' a href="at_ver_termo_Eqlocal.php?token=<?=$_SESSION['token']?>&acao=N&trmid=<?=$rs->fld('trm_id');?>"><i class="fa fa-mobile"></i></a>
					<?php else: ?>
					<a 	class="btn btn-ms btn-primary" data-toggle='tooltip' data-placement='bottom' title='Ver termo' a href="at_ver_termo_Mqlocal.php?token=<?=$_SESSION['token']?>&acao=N&trmid=<?=$rs->fld('trm_id');?>"><i class="fa fa-laptop"></i></a>
					<?php
					endif;
					?>
				
			</div>
		</td> 
	</tr>	
<?php  
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Departamentos Cadastrados</strong></td></tr>";    
endif;
?>  