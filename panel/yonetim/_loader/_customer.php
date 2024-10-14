<?php
  if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
    $cr_page = $_POST['pg'];
    $start = ($cr_page - 1) * $cf['pagination'];
  } else {
    $cr_page = 1;
    $start = 0;
    $end = $cf['pagination'];
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="dealer_id")) {
    $process_id=varsql($_POST['process_id']);
    if ($_POST['process']=="dealer_id") {
      $customer=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`email` as `email`, `customers`.`gsm` as `gsm`, `customers`.`country` as `country`, `customers`.`city` as `city`, `customers`.`town` as `town`, `customers`.`online_at` as `online_at`, `customers`.`created_at` as `created_at`, `dealers`.`title` as `dealer_title`, `companies`.`name` as `company_name` FROM `customers` INNER JOIN `dealers` ON   `dealers`.`id`=`customers`.`dealer_id` INNER JOIN `companies` ON `customers`.`company_id`=`companies`.`id` WHERE `customers`.`deleted_at` = '0' AND `dealers`.`id` = '$process_id' ORDER BY `customers`.`id` ASC LIMIT $start, $cf[pagination]");
    }
  } else {
    $customer=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`email` as `email`, `customers`.`gsm` as `gsm`, `customers`.`country` as `country`, `customers`.`city` as `city`, `customers`.`town` as `town`, `customers`.`online_at` as `online_at`, `customers`.`created_at` as `created_at`, `dealers`.`title` as `dealer_title`, `companies`.`name` as `company_name` FROM `customers` INNER JOIN `dealers` ON   `dealers`.`id`=`customers`.`dealer_id` INNER JOIN `companies` ON `customers`.`company_id`=`companies`.`id` WHERE `customers`.`deleted_at` = '0' ORDER BY `customers`.`id` ASC LIMIT $start, $cf[pagination]");
  }
  while ($row = @mysqli_fetch_assoc($customer)) {
    $result_customer[] = $row;
  }
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` WHERE `deleted_at` = '0'"));
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'customer/');
  $inject_header = '
    <link href="'.ADMIN_URL.'_assets/autocomplete/easy-autocomplete.min.css" rel="stylesheet">
  ';
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
    <script src="'.ADMIN_URL.'_assets/autocomplete/jquery.easy-autocomplete.min.js" type="text/javascript"></script>
    <script type="text/javascript"> getlocationforms(); getlocationformsz(); getcompanydealer(); getcitycustomeraddress(); </script>
  ';
?>
