<?php
if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
  $cr_page = $_POST['pg'];
  $start = ($cr_page - 1) * $cf['pagination'];
} else {
  $cr_page = 1;
  $start = 0;
  $end = $cf['pagination'];
}
if ($i=='customer') {
  $deleted=mysqli_query($con, "SELECT `customers`.`id` as `id`,`customers`.`firstname` as `firstname`,`customers`.`lastname` as `lastname`,`customers`.`gsm` as `gsm`,`customers`.`city` as `city`, `customers`. `created_at`, `customers`. `deleted_at`, `dealers`.`title` as `title` FROM `customers` INNER JOIN `dealers` ON `customers`.`dealer_id` = `dealers`.`id` WHERE `customers`.`deleted_at` != '0' ORDER BY `customers`.`id` DESC");
  while ($row = @mysqli_fetch_assoc($deleted)) {
    $result_deleted[] = $row;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` WHERE `deleted_at` != '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'trash/customer');
}
if ($i=='category') {
  $deleted=mysqli_query($con, "SELECT `id`,`title`,`created_at`,`deleted_at` FROM `devices_category` WHERE `deleted_at` != '0' ORDER BY `id` DESC");
  while ($row = @mysqli_fetch_assoc($deleted)) {
    $result_deleted[] = $row;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `devices_category` WHERE `deleted_at` != '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'trash/category');
}
if ($i=='device') {
  $deleted=mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices`.`name` as `name`, `devices`.`manufacturer` as `manufacturer`, `devices`.`price` as `price`, `devices`.`code` as `code`, `devices`.`created_at` as `created_at`, `devices`.`deleted_at` as `deleted_at`, `devices_category`.`title` as `category_title`, `devices_category`.`id` as `category_id` FROM `devices` INNER JOIN `devices_category` ON `devices_category`.`id` = `devices`.`category_id` WHERE `devices`.`deleted_at` != '0' ORDER BY `id` DESC");
  while ($row = @mysqli_fetch_assoc($deleted)) {
    $result_deleted[] = $row;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `devices` WHERE `deleted_at` != '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'trash/device');

}
if ($i=='dealer') {
  $deleted=mysqli_query($con, "SELECT `dealers`.`id` as `id`, `dealers`.`dealer_code` as `dealer_code`, `dealers`.`title` as `title`, `dealers`.`username` as `username`, `dealers`.`gsm` as `gsm`, `dealers`.`email` as `email`, `dealers`.`city` as `city`, `dealers`.`deleted_at` as `deleted_at`, `dealers`.`created_at` as `created_at`, `companies`.`name` as `company_name`, COUNT(`customers`.`id`) as `count` FROM `dealers` INNER JOIN `companies` ON `dealers`.`company_id`=`companies`.`id` INNER JOIN `customers` ON `customers`.`dealer_id`=`dealers`.`id` WHERE `dealers`.`deleted_at` != '0' ORDER BY `dealers`.`id` ASC");
  while ($row = @mysqli_fetch_assoc($deleted)) {
    if (!empty($row['id'])) {
      $result_deleted[] = $row;
    }
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `dealers` WHERE `deleted_at` != '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'trash/dealer');

}
if ($i=='company') {
  $deleted=mysqli_query($con, "SELECT `id`, `name`, `username`, `phone`, `email`, `website`, `deleted_at`, `created_at`, `status` FROM `companies` WHERE `deleted_at` != '0' ORDER BY `id` ASC");
  while ($row = @mysqli_fetch_assoc($deleted)) {
    $result_deleted[] = $row;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `companies` WHERE `deleted_at` != '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'trash/company');

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
?>
