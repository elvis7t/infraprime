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
	$campo = "comp_datafin";
	$sql = "SELECT * FROM ".$tabela."  a
			JOIN  at_departamentos   c ON a.comp_dpId  = c.dp_id 
			JOIN  sys_usuarios       d ON a.comp_usucad = d.usu_cod
			JOIN  at_empresas        e ON a.comp_empId = e.emp_id
			JOIN  comp_status        f ON a.comp_statusId = f.status_id
			
		WHERE comp_ativo =1";
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
	/*echo $rs->sql;*/
	$trtbl = "";
	while($rs->GeraDados()):
	$trtbl .= '
	<tr>
		<td>'.$rs->fld("emp_alias").'</td>
		<td>'.$rs->fld("dp_nome").'</td>
		<td>'.$rs->fld("comp_titulo").'</td>
		<td>'.$func->data_br($rs->fld("comp_datacad")).'</td>
		<td>'.$func->data_br($rs->fld("comp_datafin")).'</td>
		<td>'.$rs->fld("usu_nome").'</td> 
		<td>'.$rs->fld("status_desc").'</td> 
		<td>'.$rs->fld("comp_valor").'</td> 
			
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
							     <tr><th colspan=7><h2>Relat&oacute;rio de Solicita&ccedil;&atilde;o de Compras TI Finalizadas</h2></th></tr>
									  <tr> 
										
										
										 
										<th>Empresa</th> 
										<th>Departamento</th> 
										<th>Compra</th>  
										<th>Aberto em:</th>  
										<th>Finalizado em:</th>
										<th>Solicitante</th> 
										<th>Status</th>
										<th>Valor</th>
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