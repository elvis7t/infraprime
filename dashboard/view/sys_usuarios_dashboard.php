<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "EQUIPE";
$pag = "sys_usuarios_dashboard.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php"); 
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../controller/acao_sys_usuarios.php");
require_once("../class/class.functions.php");
date_default_timezone_set("America/Sao_Paulo");			
?>

    <!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
							Ativos
					<small>Compras Infra</small>
				</h1>
				
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Equipe de TI</li>
					<li class="active">Infra-estrutura</li>
				</ol>
			</section>

			<!-- Main content --> 
			<section class="content">				
				<div class="row"> 
					<div class="col-md-12">
						<!-- general form elements --> 
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Equipe de TI</h3><div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
								</div>
							</div><!-- /.box-header -->
							
							<!-- form start --> 
							<form role="form" id="c">
								<div class="box-body">
									<!-- radio Clientes -->
									<div class="row">
										 <!-- /.col -->
										<div class="col-md-4">
											 <!-- Widget: user widget style 1 --> 
											<div class="box box-widget widget-user">
												 <!-- Add the bg color to the header using any of the bg-* classes -->
												<div class="widget-user-header bg-black">
													<h3 class="widget-user-username"><?=$elvis;?></h3>
													<h5 class="widget-user-desc"><?=$elvis_emp;?></h5>
												</div>
												<div class="widget-user-image">
													<img class="img-circle" src=" <?=$foto_elvis;?>" alt="User Avatar">
												</div>
												<div class="box-footer">
													<div class="row">
														<div class="col-sm-4 border-right"> 
															<div class="description-block">
																<h5 class="description-header"><?=$at_elvis ;?></h5>
																<span class="description-text">Manuten&ccedil;&otilde;es</span>
															</div>
														  <!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header"><?=$mq_elvis;?></h5>
																<span class="description-text">M&aacute;quinas</span>
															</div>
														  <!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4">
															<div class="description-block">
																<h5 class="description-header"><?=$eq_elvis;?></h5>
																<span class="description-text">Equipamentos</span>
															</div><!-- /.description-block -->
														</div><!-- /.col -->
													</div><!-- /.row -->
												</div>
											</div><!-- /.widget-user -->
										</div>										

										<div class="col-md-4">
											 <!-- Widget: user widget style 1 -->
											<div class="box box-widget widget-user">
												<!-- Add the bg color to the header using any of the bg-* classes -->
												<div class="widget-user-header bg-aqua-active">
													<h3 class="widget-user-username"><?=$anderson;?></h3>
													<h5 class="widget-user-desc"><?=$anderson_emp;?></h5>
												</div>												
												<div class="widget-user-image">
													<img class="img-circle" src=" <?=$foto_anderson;?>" alt="User Avatar">
												</div>												
												<div class="box-footer">
													<div class="row">
														<div class="col-sm-4 border-right">  
															<div class="description-block">
																<h5 class="description-header"><?=$at_anderson ;?></h5>
																<span class="description-text">Manuten&ccedil;&otilde;es</span>
															</div>
														  <!-- /.description-block -->
														</div>   
														<!-- /.col -->
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header"><?=$mq_anderson;?></h5>
																<span class="description-text">M&aacute;quinas</span>
															</div>
														  <!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4">
															<div class="description-block">
																<h5 class="description-header"><?=$eq_anderson;?></h5>
																<span class="description-text">Equipamentos</span>
															</div>
														  <!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div><!-- /.row -->
												</div>
											</div> 
										  <!-- /.widget-user -->
										</div>									
										
										<div class="col-md-4">
										  <!-- Widget: user widget style 1 -->
											<div class="box box-widget widget-user">
											 <!-- Add the bg color to the header using any of the bg-* classes -->
												<div class="widget-user-header bg-green">
													<h3 class="widget-user-username"><?=$valmar;?></h3>
													<h5 class="widget-user-desc"><?=$valmar_emp;?></h5>
												</div>
												<div class="widget-user-image">
													<img class="img-circle" src=" <?=$foto_valmar;?>" alt="User Avatar">
												</div>
												<div class="box-footer">
													<div class="row">
														<div class="col-sm-4 border-right"> 
															<div class="description-block">
																<h5 class="description-header"><?=$at_valmar ;?></h5>
																<span class="description-text">Manuten&ccedil;&otilde;es</span>
															</div>
														 <!-- /.description-block -->
														</div>
															<!-- /.col -->
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header"><?=$mq_valmar;?></h5>
																<span class="description-text">M&aacute;quinas</span>
															</div>
														  <!-- /.description-block -->
														</div>
												
														<div class="col-sm-4">
															<div class="description-block">
																<h5 class="description-header"><?=$eq_valmar;?></h5>
																<span class="description-text">Equipamentos</span>
															</div>
														  <!-- /.description-block -->
														</div>
														 <!-- /.col -->
													</div>
												  <!-- /.row -->
											 	</div>
										    </div>
										  <!-- /.widget-user -->
										</div>
									</div>
										
									<div class="row">										
										<div class="col-md-4">
											 <!-- Widget: user widget style 1 -->
											<div class="box box-widget widget-user">
											 <!-- Add the bg color to the header using any of the bg-* classes -->
												<div class="widget-user-header bg-gray-active">
													<h3 class="widget-user-username"><?=$geovane;?></h3>
													<h5 class="widget-user-desc"><?=$geovane_emp;?></h5>	
												</div>
												<div class="widget-user-image">
													<img class="img-circle" src=" <?=$foto_geovane;?>" alt="User Avatar">
												</div>
												<div class="box-footer">
													<div class="row">
														<div class="col-sm-4 border-right"> 
															<div class="description-block">
																<h5 class="description-header"><?=$at_geovane ;?></h5>
																<span class="description-text">Manuten&ccedil;&otilde;es</span>
															</div>
															 <!-- /.description-block -->
														</div>
														 <!-- /.col -->
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header"><?=$mq_geovane;?></h5>
																<span class="description-text">M&aacute;quinas</span>
															</div>
															 <!-- /.description-block -->
														</div>
															<!-- /.col -->
														<div class="col-sm-4">
															<div class="description-block">
																<h5 class="description-header"><?=$eq_geovane;?></h5>
																<span class="description-text">Equipamentos</span>
															</div>
															 <!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													 <!-- /.row -->
												</div>											
											  <!-- /.widget-user -->
											</div>
										</div>
									
										<div class="col-md-4">
											  <!-- Widget: user widget style 1 -->
											<div class="box box-widget widget-user">
												 <!-- Add the bg color to the header using any of the bg-* classes -->
												<div class="widget-user-header bg-orange">
													<h3 class="widget-user-username"><?=$fernando;?></h3>
													<h5 class="widget-user-desc"><?=$fernando_emp;?></h5>
												</div>
												<div class="widget-user-image">
													<img class="img-circle" src=" <?=$foto_fernando;?>" alt="User Avatar">
												</div>
												<div class="box-footer">
													<div class="row">
														<div class="col-sm-4 border-right"> 
															<div class="description-block">
																<h5 class="description-header"><?=$at_fernando ;?></h5>
																<span class="description-text">Manuten&ccedil;&otilde;es</span>
															</div>
															 <!-- /.description-block -->
														</div>
															<!-- /.col -->
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header"><?=$mq_fernando;?></h5>
																<span class="description-text">M&aacute;quinas</span>
															</div>
															 <!-- /.description-block -->
														</div>
														 <!-- /.col -->
														<div class="col-sm-4">
															<div class="description-block">
																<h5 class="description-header"><?=$eq_fernando;?></h5>
																<span class="description-text">Equipamentos</span>
															</div>
															 <!-- /.description-block -->
														</div>
													 <!-- /.col -->
													</div>
												  <!-- /.row -->
												</div>
											</div>
											  <!-- /.widget-user -->
										</div>
									
										<div class="col-md-4">
										  <!-- Widget: user widget style 1 -->
											<div class="box box-widget widget-user">
											 <!-- Add the bg color to the header using any of the bg-* classes -->
												<div class="widget-user-header bg-red">
													<h3 class="widget-user-username"><?=$nicolas;?></h3>
													<h5 class="widget-user-desc"><?=$nicolas_emp;?></h5>
												</div>
												<div class="widget-user-image">
													<img class="img-circle" src=" <?=$foto_nicolas;?>" alt="User Avatar">
												</div>
												<div class="box-footer">
													<div class="row">
														<div class="col-sm-4 border-right"> 
															<div class="description-block">
																<h5 class="description-header"><?=$at_nicolas ;?></h5>
																<span class="description-text">Manuten&ccedil;&otilde;es</span>
															</div>
															 <!-- /.description-block -->
														</div>
															<!-- /.col -->
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header"><?=$mq_nicolas;?></h5>
																<span class="description-text">M&aacute;quinas</span>
															</div>
														  <!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4">
															<div class="description-block">
																<h5 class="description-header"><?=$eq_nicolas;?></h5>
																<span class="description-text">Equipamentos</span>
															</div>
															 <!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													<!-- /.row -->
												</div>
											</div>
										  <!-- /.widget-user -->
										</div>								
									</div>
									
									<div class="row">								 
										<div class="col-md-4">
											 <!-- Widget: user widget style 1 -->
											<div class="box box-widget widget-user">
												 <!-- Add the bg color to the header using any of the bg-* classes -->
												<div class="widget-user-header bg-red">
													<h3 class="widget-user-username"><?=$andre;?></h3>
													<h5 class="widget-user-desc"><?=$andre_emp;?></h5>
												</div>
												<div class="widget-user-image">
													<img class="img-circle" src=" <?=$foto_andre;?>" alt="User Avatar">
												</div>
												<div class="box-footer">
													<div class="row">
														<div class="col-sm-4 border-right"> 
															<div class="description-block">
																<h5 class="description-header"><?=$at_andre ;?></h5>
																<span class="description-text">Manuten&ccedil;&otilde;es</span>
															</div>
															 <!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header"><?=$mq_andre;?></h5>
																<span class="description-text">M&aacute;quinas</span>
															</div>
														  <!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4"> 
															<div class="description-block">
																<h5 class="description-header"><?=$eq_andre;?></h5>
																<span class="description-text">Equipamentos</span>
															</div>
														  <!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													  <!-- /.row -->
												</div>
											</div>
										  <!-- /.widget-user -->
										</div>		

										<div class="col-md-4">
											 <!-- Widget: user widget style 1 -->
											<div class="box box-widget widget-user">
												<!-- Add the bg color to the header using any of the bg-* classes -->
												<div class="widget-user-header bg-yellow-active">
													<h3 class="widget-user-username"><?=$peterson;?></h3>
													<h5 class="widget-user-desc"><?=$peterson_emp;?></h5>
												</div>
												<div class="widget-user-image">
													<img class="img-circle" src=" <?=$foto_peterson;?>" alt="User Avatar">
												</div>
												<div class="box-footer">
													<div class="row">
														<div class="col-sm-4 border-right"> 
															<div class="description-block">
																<h5 class="description-header"><?=$at_peterson ;?></h5>
																<span class="description-text">Manuten&ccedil;&otilde;es</span>
															</div>
															 <!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header"><?=$mq_peterson;?></h5>
																<span class="description-text">M&aacute;quinas</span>
															</div>
															 <!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4">
															<div class="description-block">
																<h5 class="description-header"><?=$eq_peterson;?></h5>
																<span class="description-text">Equipamentos</span>
															</div>
																<!-- /.description-block -->
														</div> 
														<!-- /.col -->
													</div>
												  <!-- /.row -->
												</div>
											</div>
										  <!-- /.widget-user -->  
										</div>								
										
										<div class="col-md-4">
											 <!-- Widget: user widget style 1 -->
											<div class="box box-widget widget-user">
												<!-- Add the bg color to the header using any of the bg-* classes -->
												<div class="widget-user-header bg-purple">
													<h3 class="widget-user-username"><?=$simone;?></h3>
													<h5 class="widget-user-desc"><?=$simone_emp;?></h5>
												</div>
												<div class="widget-user-image">
												  <img class="img-circle" src=" <?=$foto_simone;?>" alt="User Avatar">
												</div>
												<div class="box-footer">
													<div class="row">
														<div class="col-sm-4 border-right"> 
															<div class="description-block">
																<h5 class="description-header"><?=$at_simone ;?></h5>
																<span class="description-text">Manuten&ccedil;&otilde;es</span>
															</div>
																<!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4 border-right">
															<div class="description-block">
																<h5 class="description-header"><?=$mq_simone;?></h5>
																<span class="description-text">M&aacute;quinas</span>
															</div>
														     <!-- /.description-block -->
														</div>
														<!-- /.col -->
														<div class="col-sm-4"> 
															<div class="description-block">
																<h5 class="description-header"><?=$eq_simone;?></h5>
																<span class="description-text">Equipamentos</span>
															</div>
														  <!-- /.description-block -->
														</div>
														<!-- /.col -->
													</div>
													  <!-- /.row -->
												</div>
											</div>
											 <!-- /.widget-user -->
										</div>										
									</div> <!-- /.row -->
									<div id="consulta"></div>
									<div id="formerrosFimcomp" class="clearfix" style="display:none;">
										<div class="callout callout-danger">
											<h4>Erros no preenchimento do formul&aacute;rio.</h4>
											<p>Verifique os erros no preenchimento acima:</p> 
											<ol>
												<!-- Erros são colocados aqui pelo validade -->
											</ol>  
										</div>
									</div>
									<div class="box-footer"></div>
								</div><!-- /.box-body -->	
							</form>
						</div><!-- /.primary --> 
					</div><!-- ./col -->
				</div><!-- ./row -->
			</section><!-- ./SEL -->
		</div><!-- ./wrapper --> 
		<?php require_once("../config/footer.php");?> 
		<div class="control-sidebar-bg"></div> 
    </div>

    <!-- jQuery 2.1.4 --> 
    <script src=" <?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src=" <?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src=" <?=$hosted;?>/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!--AdminLTE App -->
    <script src=" <?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src=" <?=$hosted;?>/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src=" <?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src=" <?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src=" <?=$hosted;?>/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src=" <?=$hosted;?>/dashboard/assets/js/maskinput.js"></script>
    <script src=" <?=$hosted;?>/dashboard/assets/js/jmask.js"></script>
	<!--datatables-->
    <script src=" <?=$hosted;?>/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src=" <?=$hosted;?>/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>    
     <!-- ChartJS 1.0.1-->
    <script src=" <?=$hosted;?>/dashboard/assets/plugins/chartjs/Chart.min.js"></script>        
    <!-- AdminLTE for demo purposes -->    
	<script src=" <?=$hosted;?>/dashboard/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>	
	<script>	
  </body>
</html> 
