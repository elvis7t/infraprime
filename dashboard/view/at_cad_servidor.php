<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO"; 
$pag = "at_servidor.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>Ativos
				<small>Servidores</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Cadastro de Servidor </li>
			</ol>
        </section>
        <!-- /.content-header -->

        <!-- Main content --> 
        <section class="content">
			<!-- Info boxes -->
			<div class="row">
				<?php
					$rs = new recordset();
					$sql ="SELECT * FROM at_empresas 
					WHERE  emp_id=".$_SESSION['usu_empresa'];
					$rs->FreeSql($sql);
					$rs->GeraDados();
				?> 
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Cadastro de Servidor</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div>
						</div>
						<!-- /.box-header -->						
						
						<div class="box-body">
							<form id="cad_Servidor" role="form">
							<!-- form start -->
								<div class="row">
									<div class="form-group col-md-3 "> 
									  <label for="sel_empeq">Selecione a Empresa</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-building"></i>
											</div>
											<select class="form-control select2" id="sel_empeq" name="sel_empeq">
												<option value="">Selecione:</option>
												<?php
												$whr = "emp_id<>0";
												$rs->Seleciona("*","at_empresas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("emp_id");?>"><?=$rs->fld("emp_alias");?></option>
												<?php
												} 
												?>
											</select>
										</div> 
									</div> 
									<!-- /.col -->
									<div class="form-group col-md-3"> 
									  <label for="sel_tipoeq">Selecione o Tipo</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-laptop"></i>
											</div>
											<select class="form-control select2" id="sel_tipoeq" name="sel_tipoeq">
												<option value="">Selecione:</option>
											</select>
										</div>
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-3 "> 
									  <label for="sel_fabmq">Selecione O Fabricante</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-industry"></i>
											</div>
											<select class="form-control select2" id="sel_fabmq" name="sel_fabmq">
												<option value="">Selecione:</option>											
											</select> 
										</div> 
									</div> 
									<!-- /.col -->									
									<div class="form-group col-md-2">
									  <label for="mq_modelo">Modelo</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-server"></i>
											</div>
											<input type="text" class="form-control" id="mq_modelo" name="mq_modelo"  placeholder="Desc. o Modelo ">
										</div>
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row --> 
								
								<div class="row">									
									<div class="form-group col-md-2">
									  <label for="mq_nome">Nome</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-desktop"></i>
											</div>
											<input type="text" class="form-control" id="mq_nome" name="mq_nome"  placeholder="Ex. WK01FIN01">
										</div>
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-2">
									  <label for="mq_tag">Service Tag</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-tag"></i>
											</div>
											<input type="text" class="form-control" id="mq_tag" name="mq_tag"  placeholder="Desc. A tag">
										</div>
									</div>
									<!-- /.col -->	
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
												<option value="<?=$rs->fld("mem_id");?>"><?=$rs->fld("mem_tipo");?> <?=$rs->fld("mem_cap");?></option>
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
												<option value="<?=$rs->fld("hd_id");?>"><?=$rs->fld("hd_tipo");?> <?=$rs->fld("hd_cap");?></option>
												<?php
												} 
												?>
											</select>
										</div> 
									</div> 
									<!-- /.col -->											
									<div class="form-group col-md-3">
									  <label for="mq_proc">Processador</label> 
										<div class="input-group">
											<div class="input-group-addon">
										      <i class="fa fa-bug"></i>
											</div>
											<input type="text" class="form-control" id="mq_proc" name="mq_proc"  placeholder="Desc. O Processador ">
										</div>
									</div>								
									<!-- /.col -->
								</div>
								<!-- /.row -->
									
								<div class="row">
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
												<option value="<?=$rs->fld("os_id");?>"><?=$rs->fld("os_desc");?>   <?=$rs->fld("os_versao");?></option>
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
											  <i class="fa fa-smile-o"></i>
											</div>
											<select class="form-control select2" id="sel_mqstatus" name="sel_mqstatus">
												<option value="">Selecione:</option>
												<?php
												$whr = "status_id<>0";
												$rs->Seleciona("*","at_status",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("status_id");?>"><?=$rs->fld("status_desc");?></option>
												<?php
												} 
												?>
											</select>
										</div>
									</div> 
									<!-- /.col -->																		
									<div class="form-group col-md-2">
									  <label for="mq_nf">N&ordm; Nota Fiscal</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-key"></i>
											</div>
											<input type="text" class="form-control" id="mq_nf" name="mq_nf"  placeholder="Desc. o N&ordm da Nota Fiscal ">
										</div>
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-2">
									  <label for="mq_valor">Valor</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-usd"></i>
											</div>
											<input type="text" class="form-control moeda" id="mq_valor" name="mq_valor"  placeholder="Desc. o Valor ">
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="mq_datacad">Comprado em:</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-calendar-check-o"></i>
											</div>										
											<input type="data"  class="form-control" id="mq_datacad" name="mq_datacad"  value="">
										</div>
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->
								
								<div class="row">		
									<div class="form-group col-md-2">
									  <label for="mq_datagar">Garantia at&eacute;:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-calendar-check-o"></i>
											</div>										
											<input type="data"  class="form-control" id="mq_datagar" name="mq_datagar"  value="">
										</div>
									</div> 
									<!-- /.col -->
									<div class="form-group col-md-4">
									  <label for="mq_mschave">Chave de Licen&ccedil;a</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-key"></i>
											</div>
											<input type="text" class="form-control" id="mq_mschave" name="mq_mschave"  value=""/>
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group  col-md-2">  
									  <label for="mq_ip">#IP:</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-sitemap"></i>
											</div>
											<input type="text"  class="form-control iest" name="mq_ip" id="mq_ip" value=" "/>  
										</div>
									</div> 
									<!-- /.col -->
									<div class="form-group col-md-1"><!--Tem que ser antes do selectt --> 
									  <label for="mq_licenca">licen&ccedil;a</label><br>  
										<input type="radio" class="minimal" value=1 CHECKED id="mq_licenca" name="mq_licenca"> OEM<br>
										<input type="radio" class="minimal" value=0         id="mq_licenca" name="mq_licenca"> Open<br>
									</div>
									<!-- /.col -->									
									<div class="form-group col-md-1"><!--Tem que ser antes do selectt -->  
									  <label for="mq_servtp">Aloca&ccedil;&atilde;o</label><br>  
										<input type="radio" class="minimal" value=f CHECKED id="mq_servtp" name="mq_servtp"> Fisico<br>
										<input type="radio" class="minimal" value=v         id="mq_servtp" name="mq_servtp"> Virtual<br>										
									</div>
									<!-- /.col -->
									<div class="form-group col-md-1"><!--Tem que ser antes do selectt -->  
									  <label for="mq_servcluster">Cluster</label><br>  
										<input type="radio" class="minimal" value=1 CHECKED id="mq_servcluster" name="mq_servcluster"> Sim<br>
										<input type="radio" class="minimal" value=0         id="mq_servcluster" name="mq_servcluster"> Nao<br>
									</div>
								</div>								      
								
								<div class="row">								      
									<div class="form-group col-md-2">   
									  <label for="mq_servsn">#Numero de serie:</label>  
										<div class="input-group">
											<div class="input-group-addon">  
											  <i class="fa fa-key"></i>
											</div>
										<input type="text" class="form-control" name="mq_servsn" id="mq_servsn" value="<?=$mq_servsn?>"/>  
										</div>  
									</div>
								</div>								      
								<!-- /.col -->					
								<div id="formerrosSr" class="clearfix" style="display:none;">   
									<div class="callout callout-danger"> 
										<h4>Erros no preenchimento do formul&aacute;rio.</h4>
										<p>Verifique os erros no preenchimento acima:</p>
										<ol> 
											<!-- Erros são colocados aqui pelo validade -->
										</ol> 
									</div> 
								</div>
								<!-- /.col -->	
								<div id="mens"></div>
								<!-- /.col -->									
							</form>
							
							<div class="box-footer">
								<button type="button" id="btn_cadServidor" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
							</div>
						</div>
						<!-- /.box-body -->	
					</div>
					<!-- ./box primary--> 
					
					<!-- general form elements -->
					<div class="box box-success">
						<div class="box-header with-border">
						 <h3 class="box-title">Servidores Cadastrados</h3>
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
										<th>Fabricante</th>
										<th>Tipo</th>
										<th>Nome</th>
										<th>Status</th>
										<th>Sitema</th> 
										<th>Tag</th> 
										<th>Usu Cad</th>
										<th>Ativo</th>
										<th>A&ccedil;&otilde;es</th> 
									</tr>
								</thead>									
								<tbody id="tb_servidor">
									<?php require_once("at_tbServidor.php");?>
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

    <?php require_once("../config/footer.php");//require_once("../config/side.php");      ?>
	<!-- Control Sidebar -->
	<div class="control-sidebar-bg"></div>
	<!-- /.control-sidebar -->	
</div>
<!-- ./wrapper -->

<!-- jQuery 2.1.4 --> 
<script src="<?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/datepicker/bootstrap-datepicker.js"></script>	
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
<script src="<?=$hosted;?>/dashboard/js/action_ativos.js"></script>  <!--Chama o java script -->
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
$('#mq_datacad').datepicker({
format: 'dd/mm/yyyy',                
language: 'pt-BR'
});

$('#mq_datagar').datepicker({
format: 'dd/mm/yyyy',                
language: 'pt-BR'
});
</script>
</body>
</html> 
