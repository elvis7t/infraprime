<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();									
$sql ="SELECT * FROM mq_manutencao a
			JOIN  at_maquinas      b ON a.man_mqId   = b.mq_id 
			JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
			JOIN  at_empresas      e ON a.man_mqempId = e.emp_id
			JOIN  at_usuarios      f ON a.man_mqusuId = f.usu_id
		WHERE man_mqempId=".$_SESSION['usu_empresa'];
		$rs->FreeSql($sql);    
		
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhuma Manuten&ccedil;&atilde;o...</td></tr>"; 
	else:
$rs->FreeSql($sql);	
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("man_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("mq_nome");?></td> 
		<!--<td><?=$rs->fld("man_desc");?></td>-->
		<td><?=$fn->data_hbr($rs->fld("man_dataida"));?></td>  
		<td><?=$fn->data_hbr($rs->fld("man_dataretorno"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td>
		<td><?=$rs->fld("at_usu_nome");?></td>
		<td><?=$rs->fld("man_ticket");?></td>
		
	<td>   
			<div class="button-group">   
				
				 
				<?php 
					if($rs->fld("man_ativo")==0): ?>
					<a 	class="btn btn-xs btn-success" data-toggle='tooltip' data-placement='bottom' title='Detalhes' a href="at_ver_ManutencaoMqlocal.php?token=<?=$_SESSION['token']?>&acao=N&manid=<?=$rs->fld('man_id');?>"><i class="fa fa-thumbs-o-up"></i></a>
					 
					<?php else: ?>
					<a 	class="btn btn-xs btn-warning" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Manmqlocal.php?token=<?=$_SESSION['token']?>&acao=N&manid=<?=$rs->fld('man_id');?>"><i class="fa fa-dashboard"></i></a>  
					
					<?php
					endif;
					?> 
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("eq_id");?>,"exc_Eq","o item");'><i class="fa fa-trash"></i></a> --> 
			</div>  
		</td> 
		
	</tr>	
<?php }
endif; 
?>
<script src="<?=$hosted;?>/dashboard/js/functions.js"></script>    
<script>
// Atualizar a cada 10 segundos
	 
	

	 /*------------------------|INICIA TOOLTIPS E POPOVERS|---------------------------------------*/
		$(function () {
			$('[data-toggle="tooltip"]').tooltip();
			$('[data-toggle="popover"]').popover({
		        html:true
		    });
		});


		setTimeout(function(){
			$("#alms").load(location.href+" #almsg");
		 },10500);

	

</script>