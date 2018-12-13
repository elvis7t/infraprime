<?php
require_once("../class/class.functions.php");
require_once("../model/recordset.php");


	$rs = new recordset();
	 
	$func 	= new functions();
	/*echo "<pre>";
	print_r($_GET);
	echo "</pre>";*/
	extract($_GET);
	$campo = "man_dataretorno";
	$filtro='';
	
	$sql = "SELECT * FROM ".$tabela."  a
			JOIN  at_equipamentos  b ON a.man_eqId   = b.eq_id 
			JOIN  eq_prestadoras   c ON a.man_preId  = c.pre_id 
			JOIN  sys_usuarios     d ON a.man_usucad = d.usu_cod
			JOIN  at_empresas      e ON a.man_eqempId = e.emp_id
		WHERE man_ativo = 1 AND man_preId =".$sel_pre;   
	if(isset($di) AND $di<>""){
		$sql.=" AND ".$campo." >='".$func->data_usa($di)." 00:00:00'";
		$filtro.= "Data Inicial: ".$di."<br>";
	}
	if(isset($df) AND $df<>""){
		$sql.=" AND ".$campo." <='".$func->data_usa($df)." 23:59:59'";
		$filtro.= "Data Final: ".$df."<br>";
	}
	
	
	$sql.=" ORDER BY emp_alias  ";      
	
	
	$rs->FreeSql($sql); 
	
	while($rs->GeraDados()):    
	?>
	<tr> 
		   
		
		<td><?=$rs->fld("emp_alias");?></td>
		<td><?=$rs->fld("eq_desc");?></td>
		<td><?=$rs->fld("man_motivo");?></td> 
		<td><?=$func->data_hbr($rs->fld("man_dataida"));?></td>  
		<td><?=$func->data_br($rs->fld("man_dataretorno"));?></td>  
		<td><?=$rs->fld("usu_nome");?></td>
		<td><?=$rs->fld("man_os");?></td>
		<td><?=$func->formata_din($rs->fld("man_valor"));?></td>   
	</tr>
	<?php endwhile;
	echo "<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
	echo "<tr><td><address>".$filtro."</address></td></tr>";
	$sql ="SELECT SUM(man_valor) FROM eq_manutencao WHERE man_preId =".$sel_pre;
		if(isset($di) AND $di<>""){
		$sql.=" AND ".$campo." >='".$func->data_usa($di)." 00:00:00'";
		$filtro.= "Data Inicial: ".$di."<br>";
	}
	if(isset($df) AND $df<>""){
		$sql.=" AND ".$campo." <='".$func->data_usa($df)." 23:59:59'";
		$filtro.= "Data Final: ".$df."<br>";
	}
    $rs->FreeSql($sql);
    while($rs->GeraDados()){ $man =$func->formata_din( $rs->fld("SUM(man_valor)")); }
	
	echo "<tr><td><strong>Total ".$man ."</strong></td></tr>"; 
	
	?>
	