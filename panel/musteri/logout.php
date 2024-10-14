<?php
  include('../db.php');
  unset($_SESSION["customer_id"]);
  unset($_SESSION["customer_fullname"]);
  header("Location: " . CUSTOMER_URL . "index/");
  exit();
?>
