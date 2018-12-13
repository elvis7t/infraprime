<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();									
$sql ="SELECT man_id, man_motivo, pre_alias, man_dataida, man_dataretorno,  man_os  FROM eq_manutencao a
			JOIN  at_equipamentos  b ON a.man_eqId   = b.eq_id 
			JOIN  eq_prestadoras   c ON a.man_preId  = c.pre_id 
			JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
		WHERE man_eqid =".$doacaoid."
		UNION ALL
		SELECT man_id, man_motivo, usu_nome, man_dataida, man_dataretorno,  man_ticket  FROM mq_manutencao a
			JOIN  at_maquinas b ON a.man_mqId   = b.mq_id 			
			JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
		WHERE man_mqid=".$doacaoid;
		
		
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
		<td><?=$rs->fld("pre_alias");?></td>
		<td><?=$fn->data_hbr($rs->fld("man_dataida"));?></td>  
		<td><?=$fn->data_hbr($rs->fld("man_dataretorno"));?></td>  
		<td><?=$rs->fld("man_os");?></td>		  
		<td> 
			<div class="button-group">
				<?php 
					if($rs->fld("man_ativo")==0): ?>
					<a 	class="btn btn-xs btn-success" data-toggle='tooltip' data-placement='bottom' title='Encerrado'   a href="at_ver_Manutencaolocal.php?token=<?=$_SESSION['token']?>&acao=N&manid=<?=$rs->fld('man_id');?>"><i class="fa fa-thumbs-o-up"></i></a>					
					<?php else: ?>
					<a 	class="btn btn-xs btn-warning" data-toggle='tooltip' data-placement='bottom' title='Aberto'  a href="at_ger_Manlocal.php?token=<?=$_SESSION['token']?>&acao=N&manid=<?=$rs->fld('man_id');?>"><i class="fa fa-dashboard"></i></a>   
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