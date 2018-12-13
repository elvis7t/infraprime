<?php
require_once("../model/recordset.php");
require_once("../class/class.functions.php");  
$fn = new functions();
$rs_user = new recordset();
$sql ="SELECT * FROM ou_contato_site 
		WHERE contato_Id <> 0";
	$rs_user->FreeSql($sql);
	if($rs_user->linhas==0):
	echo "<tr><td colspan=7> Nenhuma solicita&ccedil;&atilde;o...</td></tr>";
	else:
		while($rs_user->GeraDados()){?> 
		<tr>
			<td><?=$rs_user->fld("contato_Id");?></td>
			<td><?=$rs_user->fld("contato_nome");?></td>
			<td><?=$rs_user->fld("contato_titulo");?></td>
			<!--<td><?=$rs_user->fld("contato_mensagem");?></td> -->
			<td><?=$rs_user->fld("contato_status");?></td> 
			<!--<td><?=$rs_user->fld("contato_data");?></td> --> 
			<td><?echo $fn->data_hbr($rs_user->fld("contato_data"));?></td>  
			<td>
				<div class="button-group">  
					<a href="ou_vis_msn.php?token=<?=$_SESSION['token'];?>&contato_Id=<?=$rs_user->fld("contato_Id");?>" class="btn btn-sm btn-info" id="btn_altera_status"  data-toggle='tooltip' data-placement='bottom' title='Visualizar Mesagem'><i class="fa fa-search"></i> </a> 
					 
					<!--<button type="button" class="btn btn-sm btn-danger" id="btn_ver" data-toggle='tooltip' data-placement='bottom' title='Visualizar'><i class="fa fa-eye"></i> </button> 
					<!--<button type="button" class="btn btn-sm btn-danger" id="btn_excluir" data-toggle='tooltip' data-placement='bottom' title='Excluir'><i class="fa fa-trash"></i> </button> -->
				</div>
			</td> 
		</tr> 	
<?php 
	}endif;
?>
 <script>
 function altera(cod){
	 $("#btn_altera_status").data("id",cod);
 }
 </script>