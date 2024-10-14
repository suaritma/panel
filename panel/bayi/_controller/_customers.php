<?php
if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
  if ($_SESSION['p1']['padd']!=1) {
    $error = '1000';
  } else {
    if ((isset($_POST['firstname'])) && (!empty($_POST['firstname']))) {
      $firstname=varsql($_POST['firstname']);
    } else {
      $error = '1001';
    }
    if ((isset($_POST['lastname'])) && (!empty($_POST['lastname']))) {
      $lastname=varsql($_POST['lastname']);
    } else {
      $error = '1002';
    }
    if ((isset($_POST['gsm'])) && (!empty($_POST['gsm']))) {
      $gsm=varsql($_POST['gsm']);
    } else {
      $error = '1003';
    }
    if ((isset($_POST['city'])) && (!empty($_POST['city']))) {
      $city=varsql($_POST['city']);
    } else {
      $error = '1004';
    }
    if ((isset($_POST['town'])) && (!empty($_POST['town']))) {
      $town=varsql($_POST['town']);
    } else {
      $error = '1005';
    }
    if ((isset($_POST['district'])) && (!empty($_POST['district']))) {
      $district=varsql($_POST['district']);
    } else {
      $error = '1006';
    }
    if ((isset($_POST['street'])) && (!empty($_POST['street']))) {
      $street=varsql($_POST['street']);
    } else {
      $error = '1007';
    }
    if ((isset($_POST['postalcode'])) && (!empty($_POST['postalcode']))) {
      $postalcode=varsql($_POST['postalcode']);
    } else {
      $error = '1008';
    }
    if ((isset($_POST['address'])) && (!empty($_POST['address']))) {
      $address=varsql($_POST['address']);
    } else {
      $error = '1009';
    }
    if (!isset($error)) {
      $email=varsql($_POST['email']);
      $birthday=strtotime($_POST['birthday']);
      $password=md5($gsm);
      $insert=mysqli_query($con, "INSERT INTO `customers` VALUES ('','$_SESSION[dealer_company_id]','$_SESSION[dealer_id]','$firstname','$lastname','$email','$gsm','$password','$birthday','$_SESSION[dealer_country]','$city','$town','$district','$street','$address','0','0','0','$time','0','0','1')");
      if ($insert) {
        $get_id=mysqli_insert_id($con);
        $get_auto_access=mysqli_query($con, "SELECT `employee_auto_access`.`employee_id` as `employee_id` FROM `employee_auto_access` INNER JOIN `employee` ON `employee`.`id` = `employee_auto_access`.`employee_id` INNER JOIN `dealers` ON `dealers`.`id` = `employee`.`dealer_id` WHERE `dealers`.`id` = '$_SESSION[dealer_id]'");
        while($get_auto=@mysqli_fetch_assoc($get_auto_access)) {
            $row_auto[] = $get_auto;
        }
        foreach($row_auto as $res_auto) {
            if ((isset($res_auto['employee_id'])) && (!empty($res_auto['employee_id']))) {
                mysqli_query($con, "INSERT IGNORE INTO `customers_employee` VALUES ('','$get_id','$res_auto[employee_id]')");
            }
        }
        mysqli_query($con, "INSERT INTO `customers_config` VALUES ('','$get_id','180','1','1','1','1','1','1','1','1')");
      	if ((isset($_POST['welcome'])) && ($_POST['welcome']==1)) {
      		$get_dealer_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`, `email`, `gsm` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
          	$get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '19' AND `status` = '1'"));
          	if ((isset($get)) && (!empty($get))) {
      			$vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]");
    	    	$valsto = array($firstname." ".$lastname, $email, $gsm, $get_dealer_n['title'], $get_dealer_n['email'], $get_dealer_n['gsm']);
        		$title = str_replace($vals, $valsto, $get['title']);
          		$content = str_replace($vals, $valsto, $get['content']);
          		if (send_service_mail($title,$content,$email,$title)) {
          			mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$get_id','2','$get[id]','$content','$time','1')");
          		} else {
          			mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$get_id','2','$get[id]','$content','$time','0')");
          		}
          	}
          	$get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '19' AND `status` = '1'"));
          	if ((isset($get)) && (!empty($get))) {
      			$vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]");
    	    	$valsto = array($firstname." ".$lastname, $email, $gsm, $get_dealer_n['title'], $get_dealer_n['email'], $get_dealer_n['gsm']);
        		$title = str_replace($vals, $valsto, $get['title']);
          		$content = str_replace($vals, $valsto, $get['content']);
          		if (send_service_sms($gsm,$content)) {
          			mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$get_id','2','$get[id]','$content','$time','1')");
          		} else {
          			mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$get_id','2','$get[id]','$content','$time','0')");
          		}
          	}
      	}
        $error = '2001';
      } else {
        $error = '1010';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="edit")) {
  if ($_SESSION['p1']['pedit']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['firstname'])) && (!empty($_POST['firstname']))) {
      $firstname=varsql($_POST['firstname']);
    } else {
      $error = '1001';
    }
    if ((isset($_POST['lastname'])) && (!empty($_POST['lastname']))) {
      $lastname=varsql($_POST['lastname']);
    } else {
      $error = '1002';
    }
    if ((isset($_POST['gsm'])) && (!empty($_POST['gsm']))) {
      $gsm=varsql($_POST['gsm']);
    } else {
      $error = '1003';
    }
    if ((isset($_POST['city'])) && (!empty($_POST['city']))) {
      $city=varsql($_POST['city']);
    } else {
      $error = '1004';
    }
    if ((isset($_POST['town'])) && (!empty($_POST['town']))) {
      $town=varsql($_POST['town']);
    } else {
      $error = '1005';
    }
    if ((isset($_POST['district'])) && (!empty($_POST['district']))) {
      $district=varsql($_POST['district']);
    } else {
      $error = '1006';
    }
    if ((isset($_POST['street'])) && (!empty($_POST['street']))) {
      $street=varsql($_POST['street']);
    } else {
      $error = '1007';
    }
    if ((isset($_POST['postalcode'])) && (!empty($_POST['postalcode']))) {
      $postalcode=varsql($_POST['postalcode']);
    } else {
      $error = '1008';
    }
    if ((isset($_POST['address'])) && (!empty($_POST['address']))) {
      $address=varsql($_POST['address']);
    } else {
      $error = '1009';
    }
    if (!isset($error)) {
      $email=varsql($_POST['email']);
      $birthday=strtotime($_POST['birthday']);
      $update=mysqli_query($con, "UPDATE `customers` SET `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `gsm` = '$gsm', `birthdate` = '$birthday', `city` = '$city', `town` = '$town', `district` = '$district', `street` = '$street', `address` = '$address', `updated_at` = '$time' WHERE `id` = '$id'");
      if ($update) {
          $error = '2002';
      } else {
          $error = '1011';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="delete")) {
  if ($_SESSION['p1']['pdel']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    $delete=mysqli_query($con, "UPDATE `customers` SET `deleted_at` = '$time', `status` = '0' WHERE `id` = '$id'");
    if ($delete) {
      $error = '2003';
    } else {
      $error = '1012';
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="installment")) {
  if ($_SESSION['p2']['padd']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['price'])) && (!empty($_POST['price']))) {
      $price=varsql($_POST['price']);
    } else {
      $error = '1013';
    }
    if ((isset($_POST['installment_count'])) && (!empty($_POST['installment_count']))) {
      $installment_count=varsql($_POST['installment_count']);
    } else {
      $error = '1014';
    }
    if ((isset($_POST['installment_price'])) && (!empty($_POST['installment_price']))) {
      $installment_price=varsql($_POST['installment_price']);
    } else {
      $error = '1015';
    }
    if ((isset($_POST['date'])) && (!empty($_POST['date']))) {
      $date=strtotime($_POST['date']);
    } else {
      $error = '1016';
    }
    if (!isset($error)) {
      $advance=varsql($_POST['advance']);
      $note=varsql($_POST['note']);
      $add=mysqli_query($con, "INSERT INTO `installments` VALUES ('','$id','$price','$advance','$installment_count','$installment_price','$date','$note','$time','0','0','1')");
      if ($add) {
        $last_id=mysqli_insert_id($con);
        for ($z=0; $z<$installment_count; $z++) {
          $newdate = strtotime('+'.$z.' month', $date);
          $t=$z+1;
          mysqli_query($con, "INSERT INTO `installments_inside` VALUES ('','$last_id','$t','$installment_price','$newdate','0','0')");
        }
        $error = '2004';
      } else {
        $error = '1017';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="notifications")) {
  if ($_SESSION['p1']['pedit']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    $period=varsql($_POST['period']);
    $service=varsql($_POST['service']);
    $birthday=varsql($_POST['birthday']);
    $special=varsql($_POST['special']);
    $thanks=varsql($_POST['thanks']);
    $campaign=varsql($_POST['campaign']);
    if (isset($_POST['email'])) {
      $email=varsql($_POST['email']);
    } else {
      $email=0;
    }
    if (isset($_POST['sms'])) {
      $sms=varsql($_POST['sms']);
    } else {
      $sms=0;
    }
    if (isset($_POST['notification'])) {
      $notification=varsql($_POST['notification']);
    } else {
      $notification=0;
    }
    
    $update=mysqli_query($con, "UPDATE `customers_config` SET `period` = '$period', `service` = '$service', `birthday` = '$birthday', `special` = '$special', `thanks` = '$thanks', `campaign` = '$campaign', `email` = '$email', `sms` = '$sms', `notification` = '$notification' WHERE `customer_id` = '$id'");
    if ($update) {
      $error = '2005';
    } else {
      $error = '1018';
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="device_add")) {
  if ($_SESSION['p3']['padd']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['device_id'])) && (!empty($_POST['device_id']))) {
      $device_id=varsql($_POST['device_id']);
    } else {
      $error = '1019';
    }
    if ((isset($_POST['urun_serino'])) && (!empty($_POST['urun_serino']))) {
      $urun_serino=varsql($_POST['urun_serino']);
    } else {
      $urun_serino=get_serial_no('customers_device');
    }
    if (!isset($error)) {
      $cihaz_bedeli=varsql($_POST['cihaz_bedeli']);
      $cihaz_adresi=varsql($_POST['cihaz_adresi']);
      $created_at=strtotime($_POST['created_at']);
      $description=varsql($_POST['description']);
      $add=mysqli_query($con, "INSERT INTO `customers_device` VALUES ('','$id','$device_id','$urun_serino','$cihaz_adresi','$cihaz_bedeli','$description','$created_at','0','0','1',0,0,0)");
      if ($add) {
        $error = '2006';
      } else {
        $error = '1020';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="device_edit")) {
  if ($_SESSION['p3']['pedit']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $device_id=varsql($_POST['process_id']);
    } else {
      $error = '1019';
    }
    if ((isset($_POST['urun_serino'])) && (!empty($_POST['urun_serino']))) {
      $urun_serino=varsql($_POST['urun_serino']);
    } else {
      $urun_serino=get_serial_no('customers_device');
    }
    if (!isset($error)) {
      $cihaz_bedeli=varsql($_POST['cihaz_bedeli']);
      $cihaz_adresi=varsql($_POST['cihaz_adresi']);
      $created_at=strtotime($_POST['created_at']);
      $description=varsql($_POST['description']);
      $update=mysqli_query($con, "UPDATE `customers_device` SET `serial` = '$urun_serino', `address` = '$cihaz_adresi', `price` = '$cihaz_bedeli', `description` = '$description', `updated_at` = '$time' WHERE `id` = '$id'");
      if ($update) {
        $error = '2007';
      } else {
        $error = '1022';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="device_delete")) {
  if ($_SESSION['p3']['pdel']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    $process_id=varsql($_POST['process_id']);
    $delete=mysqli_query($con, "UPDATE `customers_device` SET `deleted_at` = '$time', `status` = '0' WHERE `id` = '$process_id'");
    if ($delete) {
      $error = '2008';
    } else {
      $error = '1023';
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="installment_approve")) {
  if ($_SESSION['p2']['pedit']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if (!isset($error)) {
      $update=mysqli_query($con, "UPDATE `installments_inside` SET `payed_at` = '$time', `status` = '1' WHERE `id` = '$process_id'");
      if ($update) {
        $error = '2009';
      } else {
        $error = '1024';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="installment_deny")) {
  if ($_SESSION['p2']['pedit']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if (!isset($error)) {
      $update=mysqli_query($con, "UPDATE `installments_inside` SET `payed_at` = '0', `status` = '0' WHERE `id` = '$process_id'");
      if ($update) {
        $error = '2010';
      } else {
        $error = '1025';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="installment_edit")) {
  if ($_SESSION['p2']['pedit']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if ((isset($_POST['price'])) && (!empty($_POST['price']))) {
      $price=varsql($_POST['price']);
    } else {
      $error = '1013';
    }
    if ((isset($_POST['installment_count'])) && (!empty($_POST['installment_count']))) {
      $installment_count=varsql($_POST['installment_count']);
    } else {
      $error = '1014';
    }
    if ((isset($_POST['installment_price'])) && (!empty($_POST['installment_price']))) {
      $installment_price=varsql($_POST['installment_price']);
    } else {
      $error = '1015';
    }
    if (!isset($error)) {

    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="installment_delete")) {
  if ($_SESSION['p2']['pdel']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if (!isset($error)) {
      $delete=mysqli_query($con, "UPDATE `installments` SET `deleted_at` = '$time' WHERE `id` = '$process_id'");
      if ($delete) {
        $error = '2011';
      } else {
        $error = '1026';
      }
    }
  }
}

//servis ekleme  alanı 
if ((isset($_POST['process'])) && ($_POST['process']=="service_add")) {
  if ($_SESSION['p4']['padd']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['customer_device_id'])) && (!empty($_POST['customer_device_id']))) {
      $customer_device_id=varsql($_POST['customer_device_id']);
      $dev_id=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `device_id` FROM `customers_device` WHERE `id` = '$customer_device_id' AND `customer_id` = '$id'"));
    } else {
      $error = '1027';
    }
    if ((isset($_POST['date'])) && (!empty($_POST['date']))) {
      $get_date=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `period` FROM `customers_config` WHERE `customer_id` = '$id'"));
      $date=varsql($_POST['date']);
      $date=strtotime($date);
      $nextservice=$date + ($get_date['period'] * 86400);
    } else {
      $error = '1028';
    }
    if ((isset($_POST['description'])) && (!empty($_POST['description']))) {
      $description=varsql($_POST['description']);
    } else {
      $error = '1029';
    }
    if ((isset($_POST['service_id'])) && (!empty($_POST['service_id']))) {
      $service_id=varsql($_POST['service_id']);
    } else {
      $error = '1030';
    }
    if (!isset($error)) {
      $price=varsql($_POST['price']);
      $in_tds=varsql($_POST['in_tds']);
      $out_tds=varsql($_POST['out_tds']);
      $check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers_service` WHERE `customer_device_id` = '$customer_device_id' AND `customer_id` = '$id'"));
      if ($check['total']==0) {
        $insert=mysqli_query($con, "INSERT INTO `customers_service` VALUES ('','$id','$service_id','$dev_id[device_id]','$customer_device_id','$price','$description','$in_tds','$out_tds','$date','0','$nextservice','0','0','$time','0','0','1')");
                    // servis periyodu cihazda güncelleme 
                    $update=mysqli_query($con, "UPDATE `customers_device` SET `sonrakisertah` = '$nextservice', `sonservistah` = '$date', `sonsertip` = '$service_id' WHERE `id` = '$customer_device_id'");
                    // echo "burada 2----".$date;
      } else {
        $prevservice=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `nextservice` FROM `customers_service` WHERE `customer_device_id` = '$customer_device_id' AND `customer_id` = '$id'"));
        mysqli_query($con, "UPDATE `customers_service` SET `resolved` = '1', `updated_at` = '$time' WHERE `customer_device_id` = '$customer_device_id' AND `customer_id` = '$id'");
        $insert=mysqli_query($con, "INSERT INTO `customers_service` VALUES ('','$id','$service_id','$dev_id[device_id]','$customer_device_id','$price','$description','$in_tds','$out_tds','$date','$prevservice[nextservice]','$nextservice','0','0','$time','0','0','1')");

            // servis periyodu cihazda güncelleme 
            $update=mysqli_query($con, "UPDATE `customers_device` SET `sonrakisertah` = '$nextservice', `sonservistah` = '$date', `sonsertip` = '$service_id' WHERE `id` = '$customer_device_id'");
            // echo "burada 2----".$date;
      }
      if ($insert) {
          $cmyk_get_service_id=mysqli_insert_id($con);
        if((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
          $uploaddir = '../uploads/services';
          $verifyimg = getimagesize($_FILES['image']['tmp_name']);
          $pattern = "#^(image/)[^\s\n<]+$#i";
          if(preg_match($pattern, $verifyimg['mime'])) {
            $filename=$time.'.'.str_pad((string)$_SESSION['dealer_id'], 11, "0", STR_PAD_LEFT);
            $uploadfile = tempnam_sfx($uploaddir, $filename, ".tmp");
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
            mysqli_query($con, "INSERT INTO `customers_image` VALUES ('','$id','$cmyk_get_service_id','$filename','Servis','$time','0','1')");
          }
        }
      	if (isset($_SESSION['employee_id'])) {
      		$extServId=mysqli_insert_id($con);
      		mysqli_query($con, "INSERT INTO `employee_jobs` VALUES ('','$_SESSION[employee_id]','$id','$service_id','$date','','')");
      	}
      	$check_perm=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `service`,`email`,`sms` FROM `customers_config` WHERE `customer_id` = '$id'"));
      	if ($check_perm['service']==1) {
      	  if ($service_id==1) { $sub_cust_type=1; $sub_deal_type=2; } else { $sub_cust_type=3; $sub_deal_type=4; }
      	  $get_dealer_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`, `email`, `gsm` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
      	  $get_customer_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `firstname`, `lastname`, `email`, `gsm` FROM `customers` WHERE `id` = '$id'"));
      	  $get_device_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `name`, `manufacturer` FROM `devices` WHERE `id` = '$dev_id[device_id]'"));
      	  $get_device_cn=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `price` FROM `customers_device` WHERE `id` = '$customer_device_id'"));
    	  $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[servis_fiyat]", "[cihaz_fiyat]");
    	  $valsto = array($get_customer_n['firstname']." ".$get_customer_n['lastname'], $get_customer_n['email'], $get_customer_n['gsm'], $get_dealer_n['title'], $get_dealer_n['email'], $get_dealer_n['gsm'], $get_device_n['name'], $get_device_n['manufacturer'], $price, $price);
      	  if ($check_perm['email']==1) {
      	  	$mail_cust=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '1' AND `type` = '$sub_cust_type') AND (`status`='1' AND `device_id` = '$dev_id[device_id]')"));
    	  	$mail_deal=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '1' AND `type` = '$sub_deal_type') AND (`status`='1' AND `device_id` = '$dev_id[device_id]')"));
      	  	if ((isset($mail_cust['title'])) && (!empty($mail_cust['title']))) { 
      	  		$tpc=1; $set_cust_title=$mail_cust['title']; $set_cust_content=$mail_cust['content']; $sender_status=1;
      	  	} else {
      	  		$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '$sub_cust_type' AND `status` = '1'"));
      	  		if ((isset($get_ms['title'])) && (!empty($get_ms['title']))) {
      	  			$tpc=2; $set_cust_title=$get_ms['title']; $set_cust_content=$get_ms['content']; $sender_status=1;
      	  		}
      	  	}
      	  	if ((isset($sender_status)) && (!empty($sender_status))) {
      	  		$title = str_replace($vals, $valsto, $set_cust_title);
    	    	$content = str_replace($vals, $valsto, $set_cust_content);
    	    	if (send_service_mail($title,$content,$get_customer_n['email'],$get_customer_n['firstname']." ".$get_customer_n['lastname'])) {
    	    	  mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','1')");
    	    	} else {
    	    	  mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','0')");
    	    	}
    	    }
      	    if (isset($sender_status)) { unset($sender_status); }
      	  	if ((isset($mail_deal['title'])) && (!empty($mail_deal['title']))) { 
      	  		$tpc=1; $set_deal_title=$mail_deal['title']; $set_deal_content=$mail_deal['content']; $sender_status=1;
      	  	} else {
      	  		$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '$sub_deal_type' AND `status` = '1'"));
      	  		if ((isset($get_ms['title'])) && (!empty($get_ms['title']))) {
      	  			$tpc=2; $set_deal_title=$get_ms['title']; $set_deal_content=$get_ms['content']; $sender_status=1;
      	  		}
      	  	}
      	  	if ((isset($sender_status)) && (!empty($sender_status))) {
      	  		$title = str_replace($vals, $valsto, $set_deal_title);
    	    	$content = str_replace($vals, $valsto, $set_deal_content);
    	    	if (send_service_mail($title,$content,$get_dealer_n['email'],$get_dealer_n['title'])) {
    	    	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','1')");
    	    	} else {
    	    	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','0')");
    	    	}
    	    }
      	    if (isset($sender_status)) { unset($sender_status); }
      	  }
      	  if ($check_perm['sms']==1) {
      	  	$sms_cust=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '2' AND `type` = '$sub_cust_type') AND (`status`='1' AND `device_id` = '$dev_id[device_id]')"));
    	  	$sms_deal=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '2' AND `type` = '$sub_deal_type') AND (`status`='1' AND `device_id` = '$dev_id[device_id]')"));
      	  	if ((isset($sms_cust)) && (!empty($sms_cust))) { 
      	  		$tpc=1; $set_cust_title=$sms_cust['title']; $set_cust_content=$sms_cust['content']; $sender_status=1;
      	  	} else {
      	  		$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '$sub_cust_type' AND `status` = '1'"));
      	  		if ((isset($get_ms['title'])) && (!empty($get_ms['title']))) {
      	  			$tpc=2; $set_cust_title=$get_ms['title']; $set_cust_content=$get_ms['content']; $sender_status=1;
      	  		}
      	  	}
      	  	if ((isset($sender_status)) && (!empty($sender_status))) {
      	  		$title = str_replace($vals, $valsto, $set_cust_title);
    	    	$content = str_replace($vals, $valsto, $set_cust_content);
    	    	if (send_service_sms($get_customer_n['gsm'],$content)) {
    	    	  mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','1')");
    	    	} else {
    	    	  mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','0')");
    	    	}
    	    }
    	    if (isset($sender_status)) { unset($sender_status); }
      	  	if ((isset($sms_deal['title'])) && (!empty($sms_deal['title']))) { 
      	  		$tpc=1; $set_deal_title=$sms_deal['title']; $set_deal_content=$sms_deal['content']; $sender_status=1;
      	  	} else {
      	  		$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '$sub_deal_type' AND `status` = '1'"));
      	  		if ((isset($get_ms['title'])) && (!empty($get_ms['title']))) {
      	  			$tpc=2; $set_deal_title=$get_ms['title']; $set_deal_content=$get_ms['content']; $sender_status=1;
      	  		}
      	  	}
      	  	if ((isset($sender_status)) && (!empty($sender_status))) {
      	  		$title = str_replace($vals, $valsto, $set_deal_title);
    	    	$content = str_replace($vals, $valsto, $set_deal_content);
    	    	if (send_service_sms($get_dealer_n['gsm'],$content)) {
    	    	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','1')");
    	    	} else {
    	    	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','0')");
    	    	}
    	    }
      	    if (isset($sender_status)) { unset($sender_status); }
      	  }
      	}
        $error = '2012';
      } else {
        $error = '1031';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="service_delete")) {
  if ($_SESSION['p4']['pdel']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if (!isset($error)) {
      $update=mysqli_query($con, "UPDATE `customers_service` SET `deleted_at` = '$time', `status` = '0' WHERE `id` = '$process_id'");
      if ($update) {
        $error = '2013';
      } else {
        $error = '1032';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="service_shift")) {
  if ($_SESSION['p4']['pedit']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if (((isset($_POST['period'])) && (!empty($_POST['period']))) || ((isset($_POST['periodc'])) && (!empty($_POST['periodc'])))) {
      if ((isset($_POST['periodc'])) && (!empty($_POST['periodc']))) {
        $period=varsql($_POST['periodc']);
      } else {
        $period=varsql($_POST['period']);
      }
    } else {
      $error = '1033';
    }
    if (!isset($error)) {
      $description=varsql($_POST['description']);
      $new_service_date=$period * 86400;
      $update=mysqli_query($con, "UPDATE `customers_service` SET `nextservice` = `nextservice` + '$new_service_date', `description` = '$description' WHERE (`customer_device_id` = '$process_id' AND `customer_id` = '$id') AND `resolved` = '0'");
      if ($update) {
        $error = '2014';
      } else {
        $error = '1034';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="employee_attach")) {
  if ($_SESSION['p7']['padd']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if (!isset($error)) {
      $insert=mysqli_query($con, "INSERT IGNORE INTO `customers_employee` VALUES ('','$id','$process_id')");
      if ($insert) {
        $error = '2015';
      } else {
        $error = '1035';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="employee_delete")) {
  if ($_SESSION['p7']['pdel']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if (!isset($error)) {
      $delete=mysqli_query($con, "DELETE FROM `customers_employee` WHERE `employee_id` = '$process_id' AND `customer_id` = '$id'");
      if ($delete) {
        $error = '2016';
      } else {
        $error = '1036';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="image_upload")) {
  if ($_SESSION['p8']['padd']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
      $uploaddir = '../uploads/customers';
      $verifyimg = getimagesize($_FILES['image']['tmp_name']);
      $pattern = "#^(image/)[^\s\n<]+$#i";
      if(!preg_match($pattern, $verifyimg['mime'])){
        $error = '1042';
      }
      if (!isset($error)) {
        $filename=$time.'.'.str_pad((string)$_SESSION['dealer_id'], 11, "0", STR_PAD_LEFT);
        $uploadfile = tempnam_sfx($uploaddir, $filename, ".tmp");
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
          $description=varsql($_POST['description']);
          $insert = mysqli_query($con, "INSERT INTO `customers_image` VALUES ('','$id','0','$filename','$description','$time','0','1')");
          if ($insert) {
            $error = '2017';
          } else {
            unlink($uploadfile);
            $error = '1037';
          }
        } else {
          $error = '1038';
        }
      } else {
        $error = '1039';
      }
    } else {
      $error = '1040';
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="image_delete")) {
  if ($_SESSION['p8']['pdel']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if (!isset($error)) {
      $update=mysqli_query($con, "UPDATE `customers_image` SET `deleted_at` = '$time', `status` = '0' WHERE `id` = '$process_id' AND `customer_id` = '$id'");
      if ($update) {
        $error = '2018';
      } else {
        $error = '1041';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="message")) {
  if (isset($_SESSION['employee_id'])) {
    $error='1000';
  } else {
    $id=varsql($_POST['id']);
    if (isset($_POST['email'])) {
      $email=varsql($_POST['email']);
    } else {
      $email=0;
    }
    if (isset($_POST['sms'])) {
      $sms=varsql($_POST['sms']);
    } else {
      $sms=0;
    }
    if (isset($_POST['notification'])) {
      $notification=varsql($_POST['notification']);
    } else {
      $notification=0;
    }
    if ((isset($_POST['message'])) && (!empty($_POST['message']))) {
      $message=varsql($_POST['message']);
    } else {
      $error = '1043';
    }
    if (!isset($error)) {
      $insert=mysqli_query($con, "INSERT INTO `message_requests` VALUES ('','$_SESSION[dealer_id]','$id','$email','$sms','$notification','$message','$time','0','0')");
      if ($insert) {
        $error = '2019';
      } else {
        $error = '1044';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="defect")) {
  if ($_SESSION['p5']['padd']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['date'])) && (!empty($_POST['date']))) {
  	  $date = strtotime($_POST['date']);
    } else {
      $error = '1045';
    }
    if ((isset($_POST['device_id'])) && (!empty($_POST['device_id']))) {
      $device_id=varsql($_POST['device_id']);
    } else {
      $error = '1045';
    }
    if ((isset($_POST['description'])) && (!empty($_POST['description']))) {
      $description=varsql($_POST['description']);
    } else {
      $error = '1045';
    }
    if (!isset($error)) {
      $insert=mysqli_query($con, "INSERT INTO `defects` VALUES ('','$id','$device_id','$description','','$date','0','0','0')");
      if ($insert) {
      	$check_perm=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `email`,`sms` FROM `customers_config` WHERE `customer_id` = '$id'"));
      	$sub_cust_type=5; $sub_deal_type=6;
      	$get_dealer_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`, `email`, `gsm` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
      	$get_customer_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `firstname`, `lastname`, `email`, `gsm` FROM `customers` WHERE `id` = '$id'"));
      	$get_device_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices`.`name` as `name`, `devices`.`manufacturer` as `manufacturer` FROM `customers_device` INNER JOIN `devices` ON `devices`.`id`=`customers_device`.`device_id` WHERE `customers_device`.`id` = '$device_id'"));
    	$vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]");
    	$valsto = array($get_customer_n['firstname']." ".$get_customer_n['lastname'], $get_customer_n['email'], $get_customer_n['gsm'], $get_dealer_n['title'], $get_dealer_n['email'], $get_dealer_n['gsm'], $get_device_n['name'], $get_device_n['manufacturer']);
      	if ($check_perm['email']==1) {
      		$mail_cust=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '1' AND `type` = '$sub_cust_type') AND (`status`='1' AND `device_id` = '$get_device_n[id]')"));
    		$mail_deal=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '1' AND `type` = '$sub_deal_type') AND (`status`='1' AND `device_id` = '$get_device_n[id]')"));
      		if ((isset($mail_cust)) && (!empty($mail_cust))) { 
      			$tpc=1; $set_cust_title=$mail_cust['title']; $set_cust_content=$mail_cust['content']; $sender_status=1;
      		} else {
      			$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '$sub_cust_type' AND `status` = '1'"));
      			if ((isset($get_ms)) && (!empty($get_ms))) {
      				$tpc=2; $set_cust_title=$get_ms['title']; $set_cust_content=$get_ms['content']; $sender_status=1;
      			}
      		}
      		if ((isset($sender_status)) && (!empty($sender_status))) {
      			$title = str_replace($vals, $valsto, $set_cust_title);
    	  		$content = str_replace($vals, $valsto, $set_cust_content);
    	  	if (send_service_mail($title,$content,$get_customer_n['email'],$get_customer_n['firstname']." ".$get_customer_n['lastname'])) {
    	  	  mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','1')");
    	  	} else {
    	  	  mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','0')");
    	  	}
    	  }
      	  if (isset($sender_status)) { unset($sender_status); }
      		if ((isset($mail_deal)) && (!empty($mail_deal))) { 
      			$tpc=1; $set_deal_title=$mail_deal['title']; $set_deal_content=$mail_deal['content']; $sender_status=1;
      		} else {
      			$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '$sub_deal_type' AND `status` = '1'"));
      			if ((isset($get_ms)) && (!empty($get_ms))) {
      				$tpc=2; $set_deal_title=$get_ms['title']; $set_deal_content=$get_ms['content']; $sender_status=1;
      			}
      		}
      		if ((isset($sender_status)) && (!empty($sender_status))) {
      			$title = str_replace($vals, $valsto, $set_deal_title);
    	  	$content = str_replace($vals, $valsto, $set_deal_content);
    	  	if (send_service_mail($title,$content,$get_dealer_n['email'],$get_dealer_n['title'])) {
    	  	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','1')");
    	  	} else {
    	  	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','0')");
    	  	}
    	  }
      	  if (isset($sender_status)) { unset($sender_status); }
      	}
      	if ($check_perm['sms']==1) {
      		$sms_cust=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '2' AND `type` = '$sub_cust_type') AND (`status`='1' AND `device_id` = '$get_device_n[id]')"));
    		$sms_deal=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '2' AND `type` = '$sub_deal_type') AND (`status`='1' AND `device_id` = '$get_device_n[id]')"));
      		if ((isset($sms_cust)) && (!empty($sms_cust))) { 
      			$tpc=1; $set_cust_title=$sms_cust['title']; $set_cust_content=$sms_cust['content']; $sender_status=1;
      		} else {
      			$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '$sub_cust_type' AND `status` = '1'"));
      			if ((isset($get_ms)) && (!empty($get_ms))) {
      				$tpc=2; $set_cust_title=$get_ms['title']; $set_cust_content=$get_ms['content']; $sender_status=1;
      			}
      		}
      		if ((isset($sender_status)) && (!empty($sender_status))) {
      			$title = str_replace($vals, $valsto, $set_cust_title);
    	  	$content = str_replace($vals, $valsto, $set_cust_content);
    	  	if (send_service_sms($get_customer_n['gsm'],$content)) {
    	  	  mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','1')");
    	  	} else {
    	  	  mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','0')");
    	  	}
    	  }
      	  if (isset($sender_status)) { unset($sender_status); }
      		if ((isset($sms_deal)) && (!empty($sms_deal))) { 
      			$tpc=1; $set_deal_title=$sms_deal['title']; $set_deal_content=$sms_deal['content']; $sender_status=1;
      		} else {
      			$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '$sub_deal_type' AND `status` = '1'"));
      			if ((isset($get_ms)) && (!empty($get_ms))) {
      				$tpc=2; $set_deal_title=$get_ms['title']; $set_deal_content=$get_ms['content']; $sender_status=1;
      			}
      		}
      		if ((isset($sender_status)) && (!empty($sender_status))) {
      			$title = str_replace($vals, $valsto, $set_deal_title);
    	  	$content = str_replace($vals, $valsto, $set_deal_content);
    	  	if (send_service_sms($get_dealer_n['gsm'],$content)) {
    	  	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','1')");
    	  	} else {
    	  	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','0')");
    	  	}
    	  }
      	  if (isset($sender_status)) { unset($sender_status); }
      	}
        $error = '2020';
      } else {
        $error = '1046';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="defect_settlement")) {
  if ($_SESSION['p5']['pedit']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if ((isset($_POST['solution_note'])) && (!empty($_POST['solution_note']))) {
      $solution_note=varsql($_POST['solution_note']);
    } else {
      $error = '1045';
    }
    if (!isset($error)) {
      $update=mysqli_query($con, "UPDATE `defects` SET `updated_at` = '$time', `status` = '1', `solution_note` = '$solution_note' WHERE `id` = '$process_id' AND `customer_id` = '$id'");
      if ($update) {
      	$check_perm=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `email`,`sms` FROM `customers_config` WHERE `customer_id` = '$id'"));
      	$sub_cust_type=9; $sub_deal_type=10;
      	$get_dealer_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`, `email`, `gsm` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
      	$get_customer_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `firstname`, `lastname`, `email`, `gsm` FROM `customers` WHERE `id` = '$id'"));
      	$get_device_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices`.`name` as `name`, `devices`.`manufacturer` as `manufacturer` FROM `defects` INNER JOIN `customers_device` ON `customers_device`.`id`=`defects`.`customer_device_id` INNER JOIN `devices` ON `devices`.`id`=`customers_device`.`device_id` WHERE `defects`.`id` = '$process_id' AND `defects`.`customer_id` = '$id'"));
    	$vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]");
    	$valsto = array($get_customer_n['firstname']." ".$get_customer_n['lastname'], $get_customer_n['email'], $get_customer_n['gsm'], $get_dealer_n['title'], $get_dealer_n['email'], $get_dealer_n['gsm'], $get_device_n['name'], $get_device_n['manufacturer']);
      	if ($check_perm['email']==1) {
      		$mail_cust=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '1' AND `type` = '$sub_cust_type') AND (`status`='1' AND `device_id` = '$get_device_n[id]')"));
    		$mail_deal=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '1' AND `type` = '$sub_deal_type') AND (`status`='1' AND `device_id` = '$get_device_n[id]')"));
      		if ((isset($mail_cust)) && (!empty($mail_cust))) { 
      			$tpc=1; $set_cust_title=$mail_cust['title']; $set_cust_content=$mail_cust['content']; $sender_status=1;
      		} else {
      			$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '$sub_cust_type' AND `status` = '1'"));
      			if ((isset($get_ms)) && (!empty($get_ms))) {
      				$sub_cust_type=15; $sub_deal_type=16;
      				$tpc=2; $set_cust_title=$get_ms['title']; $set_cust_content=$get_ms['content']; $sender_status=1;
      			}
      		}
      		if ((isset($sender_status)) && (!empty($sender_status))) {
      			$title = str_replace($vals, $valsto, $set_cust_title);
    	  		$content = str_replace($vals, $valsto, $set_cust_content);
    	  	if (send_service_mail($title,$content,$get_customer_n['email'],$get_customer_n['firstname']." ".$get_customer_n['lastname'])) {
    	  	  mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','1')");
    	  	} else {
    	  	  mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','0')");
    	  	}
    	  }
      	  if (isset($sender_status)) { unset($sender_status); }
      		if ((isset($mail_deal)) && (!empty($mail_deal))) { 
      			$tpc=1; $set_deal_title=$mail_deal['title']; $set_deal_content=$mail_deal['content']; $sender_status=1;
      		} else {
      			$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '$sub_deal_type' AND `status` = '1'"));
      			if ((isset($get_ms)) && (!empty($get_ms))) {
      				$sub_cust_type=15; $sub_deal_type=16;
      				$tpc=2; $set_deal_title=$get_ms['title']; $set_deal_content=$get_ms['content']; $sender_status=1;
      			}
      		}
      		if ((isset($sender_status)) && (!empty($sender_status))) {
      			$title = str_replace($vals, $valsto, $set_deal_title);
    	  	$content = str_replace($vals, $valsto, $set_deal_content);
    	  	if (send_service_mail($title,$content,$get_dealer_n['email'],$get_dealer_n['title'])) {
    	  	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','1')");
    	  	} else {
    	  	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','0')");
    	  	}
    	  }
      	  if (isset($sender_status)) { unset($sender_status); }
      	}
      	if ($check_perm['sms']==1) {
      		$sms_cust=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '2' AND `type` = '$sub_cust_type') AND (`status`='1' AND `device_id` = '$get_device_n[id]')"));
    		$sms_deal=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '2' AND `type` = '$sub_deal_type') AND (`status`='1' AND `device_id` = '$get_device_n[id]')"));
      		if ((isset($sms_cust)) && (!empty($sms_cust))) { 
      			$tpc=1; $set_cust_title=$sms_cust['title']; $set_cust_content=$sms_cust['content']; $sender_status=1;
      		} else {
      			$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '$sub_cust_type' AND `status` = '1'"));
      			if ((isset($get_ms)) && (!empty($get_ms))) {
      				$sub_cust_type=15; $sub_deal_type=16;
      				$tpc=2; $set_cust_title=$get_ms['title']; $set_cust_content=$get_ms['content']; $sender_status=1;
      			}
      		}
      		if ((isset($sender_status)) && (!empty($sender_status))) {
      			$title = str_replace($vals, $valsto, $set_cust_title);
    	  	$content = str_replace($vals, $valsto, $set_cust_content);
    	  	if (send_service_sms($get_customer_n['gsm'],$content)) {
    	  	  mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','1')");
    	  	} else {
    	  	  mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$id','$tpc','$sub_cust_type','$content','$time','0')");
    	  	}
    	  }
      	  if (isset($sender_status)) { unset($sender_status); }
      		if ((isset($sms_deal)) && (!empty($sms_deal))) { 
      			$tpc=1; $set_deal_title=$sms_deal['title']; $set_deal_content=$sms_deal['content']; $sender_status=1;
      		} else {
      			$get_ms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '$sub_deal_type' AND `status` = '1'"));
      			if ((isset($get_ms)) && (!empty($get_ms))) {
      				$sub_cust_type=15; $sub_deal_type=16;
      				$tpc=2; $set_deal_title=$get_ms['title']; $set_deal_content=$get_ms['content']; $sender_status=1;
      			}
      		}
      		if ((isset($sender_status)) && (!empty($sender_status))) {
      			$title = str_replace($vals, $valsto, $set_deal_title);
    	  	$content = str_replace($vals, $valsto, $set_deal_content);
    	  	if (send_service_sms($get_dealer_n['gsm'],$content)) {
    	  	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','1')");
    	  	} else {
    	  	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$id','$tpc','$sub_deal_type','$content','$time','0')");
    	  	}
    	  }
      	  if (isset($sender_status)) { unset($sender_status); }
      	}
        $error = '2020';
      } else {
        $error = '1046';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="defect_delete")) {
  if ($_SESSION['p5']['pdel']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1021';
    }
    if (!isset($error)) {
      $update=mysqli_query($con, "UPDATE `defects` SET `deleted_at` = '$time' WHERE `id` = '$process_id' AND `customer_id` = '$id'");
      if ($update) {
        $error = '2021';
      } else {
        $error = '1047';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="location_add")) {
  if ($_SESSION['p9']['padd']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if ((isset($_POST['coordinates'])) && (!empty($_POST['coordinates']))) {
      $lg=explode(",", $_POST['coordinates']);
      $lat=$lg[0];
      $lon=$lg[1];
    } else {
      if ((isset($_POST['lat'])) && (!empty($_POST['lat']))) {
        $lat=varsql($_POST['lat']);
      } else {
        $error = '1048';
      }
      if ((isset($_POST['lon'])) && (!empty($_POST['lon']))) {
        $lon=varsql($_POST['lon']);
      } else {
        $error = '1049';
      }
    }
    if (!isset($error)) {
      $update=mysqli_query($con, "UPDATE `customers` SET `latitude` = '$lat', `longitude` = '$lon' WHERE `id` = '$id' AND `dealer_id` = '$_SESSION[dealer_id]'");
      if ($update) {
        $error = '2022';
      } else {
        $error = '1050';
      }
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="location_remove")) {
  if ($_SESSION['p9']['pdel']!=1) {
    $error = '1000';
  } else {
    $id=varsql($_POST['id']);
    if (!isset($error)) {
      $update=mysqli_query($con, "UPDATE `customers` SET `latitude` = '0', `longitude` = '0' WHERE `id` = '$id' AND `dealer_id` = '$_SESSION[dealer_id]'");
      if ($update) {
        $error = '2023';
      } else {
        $error = '1051';
      }
    }
  }
}
