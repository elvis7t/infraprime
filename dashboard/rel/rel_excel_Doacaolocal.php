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
session_start();
$arquivo = 'relatorio.xls';
require_once("../config/main.php");
require_once("../model/recordset.php");
require_once("../class/class.functions.php");

 
$rs = new recordset();
$func = new functions();

extract($_GET);
$campo = "mq_datadoa";
$filtro ="";
	
	$sql = "SELECT inst_alias, eq_id, emp_alias, tipo_desc, marc_nome, eq_modelo, eq_desc, status_desc, eq_datadoa, usu_nome
			FROM at_equipamentos a
			JOIN at_empresas b ON a.eq_empId = b.emp_id
			JOIN eq_marca c ON a.eq_marcId = c.marc_id
			JOIN sys_usuarios d ON a.eq_usudoa = d.usu_cod
			JOIN eq_tipo e ON a.eq_tipoId = e.tipo_id
			JOIN at_instituicoes f ON a.id_inst = f.inst_id
			JOIN at_status h ON a.eq_statusId = h.status_id

			WHERE eq_ativo = '0' AND id_inst =".$sel_inst." AND eq_empId=".$_SESSION['usu_empresa']." 

			UNION ALL
			SELECT inst_alias, mq_id, emp_alias, tipo_desc, fab_nome, mq_modelo, mq_nome, status_desc, mq_datadoa, usu_nome
			FROM at_maquinas a
			JOIN at_empresas b ON a.mq_empId = b.emp_id
			JOIN mq_fabricante c ON a.mq_fabId = c.fab_id
			JOIN sys_usuarios d ON a.mq_usudoa = d.usu_cod
			JOIN eq_tipo e ON a.mq_tipoId = e.tipo_id
			JOIN at_instituicoes f ON a.id_inst = f.inst_id
			JOIN at_status h ON a.mq_statusId = h.status_id

			WHERE mq_ativo = '0' AND id_inst =".$sel_inst." AND mq_empId=".$_SESSION['usu_empresa']." "; 
	
if(isset($di) AND $di<>""){
		$sql.=" AND ".$campo." >='".$func->data_usa($di)." 00:00:00'";
		$filtro.= "Data Inicial: ".$di."<br>";
	}
	if(isset($df) AND $df<>""){
		$sql.=" AND ".$campo." <='".$func->data_usa($df)." 23:59:59'";
		$filtro.= "Data Final: ".$df."<br>";
	}
	
	
	
	
	
	
	 
	
	
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
		<td>'.$func->data_br($rs->fld("eq_datadoa")).'</td>
		<td>'.$rs->fld("usu_nome").'</td>
		<td>'.$rs->fld("status_desc").'</td>
		
		
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
						<i class="fa fa-globe"></i>'.$rs->pegar("emp_nome","at_empresas","emp_id = '".$sel_inst."'").'
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
								  <tr><th colspan=7><h2>Relat&oacute;rio de Doa&ccedil;&otilde;es ao '.$rs->pegar("inst_alias","at_instituicoes","inst_id = '".$_SESSION['usu_empresa']."'").' </h2></th></tr>
									  <tr> 
										 
										
										
										
											<th>Empresa</th> 
											<th>Tipo</th> 
											<th>Marca</th>
											<th>Modelo</th>										
											<th>Ativo</th>
											<th>Data</th>
											<th>Usu&aacute;rio</th>
											<th>Status</th>
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