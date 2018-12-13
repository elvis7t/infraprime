<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();
$sql ="	SELECT * FROM at_maquinas a 
				JOIN at_empresas    b ON a.mq_empId     = b.emp_id 
				JOIN mq_fabricante  c ON a.mq_fabId     = c.fab_id
				JOIN sys_usuarios   d ON a.mq_usudes    = d.usu_cod
				JOIN eq_tipo        e ON a.mq_tipoId    = e.tipo_id 
				JOIN at_status      f ON a.mq_statusId  = f.status_id
				JOIN mq_memoria     g ON a.mq_memId     = g.mem_id
				JOIN mq_hd          h ON a.mq_hdId      = h.hd_id
				JOIN mq_os          i ON a.mq_osId      = i.os_id
				JOIN mq_office      j ON a.mq_officeId  = j.office_id
		   		
		WHERE mq_ativo = '0' AND id_inst = '0' AND mq_empId=".$_SESSION['usu_empresa'];
		$rs->FreeSql($sql);
		 
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum Maquina...</td></tr>"; 
	else:
$rs->FreeSql($sql);
while($rs->GeraDados()){ ?> 
	<tr>
		<td><input type="checkbox" id="mq_cods" name="mq_cods[]" value="<?=$rs->fld("mq_id");?>" /></td>
		<td><?=$rs->fld("mq_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("mq_nome");?></td> 
		<td><?=$rs->fld("tipo_desc");?></td> 
	    <td><?=$rs->fld("fab_nome");?></td>
		<td><?=$rs->fld("mq_modelo");?></td>
		<td><?=$fn->data_hbr($rs->fld("mq_datacad"));?></td>  
		<td><?=$fn->data_hbr($rs->fld("mq_datades"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td>
		
	<td>   
			<div class="button-group">  
				
				 
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("eq_id");?>,"exc_Eq","o item");'><i class="fa fa-trash"></i></a> -->
				<a 	class="btn btn-xs btn-danger" data-toggle='tooltip' data-placement='bottom' title='detalhes'   a href="at_ver_Mqdescartelocal.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$rs->fld('mq_id');?>"><i class="fa fa-thumbs-down"></i></a> 
				
			</div>  
		</td>  
		
	</tr>	
<?php } 
endif; 
?>
