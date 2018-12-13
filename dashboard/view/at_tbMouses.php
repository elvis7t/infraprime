<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();
$sql ="	SELECT *
				FROM at_equipamentos a
				JOIN at_empresas  b ON a.eq_empId  = b.emp_id 
				JOIN eq_marca     c ON a.eq_marcId = c.marc_id
				JOIN sys_usuarios d ON a.eq_usucad = d.usu_cod
				JOIN eq_tipo      e ON a.eq_tipoId = e.tipo_id
				JOIN at_status    f ON a.eq_statusId = f.status_id
				WHERE eq_desc='Mouse' AND eq_ativo <>1
				AND eq_usuId = 0 
				AND eq_mqId  = 0
				AND (
				eq_empId =1
				OR eq_empId =2
				OR eq_empId =9
				); "; 
		$rs->FreeSql($sql);
		
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Equipamento...</td></tr>"; 
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?> 
	<tr>
		<td><?=$rs->fld("eq_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("marc_nome");?></td>
		<td><?=$rs->fld("eq_modelo");?></td>
		<td><?=$rs->fld("eq_serial");?></td>
		<td><?=$rs->fld("eq_desc");?></td> 
		<td><p 	class="<?=$rs->fld("status_color");?>"><i class="<?=$rs->fld("status_classe");?>"></i></p></td> 
		<td><?=$fn->data_hbr($rs->fld("eq_datacad"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td>
		<td><i class="fa fa-check-square-o text-success"></i></td> 
	<td>   
			<div class="button-group">  
				
				 
				<?php 
					if($rs->fld("eq_mqId")==0 AND $rs->fld("eq_usuId")==0): ?>
					<a 	class="btn btn-xs btn-success" data-toggle='tooltip' data-placement='bottom' title='Add'  a href="at_atr_Eq.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$rs->fld('eq_id');?>"><i class="fa fa-plug"></i></a>
					
					<?php else: ?>
					<a 	class="btn btn-xs btn-info" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Eq.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$rs->fld('eq_id');?>"><i class="fa fa-dashboard"></i></a>
					
					<?php
					endif;
					?> 
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("eq_id");?>,"exc_Eq","o item");'><i class="fa fa-trash"></i></a> -->
				<a 	class="btn btn-xs btn-danger" data-toggle='tooltip' data-placement='bottom' title='descartar'  a href="at_descartar_Eq.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$rs->fld('eq_id');?>"><i class="fa fa-recycle"></i></a> 
				
			</div>  
		</td> 
		
	</tr>	
<?php }
endif; 
?>
<script src="http://localhost/infraprime/dashboard/js/functions.js"></script>    
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