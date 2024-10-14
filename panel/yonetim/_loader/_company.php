<?php
  if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
    $cr_page = $_POST['pg'];
    $start = ($cr_page - 1) * $cf['pagination'];
  } else {
    $cr_page = 1;
    $start = 0;
    $end = $cf['pagination'];
  }
  $company=mysqli_query($con, "SELECT `companies`.`id` as `id`, `companies`.`name` as `name`, `companies`.`username` as `username`, `companies`.`phone` as `phone`, `companies`.`email` as `email`, `companies`.`website` as `website`, `companies`.`online_at` as `online_at`, `companies`.`created_at` as `created_at`, `companies`.`status` as `status`, COUNT(`dealers`.`id`) as `count` FROM `companies` LEFT JOIN `dealers` ON `dealers`.`company_id`=`companies`.`id` WHERE `companies`.`deleted_at` = '0'  GROUP BY `companies`.`id` ORDER BY `companies`.`id` ASC LIMIT $start, $cf[pagination]");
  while ($row = @mysqli_fetch_assoc($company)) {
    $result_company[] = $row;
  }
  $country=mysqli_query($con, "SELECT `title`,`code` FROM `countries` WHERE `status` = '1'");
  while($result = @mysqli_fetch_assoc($country)) {
    $result_country[] = $result;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `companies` WHERE `deleted_at` = '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'company/');
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
