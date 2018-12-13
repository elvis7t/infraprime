<?php

//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclus�o dos principais itens da p�gina */
session_start();
$sess = "ATIVOLOCAL";
$pag = "at_prestadoraslocais.php";// Fazer o link brilhar quando a pag estiver ativa
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
			<h1>
					Ativos Locais
				<small>Equipamentos</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Prestadora </li>
				<li class="active">Ver Dados</li>
			</ol>
        </section> 

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-warning btn-sm", "icone" => "fa fa-recycle", "id"=>"btn_Altpre","label"=>"Alterar") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM eq_prestadoras 
				  WHERE pre_id = ".$preid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				
 				
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
						<form role="form" id="alt_emp">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="clientes" class="row">
									<div class="form-group col-xs-1">
										<label for="pre_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="pre_id" id="pre_id" value="<?=$rs->fld("pre_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									 
									<div class="form-group col-md-5">
										<label for="pre_nome">#Raz&atilde;o social:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-briefcase"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_nome" name="pre_nome"  value="<?=$rs->fld("pre_nome");?>">
									</div>
									</div>
									
								
									<div class="form-group col-md-2">
										<label for="pre_alias">#Apelido: </label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-briefcase"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_alias" name="pre_alias"  value="<?=$rs->fld("pre_alias");?>">
									</div>
									</div>
									<div class="form-group col-md-3">
										<label for="pre_cnpj">#CNPJ: </label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_cnpj" name="pre_cnpj"  value="<?=$rs->fld("pre_cnpj");?>">
									</div>
									</div>
							</div>
							<div class="row"> 
							
							
									<div class="form-group col-md-2">
										<label for="pre_ie">#Inscri&ccedil;&atilde;o Estadual:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control iest" id="pre_ie" name="pre_ie"  value="<?=$rs->fld("pre_ie");?>">
									</div>
									</div>
								
								<div class="form-group col-md-2">
										<label for="cep">#CEP: </label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-street-view"></i> 
											</div>
										<input type="text" DISABLED class="form-control cep" id="cep" name="cep"  value="<?=$rs->fld("pre_cep");?>" <?=$disable; ?>>
									</div>
									</div>
							 								
									
									<div class="form-group col-md-5"> 
										<label for="log">#Logradouro:</label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-signs"></i>
												
											</div>
										<input DISABLED class="form-control input-sm text-uppercase" id="log" value="<?=$rs->fld("pre_log");?>" <?=$disable; ?>>
									</div>
									</div>
									<div class="form-group col-md-2">
									  <label for="num">#N&uacute;mero:</label>
									  <div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-marker"></i>
									</div>
									  <input DISABLED class="form-control input-sm" id="num" name="num"  value="<?=$rs->fld("pre_num");?>" <?=$disable; ?>>
									</div>
									</div>
							
							</div>
								<div class="row"> 
							
							
									<div class="form-group col-md-2">
									  <label for="compl">#Complemento:</label>
									  <div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-etsy"></i> 
									</div>
									  <input DISABLED class="form-control input-sm text-uppercase" id="compl" name="compl" value="<?=$rs->fld("pre_compl");?>" <?=$disable; ?>>
									</div>
									</div>

							
									
									<div class="form-group col-md-5">
									<label for="emp_bai">#Bairro:</label>
									<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-map-o"></i>
									</div>
									<input DISABLED class="form-control input-sm text-uppercase" id="bai"  value="<?=$rs->fld("pre_bai");?>" <?=$disable; ?>>
									</div>
									</div>
									
									<div class="form-group col-md-3">
										  <label for="emp_cid">Cidade</label>
										  <div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-map"></i>
										</div>
										  <input DISABLED class="form-control input-sm text-uppercase" id="cid"  value="<?=$rs->fld("pre_cid");?>" <?=$disable; ?>>
										</div>
										</div>



										<div class="form-group col-md-2">
									  <label for="emp_uf">UF</label>
									   <div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-map"></i>
										</div>
									  <input DISABLED class="form-control input-sm text-uppercase" id="uf"   value="<?=$rs->fld("pre_uf");?>" <?=$disable; ?>>
										</div>
										</div>  
										
										
							</div>
							<div class="row">
										<div class="form-group col-md-3">  
										<label for="pre_contato">#Contato:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-address-card"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_contato" name="pre_contato"  value="<?=$rs->fld("pre_contato");?>">
									</div>
									</div>
									
								
									<div class="form-group col-md-4">
									<label for="pre_email">#E-mail:</label>									  
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-envelope"></i>
										</div>
									  <input type="text" DISABLED class="form-control" id="pre_email" name="pre_email"  value="<?=$rs->fld("pre_email");?>">
									
								</div>
								</div>
									<div class="form-group col-md-2">
										<label for="pre_tel">#Telefone:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-phone-alt"></i>
										</div>
										<input type="text" DISABLED class="form-control fone" id="pre_tel" name="pre_tel"  value="<?=$rs->fld("pre_tel");?>">
									</div>
									</div>
									 
									<div class="form-group col-md-6">  
										<label for="pre_site">#Site:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-google"></i>
										</div>  
										
										<a href="<?=$rs->fld("pre_site");?>"><?=$rs->fld("pre_site");?></a>
									</div>
								</div>
								</div>
								
								<div id="consulta"></div>
								<div id="formerros1" class="clearfix" style="display:none;">
									<div class="callout callout-danger">
										<h4>Erros no preenchimento do formul&aacute;rio.</h4>
										<p>Verifique os erros no preenchimento acima:</p>
										<ol>
											<!-- Erros s�o colocados aqui pelo validade -->
										</ol> 
									</div>
								</div>
							</div><!-- /.box-body --> 
							
							<div class="box-footer">
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
							</div>
							
						</form>
					</div><!-- /.box -->
				<!-- general form elements -->
				<div class="box box-success ">
					<div class="box-header with-border">
						<h3 class="box-title">Historico de Atendimentos</h3><div class="box-tools pull-right"> 
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-ninus"></i></button>   
						</div>
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body"> 
						<table id="manutencao" class="table table-bordered table-striped">
							<thead>
								    <tr>
										<th>C&oacute;d:</th>
										<th>Equipamento</th> 
										<th>Empresa</th> 
										<th>Data Ida</th> 
										<th>Data Retorno</th> 
										<th>Solicitante</th> 
										<th>O S</th> 
										<th>Valor</th> 
										<th>Status</th> 
								  </tr>
							</thead>
							<tbody id="Pre_cad"> 
								<?php require_once("at_tbPrestacaolocal.php");?>   
							</tbody> 
							<?="<tr><td colspan=7><strong>".$rs->linhas." Atendimentos</strong></td></tr>";?>
						</table>
							
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
