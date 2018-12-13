<?php

require_once("../model/recordset.php");
require_once("../class/class.functions.php");

$fn = new functions();

$rs = new recordset();

$sql ="SELECT * 
FROM  `sys_logado` 
WHERE DATE( log_horario ) =  CURDATE( ) 
AND  `log_status` =1
ORDER BY  `sys_logado`.`log_horario` DESC 
";

$rs->FreeSql($sql);

while($rs->GeraDados()){ ?> 

	<tr>

		<td><?=$rs->fld("log_id");?></td>
		<td><?=$rs->fld("log_user");?></td>
		<td><?=$fn->data_hbr($rs->fld("log_horario"));?></td>  
		<td><?=$fn->data_hbr($rs->fld("log_expira"));?></td>  
		<td><i class="fa fa-circle text-success"></i></td> 

		<td> 

			<!--<div class="button-group">

				<a 	class="btn btn-sm btn-primary" data-toggle='tooltip' data-placement='bottom' title='Alterar Usuário' a href="sys_alt_Usu.php?token=<?=$_SESSION['token']?>&acao=N&usucod=<?=$rs->fld("usu_cod");?>"><i class="fa fa-pencil"></i></a>

				<button type="button" class="btn btn-sm btn-danger"  id="btn_excluir" data-toggle='tooltip' data-placement='bottom' title='Excluir'><i class="fa fa-trash"></i>  </button>  

			</div>   

		</td> -->

		

	</tr>	

<?php }

?>