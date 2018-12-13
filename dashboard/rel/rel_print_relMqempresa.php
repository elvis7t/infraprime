<?php
//sujeira embaixo do tapete :(
//error_reporting(E_ALL & E_NOTICE & E_WARNING);

/*inclusão dos principais itens da página */
session_start();
//$sec = "REL";
//$pag = "at_relatorio.php";
require_once("../config/main.php");
//require_once("../config/mnutop.php");
//require_once("../config/menu.php");
//require_once("../config/modals.php"); 
//require_once("../class/class.functions.php");
require_once("../model/recordset.php");

 

?>
	<body onload="window.print();">
		<div class="wrapper">
			<!-- Main content -->
			<section class="invoice">
				<!-- title row --> 
				<div class="row">
				  <div class="col-xs-12"> 
					<h2 class="page-header">
					 <?php
								extract($_GET);
								$rs = new recordset();
								$sql ="SELECT * FROM at_empresas
										WHERE emp_id=".$sel_emp; 
								$rs->FreeSql($sql);
								$rs->GeraDados();   
								?>
						<small class="pull-left"><img class="profile-user-img img-responsive img-circle" src="https://infraprime.000webhostapp.com/dashboard/<?=$rs->fld('emp_logo');?>" alt="Logo da Empresa"></small> 
							<?=$rs->fld("emp_nome");?>  
						<small class="pull-right">Data: <?=date("d/m/Y");?></small>
					</h2>
				  </div><!-- /.col -->
				</div>   
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
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
								  <tr><th colspan=7><h2>Relat&oacute;rio de M&aacute;quinas Ativas</h2></th></tr>
									  <tr>
										
										<th>Empresa</th> 
										<th>Departamento</th> 
										<th>Usu&aacute;rio</th>
										<th>Nome</th>
										<th>Fabricante</th> 
										<th>Tipo</th>
										<th>Modelo</th>
										<th>Status</th>
										<th>Sitema</th> 
										<th>Office</th> 
										<th>Comprado</th>
										<th>Garantia</th>
										<th>Licen&ccedil;a</th>
								</tr>
							</thead>
							<tbody id="rls">
								<?php
									require_once("corpo_relMqempresa.php");
								?>
							</tbody>
						</table>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</section><!-- /.content -->
		</div><!-- ./wrapper -->

		<!-- AdminLTE App -->
		<script src="https://infraprime.000webhostapp.com/dashboard/assets/dist/js/app.min.js"></script>
	</body>
</html>
