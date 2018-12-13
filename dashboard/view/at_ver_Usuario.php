<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_usuarios.php";// Fazer o link brilhar quando a pag estiver ativa
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
						Ativos
				<small>Usu&aacute;rios</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Termo de utilização </li>
				<li class="active">Visualizar Dados</li></li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content"> 
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-warning btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_Altusu","label"=>"Alterar") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM at_usuarios a
				JOIN at_empresas b ON a.usu_empId = b.emp_id 
				JOIN at_departamentos c ON a.usu_dpId = c.dp_id 
				WHERE usu_id = ".$usuid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				
				$var = $rs->fld("emp_id");
				$usu = $rs->fld("at_usu_nome");
				$dp_id = $rs->fld("dp_id");
				$dp_nome = $rs->fld("dp_nome");
				
 				
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
						<form role="form" id="alt_emp">
							
							<div class="box-body">
								<!-- radio Clientes -->
								<div id="usuarios" class="row"> 
									<div class="form-group col-md-1">
										<label for="emp_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="usu_id" id="usu_id" value="<?=$rs->fld("usu_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									<div class="form-group col-md-4">
										<label for="emp_id">#Empresa:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="emp_nome" id="emp_nome" value="<?=$rs->fld("emp_nome");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									</div>
									
									<div class="form-group col-md-1"><!--Tem que ser antes do selectt --> 
												<label for="usu_ativo">Ativo</label><br>  
												<input type="radio" DISABLED class="minimal" value=1 <?=($rs->fld("usu_ativo")==1?"CHECKED":"");?> id="usu_ativo" name="usu_ativo"> Ativo<br>
												<input type="radio" DISABLED class="minimal" value=0 <?=($rs->fld("usu_ativo")==0?"CHECKED":"");?> id="usu_ativo" name="usu_ativo"> Inativo<br>
									</div>
									
									
									<div class="form-group col-md-3">  
										<label for="dp_nome">Departamento</label>  
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-tasks"></i>
											</div> 
											<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$dp_nome?>"/> 										   
									</div>    
									</div>    
									
									 <div class="form-group col-md-3">  
										<label for="usu_nome">Usu&aacute;rio</label>
											<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$usu?>"/> 
									</div>
									</div>
									</div> 	
										
										<?php
												$whr = "mq_usuId=".$usuid;
												$rs->Seleciona("*","at_maquinas a
												JOIN at_empresas    b ON a.mq_empId  = b.emp_id 
												JOIN mq_fabricante  c ON a.mq_fabId  = c.fab_id
												JOIN sys_usuarios   d ON a.mq_usucad = d.usu_cod
												JOIN eq_tipo        e ON a.mq_tipoId = e.tipo_id",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												
												?> 
												
												
												<div class="box-header with-border"> 
												<h3 class="box-title">Utilizando a M&aacute;quina:</h3>
												<div class="box-tools pull-right"> 
												</div>
												</div>
												
												<div class="form-group col-md-2">  
												<label for="eq_mqId">Empresa</label>
												<div class="input-group">
												<div class="input-group-addon">
												<i class="fa fa-building"></i>
												</div> 
												<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("emp_alias")?>"/>  
												<input type="hidden" value="<?=$rs->fld("emp_id");?>" name="eq_mqId" id="eq_mqId">
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
													<i class="fa fa-mobile"></i>
												</div>
												<input type="text" DISABLED class="form-control" name="mq_modelo" id="mq_modelo" value="<?=$rs->fld("mq_modelo")?>"/>  
												</div>
												</div> 
								
								
												<div class="form-group col-md-3">  
												<label for="eq_mqId">Nome</label>
													<div class="input-group">
														<div class="input-group-addon">
														<i class="fa fa-desktop"></i>
														</div> 
															<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("mq_nome")?>"/>  
															<input type="hidden" value="<?=$rs->fld("eq_id");?>" name="eq_mqId" id="eq_mqId">
													</div>
												</div>	

												<div class="form-group col-md-3">  
												<span class="input-group-btn">
												 	<div class="button-group"> 
														<a 	class="btn btn-sm btn-info pull-left" data-toggle='tooltip' data-placement='bottom' title='Gerenciar'  a href="at_ger_Mq.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$rs->fld('mq_id');?>"><i class="fa fa-dashboard"></i></a>
														<a 	class="btn btn-sm btn-primary pull-right " data-toggle='tooltip' data-placement='bottom' title='Gerar Termo'  a href="at_vis_termo_Mq.php?token=<?=$_SESSION['token']?>&acao=N&usuid=<?=$usuid;?>"><i class="fa fa-file-text"></i></a>
													</div> 
												  </span>
												</div>		
												
										<?php
												}   
											?> 
									
										
									</div> 
								<div id="usuarios" class="row">
								
								
								<div id="consulta"></div>
								<div id="formerrosusu1" class="clearfix" style="display:none;">
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
								
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
								
							</div>
							<div id="mens"></div>
						</form>
					</div><!-- ./box -->  
						<!-- general form elements -->
				<div class="box box-success ">
					<div class="box-header with-border">
						<h3 class="box-title">Equipamentos Utilizados</h3><div class="box-tools pull-right"> 
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-ninus"></i></button>   
						</div>
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body">
						<table id="manutencao" class="table table-bordered table-striped">
							<thead>
								    <tr>
										<th>C&oacute;d:</th>
										<th>Empresa</th> 
										<th>Marca</th> 
										<th>Modelo</th>
										<th>Desc</th>
										<th>Status</th>
										<th>Data</th>
										<th>Ativo</th>
										<th>A&ccedil;&otilde;es</th> 
										 
										
								  </tr>
							</thead>
							<tbody id="Man_cad">  
							<?php require_once("at_tbUsuequipamentos.php");?>    	
							</tbody> 
							 
						</table>
					</div><!-- /.box-body --> 
								
              </div><!-- /.box -->
					
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
	<!--datatables-->
    <script src="http://localhost/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://localhost/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
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
<script>
		$(".select2").select2({
			tags: true,
			theme: "classic"
		});

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