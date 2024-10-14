<?php
  include('../db.php');
  unset($_SESSION["admin_id"]);
  unset($_SESSION["admin_title"]);
  header("Location: " . ADMIN_URL . "index/");
  exit();
?>
