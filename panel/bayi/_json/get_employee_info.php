<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $get = mysqli_query($con, "SELECT `username`, `firstname`, `lastname`, `email`, `gsm`, `address`, `status` FROM `dealers_employee` WHERE `id` = '$id' AND `dealer_id` = '$_SESSION[dealer_id]'");
  while ($row = @mysqli_fetch_assoc($get)) {
      $result_employee[] = $row;
  }
  print json_encode($result_employee);
?>
