<?php
session_start();
require_once("../model/recordset.php");
$rs_imagem = new recordset();
$ds= DIRECTORY_SEPARATOR;  //1
$path = "/assets/perfil/"; // ALTERAR
//$path = "http://gigafox.890m.com/ecommerce/images/upload/"; ALTERAR
$storeFolder = '../assets/perfil';   //2

if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];          //3             
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
    if(move_uploaded_file($tempFile,$targetFile)){
		$dados['usu_foto']	= $path.$_FILES['file']['name'];
		$whr = "usu_cod =".$_REQUEST['perfil'];  
		$rs_imagem->Altera($dados,"sys_usuarios",$whr);   

	}

}

?>