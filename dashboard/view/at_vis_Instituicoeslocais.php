<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVOLOCAL";
$pag = "at_instituicoeslocais.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();

$sql = "SELECT * FROM sys_usuarios a
          JOIN sys_dados_user   b ON a.usu_email = b.dados_usu_email
          JOIN at_empresas       c ON a.usu_empId = c.emp_id 
		  JOIN at_departamentos  d ON a.usu_dpId   = d.dp_id
          WHERE usu_cod = ".$_SESSION['usu_cod'];
$rs->FreeSql($sql);
$disable="disabled"; 
$rs->GeraDados();
$usu_cod = $rs->fld("usu_cod");
if(($rs->fld("usu_cod") == $_SESSION['usu_cod']) OR ($_SESSION['classe'])==1){
  $disable = "";
}
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>
						Ativos Locais
				<small>Institui&ccedil;&otilde;es</small>
			</h1>
			
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Institui&ccedil;&otilde;es</li>
				<!--<li>Solicita&ccedil;&atilde;o</li>-->
				<li class="active">Cadastro </li>
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
							<h3 class="box-title">Cadastro de Institui&ccedil;&otilde;es</h3>
								<div class="box-tools pull-right">
									<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
								</div>
							</div><!-- /.box-header -->
						<!-- form start -->
						<form id="cadInst" role="form">
							<div class="box-body">
								<div class="row">								
									<div class="form-group col-md-5">
										<label for="inst_nome">Raz&atilde;o social</label> 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-bank"></i>
											</div>
											<input type="text" class="form-control" id="inst_nome" name="inst_nome"  placeholder="Desc. da Prestadora">
										</div>
									</div>									
								
									<div class="form-group col-md-2">
										<label for="inst_alias">Apelido </label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-bank"></i>
											</div>
												<input type="text" class="form-control" id="inst_alias" name="inst_alias"  placeholder="Desc. do Apelido Prestadora">
										</div>
									</div>
									
									<div class="form-group col-md-3">
										<label for="inst_cnpj">CNPJ </label> 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-key"></i>
											</div>
												<input type="text" class="form-control cnpj" id="inst_cnpj" name="inst_cnpj"  placeholder="Desc.CNPJ ">
										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="inst_ie">Inscri&ccedil;&atilde;o Estadual</label> 
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-key"></i>
											</div> 
												<input type="text" class="form-control iest" id="inst_ie" name="inst_ie"  placeholder="Desc. Inscri&ccedil;&atilde;o Estadual">
										</div>
									</div>
								</div><!-- /.row -->
								
								<div class="row"> 
									<div class="form-group col-md-2">
										<label for="cep">CEP </label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-street-view"></i>
											</div>
												<input type="text" class="form-control cep" id="cep" name="cep"  placeholder="Desc. o CEP"value="" <?=$disable; ?>>
											</div>
									</div>
									
									<div class="form-group col-md-5"> 
										<label for="log">Logradouro</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-map-signs"></i>
												</div>															
													<input class="form-control input-sm text-uppercase" id="log" placeholder="Logradouro" value="" <?=$disable; ?>>
											</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="num">N&uacute;mero</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-map-marker"></i>
												</div>
													<input class="form-control input-sm" id="num" name="num" placeholder="Num.:" value="" <?=$disable; ?>>										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="compl">Complemento</label>
										    <div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-etsy"></i> 
												</div>
													<input class="form-control input-sm text-uppercase" id="compl" name="compl" placeholder="Compl.:" value="" <?=$disable; ?>>
											</div>
									</div>																	
								</div><!-- /.row -->
								
								<div class="row">
									<div class="form-group col-md-5">
										<label for="emp_bai">Bairro</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-map-o"></i>
												</div>
													<input class="form-control input-sm text-uppercase" id="bai" placeholder="Bairro" value="" <?=$disable; ?>>
											</div>
									</div>
								
									<div class="form-group col-md-3">
										<label for="emp_cid">Cidade</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-map"></i>
												</div>
													<input class="form-control input-sm text-uppercase" id="cid" placeholder="Cidade" value="" <?=$disable; ?>>
											</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="emp_uf">UF</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-map"></i>
												</div>
													<input class="form-control input-sm text-uppercase" id="uf" placeholder="UF" value="" <?=$disable; ?>>
										</div>
									</div>
								
								
								</div><!-- /.row -->
								
								<div class="row">  
									<div class="form-group col-md-3">  
										<label for="inst_contato">Contato</label> 
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-user"></i>
												</div>
													<input type="text" class="form-control" id="inst_contato" name="inst_contato"  placeholder="Dec. Um contato">
											</div>
									</div>
									
									<div class="form-group col-md-3">
										<label for="inst_email">E-mail</label> 									  
											<div class="input-group">
												<div class="input-group-addon">
													<i class="glyphicon glyphicon-envelope"></i>
												</div>
													<input type="text" class="form-control" id="inst_email" name="inst_email"  placeholder="Dec. Um Email">
										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="inst_tel">Telefone</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="glyphicon glyphicon-phone-alt"></i>
												</div>
													<input type="text" class="form-control fone" id="inst_tel" name="inst_tel"  placeholder="Desc. Telefone">
											</div>
									</div>										
									
									<div class="form-group col-md-4"> 
										<label for="inst_site">Site</label> 
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-google"></i>
												</div> 
													<input type="text" class="form-control" id="inst_site" name="inst_site"  placeholder="Desc. Site">
											</div>
									</div>
									
								</div><!-- /.row -->
								
								<div id="formerrosCadInst" class="clearfix" style="display:none;">  
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
								<button type="button" id="btn_cadInst" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
							</div>
							<div id="mens"></div>
						</form><!-- /.form -->
					</div><!-- /.box -->				
					
					<!-- general form elements -->
					<div class="box box-success ">
						<div class="box-header with-border">
							<h3 class="box-title">Institui&ccedil;&otilde;es Cadastradas</h3><div class="box-tools pull-right"> 
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-ninus"></i></button>   
							</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<div class="box-body">
							<table id="empresas" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>C&oacute;d:</th>
										<th>Atendimento</th> 
										<th>Apelido</th> 
										<th>CNPJ</th> 
										<th>A&ccedil;&otilde;es</th> 
									</tr>
								</thead>
								<tbody id="Inst_cad"> 
									<?php require_once("at_tbInstituicoeslocais.php");?>   
								</tbody> 								 
							</table>
						</div><!-- /.box-body --> 
						<div class="box-footer">
							<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
						</div> 		
					</div><!-- /.box-success -->				
				</div><!-- /.col -->
			</div><!-- /.row -->
        </section><!-- /.selection content --> 
    </div><!-- /.content-wrapper -->
	<?php 
    require_once("../config/footer.php");
    ?>
    <div class="control-sidebar-bg"></div>
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
	<script src="<?=$hosted;?>/dashboard/js/action_ativoslocais.js"></script>  <!--Chama o java script -->
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