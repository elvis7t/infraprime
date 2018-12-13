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
$fn = new functions();

?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>
						Ativos
				<small>M&aacute;quinas</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">M&aacute;quinas </li>
				<li class="active">Emprestimo</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_cadMqempre","label"=>"Salvar") 
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
				$var = $rs->fld("emp_id");
				$usu = $rs->fld("usu_nome");
				$dp_id = $rs->fld("dp_id");
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
						<form role="form" id="cadmqempre">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="" class="row"> 
									<div class="form-group col-xs-1">
										<label for="mq_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="mq_id" id="mq_id" value="<?=$rs->fld("mq_id");?>"/>
										</div>
									
									<div class="form-group col-md-2">
										<label for="">#Empresa:</label>
										<div class="input-group"> 
										<div class="input-group-addon"> 
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("emp_alias");?>"/>
										<input type="hidden" value="<?=$rs->fld("mq_empId");?>" name="mq_empId" id="mq_empId">
										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="tipo_desc">#Tipo:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-print"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("tipo_desc");?>"/>
										<input type="hidden" value="<?=$rs->fld("tipo_id");?>" name="tipo_id" id="tipo_id">
										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="marc_nome">#Fabricante:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-android"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("fab_nome");?>"/>
										<input type="hidden" value="<?=$rs->fld("fab_id");?>" name="fab_id" id="fab_id">
										</div>
									</div>
									
									<div class="form-group  col-md-2">  
										<label for="mq_nome">M&aacute;quina</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-keyboard-o"></i>
										</div>
										<input type="text" DISABLED  class="form-control" name="mq_nome" id="mq_nome" value="<?=$rs->fld("mq_nome")?>"/>  
										</div>
									</div>
									
								</div> 
								<div id="usuarios" class="row">
									
									<div class="form-group  col-md-2">  
										<label for="mq_modelo">Modelo</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input type="text" DISABLED  class="form-control" name="mq_modelo" id="mq_modelo" value="<?=$rs->fld("mq_modelo")?>"/>   
										</div>
									</div>
									
									<div class="form-group  col-md-2">  
										<label for="mq_tag">Service tag</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="mq_tag" id="mq_tag" value="<?=$rs->fld("mq_tag")?>"/>  
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
									
									<div class="form-group col-md-2">  
										<label for="mq_valor">Valor</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>
										<input type="text" DISABLED  class="form-control " name="mq_valor" id="mq_valor" value="<?=$fn->formata_din($rs->fld("mq_valor"))?>"/>  
										</div>
									</div>
									
								
									  
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
												$whr = "emp_id <> 0";
												$rs->Seleciona("*","at_empresas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa

												?>
												<option value="<?=$rs->fld("emp_id");?>"> <?=$rs->fld("emp_alias");?></option>      
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
											<option value="">Selecione:</option>  
						
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
											<option value="">Selecione:</option> 
					
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
											<i class="fa fa-calendar-check-o"></i>
										</div>
										
										<input type="text"  class="form-control data_br" id="empre_datade" name="empre_datade"  value="">
									</div>
									</div>
																			
								</div>  
								
								<div id="consulta"></div>
								<div id="formerrosMqempre" class="clearfix" style="display:none;"> 
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
										<th>Fabricante</th>
										<th>Tipo</th>
										<th>M&aacute;quina</th> 
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
								<?php require_once("at_tbMqemp.php");?>      
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
    <script src="http://localhost/infraprime/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://localhost/infraprime/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!--AdminLTE App -->
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="http://localhost/infraprime/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="http://localhost/infraprime/dashboard/assets/js/maskinput.js"></script>
    <script src="http://localhost/infraprime/dashboard/assets/js/jmask.js"></script>
    <!--datatables-->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://localhost/infraprime/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
      <!-- ChartJS 1.0.1-->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/demo.js"></script>
	<script src="http://localhost/infraprime/dashboard/js/action_ativos.js"></script>  <!--Chama o java script -->
	<script src="http://localhost/infraprime/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir -->
	<script src="http://localhost/infraprime/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara -->
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
	
		
	</script>
  </body>
</html> 
</html>	 