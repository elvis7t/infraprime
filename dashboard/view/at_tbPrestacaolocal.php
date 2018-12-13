<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();	 
$sql ="SELECT * FROM eq_manutencao a
			JOIN  at_equipamentos  b ON a.man_eqId   = b.eq_id 
			JOIN  eq_prestadoras   c ON a.man_preId  = c.pre_id 
			JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
			JOIN  at_empresas      e ON a.man_eqempId = e.emp_id
		WHERE man_preId =".$preid." AND man_eqempId =" .$_SESSION['usu_empresa'];
		
$rs->FreeSql($sql);
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Atendimento...</td></tr>"; 
	else:
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("man_id");?></td>
		<td><?=$rs->fld("eq_desc");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$fn->data_hbr($rs->fld("man_dataida"));?></td>  
		<td><?=$fn->data_br($rs->fld("man_dataretorno"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td>
		<td><?=$rs->fld("man_os");?></td>
		<td><?=$fn->formata_din($rs->fld("man_valor"));?></td>    
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
			
			<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("pre_id");?>,"exc_Pre","o item");'><i class="fa fa-trash"></i></a> -->
			</div>
		</td> 
		  
	</tr>
		
		  
	</tr>	
<?php   
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Atendimentos</strong></td></tr>";   
endif;
?> 