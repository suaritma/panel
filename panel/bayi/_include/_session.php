<?php
  if ((!isset($_SESSION['dealer_language'])) || (empty($_SESSION['dealer_language']))) {
    $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
    if (($lang=='tr') || ($lang=='en') || ($lang=='de')) {
      $_SESSION['dealer_language'] = $lang;
    } else {
      $_SESSION['dealer_language'] = 'tr';
    }
  }
  if ((!isset($_SESSION['company_id'])) || (empty($_SESSION['company_id']))) {
    if ((!isset($_SESSION['dealer_id'])) || (empty($_SESSION['dealer_id']))) {
      if (($page!='index') && ($page!='remember') && ($page!='reset')) {
        header("Location: " . DEALER_URL . "index/");
        exit();
      }
    } else {
      if ($page=='index') {
        header("Location: " . DEALER_URL . "dashboard/");
        exit();
      }
    }
  }
?>
