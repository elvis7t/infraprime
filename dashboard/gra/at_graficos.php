<?php
$sess = "GRA";
$pag = "at_graficos.php";
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
          
          </ol>
        </section>

    <!-- Main content -->
    <section class="content">      
     

      <div class="row">
       

        <div class="col-md-6">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Equipamentos do Grupo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart1" style="height: 300px;"></div>
            </div>
            <!-- /.box-body--> 
          </div> 
          </div>
          <!-- /.box -->
		<div class="col-md-6">
          <!-- Donut chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Equipamentos do Grupo</h3>

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
			 <!-- /.col -->
			 <div class="col-md-2">
                  <ul class="chart-legend clearfix">
				    <li><i class="fa fa-circle-o text-aqua"></i> NIFF</li>
                    <li><i class="fa fa-circle-o text-red"></i> EOVG</li>
                    <li><i class="fa fa-circle-o text-red"></i> LAVRAS</li>
                    <li><i class="fa fa-circle-o text-blue"></i> VUG</li>
					<li><i class="fa fa-circle-o text-green"></i> ABC</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> CAMP</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> RAPDO</li>
                    <li><i class="fa fa-circle-o text-gray"></i> CISNE</li>
					<li><i class="fa fa-circle-o text-orange"></i> ARUJA</li>
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
      </div>
      <!-- /.row -->
	  <div class="row">
        <div class="col-md-6">
          <!-- AREA CHART -->
         

          <!-- DONUT CHART  -->
          <div class="box box-success">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">M&aacute;quinas do Grupo</h3>

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
                    <canvas id="pieChart" height="170"></canvas>
                  </div>
                  <!-- ./chart-responsive -->
                </div>
                <!-- /.col -->
                <div class="col-md-2">
                  <ul class="chart-legend clearfix">
				    <li><i class="fa fa-circle-o text-aqua"></i> NIFF</li>
                    <li><i class="fa fa-circle-o text-red"></i> EOVG</li>
                    <li><i class="fa fa-circle-o text-red"></i> LAVRAS</li>
                    <li><i class="fa fa-circle-o text-blue"></i> VUG</li>
					<li><i class="fa fa-circle-o text-green"></i> ABC</li>
                    <li><i class="fa fa-circle-o text-yellow"></i> CAMP</li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> RAPDO</li>
                    <li><i class="fa fa-circle-o text-gray"></i> CISNE</li>
					<li><i class="fa fa-circle-o text-orange"></i> ARUJA</li>
                  </ul> 
                </div> 
                <!-- /.col --> 
              </div> 
              <!-- /.row -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Total de M&aacute;quinas
                  <span class="pull-right text-red"> <?=$maquinas;?></span></a></li>
                
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box --> 
		  </div>  
          <!-- /.box -->
		<div class="col-md-6">
			  <div class="box box-success">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">M&aacute;quinas do Grupo</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col (LEFT) -->
      
      </div>
    </section>
    <!-- /.content -->
 
  </div>
  <!-- /.content-wrapper -->
 <?php 
        require_once("../config/footer.php");
        //require_once("../config/side.php"); 
      ?>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div> 
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
  <script src="http://localhost/infraprime/dashboard/assets/plugins/jQuery/jQuery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="http://localhost/infraprime/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="http://localhost/infraprime/dashboard/assets/plugins/morris/morris.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="http://localhost/infraprime/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/infraprime/dashboard/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
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
<!-- Page script -->
<!--  script  flot-->
<script>
  $(function () {
    /*
   

    /* 
     * BAR CHART 
     * ---------
     */

    var bar_data = {
      data: [["NIFF", <?=$eqniff;?>], ["EOVG", <?=$eqeovg;?>], ["LAVRAS", <?=$eqlavras;?>], ["VUG", <?=$eqvug;?>], ["ABC", <?=$eqabc;?>],["CAMPBUS", <?=$eqcamp;?>],["RAPDO", <?=$eqrapdo;?>],["ARUJA", <?=$eqaruja;?>], ["CISNE", <?=$eqcisne;?>]],
      color: "#bc3c3c"
    };
    $.plot("#bar-chart1", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
      xaxis: {
        mode: "categories", 
        tickLength: 0
      }
    });
    /* END BAR CHART */

     //--------------------------------------------------\\
    //- DONUT CHART - Graficos de rosca % porcentagem - \\
    //---------------------------------------------------\\

    var donutData = [
      {label: "ABC", data: <?=$eqabc;?>, color: "#3c8dbc"},  
      {label: "CAMPBUS", data: <?=$eqcamp;?>, color: "#f39c12"},  
      {label: "LAVRAS", data: <?=$eqlavras;?>, color: "#f56954"},
      {label: "RAPDO", data: <?=$eqrapdo;?>, color: "#3c8dbc"},
      {label: "NIFF", data: <?=$eqniff;?>, color: "#00c0ef"},
      {label: "CISNE", data: <?=$eqcisne;?>, color: "#d2d6de"},
      {label: "ARUJA", data: <?=$eqaruja;?>, color: "#f27311"},
      {label: "VUG", data: <?=$eqvug;?>, color: "#1182f2"},
	  {label: "EOVG", data: <?=$eqeovg;?>, color: "#f23e11"}
      
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
<!-- script morris -->
<script>
  $(function () {
	"use strict";
    //-------------------------------------------\\
    //- BAR CHART - Gráficos de coluna por ano  -\\
    //-------------------------------------------\\

      
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: 'NIFF', a: <?=$mqniff;?>},
        {y: 'EOVG', a: <?=$mqeovg;?>},
        {y: 'VUG',  a: <?=$mqvug;?>}, 
        {y: 'LAV',  a: <?=$mqlavras;?>},
        {y: 'ABC',  a: <?=$mqabc;?>},
        {y: 'CAMP', a: <?=$mqcamp;?>},
        {y: 'RAPD', a: <?=$mqrapdo;?>}, 
        {y: 'ARUJA',a: <?=$mqaruja;?>},
        {y: 'CISNE',a: <?=$mqcisne;?>} 
      ], 
      barColors: ['#00c0ef', '#f23e11', '#f56954','#1182f2','#00a65a','#f39c12','#3c8dbc','#d2d6de','#f27311'],
      xkey: 'y', 
      ykeys: ['a'],
      labels: ['MAQUINAS'], 
      hideHover: 'auto'
    });
	
	 //------------------------------------------\\
    //- PIE CHART - Graficos de rosca com efeito -\\
    //---------------------------------------------\\
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
      {
        value: <?=$mqeovg?>, 
        color: "#f23e11",
        highlight: "#f23e11",
        label: "EOVG"
      },
	  {
        value: <?=$mqlavras?>,
        color: "#f56954",
        highlight: "#f56954",
        label: "LAVRAS"
      },
	  {
        value: <?=$mqvug?>,
        color: "#1182f2",
        highlight: "#1182f2",
        label: "VUG"
      }, 
      {
        value: <?=$mqabc?>,
        color: "#00a65a",
        highlight: "#00a65a",
        label: "ABC"
      },
      {   
        value: <?=$mqcamp?>,
        color: "#f39c12",
        highlight: "#f39c12",
        label: "CAMPBUS"
      },
      {
        value: <?=$mqniff?>,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "NIFF"
      },
      {
        value: <?=$mqrapdo?>,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "RAPDO"
      },
	  {
        value: <?=$mqaruja?>,
        color: "#f27311",
        highlight: "#f27311",
        label: "ARUJA"
      },
      
      {
        value: <?=$mqcisne?>,
        color: "#d2d6de",
        highlight: "#d2d6de",
        label: "CISNE"
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
