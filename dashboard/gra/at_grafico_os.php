<?php
$sess = "GRA";
$pag = "at_grafico_os.php";
require_once("../config/sessions.php");
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../controller/acao_graficos.php");
require_once("../model/recordset.php");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1> 
            B I
            <small>Gr&aacute;ficos</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> B I</a></li>
            <li class="active">Gr&aacute;ficos</li>
			  <li class="active">Sistema Operacional</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      

      <div class="row">   
          <!-- /.box -->
		<div class="col-md-6">
          <!-- Donut chart Graficos de rosca % porcentagem-->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Sistema Operacional</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div> 
            <div class="box-body">
			 <div class="row"> 
                <div class="col-md-10">
                  <div class="chart-responsive">
					<div id="donut-chart" style="height: 300px;"></div>
				</div>
				<!-- ./chart-responsive -->
				</div>
				 <div class="col-md-2">
                  <ul class="chart-legend clearfix">
				    <li><i class="fa fa-circle-o text-red"></i>XP</li>
                    <li><i class="fa fa-circle-o text-aqua"></i>7 86x</li>
                    <li><i class="fa fa-circle-o text-purple"></i>7 64x</li>
                    <li><i class="fa fa-circle-o text-blue"></i>8.1</li>
                    <li><i class="fa fa-circle-o text-green"></i>10</li>
                    
                  </ul>  
                </div>
                <!-- /.col -->
				
				</div>
				<!-- /.row -->
			</div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div> 
        <!-- /.col -->
		    
      
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
        

          <!-- //- BAR CHART - Gráficos de coluna por ano  -\\ -->
          <div class="box box-primary">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Sistema Operacional</h3>

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
        <!-- /.col -->
      
      
        <!-- //- DONUT CHART - Graficos de rosca com valores - \\ -->
        <div class="col-md-6">
			 <div class="box box-primary">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Sistema Operacional</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
		
			<div class="col-md-6">
		  <div class="box box-primary">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Sistema Operacional</h3>
				<!--   //- PIE CHART - Graficos de rosca com efeito -\\-->
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
                    <canvas id="pieChart" height="200"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-2">
                  <ul class="chart-legend clearfix">
				    <li><i class="fa fa-circle-o text-red"></i>XP</li>
                    <li><i class="fa fa-circle-o text-aqua"></i>7 86x</li>
                    <li><i class="fa fa-circle-o text-purple"></i>7 64x</li>
                    <li><i class="fa fa-circle-o text-blue"></i>8.1</li>
                    <li><i class="fa fa-circle-o text-green"></i>10</li>
                    
                  </ul>  
                </div>  
                <!-- /.col --> 
              </div> 
              <!-- /.row -->
            </div>
            
            <!-- /.box-body -->
          </div>
        <!-- /.col (RIGHT) -->
      </div>
        <!-- /.col (RIGHT) -->
      </div>
      <!-- /.row -->
	    <div class="row">   
          <!-- /.box -->
	        <!-- /.col (Center) -->
        <div class="col-md-12">
      		<!-- BAR CHART - Gráficos de coluna por ano-->
          <div class="box box-primary">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">Sistema  Operacional por empresa</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart-2" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
	    <!-- /.col -->
	  </div>
     <!-- /.row -->
    </section>
    <!-- /.content --> 

  </div>
  <!-- /.content-wrapper -->
 <?php 
        require_once("../config/footer.php");
        //require_once("../config/side.php"); 
      ?>

 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div> 
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
  <script src="<?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?=$hosted;?>/dashboard/assets/plugins/morris/morris.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=$hosted;?>/dashboard/assets/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/flot/jquery.flot.categories.min.js"></script>
