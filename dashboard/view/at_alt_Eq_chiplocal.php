<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVOLOCAL";
$pag = "at_chipslocais.php";// Fazer o link brilhar quando a pag estiver ativa
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
							"N" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_AltchipEq","label"=>"Alterar")  
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
				$eq_id = $rs->fld("chip_eqId");
				
 				
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
						<form role="form" id="alt_chipeq"> 
							
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
										<input type="text" DISABLED  class="form-control" id="chip_operadora" name="chip_operadora"   value="<?=$rs->fld("chip_operadora");?>"/>
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
										<input type="text" DISABLED  class="form-control" id="chip_pin" name="chip_pin"  value="<?=$rs->fld("chip_pin");?>"/>
									</div>
									</div>
									
										<div class="form-group col-md-2">
										<label for="chip_pin2">Pin2</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text"DISABLED  class="form-control" id="chip_pin2" name="chip_pin2"  value="<?=$rs->fld("chip_pin2");?>"/>
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
									
									<div class="form-group col-md-3">
										<label for="marc_nome">#Cadastrado em:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar-check-o"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$fn->data_hbr($rs->fld("chip_datacad"));?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
										</div>
									</div>
									
									<div class="form-group col-md-3">   
										<label for="usu_nome">#Cadastrado por:</label> 
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user-secret"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$rs->fld("usu_nome")?>"/>  
										</div> 
									</div> 
									
								</div> 
								<div id="usuarios" class="row">
												<?php
													$sql ="SELECT * FROM at_equipamentos a
													JOIN at_empresas      b ON a.eq_empId  = b.emp_id 
													JOIN eq_marca         c ON a.eq_marcId = c.marc_id
													JOIN eq_tipo          e ON a.eq_tipoId = e.tipo_id
													JOIN at_status        f ON a.eq_statusId = f.status_id
													WHERE eq_id=".$eq_id;
													$rs->FreeSql($sql);
													$rs->GeraDados();
												
												?> 
												<div class="box-header with-border"> 
												<h3 class="box-title">Utilizado No Equipamento:</h3>
												<div class="box-tools pull-right"> 
												</div>
												</div>
												
												<div class="form-group col-md-2">  
												<label for="eq_mqId">Empresa</label>
												<div class="input-group">
												<div class="input-group-addon">
												<i class="fa fa-building"></i>
												</div> 
												<input type="text" DISABLED  class="form-control " name="" id="" value="<?=$rs->fld("emp_alias")?>"/>  
												<input type="hidden" value="<?=$rs->fld("emp_id");?>" name="eq_mqId" id="eq_mqId">
												</div>
												</div>
												
												<div class="form-group col-md-3">
												<label for="tipo_desc">#Tipo:</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="glyphicon glyphicon-edit"></i>
													</div>
												<input type="text" DISABLED  class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("tipo_desc");?>"/>
												</div>
												</div>
									
												<div class="form-group col-md-2">
												<label for="marc_nome">#Marca:</label>
												<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-android"></i>
													</div>
												<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("marc_nome");?>"/>
												</div>
												</div>
									  
												<div class="form-group  col-md-2">  
												<label for="eq_modelo">#Modelo:</label>
												<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-mobile"></i>
												</div>
												<input type="text" DISABLED class="form-control" name="eq_modelo" id="eq_modelo" value="<?=$rs->fld("eq_modelo")?>"/>  
												</div>
												</div> 
								
								
												<div class="form-group col-md-2">  
												<label for="eq_mqId">#Equipamento</label>
												<div class="input-group">
												<div class="input-group-addon">
												<i class="glyphicon glyphicon-phone"></i>
												</div> 
												<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("eq_desc")?>"/>  
												<input type="hidden" value="<?=$rs->fld("eq_id");?>" name="eq_id" id="eq_id">
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
											<?php
												$whr = "tipo_desc = 'Celular Corporativo' AND tipo_empId =".$_SESSION['usu_empresa'];
												$rs->Seleciona("*","eq_tipo",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("tipo_id");?>"><?=$rs->fld("tipo_desc");?></option>
												<?php 
												} 
											?> 	
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
								<div id="formerrosAltchip" class="clearfix" style="display:none;"> 
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
								
								
								
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
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
	<script src="http://localhost/infraprime/dashboard/js/action_ativoslocais.js"></script>  <!--Chama o java script -->
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