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

$emp_layout_verso = $rs->fld("emp_layout_verso");
?>
<!DOCTYPE html>
<html>	
	<body onload="window.print();">		
			<!-- Main content -->
			<section class="invoice">
				<div class="box-body">
					<img style="position:absolute;  top:-01px;  left:00px;" src="<?=$hosted;?>/dashboard<?=$emp_layout_verso;?>"">					
				</div>
			</section><!-- /.content -->

		<!-- AdminLTE App -->
		<script src="<?=$hosted;?>/dashboard/assets/dist/js/app.min.js"></script>
	</body>
</html>

