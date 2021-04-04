<?php
require_once("../config/sessions.php");
require_once("../model/recordset.php");
require_once("../config/main.php");
session_start();
		
extract($_GET);
$rs = new recordset();
$sql ="SELECT * FROM at_usuarios a
JOIN at_empresas b ON a.usu_empId = b.emp_id 
JOIN at_departamentos c ON a.usu_dpId = c.dp_id 
WHERE usu_id = ".$usuid;
$rs->FreeSql($sql);
$rs->GeraDados();

$emp_layout_frent = $rs->fld("emp_layout_frent");
$usu_nome = $rs->fld("at_usu_nome");
$emp_id = $rs->fld("emp_id");
$usu_chapa = $rs->fld("at_usu_chapa");
$usu_cargo = $rs->fld("at_usu_cargo");
			
?>
<!DOCTYPE html>
<?php if($emp_id==1): // LAYOUT SUPPORT ?>	
<html>	
	<body onload="window.print();">		
		<!-- Main content -->
		<section class="invoice">
			<div class="box-body">
				<img style="position:absolute;  top:-01px;  left:00px;" src="<?=$hosted;?>/dashboard<?=$emp_layout_frent;?>">
				<div class="card-body" style="position:relative; top:5px; ">
					<div class="text-center">								
						<img style="height: 135px; width: 90px;" src="<?=$hosted;?>/dashboard<?=$rs->fld('at_usu_foto');?>" >									
					</div>
					
					<div>
						<br>
						<br>
					</div>
					
					<div class="text-center"  style="position:relative;">
						<div class="text-center text-uppercase" style="font: italic bold 14px arial, sans-serif;"><?=$usu_nome;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 12px arial, sans-serif;"><?=$usu_cargo;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 10px arial, sans-serif;"><?=$usu_chapa;?></div>
					</div>						
				</div>
			</div>
		</section><!-- /.content -->
	</body>
</html>
<?php endif; ?> <!-- ADM-->
<?php if($emp_id==3): // LAYOUT RAPIDO ?>	
<html>	
	<body onload="window.print();">		
		<!-- Main content -->
		<section class="invoice">
			<div class="box-body">
				<img style="position:absolute;  top:-01px;  left:00px;" src="<?=$hosted;?>/dashboard<?=$emp_layout_frent;?>">
		<!--Win7 <div class="card-body" style="position:relative; top:92px;">-->
				<div class="card-body" style="position:relative; top:84px;">
					<div class="text-center">								
		   <!--Win7 <img style="height: 152px; width: 106px;" src="<?=$hosted;?>/dashboard<?=$rs->fld('at_usu_foto');?>" >-->
						<img style="height: 142px; width: 106px;" src="<?=$hosted;?>/dashboard<?=$rs->fld('at_usu_foto');?>" >									
					</div>
					
					<div>
						<br>
					</div>
					
					<div class="text-center"  style="position:relative;">
						<div class="text-center text-uppercase" style="font: italic bold 14px arial, sans-serif;"><?=$usu_nome;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 12px arial, sans-serif;"><?=$usu_cargo;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 10px arial, sans-serif;"><?=$usu_chapa;?></div>
					</div>						
				</div>
			</div>
		</section><!-- /.content -->
	</body>
</html>
<?php endif; ?> <!-- ADM-->
<?php if($emp_id==6): // LAYOUT ABC ?>	
<html>	
	<body onload="window.print();">		
		<!-- Main content -->
		<section class="invoice">
			<div class="box-body">
				<img style="position:absolute;  top:-01px;  left:00px;" src="<?=$hosted;?>/dashboard<?=$emp_layout_frent;?>">
				<div class="card-body" style="position:relative; top:5px; ">
					<div class="text-center">								
						<img style="height: 135px; width: 90px;" src="<?=$hosted;?>/dashboard<?=$rs->fld('at_usu_foto');?>" >									
					</div>
					
					<div>
						<br>
						<br>
					</div>
					
					<div class="text-center"  style="position:relative;">
						<div class="text-center text-uppercase" style="font: italic bold 14px arial, sans-serif;"><?=$usu_nome;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 12px arial, sans-serif;"><?=$usu_cargo;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 10px arial, sans-serif;"><?=$usu_chapa;?></div>
					</div>						
				</div>
			</div>
		</section><!-- /.content -->
	</body>
