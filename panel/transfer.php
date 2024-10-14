<?php
echo "Transfer Method Deactivated! - Please Edit This File For Activation!"; exit();
error_reporting(E_ALL);
ini_set("display_errors", 1);
date_default_timezone_set("Europe/Istanbul");
$con_old = mysqli_connect("localhost", "aquacora_isatest", "159*357", "aquacora_boga");
$con_new = mysqli_connect("localhost", "aquacora_panel", "M200403306", "aquacora_panel");
mysqli_set_charset($con_old, "utf8");
mysqli_set_charset($con_new, "utf8");
mysqli_query($con_new, "TRUNCATE `companies`");
mysqli_query($con_new, "TRUNCATE `customers`");
mysqli_query($con_new, "TRUNCATE `customers_config`");
mysqli_query($con_new, "TRUNCATE `customers_device`");
mysqli_query($con_new, "TRUNCATE `customers_service`");
mysqli_query($con_new, "TRUNCATE `customers_email`");
mysqli_query($con_new, "TRUNCATE `customers_message`");
mysqli_query($con_new, "TRUNCATE `customers_image`");
mysqli_query($con_new, "TRUNCATE `employee`");
mysqli_query($con_new, "TRUNCATE `dealers`");
mysqli_query($con_new, "TRUNCATE `dealers_location`");
mysqli_query($con_new, "TRUNCATE `dealers_stats`");
mysqli_query($con_new, "TRUNCATE `dealers_email`");
mysqli_query($con_new, "TRUNCATE `dealers_message`");
mysqli_query($con_new, "TRUNCATE `dealers_pass_log`");
mysqli_query($con_new, "TRUNCATE `defects`");
mysqli_query($con_new, "TRUNCATE `payments`");
mysqli_query($con_new, "TRUNCATE `crons`");
mysqli_query($con_new, "TRUNCATE `reports`");
mysqli_query($con_new, "TRUNCATE `stats_daily`");
mysqli_query($con_new, "TRUNCATE `stats_monthly`");
mysqli_query($con_new, "INSERT INTO `reports` (`id`) VALUES ('')");
echo "Truncated Database...<br>";
$time=time();
setlocale(LC_TIME, 'tr_TR');
function c_curl($url) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($c);
    curl_close($c);
    return true;
}
function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}
echo "Started Query...<br>";
$get_company=mysqli_query($con_old, "SELECT * FROM `companies`");
while($row=@mysqli_fetch_assoc($get_company)) {
  $result_company[] = $row;
}
echo "Getting All Variables...<br>";
foreach ($result_company as $res) {
  $comp_id=$res['id'];
  $username=generateRandomString();
  $pass=generateRandomString();
  $password=md5($pass);
  $created_at = strtotime($res['created_at']);
  $updated_at = strtotime($res['updated_at']);
  $deleted_at = strtotime($res['deleted_at']);
  mysqli_query($con_new, "INSERT INTO `companies` VALUES ('','$res[name]','$username','$password','$res[phone]','','$res[website]','$res[tax_office]','$res[tax_number]','1','tr','0','$created_at','$updated_at','$deleted_at','1')");
  $company_id=mysqli_insert_id($con_new);
  $get_one_employee=@mysqli_fetch_assoc(mysqli_query($con_old, "SELECT * FROM `users` WHERE `company_id` = '$res[id]' ORDER BY `id` ASC LIMIT 1"));
  $c_street_id = $get_one_employee['street_id'];
  $c_address = $get_one_employee['address'];
  $minaddress=@mysqli_fetch_assoc(mysqli_query($con_old, "SELECT `districts`.`id` as `district`, `towns`.`id` as `town`, `cities`.`id` as `city` FROM `streets` INNER JOIN `districts` ON `districts`.`id`=`streets`.`district_id` INNER JOIN `towns` ON `towns`.`id`=`districts`.`town_id` INNER JOIN `cities` ON `cities`.`id`=`towns`.`city_id` WHERE `streets`.`id` = '$c_street_id'"));
  mysqli_query($con_new, "INSERT INTO `dealers` VALUES ('','$company_id','$get_one_employee[email]','$get_one_employee[username]','$password','','$res[phone]','$res[name]','$minaddress[city]','$minaddress[town]','$minaddress[district]','$c_street_id','$c_address','TRY','tr','0','$created_at','$updated_at','$deleted_at','1')");
  $dealer_id=mysqli_insert_id($con_new);
  mysqli_query($con_new, "INSERT INTO `dealers_pass_log` VALUES ('','$get_one_employee[username]','$pass','$res[phone]')");
  mysqli_query($con_new, "INSERT INTO `dealers_location` VALUES ('','$dealer_id','','')");
  mysqli_query($con_new, "INSERT INTO `dealers_stats` (`dealer_id`)VALUES ('$dealer_id')");
  $get_employee=mysqli_query($con_old, "SELECT * FROM `users` WHERE `company_id` = '$res[id]' ORDER BY `id` ASC LIMIT 100 OFFSET 1");
  while($row=@mysqli_fetch_assoc($get_employee)) {
    $result_employee[] = $row;
  }
  if (isset($result_employee)) {
  foreach ($result_employee as $res) {
    $password=md5(generateRandomString());
    $online_at = strtotime($res['online_at']);
    $created_at = strtotime($res['created_at']);
    $updated_at = strtotime($res['updated_at']);
    $deleted_at = strtotime($res['deleted_at']);
    $split=explode(" ", $res['fullname']);
    $kac=count($split);
    $firstname=explode(" ".$split[$kac-1], $res['fullname']);
    $lastname=$split[$kac-1];
    mysqli_query($con_new, "INSERT INTO `employee` VALUES ('','$dealer_id','$res[username]','$password','$firstname[0]','$lastname','$res[email]','$res[gsm]','$res[address]','$online_at','$created_at','$updated_at','$deleted_at','1','$res[isActive]')");
  }
    unset($result_employee);
  }
  $get_payment=mysqli_query($con_old, "SELECT * FROM `payments` WHERE `user_id` = '$comp_id' AND `completed` = '1' ORDER BY `created_at` ASC");
  while($rowc=@mysqli_fetch_assoc($get_payment)) {
    $result_payment[] = $rowc;
  }
  if (isset($result_payment)) {
    foreach ($result_payment as $res) {
      $transaction_id = $res['transaction_id'];
      $reference_transaction_id = $res['reference_transaction_id'];
      $amount = $res['amount'] / 100;
      $amount_transfered = $res['amount_transfered'] / 100;
      $amount_commission = $res['amount_comission'] / 100;
      $currency = $res['currency'];
      $installment = $res['installment'];
      $fullname = $res['fullname'];
      $card_first_numbers = $res['card_first_numbers'];
      $card_last_numbers = $res['card_last_numbers'];
      $expire_year = $res['expireyear'];
      $expire_month = $res['expiremonth'];
      $ip = $res['ip'];
      $message = $res['message'];
      $created_at = strtotime($res['created_at']);
      $updated_at = strtotime($res['updated_at']);
      mysqli_query($con_new, "INSERT INTO `payments` VALUES ('','$company_id','1','1','$transaction_id','$reference_transaction_id','$amount','$amount_transfered','$amount_commission','$currency','$installment','$fullname','$card_first_numbers','$card_last_numbers','$expire_year','$expire_month','$ip','1','0','$message','$created_at','$updated_at','0','1')");
    }
      unset($result_payment);
  }
  $get_emails=mysqli_query($con_old, "SELECT * FROM `user_emails` WHERE `user_id` = '$comp_id'");
  while($rows=@mysqli_fetch_assoc($get_emails)) {
    $result_emails[] = $rows;
  }
  if (isset($result_emails)) {
    $chc = array('1','2','3','4','5','6','7','8','9','10','11','12');
    $chcto = array('1','3','5','7','9','10','11','12','13','15','17','18');
    foreach($result_emails as $res) {
      $email_id=str_replace($chc, $chcto, $res['email_id']);
      $created_at=strtotime($res['created_at']);
      mysqli_query($con_new, "INSERT INTO `dealers_email` VALUES ('','$company_id','2','$email_id','$res[text]','$created_at','1')");
    }
    unset($result_emails);
  }
  $get_messages=mysqli_query($con_old, "SELECT * FROM `user_messages` WHERE `user_id` = '$comp_id'");
  while($rows=@mysqli_fetch_assoc($get_messages)) {
    $result_messages[] = $rows;
  }
  if (isset($result_messages)) {
    $chc = array('1','2','3','4','5','6','7','8','9','10','11','12');
    $chcto = array('1','3','5','7','9','9','11','11','13','15','15','15');
    foreach($result_messages as $res) {
      $message_id=str_replace($chc, $chcto, $res['message_id']);
      $created_at=strtotime($res['created_at']);
      mysqli_query($con_new, "INSERT INTO `dealers_message` VALUES ('','$company_id','2','$message_id','$res[text]','$created_at','$res[status]')");
    }
    unset($result_messages);
  }
  $get_customer=mysqli_query($con_old, "SELECT * FROM `customers` WHERE `company_id` = '$comp_id'");
  while($rowc=@mysqli_fetch_assoc($get_customer)) {
    $result_customer[] = $rowc;
  }
  if (isset($result_customer)) {
  foreach ($result_customer as $resc) {
    $old_cid=$resc['id'];
    $password=md5(generateRandomString());
    $created_at = strtotime($resc['created_at']);
    $updated_at = strtotime($resc['updated_at']);
    $deleted_at = strtotime($resc['deleted_at']);
    $split=explode(" ", $resc['fullname']);
    $kac=count($split);
    $firstname=explode(" ".$split[$kac-1], $resc['fullname']);
    $lastname=$split[$kac-1];
    $cs_street_id=$resc['street_id'];
    $minaddress=@mysqli_fetch_assoc(mysqli_query($con_old, "SELECT `districts`.`id` as `district`, `towns`.`id` as `town`, `cities`.`id` as `city` FROM `streets` INNER JOIN `districts` ON `districts`.`id`=`streets`.`district_id` INNER JOIN `towns` ON `towns`.`id`=`districts`.`town_id` INNER JOIN `cities` ON `cities`.`id`=`towns`.`city_id` WHERE `streets`.`id` = '$cs_street_id'"));
    if (($resc['year']==NULL) || ($resc['year']<'1970')) { $resc['year'] = '2018'; }
    if ($resc['month']==NULL) { 
        $birthday=0;
    } else {
        $birthday=strtotime($resc['year']."-".$resc['month']."-".$resc['day']);
    }
    mysqli_query($con_new, "INSERT INTO `customers` VALUES ('','$company_id','$dealer_id','$firstname[0]','$lastname','$resc[email]','$resc[gsm]','$password','$birthday','1','$minaddress[city]','$minaddress[town]','$minaddress[district]','$cs_street_id','$resc[address]','$resc[latitude]','$resc[longitude]','0','$created_at','$updated_at','$deleted_at','$resc[isActive]')");
    $get_notif=@mysqli_fetch_assoc(mysqli_query($con_old, "SELECT * FROM `notifications` WHERE `customer_id` = '$resc[id]'"));
    $c_id=mysqli_insert_id($con_new);
    $c_service=$get_notif['service'];
    mysqli_query($con_new, "INSERT INTO `customers_config` VALUES ('','$c_id','$get_notif[service]','$get_notif[period]','$get_notif[birthday]','$get_notif[holiday]','$get_notif[greeting]','$get_notif[campaign]','$get_notif[email]','$get_notif[message]','0')");
    $get_device=mysqli_query($con_old, "SELECT * FROM `customer_device` WHERE `customer_id` = '$resc[id]'");
    while($rowc=@mysqli_fetch_assoc($get_device)) {
      $result_device[] = $rowc;
    }
    if (isset($result_device)) {
    $cmcmcm=array();
    foreach ($result_device as $resd) {
      $old_cdid = $resd['id'];
      $description = $resd['description'];
      $created_at = strtotime($resd['created_at']);
      $updated_at = strtotime($resd['updated_at']);
      $deleted_at = 0;
      $urun_serino = $resd['urun_serino'];
      $cihaz_adresi = $resd['cihaz_adresi'];
      $cihaz_bedeli = $resd['cihaz_bedeli'];
      $vals = array("5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "0");
      $valsto = array("2", "1", "3", "4", "5", "6", "7", "8", "9", "9", "9");
      $dev = str_replace($vals, $valsto, $resd['device_id']);
      mysqli_query($con_new, "INSERT INTO `customers_device` VALUES ('','$c_id','$dev','$urun_serino','$cihaz_adresi','$cihaz_bedeli','$description','$created_at','$updated_at','$deleted_at','1')");
      $cdid=mysqli_insert_id($con_new);
      $get_service=mysqli_query($con_old, "SELECT * FROM `customer_service` WHERE `customer_id` = '$old_cid' AND `id` NOT IN ( '" . implode( "', '" , $cmcmcm ) . "' )");
      while($rows=@mysqli_fetch_assoc($get_service)) {
        $result_service[] = $rows;
      }
      if (isset($result_service)) {
        foreach ($result_service as $res) {
          array_push($cmcmcm, $res['id']);
          if ($res['customer_device_id'] != $old_cdid) {
          	$trr=@mysqli_fetch_assoc(mysqli_query($con_new, "SELECT `id` FROM `customers_device` WHERE `customer_id` = '$c_id' ORDER BY `id` ASC LIMIT 1"));
          	$cdid=$trr['id'];
          }
          if ($res['device_id'] != $resd['device_id']) {
          	$trr=@mysqli_fetch_assoc(mysqli_query($con_new, "SELECT `device_id` FROM `customers_device` WHERE `customer_id` = '$c_id' ORDER BY `id` ASC LIMIT 1"));
          	$dev=$trr['device_id'];
          }
          $c_service_id=$res['service_id'];
          $c_device_id=$res['service_id'];
          $price=$res['price'];
          $description=$res['description'];
          $in_tds=$res['in_tds'];
          $out_tds=$res['out_tds'];
          $date=strtotime($res['date']);
          $nextServiceDate=strtotime($res['nextServiceDate']." 00:00:00");
          $prevServiceDate=strtotime($res['nextServiceDate']." 00:00:00") - (86400 * $c_service);
          $notified=$res['customerNotified'];
          if (($nextServiceDate<=time()) && ($notified!=1)) {
            $notified=1;
          }
          $created_at=strtotime($res['date']);
          $updated_at=strtotime($res['updated_at']);
          if ($updated_at!=0) {
            $resolved=1;
          } else {
            $resolved=0;
          }
          mysqli_query($con_new, "INSERT INTO `customers_service` VALUES ('','$c_id','$c_service_id','$dev','$cdid','$price','$description','$in_tds','$out_tds','$date','$prevServiceDate','$nextServiceDate','$notified','$resolved','$created_at','$updated_at','0','1')");
        }
        unset($result_service);
      }
    }
      unset($result_device);
    }
    $get_emails=mysqli_query($con_old, "SELECT * FROM `customer_emails` WHERE `customer_id` = '$old_cid'");
    while($rows=@mysqli_fetch_assoc($get_emails)) {
      $result_emails[] = $rows;
    }
    if (isset($result_emails)) {
      $chc = array('1','2','3','4','5','6','7','8','9','10','11','12');
      $chcto = array('1','3','5','7','9','9','11','11','13','15','15','15');
      foreach($result_emails as $res) {
        $email_id=str_replace($chc, $chcto, $res['email_id']);
        $created_at=strtotime($res['created_at']);
        mysqli_query($con_new, "INSERT INTO `customers_email` VALUES ('','$c_id','2','$email_id','$res[text]','$created_at','1')");
      }
      unset($result_emails);
    }
    $get_messages=mysqli_query($con_old, "SELECT * FROM `customer_messages` WHERE `customer_id` = '$old_cid'");
    while($rows=@mysqli_fetch_assoc($get_messages)) {
      $result_messages[] = $rows;
    }
    if (isset($result_messages)) {
      $chc = array('1','2','3','4','5','6','7','8','9','10','11','12');
      $chcto = array('1','3','5','7','9','9','11','11','13','15','15','15');
      foreach($result_messages as $res) {
        $message_id=str_replace($chc, $chcto, $res['message_id']);
        $created_at=strtotime($res['created_at']);
        mysqli_query($con_new, "INSERT INTO `customers_message` VALUES ('','$c_id','2','$message_id','$res[text]','$created_at','$res[status]')");
      }
      unset($result_messages);
    }
    $get_defects=mysqli_query($con_old, "SELECT * FROM `defects` WHERE `customer_id` = '$old_cid'");
    while($rows=@mysqli_fetch_assoc($get_defects)) {
      $result_defects[] = $rows;
    }
    if (isset($result_defects)) {
      foreach($result_defects as $res) {
        $get_first_device=@mysqli_fetch_assoc(mysqli_query($con_new, "SELECT `id` FROM `customers_device` WHERE `customer_id` = '$c_id' ORDER BY `id` ASC LIMIT 1"));
        if ((empty($res['solution'])) && ($res['done']==1)) {
          $res['solution'] = " ";
        }
        $created_at=strtotime($res['created_at']);
        $updated_at=strtotime($res['updated_at']);
        mysqli_query($con_new, "INSERT INTO `defects` VALUES('','$c_id','$get_first_device[id]','$res[description]','$res[solution]','$created_at','$updated_at','0','$res[done]')");
      }
        unset($result_defects);
    }
  }
    unset($result_customer);
  }
}
echo "Injected All Queries... OK!<br>Crons Starting...<br>";
c_curl("https://www.aquacora.com.tr/panel/cron.php?monthly=ok");
echo "Monthly Cron Executed...<br>";
c_curl("https://www.aquacora.com.tr/panel/cron.php?daily=ok");
echo "Daily Cron Executed...<br>";
c_curl("https://www.aquacora.com.tr/panel/cron.php?hourly=ok");
echo "Hourly Cron Executed...<br> Everythings Fine! - OK!<br>";
echo "Sending New Passwords!<br>";
$get_new_pass=mysqli_query($con_new, "SELECT * FROM `dealers_pass_log` ORDER BY `id` ASC");
while($row_new_pass=@mysqli_fetch_assoc($get_new_pass)) {
  $result_new_pass[] = $row_new_pass;
}
if (isset($result_new_pass)) {
    foreach($result_new_pass as $nw) {
        $username='8508402672';
        $pass='190677LE';
        $header='AQUACORA';
        $telno=$nw['phone'];
        $msg = html_entity_decode("Aquacora Yeni Bayi Kullanıcı Adınız: ".$nw['username']." ve Şifreniz: ".$nw['password'], ENT_COMPAT, "UTF-8");
        $msg = rawurlencode($msg);
        $header = html_entity_decode($header, ENT_COMPAT, "UTF-8");
        $header = rawurlencode($header);
        $startdate=date('d.m.Y H:i');
        $startdate=str_replace('.', '',$startdate );
        $startdate=str_replace(':', '',$startdate);
        $startdate=str_replace(' ', '',$startdate);
        $stopdate=date('d.m.Y H:i', strtotime('+1 day'));
        $stopdate=str_replace('.', '',$stopdate );
        $stopdate=str_replace(':', '',$stopdate);
        $stopdate=str_replace(' ', '',$stopdate);
        $url="http://api.netgsm.com.tr/bulkhttppost.asp?usercode=$username&password=$pass&gsmno=$telno&message=$msg&msgheader=$header&startdate=$startdate&stopdate=$stopdate";
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $output=curl_exec($ch);
        curl_close($ch);
    }
}
echo "Sended New Passwords! - OK!";
?>
