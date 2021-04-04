<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();


$sess = "USU";

$pag = "sys_vis_cadUsuarios.php";

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
            Usu&aacute;rio
           		<small>Cadastro</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Cadastro de Usu&aacute;rios </li>
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
                 <h3 class="box-title">Cadastro de Usu&aacute;rios</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form id="cadUsu" role="form"> 
                  <div class="box-body">
                    <div class="row"> 
						











































						<div class="form-group  col-md-4"> 
							<label for="sel_emp">Selecione a Empresa</label>
							<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-building"></i>
							</div>
							<select class="form-control select2" id="sel_emp" name="sel_emp">
								<option value="">Selecione:</option>
								<?php
								$whr = "emp_id<>0";
								$rs->Seleciona("*","at_empresas",$whr);
								WHILE($rs->GeraDados()){
								?>
								<option value="<?=$rs->fld("emp_id");?>"></option>>
								<?php
								}
								?>
							</select> 
						</div> 
						</div> 
						<div class="form-group col-md-4">  
							<label for="sel_cnpj">CNPJ</label>
							<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-key"></i>
								</div> 
								<select class="form-control select2" id="sel_cnpj" name="sel_cnpj">
									
									
								</select> 
						</div>
						</div>
						
						<div class="form-group col-md-4">  
							<label for="sel_dp">Selecione o Departamento</label>
							<div class="input-group">
							<div class="input-group-addon">
								<i class="glyphicon glyphicon-tasks"></i>
								</div> 
								<select class="form-control select2" id="sel_dp" name="sel_dp">
									<option value="">Selecione:</option>
									
								</select> 
						</div>
						</div>
						
				</div>
				<div class="row">
				
						<div class="form-group col-md-3">
							<label for="usu_nome">Nome do Usu&aacute;rio</label> 
							<div class="input-group">
							<div class="input-group-addon">  
								<i class="fa fa-user-secret"></i>
							</div>
							<input type="text" class="form-control" id="usu_nome" name="usu_nome"  placeholder="Desc. o acr&ocirc;nimo de usu&aacute;rio ">
						</div>
						</div>
					 
					
						<div class="form-group col-md-4">
						<label for="usu_email">E-mail</label>
							<div class="input-group">
							<div class="input-group-addon">  
								<i class="fa fa-envelope"></i>
							</div>
							<input type="text" class="form-control" id="usu_email" name="usu_email"  placeholder="E-mail de Usuario">
						</div>
						</div>
						
					
						<div class="form-group col-md-2">
							<label for="usu_senha">Senha</label>
							<div class="input-group">
							<div class="input-group-addon">  
								<i class="fa fa-key"></i>
							</div>
							<input type="password" class="form-control" id="usu_senha" name="usu_senha"  placeholder="Senha de Usuario">
						</div>
						</div>
						
						
						<div class="form-group col-md-2">
							<label for="usu_csenha">Confirme Senha</label>
							<div class="input-group">
							<div class="input-group-addon">  
								<i class="fa fa-key"></i>
							</div>
							<input type="password" class="form-control" id="usu_csenha" name="usu_csenha"  placeholder="Confirme senha">
						</div>
						</div>
						
				</div>
				<div class="row">
				
						<div class="form-group col-md-3">
							<label for="sel_class">Selecione a Classe</label>
							<div class="input-group">
							<div class="input-group-addon">  
								<i class="fa fa-universal-access"></i>
							</div>
							<select class="form-control select2" id="sel_class" name="sel_class">
								<option value="">Selecione:</option>
								<?php
									$whr = "classe_id<>0";
									$rs->Seleciona("*","sys_classe",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
									while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
									?>
									<option value="<?=$rs->fld("classe_id");?>"><?=$rs->fld("classe_desc");?></option>
									<?php
									} 
								?>
							</select> 
						</div> 
						</div>  
						
					</div>
						<div id="formerrosCadusu" class="clearfix" style="display:none;">
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
						<button id="btn_cadusu" type="button" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
					</div>
					<div id="mens"></div>
                </form>
              </div><!-- /.box --> 
			   <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header with-border">
                  <h3 class="box-title">Usu&aacute;rios Cadastrados</h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
				</div>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    <table id="usuarios" class="table table-bordered table-striped">
						<thead>
							  <tr>
									<th>C&oacute;d:</th>
									<th>Empresa</th>
									<th>Departamento</th>
									<th>Nome</th>
									<th>Classe</th>
									<th>A&ccedil;&otilde;es</th>
							 </tr>
						</thead>
						<tbody id="usu_cad">
							<?php require_once("sys_tbUsuarios.php");?>
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
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> 
    <!-- SlimScroll 1.3.0 -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    
    <!-- AdminLTE for demo purposes -->
    <script src="https://infraprime.000webhostapp.com/dashboard/assets/dist/js/demo.js"></script>
    <script src="https://infraprime.000webhostapp.com/dashboard/js/action_usuarios.js"></script>
    <script src="https://infraprime.000webhostapp.com/dashboard/js/maskinput.js"></script>
    <script src="https://infraprime.000webhostapp.com/dashboard/js/jmask.js"></script>
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
