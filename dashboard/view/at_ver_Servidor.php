<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "ATIVO";
$pag = "at_servidor_desativados.php";// Fazer o link brilhar quando a pag estiver ativa
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
			<h1>Ativos 
				<small>Servidores desativados</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li class="active">Servidor </li>
				<li class="active">Visualisar</li>
			</ol>
        </section>
		<!-- /.content-header -->

        <!-- Main content --> 
        <section class="content">
			<!-- Info boxes -->
			<div class="row">
				<?php
					$menu = array(
								"P" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-history", "id"=>"btn_pesItem","label"=>"Voltar"),
								"R" => array("class" => "btn btn-success btn-sm", "icone" => "fa fa-save", "id"=>"btn_saveItem","label"=>"Salvar"),
								"N" => array("class" => "btn btn-primary btn-sm", "icone" => "fa fa-refresh", "id"=>"btn_AltServidor","label"=>"Alterar") 
								);
					extract($_GET);
					$rs = new recordset();
					$sql ="	SELECT * FROM at_maquinas a
					JOIN at_empresas    b ON a.mq_empId  = b.emp_id 
					JOIN mq_fabricante  c ON a.mq_fabId  = c.fab_id
					JOIN sys_usuarios   d ON a.mq_usucad = d.usu_cod
					JOIN eq_tipo        e ON a.mq_tipoId = e.tipo_id
					JOIN at_status      f ON a.mq_statusId = f.status_id
					JOIN mq_memoria     g ON a.mq_memId     = g.mem_id
					JOIN mq_hd          h ON a.mq_hdId      = h.hd_id
					JOIN mq_os          i ON a.mq_osId      = i.os_id
					WHERE mq_id = ".$mqid;
					$rs->FreeSql($sql);
					$rs->GeraDados();
					
					$mq_id       	= $rs->fld("mq_id");  
					$usu_nome       = $rs->fld("usu_nome");  
					$mq_status      = $rs->fld("mq_status");  
					$mq_valor       = $rs->fld("mq_valor");  
					$mq_nf          = $rs->fld("mq_nf");  
					$mq_memId       = $rs->fld("mq_memId");  
					$mq_hdId        = $rs->fld("mq_hdId");  
					$mq_osId        = $rs->fld("mq_osId"); 					  
					$status_id      = $rs->fld("status_id");  
					$status_classe  = $rs->fld("status_classe");  
					$status_desc    = $rs->fld("status_desc");  
					$mq_datagar     = $rs->fld("mq_datagar");
					$mq_mschave     = $rs->fld("mq_mschave");
					$usu_id 		= $rs->fld("mq_usuId"); 				
					$mq_ip 			= $rs->fld("mq_ip"); 				
					$mq_servcluster	= $rs->fld("mq_servcluster"); 				
					$mq_servtp      = $rs->fld("mq_servtp");
				?>			
			
				<div class="col-md-12">
					<!-- general form elements --> 
					<div class="box box-primary">
						<div class="box-header with-border"> 
							<h3 class="box-title">Dados</h3><div class="box-tools pull-right"> 
								<button class="btn btn-box-tool" data-widget="collapse">
									<i class="fa fa-minus"></i>
								</button>   
							</div>
						</div>
						<!-- /.box-header -->						
						
						<form role="form" id="alt_servidor">
							<!-- form start -->  								 
							<div class="box-body">
								<div id="usuarios" class="row"> 								
									<div class="form-group col-xs-1"> 
									  <label for="mq_id">#ID:</label>
										<input type="text" DISABLED class="form-control" name="mq_id" id="mq_id" value="<?=$rs->fld("mq_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="emp_id">#Empresa:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-building"></i>
											</div>
											<input type="text" DISABLED class="form-control" name="emp_nome" id="emp_nome" value="<?=$rs->fld("emp_alias");?>"/>
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="tipo_desc">#Tipo:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-laptop"></i>
											</div>
											<input type="text" DISABLED class="form-control" name="tipo_desc" id="tipo_desc" value="<?=$rs->fld("tipo_desc");?>"/>
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="marc_nome">#Fabricante:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-industry"></i>
											</div>
											<input type="text" DISABLED class="form-control" name="marc_nome" id="marc_nome" value="<?=$rs->fld("fab_nome");?>"/>
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group  col-md-3">  
									  <label for="mq_modelo">#Modelo:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-laptop"></i> 
											</div>
											<input type="text" DISABLED class="form-control" name="mq_modelo" id="mq_modelo" value="<?=$rs->fld("mq_modelo")?>"/>  
										</div>
									</div> 
									<!-- /.col -->									
								</div>
								<!-- /.row -->
								
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
									<!-- /.col -->
									<div class="form-group col-md-2">
									  <label for="mq_tag">Service Tag</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-tag"></i>
											</div>
											<input type="text" DISABLED class="form-control" id="mq_tag" name="mq_tag"  value="<?=$rs->fld("mq_tag")?>"/>
										</div>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-4">
									  <label for="mq_mschave">Chave de Licen&ccedil;a</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-key"></i>
											</div>
											<input type="text" DISABLED class="form-control" id="mq_mschave" name="mq_mschave"  value="<?=$rs->fld("mq_mschave")?>"/>
										</div>
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-3">
									  <label for="mq_proc">Processador</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-bug"></i>
											</div>
											<input type="text" DISABLED class="form-control" id="mq_proc" name="mq_proc"  value="<?=$rs->fld("mq_proc")?>"/>
										</div>
									</div>
									<!-- /.col -->									
								</div>
								<!-- /.row --> 
								
								<div class="row">									
									<div class="form-group col-md-2 "> 
									  <label for="mq_memId">#Mem&oacute;ria:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-microchip"></i>
											</div>
											<input type="text" DISABLED class="form-control" id="mq_memId" name="mq_memId"  value="<?=$rs->fld("mem_tipo");?> <?=$rs->fld("mem_cap");?>"/>
										</div> 
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2 "> 
									  <label for="mq_hdId">#HD:</label>  
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-hdd-o"></i>
											</div>
											<input type="text" DISABLED class="form-control" id="mq_hdId" name="mq_hdId"  value="<?=$rs->fld("hd_tipo");?> <?=$rs->fld("hd_cap");?>"/>												
										</div> 
									</div>
									<!-- /.col -->
									<div class="form-group col-md-4 "> 
									  <label for="mq_osId">#Sistema Operacional:</label>
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-windows"></i> 
											</div>
											<input type="text" DISABLED class="form-control" id="mq_osId" name="mq_osId"  value="<?=$rs->fld("os_desc");?>   <?=$rs->fld("os_versao");?>"/>
										</div>  
									</div>
									<!-- /.col -->
									<div class="form-group col-md-2 "> 
									  <label for="mq_statusId">#Status:</label>
										<div class="input-group">
											<div class="input-group-addon"> 
											  <i class="<?=$status_classe?>"></i>
											</div>
											<input type="text" DISABLED class="form-control" id="mq_statusId" name="mq_statusId"  value="<?=$rs->fld("status_desc");?>"/>													
										</div>
									</div>							
									<!-- /.col -->
								</div>
								<!-- /.row -->   
								
								<div class="row">																										
									<div class="form-group  col-md-2">  
									  <label for="mq_ip">#IP:</label> 
										<div class="input-group">
											<div class="input-group-addon">
											  <i class="fa fa-sitemap"></i>
											</div>
											<input type="text" DISABLED class="form-control" name="mq_ip" id="mq_ip" value="<?=$mq_ip;?>"/>  
										</div>
									</div> 								
									<!-- /.col -->
									<div class="form-group col-md-2">   
									  <label for="usu_nome">#Cadastrado por:</label>  
										<div class="input-group">
											<div class="input-group-addon">  
											  <i class="fa fa-user-secret"></i>
											</div>
										<input type="text" DISABLED class="form-control" name="usu_nome" id="usu_nome" value="<?=$usu_nome?>"/>  
										</div>  
									</div>
									<!-- /.col -->
									<?php
									$sql ="	SELECT * FROM at_maquinas a
									JOIN at_empresas    b ON a.mq_empId  = b.emp_id 
									JOIN mq_fabricante  c ON a.mq_fabId  = c.fab_id
									JOIN sys_usuarios   d ON a.mq_usucad = d.usu_cod
									JOIN eq_tipo        e ON a.mq_tipoId = e.tipo_id
									JOIN at_status      f ON a.mq_statusId = f.status_id
									WHERE mq_id = ".$mqid;
									$rs->FreeSql($sql);
									$rs->GeraDados();
									?>
									<div class="form-group col-md-1"><!--Tem que ser antes do selectt -->  
									  <label for="mq_licenca">licen&ccedil;a</label><br>  
										<input type="radio" DISABLED class="minimal" value=1 <?=($rs->fld("mq_licenca")==1?"CHECKED":"");?> id="mq_licenca" name="mq_licenca"> OEM<br>
										<input type="radio" DISABLED class="minimal" value=0 <?=($rs->fld("mq_licenca")==0?"CHECKED":"");?> id="mq_licenca" name="mq_licenca"> Open<br>
									</div>
									<!-- /.col -->
									<div class="form-group col-md-1"><!--Tem que ser antes do selectt -->  
									  <label for="mq_licenca">Aloca&ccedil;&atilde;o</label><br>  
										<input type="radio" DISABLED class="minimal" value=f <?=($rs->fld("mq_servtp")==f?"CHECKED":"");?> id="mq_servtp" name="mq_servtp"> Fisico<br>
										<input type="radio" DISABLED class="minimal" value=v <?=($rs->fld("mq_servtp")==v?"CHECKED":"");?> id="mq_servtp" name="mq_servtp"> Virtual<br>										
									</div>
									<!-- /.col -->																					
									<div class="form-group col-md-1"><!--Tem que ser antes do selectt -->  
									  <label for="mq_licenca">Cluster</label><br>  
										<input type="radio" DISABLED class="minimal" value=1 <?=($rs->fld("mq_servcluster")==1?"CHECKED":"");?> id="mq_servcluster" name="mq_servcluster"> Sim<br>
										<input type="radio" DISABLED class="minimal" value=0 <?=($rs->fld("mq_servcluster")==0?"CHECKED":"");?> id="mq_servcluster" name="mq_servcluster"> Nao<br>
										
									</div>
									<!-- /.col -->	
									<div class="form-group col-md-1"><!--Tem que ser antes do selectt -->  
									  <label for="mq_licenca">Ativo</label><br>  
										<input type="radio" DISABLED class="minimal" value=1 <?=($rs->fld("mq_ativo")==1?"CHECKED":"");?> id="mq_ativo" name="mq_ativo"> Sim<br>
										<input type="radio" DISABLED class="minimal" value=0 <?=($rs->fld("mq_ativo")==0?"CHECKED":"");?> id="mq_ativo" name="mq_ativo"> Nao<br>										
									</div>	
								</div>
								<!-- /.row --> 
							</div>
							<!-- /.body --> 
						</form>
						<!-- /.form -->
						  

						<div class="box-footer">
							<div class="box-header with-border">
							  <h3 class="box-title">A&ccedil;&otilde;es</h3>
								<div class="box-tools pull-right"></div>  
							</div>
							
							<table id="maquinas" class="table table-bordered table-striped">     
								<tr>													
									<td>
										<button class="btn btn-sm btn-success" type="button" id="btn_Ativar_serv"><i class="fa fa-power-off"></i> Ativar</a>										
									</td> 									
								</tr>
							</table>							
						</div>
						<!-- ./footer ação--> 
					</div>
					<!-- ./box primary--> 
					
					<!-- general form elements -->
					<div class="box box-success">
						<div class="box-header with-border"> 
						  <h3 class="box-title">Serviços deste Servidor</h3>
							<div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>   
							</div>  
						</div>
						<!-- /.box-header --> 
						
						<div class="box-body">
							<table id="usu" class="table table-bordered table-striped">
								<thead>
									<tr> 
										<th>C&oacute;d:</th>
										<th>Servi&ccedil;o</th> 
										<th>Vers&atilde;o</th> 
										<th>Licen&ccedil;a</th>										
										<th>A&ccedil;&otilde;es</th>  
									</tr>
								</thead>
								<tbody id="mq_cad">
									<?php require_once("at_tbServico_servidor.php");?>
								</tbody>
							</table>
						</div>
						<!-- /.box-body -->
						
						<div class="box-footer">
							<a class='btn btn-sm btn-success' data-toggle='tooltip' data-placement='bottom' title='Add Servico' href="at_cad_servico_serv.php?token=<?=$_SESSION['token']?>&acao=N&mqid=<?=$mq_id?>"><i class="fa fa-cog"></i> Add</a>
						</div> 
					</div><!-- /.box -->  				
				
					<?php
						$rs = new recordset();
						$sql ="	SELECT * FROM at_maquinas 
						WHERE mq_id =".$mqid;  
						$rs->FreeSql($sql);
						$rs->GeraDados(); 

						$datagar = $rs->fld("mq_datagar");
						$datacad = $rs->fld("mq_datacad");
						$hoje    = date("Y-m-d H:i:s");
						$diferenca = strtotime($hoje) - strtotime($datacad);
						$dias = floor($diferenca / (60 * 60 * 24));
						$diferenca2 = strtotime($datagar) - strtotime($datacad);
						$dias2 = floor($diferenca2 / (60 * 60 * 24));
					?>				
				</div>
				<!-- /.col12 -->
			</div>		
			<!-- /.row -->
		</section>
		<!-- /.content -->
    </div>
	<!-- /.content-wrapper --> 
	  
	<?php require_once("../config/footer.php");?>
	<!-- Control Sidebar -->
	<div class="control-sidebar-bg"></div>
	<!-- /.control-sidebar -->	
