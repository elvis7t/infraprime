<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "COM";
$pag = "at_compras.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
date_default_timezone_set("America/Sao_Paulo");
$fn = new functions(); 
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>
						Ativos
				<small>Compras Infra</small>
			</h1>
			
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Solicita&ccedil;&atilde;o de compra</li>
				<li class="active">Ver Dados</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_AltMan","label"=>"Alterar") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM at_compras a
						JOIN  at_departamentos   c ON a.comp_dpId  = c.dp_id 
						JOIN  sys_usuarios       d ON a.comp_usucad = d.usu_cod
						JOIN  at_empresas        e ON a.comp_empId = e.emp_id
						JOIN  comp_status        f ON a.comp_statusId = f.status_id
						
					WHERE comp_id =".$compid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				$status_id      = $rs->fld("comp_statusId");
				$comp_desc      = $rs->fld("comp_desc");
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
						<form role="form" id="ger_comp">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="clientes" class="row">
									<div class="form-group col-xs-1">
										<label for="empre_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="comp_id" id="comp_id" value="<?=$rs->fld("comp_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										
									</div>
																										
								
									<div class="form-group col-md-2">
										<label for="pre_alias">#Empresa: </label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_alias" name="pre_alias"  value="<?=$rs->fld("emp_alias");?>">
									</div>
									</div>
									
									<div class="form-group  col-md-2">  
										<label for="eq_serial">#Departamento</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="eq_modelo" id="eq_modelo" value="<?=$rs->fld("dp_nome")?>"/>  
									</div>
									</div> 
								 
									<div class="form-group col-md-2"> 
										<label for="comp_datacad">#Solicitado em:</label>  
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar-check-o"></i>
										</div>
										
										<input type="text" DISABLED class="form-control data_br" id="comp_datacad" name="comp_datacad"  value="<?=$fn->data_br($rs->fld("comp_datacad"));?>">
									</div>
									</div>
							 		
									<div class="form-group col-md-3">
										<label for="pre_tel">#Solicitante:</label> 
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user-secret"></i>
										</div>
										<input type="text" DISABLED class="form-control " id="pre_tel" name="pre_tel"  value="<?=$rs->fld("usu_nome");?>">
										<input type="hidden" value="<?=$rs->fld("usu_cod");?>" name="usu_cod" id="usu_cod">
									</div>
									</div>
									
									<div class="form-group col-md-8">
										<label for="pre_cep">#Titulo: </label>  
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-cart-arrow-down"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_cep" name="pre_cep"  value="<?=$rs->fld("comp_titulo");?>">
									</div>
									</div>
									
									</div> 
									<div class="row">
								
								<div class="form-group col-md-3 "> 
										<label for="sel_status">Selecione O Status</label>
										<div class="input-group">
										<div class="input-group-addon"> 
											<i class="<?=$status_classe?>"></i>
										</div>
										<select class="form-control select2" id="sel_status" name="sel_status">
												 <option value="">Selecione:</option>
												<?php
													$whr = "status_id<>0";
													$rs->Seleciona("*","comp_status",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
													while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
													?>
													<option value="<?=$rs->fld("status_id");?>"<?=($rs->fld("status_id")==$status_id?"SELECTED":"");?>><?=$rs->fld("status_desc");?>  </option>
													<?php
													} 
												?>
											</select>
										</div>
									</div>
														
									
									<?php
									$sql ="SELECT * FROM at_compras a
											JOIN  at_departamentos   c ON a.comp_dpId  = c.dp_id 
											JOIN  sys_usuarios       d ON a.comp_usucad = d.usu_cod
											JOIN  at_empresas        e ON a.comp_empId = e.emp_id
											JOIN  comp_status        f ON a.comp_statusId = f.status_id
											
										WHERE comp_id =".$compid;
										$rs->FreeSql($sql);
										$rs->GeraDados();
										 
										
										
									?>   
									
									
									
									<div class="form-group col-md-2">
										<label for="comp_valor">Valor total</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i> 
										</div>
										<input type="text" class="form-control" id="comp_valor" name="comp_valor"  value="<?=$rs->fld("comp_valor");?>">
									</div>
									</div> 
											
									
									
									
									</div> 
									<div class="row">
										
										<div class="form-group col-md-10"> 
										<label for="comp_desc">Solicita&ccedil;&atilde;o: </label>
											<textarea   class="form-control" id="comp_desc" name="comp_desc" ><?=$rs->fld("comp_desc");?></textarea>
										</div>

								</div> 
								
										<div class="row">
										<div class="box-header with-border"> 
										<h3 class="box-title">Interagir nessa solicita&ccedil;&atilde;o </h3>
										<div class="box-tools pull-right"> 
										</div>
										</div>
										
									<div class="form-group col-md-12">
										<label for="emp_cnpj">Intera&ccedil;&atilde;o :</label>
										<textarea class="form-control" name="comp_obs" id="comp_obs"></textarea>
									</div>
									

								</div>
								
								<div id="consulta"></div>
								<div id="formerrosFimcomp" class="clearfix" style="display:none;">
									<div class="callout callout-danger">
										<h4>Erros no preenchimento do formul&aacute;rio.</h4>
										<p>Verifique os erros no preenchimento acima:</p> 
										<ol>
											<!-- Erros são colocados aqui pelo validade -->
										</ol>  
									</div>
								</div>  
							</div><!-- /.box-body --> 
							
							<div class="box-footer">  
								
								<button type="button" id="btn_Interagircomp"    class="btn btn-sm btn-warning" data-toggle='tooltip' data-placement='bottom' title='Interagir' type="submit"><i class="fa fa-pencil-square-o"></i> Interagir</button>
								<button type="button" id="btn_AltComp"   class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar'  type="submit"><i class="fa fa-refresh"></i> Alterar</button>
								<button type="button" id="btn_FinComp" class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Finalizar' type="submit"><i class="fa fa-save"></i> Finlizar</button>
								
							</div>
							 
						</form> 
					
              </div><!-- /.box --> 
				
				</div><!-- ./row -->
				</div>
							<div class="row">
					<div class="col-md-12">
						<div class="box box-success" id="firms">
							<div class="box-header with-border">
								<h3 class="box-title">Tr&acirc;mites desta Solicita&ccedil;&atilde;o</h3>
							</div><!-- /.box-header -->
							<div class="box-body">
								 
						 <?php require_once("at_tbcompObs.php"); ?>
								
							</div>
						</div><!-- ./box -->
					</div><!-- ./col -->
				</div>
		</section>
	</div>
 <?php 
        require_once("../config/footer.php");
        
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
	<!--datatables-->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=$hosted;?>/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
     <!-- ChartJS 1.0.1-->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/demo.js"></script>
	<script src="<?=$hosted;?>/dashboard/js/action_ativos.js"></script>  <!--Chama o java script -->
	<script src="<?=$hosted;?>/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir --> 
	<script src="<?=$hosted;?>/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara -->
	<script src="<?=$hosted;?>/dashboard/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
	<!-- Validation --> 
	<!-- SELECT2 TO FORMS --> 

	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script>
	/*------------------------|INICIA TOOLTIPS E POPOVERS|---------------------------------------*/
		$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();
	});
	
	 
 
</script>

	<script>
  
 $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('comp_obs'); 
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5(); 
  });
</script>  
  </body>
</html> 
