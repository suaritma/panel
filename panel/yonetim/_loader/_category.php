<?php
  if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
    $cr_page = $_POST['pg'];
    $start = ($cr_page - 1) * $cf['pagination'];
  } else {
    $cr_page = 1;
    $start = 0;
    $end = $cf['pagination'];
  }
  $category=mysqli_query($con, "SELECT `devices_category`.`id` as `id`, `devices_category`.`title` as `title`, `devices_category`.`created_at` as `created_at`, `devices_category`.`updated_at` as `updated_at`, `devices_category`.`status` as `status`, COUNT(`devices`.`id`) as `count` FROM `devices_category` LEFT JOIN `devices` ON(`devices`.`category_id`=`devices_category`.`id` OR `devices`.`category_id` IS NULL) WHERE `devices_category`.`deleted_at` = '0' GROUP BY `devices_category`.`id` ORDER BY `devices_category`.`id` ASC LIMIT $start, $cf[pagination]");
  while ($row = @mysqli_fetch_assoc($category)) {
    $result_category[] = $row;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `devices_category` WHERE `deleted_at` = '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'category/');
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
