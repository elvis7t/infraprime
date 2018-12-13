<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "REL_LOCAL";
$pag = "at_relatorio_mqDescarte_local.php"; 
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");

$rs = new recordset();
?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>
				Relat&oacute;rios
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li>Relat&oacute;rios</li>
				<li class="active">Sele&ccedil;&atilde;o</li>
			</ol>
        </section>

        <!-- Main content -->
        <section class="content">
			
			<div class="row">
				<div class="col-md-12">
				<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Filtros</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form role="form" id="rels">
							<div class="box-body">
								<!-- radio Clientes -->
								<div class="row">
										
										
										
								
									
									<div class="form-group col-xs-2">
										<label for="rel_di">Data Inicial:</label>
										<input type="text" class="form-control data_br" name="rel_di" id="rel_di" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
									</div>
									<div class="form-group col-xs-2">
										<label for="rel_df">Data Final:</label>
										<input type="text" class="form-control  data_br" name="rel_df" id="rel_df" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask/>
									</div>
									
								</div>
								<div class="row">
									
									
								</div>
							</div>
							
							<div class="box-footer">
								<button class="btn btn-sm btn-primary" type="button" id="bt_relMqDesc"><i class="fa fa-pie-chart"></i> Gerar Relat&oacute;rio</button>
								<span id="spload" style="display:none;"><i id="load"></i></span>
							</div>
						</form>
					</div><!-- ./box --> 
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
				<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3>
							  <?php
				 
								$rs = new recordset();
								$sql ="SELECT * FROM at_empresas
										WHERE emp_id=".$_SESSION['usu_empresa']; 
								$rs->FreeSql($sql);
								$rs->GeraDados(); 
								 
								   
								?>
								<small class="pull-left"><img class="profile-user-img img-responsive img-circle" src="http://localhost/infraprime/dashboard/<?=$rs->fld('emp_logo');?>" alt="Logo da Empresa"></small> 
							        <?=$rs->fld("emp_nome");?>								
							<small class="pull-right">Data: <?=date("d/m/Y");?></small></h3>
							
						</div><!-- /.box-header -->
						<form role="form" id="rels">
							<div class="box-body">
								<!-- radio Clientes -->
								<div class="row">
										
										<input type="hidden" value="at_maquinas" name="rel_tbl" id="rel_tbl">		
										<input type="hidden" value="<?=$_SESSION['usu_empresa']?>" name="emp_usu" id="emp_usu">		 
									</div>	 
									
							</div>
							
							
								
						
						<div class="box-body">
							<div class="row invoice-info">
								<div class="col-sm-4 invoice-col">
								  Usu&aacute;rio
								  <address>
									<strong><?=$_SESSION['nome_usu'];?></strong><br>
									<i class="fa fa-envelope"></i> <?=$_SESSION['usuario'];?>
								  </address>
								</div><!-- /.col -->
								
							</div><!-- /.row -->
							<div class="row">
								<div class="col-xs-12 table-responsive">
								  <table class="table table-striped">
									<thead>
									  <tr><th colspan=7><h2>Relat&oacute;rio de M&aacute;quinas Descartadas</h2></th></tr>
									  <tr> 
										
										
										<th>Empresa</th> 
										<th>Fabricante</th>
										<th>Tipo</th>
										<th>Modelo</th>
										<th>Nome</th>
										<th>Sitema</th> 
										<th>Descartado por:</th> 
										<th>Comprado em:</th>
										<th>Descartado em:</th> 
										<th>Vida &Uacute;til</th>
										
										
									  </tr> 
									</thead>
									<tbody id="rls">
										
									 </tbody>
								  </table>
								</div><!-- /.col -->
							</div><!-- /.row -->
							 <div class="row no-print">
								<div class="col-xs-12">
								  <a id="bt_print" href="#" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
								  <!--<button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-file-pdf-o"></i> Gerar PDF</button>-->
								  <a id="bt_excel" href="#" class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-file-excel-o"></i> Gerar Excel</a>
								</div>
							  </div>
								
							
						</div>
							</form>
						 
					</div><!-- ./box -->
				</div> 
			</div>
			
		</section>	
	</div>
	
	<?php
		require_once("../config/footer.php");
	?></div><!-- ./wrapper -->

<script src="http://localhost/infraprime/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://localhost/infraprime/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/app.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="http://localhost/infraprime/dashboard/assets/js/maskinput.js"></script>
    <script src="http://localhost/infraprime/dashboard/assets/js/jmask.js"></script>
    <script src="http://localhost/infraprime/dashboard/js/action_ativoslocais.js"></script>
    <script src="http://localhost/infraprime/dashboard/js/jquery.cookie.js"></script>
    <script src="http://localhost/infraprime/dashboard/js/controle.js"></script>

	<!-- SELECT2 TO FORMS
	-->
	<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
	<!-- Validation -->
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script>
		$(".select2").select2({
			tags: true,
			theme: "classic" 
		});
		$(".date").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/aaaa"});	
		
	</script>

</body>
</html>	