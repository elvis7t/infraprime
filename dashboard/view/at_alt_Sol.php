<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_eqsolicitacao.php";// Fazer o link brilhar quando a pag estiver ativa
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
						Ativos
				<small>Equipamentos</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Solicita&ccedil;&atilde;o </li>
				<li class="active">Visualizar Dados</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-warning btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_AltSol","label"=>"Alterar") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM eq_solicitacao a
						JOIN at_empresas      b ON a.solic_empId    = b.emp_id  
						JOIN eq_tipo          c ON a.solic_eqtipoId = c.tipo_id
						JOIN eq_marca         d ON a.solic_marcId   = d.marc_id
						JOIN at_equipamentos  e ON a.solic_eqId     = e.eq_id
						JOIN at_departamentos f ON a.solic_dpId     = f.dp_id
						JOIN at_usuarios      g ON a.solic_usuId    = g.usu_id
						
						JOIN sys_usuarios     i ON a.solic_usucad   = i.usu_cod
			
				WHERE solic_id = ".$solid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				
				$mq_id = $rs->fld("solic_mqId"); 
				$solic = $rs->fld("solic_desc"); 
				$so = $rs->fld("solic_desc"); 
				$eq_id = $rs->fld("eq_empId"); 
 				
			?>
			 <div class="row">
				<div class="col-md-12">
				<!-- general form elements --> 
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Dados do Equipamento</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
					</div><!-- /.box-header -->
						<!-- form start --> 
						<form role="form" id="alt_emp">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="solicitacao" class="row"> 
									<div class="form-group col-xs-1">
										<label for="solic_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="solic_id" id="solic_id" value="<?=$rs->fld("solic_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									<div class="form-group col-md-2">
										<label for="emp_id">#Empresa:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<?php
												$whr = "emp_id=".$eq_id;
												$rs->Seleciona("*","at_empresas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?> 
										<input type="text" DISABLED class="form-control" name="emp_nome" id="emp_nome" value="<?=$rs->fld("emp_alias");?>"/>
										<?php
												}   
											?>
										</div>
									</div>
									<?php
									$sql ="SELECT * FROM eq_solicitacao a
												JOIN at_empresas      b ON a.solic_empId    = b.emp_id 
												JOIN eq_tipo          c ON a.solic_eqtipoId = c.tipo_id
												JOIN eq_marca         d ON a.solic_marcId   = d.marc_id
												JOIN at_equipamentos  e ON a.solic_eqId     = e.eq_id
												JOIN at_departamentos f ON a.solic_dpId     = f.dp_id
												JOIN at_usuarios      g ON a.solic_usuId    = g.usu_id
												JOIN sys_usuarios     h ON a.solic_usucad   = h.usu_cod
												
									
										WHERE solic_id = ".$solid;
										$rs->FreeSql($sql);
										$rs->GeraDados();
										
										$mq_id = $rs->fld("solic_mqId"); 
										$solic = $rs->fld("solic_desc"); 
										$so = $rs->fld("solic_desc"); 
										$eq_id = $rs->fld("eq_empId");     
										$status_id      = $rs->fld("eq_statusId"); 
										
									?>
									<div class="form-group col-md-2">
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
									<div class="form-group  col-md-2">  
										<label for="eq_desc">#Equipamento:</label> 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-keyboard-o"></i>
											</div>
										<input type="text" DISABLED  class="form-control" name="eq_desc" id="eq_desc" value="<?=$rs->fld("eq_desc")?>"/>  
									</div>									
									</div>
									
									<div class="form-group  col-md-2">  
										<label for="eq_desc">#Modelo:</label> 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-mobile"></i>
											</div>
										<input type="text" DISABLED  class="form-control" name="eq_desc" id="eq_desc" value="<?=$rs->fld("eq_modelo")?>"/>  
									</div>									
									</div> 
								
										
										
								</div> 
								<div id="usuarios" class="row"> 
										
									<div class="form-group  col-md-3">  
										<label for="eq_serial">#N&ordm; Serial:</label>  
										<div class="input-group">
											<div class="input-group-addon">
											<i class="fa fa-key"></i>
											</div>
										<input type="text" DISABLED  class="form-control" name="eq_serial" id="eq_serial" value="<?=$rs->fld("eq_serial")?>"/>  
									</div>	
									</div>	
						
									<div class="form-group col-md-2">  
										<?php
												$whr = "status_id=".$status_id;
												$rs->Seleciona("*","at_status",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												$status_id      = $rs->fld("status_id");  
												$status_classe  = $rs->fld("status_classe");  
												$status_desc    = $rs->fld("status_desc"); 
												?> 
										<label for="eq_status">#Status:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="<?=$status_classe?>"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="eq_status" id="eq_status" value="<?=$status_desc?>"/>  
										</div>
									</div>
									<?php  
										}   
									?> 
									<?php
									$sql ="SELECT * FROM eq_solicitacao a
												JOIN at_empresas      b ON a.solic_empId    = b.emp_id 
												JOIN eq_tipo          c ON a.solic_eqtipoId = c.tipo_id
												JOIN eq_marca         d ON a.solic_marcId   = d.marc_id
												JOIN at_equipamentos  e ON a.solic_eqId     = e.eq_id
												JOIN at_departamentos f ON a.solic_dpId     = f.dp_id
												JOIN at_usuarios      g ON a.solic_usuId    = g.usu_id
												JOIN sys_usuarios     h ON a.solic_usucad   = h.usu_cod
												
									
										WHERE solic_id = ".$solid;
										$rs->FreeSql($sql);
										$rs->GeraDados();        
										
										$mq_id = $rs->fld("solic_mqId"); 
										$solic = $rs->fld("solic_desc"); 
										$so = $rs->fld("solic_desc"); 
										$eq_id = $rs->fld("eq_empId");     
										
										
									?> 
									
									<div class="form-group col-md-2">  
										<label for="eq_valor">#Valor:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="eq_valor" id="eq_valor" value="<?=$rs->fld("eq_valor")?>"/>  
									</div>
									</div>
								
								</div>
								<div id="" class="row">
									
									<div class="box-header with-border"> 
										<h3 class="box-title">Dados da Solicita&ccedil;&atilde;o</h3>
										<div class="box-tools pull-right"> 
										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="emp_id">#Empresa:</label> 
										<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-building"></i>
												</div>
										<input type="text" DISABLED class="form-control" name="emp_nome" id="emp_nome" value="<?=$rs->fld("emp_alias");?>"/>
										</div>
									</div>
									<div class="form-group  col-md-3">  
										<label for="dp_nome">#Departamento:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
										</div>
										<input type="text" DISABLED  class="form-control" name="dp_nome" id="dp_nome" value="<?=$rs->fld("dp_nome")?>"/>  
									</div>
									</div>
									<div class="form-group  col-md-3">  
										<label for="usu_nome">#Solicitante:</label> 
										<div class="input-group"> 
										<div class="input-group-addon">  
											<i class="fa fa-user"></i>
										</div>
										<input type="text" DISABLED  class="form-control" name="usu_nome" id="usu_nome" value="<?=$rs->fld("at_usu_nome")?>"/> 
									</div>	   
									</div>
									
									
									
										<div class="form-group col-md-3">   
										<label for="solic_data">#Cadastrado em:</label> 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar-check-o"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="solic_data" id="solic_data" value="<?= $fn->data_hbr($rs->fld("solic_data"));?>"/>  
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
								
								</div>
								<div id="" class="row">
								 <div class="form-group col-md-2">  
										<label for="solic_ticket">Chamado N&ordm;</label>
										<div class="input-group">
											<div class="input-group-addon">  
												<i class="fa fa-bullhorn"></i> 
											</div>
										<input type="text" class="form-control" name="solic_ticket" id="solic_ticket" value="<?=$rs->fld("solic_ticket")?>"/>  
										</div>
									</div>
									
																		
									  
									<div class="form-group  col-md-6">  
										<label for="solic_desc">Motivo</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-exclamation-triangle"></i>
										</div>	 
										<input type="text"  class="form-control" name="solic_desc" id="solic_desc" value="<?=$rs->fld("solic_desc")?>"/>  
									</div>					
									</div>					
									 
								</div>  
								
								<div id="consulta"></div>
								<div id="formerrosSol" class="clearfix" style="display:none;">
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
								<button class="<?=$menu[$acao]['class'];?>" type="button" id="<?=$menu[$acao]['id'];?>"><i class="<?=$menu[$acao]['icone'];?>"></i> <?=$menu[$acao]['label'];?></button>
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- ./box -->
					
				</div><!-- ./row -->
				
					
				
				
			</div>
		</section>
	</div>
 <?php 
        require_once("../config/footer.php");
        //require_once("../config/side.php"); 
      ?>
      <div class="control-sidebar-bg"></div>
 
    </div><!-- ./wrapper --> 

    <!-- jQuery 2.1.4 --> 
    <script src="http://localhost/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://localhost/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!--AdminLTE App -->
    <script src="http://localhost/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="http://localhost/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="http://localhost/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="http://localhost/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="http://localhost/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="http://localhost/dashboard/assets/js/maskinput.js"></script>
    <script src="http://localhost/dashboard/assets/js/jmask.js"></script>
     <!-- ChartJS 1.0.1-->
    <script src="http://localhost/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="http://localhost/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/dashboard/assets/dist/js/demo.js"></script>
	<script src="http://localhost/dashboard/js/action_ativos.js"></script>  <!--Chama o java script -->
	<script src="http://localhost/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir -->
	<script src="http://localhost/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara -->
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