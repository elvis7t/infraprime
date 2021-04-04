<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();
$sql ="	SELECT eq_id, emp_alias, tipo_desc, marc_nome, eq_modelo, eq_desc, eq_datades, usu_nome
FROM at_equipamentos a
JOIN at_empresas b ON a.eq_empId = b.emp_id
JOIN eq_marca c ON a.eq_marcId = c.marc_id
JOIN sys_usuarios d ON a.eq_usudes = d.usu_cod
JOIN eq_tipo e ON a.eq_tipoId = e.tipo_id


WHERE eq_ativo = '0' AND eq_statusId = 7 AND eq_empId=".$_SESSION['usu_empresa']."  

UNION ALL
SELECT mq_id, emp_alias, tipo_desc, fab_nome, mq_modelo, mq_nome, mq_datades, usu_nome
FROM at_maquinas a
JOIN at_empresas b ON a.mq_empId = b.emp_id
JOIN mq_fabricante c ON a.mq_fabId = c.fab_id
JOIN sys_usuarios d ON a.mq_usudes = d.usu_cod
JOIN eq_tipo e ON a.mq_tipoId = e.tipo_id


WHERE mq_statusId = 7 AND  mq_empId=".$_SESSION['usu_empresa']."";  
		$rs->FreeSql($sql);
		 
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Maquina...</td></tr>"; 
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?> 
	<tr>	
		<td><?=$rs->fld("eq_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("tipo_desc");?></td> 
		<td><?=$rs->fld("marc_nome");?></td> 
	    <td><?=$rs->fld("eq_modelo");?></td>
		<td><?=$rs->fld("eq_desc");?></td>
		<td><?=$fn->data_hbr($rs->fld("eq_datades"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td>
		
		<td>   
			<div class="button-group"> 
				<a 	class="btn btn-xs btn-info" data-toggle='tooltip' data-placement='bottom' title='Detalhes'  a href="at_ver_Outroslocais.php?token=<?=$_SESSION['token']?>&acao=N&doacaoid=<?=$rs->fld('eq_id');?>"><i class="glyphicon glyphicon-question-sign"></i></a> 
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