</html>
<?php endif; ?> <!-- ADM-->
<?php if($emp_id==7): // LAYOUT CISNE?>	
<html>	
	<body onload="window.print();">		
		<!-- Main content -->
		<section class="invoice">
			<div class="box-body">
				<img style="position:absolute;  top:-01px;  left:00px;" src="<?=$hosted;?>/dashboard<?=$emp_layout_frent;?>">
				<div class="card-body" style="position:absolute; top:10px; left:30px;">
					<div class="text-center">								
						<img style="height: 135px; width: 90px;" src="<?=$hosted;?>/dashboard<?=$rs->fld('at_usu_foto');?>" >									
					</div>
					
					<div>
						<br>
						<br>
					</div>
					
					<div class="text-center"  style="position:relative;">
						<div class="text-center text-uppercase" style="font: italic bold 14px arial, sans-serif;"><?=$usu_nome;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 12px arial, sans-serif;"><?=$usu_cargo;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 10px arial, sans-serif;"><?=$usu_chapa;?></div>
					</div>						
				</div>
			</div>
		</section><!-- /.content -->
	</body>
</html>
<?php endif; ?> <!-- ADM-->

<?php if($emp_id==11): // LAYOUT RIB ?>	
<html>	
	<body onload="window.print();">		
		<!-- Main content -->
		<section class="invoice">
			<div class="box-body">
				<img style="position:absolute;  top:-01px;  left:00px;" src="<?=$hosted;?>/dashboard<?=$emp_layout_frent;?>">
		<!--Win7 <div class="card-body" style="position:relative; top:92px;">-->		
				<div class="card-body" style="position:relative; top:84px;">
					<div class="text-center">
		<!--Win7 <img style="height: 152px; width: 106px;" src="<?=$hosted;?>/dashboard<?=$rs->fld('at_usu_foto');?>"> -->			
						<img style="height: 142px; width: 106px;" src="<?=$hosted;?>/dashboard<?=$rs->fld('at_usu_foto');?>" >									
					</div>
					
					<div>
						<br>
					</div>
					
					<div class="text-center"  style="position:relative;">
						<div class="text-center text-uppercase" style="font: italic bold 14px arial, sans-serif;"><?=$usu_nome;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 12px arial, sans-serif;"><?=$usu_cargo;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 10px arial, sans-serif;"><?=$usu_chapa;?></div>
					</div>						
				</div>
			</div>
		</section><!-- /.content -->
	</body>
</html>
<?php endif; ?> <!-- ADM-->

<?php if($emp_id==12): // LAYOUT BEBEDOURO ?>	
<html>	
	<body onload="window.print();">		
		<!-- Main content -->
		<section class="invoice">
			<div class="box-body">
				<img style="position:absolute;  top:-01px;  left:00px;" src="<?=$hosted;?>/dashboard<?=$emp_layout_frent;?>">
		<!--Win7 <div class="card-body" style="position:relative; top:92px;">-->
				<div class="card-body" style="position:relative; top:92px">
					<div class="text-center">
	       <!--Win7 <img style="height: 152px; width: 106px;" src="<?=$hosted;?>/dashboard<?=$rs->fld('at_usu_foto');?>" >-->					
						<img style="height: 135px; width: 106px;" src="<?=$hosted;?>/dashboard<?=$rs->fld('at_usu_foto');?>" >									
					</div>
					
					<div>
						<br>
					</div>
					
					<div class="text-center"  style="position:relative;">
						<div class="text-center text-uppercase" style="font: italic bold 14px arial, sans-serif;"><?=$usu_nome;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 12px arial, sans-serif;"><?=$usu_cargo;?></div>
						<div class="text-center text-uppercase" style="font: italic bold 10px arial, sans-serif;"><?=$usu_chapa;?></div>
					</div>						
				</div>
			</div>
		</section><!-- /.content -->
	</body>
</html>
<?php endif; ?> <!-- ADM-->

