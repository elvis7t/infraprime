<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();									
$sql ="SELECT * FROM mq_manutencao a
			JOIN  at_maquinas      b ON a.man_mqId   = b.mq_id 
			JOIN  sys_usuarios     d ON a.man_usucad  = d.usu_cod
			JOIN  at_usuarios      f ON a.man_mqusuId = f.usu_id
		WHERE mq_id =".$mqid;   
		$rs->FreeSql($sql);
		
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhuma Manuten&ccedil;&atilde;o...</td></tr>"; 
	else:
$rs->FreeSql($sql);	 
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("man_id");?></td>
		<td><?=$rs->fld("man_motivo");?></td>
		<!--<td><?=$rs->fld("usu_dpId");?></td>-->
		<td><?=$fn->data_br($rs->fld("man_dataida"));?></td>  
		<td><?=$fn->data_br($rs->fld("man_dataretorno"));?></td>  
		<td><?=$rs->fld("at_usu_nome");?></td>
		<td><?=$rs->fld("usu_nome");?></td>
		<td><?=$rs->fld("man_ticket");?></td>
		<td> 
		<div class="button-group">
			<?php 
					if($rs->fld("man_ativo")==0): ?>
					<a 	class="btn btn-xs btn-success" data-toggle='tooltip' data-placement='bottom' title='Encerrado'   a href="at_ver_ManutencaoMq.php?token=<?=$_SESSION['token']?>&acao=N&manid=<?=$rs->fld('man_id');?>"><i class="fa fa-thumbs-o-up"></i></a>
					
					<?php else: ?>
					<a 	class="btn btn-xs btn-warning" data-toggle='tooltip' data-placement='bottom' title='Aberto'  a href="at_ger_Manmq.php?token=<?=$_SESSION['token']?>&acao=N&manid=<?=$rs->fld('man_id');?>"><i class="fa fa-dashboard"></i></a>   
					
					<?php
					endif;
					?> 
			
			</div> 
		</td>
		 
		   
	</tr>	
<?php    
}
echo "<tr><td colspan=7><strong>".$rs->linhas." Manuten&ccedil;&otilde;es</strong></td></tr>";    
endif;
?>   