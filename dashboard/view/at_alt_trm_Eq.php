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
				<li class="active">Usu&aacute;rios </li>
				<li class="active">Visualizar Dados</li></li>
			</ol>
        </section>

        <!-- Main content --> 
		<section class="content"> 
			<?php
				
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM at_usu_termo_utilizacao A
						JOIN at_usuarios B       ON B.usu_id  =  A.trm_usuId
						JOIN at_empresas C       ON C.emp_id  =  A.trm_usuempId
						JOIN at_departamentos D  ON D.dp_id   =  A.trm_usudpId
						JOIN eq_tipo E           ON E.tipo_Id =  A.trm_eqtipoId
						JOIN sys_usuarios F      ON F.usu_cod =  A.trm_usucad
						JOIN eq_marca G          ON G.marc_id  =  A.trm_eqmarcId
						JOIN at_equipamentos H   ON H.eq_id   =  A.trm_eqId
						
						
					   WHERE trm_id=".$trmid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				$usuid 		=$rs->fld("usu_id");
				$eq_id 		=$rs->fld("trm_eqId");
				$usu_chapa	=$rs->fld("trm_usuchapa");
				$usu_cargo	=$rs->fld("trm_usucargo");
				$usu_ctps	=$rs->fld("trm_usuctps");
				$usu_rg		=$rs->fld("trm_usurg");
				$usu_cpf	=$rs->fld("trm_usucpf");
				$item1		=$rs->fld("trm_item1");
				$item1_qtde	=$rs->fld("trm_item1_qtde");
				$item2		=$rs->fld("trm_item2");
				$item2_qtde	=$rs->fld("trm_item2_qtde");
				$chamado	=$rs->fld("trm_chamado");
				
				$eqid = $rs->fld("trm_eq_id");
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
										
										<div class="form-group col-md-4">
										<label for="emp_id">#Empresa:</label>
											<div class="input-group">
												<div class="input-group-addon">
													<i class="fa fa-building"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("emp_nome");?>"/>
												</div>
										</div>
										
										<div class="form-group col-md-3">  
										<label for="dp_nome">Departamento</label>  
											<div class="input-group">
												<div class="input-group-addon">
													<i class="glyphicon glyphicon-tasks"></i>
												</div> 
													<input type="text" DISABLED class="form-control" name="" id="" value="<?=$rs->fld("dp_nome");?>"/> 										   
													
											</div>    
										</div>    
										
										 <div class="form-group col-md-3">  
										 <label for="usu_nome">Usu&aacute;rio</label>
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$rs->fld("at_usu_nome");?>"/> 
													<input type="hidden" value="<?=$rs->fld("trm_id");?>" name="trm_id" id="trm_id">
													<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
											</div>
										</div>
									</div><!-- ./row -->	
										<?php
											$whr = "eq_ativo <> 1 AND eq_usuId =".$usuid." AND eq_id=".$eq_id;
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
													<input type="text" class="form-control" id="usu_chapa" name="usu_chapa"  value="<?=$usu_chapa;?>">
											</div>
										</div>
										
										<div class="form-group col-md-3">
										<label for="usu_nome">Cargo</label> 
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input type="text" class="form-control" id="usu_cargo" name="usu_cargo"  value="<?=$usu_cargo;?>">
											</div>
										</div>
										
										<div class="form-group col-md-3">
										<label for="usu_nome">CPTS</label> 
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input type="text" class="form-control" id="usu_cpts" name="usu_cpts"  value="<?=$usu_ctps;?>">
											</div>
										</div>
										
										<div class="form-group col-md-2">
										<label for="usu_nome">RG</label> 
											<div class="input-group">
												<div class="input-group-addon">  
													<i class="fa fa-user"></i>
												</div>
													<input type="text" class="form-control rg" id="usu_rg" name="usu_rg"  value="<?=$usu_rg;?>">
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
													<input class="form-control cpf" id="usu_cpf" name="usu_cpf" value="<?=$usu_cpf;?>">
											</div>
										</div>	

										<div class="form-group col-md-3">
										<label for="usu_nome">Item 1</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-whatsapp"></i>
												</div>
													<input class="form-control " id="item1" name="item1" value="<?=$item1;?>">
											</div>
										</div>	


										<div class="form-group col-md-2">
										<label for="usu_nome">Quantidade</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-asterisk"></i>
												</div>
													<input class="form-control " id="item1_qtde" name="item1_qtde" value="<?=$item1_qtde;?>">
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
													<input class="form-control " id="item2" name="item2" value="<?=$item2;?>">
											</div>
										</div>	


										<div class="form-group col-md-2">
										<label for="usu_nome">Quantidade</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-asterisk"></i>
												</div>
													<input class="form-control " id="item2_qtde" name="item2_qtde" value="<?=$item2_qtde;?>">
											</div>
										</div>	
										
										<div class="form-group col-md-2">
										<label for="usu_nome">Chamado</label> 
											<div class="input-group"> 
												<div class="input-group-addon">  
													<i class="fa fa-bullhorn"></i>
												</div>
													<input class="form-control " id="chamado" name="chamado" value="<?=$chamado;?>">
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
									
									<button class="btn btn-primary" type="button" id="btn_altTrmEq"><i class="fa fa-refresh"></i> Alterar</button>
									<a href="javascript:history.go(-1);" class="btn  btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
								</div>
								<div id="mens"></div>
							</div><!-- ./body -->  
						</form>
					</div><!-- ./primary -->
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