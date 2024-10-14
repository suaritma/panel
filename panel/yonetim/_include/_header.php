<?php include('../db.php'); ?>
<?php include('_session.php'); ?>
<?php include('../function.php'); ?>
<?php include('_function.php'); ?>
<?php include('_language/'.$_SESSION['admin_language'].'/_common.php'); ?>
<?php if (file_exists('_controller/_'.$page.'.php')) { include('_controller/_'.$page.'.php'); } ?>
<?php if (file_exists('_loader/_'.$page.'.php')) { include('_loader/_'.$page.'.php'); } ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aquacora Yönetim Paneli</title>
        <!-- Bootstrap -->
        <link href="<?=ADMIN_URL?>_assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=ADMIN_URL?>_assets/css/waves.min.css" type="text/css" rel="stylesheet">
        <link href="<?=ADMIN_URL?>_assets/css/nanoscroller.css" rel="stylesheet">
        <link href="<?=ADMIN_URL?>_assets/css/morris-0.4.3.min.css" rel="stylesheet">
        <link href="<?=ADMIN_URL?>_assets/css/menu-light.css" type="text/css" rel="stylesheet">
        <link href="<?=ADMIN_URL?>_assets/css/style.css" type="text/css" rel="stylesheet">
        <link href="<?=ADMIN_URL?>_assets/font-awesome/css/font-awesome.min.css" rel="stylesheet">

        <link href="<?=ADMIN_URL?>_assets/css/app.min.1.css" rel="stylesheet">
        <link href="<?=ADMIN_URL?>_assets/css/fullcalendar.min.css" rel="stylesheet">

        <link href="<?=ADMIN_URL?>_assets/css/themify-icons.css" rel="stylesheet">
        <link href="<?=ADMIN_URL?>_assets/css/color.css" rel="stylesheet">
        <link href="<?=ADMIN_URL?>_assets/js/c3/c3.min.css" rel="stylesheet">
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="<?=ADMIN_URL?>_assets/css/jquery-jvectormap-2.0.1.css" rel="stylesheet">
				<?php if (isset($inject_header)) { echo $inject_header; } ?>
    </head>
    <body class="fixed-navbar fixed-sidebar">
			<?php include('_language/'.$_SESSION['admin_language'].'/_'.$page.'.php'); ?>
        <!-- Static navbar -->
        <!-- Simple splash screen-->
        <div class="splash">
          <div class="splash-title">
            <div class="spinner">
              <img src="<?=ADMIN_URL?>_assets/images/loading-new.gif" alt=""/>
            </div>
          </div>
        </div>
        <?php include("_notifications.php"); ?>
        <?php include("_sidebar_right.php"); ?>
        <section class="page">
					<?php include('_menu.php'); ?>
            <div id="wrapper">
                <div class="content-wrapper container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title">
                               <h1>Yönetim Konsolu
                                <small>istatistikler, bildirimler ve kayıtlar</small>
                            </h1>
                                <ol class="breadcrumb">
                                    <li><a href="#"><i class="fa fa-home"></i></a></li>
                                    <li class="active">Konsol</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- end .page title-->


