<?php
  if ($i=='source') {
    $ins=mysqli_query($con, "SELECT * FROM `emails`");
    while ($row = @mysqli_fetch_assoc($ins)) {
      $result_ins[$row['type']] = $row;
    }
    for ($j=1; $j<=20; $j++) {
      if (isset($result_ins[$j])) {
        $set[$j.'_title'] = $result_ins[$j]['title'];
        $set[$j.'_content'] = $result_ins[$j]['content'];
        $set[$j.'_status'] = $result_ins[$j]['status'];
      }
    }
  }
  if ($i=='service') {
    $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `emails_config` WHERE `id` = '1'"));
    $sender_name  = $get['sender_name'];
    $sender_address = $get['sender_address'];
    $sender_pass  = $get['sender_pass'];
    $server_ip  = $get['server_ip'];
    $server_port = $get['server_port'];
  }
  $inject_footer = '
    <script src="'.ADMIN_URL.'_assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/metisMenu.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.nanoscroller.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.flot.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.flot.resize.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.flot.time.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.flot.threshold.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.flot.axislabels.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/pace.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/waves.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/custom.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/dist/js/tooltipster.bundle.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/tooltipster-follower.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/tooltipster-discovery.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery-ui.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/accordion.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/ext.js"></script>
  ';
?>
