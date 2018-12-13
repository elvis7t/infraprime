<?php
	session_start();
	require_once("../model/recordset.php");
	require_once("../class/class.functions.php");
	$fn = new functions();
	$rs = new recordset();									

	$sql = "SELECT * FROM comp_obs a
				JOIN at_compras   b ON a.compobs_compId = b.comp_id
				JOIN sys_usuarios c ON a.compobs_usuId= c.usu_cod
				JOIN  comp_status d ON a.compobs_statusId = d.status_id

	 WHERE compobs_compId = ".$compid; 
					
	$rs->FreeSql($sql);     
	//echo $rs->sql;
	if($rs->linhas==0):
	echo "<tr><td colspan=7> Nenhum tr&acirc;mite para a Solicita&ccedil;&atilde;o selecionada...</td></tr>";
	else: 
		while($rs->GeraDados()){?>
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				  		<div class="panel panel-default">
				        	<div class="panel-heading" role="tab" id="heading<?=$rs->fld('compobs_id');?>">
								<div class="col-md-1">
									<h4 class="panel-title">
										<button class="btn btn-xs btn-info" role="button" data-toggle="collapse" data-parent="#accordion" data-target="#collapse<?=$rs->fld('compobs_id');?>" aria-expanded="true" aria-controls="collapse<?=$rs->fld('compobs_id');?>">
										  	<i class="fa fa-book"></i>
										</button>   
									</h4>  
								</div>
								
								<div class="col-md-5"><?=$rs->fld("usu_nome");?></div>
								<div class="col-md-4"><?=$fn->data_hbr($rs->fld("compobs_data"));?></div>
								<div class="<?=$rs->fld("status_color");?>"><i class="<?=$rs->fld("status_classe");?>"></i></div>  
								
								<br>
				        	</div>
				        	<div id="collapse<?=$rs->fld('compobs_id');?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?=$rs->fld('compobs_id');?>">
				          		<div class="panel-body"> 
				            		<?=$rs->fld('compobs_obs');?>
				          		</div>
				        	</div>
				      	</div>
				    </div>
			
		<?php
		}
		/*
		while($rs->GeraDados()){?>
			<tr>
				<td><?=$rs->fld("usu_nome");?></td>
				<td><?=$fn->data_hbr($rs->fld("irh_dataalt"));?></td>
				<td><button class="btn btn-xs btn-info info_obs"> <i class="fa fa-book" data-toggle="collapse" data-target="#collapse<?=$rs->fld('irh_id');?>" data-code="2" aria-expanded="false" aria-controls="collapse<?=$rs->fld('irh_id');?>"></i></button></td>
				
			</tr>
			<tr>
				<td colspan="3">
					<div class="collapse" id="collapse<?=$rs->fld('irh_id');?>">
						<div class="well">
    						<?=$rs->fld('irh_obs');?>
  						</div>
					</div>
				</td>
			</tr>
		<?php  
		}
		*/
		?>
		<tr>
			<td>
				<strong><?=$rs->linhas; ?> Registro(s) Encontrado(s)</strong>
			</td>
		</tr>
	<?php endif; ?>
