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
				<li class="active">Atribuir</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-plus", "id"=>"btn_AtrEq","label"=>"Atribuir") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM at_equipamentos a
				JOIN at_empresas  b ON a.eq_empId  = b.emp_id 
				JOIN eq_marca     c ON a.eq_marcId = c.marc_id
				JOIN sys_usuarios d ON a.eq_usucad = d.usu_cod
				JOIN eq_tipo      e ON a.eq_tipoId = e.tipo_id
				JOIN at_status    f ON a.eq_statusId = f.status_id
				WHERE eq_id = ".$eqid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				
				$var = $rs->fld("emp_id");
				$usu = $rs->fld("usu_nome");
				$dp_id = $rs->fld("dp_id");
				$status_id      = $rs->fld("status_id");  
				$status_classe  = $rs->fld("status_classe");  
				$status_desc    = $rs->fld("status_desc");  
				
 				
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
						<form role="form" id="atr_eq"> 
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="usuarios" class="row"> 
									<div class="form-group col-xs-1"> 
										<label for="eq_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="eq_id" id="eq_id" value="<?=$rs->fld("eq_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=$rs->fld("emp_id");?>" name="emp_id" id="emp_id"> 
									</div>
									
									<div class="form-group col-md-3">
										<label for="emp_id">#Empresa:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="emp_nome" id="emp_nome" value="<?=$rs->fld("emp_alias");?>"/>
										</div>
										</div>
										
									<div class="form-group col-md-2">
										<label for="tipo_desc">#Tipo:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="glyphicon glyphicon-print"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("tipo_desc");?>"/>
										</div>
									</div>
									
									<div class="form-group col-md-3">
										<label for="marc_nome">#Marca:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-android"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("marc_nome");?>"/>
										</div>
									</div>
									  
								   <div class="form-group  col-md-2">  
										<label for="eq_serial">#Modelo:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="eq_modelo" id="eq_modelo" value="<?=$rs->fld("eq_modelo")?>"/>  
										</div>
									</div> 
								
								</div> 
								<div id="usuarios" class="row">  
								
									<div class="form-group  col-md-4">  
										<label for="eq_serial">#N&ordm; Serial:</label>  
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text"  DISABLED class="form-control" name="eq_serial" id="eq_serial" value="<?=$rs->fld("eq_serial")?>"/>  
										</div>
									</div>
									
									<div class="form-group  col-md-3">   
										<label for="eq_desc">#Equipamento:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-keyboard-o"></i>
										</div>
										<input type="text" DISABLED  class="form-control" name="eq_desc" id="eq_desc" value="<?=$rs->fld("eq_desc")?>"/>  
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
										<input type="text" DISABLED class="form-control " name="eq_valor" id="eq_valor" value="<?=$fn->formata_din($rs->fld("eq_valor"))?>"/>  
										</div>
									</div>  
									
								</div> 
								<div id="usuarios" class="row"> 
								
									
										
									 <div class="form-group col-md-3"> 
											<label for="sol_emp">Sel. uma Empresa</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
											<select class="form-control select2" id="sol_emp" name="sol_emp">    
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
										<h3 class="box-title">Atribuir para usu&aacute;rio:</h3>
										<div class="box-tools pull-right"> 
										</div>
										</div>
								
									<div class="form-group col-md-3"> 
											<label for="sol_dp">Sel. um Departamento</label>
											<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
										</div>
											<select class="form-control select2" id="sol_dp" name="sol_dp">    
											<option value="">Selecione:</option>  
						
											</select>    
										</div>
									</div>
									
									<div class="form-group col-md-3"> 
											<label for="sol_usu">Selecione um usu&aacute;rio</label> 
											<div class="input-group"> 
										<div class="input-group-addon">  
											<i class="fa fa-user"></i>
										</div>
											<select class="form-control select2" id="sol_usu" name="sol_usu">    
											<option value="">Selecione:</option> 
					
											</select>    
										</div> 
										</div>
									
									</div>
									<div id="usuarios" class="row"> 
								
									<div class="box-header with-border"> 
										<h3 class="box-title">Atribuir para m&aacute;quina:</h3>
										<div class="box-tools pull-right"> 
										</div>
										</div>
		

									
										 <div class="form-group col-md-3"> 
											<label for="sol_mq">Selecione uma m&aacute;quina</label> 
											<div class="input-group">
											<div class="input-group-addon">
											<i class="fa fa-laptop"></i>
											</div> 
											<select class="form-control select2" id="sol_mq" name="sol_mq">
												<option value="">Selecione:</option>     
												 
											    </select>  
											</div>
										</div>  
								</div>  
								
								<div id="consulta"></div>
								<div id="formerrosAtreq" class="clearfix" style="display:none;"> 
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
										
										
								<a 	class="btn btn-sm btn-danger" data-toggle='tooltip' data-placement='bottom' title='Manuten&ccedil;&atilde;o'  a href="at_man_Eq.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-wrench"></i> Manuten&ccedil;&atilde;o</a>
								<a 	class="btn btn-sm btn-warning" data-toggle='tooltip' data-placement='bottom' title='Emprestimo'  a href="at_empre_Eq.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="glyphicon glyphicon-retweet"></i> Emprestimo</a>
								<a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Eq.php?token=<?=$_SESSION['token']?>&acao=N&eqid=<?=$eqid;?>"><i class="fa fa-dashboard"></i> Gerenciar</a>
								
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