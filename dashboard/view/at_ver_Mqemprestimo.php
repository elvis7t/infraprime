<?php

//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_emprestimo.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<li class="active">Emprestimo </li>
				<li class="active">Ver Dados</li>
			</ol>
        </section>

        <!-- Main content --> 
        <section class="content">
			<?php
				$menu = array(
							"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
							"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
							"N" => array("class" => "btn btn-warning btn-sm", "icone" => "fa fa-recycle", "id"=>"btn_Altpre","label"=>"Alterar") 
							);
 				extract($_GET);
 				$rs = new recordset();
 				$sql ="SELECT * FROM mq_emprestimo a
					JOIN at_empresas      b ON a.empre_mqempId    = b.emp_id 
					JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
					JOIN mq_fabricante    d ON a.empre_mqfabId   = d.fab_id
					JOIN at_maquinas      e ON a.empre_mqId     = e.mq_id
					JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
					JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
					JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
						
					WHERE empre_id =".$empreid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				$status_id      = $rs->fld("mq_statusId");  
				$mq_id          = $rs->fld("mq_id");  
				
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
								<div id="clientes" class="row">
									<div class="form-group col-xs-1">
										<label for="pre_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="pre_id" id="pre_id" value="<?=$rs->fld("empre_id");?>"/>
										
									</div>
									 
										<div class="form-group col-md-2">
										<label for="pre_alias">#Empresa: </label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-building"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_alias" name="pre_alias"  value="<?=$rs->fld("emp_alias");?>">
									</div>
									</div>
								    
									<div class="form-group  col-md-2">  
										<label for="eq_serial">#Modelo</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-mobile"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="eq_modelo" id="eq_modelo" value="<?=$rs->fld("empre_mqmodelo")?>"/>  
									</div>
									</div> 
									
									
									<div class="form-group col-md-3">
										<label for="pre_end">#Equipamento:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-keyboard-o"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_end" name="pre_end"  value="<?=$rs->fld("empre_mqnome");?>">
									</div>
									</div>
							 								
									
								
								
									<div class="form-group col-md-3">   
										<label for="pre_cep">#Service Tag: </label>   
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_cep" name="pre_cep"  value="<?=$rs->fld("empre_mqtag");?>">
									</div>
									</div>
									
									</div>
								<div class="row"> 
									
									
									<div class="form-group col-md-2">  
									
									<?php
												$whr = "status_id=".$status_id;
												$rs->Seleciona("*","at_status",$whr); //É o mesmo que SELECT campos FROM tabela WHERE condição
												while($rs->GeraDados()){ // enquanto gerar dados da pesquisa
												$status_id      = $rs->fld("status_id");  
												$status_classe  = $rs->fld("status_classe");  
												$status_desc    = $rs->fld("status_desc"); 
												?> 
										<label for="eq_status">#Status:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="<?=$status_classe?>"></i>
										</div>
										<input type="text" DISABLED class="form-control" name="eq_status" id="eq_status" value="<?=$status_desc?>"/>  
										</div>
									</div>
									<?php
										}   
									?> 
									<?php 
									$sql ="SELECT * FROM mq_emprestimo a
										JOIN at_empresas      b ON a.empre_mqempId    = b.emp_id 
										JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
										JOIN mq_fabricante    d ON a.empre_mqfabId   = d.fab_id
										JOIN at_maquinas      e ON a.empre_mqId     = e.mq_id
										JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
										JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
										JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
										WHERE empre_id =".$empreid;
										$rs->FreeSql($sql);
										$rs->GeraDados();
										$usu = $rs->fld("usu_id");
										
										
									?>   
																		
									 
									<div class="form-group col-md-2">
										<label for="pre_tel">#Emprestado Em:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar-plus-o"></i>
										</div>
										
										<input type="text" DISABLED class="form-control" id="pre_tel" name="pre_tel"  value="<?=$fn->data_br($rs->fld("empre_datade"));?>">
									</div> 
									</div>
									
									<div class="form-group col-md-2">
										<label for="pre_tel">#Devolvido em:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-calendar-check-o"></i>
										</div>
											
										<input type="text" DISABLED class="form-control " id="pre_tel" name="pre_tel" value="<?=$fn->data_br($rs->fld("empre_dataate"));?>">
									</div>
									</div>
									<div class="form-group col-md-3">
										<label for="pre_tel">#Solicitante:</label> 
										<div class="input-group">
										<div class="input-group-addon">  
											<i class="fa fa-user-secret"></i>
										</div>
										<input type="text" DISABLED class="form-control " id="pre_tel" name="pre_tel"  value="<?=$rs->fld("at_usu_nome");?>">
									</div>
									</div>
									
									<div class="form-group col-md-2"><!--Tem que ser antes do selectt --> 
												<label for="man_ativo">Status</label><br>  
												<input type="radio" DISABLED class="minimal" value=1 <?=($rs->fld("man_ativo")==1?"CHECKED":"");?> id="man_ativo" name="man_ativo"> Aberto<br>
												<input type="radio" DISABLED class="minimal" value=0 <?=($rs->fld("man_ativo")==0?"CHECKED":"");?> id="man_ativo" name="man_ativo"> Encerrado<br>
									</div>
									</div> 
									<div class="row">
																				
										<div class="form-group col-md-10">
										<label for="emp_cnpj">#Observa&ccedil;&otilde;es: </label>
											<textarea DISABLED  class="form-control" id="part_obs" ><?=$rs->fld("empre_obs");?></textarea>
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
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
							</div>
							
						</form>
					
              </div><!-- /.box --> 
				
				<div class="box box-success">
									<div class="box-header with-border">
						<h3 class="box-title">Historico de Emprestimos </h3><div class="box-tools pull-right">
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
						</div>
					</div><!-- /.box-header --> 
					<!-- form start -->
					<div class="box-body">
						<table id="solicitacao" class="table table-bordered table-striped">
							<thead>
								  <tr>
										<th>C&oacute;d:</th>
										<th>Empresa</th>  
										<th>Departamento</th>
										<th>Usu&aacute;rio</th>
										<th>Data de</th>
										<th>Data ate</th>
										<th>Usu Cad</th>
										<th>Ticket</th>
								  </tr>
							</thead> 
							<tbody id="empre_cad"> 
								<?php require_once("at_tbMqemphistorico.php");?>      
							</tbody> 
							 
						</table>
					</div><!-- /.box-body -->
					<div class="box-footer">
						<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Voltar </a>
					</div> 
							
              </div><!-- /.box --> 
					
				
				
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

	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('[data-toggle="popover"]').popover();
	});
	
	

</script>
<script>
		$(".select2").select2({
			tags: true,
			theme: "classic"
		});

		$(function () {
			$('#solicitacao').DataTable({
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
</html>	 