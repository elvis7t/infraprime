<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_emprestimo.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>Equipamentos</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Emprestimo </li>
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
 				$sql ="SELECT * FROM eq_emprestimo a
						JOIN at_empresas      b ON a.empre_eqempId    = b.emp_id 
						JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
						JOIN eq_marca         d ON a.empre_eqmarcaId   = d.marc_id
						JOIN at_equipamentos  e ON a.empre_eqId     = e.eq_id
						JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
						JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
						JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
						
					WHERE empre_id =".$empreid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				$status_id      = $rs->fld("eq_statusId");
				$man_desc       = $rs->fld("man_desc");
 				
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
						<form role="form" id="fim_eqempre">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="clientes" class="row">
									<div class="form-group col-xs-1">
										<label for="empre_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="empre_id" id="empre_id" value="<?=$rs->fld("empre_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
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
										<label for="eq_serial">#Modelo</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="eq_modelo" id="eq_modelo" value="<?=$rs->fld("empre_eqmodelo")?>"/>  
									</div>
									</div> 
								 
									<div class="form-group col-md-3">
										<label for="eq_id">#Equipamento:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-keyboard-o"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="" name=""  value="<?=$rs->fld("empre_eqdesc");?>">
										<input type="hidden" value="<?=$rs->fld("eq_id");?>" name="eq_id" id="eq_id"> 
									</div>
									</div>
							 		
									  
										
									 
									<div class="form-group col-md-4">
										<label for="pre_cep">#N&ordm; Serial: </label>  
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_cep" name="pre_cep"  value="<?=$rs->fld("empre_eqserial");?>">
									</div>
									</div>
									
									</div>
								<div class="row"> 
								
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
									$sql ="SELECT * FROM eq_emprestimo a
											JOIN at_empresas      b ON a.empre_eqempId    = b.emp_id 
											JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
											JOIN eq_marca         d ON a.empre_eqmarcaId   = d.marc_id
											JOIN at_equipamentos  e ON a.empre_eqId     = e.eq_id
											JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
											JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
											JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
											
										WHERE empre_id =".$empreid;
										$rs->FreeSql($sql);
										$rs->GeraDados();
										 
										
										
									?>   
									
									<div class="form-group col-md-2">
										<label for="pre_tel">#Emprestado Em:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar-plus-o"></i>
										</div>
										
										<input type="text" DISABLED class="form-control" id="pre_tel" name="pre_tel"  value="<?=$fn->data_br($rs->fld("empre_datade"));?>">
									</div>
									</div>
									 
									<div class="form-group col-md-3">
										<label for="pre_tel">#Solicitante:</label> 
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user-secret"></i>
										</div>
										<input type="text" DISABLED class="form-control " id="pre_tel" name="pre_tel"  value="<?=$rs->fld("at_usu_nome");?>">
									</div>
									</div>
									
									<div class="form-group col-md-2">
									<label for="man_os">#Chamado N&ordm;:</label>
										<div class="input-group"> 
										<div class="input-group-addon">
											<i class="fa fa-tag"></i>
										</div>									
									  <input type="text" DISABLED class="form-control" id="man_os" name="man_os"  value="<?=$rs->fld("empre_ticket");?>">
									
								</div>
								</div>
									
									
									<div class="form-group col-md-2">
										<label for="empre_dataate">#Devolvido em:</label>
										<div class="input-group date">
										<div class="input-group-addon">
											<i class="fa fa-calendar-check-o"></i> 
										</div>
										
										<input type="data"  class="form-control" id="empre_dataate" name="empre_dataate"  value="">
									</div>
									</div>
									
									</div> 
									<div class="row">
										
										<div class="form-group col-md-10"> 
										<label for="empre_obs">#Observa&ccedil;&otilde;es: </label>
											<textarea  class="form-control" id="empre_obs" name="empre_obs" ></textarea>
										</div>
								</div> 
								
								<div id="consulta"></div>
								<div id="formerrosFimEqempre" class="clearfix" style="display:none;">
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
								<!--<button class="<?=$menu[$acao]['class'];?>" type="button" id="<?=$menu[$acao]['id'];?>"><i class="<?=$menu[$acao]['icone'];?>"></i> <?=$menu[$acao]['label'];?></button>-->
								<button type="button" id="btn_FinEqemp" class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Finalizar' type="submit"><i class="fa fa-save"></i> Finalizar</button>
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a> 
							</div>
							
						</form>
					
              </div><!-- /.box --> 
				
				</div><!-- ./row -->
				
					
				
				
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
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
	<!-- FastClick -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!--AdminLTE App -->
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
	<script src="<?=$hosted;?>/dashboard/assets/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- bootstrap datepicker -->
	<script src="<?=$hosted;?>/dashboard/assets/plugins/datepicker/bootstrap-datepicker.js"></script>
	<!-- bootstrap time picker -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
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
	
	 //Date picker
    $('#empre_dataate').datepicker({
      format: 'dd/mm/yyyy',                
    language: 'pt-BR'
    });
 
</script>

	<script>
  
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('empre_obs');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5(); 
  });
</script>
  </body>
</html> 
