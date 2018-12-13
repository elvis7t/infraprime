<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_chips.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>Chips</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Chips </li>
				<li class="active">Atribuir</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-plus", "id"=>"btn_AtrChip","label"=>"Atribuir") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM eq_chips a
						JOIN at_empresas  b ON a.chip_empId  = b.emp_id 
						JOIN sys_usuarios c ON a.chip_usucad = c.usu_cod
					WHERE chip_id = ".$chipid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				
				$var = $rs->fld("emp_id");
				$usu = $rs->fld("usu_nome");
				$chip = $rs->fld("chip_id");
				
				
 				
			?>
			 <div class="row">
				<div class="col-md-12">
				<!-- general form elements --> 
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Dados</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
					</div><!-- /.box-header -->
						<!-- form start --> 
						<form role="form" id="atr_chip"> 
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="usuarios" class="row"> 
									<div class="form-group col-xs-1"> 
										<label for="chip_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="chip_id" id="chip_id" value="<?=$rs->fld("chip_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
									</div>
									
									<div class="form-group col-md-2">
										<label for="emp_id">#Empresa:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="emp_nome" id="emp_nome" value="<?=$rs->fld("emp_alias");?>"/>
										</div>
										</div>
										
									<div class="form-group col-md-2">
										<label for="chip_operadora">Operadora</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-signal"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="chip_operadora" name="chip_operadora"   value="<?=$rs->fld("chip_operadora");?>"/>
									</div>
									</div>
									
									
									
									<div class="form-group col-md-3">
										<label for="chip_serial">N&ordm; Serial</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="chip_serial" name="chip_serial"  value="<?=$rs->fld("chip_serial");?>"/>
									</div>
									</div>
									
									
									<div class="form-group col-md-2">
										<label for="chip_linha">Linha</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-whatsapp "></i>
										</div>
										<input type="text" DISABLED class="form-control" id="chip_linha" name="chip_linha"  value="<?=$rs->fld("chip_linha");?>"/>
									</div>
									</div>
									
								</div> 
								
								<div class="row">
								
										<div class="form-group col-md-2">
										<label for="chip_pin">Pin</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="chip_pin" name="chip_pin"  value="<?=$rs->fld("chip_pin");?>"/>
									</div>
									</div>
									
										<div class="form-group col-md-2">
										<label for="chip_pin2">Pin2</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="chip_pin2" name="chip_pin2"  value="<?=$rs->fld("chip_pin2");?>"/>
									</div>
									</div>
									
										<div class="form-group col-md-2">
										<label for="chip_puk">Puk</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="chip_puk" name="chip_puk"  value="<?=$rs->fld("chip_puk");?>"/>
									</div>
									</div>
									
										<div class="form-group col-md-2">
										<label for="chip_puk2">Puk2</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="chip_puk2" name="chip_puk2"  value="<?=$rs->fld("chip_puk2");?>"/>
									</div>
									</div>
									
								</div> 
								<div id="usuarios" class="row"> 
								
									
										
									 <div class="form-group col-md-3"> 
											<label for="sel_empChip">Sel. uma Empresa</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
											<select class="form-control select2" id="sel_empChip" name="sel_empChip">    
											<option value=''>Selecione...</option>
											<?php
												$whr = "emp_id <> 0";
												$rs->Seleciona("*","at_empresas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?>
												<option value="<?=$rs->fld("emp_id");?>"> <?=$rs->fld("emp_alias");?></option>      
												<?php
												
												}  
											?>
											</select>      
										</div>
										</div> 
									
									</div> 
								<div id="usuarios" class="row"> 
								
								<div class="box-header with-border"> 
										<h3 class="box-title">Atribuir para o Equipamento:</h3>
										<div class="box-tools pull-right"> 
										</div>
										</div>
											
											
									<div class="form-group col-md-3"> 
											<label for="sel_tpCel">Sel. o Tipo</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-edit"></i>
										</div>
											<select class="form-control select2" id="sel_tpCel" name="sel_tpCel">    
											<option value="">Selecione:</option> 
												
											</select>     
										</div>
									</div>
									
									<div class="form-group col-md-3"> 
											<label for="sel_marcaCel">Selecione a Marca</label> 
											<div class="input-group"> 
										<div class="input-group-addon">  
											<i class="fa fa-android"></i>
										</div>
											<select class="form-control select2" id="sel_marcaCel" name="sel_marcaCel">    
											<option value="">Selecione:</option> 
					
											</select>    
										</div> 
										</div>
										
										<div class="form-group col-md-3"> 
											<label for="sel_eqchip">Selecione o Equipamento</label> 
											<div class="input-group"> 
										<div class="input-group-addon">  
											<i class="glyphicon glyphicon-phone"></i>
										</div>
											<select class="form-control select2" id="sel_eqchip" name="sel_eqchip">    
											<option value="">Selecione:</option> 
					
											</select>    
										</div> 
										</div>
									
									</div>
									  
								
								<div id="consulta"></div>
								<div id="formerrosAtrchip" class="clearfix" style="display:none;"> 
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
								<a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Chip.php?token=<?=$_SESSION['token']?>&acao=N&chipid=<?=$chip;?>"><i class="fa fa-dashboard"></i> Gerenciar </a>
								
								<!--<a 	class="btn btn-warning btn-sm" data-toggle='tooltip' data-placement='bottom' title='solicita&ccedil;&atilde;o'  a href="at_solic_Eq.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-bullhorn"></i> Solicita&ccedil;&atilde;o</a>
 
								
								
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-info"><i class="fa fa-hand-o-left"></i> Cancela </a>-->
								
								
							</div>
							<div id="mens"></div> 
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

</body>
</html>	