</div>
<!-- ./wrapper --> 

<!-- jQuery 2.1.4 --> 
<script src="<?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="<?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/datepicker/bootstrap-datepicker.js"></script>	
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=$hosted;?>/dashboard/assets/plugins/morris/morris.min.js"></script>
<!-- ChartJS 1.0.1-->
<script src="<?=$hosted;?>/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
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

  //Date picker
    $('#mq_datagar').datepicker({
      format: 'dd/mm/yyyy',                
    language: 'pt-BR'
    });
 
</script>
<!--  script  morris-->
<script>
  $(function () { 
	"use strict";
	//-----------------------------------------------\\
	//- DONUT CHART - Graficos de rosca com valores - \\
	//-------------------------------------------------\\
	var line = new Morris.Line({
	element: 'line-chart2',
	resize: true,
	data: [
	  {y: '<?=$datacad;?>Q1', item1: 0, item2:0},
	  {y: '<?=$datagar;?> Q2', item1: 0, item2:<?=$dias2;?>},
	  {y: '<?=$hoje;?> Q3', item1: <?=$dias;?>}
	],
	xkey: 'y',
	ykeys: ['item1', 'item2'], 
	  labels: ['Vida-util', 'Garantia'], 
	  lineColors: ['#3c8dbc','#f20c0c'],
	lineWidth: 2,
	hideHover: 'auto',
	gridTextColor: "#fff",
	gridStrokeWidth: 0.4,
	pointSize: 4,
	pointStrokeColors: ["#efefef"],
	gridLineColor: "#efefef",
	gridTextFamily: "Open Sans",
	gridTextSize: 10
  });

	
  });
