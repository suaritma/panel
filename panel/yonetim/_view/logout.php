<?php
  include('../db.php');
  unset($_SESSION["dealer_id"]);
  unset($_SESSION["dealer_title"]);
  header("Location: " . ADMIN_URL . "index/");
  exit();
?>
