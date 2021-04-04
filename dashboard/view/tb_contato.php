<?php
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "OU";
$pag = "tb_contato.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");

?>
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>
				Mensagens
				<small>Ouvidoria</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Ouvidoria</li>
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
                  <h3 class="box-title">Mensagens do site</h3>
			</div><!-- /.box-header -->
			 <!-- form start -->
                <div class="box-body">
                    <table id="familias" class="table table-bordered table-striped">
						<thead>
							  <tr>
									<th>ID</th> 
						<th>Nome</th>
						<th>Titulo</th>
						<!--<th>Mensagen</th>-->
						<th>Status</th>
						<th>Data</th>
						<th>Visualizar</th> 
							  </tr>
						</thead>
						<tbody id="u_cad">
							<?php require_once("../controller/ou_tbcontato.php");?>
				</tbody>
						 
					</table>
										
                 </div><!-- /.box-body -->
							
              </div><!-- /.box --> 
			  </div>
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
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <!-- AdminLTE for demo purposes -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/dist/js/demo.js"></script>
    <script src="https://infraprime.000webhostapp.com/dashboard/js/action_solicitacao.js"></script>
		<!-- Validation -->
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script>

	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();
	});

	</script>
  </body>
</html>
