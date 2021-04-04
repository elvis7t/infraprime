<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVOLOCAL";
$pag = "at_eqmanutencaolocal.php";// Fazer o link brilhar quando a pag estiver ativa
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
							"N" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-save", "id"=>"btn_AltManMq","label"=>"Salvar") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM mq_manutencao a
				JOIN  at_maquinas  b ON a.man_mqId   = b.mq_id 
				JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
				JOIN  at_empresas      e ON a.man_mqempId = e.emp_id
				WHERE man_id =".$manid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados(); 
				$status_id      = $rs->fld("mq_statusId");
 				$usu_nome       = $rs->fld("usu_nome");  
				$mq_status      = $rs->fld("mq_status");  
				$usu_id         = $rs->fld("mq_usuId");
				$mq_tipoId      = $rs->fld("mq_tipoId");
				$mq_fabId       = $rs->fld("mq_fabId");
				$mq_id          = $rs->fld("mq_id");
				$man_dataida    = $rs->fld("man_dataida");
				$man_dataretorno    = $rs->fld("man_dataretorno");
				$man_ticket     = $rs->fld("man_ticket");
				$man_motivo     = $rs->fld("man_motivo");
				$man_mqusuId    = $rs->fld("man_mqusuId");
 				
				
				
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
						<form role="form" id="alt_manMq">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="clientes" class="row">
									<div class="form-group col-xs-1">
										<label for="man_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="man_id" id="man_id" value="<?=$rs->fld("man_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									 
									<!--<div class="form-group col-md-2">
										<label for="pre_nome">#Prestadora:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-briefcase"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_nome" name="pre_nome"  value="<?=$rs->fld("pre_alias");?>">
									</div>
									</div>-->
									
								
									<div class="form-group col-md-2">
										<label for="pre_alias">#Empresa: </label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_alias" name="pre_alias"  value="<?=$rs->fld("emp_alias");?>">
									</div>
									</div>
								 
									<div class="form-group col-md-2">
									<?php
												$whr = "tipo_id=".$mq_tipoId;
												$rs->Seleciona("*","eq_tipo",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?> 
										<label for="tipo_desc">#Tipo:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-laptop"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("tipo_desc");?>"/>
										<input type="hidden" value="<?=$rs->fld("tipo_id");?>" name="tipo_id" id="tipo_id">
										</div> 
									</div>
									<?php
										}   
									?> 
									
									<?php
												$whr = "fab_id=".$mq_fabId ;
												$rs->Seleciona("*","mq_fabricante",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?>
									<div class="form-group col-md-2">
										<label for="marc_nome">#Fabricante:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-industry"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("fab_nome");?>"/>
										<input type="hidden" value="<?=$rs->fld("fab_id");?>" name="fab_id" id="fab_id">
										</div>
									</div>
									<?php
										}   
									?> 	

										<?php
												$whr = "mq_id=".$mq_id ;
												$rs->Seleciona("*","at_maquinas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
										?>
								   <div class="form-group  col-md-2">  
										<label for="mq_modelo">#Modelo:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-laptop"></i> 
										</div>
										<input type="text" DISABLED class="form-control" name="mq_modelo" id="mq_modelo" value="<?=$rs->fld("mq_modelo")?>"/>  
										<input type="hidden" value="<?=$rs->fld("mq_id");?>" name="mq_id" id="mq_id">
										</div>
									</div>
										 	
								 	
									
									<div class="form-group col-md-2">
										<label for="mq_tag">#Service Tag:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-tag"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="mq_tag" name="mq_tag"  value="<?=$rs->fld("mq_tag")?>"/>
										</div>
									</div>
								</div> 
								<div id="usuarios" class="row">
								<div class="form-group  col-md-2">  
										<label for="mq_nome">#Nome:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-desktop"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="mq_nome" id="mq_nome" value="<?=$rs->fld("mq_nome")?>"/>  
										</div>
									</div> 
									<?php
										}   
									?>
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
									   
									
									<div class="form-group col-md-2">
										<label for="pre_tel">#Recebido Em:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar-plus-o"></i>
										</div>
										
										<input type="text" DISABLED class="form-control" id="pre_tel" name="pre_tel"  value="<?=$fn->data_br($man_dataida );?>">
									</div> 
									</div>
									<?php
												
												$whr = "usu_id=".$man_mqusuId;
												$rs->Seleciona("*","at_usuarios a
												JOIN at_empresas      b ON a.usu_empId  = b.emp_id 
												JOIN at_departamentos c ON a.usu_dpId   = c.dp_id",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?> 
									<div class="form-group col-md-3">  
										<label for="eq_usuId">#solicitante:</label>
										<div class="input-group">
										<div class="input-group-addon">  
								 		<i class="fa fa-user"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("at_usu_nome")?>"/>  
										<input type="hidden" value="<?=$rs->fld("usu_id");?>" name="eq_usuId" id="eq_usuId">
										</div>
										</div>
									<?php
												}  
											?>
									
									<div class="form-group col-md-2">
										<label for="pre_tel">#Atendente:</label> 
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user-secret"></i>
										</div>
										<input type="text" DISABLED class="form-control " id="pre_tel" name="pre_tel"  value="<?=$usu_nome?>">
									</div>
									</div>
									<div class="form-group col-md-2">  
										<label for="man_ticket">#Chamado N&ordm;:</label> 
										<div class="input-group">
											<div class="input-group-addon">  
												<i class="fa fa-bullhorn"></i> 
											</div>
										<input type="text"  DISABLED class="form-control" name="man_ticket" id="man_ticket" value="<?=$man_ticket?>">  
										</div>
									</div>
										
									
									 
									
									
									
									<div class="form-group col-md-5"> 
										<label for="pre_cnpj">#Motivo: </label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-exclamation-triangle"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_cnpj" name="pre_cnpj"  value="<?=$man_motivo?>">  
									</div> 
									</div>
									
									<div class="form-group col-md-2">
										<label for="man_dataretorno">#Conclu&iacute;do em:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar-check-o"></i>
										</div>
										
										<input type="text"  DISABLED class="form-control data_br" id="man_dataretorno" name="man_dataretorno" value="<?=$fn->data_br($man_dataretorno);?>">
									</div>
									</div> 
									 <?php
				
										$sql ="SELECT * FROM mq_manutencao a
										JOIN  at_maquinas  b ON a.man_mqId   = b.mq_id 
										JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
										JOIN  at_empresas      e ON a.man_mqempId = e.emp_id
										WHERE man_id =".$manid;
										$rs->FreeSql($sql);
										$rs->GeraDados();
										 
										
									 ?>
									
									<div class="form-group col-md-2"><!--Tem que ser antes do selectt --> 
												<label for="man_ativo">Status</label><br>  
												<input type="radio"  DISABLED class="minimal" value=1 <?=($rs->fld("man_ativo")==1?"CHECKED":"");?> id="man_ativo" name="man_ativo"> Aberto<br>
												<input type="radio"  DISABLED class="minimal" value=0 <?=($rs->fld("man_ativo")==0?"CHECKED":"");?> id="man_ativo" name="man_ativo"> Encerrado<br>
									</div>
									</div> 
									<div class="row">
									
									
									 	<div class="form-group col-md-10">
										<label for="man_desc">#Servi&ccedil;os Realizados: </label> 
											<textarea  DISABLED  class="form-control" id="man_desc" name="man_desc" ><?=$rs->fld("man_desc");?></textarea>
										</div>
										
										<div class="form-group col-md-10"> 
										<label for="man_obs">#Observa&ccedil;&otilde;es: </label>
											<textarea  DISABLED class="form-control" id="man_obs" name="man_obs" ><?=$rs->fld("man_obs");?></textarea>
										</div>
								</div> 
								
								<div id="consulta"></div>
								<div id="formerrosAltmanMq" class="clearfix" style="display:none;">
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
  </body>
</html> 
