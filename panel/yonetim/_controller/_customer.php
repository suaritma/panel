<?php
  if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
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
      $error = '1005';
    }
    if ((isset($_POST['town'])) && (!empty($_POST['town']))) {
      $town=varsql($_POST['town']);
    } else {
      $error = '1006';
    }
    if ((isset($_POST['district'])) && (!empty($_POST['district']))) {
      $district=varsql($_POST['district']);
    } else {
      $error = '1007';
    }
    if ((isset($_POST['street'])) && (!empty($_POST['street']))) {
      $street=varsql($_POST['street']);
    } else {
      $error = '1008';
    }
    if ((isset($_POST['postalcode'])) && (!empty($_POST['postalcode']))) {
      $postalcode=varsql($_POST['postalcode']);
    } else {
      $error = '1009';
    }
    if ((isset($_POST['address'])) && (!empty($_POST['address']))) {
      $address=varsql($_POST['address']);
    } else {
      $error = '1010';
    }
    if (!isset($error)) {
      $company_id=varsql($_POST['company']);
      $dealer_id=varsql($_POST['dealer']);
      $email=varsql($_POST['email']);
      $birthday=strtotime($_POST['birthdate']);
      $status=strtotime($_POST['status']);
      $get_country=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `country` FROM `companies` WHERE `id` = $company_id''"));
      $insert=mysqli_query($con, "INSERT INTO `customers` VALUES ('','$company_id','$dealer_id','$firstname','$lastname','$email','$gsm','$birthday','$get_country[country]','$city','$town','$district','$street','$address','0','0','0','$time','0','0','$status')");
      if ($insert) {
      	$get_id=mysqli_insert_id($con);
        mysqli_query($con, "INSERT INTO `customers_config` VALUES ('','$get_id','180','1','1','1','1','1','1','1','1')");
      	if ((isset($_POST['welcome'])) && ($_POST['welcome']==1)) {
      		$get_dealer_n=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`, `email`, `gsm` FROM `dealers` WHERE `id` = '$dealer_id'"));
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
      			$vals = array("[isim]", "[eposta]", "[gsm]");
    	    	$valsto = array($firstname." ".$lastname, $email, $gsm);
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
        $error = '1011';
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="delete")) {
    if ((isset($_POST['id'])) && (!empty($_POST['id']))) {
      $id=varsql($_POST['id']);
    } else {
      $error = '1012';
    }
    if (!isset($error)) {
      $delete=mysqli_query($con, "UPDATE `customers` SET `deleted_at` = '$time', `status` = '0' WHERE `id` = '$id'");
      if ($delete) {
        $error = '2001';
      } else {
        $error = '1011';
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="bulk_add")) {
  
  }
?>
