<?php

//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVOLOCAL";
$pag = "at_mqofficelocal.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>M&aacute;quinas</small>
			</h1>
			
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Office</li>
				<!--<li>Solicita&ccedil;&atilde;o</li>-->
				<li class="active">Cadastro de Office</li>
			</ol>
        </section>
        <!-- Main content -->
        <section class="content">
			<!-- Info boxes -->
			<div class="row">
				<!-- left column -->  
				<div class="col-md-12">
				<?php
				$per = array(
					1 => array("A"=>1,"C"=>1,"E"=>1,"V"=>1),
					2 => array("A"=>1,"C"=>1,"E"=>1,"V"=>0),
					3 => array("A"=>1,"C"=>1,"E"=>0,"V"=>1),
					4 => array("A"=>0,"C"=>1,"E"=>0,"V"=>1),
					5 => array("A"=>0,"C"=>0,"E"=>0,"V"=>0)
				);
				$a = json_encode($per);
				/*
				$b = json_decode($a,true);
				$pu = $b[3]; 
				if ($pu["E"] ==1){
					echo "permitido";
				}
				else{
					echo "Negado";
				}
				
				echo "<pre>";
				print_r($_SESSION);  
				echo "</pre>";
				*/
				
				?>
				<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Cadastro de Office</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="Office" role="form">
							<div class="box-body">
								<div class="row">
									<div class="form-group col-md-5">
										<label for="office_desc">Nome </label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-opera"></i>
										</div>
										<input type="text" class="form-control" id="office_desc" name="office_desc"  placeholder="Desc. do Office">
									</div>
									</div>
								
								
									<div class="form-group col-md-3">
										<label for="office_versao">Vers&atilde;o</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-times"></i>
										</div> 
										<input type="text" class="form-control" id="office_versao" name="office_versao"  placeholder="Desc. a Vers&atilde;o">
									</div> 
									</div>
								
								</div>
								<div id="formerrosCadOffice" class="clearfix" style="display:none;"> 
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
								<button type="button" id="btn_cadOffice" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- /.box -->
				<!-- general form elements -->
				<div class="box box-success ">
					<div class="box-header with-border">
						<h3 class="box-title">Offices Cadastrados</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-ninus"></i></button>   
						</div>
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table id="empresas" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>C&oacute;d:</th>
										<th>Descri&ccedil;&atilde;o</th> 
										<th>Vers&atilde;o</th> 
										<th>A&ccedil;&otilde;es</th>
								  </tr>
							</thead>
							<tbody id="Office_cad">
								<?php require_once("at_tbOfficelocal.php");?>
							</tbody>
							 
						</table>
					</div><!-- /.box-body --> 
						<div class="box-footer">
							<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
						</div> 		
              </div><!-- /.box --> 
			
          </div>
        </section><!-- /.content --> 
      </div><!-- /.content-wrapper -->

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
	<script src="http://localhost/dashboard/js/action_ativoslocais.js"></script>  <!--Chama o java script -->
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
<script>

	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();
	});

</script> 
  </body>
</html> 