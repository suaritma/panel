<?php
//COMMON FUNCTIONS
//Getting Service Types to an Array
$result_service = array();
$service=mysqli_query($con, "SELECT `id`,`name` FROM `services` WHERE `status` = '1'");
while ($row = @mysqli_fetch_assoc($service)) {
  $result_service[] = $row;
}
//Getting Next Service (Montaj, Servis)
function nextservicetype($id)
{
  global $con;
  $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `services`.`name` as `name` FROM `customers_service` INNER JOIN `services` ON `services`.`id`=`customers_service`.`customer_id` WHERE `customers_service`.`customer_id` = '$id' AND `customers_service`.`resolved` = '0' ORDER BY `customers_service`.`nextservice` DESC LIMIT 1"));
  if (!empty($get['name'])) {
    return $get['name'];
  } else {
    return "Yok";
  }
}
//Getting Last Service (Montaj, Servis)
function lastservicetype($id)
{
  global $con;
  $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `services`.`name` as `name` FROM `customers_service` INNER JOIN `services` ON `services`.`id`=`customers_service`.`service_id` WHERE `customers_service`.`customer_id` = '$id' AND `customers_service`.`resolved` = '1' ORDER BY `customers_service`.`id` DESC LIMIT 1"));
  if (!empty($get['name'])) {
    return $get['name'];
  } else {
    return "Yok";
  }
}
//Getting Previously Service
function prevservice($id)
{
  global $con;
  $get=mysqli_fetch_assoc(mysqli_query($con, "SELECT `date` FROM `customers_service` WHERE `customer_id` = '$id' ORDER BY `date` DESC LIMIT 1"));
  if (!empty($get)) {
    return date("d/m/Y", $get['date']);
  } else {
    return "Yok";
  }
}
//Getting Next Service
function nextservice($id)
{
  global $con;
  $get=mysqli_fetch_assoc(mysqli_query($con, "SELECT `nextservice` FROM `customers_service` WHERE `customer_id` = '$id' ORDER BY `nextservice` DESC LIMIT 1"));
  if (!empty($get)) {
    return date("d/m/Y", $get['nextservice']);
  } else {
    return "Yok";
  }
}
//customer/defect
if ($i=='defect') {
    //Getting Customer Records to an Array for Listing
    if (isset($_SESSION['employee_id'])) {
        $list=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`city` as `city` FROM `customers` INNER JOIN `defects` ON `customers`.`id` = `defects`.`customer_id` INNER JOIN `customers_employee` ON `customers`.`id`=`customers_employee`.`customer_id` WHERE (`customers`.`dealer_id` = '$_SESSION[dealer_id]' AND `customers_employee`.`employee_id` = '$_SESSION[employee_id]') AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1') AND `defects`.`status` = '0'");
    } else {
        $list=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`city` as `city` FROM `customers` INNER JOIN `defects` ON `defects`.`customer_id` = `customers`.`id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1') AND `defects`.`status` = '0'");
    }
    while ($row = @mysqli_fetch_assoc($list)) {
        $result_list[] = $row;
    }
    $inject_footer = "<script type=\"text/javascript\"> $(document).ready(function() { getlocationfilter(); getcitydealeraddress(); }); </script>";
}
//customer/service
if ($i=='service') {
    //Getting Customer Records to an Array for Listing
    if (isset($_SESSION['employee_id'])) {
        $list=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`city` as `city` FROM `customers` INNER JOIN `customers_service` ON `customers_service`.`customer_id` = `customers`.`id` INNER JOIN `customers_employee` ON `customers`.`id`=`customers_employee`.`customer_id` WHERE (`customers`.`dealer_id` = '$_SESSION[dealer_id]' AND `customers_employee`.`employee_id` = '$_SESSION[employee_id]') AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1') AND (`customers_service`.`notified` = '1' AND `customers_service`.`resolved` = '0')");
    } else {
        $list=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`city` as `city` FROM `customers` INNER JOIN `customers_service` ON `customers_service`.`customer_id` = `customers`.`id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1') AND (`customers_service`.`notified` = '1' AND `customers_service`.`resolved` = '0')");
    }
    while ($row = @mysqli_fetch_assoc($list)) {
        $result_list[] = $row;
    }
    $inject_footer = "<script type=\"text/javascript\"> $(document).ready(function() { getlocationfilter(); getcitydealeraddress(); }); </script>";
}
//customer/list
if ($i=='list') {
    if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
      $cr_page = $_POST['pg'];
      $start = ($cr_page - 1) * $cf['pagination'];
    } else {
      $cr_page = 1;
      $start = 0;
      $end = $cf['pagination'];
    }
    //Getting Customer Records to an Array for Listing
    if (isset($_SESSION['employee_id'])) {
        if (isset($_POST['search'])) {
            $search=mysqli_real_escape_string($con, $_POST['search']);
            $list=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`city` as `city` FROM `customers` INNER JOIN `customers_employee` ON `customers`.`id`=`customers_employee`.`customer_id` WHERE (`customers`.`dealer_id` = '$_SESSION[dealer_id]' AND `customers_employee`.`employee_id` = '$_SESSION[employee_id]') AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1') AND UPPER(CONCAT_WS(' ', `firstname`, `lastname`, `gsm`)) LIKE UPPER('%$search%') LIMIT $start, $cf[pagination]");
            $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` INNER JOIN `customers_employee` ON `customers`.`id`=`customers_employee`.`customer_id` WHERE (`customers`.`dealer_id` = '$_SESSION[dealer_id]' AND `customers_employee`.`employee_id` = '$_SESSION[employee_id]') AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1')"));
         
          } else {
            $list=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`city` as `city` FROM `customers` INNER JOIN `customers_employee` ON `customers`.`id`=`customers_employee`.`customer_id` WHERE (`customers`.`dealer_id` = '$_SESSION[dealer_id]' AND `customers_employee`.`employee_id` = '$_SESSION[employee_id]') AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1') LIMIT $start, $cf[pagination]");
            $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` INNER JOIN `customers_employee` ON `customers`.`id`=`customers_employee`.`customer_id` WHERE (`customers`.`dealer_id` = '$_SESSION[dealer_id]' AND `customers_employee`.`employee_id` = '$_SESSION[employee_id]') AND (`customers`.`deleted_at` = '0' AND `customers`.`status` = '1')"));
        }
    } else {
        if (isset($_POST['search'])) {
            $search=mysqli_real_escape_string($con, $_POST['search']);
            $list=mysqli_query($con, "SELECT `id`,`firstname`,`lastname`,`gsm`,`city` FROM `customers` WHERE (`dealer_id` = '$_SESSION[dealer_id]' AND `deleted_at` = '0') AND (`status` = '1' AND UPPER(CONCAT_WS(' ', `firstname`, `lastname`, `gsm`)) LIKE UPPER('%$search%')) LIMIT $start, $cf[pagination]");
            $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND (`deleted_at` = '0' AND `status` = '1')"));
        } else {
          //echo "geldim";
          //echo $_POST['sort1'];
          if(isset($_POST['sort1'])){
         $sort= "ORDER BY ".$_POST['sort1']." ASC";
          }else{
            $sort="";
          }
          $list=mysqli_query($con, "SELECT `id`,`firstname`,`lastname`,`gsm`,`city` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND (`deleted_at` = '0' AND `status` = '1') ".$sort." LIMIT $start, $cf[pagination] ");
         
          $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND (`deleted_at` = '0' AND `status` = '1')"));
        }
    }
    while ($row = @mysqli_fetch_assoc($list)) {
        $result_list[] = $row;
    }
    $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), DEALER_URL.'customers/list');
    $inject_footer = "<script type=\"text/javascript\"> $(document).ready(function() { getlocationfilter(); getcitydealeraddress(); }); </script>";
}

