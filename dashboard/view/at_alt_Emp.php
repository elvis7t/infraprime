<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "USU";
$pag = "at_empresas.php";// Fazer o link brilhar quando a pag estiver ativa
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
						Ativos
				<small>Empresas</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Empresas </li>
				<li class="active">Alterar Dados</li> 
			</ol>
        </section>

        <!-- Main content -->  
        <section class="content"> 
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-warning btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_Altemp","label"=>"Alterar")
							);
 				extract($_GET);
 				$rs = new recordset();   
 				$sql = "SELECT * FROM at_empresas WHERE emp_id = ".$empid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				
 				  
			?>
			 <div class="row"> 
				<div class="col-md-12">
				<!-- general form elements --> 
				<div class="box box-primary">
					<div class="box-header with-border">
						<div class="col-md-2"><img class="profile-user-img img-responsive img-circle" src="<?=$hosted."/".$rs->fld('emp_logo');?>" alt="Logo da Empresa"></div> 
							<h1><?=$rs->fld("emp_nome");?>								
							</h1><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
					</div><!-- /.box-header -->
						<!-- form start -->  
						<form role="form" id="alt_emp">    
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="clientes" class="row">
									<div class="form-group col-xs-1">
										<label for="emp_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="emp_id" id="emp_id" value="<?=$rs->fld("emp_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									<div class="form-group col-md-4">
										<label for="emp_nome">Empresa:</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text"  class="form-control" name="emp_nome" id="emp_nome" value="<?=$rs->fld("emp_nome");?>"/>
									</div>
									</div>
									<div class="form-group col-md-2">  
										<label for="emp_nome">Apelido:</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text"  class="form-control" name="emp_alias" id="emp_alias" value="<?=$rs->fld("emp_alias");?>"/>
									</div>
									</div>
									
									<div class="form-group col-md-3">
										<label for="emp_cnpj">CNPJ:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text"  class="form-control " name="emp_cnpj" id="emp_cnpj" value="<?=$rs->fld("emp_cnpj");?>"/>
									</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="emp_ie">Inscri&ccedil;&atilde;o Estadual</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" class="form-control iest" id="emp_ie" name="emp_ie"  value="<?=$rs->fld("emp_ie");?>">
									</div>
									</div>
									
									
									</div>
									<div class="row"> 
								
								<div class="form-group col-md-2">
										<label for="cep">CEP </label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-street-view"></i> 
											</div>
										<input type="text" class="form-control cep" id="cep" name="cep"  placeholder="Desc. o CEP"value="<?=$rs->fld("emp_cep");?>" <?=$disable; ?>>
									</div>
									</div>
							 								
									
									<div class="form-group col-md-5"> 
										<label for="log">Logradouro</label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-signs"></i>
											</div>
										<input class="form-control input-sm text-uppercase" id="log" placeholder="Logradouro" value="<?=$rs->fld("emp_log");?>" <?=$disable; ?>>
									</div>
									</div>
									
									<div class="form-group col-md-2">
									  <label for="num">N&uacute;mero</label>
									  <div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-marker"></i>
									</div>
									  <input class="form-control input-sm" id="num" name="num" placeholder="Num.:" value="<?=$rs->fld("emp_num");?>" <?=$disable; ?>>
									</div>
									</div> 
									
									<div class="form-group col-md-3">
									  <label for="compl">Complemento</label>
									  <div class="input-group">
											<div class="input-group-addon"> 
												<i class="fa fa-etsy"></i> 
									</div>
									  <input class="form-control input-sm text-uppercase" id="compl" name="compl" placeholder="Compl.:" value="<?=$rs->fld("emp_compl");?>" <?=$disable; ?>>
									</div>
									</div>
													   
							
							</div>
							<div class="row">
							
							<div class="form-group col-md-3">
							<label for="bai">Bairro</label>
							<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-o"></i>
							</div>
							<input class="form-control input-sm text-uppercase" id="bai" placeholder="Bairro" value="<?=$rs->fld("emp_bai");?>" <?=$disable; ?>>
							</div>
							</div>
							
							<div class="form-group col-md-3">
							  <label for="cid">Cidade</label>
							  <div class="input-group"> 
											<div class="input-group-addon">
												<i class="fa fa-map"></i>
							</div>
							  <input class="form-control input-sm text-uppercase" id="cid" placeholder="Cidade" value="<?=$rs->fld("emp_cid");?>" <?=$disable; ?>>
							</div>
							</div>



							<div class="form-group col-md-2">
                          <label for="uf">UF</label>
						   <div class="input-group">
											<div class="input-group-addon"> 
												<i class="fa fa-map"></i>
							</div>
                          <input class="form-control input-sm text-uppercase" id="uf" placeholder="UF" value="<?=$rs->fld("emp_uf");?>" <?=$disable; ?>>
                        </div>
                        </div>
									
									
									 
									<div class="form-group col-md-3">  
										<label for="emp_contato">Contato</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-address-card"></i>
										</div>
										<input type="text" class="form-control" id="emp_contato" name="emp_contato"  value="<?=$rs->fld("emp_contato");?>">
									</div>
									</div>
									
									<div class="form-group col-md-3">
									<label for="emp_email">E-mail</label>									  
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-envelope"></i>
										</div>
									  <input type="text" class="form-control" id="emp_email" name="emp_email"  value="<?=$rs->fld("emp_email");?>">
									
								</div>
								</div>
									<div class="form-group col-md-2">
										<label for="emp_tel">Telefone</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-phone-alt"></i>
										</div>
										<input type="text" class="form-control fone" id="emp_tel" name="emp_tel"  value="<?=$rs->fld("emp_tel");?>">
									</div>
									</div>
									 
		
									 
									<div class="form-group col-md-4">    
										<label for="emp_site">Site</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-google"></i>
										</div>  
										<input type="text" class="form-control" id="emp_site" name="emp_site"  value="<?=$rs->fld("emp_site");?>">
									</div>
									</div>
									
								</div>
								 
								<div id="consulta"></div>
								<div id="formerros1" class="clearfix" style="display:none;">
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
								<a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='Atribuir imagem'  a href="at_img_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$empid;?>"><i class="fa fa-file-image-o"></i> Logo</a>
								<a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='Atribuir imagem'  a href="at_img_trm_empresa.php?token=<?=$_SESSION['token']?>&acao=N&empid=<?=$empid;?>"><i class="fa fa-file-image-o"></i> Logo Termo</a>
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
							</div>
							
						</form>
					</div><!-- ./box -->
					
				</div><!-- ./row -->
				
					
				
				
			</div>
		</section>
	</div>
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