<!-- Page script -->
<!--  script  flot-->
<script>
  $(function () {
    //--------------------------------------------------\\
    //- DONUT CHART - Graficos de rosca % porcentagem - \\
    //---------------------------------------------------\\
    var donutData = [
      {label: "winXP", data: <?=$winxp;?>, color: "#f23e11"},
	  {label: "win786x", data: <?=$win786;?>, color: "#00c0ef"},
	  {label: "win764x", data: <?=$win764;?>, color: "#b821d3"},
	  {label: "win8.1", data: <?=$win81;?>, color: "#1182f2"},
	  {label: "win10", data: <?=$win10;?>, color: "#087704"}
	  
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

<!--  script  morris-->

<script> 
  $(function () {
    "use strict";
	//-----------------------------------------------\\
    //- DONUT CHART - Graficos de rosca com valores - \\
    //-------------------------------------------------\\
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#f23e11", "#00c0ef", "#b821d3","#1182f2","#087704"],
      data: [
        {label: "Win XP", value: <?=$winxp;?>},
        {label: "Win 7 86x", value: <?=$win786;?>},
        {label: "Win 7 64x", value: <?=$win764;?>},
        {label: "Win 8.1", value: <?=$win81;?>},
		{label: "Win 10", value: <?=$win10;?>}
      ],
      hideHover: 'auto'
    });  
   
     //-------------------------------------------\\
    //- BAR CHART - Gráficos de coluna por ano  -\\
    //-------------------------------------------\\
    var bar = new Morris.Bar({
      element: 'bar-chart-morris', 
      resize: true,
      data: [
        {y: 'XP', a: <?=$winxp;?>},
		{y: 'W7 86', a: <?=$win786;?>}, 
		{y: 'W7 64',  a: <?=$win764;?>},
        {y: '8.1',  a: <?=$win81;?>}, 
		{y: 'W10',  a: <?=$win10;?>}, 
      ],
      barColors: ['#2171d3'],
      xkey: 'y',
      ykeys: ['a'],
      labels: ['Sistema'],
      hideHover: 'auto'
    });
	  //-------------------------------------------\\
    //- BAR CHART - Gráficos de coluna por ano  -\\
    //-------------------------------------------\\

    var bar = new Morris.Bar({
      element: 'bar-chart-2', 
      resize: true,
      data: [ 
        {y: 'SUPPORT',    a: <?=$Niffwinxp;?>, b:<?=$Niffwin786;?>, c: <?=$Niffwin764;?>, d: <?=$Niffwin81;?>, e:<?=$Niffwin10;?>},
        {y: 'EOVG',    a: <?=$Eovgwinxp;?>, b:<?=$Eovgwin786;?>, c: <?=$Eovgwin764;?>, d: <?=$Eovgwin81;?>, e:<?=$Eovgwin10;?>},
        {y: 'VUG',     a: <?=$Vugwinxp;?>, b:<?=$Vugwin786;?>, c: <?=$Vugwin764;?>, d: <?=$Vugwin81;?>, e:<?=$Vugwin10;?>},
		{y: 'LAVRAS',  a: <?=$Lavraswinxp;?>, b:<?=$Lavraswin786;?>, c: <?=$Lavraswin764;?>, d: <?=$Lavraswin81;?>, e:<?=$Lavraswin10;?>},
		{y: 'ARUJA',   a: <?=$Arujawinxp;?>, b:<?=$Arujawin786;?>, c: <?=$Arujawin764;?>, d: <?=$Arujawin81;?>, e:<?=$Arujawin10;?>},
		{y: 'ABC',     a: <?=$ABCwinxp;?>, b:<?=$ABCwin786;?>, c: <?=$ABCwin764;?>, d: <?=$ABCwin81;?>, e:<?=$ABCwin10;?>},
		{y: 'CAMPBUS', a: <?=$Campwinxp;?>, b:<?=$Campwin786;?>, c: <?=$Campwin764;?>, d: <?=$Campwin81;?>, e:<?=$Campwin10;?>},
		{y: 'RAPDO',   a: <?=$Rpdowinxp;?>, b:<?=$Rpdowin786;?>, c: <?=$Rpdowin764;?>, d: <?=$Rpdowin81;?>, e:<?=$Rpdowin10;?>},
        {y: 'CISNE',   a: <?=$Cisnewinxp;?>, b:<?=$Cisnewin786;?>, c: <?=$Cisnewin764;?>, d: <?=$Cisnewin81;?>, e:<?=$Cisnewin10;?>}
        
        
      
      ], 
      barColors: ['#f23e11','#00c0ef','#b821d3','#1182f2','#087704'],  
      xkey: 'y', 
      ykeys: ['a','b','c','d','e'],
      labels: ['XP','W7-86','W7-64','W8.1','W10'],  
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
        value: <?=$winxp;?>, 
        color: "#f23e11",
        highlight: "#f23e11",
        label: "Win XP"
      },
	  { 
        value: <?=$win786;?>,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Win 7 86x"
      },
	  { 
        value: <?=$win764;?>,
        color: "#b821d3",
        highlight: "#b821d3",
        label: "Win 7 64x"
      },
	  {  
        value: <?=$win81;?>,
        color: "#1182f2",
        highlight: "#1182f2",
        label: "Win 8.1"
      },
	  
      
      {
        value: <?=$win10;?>, 
        color: "#087704",
        highlight: "#087704",
        label: "Win 10"
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
