<?php

//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_eqmanutencao.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<li class="active">Atendimento </li>
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
 				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_equipamentos  b ON a.man_eqId   = b.eq_id 
				JOIN  eq_prestadoras   c ON a.man_preId  = c.pre_id 
				JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
				JOIN  at_empresas      e ON a.man_eqempId = e.emp_id
				WHERE man_id =".$manid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				$status_id      = $rs->fld("eq_statusId");
				$man_desc       = $rs->fld("man_desc");
				
				$man_obs        = $rs->fld("man_obs");
 				
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
						<form role="form" id="alt_man">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="clientes" class="row">
									<div class="form-group col-xs-1">
										<label for="man_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="man_id" id="man_id" value="<?=$rs->fld("man_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									 
									<div class="form-group col-md-2">
										<label for="pre_nome">#Prestadora:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-briefcase"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_nome" name="pre_nome"  value="<?=$rs->fld("pre_alias");?>">
									</div>
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
								 
									<div class="form-group col-md-3">
										<label for="eq_id">#Equipamento:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-keyboard-o"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_end" name="pre_end"  value="<?=$rs->fld("eq_desc");?>">
										<input type="hidden" value="<?=$rs->fld("eq_id");?>" name="eq_id" id="eq_id">
									</div>
									</div>
							 		
									 <div class="form-group  col-md-2">  
										<label for="eq_serial">#Modelo</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="eq_modelo" id="eq_modelo" value="<?=$rs->fld("eq_modelo")?>"/>  
									</div>
									</div>  
									</div>
								<div class="row"> 	
									
									<div class="form-group col-md-4">
										<label for="pre_cep">#N&ordm; Serial: </label>  
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_cep" name="pre_cep"  value="<?=$rs->fld("man_eqserial");?>">
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
									$sql ="SELECT * FROM eq_manutencao a
										JOIN  at_equipamentos  b ON a.man_eqId   = b.eq_id 
										JOIN  eq_prestadoras   c ON a.man_preId  = c.pre_id 
										JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
										JOIN  at_empresas      e ON a.man_eqempId = e.emp_id
										
										WHERE man_id =".$manid;
										$rs->FreeSql($sql);
										$rs->GeraDados();										
									?>   
									
									<div class="form-group col-md-3">
										<label for="pre_tel">#Enviado Em:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar-plus-o"></i>
										</div>
										
										<input type="text" DISABLED class="form-control" id="pre_tel" name="pre_tel"  value="<?=$fn->data_hbr($rs->fld("man_dataida"));?>">
									</div>
									</div>
									 
									<div class="form-group col-md-2">
										<label for="pre_tel">#Solicitante:</label> 
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user-secret"></i>
										</div>
										<input type="text" DISABLED class="form-control " id="pre_tel" name="pre_tel"  value="<?=$rs->fld("usu_nome");?>">
									</div>
									</div>
									
									<div class="form-group col-md-2">
									<label for="man_os">#N&ordm;O S:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-tag"></i>
										</div>									
									  <input type="text"  class="form-control" id="man_os" name="man_os"  value="<?=$rs->fld("man_os");?>">
									
								</div>
								</div>
									
									
									<div class="form-group col-md-2"> 
										<label for="man_dataretorno">#Recebido em:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar-check-o"></i>
										</div>
										
										<input type="text"  class="form-control data_br" id="man_dataretorno" name="man_dataretorno"  value="">
									</div>
									</div>
									
									<div class="form-group col-md-2">  
										<label for="man_valor">#Valor da Manuten&ccedil;&atilde;o:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>  
										
										<?php 
											if	($rs->fld("man_valor")==0): ?>
											<input type="text"  class="form-control moeda" id="man_valor" name="man_valor"  value="">
											 
											<?php else: ?>
											<input type="text"  class="form-control" id="man_valor" name="man_valor"  value="<?=$rs->fld("man_valor");?>">
											
											<?php
											endif;
										?> 										
									</div>
									</div>
									
									<!--<div class="form-group col-md-2"><!--Tem que ser antes do selectt --> 
									<!--			<label for="man_ativo">Status</label><br>  
												<input type="radio"  class="minimal" value=1 <?=($rs->fld("man_ativo")==1?"CHECKED":"");?> id="man_ativo" name="man_ativo"> Aberto<br>
												<input type="radio"  class="minimal" value=0 <?=($rs->fld("man_ativo")==0?"CHECKED":"");?> id="man_ativo" name="man_ativo"> Encerrado<br>
									</div>-->
									</div> 
									<div class="row">
									<div class="form-group col-md-5"> 
										<label for="pre_cnpj">#Motivo: </label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-exclamation-triangle"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_cnpj" name="pre_cnpj"  value="<?=$rs->fld("man_motivo");?>">
									</div> 
									</div>
									 
									 	<div class="form-group col-md-10">
										<label for="man_desc">#Servi&ccedil;os Realizados: </label>
											<textarea   class="form-control" id="man_desc" name="man_desc" ><?=$man_desc;?></textarea>
										</div> 
										
										<div class="form-group col-md-10"> 
										<label for="man_obs">#Observa&ccedil;&otilde;es: </label>
											<textarea  class="form-control" id="man_obs" name="man_obs" ><?=$man_obs;?></textarea>
										</div>
								</div> 
								
								<div id="consulta"></div>
								<div id="formerrosAltman" class="clearfix" style="display:none;">
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
								<button class="<?=$menu[$acao]['class'];?>" type="button" id="<?=$menu[$acao]['id'];?>"><i class="<?=$menu[$acao]['icone'];?>"></i> <?=$menu[$acao]['label'];?></button>
								<button type="button" id="btn_FinMan" class="btn btn-sm btn-success" data-toggle='tooltip' data-placement='bottom' title='Finalizar' type="submit"><i class="fa fa-save"></i> Finalizar</button>
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
	<!--datatables-->
    <script src="http://localhost/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://localhost/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
     <!-- ChartJS 1.0.1-->
    <script src="http://localhost/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="http://localhost/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/dashboard/assets/dist/js/demo.js"></script>
	<script src="http://localhost/dashboard/js/action_ativos.js"></script>  <!--Chama o java script -->
	<script src="http://localhost/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir --> 
	<script src="http://localhost/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara -->
	<script src="http://localhost/dashboard/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
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
		$(".select2").select2({
			tags: true,
			theme: "classic"
		});

		$(function () {
			$('#manutencao').DataTable({
		"columnDefs": [{
		"defaultContent": "-",
		"targets": "_all"
	}],
	language :{
	    "sEmptyTable": "Nenhum registro encontrado",
	    "sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",  
	    "sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
	    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
	    "sInfoPostFix": "",
	    "sInfoThousands": ".",
	    "sLengthMenu": "_MENU_ resultados por p&aacute;gina",
	    "sLoadingRecords": "Carregando...",
	    "sProcessing": "Processando...",
	    "sZeroRecords": "Nenhum registro encontrado",
	    "sSearch": "Pesquisar",
	    "oPaginate": {
	        "sNext": "Pr&oacute;ximo",
	        "sPrevious": "Anterior", 
	        "sFirst": "Primeiro",
	        "sLast": "&Uacute;ltimo"   
	    },
	    "oAria": {
	        "sSortAscending": ": Ordenar colunas de forma ascendente",
	        "sSortDescending": ": Ordenar colunas de forma descendente"
	    }
	}
	});
		});
	 
		
	</script>
	<script>
  
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('man_desc');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5(); 
  });
</script>
  </body>
</html> 
