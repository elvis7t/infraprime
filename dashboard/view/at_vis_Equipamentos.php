<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_equipamentos.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>Equipamentos</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Cadastro de Equipamentos </li>
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
							<h3 class="box-title">Cadastro de Equipamentos</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="cadEq" role="form">
							<div class="box-body">
								<div class="row">
								<?php
				
								$rs = new recordset();
								$sql ="SELECT * FROM at_empresas 
									WHERE  emp_id=".$_SESSION['usu_empresa'];
									$rs->FreeSql($sql);
									$rs->GeraDados();
									
								
						?> 
										<div class="form-group col-md-3 "> 
										<label for="sel_empeq">Selecione a Empresa</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<select class="form-control select2" id="sel_empeq" name="sel_empeq">
											<option value="">Selecione:</option>
											<?php
												$whr = "emp_id<>0";
												$rs->Seleciona("*","at_empresas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("emp_id");?>"><?=$rs->fld("emp_alias");?></option>
												<?php
												} 
											?>
										</select>
									</div> 
									</div> 
									
											<div class="form-group col-md-3"> 
											<label for="sel_tipoeq">Selecione o Tipo</label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-print"></i>
											</div>
											<select class="form-control select2" id="sel_tipoeq" name="sel_tipoeq">
												<option value="">Selecione:</option>
												
											    </select>
									</div>
									</div>
											<div class="form-group col-md-3 "> 
											<label for="sel_marcaeq">Selecione A Marca</label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-android"></i>
											</div>
											<select class="form-control select2" id="sel_marcaeq" name="sel_marcaeq">
												<option value="">Selecione:</option>
												
											    </select> 
											</div> 
											</div> 
									</div> 
									<div class="row">
									
									<div class="form-group col-md-3">
										<label for="eq_modelo">Modelo</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input type="text" class="form-control" id="eq_modelo" name="eq_modelo"  placeholder="Desc. o Modelo ">
									</div>
									</div>
									
									
									
									<div class="form-group col-md-4">
										<label for="eq_serial">N&ordm; Serial</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" class="form-control" id="eq_serial" name="eq_serial"  placeholder="Desc. o Serial ">
									</div>
									</div>
									
									
									<div class="form-group col-md-3">
										<label for="eq_desc">Equipamento</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-keyboard-o"></i>
										</div>
										<input type="text" class="form-control" id="eq_desc" name="eq_desc"  placeholder="Desc. o Equipamento ">
									</div>
									</div>
									
								</div> 
								<div class="row">
								    
									<div class="form-group col-md-2 "> 
										<label for="sel_eqstatus">Selecione O Status</label>
										<div class="input-group">
										<div class="input-group-addon"> 
											<i class="fa fa-smile-o"></i>
										</div>
										<select class="form-control select2" id="sel_eqstatus" name="sel_eqstatus">
												 <option value="">Selecione:</option>
												<?php
													$whr = "status_id<>0";
													$rs->Seleciona("*","at_status",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
													while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
													?>
													<option value="<?=$rs->fld("status_id");?>"><?=$rs->fld("status_desc");?></option>
													<?php
													} 
												?>
											</select>
										</div>
									</div> 
									 
									<div class="form-group col-md-2">
										<label for="eq_valor">Valor</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>
										<input type="text" class="form-control moeda" id="eq_valor" name="eq_valor"  placeholder="Desc. o Valor ">
									</div>
									</div>
									</div>
								
								      
								      
								<div id="formerrosEq" class="clearfix" style="display:none;"> 
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
								<button type="button" id="btn_cadEq" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- /.box -->
				<!-- general form elements -->
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Equipamentos Cadastrados</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
					</div><!-- /.box-header --> 
					<!-- form start -->
					<div class="box-body">
						<table id="usu" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>C&oacute;d:</th>
										<th>Empresa</th> 
										<th>Marca</th> 
										<th>Modelo</th>
										<th>N&ordm; Serial</th>
										<th>Desc</th>
										<th>Status</th>
										<th>Data</th>
										<th>Usu Cad</th>
										<th>Ativo</th>
										<th>A&ccedil;&otilde;es</th>
								  </tr>
							</thead>
							<tbody id="eq_cad">
								<?php require_once("at_tbEquipamentos.php");?>
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
