<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVOLOCAL";
$pag = "at_equipamentoslocais.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
$fn = new functions();   
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1> 
						Ativos Locais
				<small>Equipamentos</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Equipamentos </li>
				<li class="active">Gerenciar</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_AltEq","label"=>"Alterar") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM at_equipamentos a
				JOIN at_empresas      b ON a.eq_empId  = b.emp_id 
				JOIN eq_marca         c ON a.eq_marcId = c.marc_id
				JOIN sys_usuarios     d ON a.eq_usucad = d.usu_cod
				JOIN eq_tipo          e ON a.eq_tipoId = e.tipo_id
				JOIN at_status        f ON a.eq_statusId = f.status_id
				WHERE eq_id = ".$eqid; 
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				
				$var            = $rs->fld("emp_id");
				$usu            = $rs->fld("usu_nome");
				$usu_id         = $rs->fld("eq_usuId");
				$dp_id          = $rs->fld("eq_dpId");
				$mq_id          = $rs->fld("eq_mqId");  
				$eq_usuEmp_id   = $rs->fld("eq_usuEmpId");  
				$eq_valor       = $rs->fld("eq_valor");  
 				$status_id      = $rs->fld("status_id");  
				$status_classe  = $rs->fld("status_classe");  
				$status_desc    = $rs->fld("status_desc");  
				
			?>
			 <div class="row">
				<div class="col-md-12">
				<!-- general form elements --> 
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Dados</h3><div class="box-tools pull-right"> 
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
					</div><!-- /.box-header -->
						<!-- form start --> 
						<form role="form" id="alt_eq">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="usuarios" class="row"> 
									<div class="form-group col-xs-1">
										<label for="eq_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="eq_id" id="eq_id" value="<?=$rs->fld("eq_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									<div class="form-group col-md-2">
										<label for="emp_id">#Empresa:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="emp_nome" id="emp_nome" value="<?=$rs->fld("emp_alias");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
										</div>
									</div>
									
									<div class="form-group col-md-3"> 
										<label for="tipo_desc">#Tipo:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-print"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("tipo_desc");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
										</div>
									</div>

									<div class="form-group col-md-2">
										<label for="marc_nome">#Marca:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-android"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("marc_nome");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
										</div>
									</div>
									
									<div class="form-group col-md-3">
										<label for="marc_nome">#Cadastrado em:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar-check-o"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$fn->data_hbr($rs->fld("eq_datacad"));?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
										</div>
									</div>
									
									<div class="form-group col-md-3">   
										<label for="usu_nome">#Cadastrado por:</label> 
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user-secret"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$rs->fld("usu_nome")?>"/>  
										</div> 
									</div> 
									
									<div class="form-group  col-md-3">  
										<label for="eq_desc">Equipamento</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-keyboard-o"></i>
										</div>
										<input type="text"   class="form-control" name="eq_desc" id="eq_desc" value="<?=$rs->fld("eq_desc")?>"/>  
										</div>
									</div>	
									
								   <div class="form-group  col-md-2">  
										<label for="eq_serial">Modelo</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input type="text"  class="form-control" name="eq_modelo" id="eq_modelo" value="<?=$rs->fld("eq_modelo")?>"/>   
										</div>
									</div>
									  
									<div class="form-group  col-md-3">  
										<label for="eq_serial">N&ordm; Serial</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text"  class="form-control" name="eq_serial" id="eq_serial" value="<?=$rs->fld("eq_serial")?>"/>  
										</div>
									</div>
									
									
									
								</div> 
								<div id="usuarios" class="row">
								
								<?php
								if($rs->fld("eq_serial2")==""): ?> 
								
								<?php else: ?>
								<div class="form-group  col-md-3">  
									<label for="eq_serial2">IMEI2</label>
									<div class="input-group">
									<div class="input-group-addon">
										<i class="fa fa-key"></i>
									</div>
									<input type="text" DISABLED class="form-control" name="eq_serial2" id="eq_serial2" value="<?=$rs->fld("eq_serial2")?>"/>  
									</div>
								</div>
								<?php
								endif; 
								?>
								
									<div class="form-group col-md-2 "> 
										<label for="sel_eqstatus">Selecione O Status</label>
										<div class="input-group">
										<div class="input-group-addon"> 
											<i class="<?=$status_classe?>"></i>
										</div>
										<select class="form-control select2" id="sel_eqstatus" name="sel_eqstatus">
												 <option value="">Selecione:</option>
												<?php
													$whr = "status_id<>0";
													$rs->Seleciona("*","at_status",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
													while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
													?>
													<option value="<?=$rs->fld("status_id");?>"<?=($rs->fld("status_id")==$status_id?"SELECTED":"");?>><?=$rs->fld("status_desc");?>  </option>
													<?php
													} 
												?>
											</select>
										</div>
									</div>
									
									<div class="form-group col-md-2">  
										<label for="eq_valor">Valor</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>
										<input type="text"  class="form-control " name="eq_valor" id="eq_valor" value="<?=$eq_valor ?>"/>   
										</div>
									</div>
									
									<div class="form-group"> 
										<a  title='Baixar Arquivo'  href="../images/qrcode_img/download.php?arquivo=<?=$eqid;?>eq.png"><img src="../images/qrcode_img/<?=$eqid;?>eq.png" /></a>
										<a 	class="btn btn-sm " data-toggle='tooltip' data-placement='bottom' title='Imprimir o QRCODE'  a href="../images/qrcode_img/imprimir_qrcodeEq.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-print"></i> Imprimir qrcode</a>
									</div>
									
								</div> 
								<div id="usuarios" class="row">
									<?php
												
												$whr = "usu_id=".$usu_id;
												$rs->Seleciona("*","at_usuarios a
												JOIN at_empresas      b ON a.usu_empId  = b.emp_id 
												JOIN at_departamentos c ON a.usu_dpId   = c.dp_id",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?> 
										<div class="box-header with-border"> 
										<h3 class="box-title">Dados do Usu&aacute;rio que esta utilizando</h3>
										<div class="box-tools pull-right"> 
										</div>
										</div>
										
										<div class="form-group col-md-2">  
										<label for="eq_dpId">Empresa</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("emp_alias")?>"/>  
										
										</div>
										</div>
										
										<div class="form-group col-md-2">  
										<label for="eq_dpId">Departamento</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("dp_nome")?>"/>  
										<input type="hidden" value="<?=$rs->fld("dp_id");?>" name="eq_dpId" id="eq_dpId">
										</div>
										</div>
									
										<div class="form-group col-md-3">  
										<label for="eq_usuId">Usu&aacute;rio</label>
										<div class="input-group">
										<div class="input-group-addon">  
								 		<i class="fa fa-user"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("at_usu_nome")?>"/>  
										<input type="hidden" value="<?=$rs->fld("usu_id");?>" name="eq_usuId" id="eq_usuId">
										</div>
										</div>
										
									</div> 
									<div id="usuarios" class="row">
										<?php
												}  
											?>  
										
										<?php
												$whr = "mq_id=".$mq_id;
												$rs->Seleciona("*","at_maquinas a
												JOIN at_empresas    b ON a.mq_empId  = b.emp_id 
												JOIN mq_fabricante  c ON a.mq_fabId  = c.fab_id
												JOIN sys_usuarios   d ON a.mq_usucad = d.usu_cod
												JOIN eq_tipo        e ON a.mq_tipoId = e.tipo_id",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?> 
												<div class="box-header with-border"> 
												<h3 class="box-title">Utilizado Na M&aacute;quina:</h3>
												<div class="box-tools pull-right"> 
												</div>
												</div>
												
												<div class="form-group col-md-2">  
												<label for="eq_mqId">Empresa</label>
												<div class="input-group">
												<div class="input-group-addon">
												<i class="fa fa-building"></i>
												</div> 
												<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("emp_alias")?>"/>  
												<input type="hidden" value="<?=$rs->fld("emp_id");?>" name="eq_mqId" id="eq_mqId">
												</div>
												</div>
												
												<div class="form-group col-md-3">
												<label for="tipo_desc">#Tipo:</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-laptop"></i>
													</div>
												<input type="text" DISABLED class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("tipo_desc");?>"/>
												</div>
												</div>
									
												<div class="form-group col-md-3">
												<label for="marc_nome">#Fabricante:</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-industry"></i>
													</div>
												<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("fab_nome");?>"/>
												</div>
												</div>
									  
												<div class="form-group  col-md-2">  
												<label for="mq_modelo">#Modelo:</label>
												<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-mobile"></i>
												</div>
												<input type="text" DISABLED class="form-control" name="mq_modelo" id="mq_modelo" value="<?=$rs->fld("mq_modelo")?>"/>  
												</div>
												</div> 
								
								
												<div class="form-group col-md-2">  
												<label for="eq_mqId">Nome</label>
												<div class="input-group">
												<div class="input-group-addon">
												<i class="fa fa-desktop"></i>
												</div> 
												<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("mq_nome")?>"/>  
												<input type="hidden" value="<?=$rs->fld("eq_id");?>" name="eq_mqId" id="eq_mqId">
												</div>
												</div>
										<?php
												}   
											?> 
									
										
									</div> 
									<div id="usuarios" class="row">
									
								 
								
								<div id="consulta"></div>
								<div id="formerrosAlteq" class="clearfix" style="display:none;"> 
									<div class="callout callout-danger"> 
										<h4>Erros no preenchimento do formul&aacute;rio.</h4>
										<p>Verifique os erros no preenchimento acima:</p>
										<ol>
											<!-- Erros são colocados aqui pelo validade -->
										</ol> 
									</div> 
								</div>
							</div>  
							 
							<div class="box-footer">
							<div class="box-header with-border"> 
								<h3 class="box-title">A&ccedil;&otilde;es</h3><div class="box-tools pull-right">
									
								</div> 
							</div>
							<table id="maquinas" class="table table-bordered table-striped">
								<tr> 
								<td><button class="<?=$menu[$acao]['class'];?>" type="button" data-toggle='tooltip' data-placement='bottom' title='Alterar equipamento' id="<?=$menu[$acao]['id'];?>"><i class="<?=$menu[$acao]['icone'];?>" ></i> <?=$menu[$acao]['label'];?></button></td>
								
								<td><a 	class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Alterar usu&aacute;rio'  a href="at_alt_usu_Eqlocal.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-user-plus"></i> Alterar usu&aacute;rio</a></td> 
								
																						
								<td><button type="button" id="btn_limpaEq" class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Enviar para reserva' type="submit"><i class="fa fa-plug"></i> Reserva</button></td>
								
								<td><a 	class="btn btn-sm btn-warning" data-toggle='tooltip' data-placement='bottom' title='solicita&ccedil;&atilde;o'  a href="at_solic_Eqlocal.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-bullhorn"></i> Solicita&ccedil;&atilde;o</a></td>
								
								
								<td><a 	class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='bottom' title='Manuten&ccedil;&atilde;o'  a href="at_man_Eqlocal.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-wrench"></i> Manuten&ccedil;&atilde;o</a></td>
								
								<td><button type="button" id="btn_qrcodeEq" class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Gerar QRCODE' type="submit"><i class="fa fa-qrcode"></i> QRCODE</button></td> 
								
								<td><a 	class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='bottom' title='solicita&ccedil;&atilde;o'  a href="at_descartar_Eqlocal.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-recycle"></i> Descartar</a></td> 
								
								<?php
										$whr = "eq_id=".$eqid;
										$rs->Seleciona("*","at_equipamentos a JOIN eq_tipo b ON a.eq_tipoId = b.tipo_id",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
										while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
									?> 
									<td>   
										<div class="button-group">  
											<?php 
												if($rs->fld("eq_tipoId")==12 or $rs->fld("eq_tipoId")==45 or $rs->fld("eq_tipoId")==53 or $rs->fld("eq_tipoId")==54 or $rs->fld("eq_tipoId")==55 or $rs->fld("eq_tipoId")==56 or $rs->fld("eq_tipoId")==57 or $rs->fld("eq_tipoId")==11): ?> 
												<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Gerar IMEI2'  a href="at_vis_imei2_Eqlocal.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$rs->fld("eq_id");?>"><i class="fa fa-key"></i> IMEI2</a> 
												<td><a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='solicita&ccedil;&atilde;o'  a href="at_outros_Eqlocal.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="glyphicon glyphicon-question-sign"></i> Outros</a></td>
												<?php else: ?>
												<td><a 	class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Alterar m&aacute;quina'  a href="at_alt_mq_Eqlocal.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-desktop"></i> Alterar m&aacute;quina</a></td>
												<td><a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='solicita&ccedil;&atilde;o'  a href="at_outros_Eqlocal.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="glyphicon glyphicon-question-sign"></i> Outros</a></td>
												<?php
												endif; 
												?> 
											
										</div>  
									</td>
									
									<?php
										}   
									?> 
														
							</tr>
							</table>
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- ./box --> 
				</div><!-- ./row -->
				<!-- general form elements -->
					<?php
												
					$whr = "chip_eqid=".$eqid;
					$rs->Seleciona("*","eq_chips a
					JOIN at_empresas  b ON a.chip_empId  = b.emp_id 
					JOIN sys_usuarios c ON a.chip_usucad = c.usu_cod ",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
					while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
					
					?> 
									
					<div class="box box-success">
					<div class="box-header with-border"> 
						<h3 class="box-title">Chip desse Equipamento</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>  
					</div><!-- /.box-header --> 
					<!-- form start -->
					<div class="box-body">
						<table id="usu" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>C&oacute;d:</th>
										<th>Empresa</th> 
										<th>Operadora</th>
										<th>serial</th>
										<th>Linha</th>
										<th>Data</th>
										<th>Usu Cad</th>
										<th>Ativo</th>
										<th>A&ccedil;&otilde;es</th>
								  </tr>
							</thead>
							<tbody id="mq_cad">
								<tr>
									<td><?=$rs->fld("chip_id");?></td>
									<td><?=$rs->fld("emp_alias");?></td>
									<td><?=$rs->fld("chip_operadora");?></td>
									<td><?=$rs->fld("chip_serial");?></td>
									<td><?=$rs->fld("chip_linha");?></td> 
									<td><?=$fn->data_hbr($rs->fld("chip_datacad"));?></td>  
									<td><?=$rs->fld("usu_nome");?></td>
									<td><i class="fa fa-check-square-o text-success"></i></td> 
								<td>   
										<div class="button-group">  
											
											 
											<?php 
												if($rs->fld("chip_eqId")==0 ): ?>
												<a 	class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Add'  a href="at_atr_chiplocal.php?token=<?=$_SESSION['token']?>&acao=N&chipid=<?=$rs->fld('chip_id');?>"><i class="fa fa-plug"></i></a>
												
												<?php else: ?>
												<a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Chiplocal.php?token=<?=$_SESSION['token']?>&acao=N&chipid=<?=$rs->fld('chip_id');?>"><i class="fa fa-dashboard"></i></a>
												
												<?php
												endif;
												?> 
											
											 
										</div>  
									</td> 
									
								</tr>
							</tbody>
							 
						</table>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
					</div> 
							
               </div><!-- /.box --> 	
               
					
			<?php
				}  
			?>		
		
			</div>
		  </section><!-- /.content -->
      </div><!-- /.content-wrapper --> 
 <?php 
        require_once("../config/footer.php");
        //require_once("../config/side.php"); 
      ?>
      <div class="control-sidebar-bg"></div>
 
    </div><!-- ./wrapper --> 

    <!-- jQuery 2.1.4 --> 
    <script src="<?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!--AdminLTE App -->
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="<?=$hosted;?>/dashboard/assets/js/maskinput.js"></script>
    <script src="<?=$hosted;?>/dashboard/assets/js/jmask.js"></script>
     <!-- ChartJS 1.0.1-->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/demo.js"></script>
	<script src="<?=$hosted;?>/dashboard/js/action_ativoslocais.js"></script>  <!--Chama o java script -->
	
	<!-- Validation --> 
	<!-- SELECT2 TO FORMS --> 

	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script>
	/*------------------------|INICIA TOOLTIPS E POPOVERS|---------------------------------------*/
	$(document).ready(function () {
		$(".select2").select2({
			tags: true,
			theme: "classic"
		});
	});
</script>

</body>
</html>	