<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "USU";
$pag = "sys_usuarios.php";// Fazer o link brilhar quando a pag estiver ativa
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
$fn = new functions();
$rs = new recordset();

extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM sys_usuarios a
					JOIN sys_classe b ON a.usu_classe = b.classe_id 
					JOIN at_empresas c ON a.usu_empId = c.emp_id
					JOIN at_departamentos d ON a.usu_dpId = d.dp_id 
					JOIN sys_dados_user   e ON a.usu_email = e.dados_usu_email
				WHERE usu_cod = ".$usucod;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
			
				$data1 = $rs->fld("usu_datacad");
				$data2 = date("Y-m-d H:i:s");
				$diferenca = strtotime($data2) - strtotime($data1);
				$dias = floor($diferenca / (60 * 60 * 24));
				
				$var = $rs->fld("emp_id");
				$usu_nome = $rs->fld("usu_nome");
				$dp_id = $rs->fld("dp_id");
				$usu_classe = $rs->fld("usu_classe");
?>

     <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Perfil
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="#">Usu&aacute;rios</a></li> 
			<li class="active">Perfil</li>
		  </ol> 
		</section>

			<!-- Main content -->
			<section class="content">
		<div class="row">
				<div class="col-md-3"> <!-- left menu-->
				  <!-- Profile Image -->
				  <div class="box box-primary">
						<div class="box-body box-profile">
						  <img class="profile-user-img img-responsive img-circle" src="http://localhost/dashboard<?=$rs->fld('usu_foto');?>" alt="User profile picture">
						  <h3 class="profile-username text-center"><?=$rs->fld('usu_nome');?></h3>
						  <p class="text-muted text-center"><?=$rs->fld('dp_nome');?></p>
						</div><!-- /.box-body -->
				  </div><!-- /.box -->

					  <!-- About Me Box -->
						<div class="box box-primary">
							<div class="box-header with-border">
							<h3 class="box-title">Sobre</h3>
							</div><!-- /.box-header -->
							
							<div class="box-body">
								<strong><i class="fa fa-birthday-cake margin-r-5"></i>  Nascimento</strong>
									<p class="text-muted">
										<?=$fn->data_br($rs->fld('dados_nasc'));?>
									</p>
								<hr>
							  <strong><i class="fa fa-graduation-cap margin-r-5"></i>  Forma&ccedil;&atilde;o</strong>
									<p class="text-muted">
									  <?=$rs->fld('dados_escol');?>
									</p>
								<hr>
								
							  <strong><i class="fa fa-address-card margin-r-5"></i> Contato</strong>
								 <p class="text-muted">
									<adress>
									  <?php
										 echo $rs->fld('dados_tel').", Ramal ".$rs->fld('dados_ramal')."<br>";
										 echo $rs->fld('dados_cel')."<br>";									 
									  ?>
									  <a href="mailto:<?=$rs->fld('dados_usu_email')?>"><?=$rs->fld('dados_usu_email')?></a><br>
									</adress>  
								</p>
							  <hr>
							  
							  <strong><i class="fa fa-map-marker margin-r-5"></i> Endere&ccedil;o</strong>
								  <p class="text-muted">
										<adress>
										  <?php
											 echo $rs->fld('dados_rua').", ".$rs->fld('dados_num')." ".$rs->fld('dados_compl')."<br>";
											 echo $rs->fld('dados_bairro')." - ".$rs->fld('dados_cidade')." - ".$rs->fld('dados_uf')."<br> CEP: ".$rs->fld('dados_cep');
										  ?>
										</adress>  
								  </p>
							  <hr>
							  <strong><i class="fa fa-pencil margin-r-5"></i> Habilidades</strong>
							  <p>
								<?php 
								$estilos = array("danger","success","info","warning","primary");
								$skills = explode(";",$rs->fld('dados_habil'));
								foreach($skills as $ch => $vl){ ?>
								  <span class="label label-<?=$estilos[$ch];?>"><?=$vl;?></span>
								<?php  
								}
								?>
							  </p>							  
							</div><!-- /.box-body -->
						</div><!-- /.box -->
				</div><!-- /.left menu -->
				
				<div class="col-md-9"><!-- center menu -->
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="#tab_1" data-toggle="tab">Dados do Usu&aacute;rio</a></li>
						  <li><a href="#tab_2" data-toggle="tab">Dados Complementares</a></li>
						  <li><a href="#tab_3" data-toggle="tab">Atendimentos</a></li>
						  <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
						</ul>
					</div>
				  
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							<div class="box box-primary">
								<div class="box-body">
									<div class="row">
										<div class="form-group col-md-1">
										  <label for="emp_cnpj">ID</label>
										  <input class="form-control input-sm" readonly name="usucod" id="usucod" placeholder="Nome" value="<?=$rs->fld("usu_cod");?>">
										</div>

										<div class="form-group col-md-3">
										  <label for="emp_cnpj">Nome</label>
										  <input class="form-control input-sm"  id="usu_nome" placeholder="Nome" value="<?=$rs->fld("usu_nome");?>">
										    <input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										</div>
										
										<div class="form-group col-md-4">
										  <label for="emp_cnpj">E-mail / Usu&aacute;rio</label>
										  <input class="form-control input-sm"  id="usu_email_alt" placeholder="email" value="<?=$rs->fld("usu_email");?>">
										  <input type="hidden" class="form-control input-sm"  id="usu_email" placeholder="email" value="<?=$rs->fld("usu_email");?>">
										</div>
										
										<div class="form-group col-md-2">
										  <label for="emp_cnpj">Cadastrado em</label>
										  <input class="form-control input-sm text-uppercase" readonly id="emp" placeholder="Forma&ccedil;&atilde;o" value="<?=$fn->data_br($rs->fld('usu_datacad'));?>" <?=$disable; ?>> 
										</div>
										
										<div class="form-group col-md-2"><!--Tem que ser antes do selectt --> 
											<label for="usu_ativo">Ativo</label><br>  
											<input type="radio" class="minimal" value=1 <?=($rs->fld("usu_ativo")==1?"CHECKED":"");?> id="usu_ativo" name="usu_ativo"> Ativo<br>
											<input type="radio" class="minimal" value=0 <?=($rs->fld("usu_ativo")==0?"CHECKED":"");?> id="usu_ativo" name="usu_ativo"> Inativo<br>
										</div>
										
									</div><!-- /.row -->
									
									<div class="row">
										<div class="form-group col-md-3">
										  <label for="emp_cnpj">Empresa</label>
										  <input class="form-control input-sm text-uppercase" readonly id="emp" placeholder="Forma&ccedil;&atilde;o" value="<?=$rs->fld("emp_alias");?>" <?=$disable; ?>> 
										</div>
										<div class="form-group col-md-3">
										  <label for="emp_cnpj">Departamento</label>
											<select class="form-control select2" id="usu_dpId" name="usu_dpId">    
											<option value="">Selecione:</option>
											<?php
												$whr = "dp_empId=".$var;
												$rs->Seleciona("*","at_departamentos",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												 
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("dp_id");?>"<?=($rs->fld("dp_id")==$dp_id?"SELECTED":"");?>> <?=$rs->fld("dp_nome");?></option>      
												<?php
												}  
											?> 
											</select> 
										</div>
										<div class="form-group col-md-3">
										  <label for="emp_cnpj">Selecione a Classe</label>
											<select class="form-control select2" id="sel_class" name="sel_class">    
											<option value="">Selecione:</option>
											<?php
												$whr = "classe_id<>0";
												$rs->Seleciona("*","sys_classe",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												?>
												<option value="<?=$rs->fld("classe_id");?>"<?=($rs->fld("classe_id")==$usu_classe?"SELECTED":"");?>><?=$rs->fld("classe_desc");?></option>
												<?php
												}  
											?>
											</select> 
										</div>
										
									</div><!-- /.row -->
									
									<div class="row"> 
													<?php
													$rs = new recordset();
													$sql ="SELECT * FROM sys_usuarios a
														JOIN sys_classe b ON a.usu_classe = b.classe_id 
														JOIN at_empresas c ON a.usu_empId = c.emp_id
														JOIN at_departamentos d ON a.usu_dpId = d.dp_id 
														JOIN sys_dados_user   e ON a.usu_email = e.dados_usu_email
													WHERE usu_cod = ".$usucod;
													$rs->FreeSql($sql);
													$rs->GeraDados();												
													?>	
												  <div class="form-group col-md-3">
													<label from="lbl_senhaatual">Nova Senha</label>
													<input type="password" class="form-control" id="usu_senha" name="usu_senha"  value="<?=$rs->fld("usu_senha");?>">
												  </div>
								
									</div><!-- /.row -->				
								</div>
								
								<div class="box-footer">
									<button id="btn_Altusus" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Alterar Dados </button>
									<a 	class="btn btn-sm btn-info" data-toggle='tooltip' data-placement='bottom' title='Atribuir imagem'  a href="at_img_perfil.php?token=<?=$_SESSION['token']?>&acao=N&usucod=<?=$usucod;?>"><i class="fa fa-file-image-o"></i> Foto do Perfil</a>
									<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
								</div>
							</div>
							
							<div class="box box-solid">
							<?php
									$sql ="SELECT * FROM mq_manutencao
									WHERE man_usucad =".$usucod;  
									$rs->FreeSql($sql);
									while($rs->GeraDados()){}
									$atendimentos = $rs->linhas;
									 
									$sql ="SELECT * FROM at_maquinas
									WHERE mq_ativo <> 1 AND mq_empId =".$var;  
									$rs->FreeSql($sql);
									while($rs->GeraDados()){}
									$maquinas = $rs->linhas; 

									$sql ="SELECT * FROM at_equipamentos
									WHERE eq_ativo <> 1 AND eq_empId =".$var;  
									$rs->FreeSql($sql);
									while($rs->GeraDados()){}
									$equipamentos = $rs->linhas; 
									
									

									?>
								<div class="box-header">
								  <i class="fa fa-bar-chart-o"></i>
								  <h3 class="box-title">Suporte</h3>
								  <div class="box-tools pull-right">
									<button type="button" class="btn btn-default btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
									</button>
									<button type="button" class="btn btn-default btn-sm" data-widget="remove"><i class="fa fa-times"></i>
									</button>
								  </div>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
									<div class="col-md-12">									  
										<div class="col-md-4">
											<div class="info-box bg-red">
											  <span class="info-box-icon"><i class="ion-wrench"></i></span>
												<div class="info-box-content">
													<span class="info-box-text">Atendimentos</span>
													<span class="info-box-number"><?=$atendimentos;?></span>

													<div class="progress">
														<div class="progress-bar" style="width: <?=$atendimentos;?>%"></div>
													</div>												  
												</div>
												<!-- /.info-box-content -->
											</div>	
										</div>
										
										<div class="col-md-4">
											<div class="info-box bg-blue">
											  <span class="info-box-icon"><i class="ion-android-desktop"></i></span>
												<div class="info-box-content">
													<span class="info-box-text">M&aacute;quinas</span>
													<span class="info-box-number"><?=$maquinas;?></span>

													<div class="progress">
														<div class="progress-bar" style="width: <?=$maquinas;?>%"></div>
													</div>
												  <span class="progress-description">
													
												  </span>
												</div>
												<!-- /.info-box-content -->
											</div>	
										</div>
										
										<div class="col-md-4">
											<div class="info-box bg-green">
											  <span class="info-box-icon"><i class="ion-printer"></i></span>
												<div class="info-box-content">
													<span class="info-box-text">Equipamentos</span>
													<span class="info-box-number"><?=$equipamentos;?></span>

													<div class="progress">
														<div class="progress-bar" style="width: <?=$equipamentos;?>%"></div>
													</div>
												  <span class="progress-description">
													
												  </span>
												</div>
												<!-- /.info-box-content -->
											</div>	
										</div>	
									</div>
								</div>
								<!-- /.box-body -->
							</div>							
						</div><!-- /.tab-pane -->

						<div class="tab-pane" id="tab_2">
							<div class="box box-primary">
								<div class="box-body">
										<form role="form" id="alt_dados_perfil">
										  <div class="input-group col-md-12">
												<div class="row">
													<?php
													$rs = new recordset();
													$sql ="SELECT * FROM sys_usuarios a
														JOIN sys_classe b ON a.usu_classe = b.classe_id 
														JOIN at_empresas c ON a.usu_empId = c.emp_id
														JOIN at_departamentos d ON a.usu_dpId = d.dp_id 
														JOIN sys_dados_user   e ON a.usu_email = e.dados_usu_email
													WHERE usu_cod = ".$usucod;
													$rs->FreeSql($sql);
													
													$rs->GeraDados();
													$usu_cod = $rs->fld("usu_cod");
													
													?>
													<div class="form-group col-xs-2">
													  <label for="emp_uf">Nascimento</label>
													  <input class="form-control data_br"  id="data" placeholder="Data" value="<?=$fn->data_br($rs->fld("dados_nasc"));?>" <?=$disable; ?>>
													</div>
													 <div class="form-group col-xs-5">
													  <label for="emp_bai">Forma&ccedil;&atilde;o</label>
													  <input class="form-control input-sm text-uppercase"  id="escol" placeholder="Forma&ccedil;&atilde;o" value="<?=$rs->fld("dados_escol");?>" <?=$disable; ?>>
													</div>
													
												</div><!-- /.row -->
									
												<div class="row">
													
													<div class="form-group col-xs-2">
													<label for="usu_tel">Telefone</label> 
														<input type="text" class="form-control fone" id="usu_tel" name="usu_tel" value="<?=$rs->fld("dados_tel");?>" <?=$disable; ?> >
													</div>
														
													<div class="form-group col-xs-2">
													<label for="usu_ramal">Ramal</label> 
														<input type="text" class="form-control" id="usu_ramal" name="usu_ramal" value="<?=$rs->fld("dados_ramal");?>" <?=$disable; ?> >
													</div>
														
													<div class="form-group col-xs-3">
													<label for="usu_cel">Celular</label> 
														<input type="text" class="form-control cel" id="usu_cel" name="usu_cel" value="<?=$rs->fld("dados_cel");?>" <?=$disable; ?> >
													</div>
													
													<input type="hidden" class="form-control input-sm" readonly id="usu_email" placeholder="email" value="<?=$rs->fld("usu_email");?>">
													
												</div><!-- /.row -->
									
												<div class="row">		
													<div class="form-group col-xs-3">
													  <label for="emp_cep">CEP</label>
													  <input class="form-control input-sm"  id="cep" placeholder="CEP" value="<?=$rs->fld("dados_cep");?>" <?=$disable; ?>>
													</div>
													<div class="form-group col-xs-5">
													  <label for="emp_log">Logradouro</label>
													  <input class="form-control input-sm text-uppercase"  id="log" placeholder="Logradouro" value="<?=$rs->fld("dados_rua");?>" <?=$disable; ?>>
													</div>
													<div class="form-group col-xs-2">
													  <label for="emp_num">N&uacute;mero</label>
													  <input class="form-control input-sm" id="num"  placeholder="Num.:" value="<?=$rs->fld("dados_num");?>" <?=$disable; ?>>
													</div>
													<div class="form-group col-xs-2">
													  <label for="emp_comp">Complemento</label>
													  <input class="form-control input-sm text-uppercase"  id="compl" placeholder="Compl.:" value="<?=$rs->fld("dados_compl");?>" <?=$disable; ?>>
													</div>
													<div class="form-group col-xs-5">
													  <label for="emp_bai">Bairro</label>
													  <input class="form-control input-sm text-uppercase"  id="bai" placeholder="Bairro" value="<?=$rs->fld("dados_bairro");?>" <?=$disable; ?>>
													</div>
													<div class="form-group col-xs-5">
													  <label for="emp_cid">Cidade</label>
													  <input class="form-control input-sm text-uppercase"  id="cid" placeholder="Cidade" value="<?=$rs->fld("dados_cidade");?>" <?=$disable; ?>>
													</div>
													<div class="form-group col-xs-2">
													  <label for="emp_uf">UF</label>
													  <input class="form-control input-sm text-uppercase" id="uf" placeholder="UF" value="<?=$rs->fld("dados_uf");?>" <?=$disable; ?>>
													</div>
												</div><!-- /.row -->
												
												<div id="formerros_senha" class="" style="display:none;">
												  <div class="callout callout-danger">
													<h4>Erros no preenchimento do formul&aacute;rio.</h4>
													<p>Verifique os erros no preenchimento acima:</p>
													<ol>
													  <!-- Erros são colocados aqui pelo validade -->
													</ol>
												  </div>
												</div>  
											  <div id="consulta2"></div>
										</form>
									</div><!-- /.box-body -->
									<div class="box-footer">
										<button id="bt_altera_perfil" class="btn btn-sm btn-primary"><i class="fa fa-pencil"></i> Alterar Dados </button>
									</div>
								</div><!-- /.box -->
							</div><!-- /.tab-pane -->
						</div><!-- /.tab-content -->
						
						<div class="tab-pane" id="tab_3">
							<div class="box box-primary">
								<div class="box-body">
									<div class="input-group col-md-12">
										<div class="box-header with-border">
										<h3 class="box-title">Historico de Atendimentos</h3>
											<div class="box-tools pull-right"> 
												<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-ninus"></i></button>   
											</div>
										</div><!-- /.box-header -->
										<!-- form start -->
										<div class="box-body">
											<table id="manutencao" class="table table-bordered table-striped">
												<thead>
														<tr>
															<th>C&oacute;d:</th>
															<th>M&aacute;quina</th> 
															<th>Empresa</th> 
															<th>Recebida em:</th> 
															<th>Concluido em:</th> 
															<th>Chamado N&ordm;:</th> 
															<th>Status</th>
															 
															
													  </tr>
												</thead>
												<tbody id="Man_cad">  
												<?php require_once("at_tbatendimento.php");?>    	
												</tbody> 
												 
											</table>
										</div><!-- /.box-body --> 
									</div><!-- /.box-body -->
									<div class="box-footer">
										<!--<button id="bt_alt_senha" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i> Alterar</button>-->
									</div>
								</div><!-- /.box -->
							</div><!-- /.tab-pane -->
						</div><!-- /.tab-content -->
					</div><!-- nav-tabs-custom -->
				</div><!-- /.center menu -->
			</section><!-- ./section -->
		</div><!-- ./row -->
		
		<?php
		require_once("../config/footer.php");
		?>
	</div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 --> 
    <script src="http://localhost/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://localhost/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
	<!-- jQuery Knob -->
	<script src="http://localhost/dashboard/assets/plugins/knob/jquery.knob.js"></script>    
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
	<!--datatables-->
    <script src="http://localhost/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://localhost/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>    
     <!-- ChartJS 1.0.1-->
    <script src="http://localhost/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="http://localhost/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/dashboard/assets/dist/js/demo.js"></script>	
	<script src="http://localhost/dashboard/js/functions.js"></script>  <!--Chama o java script para excluir -->
	<script src="http://localhost/dashboard/js/action_usuarios.js"></script>  <!--Chama o java script para mascara -->
	<script src="http://localhost/dashboard/js/controle.js"></script>  <!--Chama o java script para mascara e CEP AUTOMATICO -->
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
		$('#manutencao').DataTable({
		"columnDefs": [{
		"defaultContent": "-",
		"targets": "_all"
	}],
	language :{
	    "sEmptyTable": "Nenhum registro encontrado",
	    "sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",  
	    "sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
	    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
	    "sInfoPostFix": "",
	    "sInfoThousands": ".",
	    "sLengthMenu": "_MENU_ resultados por p&aacute;gina",
	    "sLoadingRecords": "Carregando...",
	    "sProcessing": "Processando...",
	    "sZeroRecords": "Nenhum registro encontrado",
	    "sSearch": "Pesquisar",
	    "oPaginate": {
	        "sNext": "Pr&oacute;ximo",
	        "sPrevious": "Anterior", 
	        "sFirst": "Primeiro",
	        "sLast": "&Uacute;ltimo"   
	    },
	    "oAria": {
	        "sSortAscending": ": Ordenar colunas de forma ascendente",
	        "sSortDescending": ": Ordenar colunas de forma descendente"
	    }
	}
	});
		});
	
		
	</script>
</body>
</html>	