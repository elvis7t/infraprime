<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php"); 
$fn = new functions();
$rs = new recordset();
$sql ="	SELECT * FROM sr_servico a WHERE servico_servidorId = ".$mqid;
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
		<td><?=$rs->fld("servico_licenca");?></td>				
		<div class="button-group">  				 
			<td> 
				<a 	class="btn btn-xs btn-info" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_servico.php?token=<?=$_SESSION['token']?>&acao=N&srvcid=<?=$rs->fld('servico_id');?>"><i class="fa fa-dashboard"></i></a>
				<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("servico_id");?>,"exc_Servico","o item");'><i class="fa fa-trash"></i></a>
			</td>
		</div>  		
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