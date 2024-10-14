<?php
  if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
    $cr_page = $_POST['pg'];
    $start = ($cr_page - 1) * $cf['pagination'];
  } else {
    $cr_page = 1;
    $start = 0;
    $end = $cf['pagination'];
  }
  $logs=mysqli_query($con, "SELECT * FROM `logs` ORDER BY `id` DESC LIMIT $start, $cf[pagination]");
  while ($row = @mysqli_fetch_assoc($logs)) {
    $result_logs[] = $row;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `logs`"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'logs/');

$inject_footer = '
  <script src="'.ADMIN_URL.'_assets/js/jquery.min.js" type="text/javascript"></script>
  <script src="'.ADMIN_URL.'_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="'.ADMIN_URL.'_assets/js/metisMenu.min.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/jquery.nanoscroller.min.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/waves.min.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/pace.min.js"></script>
  <script src="'.ADMIN_URL.'_assets/js/custom.js" type="text/javascript"></script>
  <script src="'.ADMIN_URL.'_assets/js/ext.js" type="text/javascript"></script>
';
?>
