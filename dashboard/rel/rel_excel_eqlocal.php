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
	$sql = "SELECT * FROM ".$tabela."  a
			JOIN at_empresas  b ON a.eq_empId  = b.emp_id 
			JOIN eq_marca     c ON a.eq_marcId = c.marc_id
			JOIN sys_usuarios d ON a.eq_usucad = d.usu_cod
			JOIN eq_tipo      e ON a.eq_tipoId = e.tipo_id
			JOIN at_status    f ON a.eq_statusId = f.status_id
		WHERE eq_ativo <> 1 AND eq_empId =".$emp;  
	  
	
	
	
	$sql.=" ORDER BY emp_alias  "; 
	
	
	 
	
	
	$rs->FreeSql($sql);
	/*echo $rs->sql;*/
	$trtbl = "";
	while($rs->GeraDados()):
	$trtbl .= '
	<tr>
		<td>'.$rs->fld("emp_alias").'</td>
		<td>'.$rs->fld("tipo_desc").'</td>
		<td>'.$rs->fld("marc_nome").'</td>
		<td>'.$rs->fld("eq_modelo").'</td>
		<td>'.$rs->fld("eq_desc").'</td>
		<td>'.$rs->fld("status_desc").'</td>
		<td>'.$rs->fld("eq_valor").'</td> 
			
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
								<tr><th colspan=7><h2>Relat&oacute;rio de Equipamentos Ativos</h2></th></tr>
									  <tr> 
										
										
										<th>Empresa</th> 
										<th>Tipo</th>
										<th>Marca</th>
										<th>Modelo</th>
										<th>Descri&ccedil;&atilde;o</th>
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