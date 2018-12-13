<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();									
$sql ="SELECT * FROM eq_emprestimo a
			JOIN at_empresas      b ON a.empre_eqempId    = b.emp_id 
			JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
			JOIN eq_marca         d ON a.empre_eqmarcaId   = d.marc_id
			JOIN at_equipamentos  e ON a.empre_eqId     = e.eq_id
			JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
			JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
			JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
		WHERE eq_id =".$eqid;   
		$rs->FreeSql($sql);
		
if($rs->linhas==0):
	echo "<tr><td colspan=7>  </td></tr>";
	echo "<tr><td colspan=7> Nenhum emprestimo...</td></tr>"; 
	else:
$rs->FreeSql($sql);	 
while($rs->GeraDados()){ ?>
	<tr>
		<td><?=$rs->fld("empre_id");?></td>
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("marc_nome");?></td>
		<td><?=$rs->fld("eq_desc");?></td>
		<td><?=$rs->fld("dp_nome");?></td>
		<td><?=$rs->fld("at_usu_nome");?></td>
		<td><?=$fn->data_br($rs->fld("empre_datade"));?></td>  
		<td><?=$fn->data_br($rs->fld("empre_dataate"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td> 
		<td><?=$rs->fld("empre_ticket");?></td>   
		<td> 
		<div class="button-group">   
				
				 
				<?php 
					if($rs->fld("empre_ativo")==0): ?>
					<a 	class="btn btn-xs btn-success" data-toggle='tooltip' data-placement='bottom' title='Detalhes'  a href="at_ver_Eqemprestimo.php?token=<?=$_SESSION['token']?>&acao=N&empreid=<?=$rs->fld('empre_id');?>"><i class="fa fa-thumbs-o-up"></i></a>
					 
					<?php else: ?>
					<a 	class="btn btn-xs btn-warning" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Eqemprestimo.php?token=<?=$_SESSION['token']?>&acao=N&empreid=<?=$rs->fld('empre_id');?>"><i class="fa fa-dashboard"></i></a>  
					
					<?php
					endif;
					?> 
				<!--<a 	class="btn btn-danger btn-xs" data-toggle='tooltip'  data-placement='bottom' title='Excluir' a href='javascript:del(<?=$rs->fld("eq_id");?>,"exc_Eq","o item");'><i class="fa fa-trash"></i></a> --> 
			</div> 
		</td>
		 
		   
	</tr>	
<?php    
}
//echo "<tr><td colspan=7><strong>".$rs->linhas." Manuten&ccedil;&otilde;es</strong></td></tr>";    
endif;
?>   