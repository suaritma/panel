<?php
  if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
    $cr_page = $_POST['pg'];
    $start = ($cr_page - 1) * $cf['pagination'];
  } else {
    $cr_page = 1;
    $start = 0;
    $end = $cf['pagination'];
  }
  if ((isset($_POST['process'])) && (($_POST['process']=="category") || ($_POST['process']=="manufacturer"))) {
    $process_id=varsql($_POST['process_id']);
    if ($_POST['process']=="category") {
      $device=mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices`.`name` as `name`, `devices`.`price` as `price`, `devices`.`code` as `code`, `devices`.`stack` as `stack`, `devices`.`weight` as `weight`, `devices`.`manufacturer` as `manufacturer`, `devices`.`created_at` as `created_at`, `devices_category`.`title` as `category_title`  FROM `devices` INNER JOIN `devices_category` ON `devices`.`category_id`=`devices_category`.`id` WHERE `devices`.`deleted_at` = '0' AND `devices`.`category_id` = '$process_id' ORDER BY `id` ASC LIMIT $start, $cf[pagination]");
    }
    if ($_POST['process']=="manufacturer") {
      $device=mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices`.`name` as `name`, `devices`.`price` as `price`, `devices`.`code` as `code`, `devices`.`stack` as `stack`, `devices`.`weight` as `weight`, `devices`.`manufacturer` as `manufacturer`, `devices`.`created_at` as `created_at`, `devices_category`.`title` as `category_title`  FROM `devices` INNER JOIN `devices_category` ON `devices`.`category_id`=`devices_category`.`id` WHERE `devices`.`deleted_at` = '0' AND `devices`.`manufacturer` = '$process_id' ORDER BY `id` ASC LIMIT $start, $cf[pagination]");
    }
  } else {
    $device=mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices`.`name` as `name`, `devices`.`price` as `price`, `devices`.`code` as `code`, `devices`.`stack` as `stack`, `devices`.`weight` as `weight`, `devices`.`manufacturer` as `manufacturer`, `devices`.`created_at` as `created_at`, `devices_category`.`title` as `category_title`, `devices`.`category_id` as `category_id`  FROM `devices` INNER JOIN `devices_category` ON `devices`.`category_id`=`devices_category`.`id` WHERE `devices`.`deleted_at` = '0' ORDER BY `id` ASC LIMIT $start, $cf[pagination]");
  }
  while ($row = @mysqli_fetch_assoc($device)) {
    $result_device[] = $row;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `devices` WHERE `deleted_at` = '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'device/');
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
    <script type="text/javascript"> getcategorydevices(); </script>
  ';
?>
