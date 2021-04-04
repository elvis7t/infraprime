<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_servico.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>Servi&ccedil;os</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Cadastro de servi&ccedil;o</li>
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
						  <h3 class="box-title">Cadastro de servi&ccedil;o</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div>
						</div>
						<!-- /.box-header -->
						
						<form id="servico" role="form">
							<?php
							extract($_GET);
							$rs = new recordset();
							$sql = "SELECT * FROM at_maquinas 							
							WHERE mq_id =".$mqid;
							$rs->FreeSql($sql);
							$rs->GeraDados();
							?> 						
							<div class="box-body">							
								<div class="row">
									<div class="form-group col-xs-1">
									  <label for="servico_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="servico_servidorId" id="servico_servidorId" value="<?=$rs->fld("mq_id");?>"/> 					
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="mq_nome">#Servidor:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-building"></i>
											</div>
											<input type="text" DISABLED class="form-control" name="mq_nome" id="mq_nome" value="<?=$rs->fld("mq_nome");?>"/>											
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-3">
									  <label for="servico_desc">Servi&ccedil;o</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="glyphicon glyphicon-cog"></i>
											</div>
											<input type="text" class="form-control" id="servico_desc" name="servico_desc"  placeholder="Desc. do Serviço">
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="servico_versao">Vers&atilde;o</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="glyphicon glyphicon-cog"></i>
											</div>
											<input type="text" class="form-control" id="servico_versao" name="servico_versao"  placeholder="Desc. da Versão">
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-3">
									  <label for="servico_licenca">Licen&ccedil;a</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="glyphicon glyphicon-cog"></i>
											</div>
											<input type="text" class="form-control" id="servico_licenca" name="servico_licenca"  placeholder="Desc. da Licença">
										</div>
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->								
								<div id="mens"></div>
								<div id="formerrosServico" class="clearfix" style="display:none;"> 
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
								<button type="button" id="btn_cadServico" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
							</div>							
						</form>
					</div><!-- /.box -->
				<!-- general form elements --> 
				<div class="box box-success"> 
					<div class="box-header with-border">
						<h3 class="box-title">Servi&ccedil;os Cadastrados</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div> 
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table id="servico" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>C&oacute;d:</th>
										<th>servi&ccedil;o</th> 
										<th>Vers&atilde;o</th> 
										<th>Licen&ccedil;a</th> 
										<th>A&ccedil;&otilde;es</th>
								  </tr>
							</thead>
							<tbody id="cad_Servico">
								<?php require_once("at_tbServico_servidor.php");?> 
							</tbody>  
							 
						</table>
					</div>
					<!-- /.box-body --> 
					<div class="box-footer">
						<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
					</div>
							
				</div>
				<!-- /.box --> 			
          </div>
        </section>
		<!-- /.content -->
    </div>
	<!-- /.content-wrapper -->
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