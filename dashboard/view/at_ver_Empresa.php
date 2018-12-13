<?php

//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
$sess = "USU";
$pag = "at_empresas.php";// Fazer o link brilhar quando a pag estiver ativa
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
			   <li class="active">Empresas </li>
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
 				$sql ="SELECT * FROM at_empresas
				  WHERE emp_id = ".$empid;      
 				$rs->FreeSql($sql);
 				$rs->GeraDados(); 
				
 				
			?>
			 <div class="row"> 
				<div class="col-md-12">
				<!-- general form elements --> 
				<div class="box box-primary">
					<div class="box-header with-border">
						<div class="col-md-2"><img class="profile-user-img img-responsive img-circle" src="http://localhost/infraprime/dashboard/<?=$rs->fld('emp_logo');?>" alt="Logo da Empresa"></div> 
							<h2><?=$rs->fld("emp_nome");?>								
							</h2><div class="box-tools pull-right">
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
										<input type="text" DISABLED class="form-control" name="pre_id" id="pre_id" value="<?=$rs->fld("emp_id");?>"/>
										<input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
										<input type="hidden" value="<?=isset($_GET['lista']) ? $_GET['lista']: 0 ;?>" name="lista" id="lista">
									</div>
									 
									<div class="form-group col-md-5">
										<label for="pre_nome">#Raz&atilde;o social:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-briefcase"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_nome" name="pre_nome"  value="<?=$rs->fld("emp_nome");?>">
									</div>
									</div>
									
								
									<div class="form-group col-md-2">
										<label for="pre_alias">#Apelido: </label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-briefcase"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_alias" name="pre_alias"  value="<?=$rs->fld("emp_alias");?>">
									</div>
									</div>
									<div class="form-group col-md-3">
										<label for="pre_cnpj">#CNPJ: </label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-key"></i>
										</div>
										<input type="text" DISABLED class="form-control" id="pre_cnpj" name="pre_cnpj"  value="<?=$rs->fld("emp_cnpj");?>">
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
										<input type="text" DISABLED class="form-control iest" id="pre_ie" name="pre_ie"  value="<?=$rs->fld("emp_ie");?>">
									</div>
									</div>
								
								<div class="form-group col-md-2">
										<label for="cep">#CEP: </label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-street-view"></i> 
											</div>
										<input type="text" DISABLED class="form-control cep" id="cep" name="cep"  value="<?=$rs->fld("emp_cep");?>" <?=$disable; ?>>
									</div>
									</div>
							 								
									
									<div class="form-group col-md-5"> 
										<label for="log">#Logradouro:</label>
											<div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-signs"></i>
												
											</div>
										<input DISABLED class="form-control input-sm text-uppercase" id="log" value="<?=$rs->fld("emp_log");?>" <?=$disable; ?>>
									</div>
									</div>
									<div class="form-group col-md-2">
									  <label for="num">#N&uacute;mero:</label>
									  <div class="input-group">
											<div class="input-group-addon">
												<i class="fa fa-map-marker"></i>
									</div>
									  <input DISABLED class="form-control input-sm" id="num" name="num"  value="<?=$rs->fld("emp_num");?>" <?=$disable; ?>>
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
									  <input DISABLED class="form-control input-sm text-uppercase" id="compl" name="compl" value="<?=$rs->fld("emp_compl");?>" <?=$disable; ?>>
									</div>
									</div>

							
									
									<div class="form-group col-md-3">
									<label for="emp_bai">#Bairro:</label>
									<div class="input-group">
													<div class="input-group-addon">
														<i class="fa fa-map-o"></i>
									</div>
									<input DISABLED class="form-control input-sm text-uppercase" id="bai"  value="<?=$rs->fld("emp_bai");?>" <?=$disable; ?>>
									</div>
									</div>
									
									<div class="form-group col-md-3">
										  <label for="emp_cid">Cidade</label>
										  <div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-map"></i>
										</div>
										  <input DISABLED class="form-control input-sm text-uppercase" id="cid"  value="<?=$rs->fld("emp_cid");?>" <?=$disable; ?>>
										</div>
										</div>



										<div class="form-group col-md-2">
									  <label for="emp_uf">UF</label>
									   <div class="input-group">
														<div class="input-group-addon">
															<i class="fa fa-map"></i>
										</div>
									  <input DISABLED class="form-control input-sm text-uppercase" id="uf"   value="<?=$rs->fld("emp_uf");?>" <?=$disable; ?>>
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
										<input type="text" DISABLED class="form-control" id="pre_contato" name="pre_contato"  value="<?=$rs->fld("emp_contato");?>">
									</div>
									</div>
									
								
									<div class="form-group col-md-3">
									<label for="pre_email">#E-mail:</label>									  
									<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-envelope"></i>
										</div>
									  <input type="text" DISABLED class="form-control" id="pre_email" name="pre_email"  value="<?=$rs->fld("emp_email");?>">
									
								</div>
								</div>
									<div class="form-group col-md-2">
										<label for="pre_tel">#Telefone:</label> 
										<div class="input-group">
										<div class="input-group-addon">
											<i class="glyphicon glyphicon-phone-alt"></i>
										</div>
										<input type="text" DISABLED class="form-control fone" id="pre_tel" name="pre_tel"  value="<?=$rs->fld("emp_tel");?>">
									</div>
									</div>
									 
									<div class="form-group col-md-4">  
										<label for="pre_site">#Site:</label>
										<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-google"></i>
										</div>  
										
										<a href="<?=$rs->fld("emp_site");?>"><?=$rs->fld("emp_site");?></a>
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
		  <!--DONUT CHART - Graficos de rosca com valores-->
			 <div class="box box-primary">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">M&aacute;quinas Garantia x Sem Garantia</h3>

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
		  <!-- /.box -->
        </div>
        <!-- /.col -->
      
      
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
       

          <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
			<i class="fa fa-bar-chart-o"></i>
              <h3 class="box-title">M&aacute;quinas e Equipamentos</h3>

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
							
				$sql ="SELECT * FROM at_maquinas
				WHERE mq_ativo <> 1 AND mq_empId=".$empid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$mq_emp = $rs->linhas;
				
				$sql ="SELECT * FROM at_equipamentos
				WHERE eq_ativo <> 1 AND eq_empId=".$empid;  
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$eq_emp = $rs->linhas;
				
				$sql ="SELECT * FROM at_maquinas
				WHERE YEAR(mq_datagar) < YEAR(CURDATE( ))AND mq_empId=".$empid;    
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$mq_semgar  = $rs->linhas;

				//COM*/
				$sql ="SELECT * FROM at_maquinas
				WHERE YEAR(mq_datagar) >= YEAR(CURDATE( )) AND mq_empId=".$empid;     
				$rs->FreeSql($sql);
				while($rs->GeraDados()){ }
				$mq_gar = $rs->linhas;
				
				
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
  $(function () {
    "use strict";
	
	//-----------------------------------------------\\
    //- DONUT CHART - Graficos de rosca com valores - \\
    //-------------------------------------------------\\ 
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ['#00c0ef','#f23e11'],
      data: [
        {label: 'Na Garantia', value: <?=$mq_gar;?>},
        {label: 'Sem Garantia', value: <?=$mq_semgar;?>}
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
        {y: 'Equipamentos', a: <?=$eq_emp?>}, 
        {y: 'Maquinas', b: <?=$mq_emp?>}
       
          
      ],
      barColors: ['#09a330', '#3a77f2'],
      xkey: 'y',
      ykeys: ['a','b'], 
      labels: ['Equipamentos','Maquinas'],
      hideHover: 'auto' 
    });
  });
</script> 
  </body>
</html> 
