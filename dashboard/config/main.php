<!DOCTYPE html>
<html>
  <head>
<?php
date_default_timezone_set('America/Sao_Paulo'); 
error_reporting(E_ALL & E_NOTICE & E_WARNING);
//$hosted = $_SESSION['dominio'];
session_start();?>

<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />  

  
    <meta charset="utf-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
    <title>Infra | Prime</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="http://localhost/dashboard/assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="http://localhost/dashboard/assets/dist/css/AdminLTE.min.css">
	<link rel="stylesheet" href="http://localhost/dashboard/assets/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="http://localhost/dashboard/assets/bootstrap/css/fix_chosen.css"> 
	<!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="http://localhost/dashboard/assets/dist/css/skins/_all-skins.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="http://localhost/dashboard/assets/plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="http://localhost/dashboard/assets/plugins/iCheck/all.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="http://localhost/dashboard/assets/plugins/morris/morris.css">
	
    <!-- jvectormap -->
    <link rel="stylesheet" href="http://localhost/dashboard/assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="http://localhost/dashboard/assets/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="http://localhost/dashboard/assets/plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="http://localhost/dashboard/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<!-- SELECT 2-->
	<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="http://localhost/dashboard/assets/jQueryFileUpload/css/jquery.fileupload.css">
	<link rel="stylesheet" href="http://localhost/dashboard/assets/css/dropzone.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="http://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="http://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>