<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "COM";
$pag = "at_compras.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>Compras Infra</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Solicita&ccedil;&atilde;o de compra</li>
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
							<h3 class="box-title">Cadastro de Solicita&ccedil;&atilde;o de compra</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
						</div><!-- /.box-header -->
						 <!-- form start -->
						<form id="cadComp" role="form">
							<div class="box-body">
								<div class="row">
								<?php
				
								$rs = new recordset();
								$sql ="SELECT * FROM at_empresas 
									WHERE  emp_id=".$_SESSION['usu_empresa'];
									$rs->FreeSql($sql);
									$rs->GeraDados();
									
								
						?> 
												<div class="form-group  col-md-4"> 
										<label for="sel_emp">Selecione a Empresa</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<select class="form-control select2" id="sel_emp" name="sel_emp">
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
									<div class="form-group col-md-3">  
										<label for="sel_dp">Selecione o Departamento</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
											</div> 
											<select class="form-control select2" id="sel_dp" name="sel_dp">
												<option value="">Selecione:</option>
												
											</select> 
									</div>
									</div>
									
									<div class="form-group col-md-2"> 
										<label for="comp_datacad">Solicitado em:</label>  
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar-check-o"></i>
										</div>
										
										<input type="text"  class="form-control data_br" id="comp_datacad" name="comp_datacad"  value="">
									</div>
									</div>
									
									</div> 
									<div class="row">
									
									<div class="form-group col-md-8">
										<label for="comp_titulo">Titulo</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-cart-arrow-down"></i>
										</div>
										<input type="text" class="form-control" id="comp_titulo" name="comp_titulo"  placeholder="Desc. o Titulo ">
									</div>
									</div>
									
									</div> 
								<div class="row">
									
									<div class="form-group col-md-10">
										<label for="comp_desc">Solicita&ccedil;&atilde;o: </label>
											<textarea   class="form-control" id="comp_desc" name="comp_desc" ></textarea>
										</div> 
									
								</div> 
								<div class="row">
								     
									
									 
									<div class="form-group col-md-2">
										<label for="comp_valor">Valor total</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>
										<input type="text" class="form-control moeda" id="comp_valor" name="comp_valor"  placeholder="Desc. o Valor ">
									</div>
									</div>
									</div>
								
								      
								      
								<div id="formerrosComp" class="clearfix" style="display:none;"> 
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
								<button type="button" id="btn_cadComp" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- /.box -->
				<!-- general form elements -->
				<div class="box box-success ">
					<div class="box-header with-border">
						<h3 class="box-title">Solicita&ccedil;&otilde;es Cadastradas</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-ninus"></i></button>   
						</div>
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table id="manutencao" class="table table-bordered table-striped">
							<thead>
								  <tr> 
										<th>C&oacute;d:</th>
										<th>Empresa</th> 
										<th>Departamento</th> 
										<th>Compra</th>  
										<th>Aberto em:</th>  
										<th>Encerado em:</th> 
										<th>Usu Cad</th> 
										<th>Status</th>
										<th>Valor</th> 
										<th>A&ccedil;&otilde;es</th>
								  </tr>
							</thead> 
							<tbody id="Comp_cad"> 
								<?php require_once("at_tbcompras.php");?>     
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
     <!-- ChartJS 1.0.1-->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/demo.js"></script>
	<script src="http://localhost/infraprime/dashboard/js/action_ativos.js"></script>  <!--Chama o java script -->
	<script src="http://localhost/infraprime/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir -->
	<script src="http://localhost/infraprime/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara -->
	<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
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
	<script>
  
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('comp_desc');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5(); 
  });
</script> 
  </body>
</html> 
