<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "USU";
$pag = "sys_vis_usu_logado.php";
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
            Usu&aacute;rio
           		<small>Online</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Usu&aacute;rios Online</li>
			</ol>
        </section>
        <!-- Main content --> 
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Usu&aacute;rios Logados</h3>
						<div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
					</div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table id="usuarios" class="table table-bordered table-striped">
						<thead>
							  <tr>
									<th>ID:</th>
									<th>Usu&aacute;rio</th>
									<th>Hor&aacute;rio</th>
									<th>Expira</th>
									<th>Status</th>
									
							 </tr>
						</thead>
						<tbody id="usu_cad">
							<?php require_once("sys_tbUsulogado.php");?>     
						</tbody>
						 
					</table>
										
                 </div><!-- /.box-body -->
					<div class="box-footer">
						<button type="button" class="btn btn-sm btn-danger"  id="btn_truncate" data-toggle='tooltip' data-placement='bottom' title='Excluir'><i class="fa fa-trash"></i>  </button>  
					</div>		
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
    <script src="<?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <!-- AdminLTE for demo purposes -->
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/demo.js"></script>
    <script src="<?=$hosted;?>/dashboard/js/action_usuarios.js"></script>
    <script src="<?=$hosted;?>/dashboard/js/maskinput.js"></script>
    <script src="<?=$hosted;?>/dashboard/js/jmask.js"></script>
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
