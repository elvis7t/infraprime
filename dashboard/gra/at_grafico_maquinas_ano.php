<?php
$sess = "GRA";
$pag = "at_grafico_maquinas_ano.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../controller/acao_graficos.php");
require_once("../model/recordset.php");

$ano   = date("Y");
$ano1  = date("Y") -  1;
$ano2  = date("Y") -  2;
$ano3  = date("Y") -  3;
$ano4  = date("Y") -  4;
$ano5  = date("Y") -  5;
$ano6  = date("Y") -  6;
$ano7  = date("Y") -  7;
$ano8  = date("Y") -  8;
$ano9  = date("Y") -  9;
$ano10 = date("Y") - 10;

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
            <li class="active">Gr&aacute;fico</li>
			  <li class="active">M&aacute;quinas por ano</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
	  <div class="row">   
          <!-- /.box -->
	        <!-- /.col (Center) -->
        <div class="col-md-12">
      		<!-- BAR CHART - Gráficos de coluna por ano-->
          <div class="box box-primary">
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
              <div class="chart" id="bar-chart" style="height: 200px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
		</div>
	    <!-- /.col -->
	  </div>
     <!-- /.row -->
	<div class="row">   
          <!-- /.box -->
		<div class="col-md-6">
          <!-- Donut chart Graficos de rosca % porcentagem-->
           <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">M&aacute;quinas do Grupo</h3>

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
              <div id="donut-chart" style="height: 320px;"></div>
            </div>
			<!-- ./chart-responsive --> 
            </div>
			 <!-- /.col -->
			 <div class="col-md-2">
                  <ul class="chart-legend clearfix">
				    <li><i class="fa fa-circle-o text-aqua"></i> <?=$ano10?></li>
                    <li><i class="fa fa-circle-o text-red"></i> <?=$ano9?></li>
                    <li><i class="fa fa-circle-o text-blue"></i> <?=$ano8?></li>
                    <li><i class="fa fa-circle-o text-red"></i> <?=$ano7?></li>
					<li><i class="fa fa-circle-o text-orange"></i> <?=$ano6?></li>
                    <li><i class="fa fa-circle-o text-green"></i> <?=$ano5?></li>
                    <li><i class="fa fa-circle-o text-yellow"></i> <?=$ano4?></li>
                    <li><i class="fa fa-circle-o text-light-blue"></i> <?=$ano3?></li>
					<li><i class="fa fa-circle-o text-gray"></i> <?=$ano2?></li>
					<li><i class="fa fa-circle-o text-orange"></i> <?=$ano1?></li>
					<li><i class="fa fa-circle-o text-purple"></i> <?=$ano?></li>
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
		
		          
         
		  <div class="col-md-6">
		  <!--DONUT CHART - Graficos de rosca com valores-->
			 <div class="box box-primary">
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
              <div class="chart" id="sales-chart" style="height: 280px; position: relative;"></div>
            </div>
            <!-- /.box-body -->
			<div class="box-footer no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#">Total de M&aacute;quinas
                  <span class="pull-right text-red"> <?=$maquinas;?></span></a></li>
                
              </ul>
            </div>
          </div>
		  <!-- /.box -->
        </div>
	 <!-- /.col --> 
  </div>
  <div class="row">
   <div class="col-md-12">
      		<!-- BAR CHART - Gráficos de coluna por ano-->
          <div class="box box-primary">
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
              <div class="chart" id="bar-chart-emp" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->  
          </div>
          <!-- /.box -->
		</div>
	    <!-- /.col -->
  </div>
