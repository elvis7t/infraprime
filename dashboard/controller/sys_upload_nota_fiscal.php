<?php
session_start();
require_once("../model/recordset.php");
$rs_imagem = new recordset();
$nome = $_POST['nome']; //Pega os 3 caracteres
$ds= DIRECTORY_SEPARATOR;  //1
$path = "/images/nota_fiscal/"; // ALTERAR
$storeFolder = '../images/nota_fiscal';   //2
$rename = $nome . '_' . $_POST['perfil']. '.pdf';
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];   
	rename($_FILES['file']['name'], $rename);	//Remoneia a foto           
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $rename;  //5
    if(move_uploaded_file($tempFile,$targetFile)){
		$dados['mq_nota_fiscal']	= $path.$rename;
		$whr = "mq_id =".$_REQUEST['perfil'];  
		$rs_imagem->Altera($dados,"at_maquinas",$whr);   

	}

}

?>