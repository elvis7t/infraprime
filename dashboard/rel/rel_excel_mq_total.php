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
	$sql = "SELECT * FROM ".$tabela."   a
			JOIN at_empresas    	b ON a.mq_empId    = b.emp_id 
			JOIN mq_fabricante  	c ON a.mq_fabId    = c.fab_id
			JOIN sys_usuarios   	d ON a.mq_usucad   = d.usu_cod
			JOIN eq_tipo        	e ON a.mq_tipoId   = e.tipo_id
			JOIN at_status      	f ON a.mq_statusId = f.status_id
			JOIN mq_os              g ON a.mq_osId     = g.os_id			
			JOIN mq_office			j ON a.mq_officeId = j.office_id
			 
		WHERE mq_ativo <> 1";    
	
	
	
	$sql.=" ORDER BY emp_alias  "; 
	
	
	 
	
	
	$rs->FreeSql($sql);
	/*echo $rs->sql;*/
	$trtbl = "";
	while($rs->GeraDados()):
	if($rs->fld("mq_licenca")==1 ){
	$li="OEM";
	}
	else{ 
	$li="Open";
	}
					
					
					
					
	$trtbl .= '
	
	<tr>
		<td>'.$rs->fld("emp_alias").'</td>		
		<td>'.$rs->fld("mq_nome").'</td>
		<td>'.$rs->fld("fab_nome").'</td>
		<td>'.$rs->fld("tipo_desc").'</td>
		<td>'.$rs->fld("mq_modelo").'</td>
		<td>'.$rs->fld("status_desc").'</td>
		<td>'.$rs->fld("os_desc").'</td>
		<td>'.$rs->fld("office_desc").'</td>
		<td>'.$func->data_br($rs->fld("mq_datacad")).'</td>
		<td>'.$func->data_br($rs->fld("mq_datagar")).'</td>
		<td>'.$li.'</td> 
			
	</tr>';
	endwhile;
	$trtbl.="<tr><td><strong>".$rs->linhas." Registros</strong></td></tr>";
	

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
								<tr><th colspan=7><h2>Relat&oacute;rio de M&aacute;quinas Ativas Totais</h2></th></tr>
									  <tr> 
										
										<th>Empresa</th> 																			
										<th>Tipo</th>
										<th>Modelo</th>
										<th>Status</th>
										<th>Sitema</th> 
										<th>Office</th> 
										<th>Comprado</th>
										<th>Garantia</th>
										<th>Licen&ccedil;a</th> 
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