<?php
$token = (isset($_SESSION['token'])? "?token=".$_SESSION['token']:"");
require_once("link.php");
?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
		<!-- Sidebar user panel -->
		<?php if(isset($_SESSION["nome_usu"])):?> 
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?=$hosted;?>/dashboard<?=$_SESSION["usu_foto"]; ?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?= $_SESSION['nome_usu']; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
		<?php else:?><div></div><?php endif;?>
		
		<?php if(isset($_SESSION["ec_nome_usu"])):?>
			<div class="user-panel">
				<div class="pull-left image">
					<img src="<?=$hosted;?>/dashboard<?=$_SESSION["ec_usu_foto"]; ?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?=$_SESSION['ec_nome_usu']; ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
				</div>
			</div>
		<?php else:?><div></div><?php endif;?>
		<!-- search form -->
			<form action="#" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button> 
				  </span>
				</div>
			</form>
		  <!-- /.search form -->
		  
		  <!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="header">MENU PRINCIPAL</li>
					<li class=" treeview <?=($sess =="DASH"?"active":"");?>" >
						<a href='#'>
						  <i class="fa fa-dashboard"></i><span>DashBoard</span>
						</a>  
						  <ul class="treeview-menu">
						  <?php if($_SESSION['usu_classe']<=2): // A partir de usuário, vê  ?>						  
						  <li class="<?=($pag == "at_dashboard_servidor.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_dashboard_servidor.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
						   <?php endif; ?>
						  </ul>
					</li> 
					
			  <?php if($_SESSION['usu_classe']==1): // A partir do Administrador?>
				<li class="treeview <?=($sess =="USU"?"active":"");?>">
					<a href="#">
						<i class="fa fa-gears"></i> <span>Sistema</span>							 	
					</a>
						<ul class="treeview-menu">  
							<li class="<?=($pag == "at_empresas.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_empresas.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-building"></i> Empresas</a></li>  
							<li class="<?=($pag == "sys_usuarios.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/sys_usuarios.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-group"></i> Usu&aacute;rios</a></li> 
							<li class="<?=($pag == "sys_vis_usu_logado.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/sys_vis_usu_logado.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-user-circle-o"></i> Usu&aacute;rios Logados</a></li> 
						</ul>   
				</li>					
			  <?php endif; ?>  

			  <?php if($_SESSION['usu_classe']<=2): // A partir de usuário, vê  ?>
					
				<li class="treeview <?=($sess =="COM"?"active":"");?>">
					<a href="#">
						<i class="glyphicon glyphicon-shopping-cart"></i>
						<span>Compras Infra</span>						
					</a>
					<ul class="treeview-menu">
						<li class="<?=($pag == "at_compras.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_compras.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-cart-arrow-down"></i>Solicita&ccedil;&otilde;es</a></li>  
						<li class="<?=($pag == "at_compras_fin.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_compras_fin.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-cart-arrow-down"></i>Finalizadas  <i class="fa fa-thumbs-o-up"></i></a></li>  
					</ul>
				</li> 
					
				<li class="treeview <?=($sess =="GRA"?"active":"");?>">
					<a href="#">
						<i class="fa fa-bar-chart-o"></i>
						<span>Business Intelligence</span>						
					</a>
					<ul class="treeview-menu">
						<li class="<?=($pag == "at_grafico_maquinas.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_maquinas.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>M&aacute;quinas</a></li>  
						<li class="<?=($pag == "at_grafico_maquinas_ano.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_maquinas_ano.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>M&aacute;quinas por ano</a></li>  
						<li class="<?=($pag == "at_grafico_maquinas_garantia.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_maquinas_garantia.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>M&aacute;quinas por garantia</a></li>  
						<li class="<?=($pag == "at_graficos_equipamentos.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_graficos_equipamentos.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Equipamentos</a></li>  
						<li class="<?=($pag == "at_grafico_prestadoras.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_prestadoras.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Prestadoras</a></li>  
						<li class="<?=($pag == "at_grafico_man_emp.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_man_emp.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Manuten&ccedil;&atilde;o</a></li>  
						<li class="<?=($pag == "at_grafico_os.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_os.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Sis Operacional</a></li>  								
					</ul>
				</li>  
					
				<li class="treeview <?=($sess =="REL"?"active":"");?>">
					<a href="#">
						<i class="fa fa-file-text"></i>
						<span>Relat&oacute;rios</span> 						
					</a> 
					<ul class="treeview-menu"> 
						<li class="<?=($pag == "at_relatorio_Servidor.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_Servidor.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Servidores Ativos</a></li>    
						<li class="<?=($pag == "at_relatorioMq.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioMq.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>M&aacute;quinas Ativas</a></li>    
						<li class="<?=($pag == "at_relatorioMq_total.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioMq_total.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>M&aacute;quinas Ativas totais</a></li>    
						<li class="<?=($pag == "at_relatorioMq_reserva.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioMq_reserva.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>M&aacute;quinas Reserva</a></li>    						
						<li class="<?=($pag == "at_relatorioEq.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioEq.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Equipamentos Ativos</a></li>  
						<li class="<?=($pag == "at_relatorioMq_Qrcode.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioMq_Qrcode.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>M&aacute;quinas Qrcode</a></li>  
						<li class="<?=($pag == "at_relatorioEq_Qrcode.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioEq_Qrcode.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Equipamentos Qrcode</a></li>  
						<li class="<?=($pag == "at_relatorio_mqDescarte.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_mqDescarte.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>M&aacute;quinas Descartadas</a></li>  
						<li class="<?=($pag == "at_relatorio_eqDescarte.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_eqDescarte.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Equipamentos Descartados</a></li>  
						<li class="<?=($pag == "at_relatorio_at_empresa.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_at_empresa.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Ativos por Empresa</a></li>  
						<li class="<?=($pag == "at_relatorio_manutencao.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_manutencao.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Manuten&ccedil;&atilde;o por Prestadora</a></li>  
						<li class="<?=($pag == "at_relatorio_emprestimo.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_emprestimo.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Emprestimo de Equipamentos</a></li>  
						<li class="<?=($pag == "at_relatorio_solicitacao.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_solicitacao.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Solicita&ccedil;&atilde;o de Equipamentos</a></li>  
						<li class="<?=($pag == "at_relatorio_solicitacao_usuario.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_solicitacao_usuario.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Solicita&ccedil;&atilde;o por Usu&aacute;rio</a></li>  
						<li class="<?=($pag == "at_relatorio_compras.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_compras.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Compras TI em aberto</a></li>  
						<li class="<?=($pag == "at_relatorio_comprasfin.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_comprasfin.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Compras TI Finalizadas</a></li>  
						<li class="<?=($pag == "at_relatorio_telefonia.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_telefonia.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Telefonia</a></li>  
						<li class="<?=($pag == "at_relatorio_doacao.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_doacao.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Doa&ccedil;&otilde;es</a></li>  					 
					</ul> 
				</li> 
					 
				<li class="treeview <?=($sess =="ATIVO"?"active":"");?>" >
					<a href="#"> 
						<i class="fa fa-sitemap"></i> <span>Ativos</span>                    
					</a>    
					<ul class="treeview-menu">    
						<li class="<?=($pag == "at_maquina_usuario.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_maquina_usuario.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-laptop"></i> <i class="fa fa-user"></i>Dados</a></li>  
						<li class="<?=($pag == "at_maquinas.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_maquinas.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-desktop"></i>M&aacute;quinas</a></li> 
						<li class="<?=($pag == "at_equipamentos.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_equipamentos.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-keyboard-o"></i>Equipamentos</a></li>
						<li class="<?=($pag == "at_usuarios.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_usuarios.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-group"></i> Usu&aacute;rios</a></li>
						<li class="<?=($pag == "at_servidor.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_servidor.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-server"></i> Servidores</a></li>
						<li class="<?=($pag == "at_servico.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_servico.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-cog"></i> Servi&ccedil;os</a></li>
						<li class="<?=($pag == "at_chips.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_chips.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-ticket "></i>Chips</a></li>
						<li class="<?=($pag == "at_departamentos.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_departamentos.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-tasks"></i>Departamentos</a></li>
						<li class="<?=($pag == "at_emprestimo.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_emprestimo.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-retweet"></i>Emprestimo</a></li>
						<li class="<?=($pag == "at_eqsolicitacao.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_eqsolicitacao.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-bullhorn"></i>Solicita&ccedil;&atilde;o</a></li>
						<li class="<?=($pag == "at_eqmanutencao.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_eqmanutencao.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-exclamation-triangle" ></i>Manuten&ccedil;&atilde;o</a></li>
						<li class="<?=($pag == "at_eqtipo.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_eqtipo.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-print"></i>Tipo</a></li>
						<li class="<?=($pag == "at_eqmarca.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_eqmarca.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-android"></i>Marca</a></li>   
						<li class="<?=($pag == "at_prestadoras.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_prestadoras.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-briefcase"></i> Prestadoras</a></li>
						<li class="<?=($pag == "at_instituicoes.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_instituicoes.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-bank"></i> Institui&ccedil;&otilde;es</a></li>
						<li class="<?=($pag == "at_mqfabricante.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqfabricante.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-industry"></i>Fabricante</a></li>
						<li class="<?=($pag == "at_mqos.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqos.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-windows"></i>Sistema Operacional</a></li>
						<li class="<?=($pag == "at_mqoffice.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqoffice.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-opera"></i>Office</a></li>  
						<li class="<?=($pag == "at_mqmemoria.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqmemoria.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-microchip"></i>M&eacute;moria</a></li>  
						<li class="<?=($pag == "at_mqhd.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqhd.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-hdd-o"></i>HD</a></li>  
						<li class="<?=($pag == "at_termo_utilizacao.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_termo_utilizacao.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text"></i> Termo de Equipamentos</a></li>
						<li class="<?=($pag == "at_usuarios_desativados.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_usuarios_desativados.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-user-times"></i> Usu&aacute;rios Desativados</a></li>
						<li class="<?=($pag == "at_servidor_desativados.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_servidor_desativados.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-recycle"></i> Servidores Desativados</a></li>
						<li class="<?=($pag == "at_descartes.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_descartes.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-recycle"></i>Descartes</a></li> 
						<li class="<?=($pag == "at_outros.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_outros.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-question-sign"></i>Outros</a></li> 
					</ul>  								
				</li> 
			  <?php endif; ?>

			  <?php if($_SESSION['usu_classe']<=3): // A partir de Cliente, vê ?> 
					
				<li class=" treeview <?=($sess =="MAIL"?"active":"");?>"> <!-- ativa o menu pai -->
					<a href="<?=$hosted;?>/dashboard/view/sys_mailbox.php?token=<?=$_SESSION['token'];?>">
						<i class="fa fa-envelope"></i> <span>Mailbox</span>  
						<span class="pull-right-container">	
						<?php $sql="SELECT * FROM sys_mail 
						WHERE mail_statusId = '1' AND mail_destino_usuId =".$_SESSION['usu_cod'];
								$rs->FreeSql($sql);
								$rs->GeraDados();
								$td = $rs->fld("mail_statusId");
						?>
						<?php if($td==1 ): ?>
						<small class="label pull-right bg-green"><?=$rs->linhas;?></small>	
						<?php endif; ?>							  
						</span>
					</a>
				</li>
				
				<li class="treeview <?=($sess =="EQUIPE"?"active":"");?>" >
					<a href="#">   
						<i class="fa fa-graduation-cap"></i> <span>Equipe de TI</span>                 
					</a>    
					<ul class="treeview-menu">    
						<li class="<?=($pag == "sys_usuarios_dashboard.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/sys_usuarios_dashboard.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-ra"></i>Infra-estrutura</a></li>								
					</ul>  								
				</li>
				  
				<li class="treeview <?=($sess =="GRA_LOCAL"?"active":"");?>">
					<a href="#">
					<i class="fa fa-bar-chart-o"></i>
					<span>B I</span>						   
					</a>
					<ul class="treeview-menu">						
						<li class="<?=($pag == "at_grafico_maquinas_ano_local.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_maquinas_ano_local.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>M&aacute;quinas por ano</a></li>  
						<li class="<?=($pag == "at_grafico_maquinas_garantia_local.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_maquinas_garantia_local.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>M&aacute;quinas por garantia</a></li>  
						<li class="<?=($pag == "at_grafico_prestadoras_local.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_prestadoras_local.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Prestadoras</a></li>  
						<li class="<?=($pag == "at_grafico_os_local.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_os_local.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Sis Operacional</a></li>  
					</ul>  
				</li> 
				  
				<li class="treeview <?=($sess =="ATIVOLOCAL"?"active":"");?>" >
					<a href="#">   
						<i class="fa fa-sitemap"></i> <span>Ativos Locais</span>                 
					</a>    
					<ul class="treeview-menu">    
						<li class="<?=($pag == "at_departamentoslocais.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_departamentoslocais.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-tasks"></i>Departamentos</a></li>
						<li class="<?=($pag == "at_usuarioslocais.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_usuarioslocais.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-group"></i> Usu&aacute;rios</a></li>
						<li class="<?=($pag == "at_eqmarcalocal.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_eqmarcalocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-android"></i>Marca</a></li>  
						<li class="<?=($pag == "at_eqtipolocal.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_eqtipolocal.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-print"></i>Tipo</a></li>
						<li class="<?=($pag == "at_mqfabricantelocal.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqfabricantelocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-industry"></i>Fabricante</a></li>
						<!--<li class="<?=($pag == "at_mqoslocal.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqoslocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-windows"></i>Sistema Operacional</a></li>
						<li class="<?=($pag == "at_mqofficelocal.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqofficelocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-opera"></i>Office</a></li>  
						<li class="<?=($pag == "at_mqmemorialocal.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqmemorialocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-microchip"></i>M&eacute;moria</a></li>
						<li class="<?=($pag == "at_mqhdlocal.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_mqhdlocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-hdd-o"></i>HD</a></li>  -->
						<li class="<?=($pag == "at_maquinaslocais.php"?"active":"" );?>"><a href="<?=$hosted;?>/dashboard/view/at_maquinaslocais.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-desktop"></i>M&aacute;quinas</a></li> 
						<li class="<?=($pag == "at_equipamentoslocais.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_equipamentoslocais.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-keyboard-o"></i>Equipamentos</a></li>
						<li class="<?=($pag == "at_chipslocais.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_chipslocais.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-ticket "></i>Chips</a></li>
						<li class="<?=($pag == "at_termo_utilizacaolocal.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_termo_utilizacaolocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text"></i> Termo de Equipamentos</a></li>
						<li class="<?=($pag == "at_prestadoraslocais.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_prestadoraslocais.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-briefcase"></i> Prestadoras</a></li>
						<li class="<?=($pag == "at_instituicoeslocais.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_instituicoeslocais.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-bank"></i> Institui&ccedil;&otilde;es</a></li>
						<li class="<?=($pag == "at_eqsolicitacaolocal.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_eqsolicitacaolocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-bullhorn"></i>Solicita&ccedil;&atilde;o</a></li>
						<li class="<?=($pag == "at_eqmanutencaolocal.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_eqmanutencaolocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-exclamation-triangle" ></i>Manuten&ccedil;&atilde;o</a></li>
						<li class="<?=($pag == "at_descarteslocais.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_descarteslocais.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-recycle"></i>Descartes</a></li> 
						<li class="<?=($pag == "at_outroslocais.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_outroslocais.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-question-sign"></i>Outros</a></li> 								
					</ul>  								
				</li>
				  
				<li class="treeview <?=($sess =="REL_LOCAL"?"active":"");?>">
					<a href="#">
						<i class="fa fa-file-text"></i>
						<span>Relat&oacute;rios Locais</span> 						
					</a> 
					<ul class="treeview-menu"> 
						<li class="<?=($pag == "at_relatorioMq_Qrcodelocal.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioMq_Qrcodelocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>M&aacute;quinas Qrcode</a></li>  
						<li class="<?=($pag == "at_relatorioEq_Qrcodelocal.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioEq_Qrcodelocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Equipamentos Qrcode</a></li>  	
						<li class="<?=($pag == "at_relatorioMq_local.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioMq_local.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>M&aacute;quinas Ativas</a></li>  
						<li class="<?=($pag == "at_relatorioEq_local.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorioEq_local.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Equipamentos Ativos</a></li>  
						<li class="<?=($pag == "at_relatorio_mqDescarte_local.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_mqDescarte_local.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>M&aacute;quinas Descartadas</a></li>  
						<li class="<?=($pag == "at_relatorio_eqDescarte_local.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_eqDescarte_local.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Equipamentos Descartados</a></li>  
						<li class="<?=($pag == "at_relatorio_eqMan_local.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_eqMan_local.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Manuten&ccedil;&atilde;o de Equipamentos</a></li>  
						<li class="<?=($pag == "at_relatorio_doacaolocal.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/rel/at_relatorio_doacaolocal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-file-text-o"></i>Doa&ccedil;&otilde;es</a></li> 
					</ul>
				</li> 
			  <?php endif; ?>

			  <?php if($_SESSION['usu_classe']==4): // A partir do Gestor, vê  ?>
				 
				<li class=" treeview <?=($sess =="MAIL"?"active":"");?>"> <!-- ativa o menu pai -->
					<a href="<?=$hosted;?>/dashboard/view/sys_mailbox.php?token=<?=$_SESSION['token'];?>">
						<i class="fa fa-envelope"></i> <span>Mailbox</span>  
						<span class="pull-right-container">	
							<?php $sql="SELECT * FROM sys_mail 
							WHERE mail_statusId = '1' AND mail_destino_usuId =".$_SESSION['usu_cod'];
									$rs->FreeSql($sql);
									$rs->GeraDados();
									$td = $rs->fld("mail_statusId");
							?>
							<?php if($td==1 ): ?>
							<small class="label pull-right bg-green"><?=$rs->linhas;?></small>	
							<?php endif; ?>							  
						</span>
					</a>
				</li>	
				
				<li class="treeview <?=($sess =="EQUIPE"?"active":"");?>" >
					<a href="#">   
						<i class="fa fa-graduation-cap"></i> <span>Equipe de TI</span>                 
					</a>    
					<ul class="treeview-menu">    
						<li class="<?=($pag == "sys_usuarios_dashboard.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/sys_usuarios_dashboard.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-ra"></i>Infra-estrutura</a></li>								
					</ul>  								
				</li>
						
				<li class="treeview <?=($sess =="GRA"?"active":"");?>">
					<a href="#">
						<i class="fa fa-bar-chart-o"></i>
						<span>Business Intelligence</span>
					</a>
					<ul class="treeview-menu">
						<li class="<?=($pag == "at_grafico_maquinas.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_maquinas.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>M&aacute;quinas</a></li>  
						<li class="<?=($pag == "at_grafico_maquinas_ano.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_maquinas_ano.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>M&aacute;quinas por ano</a></li>  
						<li class="<?=($pag == "at_grafico_maquinas_garantia.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_maquinas_garantia.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>M&aacute;quinas por garantia</a></li>  
						<li class="<?=($pag == "at_graficos_equipamentos.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_graficos_equipamentos.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Equipamentos</a></li>  
						<li class="<?=($pag == "at_grafico_prestadoras.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_prestadoras.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Prestadoras</a></li>  
						<li class="<?=($pag == "at_grafico_man_emp.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_man_emp.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Manuten&ccedil;&atilde;o</a></li>  
						<li class="<?=($pag == "at_grafico_os.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/gra/at_grafico_os.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-pie-chart"></i>Sis Operacional</a></li>  
					</ul>
				</li>  
			 <?php endif; ?>
			 
			 <?php if($_SESSION['usu_classe']==5): // A partir do Pessoal, vê  ?>
			  	<li class=" treeview <?=($sess =="MAIL"?"active":"");?>"> <!-- ativa o menu pai -->
					<a href="<?=$hosted;?>/dashboard/view/sys_mailbox.php?token=<?=$_SESSION['token'];?>">
						<i class="fa fa-envelope"></i> <span>Mailbox</span>  
						<span class="pull-right-container">	
							<?php $sql="SELECT * FROM sys_mail 
							WHERE mail_statusId = '1' AND mail_destino_usuId =".$_SESSION['usu_cod'];
									$rs->FreeSql($sql);
									$rs->GeraDados();
									$td = $rs->fld("mail_statusId");
							?>
							<?php if($td==1 ): ?>
							<small class="label pull-right bg-green"><?=$rs->linhas;?></small>	
							<?php endif; ?>							  
						</span>
					</a>
				</li>
			  
			    <li class="treeview <?=($sess =="PESSOAL"?"active":"");?>" >
					<a href="#">   
						<i class="fa fa-building"></i> <span>Cadastro </span>                 
					</a>    
					<ul class="treeview-menu">    
						<li class="<?=($pag == "at_departamentos_pessoal.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_departamentos_pessoal.php?token=<?=$_SESSION['token'];?>"><i class="glyphicon glyphicon-tasks"></i>Departamentos</a></li>
						<li class="<?=($pag == "at_usuarios_pessoal.php"?"active":"") ;?>"><a href="<?=$hosted;?>/dashboard/view/at_usuarios_pessoal.php?token=<?=$_SESSION['token'];?>"><i class="fa fa-group"></i> Usu&aacute;rios</a></li>
						
					</ul>  								
				</li>
			<?php endif; ?>
			</ul>
		</section>           
    </aside>

   