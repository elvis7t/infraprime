	<?php
$sess = "PROD";
$pag = "ou_vis_msn.php";
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
				<table id="contato" class="table table-bordered table-striped">
				<thead>
					<tr> 
						<th>ID</th>
						<th>Nome</th>
						<th>Titulo</th>
						<th>Status</th>
						<th>Data</th>
						<th>Anexo</th>
						 
					 </tr>
				</thead>
						
				<?php
					require_once("../model/recordset.php");
					require_once("../class/class.functions.php");
					$fn = new functions();
					$rs_user = new recordset();
					$ou_contato_Id=$_GET['contato_Id'];
					
					/*$sql ="UPDATE ou_contato_site SET ou_contato_status = 'visualizado'
						WHERE ou_contato_Id =".$ou_contato_Id;*/     
					
					
										
					$sql ="SELECT * FROM ou_contato_site a  
							LEFT JOIN ou_imagens b ON a.contato_Id = b.img_contatoId
						WHERE contato_Id =".$ou_contato_Id;
					$rs_user->FreeSql($sql);
					while($rs_user->GeraDados()){?>
						<tr>
							<td><?=$rs_user->fld("contato_Id");?></td>
							<td><?=$rs_user->fld("contato_nome");?></td>
							<td><?=$rs_user->fld("contato_titulo");?></td>
							<td><?=$rs_user->fld("contato_status");?></td> 
							<td><?=$fn->data_hbr($rs_user->fld("contato_data"));?></td>
							<td>
							<?php
								if($rs_user->fld("img_ender") <> ""){
							?>
								
								<a href="../../controller/ou_download.php?arquivo=<?=$rs_user->fld("img_ender");?>" ><i class="fa fa-paperclip">  Download</i></a>
							<?php } ?>
							</td>  
						</tr> 
				</table>
				
				<table id="contato" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Mensagem</th>
						</tr>
					</thead>
						<tr> 
							<td><textarea class="form-control" rows="4"><?=$rs_user->fld("contato_mensagem");?></textarea></td>
						</tr>
		
		
<?php 
	}
?> 

				
						 
					</table>
     </div><!-- /.box --> 
			  </div>
          </div>
          </div>
        </section><!-- /.content -->
      </div>
 



  <?php 
        require_once("../config/footer.php");
        //require_once("../config/side.php");
      ?>
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="<?=$hosted;?>/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=$hosted;?>/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=$hosted;?>/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=$hosted;?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?=$hosted;?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=$hosted;?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=$hosted;?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <!-- AdminLTE for demo purposes -->
    <script src="<?=$hosted;?>/assets/dist/js/demo.js"></script>
    <script src="<?=$hosted;?>/js/action_solicitacao.js"></script>
		<!-- Validation -->
	<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script>

	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();
	});

	</script>
  </body>
</html>