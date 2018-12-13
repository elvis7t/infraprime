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

$campo = "solic_data";
$filtro ="";  
	$sql = "SELECT * FROM ".$tabela."  a		
			JOIN  at_usuarios      b ON a.solic_usuId    = b.usu_id 
			JOIN  sys_usuarios     c ON a.solic_usucad   = c.usu_cod
			JOIN  at_equipamentos  d ON a.solic_eqId     = d.eq_id
			JOIN  eq_tipo          e ON a.solic_eqtipoId = e.tipo_id
			JOIN  eq_marca         f ON a.solic_marcId   = f.marc_id
			JOIN  at_empresas      g ON a.solic_empId    = g.emp_id 
			JOIN  at_departamentos h ON a.solic_dpId     = h.dp_id

			WHERE usu_id =".$usu ;
		
		
		if(isset($di) AND $di<>""){
		$filtro = "";
		$sql.=" AND ".$campo." >='".$func->data_usa($di)." 00:00:00'";
		$filtro.= "Data Inicial: ".$di."<br>";
	}
	if(isset($df) AND $df<>""){
		$sql.=" AND ".$campo." <='".$func->data_usa($df)." 23:59:59'";
		$filtro.= "Data Final: ".$df."<br>";
	}	
		if(isset($ep)AND $df<>"" AND $di<>""){
		$empresa = $rs->pegar("emp_alias","at_empresas","emp_id = '".$ep."'");
		$depart = $rs->pegar("dp_nome","at_departamentos","dp_id = '".$dp."'");
		$usuario = $rs->pegar("at_usu_nome","at_usuarios","usu_id = '".$usu."'");
		$filtro.= "Empresa: ".$empresa."<br>";
		$filtro.= "Departamento: ".$depart."<br>";
		$filtro.= "Usu&aacute;rio: ".$usuario."<br>";
	}

	$sql.=" ORDER BY solic_data ASC  ";

	

	

	 

	

	

	$rs->FreeSql($sql);

	/*echo $rs->sql;*/

	$trtbl = "";

	while($rs->GeraDados()):

	$trtbl .= '

	<tr>

		<td>'.$rs->fld("emp_alias").'</td>

		<td>'.$rs->fld("dp_nome").'</td>

		<td>'.$rs->fld("at_usu_nome").'</td>

		<td>'.$rs->fld("marc_nome").'</td>
 	 
		<td>'.$rs->fld("eq_desc").'</td>

		<td>'.$func->data_br($rs->fld("solic_data")).'</td>

		<td>'.$rs->fld("usu_nome").'</td> 

		<td>'.$rs->fld("solic_ticket").'</td> 

			

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

							   <tr><th colspan=7><h2>Relat&oacute;rio de Solicita&ccedil;&atilde;o de Equipamento</h2></th></tr>

									  <tr> 

										

										

										<th>Empresa</th> 

										<th>Departamento</th>

										<th>Usu&aacute;rio</th>

										<th>Marca</th>

										<th>Modelo</th>

										<th>Equipamento</th>

										<th>Data</th>

										<th>Cadastrado:</th>

										<th>Ticket</th>

										

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