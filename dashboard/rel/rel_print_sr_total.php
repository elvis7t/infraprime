<?php
session_start();
require_once("../config/main.php");
require_once("../model/recordset.php");?>
	<body onload="window.print();">
		<div class="wrapper">
			<!-- Main content -->
			<section class="invoice">
				<!-- title row --> 
				<div class="row">
				    <div class="col-xs-12">
						<h2 class="page-header">
							<?php				
							$rs = new recordset();
							$sql ="SELECT * FROM at_empresas
							WHERE emp_id=".$_SESSION['usu_empresa']; 
							$rs->FreeSql($sql);
							$rs->GeraDados();   
							?>
							<small class="pull-left"><img class="profile-user-img img-thumbnail img-responsive" src="<?=$hosted;?>/dashboard/<?=$rs->fld('emp_logo');?>" alt="Logo da Empresa"></small> 							    
								  
							<small class="pull-right">Data: <?=date("d/m/Y");?></small>
						</h2>
					</div><!-- /.col -->
				</div>   
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						<?=$rs->fld("emp_nome");?>
						Usu&aacute;rio
						<address>
							<strong><?=$_SESSION['nome_usu'];?></strong><br>
							<i class="fa fa-envelope"></i> <?=$_SESSION['usuario'];?>
						</address>
					</div><!-- /.col -->
				</div><!-- /.row --> 
 
				<!-- Table row -->
				<div class="row">
					<div class="col-xs-12 table-responsive">
						<table class="table table-striped">
							<thead>
								<tr>
									<th colspan=7><h2>Relat&oacute;rio de Servidores Ativos</h2></th>
								</tr>
								
								<tr>										
									<th>Empresa</th> 										
									<th>Nome</th>
									<th>Fabricante</th>													
									<th>Modelo</th>													
									<th>Sitema</th>
									<th>Tipo</th>													
									<th>Licen&ccedil;a</th>	
								</tr>
							</thead>
							<tbody id="rls">
								<?php  require_once("corpo_rel_SR_total.php");?>
							</tbody>
						</table>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</section><!-- /.content -->
		</div><!-- ./wrapper -->
		<!-- AdminLTE App -->
		<script src="<?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
	</body>
</html>
