<?php
  include('../db.php');
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  if (isset($_SESSION['simulate'])) {
      $simulate=$_SESSION['simulate'];
  	  unset($_SESSION['simulate']);
      if ($simulate=='admin_to_company') {
  	    unset($_SESSION['company_id']);
  	    unset($_SESSION['company_name']);
        header("Location: ".ADMIN_URL."dashboard/");
        exit();
      } elseif ($simulate=='admin_to_dealer') {
  	    unset($_SESSION['dealer_id']);
  	    unset($_SESSION['dealer_title']);
        header("Location: ".ADMIN_URL."dashboard/");
        exit();
      } elseif ($simulate=='admin_to_customer') {
  	    unset($_SESSION['dealer_id']);
  	    unset($_SESSION['dealer_title']);
        header("Location: ".ADMIN_URL."dashboard/");
        exit();
      } elseif ($simulate=='admin_to_employee') {
  	    unset($_SESSION['dealer_id']);
  	    unset($_SESSION['dealer_title']);
  	    unset($_SESSION['employee_id']);
  	    unset($_SESSION['employee_name']);
        header("Location: ".ADMIN_URL."dashboard/");
        exit();
      } elseif ($simulate=='company_to_dealer') {
        if (isset($_SESSION['admin_id'])) {
          $_SESSION['simulate'] = 'admin_to_company';
  	      unset($_SESSION['dealer_id']);
  	      unset($_SESSION['dealer_title']);
          header("Location: ".DEALER_URL."company/");
          exit();
        } else {
  	      unset($_SESSION['dealer_id']);
  	      unset($_SESSION['dealer_title']);
          header("Location: ".DEALER_URL."company/");
          exit();
        }
      } elseif ($simulate=='dealer_to_employee') {
          if ((isset($_SESSION['admin_id'])) && (!isset($_SESSION['company_id']))) {
            $_SESSION['simulate'] = 'admin_to_dealer';
  	        unset($_SESSION['employee_id']);
  	        unset($_SESSION['employee_name']);
            header("Location: ".DEALER_URL."dashboard/");
            exit();
          } elseif ((!isset($_SESSION['admin_id'])) && (isset($_SESSION['company_id']))) {
            $_SESSION['simulate'] = 'company_to_dealer';
  	        unset($_SESSION['employee_id']);
  	        unset($_SESSION['employee_name']);
            header("Location: ".DEALER_URL."dashboard/");
            exit();
          } else {
  	        unset($_SESSION['employee_id']);
  	        unset($_SESSION['employee_name']);
            header("Location: ".DEALER_URL."dashboard/");
            exit();
          }
      } else {
        $_SESSION = array();
        header("Location: ".DEALER_URL."index/");
        exit();
      }
  } else {
    $_SESSION = array();
    header("Location: ".DEALER_URL."index/");
    exit();
  }

?>
