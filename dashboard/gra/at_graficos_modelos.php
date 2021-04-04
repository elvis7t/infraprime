<?php
$sess = "GRA";
$pag = "at_graficos_prestadoras.php";
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../model/recordset.php");

?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Flot Charts
        <small>preview sample</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Charts</a></li>
        <li class="active">Flot</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      

      <div class="row">
       

        
          <!-- /.box -->
		<div class="col-md-6">
          <!-- Donut chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Donut Chart</h3>

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
              <h3 class="box-title">Bar Chart</h3>

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
<?php
				//----- Função de maquinas por empresa ----
				$rs = new recordset();
				$sql ="SELECT * FROM eq_manutencao a
				
				JOIN  eq_prestadoras   c ON a.man_preId  = c.pre_id 
				
				WHERE man_preId =  2"; 
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$imasic = $rs->linhas;
				
				$sql ="SELECT * FROM eq_manutencao a
						JOIN  eq_prestadoras   c ON a.man_preId  = c.pre_id 
						WHERE man_preId =  1"; 
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$trix = $rs->linhas;  
				
				$sql ="SELECT * FROM eq_manutencao a
						JOIN  eq_prestadoras   c ON a.man_preId  = c.pre_id 
						WHERE man_preId =  3"; 
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$luctel = $rs->linhas;  
				
				
				//----- Fim da Função de maquinas por empresa ----	  			

				?>  
<!-- jQuery 2.2.3 -->
  <script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/jQuery/jQuery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="https://infraprime.000webhostapp.com/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/morris/morris.min.js"></script>
<!-- ChartJS 1.0.1 
<script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="https://infraprime.000webhostapp.com/dashboard/assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="https://infraprime.000webhostapp.com/dashboard/assets/dist/js/demo.js"></script>
<!-- FLOT CHARTS -->
<script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/flot/jquery.flot.min.js"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/flot/jquery.flot.resize.min.js"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/flot/jquery.flot.pie.min.js"></script>
<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
<script src="https://infraprime.000webhostapp.com/dashboard/assets/plugins/flot/jquery.flot.categories.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    /*
   

    

    

    /*
     * DONUT CHART
     * -----------
     */

    var donutData = [
      {label: "Imasic", data: <?=$imasic;?>, color: "#59bc3c"},
      {label: "Trix", data: <?=$trix;?>, color: "#0073b7"},
      {label: "Luctel", data: <?=$luctel;?>, color: "#00c0ef"}
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
        {y: 'Imasic', a: <?=$imasic;?>},
        {y: 'Trix', a: <?=$trix;?> },
        {y: 'Luctel', a: <?=$luctel;?>}
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
