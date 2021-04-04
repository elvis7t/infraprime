<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php"); 
$rs = new recordset();
$sql ="SELECT * FROM sr_servico a
		JOIN at_maquinas   b ON a.servico_servidorId  = b.mq_id 
		WHERE servico_id <> 0";
		$rs->FreeSql($sql);		 
	if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Servi&ccedil;o...</td></tr>"; 
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?> 
	<tr>
		<td><?=$rs->fld("servico_id");?></td>
		<td><?=$rs->fld("servico_desc");?></td>
		<td><?=$rs->fld("servico_versao");?></td>
		<td><?=$rs->fld("mq_nome");?></td> 
		<td><?=$rs->fld("servico_licenca");?></td>		
		<td>
			<a 	class="btn btn-xs btn-info" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_servico.php?token=<?=$_SESSION['token']?>&acao=N&srvcid=<?=$rs->fld('servico_id');?>"><i class="fa fa-dashboard"></i></a>
		</td>	
	</tr>	
<?php }
endif; 
?> 
