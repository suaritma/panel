<?php
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $get = mysqli_query($con, "SELECT `id`,`name` FROM `companies` WHERE `status` = '1' AND `deleted_at` = '0'");
  while ($row = @mysqli_fetch_assoc($get)) {
      $result_company[] = $row;
  }
  print json_encode($result_company);
?>
