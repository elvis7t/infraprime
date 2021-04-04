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
				<li class="active">Servi&ccedil;o </li>
				<li class="active">Alterar Dados</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_AltServico","label"=>"Alterar") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql = "SELECT * FROM sr_servico a
				JOIN at_maquinas   b ON a.servico_servidorId  = b.mq_id 
				WHERE servico_id = ".$srvcid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();     
				
			?>
			 <div class="row">
				<div class="col-md-12">
					<!-- general form elements --> 
					<div class="box box-primary">
						<div class="box-header with-border">   
							<h3 class="box-title">Dados</h3><div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div>
						</div>
						<!-- /.box-header -->
						
						<!-- form start --> 
						<form role="form" id="alt_servico">
							<div class="box-body">
									<!-- radio Clientes -->
								<div id="modelo" class="row"> 
									<div class="form-group col-xs-1">
									  <label for="servico_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="servico_id" id="servico_id" value="<?=$rs->fld("servico_id");?>"/> 
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="mq_nome">#Servidor:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-building"></i>
											</div>
											<input type="text" DISABLED class="form-control" name="mq_nome" id="mq_nome" value="<?=$rs->fld("mq_nome");?>"/>
											<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
											<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-3">
									  <label for="servico_desc">Servi&ccedil;o</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="glyphicon glyphicon-cog"></i>
											</div>
											<input type="text" class="form-control" id="servico_desc" name="servico_desc" value="<?=$rs->fld("servico_desc");?>">
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="servico_versao">Vers&atilde;o</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="glyphicon glyphicon-cog"></i>
											</div>
											<input type="text" class="form-control" id="servico_versao" name="servico_versao"  value="<?=$rs->fld("servico_versao");?>">
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-3">
									  <label for="servico_licenca">Licen&ccedil;a</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="glyphicon glyphicon-cog"></i>
											</div>
											<input type="text" class="form-control" id="servico_licenca" name="servico_licenca"  value="<?=$rs->fld("servico_licenca");?>">
										</div>
									</div>
									<!-- /.col -->
								</div> 
								<!-- /.row -->
								
								<div id="consulta"></div>
								<div id="formerrosServico" class="clearfix" style="display:none;">
									<div class="callout callout-danger"> 
										<h4>Erros no preenchimento do formul&aacute;rio.</h4>
										<p>Verifique os erros no preenchimento acima:</p>
										<ol>
											<!-- Erros são colocados aqui pelo validade -->
										</ol> 
									</div>
								</div>
							</div> 
							
							<div class="box-footer">
								<button class="<?=$menu[$acao]['class'];?>" type="button" id="<?=$menu[$acao]['id'];?>"><i class="<?=$menu[$acao]['icone'];?>"></i> <?=$menu[$acao]['label'];?></button>
								<a class='btn btn-sm btn-success' data-toggle='tooltip' data-placement='bottom' title='Novo Tipo' href="at_cad_servico.php?token=<?=$_SESSION['token']?>"><i class="fa fa-plus"></i> Novo</a>
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
							</div>
							<div id="mens"></div>
						</form>
					</div>
					<!-- ./box -->
				</div>
				<!-- ./row -->
			</div>
		</section>
	</div>
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

</body>
</html>	