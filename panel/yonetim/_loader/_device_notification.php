<?php
$process_id=varsql($_POST['process_id']);
$ins=mysqli_query($con, "SELECT * FROM `devices_notification` WHERE `device_id` = '$process_id'");
while ($row = @mysqli_fetch_assoc($ins)) {
  $result_ins[$row['notify'].'_'.$row['type']] = $row;
}
for ($i=1; $i<=3; $i++) {
  for ($j=1; $j<=10; $j++) {
    if (isset($result_ins[$i.'_'.$j])) {
      $set[$i.'_'.$j.'_title'] = $result_ins[$i.'_'.$j]['title'];
      $set[$i.'_'.$j.'_content'] = $result_ins[$i.'_'.$j]['content'];
      $set[$i.'_'.$j.'_status'] = $result_ins[$i.'_'.$j]['status'];
    }
  }
}
$inject_footer = '
  <script src="'.ADMIN_URL.'_assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="'.ADMIN_URL.'_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="'.ADMIN_URL.'_assets/js/metisMenu.min.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/jquery.nanoscroller.min.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/waves.min.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/pace.min.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/jquery-jvectormap-world-mill-en.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/custom.js" type="text/javascript"></script>
  <script src="'.ADMIN_URL.'_assets/js/ext.js" type="text/javascript"></script>
';
