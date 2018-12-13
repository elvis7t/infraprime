<?php

//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_prestadoras.php";// Fazer o link brilhar quando a pag estiver ativa
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
				<small>Equipamentos</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Prestadora </li>
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
 				$sql ="SELECT * FROM eq_prestadoras 
				  WHERE pre_id = ".$preid;
 				$rs->FreeSql($sql);
 				$rs->GeraDados();
				
 				
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
										<input type="text" DISABLED class="form-control" name="pre_id" id="pre_id" value="<?=$rs->fld("pre_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									 
									<div class="form-group col-md-5">
										<label for="pre_nome">#Raz&atilde;o social:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-briefcase"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_nome" name="pre_nome"  value="<?=$rs->fld("pre_nome");?>">
									</div>
									</div>
									
								
									<div class="form-group col-md-2">
										<label for="pre_alias">#Apelido: </label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-briefcase"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_alias" name="pre_alias"  value="<?=$rs->fld("pre_alias");?>">
									</div>
									</div>
									<div class="form-group col-md-3">
										<label for="pre_cnpj">#CNPJ: </label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_cnpj" name="pre_cnpj"  value="<?=$rs->fld("pre_cnpj");?>">
									</div>
									</div>
							</div>
							<div class="row"> 
							
							
									<div class="form-group col-md-2">
										<label for="pre_ie">#Inscri&ccedil;&atilde;o Estadual:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control iest" id="pre_ie" name="pre_ie"  value="<?=$rs->fld("pre_ie");?>">
									</div>
									</div>
								
								<div class="form-group col-md-2">
										<label for="cep">#CEP: </label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-street-view"></i> 
											</div>
										<input type="text" DISABLED class="form-control cep" id="cep" name="cep"  value="<?=$rs->fld("pre_cep");?>" <?=$disable; ?>>
									</div>
									</div>
							 								
									
									<div class="form-group col-md-5"> 
										<label for="log">#Logradouro:</label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-signs"></i>
												
											</div>
										<input DISABLED class="form-control input-sm text-uppercase" id="log" value="<?=$rs->fld("pre_log");?>" <?=$disable; ?>>
									</div>
									</div>
									<div class="form-group col-md-2">
									  <label for="num">#N&uacute;mero:</label>
									  <div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-marker"></i>
									</div>
									  <input DISABLED class="form-control input-sm" id="num" name="num"  value="<?=$rs->fld("pre_num");?>" <?=$disable; ?>>
									</div>
									</div>
							
							</div>
								<div class="row"> 
							
							
									<div class="form-group col-md-2">
									  <label for="compl">#Complemento:</label>
									  <div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-etsy"></i> 
									</div>
									  <input DISABLED class="form-control input-sm text-uppercase" id="compl" name="compl" value="<?=$rs->fld("pre_compl");?>" <?=$disable; ?>>
									</div>
									</div>

							
									
									<div class="form-group col-md-5">
									<label for="emp_bai">#Bairro:</label>
									<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-map-o"></i>
									</div>
									<input DISABLED class="form-control input-sm text-uppercase" id="bai"  value="<?=$rs->fld("pre_bai");?>" <?=$disable; ?>>
									</div>
									</div>
									
									<div class="form-group col-md-3">
										  <label for="emp_cid">Cidade</label>
										  <div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-map"></i>
										</div>
										  <input DISABLED class="form-control input-sm text-uppercase" id="cid"  value="<?=$rs->fld("pre_cid");?>" <?=$disable; ?>>
										</div>
										</div>



										<div class="form-group col-md-2">
									  <label for="emp_uf">UF</label>
									   <div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-map"></i>
										</div>
									  <input DISABLED class="form-control input-sm text-uppercase" id="uf"   value="<?=$rs->fld("pre_uf");?>" <?=$disable; ?>>
										</div>
										</div>  
										
										
							</div>
							<div class="row">
										<div class="form-group col-md-3">  
										<label for="pre_contato">#Contato:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-address-card"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_contato" name="pre_contato"  value="<?=$rs->fld("pre_contato");?>">
									</div>
									</div>
									
								
									<div class="form-group col-md-4">
									<label for="pre_email">#E-mail:</label>									  
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-envelope"></i>
										</div>
									  <input type="text" DISABLED class="form-control" id="pre_email" name="pre_email"  value="<?=$rs->fld("pre_email");?>">
									
								</div>
								</div>
									<div class="form-group col-md-2">
										<label for="pre_tel">#Telefone:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-phone-alt"></i>
										</div>
										<input type="text" DISABLED class="form-control fone" id="pre_tel" name="pre_tel"  value="<?=$rs->fld("pre_tel");?>">
									</div>
									</div>
									 
									<div class="form-group col-md-6">  
										<label for="pre_site">#Site:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-google"></i>
										</div>  
										
										<a href="<?=$rs->fld("pre_site");?>"><?=$rs->fld("pre_site");?></a>
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
								<a href="javascript:history.go(-1);" class="btn btn-sm btn-danger"><i class="fa fa-hand-o-left"></i> Cancela </a>
							</div>
							
						</form>
					</div><!-- /.box -->
				<!-- general form elements -->
				
					<section class="content">
      

      <div class="row">
       

        
          <!-- /.box -->
		<div class="col-md-6">
          <!-- Donut chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Atendimento por empresas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> 
            <div class="box-body">
              <div id="donut-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      
      
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
       

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Atendimento por empresas</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart-morris" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
	  
	   
        <!-- /.col (RIGHT) -->
      
      <!-- /.row -->
    </section>		
              <!-- /.box -->  
			  
			  <div class="box box-success ">
					<div class="box-header with-border">
						<h3 class="box-title">Historico de Atendimentos</h3><div class="box-tools pull-right"> 
		                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-ninus"></i></button>   
						</div>
					</div><!-- /.box-header -->
					<!-- form start -->
					<div class="box-body"> 
						<table id="manutencao" class="table table-bordered table-striped">
							<thead>
								    <tr>
										<th>C&oacute;d:</th>
										<th>Equipamento</th> 
										<th>Empresa</th> 
										<th>Data Ida</th> 
										<th>Data Retorno</th> 
										<th>Solicitante</th> 
										<th>O S</th> 
										<th>Valor</th> 
										<th>Status</th> 
								  </tr>
							</thead>
							<tbody id="Pre_cad"> 
								<?php require_once("at_tbPrestacao.php");?>   
							</tbody> 
							<?="<tr><td colspan=7><strong>".$rs->linhas." Atendimentos</strong></td></tr>";?>
						</table>
							
              </div><!-- /.box -->  
				
				</div><!-- ./row -->
				
					
				
				
			</div>
		</section>
	</div>
 <?php 
        require_once("../config/footer.php");
        
      ?>
      <div class="control-sidebar-bg"></div>
 <?php
				//----- Função de maquinas por empresa ----
				$rs = new recordset();
							
				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_empresas   e ON a.man_eqempId = e.emp_id
				WHERE man_eqempId = 1 and man_preId =".$preid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$niff = $rs->linhas;
				
				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_empresas   e ON a.man_eqempId = e.emp_id
				WHERE man_eqempId = 2 and man_preId =".$preid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$eovg = $rs->linhas;
				
				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_empresas   e ON a.man_eqempId = e.emp_id
				WHERE man_eqempId = 9 and man_preId =".$preid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$vug = $rs->linhas;
				
				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_empresas   e ON a.man_eqempId = e.emp_id
				WHERE man_eqempId = 8 and man_preId =".$preid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$lavras = $rs->linhas;
				
				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_empresas   e ON a.man_eqempId = e.emp_id
				WHERE man_eqempId = 5 and man_preId =".$preid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$aruja = $rs->linhas;
				
				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_empresas   e ON a.man_eqempId = e.emp_id
				WHERE man_eqempId = 6 and man_preId =".$preid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$abc = $rs->linhas;
				
				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_empresas   e ON a.man_eqempId = e.emp_id
				WHERE man_eqempId = 4 and man_preId =".$preid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$campbus = $rs->linhas;
				
				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_empresas   e ON a.man_eqempId = e.emp_id
				WHERE man_eqempId = 3 and man_preId =".$preid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$rapdo = $rs->linhas;
				
				
				$sql ="SELECT * FROM eq_manutencao a
				JOIN  at_empresas   e ON a.man_eqempId = e.emp_id
				WHERE man_eqempId = 7 and man_preId =".$preid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$cisne= $rs->linhas;
				//----- Fim da Função de maquinas por empresa ----	  			

				?> 
    </div><!-- ./wrapper --> 

    <!-- jQuery 2.1.4 --> 
    <script src="http://localhost/infraprime/dashboard/assets/plugins/jQuery/jQuery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://localhost/infraprime/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- Morris.js charts -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://localhost/infraprime/dashboard/assets/plugins/morris/morris.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/infraprime/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!--AdminLTE App -->
    <script src="http://localhost/infraprime/dashboard/assets/dist/js/app.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="http://localhost/infraprime/dashboard/assets/dist/js/demo.js"></script>
	<!-- FLOT CHARTS -->
	<script src="http://localhost/infraprime/dashboard/assets/plugins/flot/jquery.flot.min.js"></script>
	<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
	<script src="http://localhost/infraprime/dashboard/assets/plugins/flot/jquery.flot.resize.min.js"></script>
	<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
	<script src="http://localhost/infraprime/dashboard/assets/plugins/flot/jquery.flot.pie.min.js"></script>
	<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
	<script src="http://localhost/infraprime/dashboard/assets/plugins/flot/jquery.flot.categories.min.js"></script>
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
	
	<script>
  $(function () {
    /*     

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      {label: "NIFF", data: <?=$niff;?>, color: "#00c0ef"},
	  {label: "EOVG", data: <?=$eovg;?>, color: "#f23e11"},
	  {label: "VUG", data: <?=$vug;?>, color: "#1182f2"},
	  {label: "LAVRAS", data: <?=$lavras;?>, color: "#f56954"},
	  {label: "ARUJA", data: <?=$aruja;?>, color: "#f27311"},
	  {label: "ABC", data: <?=$abc;?>, color: "#00a65a"},
	  {label: "CAMPBUS", data: <?=$campbus;?>, color: "#f39c12"},
      {label: "RAPDO", data: <?=$rapdo;?>, color: "#3c8dbc"},
      {label: "CISNE", data: <?=$cisne;?>, color: "#d2d6de"}
    ];
    $.plot("#donut-chart", donutData, {
      series: {
        pie: {
          show: true,
          radius: 1,
          innerRadius: 0.5,
          label: {
            show: true,
            radius: 2 / 3,
            formatter: labelFormatter,
            threshold: 0.1
          }

        }
      },
      legend: {
        show: false
      }
    });
    /*
     * END DONUT CHART
     */

  });

  /*
   * Custom Label formatter
   * ----------------------
   */
  function labelFormatter(label, series) {
    return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
        + label
        + "<br>"
        + Math.round(series.percent) + "%</div>";
  }
</script>



<script> 
  $(function () {
    "use strict";

   
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart-morris', 
      resize: true,
      data: [
        {y: 'Niff', a: <?=$niff;?>},
        {y: 'Vg', a: <?=$eovg;?>},
        {y: 'Vug',  a: <?=$vug;?>}, 
        {y: 'Vg2',  a: <?=$lavras;?>},
        {y: 'Abc',  a: <?=$abc;?>},
        {y: 'CAM', a: <?=$campbus;?>},
        {y: 'RAP', a: <?=$rapdo;?>}, 
        {y: 'ARU',a: <?=$aruja;?>},
        {y: 'CIS',a: <?=$cisne;?>} 
      ],
      barColors: ['#00c0ef', '#f56954'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Atendimento'],
      hideHover: 'auto'
    });
  });
</script> 
  </body>
</html> 
