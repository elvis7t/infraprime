<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_mqfabricante.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>M&aacute;quinas</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Cadastro de Fabricante</li>
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
							<h3 class="box-title">Cadastro de Fabricante</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="fabricante" role="form">
						<?php
				
 				$rs = new recordset();
				$sql ="SELECT * FROM at_empresas 
					WHERE  emp_id=".$_SESSION['usu_empresa'];
					$rs->FreeSql($sql);
					$rs->GeraDados();
					
				
			?> 
							<div class="box-body">
								<div class="row">
								<div class="form-group  col-md-4"> 
										<label for="sel_emp">Selecione a Empresa</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<select class="form-control select2" id="sel_emptp" name="sel_emptp">
											<option value="">Selecione:</option>
											<?php
												$whr = "emp_id<>0";
												$rs->Seleciona("*","at_empresas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("emp_id");?>"><?=$rs->fld("emp_nome");?></option>
												<?php 
												} 
											?>
										</select>    
									</div> 
									</div> 
										<div class="form-group col-xs-6 col-sm-4 col-md-4">  
										<label for="sel_tipoId">Tipo</label><br>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-print"></i>
										</div>
										<select class="select2 form-control" class="form-control" id="sel_tipoId" name="sel_tipoId">
											<option value="">Selecione...</option> 
											  
										</select>   
									</div>    
									</div>    
									<div class="form-group col-md-3">
										<label for="fab_nome">Descri&ccedil;&acirc;o</label> 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-industry"></i>
											</div>
										<input type="text" class="form-control" id="fab_nome" name="fab_nome"  placeholder="Desc. da Marca">
									</div>
									</div>
								</div>  
								
								<div id="formerrosFab" class="clearfix" style="display:none;"> 
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
								<button type="button" id="btn_cadFabri" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- /.box -->
				<!-- general form elements --> 
				<div class="box box-success"> 
					<div class="box-header with-border">
						<h3 class="box-title">Fabricantes Cadastrados</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div> 
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table id="MQmarca" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>C&oacute;d:</th>
										<th>Empresa</th> 
										<th>Tipo</th>
										<th>Descri&ccedil;&atilde;o</th> 
										<th>A&ccedil;&otilde;es</th>
								  </tr> 
							</thead>
							<tbody id="cad_Fabri">
								<?php require_once("at_tbFabricante.php");?>     
							</tbody> 
							 
						</table>
					</div><!-- /.box-body --> 
					<div class="box-footer">
				<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
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
     <!-- ChartJS 1.0.1-->
    <script src="http://localhost/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="http://localhost/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/dashboard/assets/dist/js/demo.js"></script>
	<script src="http://localhost/dashboard/js/action_ativos.js"></script>  <!--Chama o java script -->
	<script src="http://localhost/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir -->
	<script src="http://localhost/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara -->
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

	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();
	});

</script> 
  </body>
</html> 