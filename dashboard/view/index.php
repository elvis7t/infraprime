<?php
$sess = "HOME";
$pag = "home.php";
require_once("../config/valida.php");
require_once("../config/main.php");
require_once("../config/mnutop.php");
require_once("../config/menu.php");
require_once("../config/modals.php");
require_once("../class/class.functions.php");
require_once("../controller/acao_graficos.php");
require_once("../model/recordset.php");
$fn = new functions();
?>
    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1> 
            Dashboard
            <small>Painel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>
		<?php
		if($_SESSION['usu_classe']==3): // A partir de usuário, vê  ?>
		    <!-- Main content -->
        <section class="content">       
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">          
              <div class="info-box"> 
                <span class="info-box-icon bg-aqua"><i class="fa fa-desktop"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">M&aacute;quinas</span>
				  <span class="info-box-text">da <?=$empresas;?></span>
                  <span class="info-box-number"><?=$maquinaslocal?></span>     
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
			  
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-keyboard-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Equipamentos</span>
				  <span class="info-box-text">da <?=$empresas;?></span>
                  <span class="info-box-number"><?=$equipamentoslocal?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
			
			
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-wrench"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Atendimentos</span>
				  <span class="info-box-text">do <?= $_SESSION['nome_usu']; ?></span>
                  <span class="info-box-number"><?=$atendimentos?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->     
			
			
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Usu&aacute;rios Ativos</span>
                  <span class="info-box-text">da <?=$empresas;?></span>
                  <span class="info-box-number"><?=$usuarioslocal?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            
                      

            <div class="col-md-4">
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-bullhorn"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Solicita&ccedil;&oacute;es</span>
				  <span class="info-box-number"><?=$soliclocal?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div> 
                  <span class="progress-description">
                   <?=$empresas;?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div><!-- /.info-box -->
			   <div class="col-md-4">    
			    
              <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-recycle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Equipamentos Descartados</span>
                  <span class="info-box-number"><?=$eqdescartelocal?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                    <?=$empresas;?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			  </div><!-- /.info-box -->
			   <div class="col-md-4"> 
			 
              <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-recycle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">M&aacute;quinas Descartadas</span>
                  <span class="info-box-number"><?=$mqdescartelocal?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                    <?=$empresas;?>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div><!-- /.info-box -->
              </div><!-- /.info-box --> 
			  
			<div class="row">
			   
			   
			  
			   	<div class="col-md-3">
					<div class="small-box bg-aqua">
					<div class="inner">
					<h3><?=$monitorlocal?></h3>

					<p>Monitores de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-desktop"></i>   
					</div>
					<a href="http://localhost/dashboard/view/at_monitoreslocais.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				</div> 
				
			   	<div class="col-md-3">
					<div class="small-box bg-green">
					<div class="inner">
					<h3><?=$mouselocal?></h3>

					<p>Mouses de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-mouse-pointer"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_mouseslocais.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				</div> 
					
				
				
			   	<div class="col-md-3">
					<div class="small-box bg-yellow">
					<div class="inner">
					<h3><?=$tecladolocal?></h3>

					<p>Teclados de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-keyboard-o"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_tecladoslocais.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div> 
		 
		 		 				
			   	<div class="col-md-3">
					<div class="small-box bg-blue">
					<div class="inner">
					<h3><?=$maquinalocal?></h3>

					<p>M&aacute;quinas de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-laptop"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_maquinasreservalocal.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div> 
				
				</div><!-- /.info-box -->
			  
			<div class="row">
			
			   	<div class="col-md-6">
					<div class="small-box bg-red">
					<div class="inner">
					<h3><?=$manmqlocal?></h3>

					<p>M&aacute;quinas em Manuten&ccedil;&atilde;o</p>
					</div>
					<div class="icon">
						<i class="fa fa-laptop"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_mqmanutencaolocal.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div>

				
			   	<div class="col-md-6">
				
				
					<div class="small-box bg-red">
					<div class="inner">
					<h3><?=$maneqlocal?></h3>

					<p>Equipamentos em Manuten&ccedil;&atilde;o</p>
					</div>
					<div class="icon">
						<i class="fa fa-print"></i>  
					</div>
					<a href="http://localhost/dashboard/view/at_eqmanutencaolocale.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div>
			
			</div><!-- /.info-box -->
			  
			<div class="row">
			
