<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_eqsolicitacao.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
$fn = new functions();
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
				<li class="active">Solicita&ccedil;&atilde;o </li>
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
							<h3 class="box-title">Cadastro de Solicita&ccedil;&atilde;o</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="cadSol" role="form">
							<div class="box-body">
								<div class="row">
										<div class="form-group col-md-3"> 
											<label for="sol_emp">Selecione a Empresa</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
											<select class="form-control select2" id="sol_emp" name="sol_emp">
												<option value="">Selecione:</option>     
												<?php
												$whr = "emp_id<>0";
												$rs->Seleciona("*","at_empresas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												$var = $rs->fld("emp_id");
												?>
												
												<option value="<?=$rs->fld("emp_id");?>"><?=$rs->fld("emp_alias");?></option>
												<?php
												} 
											?>   
											    </select>
									</div>
									</div>
											<div class="form-group col-md-3 "> 
											<label for="sol_tipo">Selecione o Tipo</label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-print"></i>
											</div>
											<select class="form-control select2" id="sol_tipo" name="sol_tipo">
												<option value="">Selecione:</option>
												
											    </select> 
									</div>
									</div>
									<div class="form-group col-md-3 "> 
											<label for="sol_marca">Selecione A Marca</label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-android"></i>
											</div>
											<select class="form-control select2" id="sol_marca" name="sol_marca">
												<option value="">Selecione:</option>
												
											    </select> 
									</div> 
									</div> 
											
											<div class="form-group col-md-3 "> 
											<label for="sol_eq">Sel. O Equipamento</label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-keyboard-o"></i>
											</div>
											<select class="form-control select2" id="sol_eq" name="sol_eq">
												<option value="">Selecione:</option>
												
											    </select>    
									</div>
									</div>
									</div> 
									<div class="row">
									<div class="form-group col-md-3 "> 
											<label for="sol_eqserial">Sel. O Serial</label>
											<div class="input-group">
											<div class="input-group-addon">
											<i class="fa fa-key"></i>
											</div>
											<select class="form-control select2" id="sol_eqserial" name="sol_eqserial">
												<option value="">Selecione:</option>
												
											    </select>  
									</div> 
									</div> 
									 
									
									<div class="form-group col-md-3 "> 
											<label for="sol_dp">Sel. O Departamento</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
										</div>
											<select class="form-control select2" id="sol_dp" name="sol_dp">
												<option value="">Selecione:</option>
												
											    </select>  
									</div>
									</div>
									<div class="form-group col-md-3 "> 
											<label for="sol_usu">Sel. O Usu&aacute;rio</label>
											<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user"></i>
										</div>
											<select class="form-control select2" id="sol_usu" name="sol_usu">
												<option value="">Selecione:</option>
												
											    </select>  
									</div>
									</div>
											
									
									<div class="form-group col-md-3">
										<label for="solic_ticket">Chamado N&ordm;</label>
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-bullhorn"></i> 
										</div>
										<input type="text" class="form-control" id="solic_ticket" name="solic_ticket"  placeholder="Desc. o N&ordm; do chamado ">
									</div>
									</div>
									</div>
									<div class="row"> 
									<div class="form-group col-md-7"> 
										<label for="solic_desc">Motivo</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-exclamation-triangle"></i>
										</div>										
										<input type="text" class="form-control" id="solic_desc" name="solic_desc"  placeholder="Desc. o Motivo ">
									</div>
									</div>
										
									</div>
								
								      
								      
								<div id="formerrosSol" class="clearfix" style="display:none;"> 
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
								<button type="button" id="btn_cadSol" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- /.box -->
				<!-- general form elements -->
				<div class="box box-success">
					<div class="box-header with-border">
						<h3 class="box-title">Usu&aacute;rios Cadastrados</h3><div class="box-tools pull-right">
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
										<th>Equipamento</th> 
										<th>Modelo</th>
										<th>Departamento</th>
										<th>Usu&aacute;rio</th>
										<!--<th>M&atilde;quina</th>
										<th>Descri&ccedil;&atilde;o</th>-->
										<th>Data</th>
										<th>Usu Cad</th>
										<th>Ticket</th>
										<th>A&ccedil;&otilde;es</th>
								  </tr>
							</thead>
							<tbody id="sol_cad"> 
								<?php require_once("at_tbEqsolicitacao.php");?>     
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
	<script src="<?=$hosted;?>/dashboard/js/action_ativos.js"></script>  <!--Chama o java script -->
	<script src="<?=$hosted;?>/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir -->
	<script src="<?=$hosted;?>/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara -->
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
