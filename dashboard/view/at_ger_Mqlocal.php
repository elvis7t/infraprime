<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVOLOCAL";
$pag = "at_maquinaslocais.php";// Fazer o link brilhar quando a pag estiver ativa
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
			<h1>Ativos Locais
				<small>M&aacute;quinas</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">M&aacute;quinas </li>
				<li class="active">Gerenciar</li>
			</ol>
        </section>
		<!-- /.content-header -->
		
        <!-- Main content --> 
        <section class="content">			
			<!-- Info boxes -->
			<div class="row">
				<?php
				$menu = array(
				"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
				"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
				"N" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_AltMq","label"=>"Alterar") 
				);
				extract($_GET);
				$rs = new recordset();
				$sql ="	SELECT * FROM at_maquinas a
				JOIN at_empresas    b ON a.mq_empId  = b.emp_id 
				JOIN mq_fabricante  c ON a.mq_fabId  = c.fab_id
				JOIN sys_usuarios   d ON a.mq_usucad = d.usu_cod
				JOIN eq_tipo        e ON a.mq_tipoId = e.tipo_id
				JOIN at_status      f ON a.mq_statusId = f.status_id
				WHERE mq_id = ".$mqid;
				$rs->FreeSql($sql);
				$rs->GeraDados();

				$mq_id       = $rs->fld("mq_id");  
				$usu_nome       = $rs->fld("usu_nome");  
				$mq_status      = $rs->fld("mq_status");  
				$mq_valor       = $rs->fld("mq_valor");  
				$mq_nf          = $rs->fld("mq_nf");  
				$mq_memId       = $rs->fld("mq_memId");  
				$mq_hdId        = $rs->fld("mq_hdId");  
				$mq_osId        = $rs->fld("mq_osId");  
				$mq_officeId    = $rs->fld("mq_officeId");  
				$status_id      = $rs->fld("status_id");  
				$status_classe  = $rs->fld("status_classe");  
				$status_desc    = $rs->fld("status_desc"); 
				$mq_datagar     = $rs->fld("mq_datagar"); 						
				$mq_nota_fiscal = $mq_nf._.$mq_id; 	
				$usu_id = $rs->fld("mq_usuId");
				?>
				<div class="col-md-12">
					<!-- general form elements --> 
					<div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Dados</h3>
							<div class="box-tools pull-right"> 
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div>
						</div>
						<!-- /.box-header -->
							
								
						<div class="box-body">
							<form role="form" id="alt_mq">
							<!-- form start -->  
									
								<div id="usuarios" class="row"> 
									<div class="form-group col-xs-1"> 
									  <label for="mq_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="mq_id" id="mq_id" value="<?=$rs->fld("mq_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="emp_id">#Empresa:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-building"></i>
											</div>
											<input type="text" DISABLED class="form-control" name="emp_nome" id="emp_nome" value="<?=$rs->fld("emp_alias");?>"/>
										</div>
									</div>
									<!-- /.col -->		
									<div class="form-group col-md-2">
										<label for="tipo_desc">#Tipo:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-laptop"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("tipo_desc");?>"/>
										</div>
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-2">
									  <label for="marc_nome">#Fabricante:</label>
										<div class="input-group">
											<div class="input-group-addon">
										      <i class="fa fa-industry"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("fab_nome");?>"/>
										</div>
									</div>
									<!-- /.col -->							 
									<div class="form-group  col-md-2">  
									  <label for="mq_modelo">#Modelo:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-laptop"></i> 
											</div>
											<input type="text" DISABLED class="form-control" name="mq_modelo" id="mq_modelo" value="<?=$rs->fld("mq_modelo")?>"/>  
										</div>
									</div> 
									<!-- /.col -->  									
									<div class="form-group col-md-2">
									  <label for="mq_datacad">#Comprado em:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-calendar-check-o"></i>
											</div>
											<input type="data" DISABLED class="form-control" name="mq_datacad" id="mq_datacad"  value="<?=$fn->data_br($rs->fld("mq_datacad"));?>"/>										
										</div>
									</div>
									<!-- /.col -->   
								</div>
								<!-- /.row -->
								
								<div class="row">										
									<div class="form-group  col-md-2">  
									  <label for="mq_nome">#Nome:</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-desktop"></i>
											</div>
											<input type="text"  class="form-control" name="mq_nome" id="mq_nome" value="<?=$rs->fld("mq_nome")?>"/>  
										</div>
									</div>
									<!-- /.col --> 	
									<div class="form-group col-md-2">
									  <label for="mq_tag">Service Tag</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-tag"></i>
											</div>
											<input type="text" class="form-control" id="mq_tag" name="mq_tag"  value="<?=$rs->fld("mq_tag")?>"/>
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-4">
									  <label for="mq_mschave">Chave de Licen&ccedil;a</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-key"></i>
											</div>
											<input type="text" class="form-control" id="mq_mschave" name="mq_mschave"  value="<?=$rs->fld("mq_mschave")?>"/>
										</div>
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-3">
									  <label for="mq_proc">Processador</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-bug"></i>
											</div>
											<input type="text" class="form-control" id="mq_proc" name="mq_proc"  value="<?=$rs->fld("mq_proc")?>"/>
										</div>
									</div>
									<!-- /.col -->									
								</div>
								<!-- /.row -->
								
								<div class="row">								
									<div class="form-group col-md-2 "> 
									  <label for="sel_mqmemoria">Sel. a Mem&oacute;ria</label>
										<div class="input-group">
											<div class="input-group-addon">
  											  <i class="fa fa-microchip"></i>
											</div>
											<select class="form-control select2" id="sel_mqmemoria" name="sel_mqmemoria">
												<option value="">Selecione:</option>
												<?php
												$whr = "mem_id<>0";
												$rs->Seleciona("*","mq_memoria",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("mem_id");?>"<?=($rs->fld("mem_id")==$mq_memId?"SELECTED":"");?>><?=$rs->fld("mem_tipo");?> <?=$rs->fld("mem_cap");?></option>
												<?php
												} 
												?>
											</select> 
										</div> 
									</div> 
									<!-- /.col -->										
									<div class="form-group col-md-2 "> 
									  <label for="sel_mqhd">Sel. O HD</label>  
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-hdd-o"></i>
											</div>
											<select class="form-control select2" id="sel_mqhd" name="sel_mqhd">
												<option value="">Selecione:</option>
												<?php
												$whr = "hd_id<>0";
												$rs->Seleciona("*","mq_hd",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("hd_id");?>"<?=($rs->fld("hd_id")==$mq_hdId?"SELECTED":"");?>><?=$rs->fld("hd_tipo");?> <?=$rs->fld("hd_cap");?></option>
												<?php
												} 
												?>
											</select>
										</div> 
									</div>
									<!-- /.col -->
									<div class="form-group col-md-3 "> 
									  <label for="sel_mqos">Selecione O Sistema OP.</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-windows"></i> 
											</div>
											<select class="form-control select2" id="sel_mqos" name="sel_mqos">
												<option value="">Selecione:</option>
												<?php
												$whr = "os_id<>0";
												$rs->Seleciona("*","mq_os",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("os_id");?>"<?=($rs->fld("os_id")==$mq_osId?"SELECTED":"");?>><?=$rs->fld("os_desc");?>   <?=$rs->fld("os_versao");?></option>
												<?php
												} 
												?>
											</select>
										</div>  
									</div>
									<!-- /.col -->										
									<div class="form-group col-md-4 "> 
									  <label for="sel_mqoffice">Selecione O Office</label>
										<div class="input-group">
											<div class="input-group-addon"> 
											  <i class="fa fa-opera"></i>
											</div>
											<select class="form-control select2" id="sel_mqoffice" name="sel_mqoffice">
												<option value="">Selecione:</option>
												<?php
												$whr = "office_id<>0";
												$rs->Seleciona("*","mq_office",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("office_id");?>"<?=($rs->fld("office_id")==$mq_officeId?"SELECTED":"");?>><?=$rs->fld("office_desc");?>   <?=$rs->fld("office_versao");?></option>
												<?php
												} 
												?>
											</select>
										</div> 
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-2 "> 
									  <label for="sel_mqstatus">Selecione O Status</label>
										<div class="input-group">
											<div class="input-group-addon"> 
											  <i class="<?=$status_classe?>"></i>
											</div>
											<select class="form-control select2" id="sel_mqstatus" name="sel_mqstatus">
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
									<!-- /.col -->	
									<div class="form-group col-md-2">  
									  <label for="mq_valor">#Valor:</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-usd"></i>
											</div>
											<input type="text"  class="form-control " name="mq_valor" id="mq_valor" value="<?=$mq_valor?>"/>  
										</div>
									</div>  
									<!-- /.col -->	
									<div class="form-group col-md-3">
									  <label for="mq_nf">N&ordm; Nota Fiscal</label>  
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-key"></i>
											</div>
											<input type="text" class="form-control" id="mq_nf" name="mq_nf" value="<?=$mq_nf?>"/>
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="mq_datagar">#Garantia at&eacute;:</label>  
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-calendar-check-o"></i>
											</div>
											<input type="data" class="form-control" name="mq_datagar" id="mq_datagar"  value="<?=$fn->data_br($mq_datagar);?>"/> 
										</div>
									</div>
									<!-- /.col -->																		
									<div class="form-group col-md-2">   
									  <label for="usu_nome">#Cadastrado por:</label> 
										<div class="input-group">
											<div class="input-group-addon">  
											  <i class="fa fa-user-secret"></i>
											</div>
											<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$usu_nome?>"/>  
										</div> 
									</div>	<!-- /.col -->
								</div>
								<!-- /.row --> 
								
								<div id="usuarios" class="row">
									<?php
									$sql ="	SELECT * FROM at_maquinas a
									JOIN at_empresas    b ON a.mq_empId  = b.emp_id 
									JOIN mq_fabricante  c ON a.mq_fabId  = c.fab_id
									JOIN sys_usuarios   d ON a.mq_usucad = d.usu_cod
									JOIN eq_tipo        e ON a.mq_tipoId = e.tipo_id
									JOIN at_status      f ON a.mq_statusId = f.status_id
									WHERE mq_id = ".$mqid;
									$rs->FreeSql($sql);
									$rs->GeraDados();
									?>										
									<div class="form-group col-md-1"><!--Tem que ser antes do selectt -->  
									  <label for="mq_licenca">licen&ccedil;a</label><br>  
										<input type="radio" class="minimal" value=1 <?=($rs->fld("mq_licenca")==1?"CHECKED":"");?> id="mq_licenca" name="mq_licenca"> OEM<br>
										<input type="radio" class="minimal" value=0 <?=($rs->fld("mq_licenca")==0?"CHECKED":"");?> id="mq_licenca" name="mq_licenca"> Open<br>
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-1"> 									
										<a  title='Baixar Arquivo'  href="../images/qrcode_img/download.php?arquivo=<?=$mqid;?>mq.png"><img src="../images/qrcode_img/<?=$mqid;?>mq.png" /></a>
										<a 	class="btn btn-sm " data-toggle='tooltip' data-placement='bottom' title='Imprimir o QRCODE'  a href="../images/qrcode_img/imprimir_qrcodeMq.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$mqid;?>"><i class="fa fa-print"></i> Imprimir qrcode</a>
									</div>
									<!-- /.col -->
									<!-- /.col -->
									<div class="form-group col-md-1"> 									
									
									</div>
									<!-- /.col -->
									<div class="form-group col-md-5">   
									  <label for="mq_licenca">Baixar Nota Fiscal</label><br> 
										<a class="btn-lg primary " data-toggle='tooltip' data-placement='bottom' title='Baixar Nota <?=$mq_nf;?>'    title='Baixar Arquivo'  href="../images/nota_fiscal/download.php?arquivo=<?=$mq_nota_fiscal;?>.pdf"><i class="fa fa-cloud-download fa-3x"></i></a>																															
									</div>									
									<!-- /.col -->	
								</div> 
								<!-- /.row --> 
								
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
									<!-- /.col -->		
									<div class="form-group col-md-2">  
									  <label for="eq_dpId">#Empresa:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-building"></i> 
											</div>
											<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("emp_alias")?>"/>  										
										</div>
									</div>
									<!-- /.col -->		
									<div class="form-group col-md-3">  
									  <label for="eq_dpId">#Departamento:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="glyphicon glyphicon-tasks"></i>
											</div>
											<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("dp_nome")?>"/>  
											<input type="hidden" value="<?=$rs->fld("dp_id");?>" name="eq_dpId" id="eq_dpId">
										</div>
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-3">  
									  <label for="eq_usuId">#Usu&aacute;rio:</label>
										<div class="input-group">
											<div class="input-group-addon">  
											  <i class="fa fa-user"></i>
											</div>
											<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("at_usu_nome")?>"/>  
											<input type="hidden" value="<?=$rs->fld("usu_id");?>" name="eq_usuId" id="eq_usuId">
										</div>
									</div>
									<!-- /.col -->
									<?php
									}  
									?>
								</div>
								<!-- /.row --> 
								
								<div id="graficos" class="row">	
									<div class="col-md-6"> 
										<!-- line CHART - Gráficos de Linha por ano-->
										<div class="box box-solid bg-teal-gradient">
											<div class="box-header">
											  <i class="fa  fa-heartbeat"></i>
												<h3 class="box-title">Garantia e Vida-&uacute;til</h3>
												<div class="box-tools pull-right">
													<button type="button" class="btn bg-teal btn-sm" data-widget="collapse">
													  <i class="fa fa-minus"></i>
													</button>
													<button type="button" class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i>
													</button>
												</div>
											</div>
											<div class="box-body border-radius-none">
												<div class="chart" id="line-chart2" style="height: 130px;"></div> 
											</div>
											<!-- /.box-body -->
										</div>
									</div>	 
									<!-- /.col -->		
									<div class="col-md-6">
										<!-- DONUT CHART Graficos de rosca com efeito -->
										<div class="box box-solid bg-teal-gradient">
											<div class="box-header ">
											  <i class="fa  fa-heartbeat"></i>
												<h3 class="box-title">Garantia e Vida-&uacute;til</h3>
												<div class="box-tools pull-right">
													<button type="button" class="btn bg-teal btn-sm" data-widget="collapse">
													  <i class="fa fa-minus"></i>
													</button>
													<button type="button" class="btn bg-teal btn-sm" data-widget="remove">
													  <i class="fa fa-times"></i>
													</button>
												</div>
											</div> 
											<!-- /.box-header -->
											<div class="box-body">
												<div class="row"> 
													<div class="col-md-8">
														<div class="chart-responsive">
															<canvas id="pieChart" height="109"></canvas>
														</div>
														<!-- ./chart-responsive -->
													</div>
													<!-- /.col -->
													<div class="col-md-3">
														<ul class="chart-legend clearfix">
															<li><i class="fa fa-circle-o text-blue"></i>  Vida-&uacute;til</li>
															<li><i class="fa fa-circle-o text-red"></i>   Garantia</li>
														</ul> 
													</div>
													<!-- /.col --> 
												</div> 
												<!-- /.row -->
											</div>
											<!-- /.body -->
										</div>  
										<!-- /.box -->
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->								
							</form> 
							<!-- /.form -->
						</div>
						<!-- /.body --> 							 
						
						<div class="box-footer">
							<div class="box-header with-border">
							  <h3 class="box-title">A&ccedil;&otilde;es</h3>
								<div class="box-tools pull-right"></div> 
							</div>
							
							<table id="maquinas" class="table table-bordered table-striped">     
								<tr> 
									<td>
										<button class="<?=$menu[$acao]['class'];?>" type="button" data-toggle='tooltip' data-placement='bottom' title='Alterar equipamento' id="<?=$menu[$acao]['id'];?>"><i class="<?=$menu[$acao]['icone'];?>" ></i> <?=$menu[$acao]['label'];?></button>
									</td> 									
									<td>
										<a 	class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Alterar usu&aacute;rio'  a href="at_alt_usu_Mqlocal.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$mq_id?>"><i class="fa fa-user-plus"></i> Alterar usu&aacute;rio</a>
									</td>									
									<td>
										<button type="button" id="btn_limpaMq" class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Enviar para reserva' type="submit"><i class="fa fa-plug"></i> Reserva</button>									
									</td>									
									<?php if($usu_id==0):?>
									<td>
										<a 	class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='bottom' title='Manuten&ccedil;&atilde;o'  a href="at_man_Mqlocalsemusu.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$mq_id?>"><i class="fa fa-wrench"></i> Manuten&ccedil;&atilde;o</a>
									</td>
									<?php else: ?>
									<td><a 	class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='bottom' title='Manuten&ccedil;&atilde;o'  a href="at_man_Mqlocal.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$mq_id?>"><i class="fa fa-wrench"></i> Manuten&ccedil;&atilde;o</a></td>
									<?php endif; ?> 									
									<td>
										<button type="button" id="btn_qrcodeMq" class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Gerar QRCODE' type="submit"><i class="fa fa-qrcode"></i> QRCODE</button>
									</td> 									
									<td>
										<a 	class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='bottom' title='Descarte'  a href="at_descartar_Mqlocal.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$mq_id?>"><i class="fa fa-recycle"></i> Descartar</a>
									</td>									
									<td>
										<a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='Outras ocorrencias'  a href="at_outros_Mqlocal.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$mq_id?>"><i class="glyphicon glyphicon-question-sign"></i> Outros</a>
									</td> 
									<td>
										<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Atribuir Nota'  a href="at_upload_nota_fiscal_local.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$mq_id;?>"><i class="fa fa-file-pdf-o"></i> Nota</a>
									</td>
								</tr>
							</table>
						</div>
						<!-- ./footer ação--> 		
					</div>
					<!-- ./box primary--> 
						
					<!-- general form elements -->
					<div class="box box-success">
						<div class="box-header with-border"> 
						  <h3 class="box-title">Instalados nessa M&aacute;quina</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div>  
						</div>
						<!-- /.box-header --> 
					
						<div class="box-body">
							<table id="usu" class="table table-bordered table-striped">
								<thead>
									<tr> 
										<th>C&oacute;d:</th>
										<th>Empresa</th> 
										<th>Marca</th> 
										<th>Modelo</th>
										<th>Desc</th>
										<th>Status</th>
										<th>Data</th>
										<th>Ativo</th>
										<th>A&ccedil;&otilde;es</th>  
									</tr>
								</thead>
								<tbody id="mq_cad">
									<?php require_once("at_tbEqmaquinalocal.php");?>
								</tbody>
							</table>
						</div>
						<!-- /.box-body -->
						
						<div class="box-footer">
							<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
						</div> 
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col12 -->
			</div>		
			<!-- /.row -->
		</section>
		<!-- /.content -->
      </div>
	 <!-- /.content-wrapper --> 
	  
	<?php require_once("../config/footer.php");?>
	<!-- Control Sidebar -->
	<div class="control-sidebar-bg"></div>
	<!-- /.control-sidebar -->	
