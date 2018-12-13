<?php
session_start();
/* incluir em todas as páginas que necessitarem de login para serem visualizadas */

require_once("../model/recordset.php");

$rsvld = new recordset();
$whr = "log_user = '".$_SESSION['usuario']."' AND log_token = '".addslashes($_GET['token'])."' AND log_status= '1'";
$rsvld->Seleciona("*","sys_logado",$whr);

$arr = array();
if($rsvld->linhas <> 1){ // Se não houverem credenciais
	$arr["status"] 		= "NO";
	$arr["titulo"]		= "Infra Prime - AVISO";
	$arr["mensagem"]	= "Faça Login para acessar esse Conteúdo";
	header("location: https://infraprime.000webhostapp.com/dashboard/view/login.php");
}

unset($rsvld);
?>