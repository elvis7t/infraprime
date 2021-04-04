<?php
//sujeira embaixo do tapete :(
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*inclusão dos principais itens da página */
session_start();
$sess = "MAIL";
require_once("../config/main.php");
require_once("../config/valida.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
$rs = new recordset();
$sql ="SELECT * FROM sys_mail 		
		WHERE mail_statusId = '1' AND mail_destino_usuId =".$_SESSION['usu_cod'];
	$rs->FreeSql($sql);
	$rs->GeraDados();
	$td = $rs->fld("mail_statusId");
?> 

<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>
			Caixa de Mensagem
			
			<?php if($td==1 ): ?>
				<small><?=$rs->linhas;?> nova </small>			
			<?php else: ?>
				<small>Nenhuma mensagem</small>			
			<?php endif; ?>	
		  </h1>
		  <ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Mailbox</li>
		  </ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-3">
				  <a href="sys_mail_compor.php?token=<?=$_SESSION['token'];?>" class="btn btn-primary btn-block margin-bottom">Escrever</a>

				  <div class="box box-solid">
					<div class="box-header with-border">
					  <h3 class="box-title">Pastas</h3>

					  <div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					  </div>
					</div>
					<div class="box-body no-padding">
					  <ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="sys_mailbox.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-inbox"></i> Caixa de entrada</a></li>	
						<li><a href="sys_mail_naolidos.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-envelope-square"></i> N&atilde;o Lidos
							<?php if($td==1 ): ?>
								<span class="label label-primary pull-right"><?=$rs->linhas;?></span></a></li>		
							<?php endif; ?>	
						<li><a href="sys_mail_enviados.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-envelope-o"></i> Enviados</a></li>				  
						</a></li>
					   <!-- <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>-->
						</li>
						<!--<li><a href="sys_mail_excluidos.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-trash-o"></i> Lixeira</a></li>-->
					  </ul>
					</div>
					<!-- /.box-body -->
				  </div>
				  <!-- /. box -->
				   <!--<div class="box box-solid">
					<div class="box-header with-border">
					  <h3 class="box-title">Labels</h3>

					  <div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					  </div>
					</div>
					<div class="box-body no-padding">
					 <ul class="nav nav-pills nav-stacked">
						<li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
						<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
						<li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
					  </ul>
					</div>
				  </div>-->
					<!-- /.box-body -->
				  <!-- /.box -->
				</div>
				<!-- /.col -->
				<div class="col-md-9">
					<div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Caixa de entrada</h3>
						  <div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-ninus"></i></button>   
						  </div>
						  <!-- /.box-tools -->
						</div>
						<!-- /.box-header -->
						<div class="box-body">
							
							<div class="table-responsive mailbox-messages">
								<table id="manutencao" class="table table-hover table-striped">
								<thead>
									<tr>
										<th>Chec:</th>
										<th>Star</th> 
										<th>Empresa</th> 
										<th>Departamento</th> 
										<th>Remetente</th> 
										<th>Assunto</th> 										
										<th>Status</th>
										<th>Data</th>
										
								  </tr>
												</thead>
								  <tbody>
								  <?php
									require_once("sys_tbMail.php");
									
								   ?>
								  </tbody>
								</table>
								<!-- /.table -->
							</div>
							<!-- /.mail-box-messages -->
						</div>
						<!-- /.box-body -->						
					</div>
					<!-- /. box -->
				</div>
				<!-- /.col -->		  
			</div>
			<!-- /.rol -->		
		</section>
		<!-- /.content -->
    </div>
  <!-- /.content-wrapper -->
	<?php
		require_once("../config/footer.php");	
	?> 
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?=$hosted;?>/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
<!-- iCheck -->
<script src="<?=$hosted;?>/dashboard/assets/plugins/iCheck/icheck.min.js"></script>
<!-- Page Script -->
<!--datatables-->
<script src="<?=$hosted;?>/dashboard/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=$hosted;?>/dashboard/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
		$(function () {
		$('#manutencao').DataTable({
		"columnDefs": [{
		"defaultContent": "-",
		"targets": "_all"
	}],
	language :{
	    "sEmptyTable": "Nenhum registro encontrado",
	    "sInfo": "Mostrando de _START_ at&eacute; _END_ de _TOTAL_ registros",  
	    "sInfoEmpty": "Mostrando 0 at&eacute; 0 de 0 registros",
	    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
	    "sInfoPostFix": "",
	    "sInfoThousands": ".",
	    "sLengthMenu": "_MENU_ resultados por p&aacute;gina",
	    "sLoadingRecords": "Carregando...",
	    "sProcessing": "Processando...",
	    "sZeroRecords": "Nenhum registro encontrado",
	    "sSearch": "Pesquisar",
	    "oPaginate": {
	        "sNext": "Pr&oacute;ximo",
	        "sPrevious": "Anterior", 
	        "sFirst": "Primeiro",
	        "sLast": "&Uacute;ltimo"   
	    },
	    "oAria": {
	        "sSortAscending": ": Ordenar colunas de forma ascendente",
	        "sSortDescending": ": Ordenar colunas de forma descendente"
	    }
	}
	});
		});
	
		
	</script>	
<script>
  $(function () {
    //Enable iCheck plugin for checkboxes
    //iCheck for checkbox and radio inputs
    $('.mailbox-messages input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $(".mailbox-messages input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });

    //Handle starring for glyphicon and font awesome
    $(".mailbox-star").click(function (e) {
      e.preventDefault();
      //detect type
      var $this = $(this).find("a > i");
      var glyph = $this.hasClass("glyphicon");
      var fa = $this.hasClass("fa");

      //Switch states
      if (glyph) {
        $this.toggleClass("glyphicon-star");
        $this.toggleClass("glyphicon-star-empty");
      }

      if (fa) {
        $this.toggleClass("fa-star");
        $this.toggleClass("fa-star-o");
      }
    });
  });
</script>
<!-- AdminLTE for demo purposes -->
<script src="<?=$hosted;?>/dashboard/assets/dist/js/demo.js"></script>
</body>
</html>
