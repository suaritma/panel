<?php
if ((isset($_POST['search'])) && (!empty($_POST['search']))) {
  $search=varsql(ucwords(strtolower($_POST['search'])));
  $category=mysqli_query($con, "SELECT `devices_category`.`id` as `id`, `devices_category`.`title` as `title`, `devices_category`.`created_at` as `created_at`, `devices_category`.`updated_at` as `updated_at`, `devices_category`.`status` as `status`, COUNT(`devices`.`id`) as `count` FROM `devices_category` LEFT JOIN `devices` ON(`devices`.`category_id`=`devices_category`.`id` OR `devices`.`category_id` IS NULL) WHERE `devices_category`.`deleted_at` = '0' AND `devices_category`.`title` LIKE '%$search%' GROUP BY `devices_category`.`id` ORDER BY `devices_category`.`id` ASC");
  while ($row = @mysqli_fetch_assoc($category)) {
    $result_category[] = $row;
  }
  $device=mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices`.`name` as `name`, `devices`.`price` as `price`, `devices`.`code` as `code`, `devices`.`stack` as `stack`, `devices`.`weight` as `weight`, `devices`.`manufacturer` as `manufacturer`, `devices`.`created_at` as `created_at`, `devices_category`.`title` as `category_title`, `devices`.`category_id` as `category_id`  FROM `devices` INNER JOIN `devices_category` ON `devices`.`category_id`=`devices_category`.`id` WHERE `devices`.`deleted_at` = '0' AND `devices`.`name` LIKE '%$search%' ORDER BY `id` ASC");
  while ($row = @mysqli_fetch_assoc($device)) {
    $result_device[] = $row;
  }
  $company=mysqli_query($con, "SELECT `companies`.`id` as `id`, `companies`.`name` as `name`, `companies`.`username` as `username`, `companies`.`phone` as `phone`, `companies`.`email` as `email`, `companies`.`website` as `website`, `companies`.`online_at` as `online_at`, `companies`.`created_at` as `created_at`, `companies`.`status` as `status`, COUNT(`dealers`.`id`) as `count` FROM `companies` LEFT JOIN `dealers` ON `dealers`.`company_id`=`companies`.`id` WHERE `companies`.`deleted_at` = '0' AND (`companies`.`name` LIKE '%$search%' OR `companies`.`username` LIKE '%$search%' OR `companies`.`phone` LIKE '%$search%' OR `companies`.`email` LIKE '%$search%' OR `companies`.`website` LIKE '%$search%') GROUP BY `companies`.`id` ORDER BY `companies`.`id` ASC");
  while ($row = @mysqli_fetch_assoc($company)) {
    $result_company[] = $row;
  }
  $country=mysqli_query($con, "SELECT `title`,`code` FROM `countries` WHERE `status` = '1'");
  while($result = @mysqli_fetch_assoc($country)) {
    $result_country[] = $result;
  }
  $dealer=mysqli_query($con, "SELECT `dealers`.`id` as `id`, `dealers`.`dealer_code` as `dealer_code`, `dealers`.`title` as `title`, `dealers`.`username` as `username`, `dealers`.`gsm` as `gsm`, `dealers`.`email` as `email`, `dealers`.`city` as `city`, `dealers`.`online_at` as `online_at`, `dealers`.`created_at` as `created_at`, `companies`.`name` as `company_name`, COUNT(`customers`.`id`) as `count` FROM `dealers` LEFT JOIN `companies` ON `dealers`.`company_id`=`companies`.`id` LEFT JOIN   `customers` ON `customers`.`dealer_id`=`dealers`.`id` WHERE `dealers`.`deleted_at` = '0' AND (`dealers`.`dealer_code` LIKE '%$search%' OR `dealers`.`title` LIKE '%$search%' OR `dealers`.`username` LIKE '%$search%' OR `dealers`.`gsm` LIKE '%$search%' OR `dealers`.`email` LIKE '%$search%') GROUP BY `dealers`.`id` ORDER BY `dealers`.`id` ASC");
  while ($row = @mysqli_fetch_assoc($dealer)) {
    $result_dealer[] = $row;
  }
  $customer=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`email` as `email`, `customers`.`gsm` as `gsm`, `customers`.`country` as `country`, `customers`.`city` as `city`, `customers`.`town` as `town`, `customers`.`online_at` as `online_at`, `customers`.`created_at` as `created_at`, `dealers`.`title` as `dealer_title`, `companies`.`name` as `company_name` FROM `customers` INNER JOIN `dealers` ON   `dealers`.`id`=`customers`.`dealer_id` INNER JOIN `companies` ON `customers`.`company_id`=`companies`.`id` WHERE `customers`.`deleted_at` = '0' AND (`customers`.`email` LIKE '%$search%' OR `customers`.`gsm` LIKE '%$search%' OR CONCAT(`customers`.`firstname`, ' ', `customers`.`lastname`) LIKE '%$search%') ORDER BY `customers`.`id` ASC");
  while ($row = @mysqli_fetch_assoc($customer)) {
    $result_customer[] = $row;
  }
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
