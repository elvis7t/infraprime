<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING); 

/*inclusão dos principais itens da página */
session_start(); 
$sess = "SOL";
$pag = "sys_cadSolicitacao.php";
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
				Solicita&ccedil;&acirc;o
				<small>Autoriza&ccedil;&acirc;o</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li> 
				<li class="active">&ccedil;&acirc;o</li>
			</ol>
        </section>
        <!-- Main content -->
        <section class="content">
			<!-- Info boxes -->
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!--inicio das tabs -->
					<!-- Custom Tabs -->
					<div class="box box-default">
						<div class="box-body">
						<div class="nav-tabs-custom">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#tab_1" data-toggle="tab">Dados</a></li>
								
								<li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
							</ul>
							<form id="cadSolic" role="form"> 
								<div class="tab-content">
										<div class="tab-pane active" id="tab_1">
											<!-- DADOS DO TAB 1 ESSENCIAIS -->
											<div class="box box-primary">
												<div class="box-header with-border">
													<h3 class="box-title">Fazer solicitação</h3>
												</div><!-- /.box-header -->
												<div class="box-body"><!--box-body_1-->
													<div class="row"><!-- ABRE UMA LINHA -->
														<div class="form-group  col-md-7">
															<label for="sel_emp">Selecione a Empresa</label>
															<select class="form-control select2" id="sel_emp" name="sel_emp">
																<option value="">Selecione:</option>
																<?php
																	$whr = "sys_emp_id<>0";
																	$rs->Seleciona("*","sys_empresas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
																	while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
																	?>
																	<option value="<?=$rs->fld("sys_emp_id");?>"><?=$rs->fld("sys_emp_nome");?></option>
																	<?php
																	}
																?>
															</select>
														</div> 
														<div class="form-group col-md-7">  
															<label for="sel_dir">Selecione o Diretor</label>
																<select class="form-control select2" id="sel_dir" name="sel_dir">
																	<option value="">Selecione:</option>
																	
																</select>
														</div>
														<div class="form-group col-md-7">
															<label for="solic_titulo">Titulo</label>
															<input type="text" class="form-control" id="solic_titulo" name="solic_titulo"  placeholder="Desc. o Titulo">
														</div>
														
														
														<div class="form-group col-md-7">
															<label for="solic_desc">Solicitação</label>
															<textarea class="form-control" id="solic_desc" name="solic_desc" rows="5"></textarea>
														</div> 												
														
													</div>
												</div><!--/box-body_1-->
											</div><!--box_1-->
										</div><!--/pane_1-->
										 
								</div><!--/FIM DIV PANE-->
							</form>
							</div>
							<div class="box-footer">
								<div id="formerros1" class="clearfix" style="display:none;">
									<div class="callout callout-danger">
										<h4>Erros no preenchimento do formul&aacute;rio.</h4>
										<p>Verifique os erros no preenchimento acima:</p>
										<ol>
											<!-- Erros são colocados aqui pelo validade -->
										</ol>
									</div>
								</div>
													
								<button id="btn_cadSolic" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Enviar</button>
								<div id="mens"></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
			  			 
            <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Solicitações enviadas</h3> 
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table id="solic" class="table table-bordered table-striped">
						<thead>
							  <tr>
									<th>C&oacute;d:</th>
									<th>Empresa</th>
									<th>Diretor</th>
									<th>Solicitante</th>
									<th>Solicita&ccedil;&atilde;o</th>
									<th>Data</th>
									<th>Status</th>
									<th>A&ccedil;&otilde;es</th>
							 </tr>
						</thead>
						<tbody id="p_cad">
							<?php require_once("../controller/sys_tbAutorizacao.php");?>
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
