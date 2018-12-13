<?php

//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_descartes.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>Descarte</small>
			</h1>
			
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Descartes</li>
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
					<div class="box box-primary"> 
						<div class="box-header with-border">
							<h3 class="box-title">Equipamentos Descartados</h3><div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div> 
						</div><!-- /.box-header -->
						<!-- form start -->
						<div class="box-body">
							<table id="equipamentos" class="table table-bordered table-striped">
								<thead>
									  <tr>
											<th>Doa</th>
											<th>C&oacute;d:</th>
											<th>Empresa</th> 
											<th>Tipo</th> 
											<th>Marca</th>
											<th>Modelo</th>										
											<th>Equipamento</th>
											<th>Descarte em:</th>
											<th>Usu&aacute;rio</th>
											<th>Status</th>
									  </tr>
								</thead>
								<tbody id="eq_cad"> 
									<?php require_once("at_tbEqdescartes.php");?>     
								</tbody> 
								 
							</table>  
						</div><!-- /.box-body --> 
						
						<div class="box-footer"> 
							<div id="consulta"></div>
							<div class='col-sm-4'>
								<div class="input-group row">
									<select id="cc_colab" name="cc_colab" class="form-control" style="width:100%">
										<option value="">Selecione</option>
										<?php
											$whr="inst_id<>'0' AND Inst_ativo ='1'"; // Contábil
											$rs->Seleciona("*","at_instituicoes",$whr,'','inst_alias ASC');
											while($rs->GeraDados()):	
											?>
												<option value="<?=$rs->fld("inst_id");?>"><?=$rs->fld("inst_alias");?></option>
											<?php
											endwhile;
										?>
									</select>
									<span class="input-group-btn">
										<button
											id="gccart"
											class='btn btn-success' 
											data-toggle='tooltip' 
											data-placement='bottom'
											disabled
											title='Gerar Sa&iacute;da'><i class='fa fa-bank'></i> Doar para
										</button> 
									</span>
								</div>
							</div>
						</div>
								
					</div><!-- /.box --> 
				</div>
        </section><!-- /.content --><section class="content">
			<!-- Info boxes -->
			<div class="row">
				<!-- left column -->
				<div class="col-md-12"> 
				<!-- general form elements -->
					
				<!-- general form elements --> 
				<div class="box box-success">  
	 				<div class="box-header with-border">
						<h3 class="box-title">M&aacute;quinas Descartadas</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div> 
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table id="maquinas" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>Doa</th>
										<th>C&oacute;d:</th>
										<th>Empresa</th> 
										<th>Nome</th> 
										<th>Tipo</th> 
										<th>Fabricante</th>
										<th>Modelo</th>										
										<th>Descarte em:</th>
										<th>Usu&aacute;rio</th>
										<th>Status</th>
								  </tr>
							</thead>
							<tbody id="mq_cad"> 
								<?php require_once("at_tbMqdescartes.php");?>     
							</tbody> 
							 
						</table>  
					</div><!-- /.box-body --> 
					<div class="box-footer"> 
							<div id="consultar"></div>
							<div class='col-sm-4'>
								<div class="input-group row">
									<select id="cc_colab1" name="cc_colab1" class="form-control" style="width:100%">
										<option value="">Selecione</option>
										<?php
											$whr="inst_id<>'0' AND Inst_ativo ='1'"; // Contábil
											$rs->Seleciona("*","at_instituicoes",$whr,'','inst_alias ASC');
											while($rs->GeraDados()):	
											?>
												<option value="<?=$rs->fld("inst_id");?>"><?=$rs->fld("inst_alias");?></option>
											<?php
											endwhile;
										?>
									</select>
									<span class="input-group-btn">
										<button
											id="gccart1"
											class='btn btn-success' 
											data-toggle='tooltip' 
											data-placement='bottom'
											disabled
											title='Gerar Sa&iacute;da'><i class='fa fa-bank'></i> Doar para
										</button> 
									</span>
								</div>
							</div>
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
			$('#equipamentos').DataTable({
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
		$(".select2").select2({
			tags: true,
			theme: "classic"
		});

		$(function () {
			$('#maquinas').DataTable({
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
