<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclus�o dos principais itens da p�gina */
session_start();
$sess = "ATIVO";
$pag = "at_emprestimo.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<li class="active">Equipamentos </li>
				<li class="active">Emprestimo</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_cadEqempre","label"=>"Salvar") 
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
				
				
				$usu 			= $rs->fld("usu_nome");
				$usu_id			= $rs->fld("eq_usuId");
				$dp_id 			= $rs->fld("eq_dpId");
				$mq_id 			= $rs->fld("eq_mqId");  
				$eq_usuEmp_id 	= $rs->fld("eq_usuEmpId");  
				$eq_mqEmpId 	= $rs->fld("eq_mqEmpId");  
				$eq_empId   	= $rs->fld("eq_empId");  
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
						<form role="form" id="cadeqempre">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="" class="row"> 
									<div class="form-group col-xs-1">
										<label for="eq_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="eq_id" id="eq_id" value="<?=$rs->fld("eq_id");?>"/>
										</div>
									
									<div class="form-group col-md-2">
										<label for="">#Empresa:</label>
										<div class="input-group">
										<div class="input-group-addon"> 
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("emp_alias");?>"/>
										<input type="hidden" value="<?=$rs->fld("eq_empId");?>" name="eq_empId" id="eq_empId">
										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="tipo_desc">#Tipo:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-print"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("tipo_desc");?>"/>
										<input type="hidden" value="<?=$rs->fld("tipo_id");?>" name="tipo_id" id="tipo_id">
										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="marc_nome">#Marca:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-android"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("marc_nome");?>"/>
										<input type="hidden" value="<?=$rs->fld("marc_id");?>" name="marc_id" id="marc_id">
										</div>
									</div>
									
									<div class="form-group  col-md-3">  
										<label for="eq_desc">Equipamento</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-keyboard-o"></i>
										</div>
										<input type="text" DISABLED  class="form-control" name="eq_desc" id="eq_desc" value="<?=$rs->fld("eq_desc")?>"/>  
										</div>
									</div>
									
								</div> 
								<div id="usuarios" class="row">
									
									<div class="form-group  col-md-2">  
										<label for="eq_serial">Modelo</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input type="text" DISABLED  class="form-control" name="eq_modelo" id="eq_modelo" value="<?=$rs->fld("eq_modelo")?>"/>   
										</div>
									</div>
									
									<div class="form-group  col-md-3">  
										<label for="eq_serial">N&ordm; Serial</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="eq_serial" id="eq_serial" value="<?=$rs->fld("eq_serial")?>"/>  
										</div>
									</div>
									
									<div class="form-group col-md-2">  
										<?php
												$whr = "status_id=".$status_id;
												$rs->Seleciona("*","at_status",$whr); //� o mesmo que SELECT campos FROM tabela WHERE condi��o
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
									$sql ="SELECT * FROM at_equipamentos a
										JOIN at_empresas      b ON a.eq_empId  = b.emp_id 
										JOIN eq_marca         c ON a.eq_marcId = c.marc_id
										JOIN sys_usuarios     d ON a.eq_usucad = d.usu_cod
										JOIN eq_tipo          e ON a.eq_tipoId = e.tipo_id
										JOIN at_status        f ON a.eq_statusId = f.status_id
										WHERE eq_id = ".$eqid;
										$rs->FreeSql($sql);
										$rs->GeraDados();
				
										
									?>  
									
									<div class="form-group col-md-2">  
										<label for="eq_valor">Valor</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>
										<input type="text" DISABLED  class="form-control " name="eq_valor" id="eq_valor" value="<?=$fn->formata_din($rs->fld("eq_valor"))?>"/>  
										</div>
									</div>
									
								
									  
								</div> 
								<div id="usuarios" class="row">		
										<?php
												
												$whr = "emp_id=".$eq_usuEmp_id;
												$rs->Seleciona("*","at_empresas",$whr); //� o mesmo que SELECT campos FROM tabela WHERE condi��o
												 
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
										<?php
												}  
											?>
									
									
									<?php
												$whr = "dp_id=".$dp_id;
												$rs->Seleciona("*","at_departamentos",$whr); //� o mesmo que SELECT campos FROM tabela WHERE condi��o
												 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
										?>
										 
										
										<div class="form-group col-md-2">  
										<label for="eq_dpId">Departamento</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("dp_nome")?>"/>  
										
										</div>
										</div>
										<?php
												}  
											?>
									
									
										<?php
												$whr = "usu_id=".$usu_id;
												$rs->Seleciona("*","at_usuarios",$whr); //� o mesmo que SELECT campos FROM tabela WHERE condi��o
												 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
										<div class="form-group col-md-3">  
										<label for="eq_usuId">Usu&aacute;rio</label>
										<div class="input-group">
										<div class="input-group-addon">  
								 		<i class="fa fa-user"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("at_usu_nome")?>"/>  
										
										</div>
										</div>
									
									</div> 
									<div id="usuarios" class="row">	
									
										<?php
												}  
											?>  
									
									 
									
										
										<?php
												$whr = "mq_id=".$mq_id;
												$rs->Seleciona("*","at_maquinas",$whr); //� o mesmo que SELECT campos FROM tabela WHERE condi��o
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?>

												<div class="box-header with-border"> 
												<h3 class="box-title">Utilizado Na:</h3>
												<div class="box-tools pull-right"> 
												</div>
												</div>
												
												<div class="form-group col-md-2">  
												<label for="eq_mqId">M&aacute;quina</label>
												<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-laptop"></i>
											</div> 
												<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("mq_nome")?>"/>  
												
												</div>
												</div>
										<?php
												}  
											?> 
									
										
										</div> 
										
								   <div id="usuarios" class="row"> 
								   <div class="box-header with-border"> 
									<div class="box-tools pull-right"> 
		                    
									</div>
									</div>
									 <div class="form-group col-md-2"> 
											<label for="sol_emp">Sel. uma Empresa</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
											<select class="form-control select2" id="sol_emp" name="sol_emp">    
											<option value=''>Selecione...</option>
											<?php
												$whr = "emp_id<>0";
												$rs->Seleciona("*","at_empresas",$whr); //� o mesmo que SELECT campos FROM tabela WHERE condi��o
												 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa

												?>
												<option value="<?=$rs->fld("emp_id");?>"<?=($rs->fld("emp_id")==$eq_usuEmp_id?"SELECTED":"");?>> <?=$rs->fld("emp_alias");?></option>      
												<?php
												
												}  
											?>
											</select>       
									</div>
									</div>

									<div class="form-group col-md-3"> 
											<label for="sol_dp">Sel. um Departamento</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
										</div>
											<select class="form-control select2" id="sol_dp" name="sol_dp">    
											<?php
												$whr = "dp_empId=".$eq_usuEmp_id;
												$rs->Seleciona("*","at_departamentos",$whr); //� o mesmo que SELECT campos FROM tabela WHERE condi��o
												 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("dp_id");?>"<?=($rs->fld("dp_id")==$dp_id?"SELECTED":"");?>> <?=$rs->fld("dp_nome");?></option>      
												<?php
												}  
											?>  
						
											</select>    
									</div>
									</div>
									<div class="form-group col-md-3"> 
											<label for="sol_usu">Selecione um usu&aacute;rio</label> 
											<div class="input-group"> 
										<div class="input-group-addon">  
											<i class="fa fa-user"></i>
										</div>
											<select class="form-control select2" id="sol_usu" name="sol_usu">    
											<?php
												$whr = "usu_dpId=".$dp_id;
												$rs->Seleciona("*","at_usuarios",$whr); //� o mesmo que SELECT campos FROM tabela WHERE condi��o
												 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("usu_id");?>"<?=($rs->fld("usu_id")==$usu_id?"SELECTED":"");?>> <?=$rs->fld("at_usu_nome");?></option>      
												<?php
												}  
											?> 
					
											</select>    
									</div> 
									</div> 
										
										
									<div class="form-group col-md-2">
										<label for="empre_ticket">Chamado N&ordm;</label>
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-bullhorn"></i> 
										</div>
										<input type="text" class="form-control" id="empre_ticket" name="empre_ticket"  placeholder="Desc. o N&ordm; do chamado ">
									</div>
									</div>
									
									<div class="form-group col-md-2"> 
										<label for="empre_datade">Emprestado em:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
										
										<input type="data"  class="form-control" id="empre_datade" name="empre_datade"  value="">
									</div>
									</div>
																			
								</div>  
								
								<div id="consulta"></div>
								<div id="formerrosEqempre" class="clearfix" style="display:none;"> 
									<div class="callout callout-danger"> 
										<h4>Erros no preenchimento do formul&aacute;rio.</h4>
										<p>Verifique os erros no preenchimento acima:</p>
										<ol>
											<!-- Erros s�o colocados aqui pelo validade -->
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
					
				
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Historico de Emprestimos </h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
					</div><!-- /.box-header --> 
					<!-- form start -->
					<div class="box-body">
						<table id="solicitacao" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>C&oacute;d:</th>
										<th>Empresa</th>  
										<th>Marca</th>
										<th>Equipamento</th> 
										<th>Departamento</th>
										<th>Usu&aacute;rio</th>
										<th>Data de</th>
										<th>Data ate</th>
										<th>Usu Cad</th>
										<th>Ticket</th>
										<th>A&ccedil;&otilde;es</th>
								  </tr>
							</thead> 
							<tbody id="empre_cad"> 
								<?php require_once("at_tbEqemp.php");?>      
							</tbody> 
							 
						</table>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
					</div> 
							
              </div><!-- /.box --> 
					
				
				
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
	<!-- Validation --> 
	<!-- SELECT2 TO FORMS --> 

	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
		<script>

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
			$('#solicitacao').DataTable({
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
	
	//Date picker
    $('#empre_datade').datepicker({
      format: 'dd/mm/yyyy',                
    language: 'pt-BR'
    });	
	</script>
  </body>
</html> 
</html>	 