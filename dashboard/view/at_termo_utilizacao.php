<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_termo_utilizacao.php";// Fazer o link brilhar quando a pag estiver ativa
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
						Ativos
				<small>Usu&aacute;rios</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Usu&aacute;rios </li>
				<li class="active">Visualizar Dados</li></li>
			</ol>
        </section>

        <!-- Main content --> 
		<section class="content"> 
			
			<div class="row">
				<div class="col-md-12">
					<!-- general form elements --> 
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Termos Cadastrados</h3><div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div> 
						</div><!-- /.box-header -->
						<!-- form start -->
						<div class="box-body">
							<table id="Termo" class="table table-bordered table-striped">
								<thead>
									  <tr>
											<th>C&oacute;d:</th>
											<th>Empresa</th>
											<th>Departamento</th>
											<th>Funcion&aacute;rio</th>
											<th>Equipamento</th>
											<th>Cadastro</th>
											<th>Chamado</th>
											<th>data</th>
											<th>A&ccedil;&atilde;o</th>
									  </tr>
								</thead>
								<tbody id="trm_cad">
									<?php require_once("at_tbTermo.php");?>
								</tbody>
								 
							</table>
						</div><!-- /.box-body --> 
							<div class="box-footer">
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
							</div> 		
					</div><!-- /.box --> 
				</div><!-- ./col -->
			</div><!-- ./row -->
		
		</section>
</div><!-- ./wrapper --> 
		<?php 
			require_once("../config/footer.php");
			//require_once("../config/side.php"); 
		?>
      <div class="control-sidebar-bg"></div>
 
    

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
	$(document).ready(function () {
		$(".select2").select2({
			tags: true,
			theme: "classic"
		});
	});
	</script>
	<script>
		$(".select2").select2({
			tags: true,
			theme: "classic"
		});

		$(function () {
			$('#Termo').DataTable({
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