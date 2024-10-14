<?php
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $get = mysqli_query($con, "SELECT `id`,`title` FROM `devices_category` WHERE `status` = '1' AND `deleted_at` = '0'");
  while ($row = @mysqli_fetch_assoc($get)) {
      $result_category[] = $row;
  }
  print json_encode($result_category);
?>