</div><!-- ./wrapper --> 

<!-- jQuery 2.1.4 --> 
<script src="<?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/datepicker/bootstrap-datepicker.js"></script>	
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=$hosted;?>/dashboard/assets/plugins/morris/morris.min.js"></script>
<!-- ChartJS 1.0.1-->
<script src="<?=$hosted;?>/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
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
<script src="<?=$hosted;?>/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir -->
<script src="<?=$hosted;?>/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara -->
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
//Date picker
$('#mq_datagar').datepicker({
format: 'dd/mm/yyyy',                
language: 'pt-BR'
});
</script>
<?php
$rs = new recordset();
$sql ="	SELECT * FROM at_maquinas 
WHERE mq_id =".$mqid;  
$rs->FreeSql($sql);
$rs->GeraDados(); 
$datagar = $rs->fld("mq_datagar");
$datacad = $rs->fld("mq_datacad");
$hoje    = date("Y-m-d H:i:s");
$diferenca = strtotime($hoje) - strtotime($datacad);
$dias = floor($diferenca / (60 * 60 * 24));
$diferenca2 = strtotime($datagar) - strtotime($datacad);
$dias2 = floor($diferenca2 / (60 * 60 * 24));
?>
<!--  script  morris-->
<script>
  $(function () { 
    "use strict";
    //-----------------------------------------------\\
    //- DONUT CHART - Graficos de rosca com valores - \\
    //-------------------------------------------------\\
	var line = new Morris.Line({
    element: 'line-chart2',
    resize: true,
    data: [
      {y: '<?=$datacad;?>Q1', item1: 0, item2:0},
      {y: '<?=$datagar;?> Q2', item1: 0, item2:<?=$dias2;?>},
      {y: '<?=$hoje;?> Q3', item1: <?=$dias;?>}
    ],
    xkey: 'y',
    ykeys: ['item1', 'item2'], 
      labels: ['Vida-util', 'Garantia'], 
      lineColors: ['#3c8dbc','#f20c0c'],
    lineWidth: 2,
    hideHover: 'auto',
    gridTextColor: "#fff",
    gridStrokeWidth: 0.4,
    pointSize: 4,
    pointStrokeColors: ["#efefef"],
    gridLineColor: "#efefef",
    gridTextFamily: "Open Sans",
    gridTextSize: 10
  });    
  });
