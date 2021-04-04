<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();
$sql ="	SELECT * FROM at_maquinas a
			JOIN at_empresas    b ON a.mq_empId  = b.emp_id 
			JOIN mq_fabricante  c ON a.mq_fabId  = c.fab_id
			JOIN sys_usuarios   d ON a.mq_usucad = d.usu_cod
			JOIN eq_tipo        e ON a.mq_tipoId = e.tipo_id
			JOIN at_status      f ON a.mq_statusId = f.status_id
			JOIN mq_os          g ON a.mq_osId =    g.os_id
		WHERE mq_ativo = '1' AND mq_servtp = 'f' AND mq_tipoId  IN  ('10','51','84','85','86','87') AND YEAR(mq_datagar) < YEAR(CURDATE( ))"; 
		$rs->FreeSql($sql);
		
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhuma M&aacute;quina...</td></tr>";  
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?> 
	<tr>
		<td><?=$rs->fld("mq_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("fab_nome");?></td>
		<td><?=$rs->fld("tipo_desc");?></td>
		<td><?=$rs->fld("mq_nome");?></td> 
		<td><p 	class="<?=$rs->fld("status_color");?>"><i class="<?=$rs->fld("status_classe");?>"></i></p></td>
		<td><?=$rs->fld("os_desc");?></td>   
		<td><?=$rs->fld("mq_tag");?></td>   
		<td><?=$rs->fld("usu_nome");?></td>
		<?php if($rs->fld("mq_servtp")==f): ?>	
		<td>Fisico</i></td> 
		<?php else: ?>
		<td>Virtual</i></td> 
		<?php endif; ?> 
		<td>   
			<div class="button-group">	
				<a 	class="btn btn-xs btn-info" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Servidor.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$rs->fld('mq_id');?>"><i class="fa fa-dashboard"></i></a>				
				<a 	class="btn btn-xs btn-danger" data-toggle='tooltip' data-placement='bottom' title='descartar'  a href="at_descartar_Servidor.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$rs->fld('mq_id');?>"><i class="fa fa-recycle"></i></a> 				
			</div>  
		</td>		
	</tr>	
<?php }
endif; 
?>
