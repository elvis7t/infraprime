<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_maquinas.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>M&aacute;quinas</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">M&aacute;quinas </li>
				<li class="active">Gerenciar</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_AltusuMq","label"=>"Alterar") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="	SELECT * FROM at_maquinas a
				JOIN at_empresas    b ON a.mq_empId     = b.emp_id 
				JOIN mq_fabricante  c ON a.mq_fabId     = c.fab_id
				JOIN sys_usuarios   d ON a.mq_usucad    = d.usu_cod
				JOIN eq_tipo        e ON a.mq_tipoId    = e.tipo_id
				JOIN at_status      f ON a.mq_statusId  = f.status_id
				JOIN mq_memoria     g ON a.mq_memId     = g.mem_id
				JOIN mq_hd          h ON a.mq_hdId      = h.hd_id
				JOIN mq_os          i ON a.mq_osId      = i.os_id
				JOIN mq_office      j ON a.mq_officeId  = j.office_id
		   		WHERE mq_id = ".$mqid; 
				$rs->FreeSql($sql);
 				$rs->GeraDados(); 
				
				$usu_nome       = $rs->fld("usu_nome");  
				$mq_status      = $rs->fld("mq_status");  
				$mq_valor       = $rs->fld("mq_valor");  
				$mq_nf          = $rs->fld("mq_nf");  
				$mq_memId       = $rs->fld("mq_memId");  
				$mq_hdId        = $rs->fld("mq_hdId");  
				$mq_osId        = $rs->fld("mq_osId");  
				$mq_officeId    = $rs->fld("mq_officeId");  
				$status_id      = $rs->fld("status_id");  
				$status_classe  = $rs->fld("status_classe");  
				$status_desc    = $rs->fld("status_desc");  
				$usu_id = $rs->fld("mq_usuId");
 				
				
				$usu_id = $rs->fld("mq_usuId");
				$dp_id = $rs->fld("mq_dpId");
				
				$eq_usuEmp_id = $rs->fld("mq_usuEmpId");  
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
						<form role="form" id="alt_usumq">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="usuarios" class="row"> 
									<div class="form-group col-xs-1"> 
										<label for="mq_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="mq_id" id="mq_id" value="<?=$rs->fld("mq_id");?>"/>
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
										<label for="tipo_desc">#Tipo:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-laptop"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("tipo_desc");?>"/>
										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="marc_nome">#Fabricante:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-industry"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("fab_nome");?>"/>
										</div>
									</div>
															 
								   <div class="form-group  col-md-2">  
										<label for="mq_modelo">#Modelo:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-laptop"></i> 
										</div>
										<input type="text" DISABLED class="form-control" name="mq_modelo" id="mq_modelo" value="<?=$rs->fld("mq_modelo")?>"/>  
										</div>
									</div> 
								   
								   <div class="form-group col-md-3">
										<label for="mq_datacad">#Cadastrado em:</label>
										<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-calendar-check-o"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="mq_datacad" id="mq_datacad"  value="<?=$fn->data_hbr($rs->fld("mq_datacad"));?>"/>
										
										</div>
									    </div>
								   
								</div> 
								<div class="row">
									
									<div class="form-group  col-md-2">  
										<label for="mq_nome">#Nome:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-desktop"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="mq_nome" id="mq_nome" value="<?=$rs->fld("mq_nome")?>"/>  
										</div>
									</div>
									
									<div class="form-group col-md-2">
										<label for="mq_tag">#Service Tag:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-tag"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="mq_tag" name="mq_tag"  value="<?=$rs->fld("mq_tag")?>"/>
										</div>
									</div>
									
									<div class="form-group col-md-3">
										<label for="mq_proc">#Processador:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-bug"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="mq_proc" name="mq_proc"  value="<?=$rs->fld("mq_proc")?>"/>
										</div>
									</div>
									
									<div class="form-group col-md-2 "> 
										<label for="mq_memId">#Mem&oacute;ria:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-microchip"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="mq_memId" name="mq_memId"  value="<?=$rs->fld("mem_tipo");?> <?=$rs->fld("mem_cap");?>"/>
										</div> 
										</div> 
										
									
									<div class="form-group col-md-2 "> 
										<label for="mq_hdId">#HD:</label>  
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-hdd-o"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="mq_hdId" name="mq_hdId"  value="<?=$rs->fld("hd_tipo");?> <?=$rs->fld("hd_cap");?>"/>
												
										</div> 
										</div>
																										
								</div> 
								<div class="row">
									
										<div class="form-group col-md-4 "> 
										<label for="mq_osId">#Sistema Operacional:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-windows"></i> 
										</div>
										<input type="text" DISABLED class="form-control" id="mq_osId" name="mq_osId"  value="<?=$rs->fld("os_desc");?>   <?=$rs->fld("os_versao");?>"/>
										</div>  
										</div>
									
									<div class="form-group col-md-4 "> 
										<label for="mq_officeId">#Office:</label>
										<div class="input-group">
										<div class="input-group-addon"> 
											<i class="fa fa-opera"></i>
										</div>
											<input type="text" DISABLED class="form-control" id="mq_officeId" name="mq_officeId"  value="<?=$rs->fld("office_desc");?>   <?=$rs->fld("office_versao");?>"/>
													
										</div> 
										</div>
									
									<div class="form-group col-md-2 "> 
										<label for="mq_statusId">#Status:</label>
										<div class="input-group">
										<div class="input-group-addon"> 
											<i class="<?=$status_classe?>"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="mq_statusId" name="mq_statusId"  value="<?=$rs->fld("status_desc");?>"/>
													
										</div>
									</div>
									
									<div class="form-group col-md-2">  
										<label for="mq_valor">#Valor:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-usd"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="mq_valor" id="mq_valor" value="<?=$mq_valor?>"/>  
										</div>
									</div>      
									
									<div class="form-group col-md-4">
										<label for="mq_nf">#N&ordm; Nota Fiscal:</label>  
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="mq_nf" name="mq_nf" value="<?=$mq_nf?>"/>
										</div>
									</div> 
													 				
									<div class="form-group col-md-3">   
										<label for="usu_nome">#Cadastrado por:</label> 
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user-secret"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$usu_nome?>"/>  
										</div> 
									</div>
									
								</div>  
								<div id="usuarios" class="row">
									<?php
												
												$whr = "usu_id=".$usu_id;
												$rs->Seleciona("*","at_usuarios a
												JOIN at_empresas      b ON a.usu_empId  = b.emp_id 
												JOIN at_departamentos c ON a.usu_dpId   = c.dp_id",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?> 
										<div class="box-header with-border"> 
										<h3 class="box-title">Dados do Usu&aacute;rio que esta utilizando</h3>
										<div class="box-tools pull-right"> 
										</div>
										</div>
										
										<div class="form-group col-md-2">  
										<label for="eq_dpId">#Empresa:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("emp_alias")?>"/>  
										
										</div>
										</div>
										
										<div class="form-group col-md-2">  
										<label for="eq_dpId">#Departamento:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("dp_nome")?>"/>  
										<input type="hidden" value="<?=$rs->fld("dp_id");?>" name="eq_dpId" id="eq_dpId">
										</div>
										</div>
									
										<div class="form-group col-md-3">  
										<label for="eq_usuId">#Usu&aacute;rio:</label>
										<div class="input-group">
										<div class="input-group-addon">  
								 		<i class="fa fa-user"></i>
										</div>
										<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("at_usu_nome")?>"/>  
										<input type="hidden" value="<?=$rs->fld("usu_id");?>" name="eq_usuId" id="eq_usuId">
										</div>
										</div>
										
									</div> 
									<div id="usuarios" class="row">
										<?php
												}  
											?>  
									   
									 
									
										
										
									
										
									</div> 
									<div id="usuarios" class="row">
									
										<div class="box-header with-border"> 
										<h3 class="box-title">Alterar para:</h3>
										<div class="box-tools pull-right"> 
										</div>
										</div>
										
								   	
									
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
								 
								<div id="consulta"></div>
								<div id="formerrosAltusueq" class="clearfix" style="display:none;"> 
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