<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "REL";
$pag = "at_relatorio_at_empresa.php";
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");

$rs = new recordset();
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>
				Relat&oacute;rios
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li>Relat&oacute;rios</li>
				<li class="active">Sele&ccedil;&atilde;o</li>
			</ol>
        </section>

        <!-- Main content -->
        <section class="content">
			<!-- Info boxes -->
			<div class="row"> 
				<!-- left column -->
				<div class="col-md-12"> 
				<!-- general form elements -->
					
				<!-- general form elements --> 
				<div class="box box-success"> 
					<div class="box-header with-border">
						<h3>
							<i class="fa fa-globe"></i>  Relat&oacute;rios de ativos por Empresa<small class="pull-right">Data: <?=date("d/m/Y");?></small></h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>    
						</div> 
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table id="fabricante" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>C&oacute;d:</th>
										<th>Descri&ccedil;&atilde;o</th>     
										<th>Apelido</th> 
										<th>CNPJ</th> 
										<th>Relat&oacute;rios</th>
								  </tr>
							</thead>
							<tbody id="Mq_cad">  
								<?php require_once("at_tbRelempresas.php");?>   
							</tbody> 
							 
						</table> 
					</div><!-- /.box-body --> 
					<div class="box-footer">
				
			</div>
							
              </div><!-- /.box --> 
			
          </div>
        </section><!-- /.content --> 
	</div>
	
	<?php
		require_once("../config/footer.php");
	?></div><!-- ./wrapper -->

<script src="http://localhost/infraprime/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://localhost/infraprime/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/app.min.js"></script>
   <!-- Slimscroll -->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    
    <script src="http://localhost/infraprime/dashboard/assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="http://localhost/infraprime/dashboard/assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="http://localhost/infraprime/dashboard/assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <script src="http://localhost/infraprime/dashboard/js/action_ativos.js"></script>
    <script src="http://localhost/infraprime/dashboard/js/jquery.cookie.js"></script>
    <script src="http://localhost/infraprime/dashboard/js/controle.js"></script>

	<!-- SELECT2 TO FORMS
	-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	<!-- Validation -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script>
		$(".select2").select2({
			tags: true,
			theme: "classic"
		});
		$(".date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/aaaa"});	
		
	</script>

</body>
</html>	