<!-------------------------------------Fim do IF-->	<?php endif; ?><!--                  Fim do IF-->
				
				<?php
		if($_SESSION['usu_classe']<=2): // A partir de ADM, vê  ?>
		 <!-- Main content -->
        <section class="content">       
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">          
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-desktop"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">M&aacute;quinas</span>
				  <span class="info-box-text">Ativas</span>
                  <span class="info-box-number"><?=$maquinas?></span>     
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
			
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-keyboard-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Equipamentos</span>
				  <span class="info-box-text">Ativos</span>
                  <span class="info-box-number"><?=$equipamentos?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
			
			 
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-wrench"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Atendimentos</span>
				  <span class="info-box-text">do <?= $_SESSION['nome_usu']; ?></span>
                  <span class="info-box-number"><?=$atendimentos?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->     
			
			
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Usu&aacute;rios</span>
                  <span class="info-box-text">Ativos</span>
                  <span class="info-box-number"><?=$usuarios?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            
                       

            <div class="col-md-3">
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-bullhorn"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Solicita&ccedil;&oacute;es</span>
                  <span class="info-box-number"><?=$solic?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                    Totais
                  </span>
                </div><!-- /.info-box-content -->  
              </div><!-- /.info-box -->
              </div><!-- /.info-box -->
			   <div class="col-md-3">     
			   
              <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-recycle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Descarte</span>
                  <span class="info-box-number"><?=$descartetotal?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width:100%"></div>
                  </div>
                  <span class="progress-description">
                    Total
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			  </div><!-- /.info-box -->
			  
			  
			  
			  <div class="col-md-3"> 
				
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-usd"></i></span> 
                <div class="info-box-content">
                  <span class="info-box-text">Valor dos Ativos</span>
                  <span class="info-box-number"><?=$fn->formata_din($valortotal);?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width:100%"></div>
                  </div>
                  <span class="progress-description"> 
                   Total
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div><!-- /.info-box -->
              
			  
			  
			   	<div class="col-md-3">
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="fa fa-windows"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Windows XP</span>
				  <span class="info-box-number"><?=$xp;?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: <?=$xp;?>%"></div>
                  </div> 
                  <span class="progress-description">
                   Total 
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div><!-- /.info-box --> 
			  </div><!-- /.info-box -->
			  <div class="row">
			   
			   
			  
			   	<div class="col-md-3">
					<div class="small-box bg-aqua">
					<div class="inner">
					<h3><?=$monitorre?></h3>

					<p>Monitores de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-desktop"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_monitores.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				</div> 

			   	<div class="col-md-3">
					<div class="small-box bg-green">
					<div class="inner">
					<h3><?=$mousere?></h3>

					<p>Mouses de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-mouse-pointer"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_mouses.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				</div> 
				
				
			   	<div class="col-md-3">
					<div class="small-box bg-yellow">
					<div class="inner">
					<h3><?=$tecladore?></h3>

					<p>Teclados de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-keyboard-o"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_teclados.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div> 
		   
				<div class="col-md-3">
					<div class="small-box bg-purple">
					<div class="inner">
					<h3><?=$radiore?></h3> 

					<p>Celulares de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-mobile"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_radios.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				</div> 
				</div><!-- /.info-box -->
			  
			<div class="row">
		 		 
			   	<div class="col-md-3">
					<div class="small-box bg-blue">
					<div class="inner">
					<h3><?=$maquinare?></h3>

					<p>M&aacute;quinas de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-laptop"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_maquinasreserva.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div> 
				
				<div class="col-md-3">
					<div class="small-box bg-gray">
					<div class="inner"> 
					<h3><?=$telefonere?></h3>

					<p>Telefones de Reserva</p>
					</div>
					<div class="icon">
						<i class="glyphicon glyphicon-phone-alt"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_telefones.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div> 
			
			  
			   	<div class="col-md-3">
					<div class="small-box bg-red">
					<div class="inner">
					<h3><?=$manmq?></h3>

					<p>M&aacute;quinas em Manuten&ccedil;&atilde;o</p>
					</div>
					<div class="icon">
						<i class="fa fa-laptop"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_mqmanutencao.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div>

				
			   	<div class="col-md-3">
				
				
					<div class="small-box bg-red">
					<div class="inner">
					<h3><?=$maneq?></h3>

					<p>Equipamentos em Manuten&ccedil;&atilde;o</p>
					</div>
					<div class="icon">
						<i class="fa fa-print"></i>  
					</div>
					<a href="http://localhost/dashboard/view/at_eqmanutencaoe.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div>
				<!--///////////////////  Arquivo que envia os emails  \\\\\\\\\\\\\\\\\-->
				<div class="row">
					<div class="modal" id="cadastrar">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title"><?php  require_once("../view/URat_mailSender.php");?></h4>
								</div>
								<div class="modal-body">
									<i class="fa fa-cog fa-spin"></i>
									<p>Processando...</p>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				
				  </div>
				</div><!-- /.info-box --> 
			  
			<div class="row">			   
 	<?php endif; ?> <!-- ADM-->
	
	<?php
		if($_SESSION['usu_classe']==4): // A partir de GESTOR, vê  ?> 
		 <!-- Main content -->
        <section class="content">       
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">          
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-desktop"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">M&aacute;quinas</span>
				  <span class="info-box-text">Ativas</span>
                  <span class="info-box-number"><?=$maquinas?></span>     
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
			
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-blue"><i class="fa fa-keyboard-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Equipamentos</span>
				  <span class="info-box-text">Ativos</span>
                  <span class="info-box-number"><?=$equipamentos?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
			
			 
            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-wrench"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Atendimentos</span>
				  <span class="info-box-text">Totais</span>
                  <span class="info-box-number"><?=$atendimentostotais?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->     
			
			
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Usu&aacute;rios</span>
                  <span class="info-box-text">Ativos</span>
                  <span class="info-box-number"><?=$usuarios?></span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            
                       

            <div class="col-md-3">
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa fa-bullhorn"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Solicita&ccedil;&oacute;es</span>
                  <span class="info-box-number"><?=$solic?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                    Totais
                  </span>
                </div><!-- /.info-box-content -->  
              </div><!-- /.info-box -->
              </div><!-- /.info-box -->
			   <div class="col-md-3">     
			   
              <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="fa fa-recycle"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Descarte</span>
                  <span class="info-box-number"><?=$descartetotal?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width:100%"></div>
                  </div>
                  <span class="progress-description">
                    Total
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
			  </div><!-- /.info-box -->
			  
			  
			  
			  <div class="col-md-3"> 
				
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-usd"></i></span> 
                <div class="info-box-content">
                  <span class="info-box-text">Valor dos Ativos</span>
                  <span class="info-box-number"><?=$fn->formata_din($valortotal);?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width:100%"></div>
                  </div>
                  <span class="progress-description"> 
                   Total
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div><!-- /.info-box -->
              
			  
			  
			   	<div class="col-md-3">
              <!-- Info Boxes Style 2 -->
              <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="fa fa-windows"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Windows XP</span>
				  <span class="info-box-number"><?=$xp;?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: <?=$xp;?>%"></div>
                  </div> 
                  <span class="progress-description">
                   Total 
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
              </div><!-- /.info-box --> 
			  </div><!-- /.info-box -->
			  <div class="row">
			   
			   
			  
			   	<div class="col-md-3">
					<div class="small-box bg-aqua">
					<div class="inner">
					<h3><?=$monitorre?></h3>

					<p>Monitores de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-desktop"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_monitores.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				</div> 

			   	<div class="col-md-3">
					<div class="small-box bg-green">
					<div class="inner">
					<h3><?=$mousere?></h3>

					<p>Mouses de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-mouse-pointer"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_mouses.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				</div> 
				
				
			   	<div class="col-md-3">
					<div class="small-box bg-yellow">
					<div class="inner">
					<h3><?=$tecladore?></h3>

					<p>Teclados de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-keyboard-o"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_teclados.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div> 
		   
				<div class="col-md-3">
					<div class="small-box bg-purple">
					<div class="inner">
					<h3><?=$radiore?></h3> 

					<p>R&aacute;dios de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-mobile"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_radios.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a>
				</div>
				</div> 
				</div><!-- /.info-box -->
			  
			<div class="row">
		 		 
			   	<div class="col-md-3">
					<div class="small-box bg-blue">
					<div class="inner">
					<h3><?=$maquinare?></h3>

					<p>M&aacute;quinas de Reserva</p>
					</div>
					<div class="icon">
						<i class="fa fa-laptop"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_maquinasreserva.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div> 
				
				<div class="col-md-3">
					<div class="small-box bg-gray">
					<div class="inner"> 
					<h3><?=$telefonere?></h3>

					<p>Telefones de Reserva</p>
					</div>
					<div class="icon">
						<i class="glyphicon glyphicon-phone-alt"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_telefones.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div> 
			
			  
			   	<div class="col-md-3">
					<div class="small-box bg-red">
					<div class="inner">
					<h3><?=$manmq?></h3>

					<p>M&aacute;quinas em Manuten&ccedil;&atilde;o</p>
					</div>
					<div class="icon">
						<i class="fa fa-laptop"></i> 
					</div>
					<a href="http://localhost/dashboard/view/at_mqmanutencao.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div>

				
			   	<div class="col-md-3">
				
				
					<div class="small-box bg-red">
					<div class="inner">
					<h3><?=$maneq?></h3>

					<p>Equipamentos em Manuten&ccedil;&atilde;o</p>
					</div>
					<div class="icon">
						<i class="fa fa-print"></i>  
					</div>
					<a href="http://localhost/dashboard/view/at_eqmanutencaoe.php?token=<?=$_SESSION['token'];?>" class="small-box-footer"> <i class="fa fa-arrow-circle-right"></i></a> 
				</div>
				</div>
				<!--///////////////////  Arquivo que envia os emails  \\\\\\\\\\\\\\\\\-->
				<div class="row">
					<div class="modal" id="cadastrar">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title"><?php  require_once("../view/URat_mailSender.php");?></h4>
								</div>
								<div class="modal-body">
									<i class="fa fa-cog fa-spin"></i>
									<p>Processando...</p>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				
				  </div>
				</div><!-- /.info-box --> 
			  
			<div class="row">			   
 	<?php endif; ?>  
        </section><!-- /.content -->
   <!-- /.box -->
     </div><!-- /.content-wrapper -->

	  
	  <?php 
        require_once("../config/footer.php");
        //require_once("../config/side.php"); 
      ?>
      <div class="control-sidebar-bg"></div>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="http://localhost/dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="http://localhost/dashboard/assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="http://localhost/dashboard/assets/plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="http://localhost/dashboard/assets/dist/js/app.min.js"></script>
    <!-- Sparkline -->
    <script src="http://localhost/dashboard/assets/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="http://localhost/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="http://localhost/dashboard/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="http://localhost/dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="http://localhost/dashboard/assets/plugins/chartjs/Chart.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="http://localhost/dashboard/assets/plugins/morris/morris.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
   <!-- <script src="http://localhost/dashboard/assets/dist/js/pages/dashboard2.js"></script>-->
    <!-- AdminLTE for demo purposes -->
    <script src="http://localhost/dashboard/assets/dist/js/demo.js"></script>
	
	
  </body>
</html>
 