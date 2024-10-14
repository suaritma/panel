<?php include('../db.php'); ?>
<?php include('_include/_session.php'); ?>
<?php include('_include/_function.php'); ?>
<?php include('_language/'.$_SESSION['admin_language'].'/_common.php'); ?>
<?php if (file_exists('_controller/_'.$page.'.php')) { include('_controller/_'.$page.'.php'); } ?>
<?php if (file_exists('_loader/_'.$page.'.php')) { include('_loader/_'.$page.'.php'); } ?>
<?php include('_view/_'.$page.'.php'); ?>
