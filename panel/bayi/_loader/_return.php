<?php
if ((isset($_GET['r'])) && (!empty($_GET['r']))) {
  $r=varsql($_GET['r']);
  if ($i=="success") {
    $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `resultok` FROM `payments_bank` WHERE `id` = '$r'"));
    eval($get['resultok']);
  }
  if ($i=="failed") {
    $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `resultnot` FROM `payments_bank` WHERE `id` = '$r'"));
    eval($get['resultnot']);
  }
} else {
  if ((isset($_GET['xid'])) && (!empty($_GET['xid']))) {
    $payment_cfg=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `email`,`phone` FROM `payments_config` WHERE `id` = '1'"));
    $xid=varsql($_GET['xid']);
    $return=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `payments_bank`.`name` as `bank_name`, `payments_card`.`title` as `card_name`, `payments`.`transaction_id` as `transaction_id`, `payments`.`currency` as `currency`, `payments`.`amount` as `amount`, `payments`.`amount_transfered` as `amount_transfered`, `payments`.`amount_commission` as `amount_commission`, `payments`.`installment` as `installment` FROM `payments` INNER JOIN `payments_bank` ON `payments_bank`.`id` = `payments`.`bank_id` INNER JOIN `payments_card` ON `payments_card`.`id` = `payments`.`card_id` WHERE `reference_transaction_id` = '$xid'"));
    if ($i=="success") {
      //mail gönderme
      $getmails=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `emails` WHERE `type` = '17' AND `status` = '1'"));
      if (isset($getmails['id'])) {
        $time=time();
        $dealer_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`email`,`gsm` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
        $payment_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `amount`,`amount_transfered`,`amount_commission`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$xid'"));
        $vals = array("[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[odeme_tutari]", "[odeme_aktarilan]", "[odeme_komisyon]", "[odeme_taksit]");
    	$valsto = array($dealer_res['title'], $dealer_res['email'], $dealer_res['gsm'], $payment_res['amount'], $payment_res['amount_transfered'], $payment_res['amount_commission'], $payment_res['installment']);
    	$title = str_replace($vals, $valsto, $getmails['title']);
    	$content = str_replace($vals, $valsto, $getmails['content']);
    	if (isset($payments_cfg['email'])) {
    	    send_service_mail($title,$content,$payments_cfg['email'],'Aquacora Yönetim');
    	}
    	if (send_service_mail($title,$content,$dealer_res['email'],$dealer_res['title'])) {
    	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$dealer_res[id]','1','$getmails[id]','$content','$time','1')");
    	} else {
    	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$dealer_res[id]','1','$getmails[id]','$content','$time','0')");
    	}
      }
      //sms gönderme
      $getsmss=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `messages` WHERE `type` = '17' AND `status` = '1'"));
      if (isset($getsmss['id'])) {
        $time=time();
        $dealer_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`email`,`gsm` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
        $payment_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `amount`,`amount_transfered`,`amount_commission`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$xid'"));
        $vals = array("[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[odeme_tutari]", "[odeme_aktarilan]", "[odeme_komisyon]", "[odeme_taksit]");
    	$valsto = array($dealer_res['title'], $dealer_res['email'], $dealer_res['gsm'], $payment_res['amount'], $payment_res['amount_transfered'], $payment_res['amount_commission'], $payment_res['installment']);
    	$title = str_replace($vals, $valsto, $getsmss['title']);
    	$content = str_replace($vals, $valsto, $getsmss['content']);
    	if (isset($payments_cfg['phone'])) {
    	    send_service_sms($payments_cfg['phone'],$content);
    	}
    	if (send_service_sms($dealer_res['gsm'],$content)) {
    	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$dealer_res[id]','1','$getsmss[id]','$content','$time','1')");
    	} else {
    	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$dealer_res[id]','1','$getsmss[id]','$content','$time','0')");
    	}
      }
      $error = '2001';
    }
    if ($i=="failed") {
      //mail gönderme
      $getmails=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `emails` WHERE `type` = '18' AND `status` = '1'"));
      if (isset($getmails['id'])) {
        $time=time();
        $dealer_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`email`,`gsm` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
        $payment_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `amount`,`amount_transfered`,`amount_commission`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$xid'"));
        $vals = array("[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[odeme_tutari]", "[odeme_aktarilan]", "[odeme_komisyon]", "[odeme_taksit]");
    	$valsto = array($dealer_res['title'], $dealer_res['email'], $dealer_res['gsm'], $payment_res['amount'], $payment_res['amount_transfered'], $payment_res['amount_commission'], $payment_res['installment']);
    	$title = str_replace($vals, $valsto, $getmails['title']);
    	$content = str_replace($vals, $valsto, $getmails['content']);
    	if (send_service_mail($title,$content,$dealer_res['email'],$dealer_res['title'])) {
    	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$dealer_res[id]','1','$getmails[id]','$content','$time','1')");
    	} else {
    	  mysqli_query($con, "INSERT INTO `dealers_email` VALUES ('','$dealer_res[id]','1','$getmails[id]','$content','$time','0')");
    	}
      }
      //sms gönderme
      $getsmss=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `messages` WHERE `type` = '18' AND `status` = '1'"));
      if (isset($getsmss['id'])) {
        $time=time();
        $dealer_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`email`,`gsm` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
        $payment_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `amount`,`amount_transfered`,`amount_commission`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$xid'"));
        $vals = array("[bayi_isim]", "[bayi_eposta]", "[bayi_gsm]", "[odeme_tutari]", "[odeme_aktarilan]", "[odeme_komisyon]", "[odeme_taksit]");
    	$valsto = array($dealer_res['title'], $dealer_res['email'], $dealer_res['gsm'], $payment_res['amount'], $payment_res['amount_transfered'], $payment_res['amount_commission'], $payment_res['installment']);
    	$title = str_replace($vals, $valsto, $getsmss['title']);
    	$content = str_replace($vals, $valsto, $getsmss['content']);
    	if (send_service_sms($dealer_res['gsm'],$content)) {
    	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$dealer_res[id]','1','$getsmss[id]','$content','$time','1')");
    	} else {
    	  mysqli_query($con, "INSERT INTO `dealers_message` VALUES ('','$dealer_res[id]','1','$getsmss[id]','$content','$time','0')");
    	}
      }
      $error = '1001';
    }
  } else {
      $error = '1001';
  }
}
?>
