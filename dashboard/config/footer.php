    <?php
				
				$rs = new recordset();
				$sql ="SELECT * FROM at_empresas
						WHERE emp_id=".$_SESSION['usu_empresa']; 
				$rs->FreeSql($sql);
				while($rs->GeraDados()){$empresas  = $rs->fld("emp_nome"); $site  = $rs->fld("emp_site"); }
				
				  
				?>
	<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 5.0 | <img src="http://localhost/infraprime/dashboard/images/logoCREone.png" width="100"/>
	</div>
	<strong>Licenciado para <a href="<?=$site;?>"> <?=$empresas;?></a></strong> <?=date("Y");?>  Todos os Direitos Reservados. 
</footer>   