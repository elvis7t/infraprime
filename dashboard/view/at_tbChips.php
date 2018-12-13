<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();
$sql ="SELECT * FROM eq_chips a
			JOIN at_empresas  b ON a.chip_empId  = b.emp_id 
			JOIN sys_usuarios c ON a.chip_usucad = c.usu_cod
		WHERE chip_ativo <> 1"; 
		$rs->FreeSql($sql);
		
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Chip...</td></tr>"; 
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?> 
	<tr>
		<td><?=$rs->fld("chip_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("chip_operadora");?></td>
		<td><?=$rs->fld("chip_serial");?></td>
		<td><?=$rs->fld("chip_linha");?></td> 
		<td><?=$rs->fld("usu_nome");?></td>
		<td><?=$fn->data_hbr($rs->fld("chip_datacad"));?></td>  
		<td><i class="fa fa-check-square-o text-success"></i></td> 
	<td>   
			<div class="button-group">  
				
				 
				<?php 
					if($rs->fld("chip_eqId")==0 ): ?>
												<a 	class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Add'  a href="at_atr_Chip.php?token=<?=$_SESSION['token']?>&acao=N&chipid=<?=$rs->fld('chip_id');?>"><i class="fa fa-plug"></i></a>
												
												<?php else: ?>
												<a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Chip.php?token=<?=$_SESSION['token']?>&acao=N&chipid=<?=$rs->fld('chip_id');?>"><i class="fa fa-dashboard"></i></a>
												
												<?php
												endif;
												?>
			</div>  
		</td> 
		
	</tr>	
<?php }
endif; 
?>
<script src="http://localhost/dashboard/js/functions.js"></script>    
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