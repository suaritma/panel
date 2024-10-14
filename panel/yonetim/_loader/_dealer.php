<?php
  if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
    $cr_page = $_POST['pg'];
    $start = ($cr_page - 1) * $cf['pagination'];
  } else {
    $cr_page = 1;
    $start = 0;
    $end = $cf['pagination'];
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="company_id")) {
    $process_id=varsql($_POST['process_id']);
    if ($_POST['process']=="company_id") {
      $dealer=mysqli_query($con, "SELECT `dealers`.`id` as `id`, `dealers`.`dealer_code` as `dealer_code`, `dealers`.`title` as `title`, `dealers`.`username` as `username`, `dealers`.`gsm` as `gsm`, `dealers`.`email` as `email`, `dealers`.`city` as `city`, `dealers`.`online_at` as `online_at`, `dealers`.`created_at` as `created_at`, `companies`.`name` as `company_name`, COUNT(`customers`.`id`) as `count` FROM `dealers` LEFT JOIN `companies` ON `dealers`.`company_id`=`companies`.`id` LEFT JOIN `customers` ON `customers`.`dealer_id`=`dealers`.`id` WHERE `dealers`.`deleted_at` = '0' AND `dealers`.`company_id` = '$process_id' GROUP BY `dealers`.`id` ORDER BY `dealers`.`id` ASC LIMIT $start, $cf[pagination]");
    }
  } else {
    $dealer=mysqli_query($con, "SELECT `dealers`.`id` as `id`, `dealers`.`dealer_code` as `dealer_code`, `dealers`.`title` as `title`, `dealers`.`username` as `username`, `dealers`.`gsm` as `gsm`, `dealers`.`email` as `email`, `dealers`.`city` as `city`, `dealers`.`online_at` as `online_at`, `dealers`.`created_at` as `created_at`, `companies`.`name` as `company_name`, COUNT(`customers`.`id`) as `count` FROM `dealers` LEFT JOIN `companies` ON `dealers`.`company_id`=`companies`.`id` LEFT JOIN   `customers` ON `customers`.`dealer_id`=`dealers`.`id` WHERE `dealers`.`deleted_at` = '0' GROUP BY `dealers`.`id` ORDER BY `dealers`.`id` ASC LIMIT $start, $cf[pagination]");
  }
  while ($row = @mysqli_fetch_assoc($dealer)) {
    $result_dealer[] = $row;
  }
  $company=mysqli_query($con, "SELECT `id`,`name` FROM `companies` WHERE `deleted_at` = '0' AND `status` = '1' ORDER BY `id` ASC");
  while ($row = @mysqli_fetch_assoc($company)) {
    $result_company[] = $row;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `dealers` WHERE `deleted_at` = '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'dealer/');
  $inject_footer = '
    <script src="'.ADMIN_URL.'_assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/metisMenu.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.nanoscroller.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/waves.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/pace.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/custom.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/ext.js" type="text/javascript"></script>
    <script type="text/javascript"> getlocationforms(); getcitydealeraddress(); </script>
  ';
?>
