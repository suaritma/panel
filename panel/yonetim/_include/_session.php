<?php
  if ((!isset($_SESSION['admin_language'])) || (empty($_SESSION['admin_language']))) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if (($lang=='tr') || ($lang=='en') || ($lang=='de')) {
      $_SESSION['admin_language'] = $lang;
    } else {
      $_SESSION['admin_language'] = 'tr';
    }
  }
  if ((!isset($_SESSION['admin_id'])) || (empty($_SESSION['admin_id']))) {
    if ($page!='index') {
      header("Location: " . ADMIN_URL . "index/");
      exit();
    }
  } else {
    if ($page=='index') {
      header("Location: " . ADMIN_URL . "dashboard/");
      exit();
    }
  }
?>
