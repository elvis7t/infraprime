<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "REL";
$pag = "at_relatorio_manutencao.php";
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
							<i class="fa fa-globe"></i>  Relat&oacute;rios de Manuten&ccedil;&atilde;o por Prestadora<small class="pull-right">Data: <?=date("d/m/Y");?></small></h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>    
						</div> 
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table id="prestadoras" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>C&oacute;d:</th>
										<th>Descri&ccedil;&atilde;o</th>     
										<th>Apelido</th> 
										<th>CNPJ</th> 
										<th>Relat&oacute;rio</th>
								  </tr>
							</thead>
							<tbody id="Mq_cad">  
								<?php require_once("at_tbRelmanutencao.php");?>   
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

<script src="http://localhost/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://localhost/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://localhost/dashboard/assets/dist/js/app.min.js"></script>
   <!-- Slimscroll -->
    <script src="http://localhost/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!--datatables-->
    <script src="http://localhost/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://localhost/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script src="http://localhost/dashboard/js/action_ativos.js"></script>
    <script src="http://localhost/dashboard/js/jquery.cookie.js"></script>
    <script src="http://localhost/dashboard/js/controle.js"></script>

	<!-- SELECT2 TO FORMS
	-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	<!-- Validation -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script>
		
		$(function () {
			$('#prestadoras').DataTable({
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