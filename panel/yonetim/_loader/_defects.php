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
  	$defects=mysqli_query($con, "SELECT `defects`.`id` as `id`, `defects`.`problem_note` as `problem_note`, `defects`.`solution_note` as `solution_note`, `defects`.`created_at` as `created_at`, `defects`.`updated_at` as `updated_at`, `customers`.`id` as `customer_id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `dealers`.`id` as `dealer_id`, `dealers`.`title` as `title`, `devices`.`name` as `name`, `defects`.`status` as `status` FROM `defects` LEFT JOIN `customers` ON `customers`.`id`=`defects`.`customer_id` LEFT JOIN `customers_device` ON `customers_device`.`id`=`defects`.`customer_device_id` LEFT JOIN `devices` ON `devices`.`id`=`customers_device`.`device_id` LEFT JOIN `dealers` ON `dealers`.`id`=`customers`.`dealer_id` WHERE `defects`.`id` = '$process_id' GROUP BY `defects`.`id` ORDER BY `defects`.`id` DESC LIMIT $start, $cf[pagination]");
  	while ($row = @mysqli_fetch_assoc($defects)) {
  	  $result_defects[] = $row;
  	}
  	$counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `defects` WHERE `id` = '$process_id'"));
  } else {
  	$defects=mysqli_query($con, "SELECT `defects`.`id` as `id`, `defects`.`problem_note` as `problem_note`, `defects`.`solution_note` as `solution_note`, `defects`.`created_at` as `created_at`, `defects`.`updated_at` as `updated_at`, `customers`.`id` as `customer_id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `dealers`.`id` as `dealer_id`, `dealers`.`title` as `title`, `devices`.`name` as `name`, `defects`.`status` as `status` FROM `defects` LEFT JOIN `customers` ON `customers`.`id`=`defects`.`customer_id` LEFT JOIN `customers_device` ON `customers_device`.`id`=`defects`.`customer_device_id` LEFT JOIN `devices` ON `devices`.`id`=`customers_device`.`device_id` LEFT JOIN `dealers` ON `dealers`.`id`=`customers`.`dealer_id` GROUP BY `defects`.`id` ORDER BY `defects`.`id` DESC LIMIT $start, $cf[pagination]");
  	while ($row = @mysqli_fetch_assoc($defects)) {
  	  $result_defects[] = $row;
  	}
  	$counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `defects`"));
  }
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'defects/');
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
