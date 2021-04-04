<?php
$sess = "DASH";
$pag = "at_dashboard_servidor.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../controller/acao_graficos_servidor.php");
require_once("../model/recordset.php");
$fn = new functions();
?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->  
        <section class="content-header">
          <h1> Dashboard 2
            <small>Painel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard 2</li>
          </ol>
        </section>
		
		<!-- Main content -->
		<section class="content">
		
				
			<div class="row">
				
			</div><!-- /.row -->

			<div class="row"> 
			
			</div><!-- /.row-->
			
			<div class="row">
				
			</div><!-- /.row-->			  
			
			<div class="row">
				<div class="col-md-3">
					<div class="small-box bg-blue">
						<div class="inner">
							<h3><?=$servidor?></h3>
							<p>Servidores Ativos</p>
						</div>
						<div class="icon">
							<i class="fa fa-server"></i> 
						</div>
							<a href="<?=$hosted;?>/dashboard/view/at_servidor.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
					</div>
				</div> 
				
				<div class="col-md-3">
					<div class="small-box bg-blue">
						<div class="inner"> 
							<h3><?=$servidorvirtual?></h3>
							<p>Servidores Virtuais</p>
						</div>
						<div class="icon">
							<i class="fa fa-connectdevelop"></i> 
						</div>
							<a href="<?=$hosted;?>/dashboard/view/at_servidor_vt.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
					</div>
				</div> 
				
				<div class="col-md-3">
					<div class="small-box bg-blue">
						<div class="inner">
							<h3><?=$servidorfisico?></h3>
							<p>Servidores Fisicos</p>
						</div>
						<div class="icon">
							<i class="fa fa-hdd-o"></i> 
						</div>
							<a href="<?=$hosted;?>/dashboard/view/at_servidor_fis.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
					</div>
				</div>
				
				<div class="col-md-3">
					<div class="small-box bg-blue">
						<div class="inner">
							<h3><?=$servidorsemgar?></h3>
							<p>Servidores sem Garantia</p>
						</div>
						<div class="icon">
							<i class="fa fa-calendar-check-o"></i>  
						</div>
							<a href="<?=$hosted;?>/dashboard/view/at_servidor_semgar.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
					</div>
				</div>			   
			</div>
			
			<div class="row">  
				<div class="col-md-3">              
					<div class="info-box bg-blue">
						<span class="info-box-icon"><i class="fa fa-windows"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Windows</span>
							<span class="info-box-number"><?=$windowsserver?></span>
							<div class="progress">
								<div class="progress-bar" style="width: <?=$windowsserver?>%"></div>
							</div>
							<span class="progress-description">
								Total
							</span>
						</div><!-- /.info-box-content -->  
					</div><!-- /.info-box -->
				</div><!-- /.info-box -->
				
				<div class="col-md-3">
					<div class="info-box bg-blue">
						<span class="info-box-icon"><i class="fa fa-linux"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Linux</span>
							<span class="info-box-number"><?=$linux?></span>
							<div class="progress">
								<div class="progress-bar" style="width: <?=$linux?>%"></div>
							</div>
							<span class="progress-description">
								Total
							</span>
						</div><!-- /.info-box-content -->
					</div><!-- /.info-box -->
				</div><!-- /.info-box -->		  
				  
				<div class="col-md-3"> 
					<div class="info-box bg-blue">
						<span class="info-box-icon"><i class="fa fa-database"></i></span> 
						<div class="info-box-content">
							<span class="info-box-text">Em Cluster</span>
							<span class="info-box-number"><?=$incluster?> </span>
							<div class="progress">
								<div class="progress-bar" style="width:<?=$incluster?>%"></div>
							</div>
							<span class="progress-description"> 
								Total
							</span>
						</div><!-- /.info-box-content -->
					</div><!-- /.info-box -->
				</div><!-- /.info-box -->
				  
				<div class="col-md-3">             
					<div class="info-box bg-blue">
						<span class="info-box-icon"><i class="fa fa-windows"></i></span>
						<div class="info-box-content">
							<span class="info-box-text">Windows Server 2008</span>
							<span class="info-box-number"><?=$win2008;?></span>
							<div class="progress">
								<div class="progress-bar" style="width: <?=$win2008;?>%"></div>
							</div> 
							<span class="progress-description">
							   Total 
							</span>
						</div><!-- /.info-box-content -->
					</div><!-- /.info-box -->
				</div><!-- /.info-box --> 
				
				<div class="col-md-6">
					<!-- BAR CHART - Gráficos de coluna por ano-->
					<div class="box box-primary">
						<div class="box-header with-border">
							<i class="fa fa-bar-chart-o"></i>
								<h3 class="box-title">Garantia X sem Garantia</h3>
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div>
						
						<div class="box-body chart-responsive">
						  <div class="chart" id="bar-chart" style="height: 344px;"></div>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				
				<div class="col-md-6">
					<div class="box box-primary">
					<!--   //- PIE CHART - Graficos de rosca com efeito -\\-->
						<div class="box-header with-border">
						  <i class="fa fa-bar-chart-o"></i>
							<h3 class="box-title">Garantia X sem Garantia</h3>							
							<div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							</div>
						</div> 
						<!-- /.box-header -->
						<div class="box-body">
							<div class="row"> 
								<div class="col-md-10">
									<div class="chart-responsive">
										<canvas id="pieChart" height="226"></canvas>
									</div>
								  <!-- ./chart-responsive -->
								</div>
								<!-- /.col -->
								<div class="col-md-2">
								  <ul class="chart-legend clearfix">
									<li><i class="fa fa-circle-o text-red"></i>Sem garantia</li>
									<li><i class="fa fa-circle-o text-aqua"></i>Com garantia</li>								
								  </ul>  
								</div>  
								<!-- /.col --> 
							</div> 
							<!-- /.row -->
						</div>					
					</div>
					<!-- /.box-body -->
					<!-- /.col (RIGHT) -->
				</div>
				
			</div><!-- /.info-box -->
		</section>
		<!-- /.content -->		
    </div>
	<!-- /.content-wrapper -->	  
	<?php require_once("../config/footer.php");?>
		<div class="control-sidebar-bg"></div>

 </div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="<?=$hosted;?>/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?=$hosted;?>/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="<?=$hosted;?>/dashboard/assets/plugins/morris/morris.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <!-- <script src="<?=$hosted;?>/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="<?=$hosted;?>/dashboard/assets/dist/js/demo.js"></script>
	<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/flot/jquery.flot.categories.min.js"></script>

	<script>
	//- BAR CHART - Gráficos de coluna por ano  -\\
    //-------------------------------------------\\

    var bar = new Morris.Bar({
      element: 'bar-chart',  
      resize: true,
      data: [ 
        {y: 'Com Garantia',  a: <?=$mqtotalgar ;?>},
        {y: 'Sem Garantia',  b: <?=$mqtotalsemgar ;?>}
      ], 
      barColors: ['#00c0ef','#f23e11'],  
      xkey: 'y', 
      ykeys: ['a','b'], 
        labels: ['Na Garantia','Sem Garantia'],
      hideHover: 'auto'  
    });   
	
	 //-------------------------------------------\\
    //- BAR CHART - Gráficos de coluna por ano  -\\
    //-------------------------------------------\\
	 $(function () {
	 //------------------------------------------\\
    //- PIE CHART - Graficos de rosca com efeito -\\
    //---------------------------------------------\\
	
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
	  {
        value: <?=$mqtotalgar;?>,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Com Garantia"
      },	
		
      {
        value: <?=$mqtotalsemgar;?>, 
        color: "#f23e11",
        highlight: "#f23e11",
        label: "Sem Garantia"
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
    // You can switch between pie and douhnut using the method below.
    pieChart.Doughnut(PieData, pieOptions);

    
  });
	</script> 
  </body>
</html>
 