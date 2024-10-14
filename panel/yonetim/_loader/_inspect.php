<?php
if ($i=="category") {
  $id=varsql($_POST['process_id']);
  $result_category=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `devices_category` WHERE `id` = '$id'"));
  $device=mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices`.`name` as `name`, `devices`.`price` as `price`, `devices`.`code` as `code`, `devices`.`stack` as `stack`, `devices`.`weight` as `weight`, `devices`.`manufacturer` as `manufacturer`, `devices`.`created_at` as `created_at`, `devices_category`.`title` as `category_title`  FROM `devices` INNER JOIN `devices_category` ON `devices`.`category_id`=`devices_category`.`id` WHERE `devices`.`deleted_at` = '0' AND `devices`.`category_id` = '$id' ORDER BY `id` ASC");
  while ($row = @mysqli_fetch_assoc($device)) {
    $result_device[] = $row;
  }
}
if ($i=="device") {
  $id=varsql($_POST['process_id']);
  $result_device=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `devices` WHERE `id` = '$id'"));
  $get_category=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title` FROM `devices_category` WHERE `id` = '$result_device[category_id]'"));
  $customer=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`email` as `email`, `customers`.`gsm` as `gsm`, `customers`.`country` as `country`, `customers`.`city` as `city`, `customers`.`town` as `town`, `customers`.`online_at` as `online_at`, `customers`.`created_at` as `created_at`, `dealers`.`title` as `dealer_title`, `companies`.`name` as `company_name` FROM `customers` INNER JOIN `dealers` ON   `dealers`.`id`=`customers`.`dealer_id` INNER JOIN `companies` ON `customers`.`company_id`=`companies`.`id` INNER JOIN `customers_device` ON `customers_device`.`customer_id`=`customers`.`id` WHERE `customers_device`.`device_id`='$id' AND `customers`.`deleted_at` = '0' ORDER BY `customers`.`id`");
  while ($row = @mysqli_fetch_assoc($customer)) {
    $result_customer[] = $row;
  }
}
if ($i=="company") {
  $id=varsql($_POST['process_id']);
  $result_company=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `companies` WHERE `id` = '$id'"));
  $get_country=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title` FROM `countries` WHERE `id` = '$result_company[country]'"));
  $get_language=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title` FROM `languages` WHERE `code` = '$result_company[language]'"));
  $dealer=mysqli_query($con, "SELECT `dealers`.`id` as `id`, `dealers`.`dealer_code` as `dealer_code`, `dealers`.`title` as `title`, `dealers`.`username` as `username`, `dealers`.`gsm` as `gsm`, `dealers`.`email` as `email`, `dealers`.`city` as `city`, `dealers`.`online_at` as `online_at`, `dealers`.`created_at` as `created_at`, `companies`.`name` as `company_name`, COUNT(`customers`.`id`) as `count` FROM `dealers` INNER JOIN `companies` ON `dealers`.`company_id`=`companies`.`id` INNER JOIN `customers` ON `customers`.`dealer_id`=`dealers`.`id` WHERE `dealers`.`deleted_at` = '0' AND `dealers`.`company_id` = '$id' ORDER BY `dealers`.`id` ASC");
  while ($row = @mysqli_fetch_assoc($dealer)) {
    $result_dealer[] = $row;
  }
}
if ($i=="dealer") {
  $id=varsql($_POST['process_id']);
  $result_dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `dealers` WHERE `id` = '$id'"));
  $get_company=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `name` FROM `companies` WHERE `id` = '$result_dealer[company_id]'"));
  $get_language=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title` FROM `languages` WHERE `code` = '$result_dealer[language]'"));
  $employee=mysqli_query($con, "SELECT * FROM `employee` WHERE `dealer_id` = '$id' AND `deleted_at` = '0' ORDER BY `id` ASC");
  while ($row = @mysqli_fetch_assoc($employee)) {
    $result_employee[] = $row;
  }
}
if ($i=="employee") {
  $id=varsql($_POST['process_id']);
  $result_employee=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `employee` WHERE `id` = '$id'"));
  $get_dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`,`company_id` FROM `dealers` WHERE `code` = '$result_employe[dealer_id]'"));
  $get_company=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `name` FROM `companies` WHERE `id` = '$get_dealer[company_id]'"));
  $get_permission=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title` FROM `permissions` WHERE `id` = '$result_employe[permission]'"));
  $customer=mysqli_query($con, "SELECT * FROM `customers` INNER JOIN `customers_employee` ON `customers_employee`.`customer_id` = `customers`.`id` WHERE `customers_employee`.`employee_id` = '$result_employee[id]' AND (`customers`.`status` = '1' AND `customers`.`deleted_at` = '0') ORDER BY `customers`.`id` ASC");
  while ($row = @mysqli_fetch_assoc($customer)) {
    $result_customer[] = $row;
  }
}
if ($i=="customer") {
  $id=varsql($_POST['process_id']);
  if ((!isset($id)) || (empty($id))) {
    header("Location: ".DEALER_URL."customers/list");
    exit();
  }
  $customer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `customers` WHERE `id` = '$id'"));
  $get_country=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title` FROM `countries` WHERE `id` = '$customer[country]'"));
  $get_dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`,`company_id`,`currency` FROM `dealers` WHERE `id` = '$customer[dealer_id]'"));
  $get_company=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `name` FROM `companies` WHERE `id` = '$get_dealer[company_id]'"));
  $customer_devices_count=mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers_device` WHERE `customer_id` = '$id' AND (`deleted_at` = '0' AND `status` = '1')"));
  //Customer's Devices List
  $result_customer_devices = array();
  $customer_devices=mysqli_query($con, "SELECT `customers_device`.`id` as `id`, `customers_device`.`serial` as `serial`, `devices`.`name` as `name`, `devices_category`.`title` as `title`, `customers_device`.`description` as `description`, `customers_device`.`created_at` as `created_at`, `devices`.`manufacturer` as `manufacturer` FROM `customers_device` INNER JOIN `devices` ON `devices`.`id` = `customers_device`.`device_id` INNER JOIN `devices_category` ON `devices_category`.`id` = `devices`.`category_id` WHERE `customers_device`.`customer_id` = '$id' AND (`customers_device`.`deleted_at` = '0' AND `customers_device`.`status` = '1')");
  while ($row = @mysqli_fetch_assoc($customer_devices)) {
    $result_customer_devices[] = $row;
  }
  //All Installment List
  $result_installments = array();
  $installments=mysqli_query($con, "SELECT `id`, `note`, `status` FROM `installments` WHERE `customer_id` = '$id' AND `deleted_at` = '0' ORDER BY `id` DESC");
  while ($row = @mysqli_fetch_assoc($installments)) {
    $sub_installments_count=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `installments_inside` WHERE `installment_id` = '$row[id]' AND `status` = '0'"));
    if ($sub_installments_count['total']==0) {
      $installments_payed=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`, `price`, `date`,`status` FROM `installments_inside` WHERE `installment_id` = '$row[id]' AND `status` = '1' ORDER BY `id` ASC LIMIT 1"));
    } else {
      $installments_payed=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`, `price`, `date`,`status` FROM `installments_inside` WHERE `installment_id` = '$row[id]' AND `status` = '0' ORDER BY `id` ASC LIMIT 1"));
    }
    $row['price'] = $installments_payed['price'];
    $row['date'] = $installments_payed['date'];
    $row['in_status'] = $installments_payed['status'];
    $row['set_id'] = $installments_payed['id'];
    $result_installments[] = $row;
  }
  //All Defects List
  $result_defects = array();
  $defects=mysqli_query($con, "SELECT `id`, `problem_note`, `solution_note`, `created_at`, `status` FROM `defects` WHERE `customer_id` = '$id' AND `deleted_at` = '0' ORDER BY `id` DESC");
  while ($row = @mysqli_fetch_assoc($defects)) {
      $result_defects[] = $row;
  }
  //All Notifications List
  $result_notifications_sms = array();
  $notification_sms=mysqli_query($con, "SELECT `customers_message`.`id` as `id`, `messages`.`title` as `title`, `customers_message`.`content` as `content`, `customers_message`.`date` as `date`, `customers_message`.`status` as `status` FROM `customers_message` INNER JOIN `messages` ON `customers_message`.`message_id`=`messages`.`id` WHERE `customers_message`.`customer_id` = '$id' ORDER BY `id` DESC ");
  while ($row = @mysqli_fetch_assoc($notifications_sms)) {
    $result_notifications_sms[] = $row;
  }
  $result_notifications_mail = array();
  $notification_mail=mysqli_query($con, "SELECT `customers_email`.`id` as `id`, `emails`.`title` as `title`, `customers_email`.`date` as `date`,`customers_email`.`content` as `content`, `customers_email`.`status` as`status` FROM `customers_email` INNER JOİN `email` ON `customers_email`.`email_id`=`email`.`id` WHERE `customers_email`.`customer_id`= '$id' ORDER BY `id` DESC ");
  while ($row = @mysqli_fetch_assoc($notifications_mail)) {
    $result_notifications_mail[] = $row;
  }
  //All Customer Employee List
  $result_customer_employee = array();
  $customer_employee=mysqli_query($con, "SELECT `employee`.`id` as `id`, `employee`.`firstname` as `firstname`, `employee`.`lastname` as `lastname`, `employee`.`online_at` as `online_at`, `employee`.`email` as `email`, `employee`.`gsm` as `gsm` FROM `employee` INNER JOIN `customers_employee` ON `customers_employee`.`employee_id` = `employee`.`id` INNER JOIN `customers` ON `customers_employee`.`customer_id` = `customers`.`id` WHERE `employee`.`dealer_id` = '$customer[dealer_id]' AND `employee`.`status` = '1' ORDER BY `customers_employee`.`id` ASC ");
  while ($row = @mysqli_fetch_assoc($customer_employee)) {
    $result_customer_employee[] = $row;
  }
  //All Image List
  $result_images = array();
  $images=mysqli_query($con, "SELECT `id`, `sfx`, `description`, `created_at` FROM `customers_image` WHERE `customer_id` = '$id' AND `status` = '1' ORDER BY `id` DESC");
  while ($row = @mysqli_fetch_assoc($images)) {
    $result_images[] = $row;
  }
}
  $inject_footer = '
    <script src="'.ADMIN_URL.'_assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/metisMenu.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.nanoscroller.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/waves.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/pace.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/data-tables/jquery.dataTables.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/data-tables/dataTables.tableTools.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/data-tables/dataTables.bootstrap.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/data-tables/dataTables.responsive.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/data-tables/tables-data.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/custom.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/ext.js" type="text/javascript"></script>
    <script type="text/javascript">getfulldealeraddress(); getcitycustomeraddress(); </script>
  ';
?>
