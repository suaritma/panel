<?php
// dealer/company
if ($i=='company') {
  $this_month = strtotime(date("Y-m", time()).'-01 00:00:00');
  $last_month = strtotime ('-1 month', $this_month);
  $next_month = strtotime ('+1 month', $this_month);
  $this_month_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COALESCE((SUM(`customers_device`.`price`) + SUM(`customers_service`.`price`)), 0) AS `total` FROM `customers` INNER JOIN `customers_device` ON `customers`.`id`=`customers_device`.`customer_id` INNER JOIN `customers_service` ON `customers`.`id`=`customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`created_at` >= '$this_month' AND `customers_device`.`created_at` >= '$this_month')"));
  $this_month_earn = $this_month_calc['total'];
  $last_month_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COALESCE((SUM(`customers_device`.`price`) + SUM(`customers_service`.`price`)), 0) AS `total` FROM `customers` INNER JOIN `customers_device` ON `customers`.`id`=`customers_device`.`customer_id` INNER JOIN `customers_service` ON `customers`.`id`=`customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND ((`customers_service`.`created_at` >= '$last_month' AND `customers_service`.`created_at` <= '$this_month') AND (`customers_device`.`created_at` >= '$last_month' AND `customers_device`.`created_at` <= '$this_month'))"));
  $last_month_earn = $last_month_calc['total'];
  $this_month_customer_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) AS `total` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND `created_at` >= '$this_month'"));
  $this_month_customer = $this_month_customer_calc['total'];
  $last_month_customer_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) AS `total` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND (`created_at` >= '$last_month' AND `created_at` <= '$this_month')"));
  $last_month_customer = $last_month_customer_calc['total'];
  $this_month_service_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) AS `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`prevservice` <= '$next_month' AND `customers_service`.`prevservice` >= '$this_month')"));
  $this_month_service = $this_month_service_calc['total'];
  $last_month_service_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) AS `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`prevservice` <= '$this_month' AND `customers_service`.`prevservice` >= '$last_month')"));
  $last_month_service = $last_month_service_calc['total'];
  $next_month_service_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) AS `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`nextservice` >= '$this_month' AND `customers_service`.`nextservice` <= '$next_month')"));
  $next_month_service = $next_month_service_calc['total'];
  $company=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `name`,`phone`,`email`,`website`,`tax_office`,`tax_number`,`online_at` FROM `companies` WHERE `id` = '$_SESSION[dealer_company_id]'"));
  $dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `dealer_code`,`email`,`gsm`,`title`,`city`,`town`,`district`,`street`,`address` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
  $message_list=mysqli_query($con, "SELECT `customers_message`.`id` as `id`, `customers_message`.`customer_id` as `customer_id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers_message`.`content` as `content`, `customers_message`.`date` as `date`, `customers_message`.`status` as `status`, `messages`.`title` as `title` FROM `customers_message` INNER JOIN `customers` ON `customers`.`id` = `customers_message`.`customer_id` INNER JOIN `messages` ON `customers_message`.`message_id` = `messages`.`id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' ORDER BY `customers_message`.`id` DESC LIMIT 25");
  while ($row = @mysqli_fetch_assoc($message_list)) {
      $result_message_list[] = $row;
  }
  $email_list=mysqli_query($con, "SELECT `customers_email`.`id` as `id`, `customers_email`.`customer_id` as `customer_id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers_email`.`content` as `content`, `customers_email`.`date` as `date`, `customers_email`.`status` as `status`, `emails`.`title` as `title` FROM `customers_email` INNER JOIN `customers` ON `customers`.`id` = `customers_email`.`customer_id` INNER JOIN `emails` ON `customers_email`.`email_id` = `emails`.`id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' ORDER BY `customers_email`.`id` DESC LIMIT 25");
  while ($row = @mysqli_fetch_assoc($email_list)) {
      $result_email_list[] = $row;
  }
}
// dealer/info
if ($i=='info') {
  $this_month = strtotime(date("Y-m", time()).'-01 00:00:00');
  $last_month = strtotime ('-1 month', $this_month);
  $next_month = strtotime ('+1 month', $this_month);
  $this_month_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COALESCE((SUM(`customers_device`.`price`) + SUM(`customers_service`.`price`)), 0) AS `total` FROM `customers` INNER JOIN `customers_device` ON `customers`.`id`=`customers_device`.`customer_id` INNER JOIN `customers_service` ON `customers`.`id`=`customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`created_at` >= '$this_month' AND `customers_device`.`created_at` >= '$this_month')"));
  $this_month_earn = $this_month_calc['total'];
  $last_month_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COALESCE((SUM(`customers_device`.`price`) + SUM(`customers_service`.`price`)), 0) AS `total` FROM `customers` INNER JOIN `customers_device` ON `customers`.`id`=`customers_device`.`customer_id` INNER JOIN `customers_service` ON `customers`.`id`=`customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND ((`customers_service`.`created_at` >= '$last_month' AND `customers_service`.`created_at` <= '$this_month') AND (`customers_device`.`created_at` >= '$last_month' AND `customers_device`.`created_at` <= '$this_month'))"));
  $last_month_earn = $last_month_calc['total'];
  $this_month_customer_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) AS `total` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND `created_at` >= '$this_month'"));
  $this_month_customer = $this_month_customer_calc['total'];
  $last_month_customer_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) AS `total` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND (`created_at` >= '$last_month' AND `created_at` <= '$this_month')"));
  $last_month_customer = $last_month_customer_calc['total'];
  $this_month_service_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) AS `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`prevservice` <= '$next_month' AND `customers_service`.`prevservice` >= '$this_month')"));
  $this_month_service = $this_month_service_calc['total'];
  $last_month_service_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) AS `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`prevservice` <= '$this_month' AND `customers_service`.`prevservice` >= '$last_month')"));
  $last_month_service = $last_month_service_calc['total'];
  $next_month_service_calc = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) AS `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`nextservice` >= '$this_month' AND `customers_service`.`nextservice` <= '$next_month')"));
  $next_month_service = $next_month_service_calc['total'];
  $company=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `website` FROM `companies` WHERE `id` = '$_SESSION[dealer_company_id]'"));
  $dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `dealer_code`,`email`,`gsm`,`title`,`city`,`town`,`district`,`street`,`address` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
  $count_customers_calc=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]'"));
  $count_customers = $count_customers_calc['total'];
  $count_employee_calc=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `employee` WHERE `dealer_id` = '$_SESSION[dealer_id]'"));
  $count_employee = $count_employee_calc['total'];
  $message_list=mysqli_query($con, "SELECT `customers_message`.`id` as `id`, `customers_message`.`customer_id` as `customer_id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers_message`.`content` as `content`, `customers_message`.`date` as `date`, `customers_message`.`status` as `status`, `messages`.`title` as `title` FROM `customers_message` INNER JOIN `customers` ON `customers`.`id` = `customers_message`.`customer_id` INNER JOIN `messages` ON `customers_message`.`message_id` = `messages`.`id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' ORDER BY `customers_message`.`id` DESC LIMIT 25");
  while ($row = @mysqli_fetch_assoc($message_list)) {
      $result_message_list[] = $row;
  }
  $email_list=mysqli_query($con, "SELECT `customers_email`.`id` as `id`, `customers_email`.`customer_id` as `customer_id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers_email`.`content` as `content`, `customers_email`.`date` as `date`, `customers_email`.`status` as `status`, `emails`.`title` as `title` FROM `customers_email` INNER JOIN `customers` ON `customers`.`id` = `customers_email`.`customer_id` INNER JOIN `emails` ON `customers_email`.`email_id` = `emails`.`id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' ORDER BY `customers_email`.`id` DESC LIMIT 25");
  while ($row = @mysqli_fetch_assoc($email_list)) {
      $result_email_list[] = $row;
  }
  $inject_footer = "<script type=\"text/javascript\"> $(document).ready(function() { getfulladdress(); }); </script>";
}
// dealer/employee
if ($i=='employee') {
  $employee_list=mysqli_query($con, "SELECT `id`,`firstname`,`lastname`,`email`,`gsm`,`online_at`,`created_at`,`status` FROM `employee` WHERE `dealer_id` = '$_SESSION[dealer_id]'");
  while ($row = @mysqli_fetch_assoc($employee_list)) {
      $result_employee_list[] = $row;
  }
  $permission_list=mysqli_query($con, "SELECT `id`,`title` FROM `permissions` WHERE `status` = '1'");
  while ($row = @mysqli_fetch_assoc($permission_list)) {
      $result_permission[] = $row;
  }
}
// dealer/employee_info
if ($i=='employee_info') {
  $id = varsql($_POST['id']);
  $res = @mysqli_fetch_assoc(mysqli_query($con, "SELECT `employee`.`id` as `id`, `employee`.`permission` as `permission_id`, `companies`.`name` as `company_name`, `employee`.`username` as `username`, `employee`.`firstname` as `firstname`, `employee`.`lastname` as `lastname`, `employee`.`email` as `email`, `employee`.`gsm` as `gsm`, `employee`.`address` as `address`, `employee`.`online_at` as `online_at`, `employee`.`updated_at` as `updated_at`, `employee`.`status` as `status` FROM `employee` INNER JOIN `dealers` ON `dealers`.`id`=`employee`.`dealer_id` INNER JOIN `companies` ON `dealers`.`company_id`=`companies`.`id` WHERE `employee`.`id` = '$id' AND `employee`.`dealer_id` = '$_SESSION[dealer_id]'"));
  $mission=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title` FROM `permissions` WHERE `id` = '$res[permission_id]'"));
  $employee_jobs=mysqli_query($con, "SELECT `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `employee_jobs`.`customer_id` as `customer_id`, `employee_jobs`.`date` as `date`, `services`.`name` as `name`, `employee_jobs`.`star` as `stars`, `employee_jobs`.`note` as `note` FROM `employee_jobs` INNER JOIN `customers` ON `customers`.`id` = `employee_jobs`.`customer_id` INNER JOIN `services` ON `services`.`id` = `employee_jobs`.`service_id` WHERE `employee_jobs`.`employee_id` = '$id' ORDER BY `employee_jobs`.`date` DESC LIMIT 15");
  while ($row = @mysqli_fetch_assoc($employee_jobs)) {
    $result_employee_jobs[] = $row;
  }
  if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
    $cr_page = $_POST['pg'];
    $start = ($cr_page - 1) * $cf['pagination'];
  } else {
    $cr_page = 1;
    $start = 0;
    $end = $cf['pagination'];
  }
  $list=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`city` as `city` FROM `customers` INNER JOIN `customers_employee` ON `customers`.`id`=`customers_employee`.`customer_id` WHERE (`customers`.`dealer_id` = '$_SESSION[dealer_id]' AND `customers_employee`.`employee_id` = '$id') AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1') LIMIT $start, $cf[pagination]");
  $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` INNER JOIN `customers_employee` ON `customers`.`id`=`customers_employee`.`customer_id` WHERE (`customers`.`dealer_id` = '$_SESSION[dealer_id]' AND `customers_employee`.`employee_id` = '$id') AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1')"));
  while ($row = @mysqli_fetch_assoc($list)) {
      $result_list[] = $row;
  }
  $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), DEALER_URL.'customers/list');
  $inject_footer = "<script type=\"text/javascript\"> $(document).ready(function() { getlocationfilter(); getcitydealeraddress(); }); </script>";
}
// dealer/payment
if ($i=='payment') {
  $payment_list=mysqli_query($con, "SELECT `id`,`fullname`,`transaction_id`,`amount_transfered`,`currency`,`installment`,`completed`,`refunded`,`created_at`,`status` FROM `payments` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND `deleted_at` = '0' ORDER BY `id` DESC LIMIT 50");
  while ($row = @mysqli_fetch_assoc($payment_list)) {
    $result_payment_list[] = $row;
  }
}
?>