</script> 
<!--  script  chartjs-->
<script>
  $(function () {
	 //------------------------------------------\\
    //- PIE CHART - Graficos de rosca com efeito -\\
    //---------------------------------------------\\
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
       {
        value: <?=$dias2;?>,
        color: "#f20c0c",
        highlight: "#f20c0c",
        label: "Garantia" 		
      },
     
      {
       value: <?=$dias;?>,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "Vida-util"  
      }
    ];
      var pieOptions = {
      //Boolean - Whether we should show a stroke on each segment
      segmentShowStroke: true,
      //String - The colour of each segment stroke
      segmentStrokeColor: "#fff",
      //Number - The width of each segment stroke
      segmentStrokeWidth: 2,
      //Number - The percentage of the chart that we cut out of the middle
      percentageInnerCutout: 50, // This is 0 for Pie charts
      //Number - Amount of animation steps
      animationSteps: 100,
      //String - Animation easing effect
      animationEasing: "easeOutBounce",
      //Boolean - Whether we animate the rotation of the Doughnut
      animateRotate: true,
      //Boolean - Whether we animate scaling the Doughnut from the centre
      animateScale: false,
      //Boolean - whether to make the chart responsive to window resizing
      responsive: true,
      // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
      maintainAspectRatio: true,
      //String - A legend template
      legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
    };
    //Create pie or douhnut chart
    // You can switch between pie a nd douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);    
  });
</script>
</body>
</html>	