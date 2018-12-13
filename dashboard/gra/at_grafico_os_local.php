<?php
$sess = "GRA_LOCAL";
$pag = "at_grafico_os_local.php";
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

              <h3 class="box-title">Sistema Operacional <?=$empresa_local;?></h3>

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
              <h3 class="box-title">Sistema Operacional <?=$empresa_local;?></h3>

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
              <h3 class="box-title">Sistema Operacional <?=$empresa_local;?></h3>

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
              <h3 class="box-title">Sistema Operacional <?=$empresa_local;?></h3>
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
  <script src="http://localhost/dashboard/assets/plugins/jQuery/jQuery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="http://localhost/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://localhost/dashboard/assets/plugins/morris/morris.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="http://localhost/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/dashboard/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/dashboard/assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/dashboard/assets/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="http://localhost/dashboard/assets/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="http://localhost/dashboard/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="http://localhost/dashboard/assets/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="http://localhost/dashboard/assets/plugins/flot/jquery.flot.categories.min.js"></script>
<!-- Page script -->
<!--  script  flot-->
<script>
  $(function () {
    //--------------------------------------------------\\
    //- DONUT CHART - Graficos de rosca % porcentagem - \\
    //---------------------------------------------------\\
    var donutData = [
      {label: "winXP", data: <?=$winxplocal;?>, color: "#f23e11"},
	  {label: "win786x", data: <?=$win786local;?>, color: "#00c0ef"},
	  {label: "win764x", data: <?=$win764local;?>, color: "#b821d3"},
	  {label: "win8.1", data: <?=$win81local;?>, color: "#1182f2"},
	  {label: "win10", data: <?=$win10local;?>, color: "#087704"}
	  
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
        {label: "Win XP", value: <?=$winxplocal;?>},
        {label: "Win 7 86x", value: <?=$win786local;?>},
        {label: "Win 7 64x", value: <?=$win764local;?>},
        {label: "Win 8.1", value: <?=$win81local;?>},
		{label: "Win 10", value: <?=$win10local;?>}
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
        {y: 'XP', a: <?=$winxplocal;?>},
		{y: 'W7 86', a: <?=$win786local;?>}, 
		{y: 'W7 64',  a: <?=$win764local;?>},
        {y: '8.1',  a: <?=$win81local;?>}, 
		{y: 'W10',  a: <?=$win10local;?>}, 
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
        value: <?=$winxplocal;?>, 
        color: "#f23e11",
        highlight: "#f23e11",
        label: "Win XP"
      },
	  { 
        value: <?=$win786local;?>,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "Win 7 86x"
      },
	  { 
        value: <?=$win764local;?>,
        color: "#b821d3",
        highlight: "#b821d3",
        label: "Win 7 64x"
      },
	  {  
        value: <?=$win81local;?>,
        color: "#1182f2",
        highlight: "#1182f2",
        label: "Win 8.1"
      },
	  
      
      {
        value: <?=$win10local;?>, 
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
