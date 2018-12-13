<?php
session_start();
ob_start();
error_reporting(E_ALL & E_NOTICE & E_WARNING);
/*
* Criando e exportando planilhas do Excel
* Cleber Marrara - 06/01/2016
* Versão 1.0 - cleber.marrara.prado@gmail.com
*/
// Definimos o nome do arquivo que será exportado
$arquivo = 'relatorio.xls';
require_once("../config/main.php");
require_once("../model/recordset.php");
require_once("../class/class.functions.php");

 
$rs = new recordset();
$func = new functions();

extract($_GET);
	$campo = "mq_datades"; 
	$sql = "SELECT * FROM ".$tabela."   a
			JOIN at_empresas    	b ON a.mq_empId    = b.emp_id 
			JOIN mq_fabricante  	c ON a.mq_fabId    = c.fab_id
			JOIN sys_usuarios   	d ON a.mq_usudes   = d.usu_cod
			JOIN eq_tipo        	e ON a.mq_tipoId   = e.tipo_id
			JOIN mq_os              g ON a.mq_osId     = g.os_id
					
		WHERE mq_ativo = '0' AND mq_empId =".$sel_emp;   
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
	$data1 = $rs->fld("mq_datacad"); 
	$data2 = $rs->fld("mq_datades");
	$diferenca = strtotime($data2) - strtotime($data1);
	$dias = floor($diferenca / (60 * 60 * 24));
	$trtbl .= '
	<tr>
		<td>'.$rs->fld("emp_alias").'</td>
		
		<td>'.$rs->fld("fab_nome").'</td>
		<td>'.$rs->fld("tipo_desc").'</td>
		<td>'.$rs->fld("mq_modelo").'</td>
		<td>'.$rs->fld("mq_nome").'</td>
		<td>'.$rs->fld("os_desc").'</td>
		<td>'.$rs->fld("usu_nome").'</td>
		<td>'.$func->data_br($rs->fld("mq_datacad")).'</td>
		<td>'.$func->data_br($rs->fld("mq_datades")).'</td>
		<td>'.$dias. 'dias</td>
			
	</tr>';
	endwhile;
	$trtbl.="<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
	$trtbl.="<tr><td><address>".$filtro."</address></td></tr>";

// Criamos uma tabela HTML com o formato da planilha
$html = '
			<section class="invoice">
				<!-- title row -->
				<div class="row">
				  <div class="col-xs-12">
					<h2 class="page-header">
						<i class="fa fa-globe"></i>'.$rs->pegar("emp_nome","at_empresas","emp_id = '".$_SESSION['usu_empresa']."'").'
						<small class="pull-right">Data: '.date("d/m/Y").'</small>
					</h2>
				  </div><!-- /.col -->
				</div>
				<!-- info row -->
				<div class="row invoice-info">
					<div class="col-sm-4 invoice-col">
						Usu&aacute;rio
						<address>
							<strong>'.$_SESSION['nome_usu'].'</strong><br>
							<i class="fa fa-envelope"></i> '.$_SESSION['usuario'].'
						</address>
					</div><!-- /.col -->
				</div><!-- /.row -->

				<!-- Table row -->
				<div class="row">
					<div class="col-xs-12 table-responsive">
						<table class="table table-striped">
							<thead>
								 <tr><th colspan=7><h2>Relat&oacute;rio de M&aacute;quinas Descartadas</h2></th></tr>
									  <tr> 
										
										
										<th>Empresa</th> 
										<th>Fabricante</th>
										<th>Tipo</th>
										<th>Modelo</th>
										<th>Nome</th>
										<th>Sitema</th> 
										<th>Descartado por:</th> 
										<th>Comprado em:</th>
										<th>Descartado em:</th> 
										<th>Vida &Uacute;til</th>
								</tr>
							</thead>
							<tbody id="rls">
								'.$trtbl.'
							</tbody>
						</table>
					</div><!-- /.col --> 
				</div><!-- /.row -->
			</section><!-- /.content -->
';

// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit;