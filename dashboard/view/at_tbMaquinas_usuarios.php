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
			JOIN at_usuarios        h ON a.mq_usuId    = h.usu_id
			JOIN at_departamentos	i ON a.mq_dpId     = i.dp_id
			JOIN mq_office			j ON a.mq_officeId = j.office_id
		WHERE mq_ativo = '1' 
		ORDER BY  emp_alias	"; 
		
		
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
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("at_usu_nome");?></td>
		<td><?=$rs->fld("mq_nome");?></td> 
		<td><?=$rs->fld("fab_nome");?></td>
		<td><?=$rs->fld("tipo_desc");?></td>
		<td><?=$rs->fld("mq_modelo");?></td>
		<td><p 	class="<?=$rs->fld("status_color");?>"><i class="<?=$rs->fld("status_classe");?>"></i></p></td>
		<td><?=$rs->fld("os_desc");?></td>   
		<td><?=$rs->fld("office_desc");?></td>   
		<td><?php if($rs->fld("mq_licenca")==1 ): ?> 
					OEM
					
					<?php else: ?>
					Open
					
					<?php
					endif;
					?> 	
		</td>  
	<td>   
			<div class="button-group">  
				
				 
				<?php 
					if($rs->fld("mq_ativo")==1 AND $rs->fld("mq_usuId")==0): ?>
					<a 	class="btn btn-xs btn-success" data-toggle='tooltip' data-placement='bottom' title='Add'  a href="at_atr_Mq.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$rs->fld('mq_id');?>"><i class="fa fa-plug"></i></a>
					
					<?php else: ?>
					<a 	class="btn btn-xs btn-info" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Mq.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$rs->fld('mq_id');?>"><i class="fa fa-dashboard"></i></a>
					
					<?php
					endif;
					?> 
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("eq_id");?>,"exc_Eq","o item");'><i class="fa fa-trash"></i></a> -->
				<a 	class="btn btn-xs btn-danger" data-toggle='tooltip' data-placement='bottom' title='descartar'  a href="at_descartar_Mq.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$rs->fld('mq_id');?>"><i class="fa fa-recycle"></i></a> 
				
			</div>  
		</td> 
		
	</tr>	
<?php }
endif; 
?>
