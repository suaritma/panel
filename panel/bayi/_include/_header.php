<?php include('../db.php'); ?>
<?php include('_session.php'); ?>
<?php include('../function.php'); ?>
<?php include('_function.php'); ?>
<?php if (file_exists('_controller/_'.$page.'.php')) { include('_controller/_'.$page.'.php'); } ?>
<?php if (file_exists('_loader/_'.$page.'.php')) { include('_loader/_'.$page.'.php'); } ?>
<!DOCTYPE html>
<html lang="tr">
	<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title><?=$common_lang['title']?></title>
		<link href="<?=DEALER_URL?>_assets/images/favicon.ico" rel="shortcut icon" type="image/x-icon">
		<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,400italic" rel="stylesheet">
		<link href="<?=DEALER_URL?>_assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?=DEALER_URL?>_assets/css/font-awesome.min.css" rel="stylesheet">
		<link href="<?=DEALER_URL?>_assets/css/fullcalendar.min.css" rel="stylesheet">
		<link href="<?=DEALER_URL?>_assets/css/main.css" rel="stylesheet">
		<link href="<?=DEALER_URL?>_assets/css/payment.css" rel="stylesheet">
		<link href="<?=DEALER_URL?>_assets/css/print.css" rel="stylesheet" type="text/css" media="print">
        <link href="<?=DEALER_URL?>_assets/packages/autocomplete/easy-autocomplete.min.css" rel="stylesheet">
		<link href="<?=DEALER_URL?>_assets/css/lightbox.css" rel="stylesheet">
		<link href="<?=DEALER_URL?>_assets/css/jquery.stickynotif.min.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

		

		<?php if (isset($inject_header)) { echo $inject_header; } ?>
	</head>
	<body>
<?php include('_language/'.$_SESSION['dealer_language'].'/_'.$page.'.php'); ?>
<?php include('_menu.php'); ?>
<div class="container">
	<div class="row">
<?php if (isset($error)) { if ($error>2000) { $setclass = 'success'; } else { $setclass = 'danger'; } ?>
		<div class="col-md-12">
			<div class="alert alert-<?=$setclass?> alert-dismissible text-center fade in" data-delay="2" id="<?=$setclass?>-alert" role="alert">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">_</span>
    		</button>
    		<strong><?=$notif[$error]?></strong>
  		</div>
		</div>
<?php } ?>
<?php if (isset($_SESSION['dealer_title'])) { ?>
   <div class="col-md-12">
   	 <ol class="breadcrumb">
			 <?php if (!isset($_SESSION['employee_id'])) { ?>
   		 <li><b><?=$_SESSION['dealer_title']?></b> hesabindasiniz.</li>
		 <?php } else { ?>
			 <li><b>Merhaba, <?=$_SESSION['employee_name']?></b></li>
		 <?php } ?>
   	 </ol>
   </div>
   <?php } ?>