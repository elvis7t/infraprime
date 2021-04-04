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
							<h3 class="box-title">Cadastro de Usu&aacute;rios</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div>
						</div><!-- /.box-header -->
						<!-- form start -->
						<form id="cadUsu" role="form">
							<div class="box-body">
								<div class="row">
									<?php				
									$rs = new recordset();
									$sql ="SELECT * FROM at_empresas 
										WHERE  emp_id=".$_SESSION['usu_empresa'];
										$rs->FreeSql($sql);
										$rs->GeraDados();
									?> 
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
													$rs->Seleciona("*","at_empresas",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
													while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
													?>
													<option value="<?=$rs->fld("emp_id");?>"><?=$rs->fld("emp_nome");?></option>
													<?php
													} 
												?>
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
								
									<div class="form-group col-md-3">
									  <label for="usu_nome">Nome do Usu&aacute;rio</label> 
										<div class="input-group">
											<div class="input-group-addon">  
												<i class="fa fa-user"></i>
											</div>
											<input type="text" class="form-control" id="usu_nome" maxlength="15" name="usu_nome"  placeholder="Desc. o acr&ocirc;nimo de usu&aacute;rio ">
										</div>
									</div>
								</div>
								
								<div class="row">
								
									<div class="form-group col-md-2">
									  <label for="usu_chapa">Chapa do Usu&aacute;rio</label> 
										<div class="input-group">
											<div class="input-group-addon">  
												<i class="fa fa-user"></i>
											</div>
											<input type="text" class="form-control" id="usu_chapa" name="usu_chapa"  placeholder="Desc. a chapa do usu&aacute;rio ">
										</div>
									</div>
									
									<div class="form-group col-md-3">
									  <label for="usu_cargo">Cargo do Usu&aacute;rio</label> 
										<div class="input-group">
											<div class="input-group-addon">  
												<i class="fa fa-user"></i>
											</div>
											<input type="text" class="form-control" id="usu_cargo" name="usu_cargo" maxlength="19" placeholder="Desc. o cargo do usu&aacute;rio ">
										</div>
									</div>
								</div>
								
								<div id="formerrosUsuAd" class="clearfix" style="display:none;"> 
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
								<button type="button" id="btn_cadUsu" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Salvar</button>
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
							<table id="manutencao" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>C&oacute;d:</th>
										<th>Empresa</th> 
										<th>Departamento</th> 
										<th>Nome</th>
										<th>A&ccedil;&otilde;es</th> 
								   </tr>
								</thead>
								<tbody id="Usu_cad">
									<?php require_once("at_tbUsuarios.php");?>
								</tbody>
								 
							</table>
						</div><!-- /.box-body -->
						<div class="box-footer">
							<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
						</div> 							
					</div><!-- /.box -->  			
				</div>
			</div><!-- /.content-wrapper -->
		</div><!-- /.content-wrapper -->
	</section><!-- /.content -->
		
    <?php require_once("../config/footer.php");?>
	  
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
<!--datatables-->
<script src="<?=$hosted;?>/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=$hosted;?>/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
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