<!-- /.row -->   
      
        <!-- /.col (LEFT) -->
      
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
        {label: '<?=$ano10?>', data: <?=$mqano10;?>, color:'#00c0ef'},
        {label: '<?=$ano9?>',  data: <?=$mqano9;?>, color:'#f23e11'},
        {label: '<?=$ano8?>',  data: <?=$mqano8;?>, color:'#1182f2'}, 
        {label: '<?=$ano7?>',  data: <?=$mqano7;?>, color:'#f56954'},
        {label: '<?=$ano6?>',  data: <?=$mqano6;?>, color:'#f27311'},
		{label: '<?=$ano5?>',  data: <?=$mqano5;?>, color:'#00a65a'},
        {label: '<?=$ano4?>',  data: <?=$mqano4;?>, color:'#f39c12'},
        {label: '<?=$ano3?>',  data: <?=$mqano3;?>, color:'#3c8dbc'}, 
        {label: '<?=$ano2?>',  data: <?=$mqano2;?>, color:'#d2d6de'}, 
        {label: '<?=$ano1?>',  data: <?=$mqano1;?>, color:'#dd990f'}, 
        {label: '<?=$ano?>',   data: <?=$mqano;?>, color:'#ba3ce8'} 
      
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
      colors: ['#00c0ef','#f23e11', '#1182f2','#f56954','#f27311','#00a65a','#f39c12','#3c8dbc','#d2d6de','#dd990f','#ba3ce8'],
      data: [
        {label: '<?=$ano10?>', value: <?=$mqano10;?>},
        {label: '<?=$ano9?>' , value: <?=$mqano9;?>},
        {label: '<?=$ano8?>' , value: <?=$mqano8;?>}, 
        {label: '<?=$ano7?>' , value: <?=$mqano7;?>},
        {label: '<?=$ano6?>' , value: <?=$mqano6;?>},
		{label: '<?=$ano5?>' , value: <?=$mqano5;?>},
        {label: '<?=$ano4?>' , value: <?=$mqano4;?>},
        {label: '<?=$ano3?>' , value: <?=$mqano3;?>}, 
        {label: '<?=$ano2?>' , value: <?=$mqano2;?>}, 
        {label: '<?=$ano1?>' , value: <?=$mqano1;?>}, 
        {label: '<?=$ano?>'  , value: <?=$mqano;?>} 
      ],  
      hideHover: 'auto'
    });  
   
    //-------------------------------------------\\
    //- BAR CHART - Gráficos de coluna por ano  -\\
    //-------------------------------------------\\

    var bar = new Morris.Bar({
      element: 'bar-chart',  
      resize: true,
      data: [ 
        {y: '<?=$ano10?>',  a: <?=$mqano10;?>},
        {y: '<?=$ano9?>',   a: <?=$mqano9;?>},
        {y: '<?=$ano8?>',   a: <?=$mqano8;?>}, 
        {y: '<?=$ano7?>',   a: <?=$mqano7;?>},
        {y: '<?=$ano6?>',   a: <?=$mqano6;?>},
		{y: '<?=$ano5?>',   a: <?=$mqano5;?>},
        {y: '<?=$ano4?>',   a: <?=$mqano4;?>},
        {y: '<?=$ano3?>',   a: <?=$mqano3;?>}, 
        {y: '<?=$ano2?>',   a: <?=$mqano2;?>}, 
        {y: '<?=$ano1?>',   a: <?=$mqano1;?>}, 
        {y: '<?=$ano?>',    a: <?=$mqano;?>} 
      ], 
      barColors: ['#13c6bd'],  
      xkey: 'y', 
      ykeys: ['a'],
      labels: ['MAQUINAS'],  
    }); 
	
	 //-------------------------------------------\\
    //- BAR CHART - Gráficos de coluna por ano  -\\
    //-------------------------------------------\\

    var bar = new Morris.Bar({
      element: 'bar-chart-emp', 
      resize: true,
      data: [ 
        {y: 'NIFF',    a: <?=$mqniffano10;?>,   b:<?=$mqniffano9;?>,   c: <?=$mqniffano8;?>,   d: <?=$mqniffano7;?>,   e:<?=$mqniffano6;?>,   f:<?=$mqniffano5;?>,   g:<?=$mqniffano4;?>,   h:<?=$mqniffano3;?>,   i:<?=$mqniffano2;?>,   j:<?=$mqniffano1;?>,   l:<?=$mqniffano;?>},
        {y: 'EOVG',    a: <?=$mqeovgano10;?>,   b:<?=$mqeovgano9;?>,   c: <?=$mqeovgano8;?>,   d: <?=$mqeovgano7;?>,   e:<?=$mqeovgano6;?>,   f:<?=$mqeovgano5;?>,   g:<?=$mqeovgano4;?>,   h:<?=$mqeovgano3;?>,   i:<?=$mqeovgano2;?>,   j:<?=$mqeovgano1;?>,   l:<?=$mqeovgano;?>},
        {y: 'VUG',     a: <?=$mqvugano10;?>,    b:<?=$mqvugano9;?>,    c: <?=$mqvugano8;?>,    d: <?=$mqvugano7;?>,    e:<?=$mqvugano6;?>,    f:<?=$mqvugano5;?>,    g:<?=$mqvugano4;?>,    h:<?=$mqvugano3;?>,    i:<?=$mqvugano2;?>,    j:<?=$mqvugano1;?>,    l:<?=$mqvugano;?>},
		{y: 'LAVRAS',  a: <?=$mqlavrasano10;?>, b:<?=$mqlavrasano9;?>, c: <?=$mqlavrasano8;?>, d: <?=$mqlavrasano7;?>, e:<?=$mqlavrasano6;?>, f:<?=$mqlavrasano5;?>, g:<?=$mqlavrasano4;?>, h:<?=$mqlavrasano3;?>, i:<?=$mqlavrasano2;?>, j:<?=$mqlavrasano1;?>, l:<?=$mqlavrasano;?>},
		{y: 'ARUJA',   a: <?=$mqarujaano10;?>,  b:<?=$mqarujaano9;?>,  c: <?=$mqarujaano8;?>,  d: <?=$mqarujaano7;?>,  e:<?=$mqarujaano6;?>,  f:<?=$mqarujaano5;?>,  g:<?=$mqarujaano4;?>,  h:<?=$mqarujaano3;?>,  i:<?=$mqarujaano2;?>,  j:<?=$mqarujaano1;?>,  l:<?=$mqarujaano;?>},
		{y: 'ABC',     a: <?=$mqabcano10;?>,    b:<?=$mqabcano9;?>,    c: <?=$mqabcano8;?>,    d: <?=$mqabcano7;?>,    e:<?=$mqabcano6;?>,    f:<?=$mqabcano5;?>,    g:<?=$mqabcano4;?>,    h:<?=$mqabcano3;?>,    i:<?=$mqabcano2;?>,    j:<?=$mqabcano1;?>,    l:<?=$mqabcano;?>},
		{y: 'CAMPBUS', a: <?=$mqcampano10;?>,   b:<?=$mqcampano9;?>,   c: <?=$mqcampano8;?>,   d: <?=$mqcampano7;?>,   e:<?=$mqcampano6;?>,   f:<?=$mqcampano5;?>,   g:<?=$mqcampano4;?>,   h:<?=$mqcampano3;?>,   i:<?=$mqcampano2;?>,   j:<?=$mqcampano1;?>,   l:<?=$mqcampano;?>},
		{y: 'RAPDO',   a: <?=$mqrapdoano10;?>,  b:<?=$mqrapdoano9;?>,  c: <?=$mqrapdoano8;?>,  d: <?=$mqrapdoano7;?>,  e:<?=$mqrapdoano6;?>,  f:<?=$mqrapdoano5;?>,  g:<?=$mqrapdoano4;?>,  h:<?=$mqrapdoano3;?>,  i:<?=$mqrapdoano2;?>,  j:<?=$mqrapdoano1;?>,  l:<?=$mqrapdoano;?>},
        {y: 'CISNE',   a: <?=$mqcisneano10;?>,  b:<?=$mqcisneano9;?>,  c: <?=$mqcisneano8;?>,  d: <?=$mqcisneano7;?>,  e:<?=$mqcisneano6;?>,  f:<?=$mqcisneano5;?>,  g:<?=$mqcisneano4;?>,  h:<?=$mqcisneano3;?>,  i:<?=$mqcisneano2;?>,  j:<?=$mqcisneano1;?>,  l:<?=$mqcisneano;?>} 
        
        
      
      ], 
      barColors: ['#00c0ef','#f23e11', '#1182f2','#f56954','#f27311','#00a65a','#f39c12','#3c8dbc','#d2d6de','#dd990f','#ba3ce8'],
      xkey: 'y', 
      ykeys: ['a','b','c','d','e','f','g','h','i','j','l'],
      labels: ['<?=$ano10?>','<?=$ano9?>','<?=$ano8?>','<?=$ano7?>','<?=$ano6?>','<?=$ano5?>','<?=$ano4?>','<?=$ano3?>','<?=$ano2?>','<?=$ano1?>','<?=$ano?>'],  
    }); 
  });
</script>  
<!--  script  chartjs-->
<script>
  $(function () {
	 //------------------------------------------\\
    //- PIE CHART - Graficos de rosca com efeito -\\
    //---------------------------------------------\\
	
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartCanvas = $("#pieChart").get(0).getContext("2d");
    var pieChart = new Chart(pieChartCanvas);
    var PieData = [
	  {
        value: <?=$mqniff?>,
        color: "#00c0ef",
        highlight: "#00c0ef",
        label: "NIFF"
      },	
		
      {
        value: <?=$mqeovg?>, 
        color: "#f23e11",
        highlight: "#f23e11",
        label: "EOVG"
      },
	  {
        value: <?=$mqvug?>,
        color: "#1182f2",
        highlight: "#1182f2",
        label: "VUG"
      }, 
	  {
        value: <?=$mqlavras?>,
        color: "#f56954",
        highlight: "#f56954",
        label: "LAVRAS"
      },
	  
       {
        value: <?=$mqaruja?>,
        color: "#f27311",
        highlight: "#f27311",
        label: "ARUJA"
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
        value: <?=$mqrapdo?>,
        color: "#3c8dbc",
        highlight: "#3c8dbc",
        label: "RAPDO"
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
