<?php
  include("db.php");
  include("function.php");
  if ((isset($_GET['hourly'])) && (!empty($_GET['hourly']))) {
  	mysqli_query($con, "INSERT INTO `crons` VALUES ('','1','$time','','0')");
  	$cronid=mysqli_insert_id($con);
    $today=date("d/m/Y", $time);
    // RAPORLAR
    $count_service_notification_all=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE (`customers_config`.`email` = '1' OR `customers_config`.`sms` = '1') AND `customers_service`.`nextservice` <= '$time'"));
    $count_service_notification_email=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`email` = '1' AND `customers_service`.`nextservice` <= '$time'"));
    $count_service_notification_sms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`sms` = '1' AND `customers_service`.`nextservice` <= '$time'"));
    $count_service_notification_mobile=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`notification` = '1' AND `customers_service`.`nextservice` <= '$time'"));
    $count_birthday_all=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE (`customers_config`.`email` = '1' OR `customers_config`.`sms` = '1') AND `customers_config`.`birthday ` = '1'"));
    $count_birthday_email=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`email` = '1' AND `customers_config`.`birthday ` = '1'"));
    $count_birthday_sms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`sms` = '1' AND `customers_config`.`birthday ` = '1'"));
    $count_birthday_mobile=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`notification` = '1' AND `customers_config`.`birthday ` = '1'"));
    $count_special_day_all=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE (`customers_config`.`email` = '1' OR `customers_config`.`sms` = '1') AND `customers_config`.`special` = '1'"));
    $count_special_day_email=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`email` = '1' AND `customers_config`.`special` = '1'"));
    $count_special_day_sms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`sms` = '1' AND `customers_config`.`special` = '1'"));
    $count_special_day_mobile=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`notification` = '1' AND `customers_config`.`special` = '1'"));
    $count_campaign_all=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE (`customers_config`.`email` = '1' OR `customers_config`.`sms` = '1') AND `customers_config`.`campaign` = '1'"));
    $count_campaign_email=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`email` = '1' AND `customers_config`.`campaign` = '1'"));
    $count_campaign_sms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`sms` = '1' AND `customers_config`.`campaign` = '1'"));
    $count_campaign_mobile=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_config`.`customer_id`) as `total` FROM `customers_config` INNER JOIN `customers_service` ON `customers_config`.`customer_id`=`customers_service`.`customer_id` WHERE `customers_config`.`notification` = '1' AND `customers_config`.`campaign` = '1'"));
    $count_company=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `companies` WHERE `status` = '1'"));
    $count_dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `dealers` WHERE `status` = '1'"));
    mysqli_query($con, "TRUNCATE TABLE `reports`");
    mysqli_query($con, "INSERT INTO `reports` VALUES ('','$count_service_notification_all[total]','$count_service_notification_email[total]','$count_service_notification_sms[total]','$count_birthday_mobile[total]','$count_birthday_all[total]','$count_birthday_email[total]','$count_birthday_sms[total]','$count_birthday_mobile[total]','$count_special_day_all[total]','$count_special_day_email[total]','$count_special_day_sms[total]','$count_special_day_mobile[total]','$count_campaign_all[total]','$count_campaign_email[total]','$count_campaign_sms[total]','$count_campaign_mobile[total]','$count_company[total]','$count_dealer[total]')");
    // İSTEK ÜZERİNE YAPILAN BİLDİRİMLER
echo 'ben buradayım';
		$message_req=mysqli_query($con, "SELECT * FROM `message_requests` WHERE `completed` = '0' AND `status` = '1'");
    while($row=@mysqli_fetch_assoc($message_req)) {
    	$result_message_request[] = $row;
    }
    if (!empty($result_message_request)) {
    	foreach ($result_message_request as $res) {
			
    		$check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `email`, `sms`, `notification` FROM `customers_config` WHERE `id` = '$res[customer_id]'"));
    		$customer_info=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `firstname`, `lastname`, `email`, `gsm` FROM `customers` WHERE `id` = '$res[customer_id]'"));
    		$dealer_info=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `title`, `email`, `gsm` FROM `dealers` WHERE `id` = '$res[dealer_id]'"));
    	    $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]");
    	    $valsto = array($customer_info['firstname']." ".$customer_info['lastname'], $customer_info['email'], $customer_info['gsm'], $dealer_info['title'], $dealer_info['email'], $dealer_info['gsm']);
    	    $title = str_replace($vals, $valsto, "Aquacora Bayinizden Mesaj Var");
    	    $content = str_replace($vals, $valsto, $res['content']);
    		if (($check['email']) && ($res['email'])) {
    	      	if (send_service_mail($title,$content,$customer_info['email'],$customer_info['firstname'].' '.$customer_info['lastname'])) {
    	      		mysqli_query($con, "UPDATE `message_requests` SET `completed` = '1' WHERE `id` = '$res[id]'");
								mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','2','0','$content','$time','1')");
								echo "ben buradayım1";
    	      	} else {
								mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','2','0','$content','$time','1')");
								echo "ben buradayım2";
								mysqli_query($con, "UPDATE `message_requests` SET `completed` = '1' WHERE `id` = '$res[id]'");
    	      	}
    		}
    		if (($check['sms']) && ($res['sms'])) {
    	      	if (send_service_sms($customer_info['gsm'],$content)) {
    	      		mysqli_query($con, "UPDATE `message_requests` SET `completed` = '1' WHERE `id` = '$res[id]'");
								mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[customer_id]','2','0','$content','$time','1')");
								echo "ben buradayım3";
    	      	} else {
								mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[customer_id]','2','0','$content','$time','1')");
								echo "ben buradayım4";
								mysqli_query($con, "UPDATE `message_requests` SET `completed` = '1' WHERE `id` = '$res[id]'");
    	      	}
    		}
    		if (($check['notification']) && ($res['notification'])) {
    		/*
    	      	if (send_service_mail($title,$content,$customer_info['email'],$customer_info['firstname'].' '.$customer_info['lastname'])) {
    	      		mysqli_query($con, "UPDATE `message_requests` SET `completed` = '1' WHERE `id` = '$res[id]'");
    	      		mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','2','0','$content','$time','1')");
    	      	} else {
    	      		mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','2','0','$content','$time','0')");
    	      	}
    	    */
    		}
    	}
    }
    // SERVİS BİLDİRİMLERİ
    $customers_service=mysqli_query($con, "SELECT `customers_service`.`id` as `id`, `customers_service`.`customer_id` as `customer_id`, `customers_service`.`price` as `service_price`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`email` as `email`, `customers`.`gsm` as `gsm`, `customers_config`.`email` as `c_email`, `customers_config`.`sms` as `c_sms`, `customers_config`.`notification` as `c_notification`, `devices`.`name` as `name`, `devices`.`manufacturer` as `manufacturer`, `devices`.`price` as `price`, `dealers`.`title` as `title`, `dealers`.`email` as `dealer_email`, `dealers`.`gsm` as `dealer_gsm`, `customers_service`.`service_id` as `service_id`, `customers_service`.`device_id` as `device_id`, `dealers`.`id` as `dealer_id` FROM `customers_service` LEFT JOIN `customers_config` ON `customers_service`.`customer_id`=`customers_config`.`customer_id` LEFT JOIN `customers` ON `customers`.`id`=`customers_service`.`customer_id` LEFT JOIN `devices` ON `devices`.`id` = `customers_service`.`device_id` LEFT JOIN `dealers` ON `dealers`.`id`=`customers`.`dealer_id` WHERE (`customers_service`.`nextservice` <= '$time' AND `customers_service`.`resolved` = '0') AND (`customers_service`.`service_id` = '2' AND `customers_service`.`notified` = '0') AND `customers_config`.`service` = '1' GROUP BY `customers_service`.`id`");
    while($row=@mysqli_fetch_assoc($customers_service)) {
			$result_services[] = $row;
			echo "ben buradayım5";
    }
    if (!empty($result_services)) {
			$total_notif=count($result_services);
			echo "ben buradayım6";
    } else {
			$total_notif=0;
			echo "ben buradayım7";
    }
    $sended_notif=0;
    $unsended_notif=0;
    if (!empty($result_services)) {
    	foreach ($result_services as $res) {
    	  if ($res['c_email']==1) {
    	    $checkc=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '1' AND `type` = '7') AND (`status`='1' AND `device_id` = '$res[device_id]')"));
					$checkb=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '1' AND `type` = '8') AND (`status`='1' AND `device_id` = '$res[device_id]')"));
					echo "ben buradayım8";
    	    if (!empty($checkc)) {
    	      $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	      $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	      $title = str_replace($vals, $valsto, $checkc['title']);
						$content = str_replace($vals, $valsto, $checkc['content']);
						echo "ben buradayım9";
    	      	if (send_service_mail($title,$content,$res['email'],$res['firstname'].' '.$res['lastname'])) {
    	      		$sended_notif++;
								mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");
								echo $res[id];
								mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','1','$checkc[id]','$content','$time','1')");
								echo "ben buradayım10";
    	      	} else {
    	      		$unsended_notif++;
								mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','1','$checkc[id]','$content','$time','1')");
								echo "ben buradayım11";
								mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");

    	      	}
    	    } else {
						$get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '11' AND `status` = '1'"));
						echo "ben buradayım12";
    	      if (!empty($get)) {
    	        $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	        $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	        $title = str_replace($vals, $valsto, $get['title']);
							$content = str_replace($vals, $valsto, $get['content']);
							echo "ben buradayım13";
    	      		if (send_service_mail($title,$content,$res['email'],$res['firstname'].' '.$res['lastname'])) {
    	      		$sended_notif++;
    	      			mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");
									mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','2','$get[id]','$content','$time','1')");
									echo "ben buradayım14";
    	      		} else {
    	      		$unsended_notif++;
									mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','2','$get[id]','$content','$time','1')");
									echo "ben buradayım15";
									mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");

    	      		}
    	      }
    	    }
    	    if (!empty($checkb)) {
    	      $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	      $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	      $title = str_replace($vals, $valsto, $checkc['title']);
						$content = str_replace($vals, $valsto, $checkc['content']);
						echo "ben buradayım16";
    	      	if (send_service_mail($title,$content,$res['dealer_email'],$res['title'])) {
    	      		$sended_notif++;
								mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$res[dealer_id]','1','$checkb[id]','$content','$time','1')");
								echo "ben buradayım17";
    	      		} else {
    	      		$unsended_notif++;
								mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$res[dealer_id]','1','$checkb[id]','$content','$time','1')");
								echo "ben buradayım18";
    	      		}
    	    } else {
						$get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '12' AND `status` = '1'"));
						echo "ben buradayım19";
    	      if (!empty($get)) {
    	        $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	        $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	        $title = str_replace($vals, $valsto, $get['title']);
							$content = str_replace($vals, $valsto, $get['content']);
							echo "ben buradayım20";
    	      		if (send_service_mail($title,$content,$res['dealer_email'],$res['title'])) {
    	      		$sended_notif++;
								mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$res[dealer_id]','2','$get[id]','$content','$time','1')");
								echo "ben buradayım21";
    	      		} else {
    	      		$unsended_notif++;
								mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$res[dealer_id]','2','$get[id]','$content','$time','1')");
								echo "ben buradayım22";
    	      		}
    	      }
    	    }
    	  }
    	  if ($res['c_sms']==1) {
    	    $checkc=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '2' AND `type` = '7') AND (`status`='1' AND `device_id` = '$res[device_id]')"));
					$checkb=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '2' AND `type` = '8') AND (`status`='1' AND `device_id` = '$res[device_id]')"));
					echo "ben buradayım23";
    	    if (!empty($checkc)) {
    	      $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	      $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	      $title = str_replace($vals, $valsto, $checkc['title']);
						$content = str_replace($vals, $valsto, $checkc['content']);
						echo "ben buradayım24";
    	      	if (send_service_sms($res['gsm'],$content)) {
    	      		$sended_notif++;
    	      		mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");
								mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[customer_id]','1','$checkc[id]','$content','$time','1')");
								echo "ben buradayım25";
    	      	} else {
    	      		$unsended_notif++;
								mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[customer_id]','1','$checkc[id]','$content','$time','1')");
								echo "ben buradayım26";
								mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");
    	      	}
    	    } else {
						$get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '11' AND `status` = '1'"));
						echo "ben buradayım27";
    	      if (!empty($get)) {
    	        $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	        $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	        $title = str_replace($vals, $valsto, $get['title']);
							$content = str_replace($vals, $valsto, $get['content']);
							echo "ben buradayım28";
    	      		if (send_service_sms($res['gsm'],$content)) {
    	      		$sended_notif++;
    	      			mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");
									mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[customer_id]','2','$get[id]','$content','$time','1')");
									echo "ben buradayım29";
    	      		} else {
    	      		$unsended_notif++;
									mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[customer_id]','2','$get[id]','$content','$time','1')");
									echo "ben buradayım30";
									mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");
    	      		}
    	      }
    	    }
    	    if (!empty($checkb)) {
    	      $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	      $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	      $title = str_replace($vals, $valsto, $checkb['title']);
						$content = str_replace($vals, $valsto, $checkb['content']);
						echo "ben buradayım31";
    	      	if (send_service_sms($res['dealer_gsm'],$content)) {
    	      		$sended_notif++;
								mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$res[dealer_id]','1','$checkb[id]','$content','$time','1')");
								echo "ben buradayım32";
    	      	} else {
    	      		$unsended_notif++;
								mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$res[dealer_id]','1','$checkb[id]','$content','$time','1')");
								echo "ben buradayım33";
    	      	}
    	    } else {
						$get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '12' AND `status` = '1'"));
						echo "ben buradayım34";
    	      if (!empty($get)) {
    	        $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	        $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	        $title = str_replace($vals, $valsto, $get['title']);
							$content = str_replace($vals, $valsto, $get['content']);
							echo "ben buradayım35";
    	      		if (send_service_sms($res['dealer_gsm'],$content)) {
    	      		$sended_notif++;
								mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$res[dealer_id]','2','$get[id]','$content','$time','1')");
								echo "ben buradayım36";
    	      		} else {
    	      		$unsended_notif++;
								mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$res[dealer_id]','2','$get[id]','$content','$time','0')");
								echo "ben buradayım37";
    	      		}
    	      }
    	    }
    	  }
    	  if ($res['c_notification']==1) {
    	  /*
    	    $checkc=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '3' AND `type` = '7') AND (`status`='1' AND `device_id` = '$res[device_id]')"));
    	    $checkb=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `devices_notification` WHERE (`notif` = '3' AND `type` = '8') AND (`status`='1' AND `device_id` = '$res[device_id]')"));
    	    if (!empty($checkc)) {
    	      $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	      $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	      $title = str_replace($vals, $valsto, $checkc['title']);
    	      $content = str_replace($vals, $valsto, $checkc['content']);
    	      	if (send_service_notif()) {
    	      		$sended_notif++;
    	      		mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");
    	      		mysqli_query($con, "INSERT INTO `customers_notification` VALUES ('','$res[customer_id]','1','$checkc[id]','$content','$time','1')");
    	      	} else {
    	      		$unsended_notif++;
    	      		mysqli_query($con, "INSERT INTO `customers_notification` VALUES ('','$res[customer_id]','1','$checkc[id]','$content','$time','0')");
    	      	}
    	    } else {
    	      $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `notifications` WHERE `type` = '11' AND `status` = '1'"));
    	      if (!empty($get)) {
    	        $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	        $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	        $title = str_replace($vals, $valsto, $get['title']);
    	        $content = str_replace($vals, $valsto, $get['content']);
    	      		if (send_service_notif()) {
    	      		$sended_notif++;
    	      			mysqli_query($con, "UPDATE `customers_service` SET `notified` = '1' WHERE `id` = '$res[id]'");
    	      		mysqli_query($con, "INSERT INTO `customers_notification` VALUES ('','$res[customer_id]','2','$get[id]','$content','$time','1')");
    	      	} else {
    	      		$unsended_notif++;
    	      		mysqli_query($con, "INSERT INTO `customers_notification` VALUES ('','$res[customer_id]','2','$get[id]','$content','$time','0')");
    	      		}
    	      }
    	    }
    	    if (!empty($checkb)) {
    	      $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	      $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	      $title = str_replace($vals, $valsto, $checkb['title']);
    	      $content = str_replace($vals, $valsto, $checkb['content']);
    	      	if (send_service_notif()) {
    	      		$sended_notif++;
    	      		mysqli_query($con, "INSERT INTO `dealers_notification` VALUES ('','$res[dealer_id]','1','$checkb[id]','$content','$time','1')");
    	      	} else {
    	      		$unsended_notif++;
    	      		mysqli_query($con, "INSERT INTO `dealers_notification` VALUES ('','$res[dealer_id]','1','$checkb[id]','$content','$time','0')");
    	      	}
    	    } else {
    	      $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `notifications` WHERE `type` = '12' AND `status` = '1'"));
    	      if (!empty($get)) {
    	        $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[cihaz_isim]", "[cihaz_marka]", "[cihaz_fiyat]", "[servis_fiyat]");
    	        $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], $res['title'], $res['dealer_email'], $res['dealer_gsm'], $res['name'], $res['manufacturer'], $res['price'], $res['service_price']);
    	        $title = str_replace($vals, $valsto, $get['title']);
    	        $content = str_replace($vals, $valsto, $get['content']);
    	      		if (send_service_notif()) {
    	      		$sended_notif++;
    	      		mysqli_query($con, "INSERT INTO `dealers_notification` VALUES ('','$res[dealer_id]','2','$get[id]','$content','$time','1')");
    	      	} else {
    	      		$unsended_notif++;
    	      		mysqli_query($con, "INSERT INTO `dealers_notification` VALUES ('','$res[dealer_id]','2','$get[id]','$content','$time','0')");
    	      		}
    	      }
    	    }
    	    */
    	  }
    	}
    }
    $setres = "TOTAL: ".$total_notif." - SENDED: ".$sended_notif." - UNSENDED: ".$unsended_notif;
  	mysqli_query($con, "UPDATE `crons` SET `status` = '1', `result` = '$setres' WHERE `id` = '$cronid'");
  } elseif ((isset($_GET['daily'])) && (!empty($_GET['daily']))) {
  	mysqli_query($con, "INSERT INTO `crons` VALUES ('','2','$time','','0')");
  	$cronid=mysqli_insert_id($con);
  // DOĞUM GÜNÜ KUTLAMASI
    $birth_d=date("d", $time);
    $birth_m=date("m", $time);
    $birth=mysqli_query($con, "SELECT `customers`.`id` as `customer_id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`email` as `email`, `customers`.`gsm` as `gsm`, `customers_config`.`email` as `c_email`, `customers_config`.`sms` as `c_sms`, `customers_config`.`notification` as `c_notification` FROM `customers` INNER JOIN `customers_config` ON `customers`.`id` = `customers_config`.`customer_id` WHERE (MONTH(FROM_UNIXTIME(`birthdate`)) = '$birth_m' AND DAY(FROM_UNIXTIME(`birthdate`)) = '$birth_d') AND (`birthdate` != '0' AND `customers_config`.`birthday` = '1')");
    while ($row=@mysqli_fetch_assoc($birth)) {
    	$result_birth[] = $row;
    }
    if (!empty($result_birth)) {
      $vals = array("[isim]", "[eposta]", "[gsm]", "[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]");
      foreach ($result_birth as $res) {
      $valsto = array($res['firstname']." ".$res['lastname'], $res['email'], $res['gsm'], '', '', '');
        if ($res['c_email']==1) {
          $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `emails` WHERE `type` = '13' AND `status` = '1'"));
        	$title = str_replace($vals, $valsto, $get['title']);
          $content = str_replace($vals, $valsto, $get['content']);
          if (send_service_mail($title,$content,$res['email'],$res['firstname'].' '.$res['lastname'])) {
          	mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','1','$get[id]','$content','$time','1')");
          } else {
          	mysqli_query($con, "INSERT INTO `customers_email` VALUES ('','$res[customer_id]','1','$get[id]','$content','$time','0')");
          }
        }
        if ($res['c_sms']==1) {
          $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `messages` WHERE `type` = '13' AND `status` = '1'"));
        	$title = str_replace($vals, $valsto, $get['title']);
          $content = str_replace($vals, $valsto, $get['content']);
          if (send_service_sms($res['gsm'],$content)) {
          	mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[customer_id]','1','$get[id]','$content','$time','1')");
          } else {
          	mysqli_query($con, "INSERT INTO `customers_message` VALUES ('','$res[customer_id]','1','$get[id]','$content','$time','0')");
          }
        }
        if ($res['c_notification']==1) {
          $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`content` FROM `notifications` WHERE `type` = '13' AND `status` = '1'"));
        	$title = str_replace($vals, $valsto, $get['title']);
          $content = str_replace($vals, $valsto, $get['content']);
          if (send_service_notif()) {
          	mysqli_query($con, "INSERT INTO `customers_notification` VALUES ('','$res[customer_id]','1','$get[id]','$content','$time','1')");
          } else {
          	mysqli_query($con, "INSERT INTO `customers_notification` VALUES ('','$res[customer_id]','1','$get[id]','$content','$time','0')");
          }
        }
      }
    }
  // GÜNLÜK İSTATİSTİKLER
    $total_customer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` WHERE `deleted_at` = '0'"));
    $total_device=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `devices` WHERE `deleted_at` = '0'"));
    $total_dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `dealers` WHERE `deleted_at` = '0'"));
    $brands=mysqli_query($con, "SELECT `manufacturer` FROM `devices` WHERE `status` = '1' GROUP BY `manufacturer` ORDER BY `id` ASC LIMIT 3");
    while ($row = @mysqli_fetch_assoc($brands)) {
    	$result_brands[] = $row;
    }
    foreach ($result_brands as $brnd) {
    	$brand_name[] = $brnd['manufacturer'];
    	$gt = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`devices`.`id`) as `total` FROM `devices` INNER JOIN `customers_device` ON `devices`.`id` = `customers_device`.`device_id` WHERE `devices`.`manufacturer` = '$brnd[manufacturer]'"));
    	$total_brand[] = $gt['total'];
    }
    for ($tg=0; $tg<=2; $tg++) {
    	if (!isset($brand_name[$tg])) { $brand_name[$tg] = "-"; $total_brand[$tg] = 0; }
    }
    $add=mysqli_query($con, "INSERT INTO `stats_daily` VALUES ('','$time','$total_customer[total]','$total_device[total]','$total_dealer[total]','$brand_name[0]','$brand_name[1]','$brand_name[2]','$total_brand[0]','$total_brand[1]','$total_brand[2]')");
    if ($add) {
      $setres = "Daily OK ".date("d/m/Y H:i:s", $time);
    } else {
      $setres = "Daily NOT ".date("d/m/Y H:i:s", $time);
    }
    $cities=mysqli_query($con, "SELECT `id` FROM `pk_il` ORDER BY `id` ASC");
    while($row=@mysqli_fetch_assoc($cities)) {
    	$city[]=$row;
    }
    if (!empty($city)) {
    	foreach($city as $rsc) {
    		$stat1=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` WHERE `city` = '$rsc[id]'"));
    		$stat2=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_device`.`id`) as `total` FROM `customers_device` INNER JOIN `customers` ON `customers_device`.`customer_id`=`customers`.`id` WHERE `customers`.`city` = '$rsc[id]'"));
    		mysqli_query($con, "UPDATE `pk_il` SET `stat1` = '$stat1[total]', `stat2` = '$stat2[total]' WHERE `id` = '$rsc[id]'");
    	}
    	$export_city_json=mysqli_query($con, "SELECT `id`,`stat1`,`stat2` FROM `pk_il` ORDER BY `id` ASC");
    	while($row=@mysqli_fetch_assoc($export_city_json)) {
    		$cmk[]=$row;
    	}
    	foreach($cmk as $cms) {
    		$ccc['states']['customers'][$cms['id']] = $cms['stat1'];
    		$ccc['states']['devices'][$cms['id']] = $cms['stat2'];
    	}
    	$fp = fopen('./yonetim/_json/get_devices_for_map.json', 'w');
		fwrite($fp, json_encode($ccc));
		fclose($fp);
    }
  	mysqli_query($con, "UPDATE `crons` SET `status` = '1', `result` = '$setres' WHERE `id` = '$cronid'");
  } elseif ((isset($_GET['monthly'])) && (!empty($_GET['monthly']))) {
  	mysqli_query($con, "INSERT INTO `crons` VALUES ('','3','$time','','0')");
  	$cronid=mysqli_insert_id($con);
  // BAYİ İSTATİSTİKLERİ
  	$this_month=date("m", $time);
  	$my_start=strtotime(date('Y-m-01 00:00:00', time()));
	$my_end=strtotime(date('Y-m-t 12:59:59', time()));
	$dealers=mysqli_query($con, "SELECT `id` FROM `dealers`");
    while($row=@mysqli_fetch_assoc($dealers)) {
      $result_dealers[] = $row;
    }
    foreach ($result_dealers as $res) {
    	$total_dealer_r=@mysqli_fetch_assoc(mysqli_query($con, "SELECT (SUM(`devices`.`price`)+SUM(`customers_service`.`price`)) AS `total` FROM `customers` INNER JOIN `customers_device` ON `customers`.`id`=`customers_device`.`customer_id` INNER JOIN `devices` ON `customers_device`.`device_id`=`devices`.`id` INNER JOIN `customers_service` ON `customers_service`.`customer_id`=`customers`.`id` WHERE `customers`.`dealer_id`='$res[id]' AND (`customers_device`.`created_at` BETWEEN '$my_start' AND '$my_end' AND `customers_service`.`updated_at` BETWEEN '$my_start' AND '$my_end')"));
    	$total_dealer_s=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) as `total` FROM `customers` INNER JOIN `customers_service` ON `customers`.`id`=`customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$res[id]' AND `customers_service`.`updated_at` BETWEEN '$my_start' AND '$my_end'"));
    	$total_dealer_c=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` WHERE `dealer_id` = '$res[id]'"));
    	mysqli_query($con, "UPDATE `dealers_stats` SET `r_".$this_month."` = '$total_dealer_r[total]', `s_".$this_month."` = '$total_dealer_s[total]', `c_".$this_month."` = '$total_dealer_c[total]' WHERE `dealer_id` = '$res[id]'");
    }
  // AYLIK İSTATİSTİKLER
    $monthly_total_customer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers` WHERE `status` = '1' AND `deleted_at` = '0'"));
    $monthly_total_service=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers_service` WHERE `status` = '1' AND `deleted_at` = '0'"));
    $monthly_total_dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `dealers` WHERE `status` = '1' AND `deleted_at` = '0'"));
    $last_total_all=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `customer_surplus`, `service_surplus`, `dealer_surplus` FROM `stats_monthly` ORDER BY `id` DESC LIMIT 1 OFFSET 1"));
    $new_growth = ($monthly_total_customer['total'] + $monthly_total_service['total']) + $monthly_total_dealer['total'];
    if (!empty($last_total_all)) {
    	$old_growth = ($last_total_all['customer_surplus'] + $last_total_all['service_surplus']) + $last_total_all['dealer_surplus'];
    	$growth = (($new_growth - $old_growth ) / 100) * 100;
    } else {
    	$old_growth = 0;
    	$growth = (($new_growth - $old_growth ) / 100) * 100;
    }
    $completed_services=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers_service` WHERE `resolved` = '1' AND `deleted_at` = '0'"));
    $uncompleted_services=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `customers_service` WHERE `resolved` = '0' AND `deleted_at` = '0'"));
    $completed_defects=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `defects` WHERE `status` = '1' AND `deleted_at` = '0'"));
    $uncompleted_defects=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `defects` WHERE `status` = '0' AND `deleted_at` = '0'"));
    $add=mysqli_query($con, "INSERT INTO `stats_monthly` VALUES ('','$time','$growth','$monthly_total_customer[total]','$monthly_total_service[total]','$monthly_total_dealer[total]','$completed_services[total]','$uncompleted_services[total]','$completed_defects[total]','$uncompleted_defects[total]')");
    if ($add) {
      $setres = "Monthly OK ".date("d/m/Y H:i:s", $time);
    } else {
      $setres = "Monthly NOT ".date("d/m/Y H:i:s", $time);
    }
  	mysqli_query($con, "UPDATE `crons` SET `status` = '1', `result` = '$setres' WHERE `id` = '$cronid'");
  } else {
	echo "ERROR";
  }
?>
