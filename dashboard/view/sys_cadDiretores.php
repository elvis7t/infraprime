	<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "SOL"; 
$pag = "sys_cadDiretores.php";
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
				Produtos
				<small>Cadastro</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Diretores</li>
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
							<h3 class="box-title">Cadastro de Diretores</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="cadDir" role="form">
							<div class="box-body">
								<div class="row">
									<div class="form-group col-md-3">
										<label for="dir_emp_id">Empresa</label><br>
										<select class="select2 form-control" class="form-control" id="dir_emp_id" name="dir_emp_id">
											<option value="">Selecione...</option>
											<?php
												
												$rs->Seleciona("*","sys_empresas", "sys_emp_id<>0");
												while($rs->GeraDados()){ ?>
													<option value="<?=$rs->fld("sys_emp_id");?>"><?=$rs->fld("sys_emp_nome");?></option>
												<?php }
												
											?>
										</select>
									</div>
									<div class="form-group col-md-7">
										<label for="exampleInputEmail1">Nome do Diretor</label>
										<input type="text" class="form-control" id="dir_nome" name="dir_nome"  placeholder="Desc. o Nome do Diretor">
									</div>
								</div>
								<div id="formerros1" class="clearfix" style="display:none;">
									<div class="callout callout-danger">
										<h4>Erros no preenchimento do formul&aacute;rio.</h4>
										<p>Verifique os erros no preenchimento acima:</p>
										<ol>
											<!-- Erros são colocados aqui pelo validade -->
										</ol>
									</div>
								</div>
							</div><!-- /.box-body -->
							
							<div class="box-footer">
								<button type="button" id="btn_cadDir"class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- /.box -->
			     <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Diretores Cadastrados</h3>
			</div><!-- /.box-header -->
			 <!-- form start -->
                <div class="box-body">
                    <table id="familias" class="table table-bordered table-striped">
						<thead>
							  <tr>
									<th>C&oacute;d:</th>
									<th>Empresa</th>
									<th>Diretor</th>
									<th>A&ccedil;&otilde;es</th>  
							  </tr>
						</thead>
						<tbody id="c_cad">
							<?php require_once("../controller/sys_tbDiretores.php");?>
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
    <!-- FastClick -->
    <!--<script src="plugins/fastclick/fastclick.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="<?=$hosted;?>/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=$hosted;?>/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?=$hosted;?>/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=$hosted;?>/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=$hosted;?>/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?=$hosted;?>/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="<?=$hosted;?>/assets/dist/js/pages/dashboard2.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="<?=$hosted;?>/assets/dist/js/demo.js"></script>
	<script src="<?=$hosted;?>js/action_contato.js"></script>
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