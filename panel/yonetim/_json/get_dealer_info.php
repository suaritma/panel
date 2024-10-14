<?php
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $get = mysqli_query($con, "SELECT `id`,`title` FROM `dealers` WHERE (`status` = '1' AND `deleted_at` = '0') AND `company_id` = '$id'");
  while ($row = @mysqli_fetch_assoc($get)) {
      $result_dealer[] = $row;
  }
  print json_encode($result_dealer);
?>
