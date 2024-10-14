<?php
  if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
    if ((isset($_POST['title'])) && (!empty($_POST['title']))) {
      $title=varsql($_POST['title']);
    } else {
      $error = '1015';
    }
    if ((isset($_POST['username'])) && (!empty($_POST['username']))) {
      $username=varsql($_POST['username']);
    } else {
      $error = '1016';
    }
    if ((isset($_POST['password'])) && (!empty($_POST['password']))) {
      $password=md5($_POST['password']);
    } else {
      $error = '1017';
    }
    if ((isset($_POST['currency'])) && (!empty($_POST['currency']))) {
      $currency=varsql($_POST['currency']);
    } else {
      $error = '1018';
    }
    if ((isset($_POST['language'])) && (!empty($_POST['language']))) {
      $language=varsql($_POST['language']);
    } else {
      $error = '1019';
    }
    if (!isset($error)) {
      $company_id=varsql($_POST['company_id']);
      $dealer_code=varsql($_POST['dealer_code']);
      $email=varsql($_POST['company_id']);
      $gsm=varsql($_POST['gsm']);
      $city=varsql($_POST['city']);
      $town=varsql($_POST['town']);
      $district=varsql($_POST['district']);
      $street=varsql($_POST['street']);
      $address=varsql($_POST['address']);
      $status=varsql($_POST['status']);
      $insert=mysqli_query($con, "INSERT INTO `dealers` VALUES ('','$company_id','$dealer_code','$username','$password','$email','$gsm','$title','$city','$town','$district','$street','$address','$currency','$language','0','$time','0','0','$status')");
      if ($insert) {
      	$get_id=mysqli_insert_id($con);
      	mysqli_query($con, "INSERT INTO `dealers_location` VALUES ('','$get_id','','','','')");
      	mysqli_query($con, "INSERT INTO `dealers_stats` VALUES ('','$get_id','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','','')");
      	if ((isset($_POST['welcome'])) && ($_POST['welcome']==1)) {
          	$get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '20' AND `status` = '1'"));
          	if ((isset($get)) && (!empty($get))) {
      			$vals = array("[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]");
    	    	$valsto = array($title, $email, $gsm);
        		$title = str_replace($vals, $valsto, $get['title']);
          		$content = str_replace($vals, $valsto, $get['content']);
          		if (send_service_mail($title,$content,$email,$title)) {
          			mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$get_id','2','$get[id]','$content','$time','1')");
          		} else {
          			mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$get_id','2','$get[id]','$content','$time','0')");
          		}
          	}
          	$get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '20' AND `status` = '1'"));
          	if ((isset($get)) && (!empty($get))) {
      			$vals = array("[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]");
    	    	$valsto = array($title, $email, $gsm);
        		$title = str_replace($vals, $valsto, $get['title']);
          		$content = str_replace($vals, $valsto, $get['content']);
          		if (send_service_sms($gsm,$content)) {
          			mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$get_id','2','$get[id]','$content','$time','1')");
          		} else {
          			mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$get_id','2','$get[id]','$content','$time','0')");
          		}
          	}
      	}
        $error = '2001';
      } else {
        $error = '1011';
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="edit")) {
    $process_id=varsql($_POST['process_id']);
    if ((isset($_POST['title'])) && (!empty($_POST['title']))) {
      $title=varsql($_POST['title']);
    } else {
      $error = '1019';
    }
    if ((isset($_POST['username'])) && (!empty($_POST['username']))) {
      $username=varsql($_POST['username']);
    } else {
      $error = '1020';
    }
    if ((isset($_POST['password'])) && (!empty($_POST['password']))) {
      $password=md5($_POST['password']);
    } else {
      $get_pass=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `password` FROM `dealers` WHERE `id` = '$process_id'"));
      $password = $get_pass['password'];
    }
    if ((isset($_POST['currency'])) && (!empty($_POST['currency']))) {
      $currency=varsql($_POST['currency']);
    } else {
      $error = '1021';
    }
    if ((isset($_POST['language'])) && (!empty($_POST['language']))) {
      $language=varsql($_POST['language']);
    } else {
      $error = '1022';
    }
    if (!isset($error)) {
      $company_id=varsql($_POST['company_id']);
      $dealer_code=varsql($_POST['dealer_code']);
      $email=varsql($_POST['email']);
      $gsm=varsql($_POST['gsm']);
      $city=varsql($_POST['city']);
      $town=varsql($_POST['town']);
      $district=varsql($_POST['district']);
      $street=varsql($_POST['street']);
      $address=varsql($_POST['address']);
      $status=varsql($_POST['status']);
      $update=mysqli_query($con, "UPDATE `dealers` SET `company_id` = '$company_id', `dealer_code` = '$dealer_code', `username` = '$username', `password` = '$password', `email` = '$email', `gsm` = '$gsm', `title` = '$title', `city` = '$city', `town` = '$town', `district` = '$district', `street` = '$street', `address` = '$address', `currency` = '$currency', `language` = '$language', `updated_at` = '$time', `status` = '$status' WHERE `id` = '$process_id'");
      if ($update) {
        $error = '2001';
      } else {
        $error = '1011';
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="delete")) {
    if ((isset($_POST['id'])) && (!empty($_POST['id']))) {
      $id=varsql($_POST['id']);
    } else {
      $error = '1023';
    }
    if (!isset($error)) {
      $delete=mysqli_query($con, "UPDATE `dealers` SET `deleted_at` = '$time', `status` = '0' WHERE `id` = '$id'");
      if ($delete) {
        $error = '2001';
      } else {
        $error = '1011';
      }
    }
  }
?>
