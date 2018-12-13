<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_termo_utilizacao.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<li class="active">Usu&aacute;rios </li>
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
				$sql ="SELECT * FROM at_equipamentos a
					JOIN at_empresas  b ON a.eq_empId  = b.emp_id 
					JOIN eq_marca     c ON a.eq_marcId = c.marc_id
					JOIN sys_usuarios d ON a.eq_usucad = d.usu_cod
					JOIN eq_tipo      e ON a.eq_tipoId = e.tipo_id
					JOIN at_status    f ON a.eq_statusId = f.status_id 
				WHERE eq_id = ".$eqid;
				$rs->FreeSql($sql);
				$rs->GeraDados();
				$usuid = $rs->fld("eq_usuId");
				$eq_id = $rs->fld("eq_id");
			
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
						<form role="form" id="cadTrm">
							<div class="box-body">
									<!-- radio Clientes -->
									<div id="usuarios" class="row"> 
											
				<?php
			
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
										<div class="form-group col-md-4">
										<label for="emp_id">#Empresa:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-building"></i>
												</div>
												<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("emp_nome");?>"/>
												<input type="hidden" value="<?=$rs->fld("emp_id");?>" name="usu_empId" id="usu_empId">
												<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
												<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
											</div>
										</div>
										
										<div class="form-group col-md-3">  
										<label for="dp_nome">Departamento</label>  
											<div class="input-group">
												<div class="input-group-addon">
													<i class="glyphicon glyphicon-tasks"></i>
												</div> 
													<input type="text" DISABLED class="form-control" name="" id="" value="<?=$dp_nome?>"/> 										   
													<input type="hidden" value="<?=$rs->fld("dp_id");?>" name="usu_dpId" id="usu_dpId">
											</div>    
										</div>    
										
										 <div class="form-group col-md-3">  
										 <label for="usu_nome">Usu&aacute;rio</label>
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$usu?>"/> 
													<input type="hidden" value="<?=$usuid;?>" name="usu_Id" id="usu_Id">
											</div>
										</div>
									</div><!-- ./row -->	
										<?php
											$whr = "eq_ativo <> 1 AND eq_usuId =".$usuid." AND eq_id =".$eqid;
											$rs->Seleciona("*","at_equipamentos a
											JOIN at_empresas  b ON a.eq_empId  = b.emp_id 
											JOIN eq_marca     c ON a.eq_marcId = c.marc_id
											JOIN sys_usuarios d ON a.eq_usucad = d.usu_cod
											JOIN eq_tipo      e ON a.eq_tipoId = e.tipo_id
											JOIN at_status    f ON a.eq_statusId = f.status_id",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
											while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
										?> 
									<div id="usuarios" class="row"> 				
										<div class="box-header with-border"> 
											<h3 class="box-title">Utilizando o Aparelho:</h3>
											<div class="box-tools pull-right"></div>
										</div>
										
												
										
										<div class="form-group col-md-2">  
										<label for="eq_mqId">Empresa</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-building"></i>
												</div> 
													<input type="text" DISABLED class="form-control " name="" id="" value="<?=$rs->fld("emp_alias")?>"/>  
													<input type="hidden" value="<?=$rs->fld("eq_id");?>" name="eq_Id" id="eq_Id">
											</div>
										</div>
												
										<div class="form-group col-md-2">
										<label for="tipo_desc">#Tipo:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-mobile"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("eq_desc");?>"/>
													<input type="hidden" value="<?=$rs->fld("tipo_id");?>" name="eq_tipoId" id="eq_tipoId">
											</div>
										</div>
									
										<div class="form-group col-md-2">
										<label for="marc_nome">#Fabricante:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-industry"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("marc_nome");?>"/>
													<input type="hidden" value="<?=$rs->fld("marc_id");?>" name="mq_fabId" id="mq_fabId">
											</div>
										</div>
									  
										<div class="form-group  col-md-2">  
										<label for="mq_modelo">#Modelo:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-mobile"></i>
												</div>
												<input type="text" DISABLED class="form-control" name="mq_modelo" id="mq_modelo" value="<?=$rs->fld("eq_modelo")?>"/>  
											</div>
										</div> 
								
										<div class="form-group col-md-3">
										<label for="mq_tag">#Serial</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-key"></i>
												</div>
													<input type="text" DISABLED class="form-control" id="mq_tag" name="mq_tag"  value="<?=$rs->fld("eq_serial")?>"/>
											</div>
										</div>	
											
									</div><!-- ./row -->										
											
									<?php
										}   
									?> 
									
									<div id="usuarios" class="row"> 
										<div class="form-group col-md-2">
										<label for="usu_nome">Chapa</label> 
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input type="text" class="form-control" id="usu_chapa" name="usu_chapa"  placeholder="Desc. o registro ">
											</div>
										</div>
										
										<div class="form-group col-md-3">
										<label for="usu_nome">Cargo</label> 
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input type="text" class="form-control" id="usu_cargo" name="usu_cargo"  placeholder="Desc. o cargo ">
											</div>
										</div>
										
										<div class="form-group col-md-3">
										<label for="usu_nome">CPTS</label> 
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input type="text" class="form-control" id="usu_cpts" name="usu_cpts"  placeholder="Desc. a carteira de trabalho ">
											</div>
										</div>
										
										<div class="form-group col-md-2">
										<label for="usu_nome">RG</label> 
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input type="text" class="form-control rg" id="usu_rg" name="usu_rg"  placeholder="RG">
											</div>
										</div>
											
									</div><!-- ./row -->
									
									<div id="usuarios" class="row">
										<div class="form-group col-md-2">
										<label for="usu_nome">CPF</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input class="form-control cpf" id="usu_cpf" name="usu_cpf" placeholder="CPF">
											</div>
										</div>	
										
										<?php
												
										
										$sql ="SELECT * FROM eq_chips a
										JOIN at_empresas  b ON a.chip_empId  = b.emp_id 
										JOIN sys_usuarios c ON a.chip_usucad = c.usu_cod 
										WHERE chip_eqid=".$eqid; 
										$rs->FreeSql($sql);
										$rs->GeraDados();
										?> 
										
										<div class="form-group col-md-3">
										<label for="usu_nome">Item 1</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-whatsapp"></i>
												</div>
													<input class="form-control " id="item1" name="item1" value="CHIP N <?=$rs->fld("chip_serial");?>"/>
											</div>
										</div>	


										<div class="form-group col-md-2">
										<label for="usu_nome">Quantidade</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-asterisk"></i>
												</div>
													<input class="form-control " id="item1_qtde" name="item1_qtde" placeholder="Qtde ">
											</div>
										</div>

									</div><!-- ./row -->
								
									<div id="usuarios" class="row">

										<div class="form-group col-md-3">
										<label for="usu_nome">Item 2</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-plug"></i>
												</div>
													<input class="form-control " id="item2" name="item2" placeholder="Item 2">
											</div>
										</div>	


										<div class="form-group col-md-2">
										<label for="usu_nome">Quantidade</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-asterisk"></i>
												</div>
													<input class="form-control " id="item2_qtde" name="item2_qtde" placeholder="Qtde">
											</div>
										</div>	
										
										<div class="form-group col-md-2">
										<label for="usu_nome">Chamado</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-bullhorn"></i>
												</div>
													<input class="form-control " id="chamado" name="chamado" placeholder="N&ordm; chamado">
											</div>
										</div>	
									</div><!-- ./row -->
								
									<div id="usuarios" class="row">
										
										
										<div id="consulta"></div>
										<div id="formerrostrm" class="clearfix" style="display:none;">
											<div class="callout callout-danger"> 
												<h4>Erros no preenchimento do formul&aacute;rio.</h4>
												<p>Verifique os erros no preenchimento acima:</p>
												<ol>
													<!-- Erros são colocados aqui pelo validade -->
												</ol> 
											</div>
										</div>
									</div><!-- ./row -->
								
								<div class="box-footer">
									<button type="button" id="btn_cadTrm" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
									
								</div>
								<div id="mens"></div>
							</div><!-- ./body -->  
						</form>
					</div><!-- ./primary -->
			
					<!-- general form elements -->
					<div class="box box-success">
						<div class="box-header with-border">
							<h3 class="box-title">Termos Cadastrados</h3><div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div> 
						</div><!-- /.box-header -->
						<!-- form start -->
						<div class="box-body">
							<table id="Termo" class="table table-bordered table-striped">
								<thead>
									  <tr>
											<th>C&oacute;d:</th>
											<th>Empresa</th>
											<th>Departamento</th>
											<th>Funcion&aacute;rio</th>
											<th>Equipamento</th>
											<th>Cadastro</th>
											<th>Chamado</th>
											<th>data</th>
											<th>A&ccedil;&atilde;o</th>
									  </tr>
								</thead>
								<tbody id="trm_cad">
									<?php require_once("at_tbTermoEq.php");?>
								</tbody>
								 
							</table>
						</div><!-- /.box-body --> 
							<div class="box-footer">
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
							</div> 		
					</div><!-- /.box --> 
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
	<!--datatables-->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="http://localhost/infraprime/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
    
     <!-- ChartJS 1.0.1-->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) 
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/demo.js"></script>
	<script src="http://localhost/infraprime/dashboard/js/action_ativos.js"></script>  <!--Chama o java script -->
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