//customer/edit
if ($i=='edit') {
  $id=varsql($_POST['id']);
  if (isset($_SESSION['employee_id'])) {
    $chk=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers_employee` WHERE `customer_id` = '$id' AND `employee_id` = '$_SESSION[employee_id]'"));
    if ($chk['total']==1) {
      $customer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `customers` WHERE `id` = '$id'"));
      $inject_footer = "<script type=\"text/javascript\"> $(document).ready(function() { getaddresstoform('".$customer['city']."','".$customer['town']."','".$customer['district']."','".$customer['street']."'); getlocationfilter(); }); </script>";
      $inject_footer .= "<script> goto('".DEALER_URL."customers/view','none','".$get_id."','0','0'); </script>";
    }
  } else {
    $customer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `customers` WHERE `id` = '$id'"));
    $inject_footer = "<script type=\"text/javascript\"> $(document).ready(function() { getaddresstoform('".$customer['city']."','".$customer['town']."','".$customer['district']."','".$customer['street']."'); getlocationfilter(); }); </script>";
  }
}

//customer/view
if ($i=='view') {
  if ((!isset($_POST['id'])) || (empty($_POST['id']))) {
    header("Location: ".DEALER_URL."customers/list");
    exit();
  }
  if (isset($_SESSION['employee_id'])) {
    $cid=varsql($_POST['id']);
    $chk=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers_employee` WHERE `customer_id` = '$cid' AND `employee_id` = '$_SESSION[employee_id]'"));
    if ($chk['total']==1) {
      $id=$cid;
    }
  } else {
    $id=varsql($_POST['id']);
  }
  $customer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `customers` WHERE `id` = '$id'"));
  $dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title` FROM `dealers` WHERE `id` = '$customer[dealer_id]'"));
  $customer_devices_count=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers_device` WHERE `customer_id` = '$id' AND (`deleted_at` = '0' AND `status` = '1')"));
  
  //Customer's Devices List
  $result_customer_devices = array();
  $customer_devices=mysqli_query($con, "SELECT `customers_device`.`id` as `id`, `customers_device`.`serial` as `serial`, `devices`.`name` as `name`, `devices_category`.`title` as `title`, `customers_device`.`created_at` as `created_at`, `devices`.`manufacturer` as `manufacturer` FROM `customers_device` INNER JOIN `devices` ON `devices`.`id` = `customers_device`.`device_id` INNER JOIN `devices_category` ON `devices_category`.`id` = `devices`.`category_id` WHERE `customers_device`.`customer_id` = '$id' AND (`customers_device`.`deleted_at` = '0' AND `customers_device`.`status` = '1')");
  while ($row = @mysqli_fetch_assoc($customer_devices)) {
    $result_customer_devices[] = $row;
  }
  
  //All Devices List
  $result_devices = array();
  $devices=mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices`.`name` as `name`, `devices_category`.`title` as `title`, `devices`.`manufacturer` as `manufacturer`, `devices`.`price` as `price` FROM `devices` INNER JOIN `devices_category` ON `devices_category`.`id` = `devices`.`category_id` WHERE `devices`.`status` = '1' AND `devices`.`deleted_at` = '0'");
  while ($row = @mysqli_fetch_assoc($devices)) {
    $result_devices[] = $row;
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
  
  //Notifications Config
  $notifications=mysqli_fetch_assoc(mysqli_query($con, "SELECT `period`, `service`, `birthday`, `special`, `thanks`, `campaign`, `email`, `sms`, `notification` FROM `customers_config` WHERE `customer_id` = '$id' LIMIT 1"));
  
  //All Notifications List
  $result_notifications_sms = array();
  $notification_sms=mysqli_query($con, "SELECT `id`, `type_id`, `message_id`, `content`, `date`, `status` FROM `customers_message` WHERE `customer_id` = '$id' ORDER BY `id` DESC LIMIT 5");
  while ($row = @mysqli_fetch_assoc($notification_sms)) {
    $result_notifications_sms[] = $row;
  }
  $result_notifications_mail = array();
  $notification_mail=mysqli_query($con, "SELECT `id`, `type_id`, `email_id`, `content`, `date`, `status` FROM `customers_email` WHERE `customer_id`= '$id' ORDER BY `id` DESC LIMIT 5");
  while ($row = @mysqli_fetch_assoc($notification_mail)) {
    $result_notifications_mail[] = $row;
  }
  
  //All Employee List
  $result_employee = array();
  $employee=mysqli_query($con, "SELECT `id`, `firstname`, `lastname` FROM `employee` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND `status` = '1' ORDER BY `id` ASC ");
  while ($row = @mysqli_fetch_assoc($employee)) {
    $result_employee[] = $row;
  }
  
  //All Customer Employee List
  $result_customer_employee = array();
  $customer_employee=mysqli_query($con, "SELECT `employee`.`id` as `id`, `employee`.`firstname` as `firstname`, `employee`.`lastname` as `lastname`, `employee`.`online_at` as `online_at`, `employee`.`email` as `email`, `employee`.`gsm` as `gsm` FROM `employee` INNER JOIN `customers_employee` ON `customers_employee`.`employee_id` = `employee`.`id` WHERE `employee`.`dealer_id` = '$_SESSION[dealer_id]' AND `employee`.`status` = '1' AND `customers_employee`.`customer_id` = '$id' ORDER BY `customers_employee`.`id` ASC ");
  while ($row = @mysqli_fetch_assoc($customer_employee)) {
    $result_customer_employee[] = $row;
  }
  
  //All Image List
  $result_images = array();
  $images=mysqli_query($con, "SELECT `id`, `sfx`, `description`,`service_id`, `created_at` FROM `customers_image` WHERE (`customer_id` = '$id' AND `status` = '1')  ORDER BY `id` DESC");
  while ($row = @mysqli_fetch_assoc($images)) {
    $result_images[] = $row;
  }
  $inject_footer = "<script type=\"text/javascript\"> $(document).ready(function() { getfulladdress(); $('#get_service_all').click(function() { if ($('#service_all').css('display')==\"none\") { $('#service_all').css('display', 'block'); $('#service_all').load('".DEALER_URL."_modal/get_service_all.php?id=".$id."'); } else { $('#service_all').css('display', 'none'); $('#service_all').load('".DEALER_URL."_modal/get_service_all.php?id=".$id."'); } }); }); </script>";
}

//customer/add
if ($i=='add') {
  $inject_footer = "<script type=\"text/javascript\"> $(document).ready(function() { getlocationforms(); $('input#gsm').on({ keydown: function(e) { if (e.which === 32) return false; }, change: function() { this.value = this.value.replace(/\s/g, ''); } }); }); </script>";
  if ((isset($error)) && ($error=="2001")) { 
    $inject_footer .= "<script> goto('".DEALER_URL."customers/view','none','".$get_id."','0','0'); </script>";
  }
}
