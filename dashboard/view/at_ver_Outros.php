<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_outros.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<li class="active">Equipamentos </li>
				<li class="active">Outras Ocorrencias</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content"> 
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-success  btn-sm", "icone" => "fa fa-recycle", "id"=>"btn_Desceq","label"=>"Descartar")  
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT eq_id, emp_alias, tipo_desc, marc_nome, eq_modelo, eq_desc, status_id, usu_nome, status_classe, eq_serial, eq_valor, status_desc, eq_descmotivo, eq_datacad, eq_datades, eq_datadoa, usu_nome
						FROM at_equipamentos a
						JOIN at_empresas b ON a.eq_empId = b.emp_id
						JOIN eq_marca c ON a.eq_marcId = c.marc_id
						JOIN sys_usuarios d ON a.eq_usudes = d.usu_cod
						JOIN eq_tipo e ON a.eq_tipoId = e.tipo_id
						
						JOIN at_status       h ON a.eq_statusId = h.status_id

						WHERE eq_id =".$doacaoid."

						UNION ALL
						SELECT mq_id, emp_alias, tipo_desc, fab_nome, mq_modelo, mq_nome, status_id, usu_nome, status_classe,  mq_tag, mq_valor, status_desc, mq_descmotivo, mq_datacad, mq_datades, mq_datadoa, usu_nome
						FROM at_maquinas a
						JOIN at_empresas b ON a.mq_empId = b.emp_id
						JOIN mq_fabricante c ON a.mq_fabId = c.fab_id
						JOIN sys_usuarios d ON a.mq_usudes = d.usu_cod
						JOIN eq_tipo e ON a.mq_tipoId = e.tipo_id
						
						JOIN at_status       h ON a.mq_statusId = h.status_id


						WHERE mq_id =".$doacaoid; 
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				
				$var = $rs->fld("emp_id");
				$usu = $rs->fld("usu_nome");
				$status_id      = $rs->fld("status_id");  
				$status_classe  = $rs->fld("status_classe");  
				$status_desc    = $rs->fld("status_desc"); 
				$motivo =$rs->fld("eq_descmotivo");
				$data1 = $rs->fld("eq_datacad");
				$data2 = $rs->fld("eq_datades");
				$diferenca = strtotime($data2) - strtotime($data1);
				$dias = floor($diferenca / (60 * 60 * 24));
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
						<form role="form" id="Desceq">
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="usuarios" class="row"> 
									<div class="form-group col-xs-1">
										<label for="eq_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="eq_id" id="eq_id" value="<?=$rs->fld("eq_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">											
									</div> 
									
									<div class="form-group col-md-3">
										<label for="emp_id">#Empresa:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-building"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("emp_alias");?>"/>														
											</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="tipo_id">#Tipo:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="glyphicon glyphicon-print"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("tipo_desc");?>"/>														
											</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="marc_id">#Marca:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-android"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("marc_nome");?>"/>
													<input type="hidden" value="<?=$rs->fld("marc_id");?>" name="marc_id" id="marc_id">
											</div>
									</div>
									
									<div class="form-group  col-md-3">  
										<label for="eq_desc">#Descri&ccedil;&atilde;o:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-keyboard-o"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="eq_desc" id="eq_desc" value="<?=$rs->fld("eq_desc")?>"/>  
											</div>
									</div>
								</div> <!-- ./row -->
							  
								<div id="usuarios" class="row">
									<div class="form-group  col-md-4">  
										<label for="eq_serial">#N&ordm; Serial:</label>   
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-key"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="eq_serial" id="eq_serial" value="<?=$rs->fld("eq_serial")?>"/>  
										</div>
									</div>
								
									<div class="form-group  col-md-2">  
										<label for="eq_modelo">#Modelo:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-mobile"></i>
												</div> 
													<input type="text" DISABLED  class="form-control" name="eq_modelo" id="eq_modelo" value="<?=$rs->fld("eq_modelo")?>"/>  
											</div>
									</div>									
									
									<div class="form-group col-md-2">  
										<label for="eq_status">#Status:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="<?=$status_classe?>"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="eq_status" id="eq_status" value="<?=$status_desc?>"/>  
											</div>
									</div>
									
									<div class="form-group col-md-2">  
										<label for="eq_valor">#Valor:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-usd"></i>
												</div> 
													<input type="text" DISABLED class="form-control " name="eq_valor" id="eq_valor" value="<?=$rs->fld("eq_valor")?>"/>  
											</div>
									</div>
									
									<div class="form-group col-md-2"><!--Tem que ser antes do selectt --> 
												<label for="man_ativo">Status</label><br>  
												<input type="radio" DISABLED class="minimal" value=1 <?=($rs->fld("Mq_ativo")==1?"CHECKED":"");?> id="man_ativo" name="man_ativo"> Ativo<br>
												<input type="radio" DISABLED class="minimal" value=0 <?=($rs->fld("Mq_ativo")==0?"CHECKED":"");?> id="man_ativo" name="man_ativo"> Inativo<br>
									</div>
															
								</div><!-- ./row -->
								
								<div id="usuarios" class="row">
									<div class="form-group col-md-3">   
										<label for="usu_nome">#Alterado por:</label> 
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user-secret"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$rs->fld("usu_nome")?>"/>  
											</div>
									</div>
									
									<div class="form-group col-md-3">
										<label for="marc_nome">#Cadastrado em:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-calendar-check-o"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$fn->data_hbr($rs->fld("eq_datacad"));?>"/>											
										</div>
									</div>
									
									<div class="form-group col-md-3">
										<label for="marc_nome">#Alterado em:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar-check-o"></i>
											</div>
												<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$fn->data_hbr($rs->fld("eq_datades"));?>"/>
										</div>
									</div>
									
									<div class="form-group col-md-2"> 
										<label for="eq_valor">#Vida &Uacute;til:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-heartbeat"></i>
												</div> 
													<input type="text" DISABLED class="form-control " name="eq_valor" id="eq_valor" value="<?=$dias;?> Dias"/> 
											</div>
									</div>									
									
									<div class="form-group col-md-6">  
										<label for="mq_descmotivo">Motivo</label> 
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-exclamation-triangle"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="mq_descmotivo" id="mq_descmotivo" value="<?=$rs->fld("eq_descmotivo")?>">   
											</div>
									</div>						
															
								</div><!-- ./row -->								
								<div id="consulta"></div>
								<div id="formerrosDesceq" class="clearfix" style="display:none;">  
									<div class="callout callout-danger"> 
										<h4>Erros no preenchimento do formul&aacute;rio.</h4>
										<p>Verifique os erros no preenchimento acima:</p>
										<ol>
											<!-- Erros são colocados aqui pelo validade -->
										</ol> 
									</div>
								</div>
							</div><!-- ./body--> 					
							
							<div class="box-footer">
							<!--<button class="<?=$menu[$acao]['class'];?>" type="button" id="<?=$menu[$acao]['id'];?>"><i class="<?=$menu[$acao]['icone'];?>"></i> <?=$menu[$acao]['label'];?></button>-->
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
							</div>
							<div id="mens"></div>
						</form><!-- ./form -->
					</div><!-- ./box -->  
					
				</div><!-- ./col -->					
			</div><!-- ./row -->
		</section>
	</div><!-- ./wrapper --> 
	<?php 
        require_once("../config/footer.php");
        //require_once("../config/side.php"); 
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