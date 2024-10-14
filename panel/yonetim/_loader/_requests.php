<?php
  if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
    $cr_page = $_POST['pg'];
    $start = ($cr_page - 1) * $cf['pagination'];
  } else {
    $cr_page = 1;
    $start = 0;
    $end = $cf['pagination'];
  }
  if (isset($_POST['process_id'])) {
  	$process_id=varsql($_POST['process_id']);
  	$requests=mysqli_query($con, "SELECT `message_requests`.`id` as `id`, `dealers`.`title` as `dealer_title`, `message_requests`.`email` as `email`, `message_requests`.`sms` as `sms`, `message_requests`.`notification` as `notification`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `message_requests`.`created_at` as `created_at`, `message_requests`.`content` as `content`, `message_requests`.`status` as `status` FROM `message_requests` LEFT JOIN `dealers` ON `dealers`.`id`=`message_requests`.`dealer_id` LEFT JOIN `customers` ON `customers`.`id`=`message_requests`.`customer_id` WHERE `message_requests`.`id` = '$process_id' GROUP BY `message_requests`.`id` ORDER BY `message_requests`.`id` DESC LIMIT $start, $cf[pagination]");
  	while ($row = @mysqli_fetch_assoc($requests)) {
  	  $result_requests[] = $row;
  	}
  	$counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `message_requests`"));
  } else {
  	$requests=mysqli_query($con, "SELECT `message_requests`.`id` as `id`, `dealers`.`title` as `dealer_title`, `message_requests`.`email` as `email`, `message_requests`.`sms` as `sms`, `message_requests`.`notification` as `notification`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `message_requests`.`created_at` as `created_at`, `message_requests`.`content` as `content`, `message_requests`.`status` as `status` FROM `message_requests` LEFT JOIN `dealers` ON `dealers`.`id`=`message_requests`.`dealer_id` LEFT JOIN `customers` ON `customers`.`id`=`message_requests`.`customer_id` GROUP BY `message_requests`.`id` ORDER BY `message_requests`.`id` DESC LIMIT $start, $cf[pagination]");
  	while ($row = @mysqli_fetch_assoc($requests)) {
  	  $result_requests[] = $row;
  	}
  	$counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `message_requests`"));
  }
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'requests/');
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
?>