</script> 
<!--  script  chartjs-->
<script>
  $(function () {
	 //------------------------------------------\\
	//- PIE CHART - Graficos de rosca com efeito -\\
	//---------------------------------------------\\
	var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
	var pieChart = new Chart(pieChartCanvas);
	var PieData = [
	   {
		value: <?=$dias2;?>,
		color: "#f20c0c",
		highlight: "#f20c0c",
		label: "Garantia" 				
	  },
	 
	  {
	   value: <?=$dias;?>,
		color: "#3c8dbc",
		highlight: "#3c8dbc",
		label: "Vida-util"  
	  }
	];
	  var pieOptions = {
	  //Boolean - Whether we should show a stroke on each segment
	  segmentShowStroke: true,
	  //String - The colour of each segment stroke
	  segmentStrokeColor: "#fff",
	  //Number - The width of each segment stroke
	  segmentStrokeWidth: 2,
	  //Number - The percentage of the chart that we cut out of the middle
	  percentageInnerCutout: 50, // This is 0 for Pie charts
	  //Number - Amount of animation steps
	  animationSteps: 100,
	  //String - Animation easing effect
	  animationEasing: "easeOutBounce",
	  //Boolean - Whether we animate the rotation of the Doughnut
	  animateRotate: true,
	  //Boolean - Whether we animate scaling the Doughnut from the centre
	  animateScale: false,
	  //Boolean - whether to make the chart responsive to window resizing
	  responsive: true,
	  // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
	  maintainAspectRatio: true,
	  //String - A legend template
	  legendTemplate: "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<segments.length; i++){%><li><span style=\"background-color:<%=segments[i].fillColor%>\"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>"
	};
	//Create pie or douhnut chart
	// You can switch between pie a nd douhnut using the method below.
	pieChart.Doughnut(PieData, pieOptions);		
  });
</script>
</body>
</html>	