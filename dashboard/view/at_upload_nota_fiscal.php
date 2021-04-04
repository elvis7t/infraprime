<?php
//sujeira embaixo do tapete :( 
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_maquinas.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>Maquina</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Maquina</a></li>
            <li class="active">Nota Fiscal</li>
          </ol>
        </section>
		
		<section class="content">
			<?php
				extract($_GET);
				$rs = new recordset();
				$sql ="SELECT * FROM at_maquinas 
					WHERE mq_id =".$mqid;
				$rs->FreeSql($sql);
				$rs->GeraDados();
				$mq_nf = $rs->fld("mq_nf"); 
			?>
			<!-- Info boxes -->
			
			<div class="row">
				<!-- left column -->				
				<div class="col-md-12">
				 <!-- general form elements -->  
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title"> Nota Fiscal</h3>
						</div><!-- /.box-header -->
						<div class="box-body">
							<form action="../controller/sys_upload_nota_fiscal.php" drop-zone="" id="file-dropzone" class="dropzone">
								<input type="hidden" id="nome" name="nome" value="<?=$mq_nf;?>" >
								<input type="hidden" name="perfil" value="<?=$mqid;?>" >
								<div class="dz-message" data-dz-message>
									<center class="text-muted">
										<h2>Arraste a Nota Fiscal e solte aqui para fazer Upload</h2>
										<i class="fa fa-cloud-upload fa-5x"></i> 
									</center>
								</div>
							</form>
						</div><!-- /.box-body -->
					</div><!-- /.box -->			   
				</div>
			</div>
        </section><!-- /.content -->
	</div><!-- /.content-wrapper -->

    <?php require_once("../config/footer.php");?>
    
	<div class="control-sidebar-bg"></div>

</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 --> 
<script src="<?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
<!--AdminLTE App -->
<script src="<?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="<?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="<?=$hosted;?>/dashboard/assets/js/maskinput.js"></script>
<script src="<?=$hosted;?>/dashboard/assets/js/jmask.js"></script>
 <!-- ChartJS 1.0.1-->
<script src="<?=$hosted;?>/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) 
<script src="<?=$hosted;?>/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
<!-- AdminLTE for demo purposes -->
<script src="<?=$hosted;?>/dashboard/assets/dist/js/demo.js"></script>
<script src="<?=$hosted;?>/dashboard/js/action_usuarios.js"></script>  <!--Chama o java script -->
<script src="<?=$hosted;?>/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir -->
<script src="<?=$hosted;?>/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara -->
<!-- Validation --> 
<!-- SELECT2 TO FORMS --> 
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script src="<?=$hosted;?>/dashboard/js/dropzone.js"></script>
<!-- Validation -->
<script>
$(function () {
	$('[data-toggle="tooltip"]').tooltip();
	$('[data-toggle="popover"]').popover();
});
</script>
</body>
</html>
