<?php
session_start();
require_once("../model/recordset.php");
$rs_imagem = new recordset();
$rs_dados = new recordset();
$dados = array();
$dados2 = array();
extract($_POST);

$ds= DIRECTORY_SEPARATOR;  //1
$path = "../dashboard/images/upload/"; // ALTERAR
$storeFolder = '../dashboard/images/upload';   //2



 
if (!empty($_FILES)) {
    $tempFile = $_FILES['file']['tmp_name'];          //3             
    $targetPath = dirname( __FILE__ ) . $ds. $storeFolder . $ds;  //4
    $targetFile =  $targetPath. $_FILES['file']['name'];  //5
    if(move_uploaded_file($tempFile,$targetFile)){
		$imcod = $rs_imagem->autocod("ou_img_Id","ou_imagens");
		$cod = $rs_imagem->autocod("ou_contato_Id","ou_contato_site");
		$dados['ou_img_Id']				= $imcod;
		$dados['ou_img_contatoId']		= $cod;
		$dados['ou_img_ender']			= $path.$_FILES['file']['name'];
		$dados['ou_img_dtcriado']		= date("Y-m-d H:i:s"); 
				
		$rs_imagem->Insere($dados,"ou_imagens");
		// Inserida a imagem, vamos montar o array do contato
		$dados2["ou_contato_Id"]			= $cod;
		$dados2["ou_contato_nome"]			= trim($contato_nome);
		$dados2["ou_contato_titulo"] 		= trim($contato_titulo);
		$dados2["ou_contato_mensagem"] 		= trim($contato_mensagem);
		$dados2["ou_contato_data"] 		    = date('Y-m-d H:i:s');
		$dados2["ou_contato_status"] 		= 'pendente';
		
		$rs_dados->Insere($dados2,"ou_contato_site"); 
		header('Location:../view/contato.php');
	}
      
	 
	 
header('Location:../view/contato.php');	 
	echo " Enviado com sucesso"; 
	 
}


	
?>