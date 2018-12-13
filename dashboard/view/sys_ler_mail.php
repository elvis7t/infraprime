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
$mail_Id=$_GET['mail_Id'];
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
							<li><a href="sys_mailbox.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-inbox"></i> Caixa de entrada</a></li>	
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
					<?php
  					    $sql="SELECT * FROM sys_mail  a
								JOIN at_empresas       b ON a.mail_envio_usuempId  = b.emp_id 
								JOIN at_departamentos  c ON a.mail_envio_usudpId   = c.dp_id 
								JOIN sys_usuarios      d ON a.mail_envio_usuId     = d.usu_cod
								JOIN sys_mail_status   e ON a.mail_statusId  = e.status_Id	  
							WHERE mail_Id=".$mail_Id;
							$rs->FreeSql($sql);
							$rs->GeraDados();
							$status = $rs->fld("mail_statusId");
							$mail_envio_usuId = $rs->fld("mail_envio_usuId");
							$usu = $_SESSION['usu_cod'];
					?>
					<div class="box box-primary">
						<div class="box-header with-border">
						  <h3 class="box-title">Ler Mensagem</h3>

						  <div class="box-tools pull-right">
							<a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Previous"><i class="fa fa-chevron-left"></i></a>
							<a href="#" class="btn btn-box-tool" data-toggle="tooltip" title="Next"><i class="fa fa-chevron-right"></i></a>
						  </div>
						</div>
						<!-- /.box-header -->
						<form role="form" id="Ler"> 
							<div class="box-body no-padding">
							  <div class="mailbox-read-info">					
								<h5>De <?=$rs->fld("usu_nome");?>
								  <span class="mailbox-read-time pull-right"><?=$fn->data_hbr($rs->fld("mail_data"));?></span></h5>
							  </div>
							  <div class="mailbox-read-info">
								<?php							
										$sql="SELECT * FROM sys_mail  a
										JOIN sys_usuarios      d ON a.mail_destino_usuId     = d.usu_cod							 
										WHERE mail_Id=".$mail_Id;
										$rs->FreeSql($sql);
									$rs->GeraDados();
									
								?>				  
								<h5>Para <?=$rs->fld("usu_nome");?></h5>
							  </div>
							   <div class="mailbox-read-info">
								<h3><?=$rs->fld("mail_assunto");?></h3>					
							  </div>
							  <!-- /.mailbox-read-info -->
							  <div class="mailbox-controls with-border text-center">
								
								<!--<div class="btn-group">
								  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
									<i class="fa fa-trash-o"></i></button>
								  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
									<i class="fa fa-reply"></i></button>
								  <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
									<i class="fa fa-share"></i></button>
								</div>
								<!-- /.btn-group -->
								<!--<button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
								  <i class="fa fa-print"></i></button>-->
							  </div>
							  <input type="hidden" value="<?=$_SESSION['token'];?>" name="token" id="token">
							  <input type="hidden" value="<?=$rs->fld("mail_Id");?>" name="mail_Id" id="mail_Id">
							  <!-- /.mailbox-controls -->
							  <div class="mailbox-read-message">
							   <?=$rs->fld("mail_mensagem");?>
							  </div>
							  <!-- /.mailbox-read-message -->
							</div>
							<!-- /.box-body -->
							<div class="box-footer">
							  <!--<ul class="mailbox-attachments clearfix">
								<li>
								  <span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span>

								  <div class="mailbox-attachment-info">
									<a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> Sep2014-report.pdf</a>
										<span class="mailbox-attachment-size">
										  1,245 KB
										  <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
										</span>
								  </div>
								</li>
								<li>
								  <span class="mailbox-attachment-icon"><i class="fa fa-file-word-o"></i></span>

								  <div class="mailbox-attachment-info">
									<a href="#" class="mailbox-attachment-name"><i class="fa fa-paperclip"></i> App Description.docx</a>
										<span class="mailbox-attachment-size">
										  1,245 KB
										  <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
										</span>
								  </div>
								</li>
								<li>
								  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo1.png" alt="Attachment"></span>

								  <div class="mailbox-attachment-info">
									<a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo1.png</a>
										<span class="mailbox-attachment-size">
										  2.67 MB
										  <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
										</span>
								  </div>
								</li>
								<li>
								  <span class="mailbox-attachment-icon has-img"><img src="../../dist/img/photo2.png" alt="Attachment"></span>

								  <div class="mailbox-attachment-info">
									<a href="#" class="mailbox-attachment-name"><i class="fa fa-camera"></i> photo2.png</a>
										<span class="mailbox-attachment-size">
										  1.9 MB
										  <a href="#" class="btn btn-default btn-xs pull-right"><i class="fa fa-cloud-download"></i></a>
										</span>
								  </div>
								</li>
							  </ul>-->
							</div>
							<!-- /.box-footer -->
							<div class="box-footer">
							  <div class="pull-right">
								<button type="button" class="btn btn-default"><i class="fa fa-reply"></i> Reply</button>
								<button type="button" class="btn btn-default"><i class="fa fa-share"></i> Forward</button>
							  </div>
							  <button type="button" class="btn btn-default"><i class="fa fa-trash-o"></i> Delete</button>
								<?php if($status==1 ): ?>
							  <button id="btn_Lermsn" class="btn btn-primary" type="submit"><i class="fa fa-eye"></i> Marcar como lido</button>
								<?php endif;?>
							</div>
						</form>
						<!-- /.box-footer -->			  
					</div>
					<!-- /.col -->
				</div>
				<!-- /.content -->
			</div>
		</section>
    </div>
  <!-- /.content-wrapper -->
  <?php
	require_once("../config/footer.php");	
  ?> 
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="http://localhost/infraprime/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="http://localhost/infraprime/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="http://localhost/infraprime/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://localhost/infraprime/dashboard/assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://localhost/infraprime/dashboard/assets/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://localhost/infraprime/dashboard/assets/dist/js/demo.js"></script>
<script src="http://localhost/infraprime/dashboard/js/action_usuarios.js"></script>  <!--Chama o java script -->
<!-- iCheck -->
<script src="http://localhost/infraprime/dashboard/assets/plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="http://localhost/infraprime/dashboard/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<!-- SELECT2 TO FORMS --> 
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

</body>
</html>
