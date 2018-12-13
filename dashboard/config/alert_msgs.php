	
	<!-- Notifications: style can be found in dropdown.less -->
	<?php
	
	$sql ="	SELECT empre_id, empre_eqdesc FROM eq_emprestimo a
			JOIN at_empresas      b ON a.empre_eqempId    = b.emp_id 
			JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
			JOIN eq_marca         d ON a.empre_eqmarcaId   = d.marc_id
			JOIN at_equipamentos  e ON a.empre_eqId     = e.eq_id
			JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
			JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
			JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
			
		WHERE empre_ativo = '1'
		
		UNION ALL
		SELECT empre_id, empre_mqnome FROM 	mq_emprestimo a
			JOIN at_empresas      b ON a.empre_mqempId    = b.emp_id 
			JOIN eq_tipo          c ON a.empre_eqtipoId = c.tipo_id
			JOIN mq_fabricante    d ON a.empre_mqfabId   = d.fab_id
			JOIN at_maquinas      e ON a.empre_mqId     = e.mq_id
			JOIN at_departamentos f ON a.empre_usudpId     = f.dp_id
			JOIN at_usuarios      g ON a.empre_usuId    = g.usu_id
			JOIN sys_usuarios     h ON a.empre_usucad   = h.usu_cod
			
		WHERE empre_ativo = '1'	
		
		";
		$rs->FreeSql($sql);
		
		if($_SESSION['usu_classe']<=2): // A partir de usuário, vê  
		?>
		
	<li class="dropdown notifications-menu">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  <i class="fa fa-exchange"></i>
		  <?php if($rs->linhas>=1 ): ?>
		  <span class="label label-warning"><?=$rs->linhas;?></span>
		  <?php endif; ?>		  		  
		</a>
		<ul class="dropdown-menu">
		  <li class="header"> Emprestimos <?=$rs->linhas;?></li>
		  <li>
			<!-- inner menu: contains the actual data -->
			<ul class="menu">
				<?php
				$rs->FreeSql($sql);
				while($rs->GeraDados()){
				?>
			  <li>
				<a href="at_ger_Eqemprestimo.php?token=<?=$_SESSION['token']?>&acao=N&empreid=<?=$rs->fld('empre_id');?>">
				  <i class="glyphicon glyphicon-retweet text-aqua"></i> <?=$rs->fld("empre_id")." - ".$rs->fld("empre_eqdesc");?>
				</a>
			  </li>
			  <li>
			  <?php 
				}
			   ?>
				
			</ul>
		  </li>
		  <li class="footer"><a href="at_emprestimo.php?token=<?=$_SESSION['token'];?>">Ver Todos</a></li>
		</ul>
	</li>		
			<!-- Tasks: style can be found in dropdown.less -->
	<li class="dropdown tasks-menu">
	<?php
	
	$sql ="	SELECT * FROM at_compras a
			JOIN  at_departamentos   c ON a.comp_dpId  = c.dp_id 
			JOIN  sys_usuarios       d ON a.comp_usucad = d.usu_cod
			JOIN  at_empresas        e ON a.comp_empId = e.emp_id
			JOIN  comp_status        f ON a.comp_statusId = f.status_id
			
			WHERE comp_ativo = '1'";
		$rs->FreeSql($sql);
		?>
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		  <i class="glyphicon glyphicon-shopping-cart"></i>
		  <?php if($rs->linhas>=1 ): ?>
		  <span class="label label-danger"><?=$rs->linhas;?></span>
		  <?php endif; ?>	
		</a>
		<ul class="dropdown-menu">
		  <li class="header">Compras <?=$rs->linhas;?></li>
		  <li>
			<!-- inner menu: contains the actual data -->
			<ul class="menu">
				<?php
				$rs->FreeSql($sql);
				while($rs->GeraDados()){
				?>
			  <li>
				<a href="at_ger_Comp.php?token=<?=$_SESSION['token']?>&acao=N&compid=<?=$rs->fld('comp_id');?>">
				  <i class="glyphicon glyphicon-shopping-cart text-green"></i><?=$rs->fld("comp_id")." - ".$rs->fld("comp_titulo");?>
				</a>
			  </li>
			  <li>
			  <?php 
				}
			   ?>
			  <!-- end task item -->			  
			</ul>
		  </li>
		  <li class="footer">
			<a href="at_compras.php?token=<?=$_SESSION['token'];?>">Ver Todos</a>
		  </li>
		</ul>
	</li>
	<?php endif; ?> 
	<!-- Messages: style can be found in dropdown.less-->
	<li class="dropdown messages-menu">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">
		<?php
			$sql ="	SELECT * FROM sys_mail 		
		WHERE mail_statusId = '1' AND mail_destino_usuId =".$_SESSION['usu_cod'];
				$rs->FreeSql($sql);
				$rs->GeraDados();
				$td = $rs->fld("mail_statusId");
		?>
		  <i class="fa fa-envelope-o"></i>
		  <?php if($td==1 ): ?>
		  	  <span class="label label-success"><?=$rs->linhas;?></span>						
		<?php endif; ?>	
			  </a>
		<ul class="dropdown-menu">
		 <?php if($td==2 ): ?>
		  <li class="header">Voc&ecirc; tem <?=$rs->linhas;?> messages</li>
		  <?php else: ?>
		  <li class="header">Voc&ecirc; n&atilde;o tem novas mensagens</li>
		  <?php endif; ?>	
		  <li>
			<!-- inner menu: contains the actual data -->
			<ul class="menu">
			<?php
			$sql ="	SELECT * FROM sys_mail a
			JOIN  at_departamentos   c ON a.`mail_envio_usudpId`  = c.dp_id 
			JOIN  sys_usuarios       d ON a.`mail_envio_usuId` = d.usu_cod
			JOIN  at_empresas        e ON a.`mail_envio_usuempId` = e.emp_id
			JOIN  sys_mail_status        f ON a.`mail_envio_statusId` = f.status_id
			
			WHERE mail_statusId = 1 AND `mail_destino_usuId`=".$_SESSION['usu_cod'];
				$rs->FreeSql($sql);
				$rs->FreeSql($sql);
				while($rs->GeraDados()){
				?>
			  <li><!-- start message -->
				<a href="sys_ler_mail.php?token=<?=$_SESSION['token'];?>&acao=N&mail_Id=<?=$rs->fld("mail_Id");?>">
				  <div class="pull-left">
					<img src="https://infraprime.000webhostapp.com/dashboard/<?=$rs->fld('usu_foto');?>" class="img-circle" alt="User Image">
				  </div>
				  <h4>
					<?=$rs->fld("mail_assunto");?>
					<small><i class="fa fa-clock-o"></i> <?=$fn->data_hbr($rs->fld("mail_data"));?></small>
				  </h4>
				  <p><?=$rs->fld("mail_mensagem");?></p>
				</a>
			  </li>
			  <?php 
				}
			   ?>
			  <!-- end message -->
			 
			</ul>
		  </li>
		  <li class="footer"><a href="sys_mailbox.php?token=<?=$_SESSION['token'];?>">Veja todas as Mensagens</a></li>
		</ul>
	</li>
					    