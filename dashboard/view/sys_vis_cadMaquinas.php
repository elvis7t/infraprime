<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "sys_vis_cadMaquinas.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");

?>
   <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
		<!-- Content Header (Page header) -->
        <section class="content-header">
			<h1>
				Maquinas
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li>Solicita&ccedil;&atilde;o</li>
				<li class="active">Cadastro de Máqiuinas</li>
			</ol>
        </section>
        
		<?php
        
        	$hide="";
	        $iplocal = (isset($_GET['ip']) ? $_GET['ip'] : getenv('REMOTE_ADDR'));
	        if(isset($_GET['novo'])){$iplocal="";} 
	        $rs = new recordset();
	        $sql = "SELECT * FROM sys_maquinas a
	        			LEFT JOIN ec_usuarios b ON a.maq_user = b.ec_usu_cod
	        		WHERE maq_nome = '".$iplocal."'";
	        $rs->FreeSql($sql);
	        //echo $rs->sql;
	        if($rs->linhas>0){
	        	$hide = "hide";
	        	$rs->GeraDados();
	        }

	    ?>
        <!-- Main content -->
        <section class="content">
			<!-- Info boxes -->
			<div class="row">
				<!-- left column -->
				<div class="col-md-12">
					<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header with-border">
							<h3 class="box-title">Maquinas cadastradas</h3>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="cadDir" role="form">
							<div class="box-body">
								<div class="row">
									<div class="form-group col-md-3">
										<label for="dir_emp_id">Empresa</label><br>
										<div class="input-group">
											<div class="input-group-addon">
						                       	<i class="fa fa-industry"></i>
						                     </div>
											<select class="select2 form-control" class="form-control" id="dir_emp_id" name="dir_emp_id">
											<option value="">Selecione...</option> 
											<?php
												
												$rs->Seleciona("*","sys_empresas", "sys_emp_id<>0");
												while($rs->GeraDados()){ ?>
													<option value="<?=$rs->fld("sys_emp_id");?>"><?=$rs->fld("sys_emp_nome");?></option>
												<?php }
												
											?>
										</select>
									</div>
									</div> 
									<div class="form-group col-md-3">
										<label for="dir_emp_id">Departamentos</label><br>
										<div class="input-group">
											<div class="input-group-addon">
						                       	<i class="glyphicon glyphicon-list-alt"></i> 
						                     </div>
											<select class="select2 form-control" class="form-control" id="dir_emp_id" name="dir_emp_id">
											<option value="">Selecione...</option> 
											<?php
												
												$rs->Seleciona("*","sys_departamentos", "sys_dp_id<>0");
												while($rs->GeraDados()){ ?>
													<option value="<?=$rs->fld("sys_dp_id");?>"><?=$rs->fld("sys_dp_nome");?></option>
												<?php }
												
											?>
										</select>
									</div>
									</div> 
									<div class="form-group col-md-3">
										<label for="maq_ip">IP:</label>
										<div class="input-group">
											<div class="input-group-addon">
						                       	<i class="fa fa-laptop"></i>
						                     </div>
											<input type="text" class="form-control" <?=($iplocal==0?"":"DISABLED");?> name="maq_ip" value="<?=$iplocal;?>" id="maq_ip" data-inputmask="'alias': 'ip'" data-mask/>
										</div>
									</div>
									<div class="form-group col-md-4">
										<label for="maq_login">Login:</label>
										<div class="input-group">
											<div class="input-group-addon">
						                       	<i class="fa fa-lock"></i>
						                     </div>
											<input type="text" class="form-control" <?=($iplocal==0?"":"DISABLED");?> value="<?=($rs->fld("maq_usuario")!==NULL ? $rs->fld("maq_usuario") : gethostbyaddr($_SERVER['REMOTE_ADDR']));?>" name="maq_login" id="maq_login"/>
										</div>
									</div>
									<div class="form-group col-md-3">
										<label for="maq_user">Usuário:</label>
										<input type="hidden"  value="<?=$_SESSION['usu_cod'];?>">
										<div class="input-group">
											<div class="input-group-addon">
						                       	<i class="fa fa-user"></i>
						                     </div>
											<select name="maq_user" id="maq_user" class="form-control">
												<option value="">Selecione...</option>
												<?php
													$rs->Seleciona("*","ec_usuarios","ec_usu_ativo='1' AND ec_usu_emp_cnpj='".$_GET['cnpj']."'","","ec_usu_nome ASC");
													while($rs->GeraDados()){ ?>
														<option <?=($rs->fld("ec_usu_cod")==$rs->fld("maq_user") ? "SELECTED" :"");?> value="<?=$rs->fld("ec_usu_cod");?>"><?=$rs->fld("ec_usu_nome");?></option> 
												<?php
													}
												?>
											</select>
										</div>
									</div>
									<div class="row">
									<div class="form-group col-md-3">
										<label for="maq_sys">Sistema Oper.:</label>
										<div class="input-group">
											<div class="input-group-addon">
						                       	<i class="fa fa-windows"></i>
						                     </div>
											<input type="text" class="form-control" value="<?=$rs->fld("maq_sistema");?>" name="maq_sys" id="maq_sys"/>
										</div>
									</div>

									<div class="form-group col-md-2">
										<label for="maq_mem">Memória:</label>
										<div class="input-group">
											<div class="input-group-addon">
						                       	<i class="fa fa-flash"></i>
						                     </div>
											<input type="text" class="form-control" value="<?=$rs->fld("maq_memoria");?>" name="maq_mem" id="maq_mem"/>
										</div>
									</div>

									<div class="form-group col-md-2">
										<label for="maq_hd">HD:</label>
										<div class="input-group">
											<div class="input-group-addon">
						                       	<i class="fa fa-hdd-o"></i>
						                     </div>
											<input type="text" class="form-control" value="<?=$rs->fld("maq_hd");?>" name="maq_hd" id="maq_hd"/>
										</div>
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
							</div><!-- /.box-body -->
							
							<div class="box-footer">
								<button type="button" id="btn_cadDir"class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- /.box -->
			     <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Diretores Cadastrados</h3>
			</div><!-- /.box-header -->
			 <!-- form start -->
                <div class="box-body">
                    <table id="familias" class="table table-bordered table-striped">
						<thead>
							  <tr>
									<th>C&oacute;d:</th>
									<th>Empresa</th>
									<th>Diretor</th>
									<th>A&ccedil;&otilde;es</th>  
							  </tr>
						</thead>
						<tbody id="c_cad">
							<?php require_once("../controller/sys_tbDiretores.php");?>
						</tbody>
						 
					</table>
										
                 </div><!-- /.box-body -->
							
              </div><!-- /.box --> 
			  </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

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
    <!--<script src="plugins/fastclick/fastclick.min.js"></script>-->
    <!-- AdminLTE App -->
    <script src="http://localhost/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="http://localhost/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="http://localhost/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="http://localhost/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="http://localhost/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="http://localhost/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <!--<script src="http://localhost/dashboard/assets/dist/js/pages/dashboard2.js"></script> -->
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/dashboard/assets/dist/js/demo.js"></script>
	<script src="http://localhost/dashboardjs/action_contato.js"></script>
	<!-- Validation -->
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script>

	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();
	});

	</script>
  </body>
</html>