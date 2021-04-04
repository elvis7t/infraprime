<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();									
$sql ="SELECT * FROM at_compras a
			JOIN  at_departamentos   c ON a.comp_dpId  = c.dp_id 
			JOIN  sys_usuarios       d ON a.comp_usucad = d.usu_cod
			JOIN  at_empresas        e ON a.comp_empId = e.emp_id
			JOIN  comp_status        f ON a.comp_statusId = f.status_id
			
		WHERE comp_ativo =1";   
		$rs->FreeSql($sql); 
		
if($rs->linhas==0): 
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhuma Compra...</td></tr>"; 
	else:
$rs->FreeSql($sql);	
while($rs->GeraDados()){ ?>   
	<tr> 
		<td><?=$rs->fld("comp_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("comp_titulo");?></td> 
		<td><?=$fn->data_br($rs->fld("comp_datacad"));?></td>  
		<td><?=$fn->data_br($rs->fld("comp_datafin"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td>
	<!--<td><p 	class="<?=$rs->fld("status_color");?>"><?=$rs->fld("status_desc");?></p></td>-->
		<td><span class="label label-<?=$rs->fld("status_collor");?>"><?=$rs->fld("status_desc");?></span></td>	
		<td><?=$fn->formata_din($rs->fld("comp_valor"));?></td>
	<td>   
			<div class="button-group">   
				
				 
				<?php 
					if($rs->fld("comp_ativo")==0): ?>
					<a 	class="btn btn-xs btn-success" data-toggle='tooltip' data-placement='bottom' title='Detalhes'  a href="at_ver_Compra.php?token=<?=$_SESSION['token']?>&acao=N&compid=<?=$rs->fld('comp_id');?>"><i class="fa fa-thumbs-o-up"></i></a>
					 
					<?php else: ?>
					<a 	class="btn btn-xs btn-warning" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Comp.php?token=<?=$_SESSION['token']?>&acao=N&compid=<?=$rs->fld('comp_id');?>"><i class="fa fa-dashboard"></i></a>  
					
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