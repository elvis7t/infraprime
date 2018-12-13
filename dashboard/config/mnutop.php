<!-- <body class="hold-transition skin-blue sidebar-mini fixed">-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
	
	$logotipo = $_SESSION['logo'];
		//session_start();
		require_once("../model/recordset.php");
		require_once("../class/class.functions.php");
		$fn = new functions();
		$rs = new recordset();

	
	/*	
session_start();
if($sess=="HOME"){require_once("model/recordset.php");}
else{require_once("../model/recordset.php");}
$rs = new recordset();
$rs->Seleciona("sys_dominio","sys_sistema","sys_nome = 'gigafox'");
$rs->GeraDados();
*/
?>
	<header class="main-header"> 

        <!-- Logo -->
        <a href="http://localhost/infraprime/dashboard/view/index.php?token=<?=$_SESSION['token'];?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><img src="http://localhost/infraprime/dashboard/<?=$_SESSION['logo'];?>" width="50"></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><img src="http://localhost/infraprime/dashboard/<?=$_SESSION['logo'];?>" width="50"></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
		  
				<ul class="nav navbar-nav">
					<?php
					require_once("../config/alert_msgs.php");
					?>
					<!-- User Account: style can be found in dropdown.less -->
					<li class="dropdown user user-menu">
						<?php  if(!isset($_SESSION['nome_usu'])):?>
							<a href="http://localhost/infraprime/dashboard/view/login.php">
						<?php  else :?>
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="http://localhost/infraprime/dashboard/<?=$_SESSION['usu_foto'];?>" class="user-image" alt="User Image">
								<?php  endif;?>
								<span class="hidden-xs"><?=(isset($_SESSION['nome_usu'])? $_SESSION['nome_usu'] :'Login');?></span>
							</a>
								<?php  if(isset($_SESSION["nome_usu"])):?>
						<ul class="dropdown-menu">
							<!-- User image -->
							<li class="user-header">
								<img src="http://localhost/infraprime/dashboard/<?=$_SESSION["usu_foto"];?>" class="img-circle" alt="User Image">
								<p>
								<?=$_SESSION['nome_usu'];?>
									<small><?=$_SESSION['usuario'];?></small>
								</p>
							</li>										  
								 <!-- Menu Footer-->
							<li class="user-footer">								
								<div class="pull-left">
								  <a href="http://localhost/infraprime/dashboard/view/sys_user_perfil.php?token=<?=$_SESSION['token'];?>&usuario=<?=$_SESSION['usu_cod'];?>" class="btn btn-default btn-flat">Perfil</a>
								</div>
								<div class="pull-right">
								  <a href="http://localhost/infraprime/dashboard/view/logout.php" class="btn btn-default btn-flat">Sair</a>
								</div>
							</li>
						</ul>
						<?php  endif;?>
					</li>
					 <!-- Control Sidebar Toggle Button -->
					<li>
						<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
					</li>
				</ul>
         	</div>
        </nav>
    </header>
  