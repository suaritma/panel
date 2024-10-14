<?php
  include("db.php");
  include("function.php");
  $payment_cfg=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `email`,`phone` FROM `payments_config` WHERE `id` = '1'"));
  if ((isset($_GET['return'])) && ($_GET['return']=="ptr")) {
      $time=time();
      $post = $_POST;
      $merchant_key 	= 'Cat5KDXa3pWFTmYD';
      $merchant_salt	= '86oxYAcch8oyqggj';
      $hash = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );
      if( $hash != $post['hash'] ) {
  	    die('PAYTR notification failed: bad hash');
      }
      if( $post['status'] == 'success' ) { 
      	$getXID = $post['merchant_oid'];
      	$approve=mysqli_query($con, "UPDATE `payments` SET `completed` = '1', `updated_at` = '$time', `message` = 'İşleminiz başarıyla gerçekleşmiştir.' WHERE `reference_transaction_id` = '$getXID' AND `completed` = '0' ");
        //mail gönderme
        $getmails=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `emails` WHERE `type` = '17' AND `status` = '1'"));
        if ((isset($getmails['id'])) && ($approve)) {
          $time=time();
          $payment_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `amount`,`amount_transfered`,`amount_commission`,`installment`,`dealer_id` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
          $dealer_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`email`,`gsm` FROM `dealers` WHERE `id` = '$payment_res[dealer_id]'"));
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
        if ((isset($getsmss['id'])) && ($approve)) {
          $time=time();
          $payment_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `amount`,`amount_transfered`,`amount_commission`,`installment`,`dealer_id` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
          $dealer_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`email`,`gsm` FROM `dealers` WHERE `id` = '$payment_res[dealer_id]'"));
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
      } else {
      	$getXID = $post['merchant_oid'];
      	$reject=mysqli_query($con, "UPDATE `payments` SET `completed` = '0', `updated_at` = '$time' WHERE `reference_transaction_id` = '$getXID' AND `completed` = '0'");
        //mail gönderme
        $getmails=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `emails` WHERE `type` = '18' AND `status` = '1'"));
        if ((isset($getmails['id'])) && ($reject)) {
          $time=time();
          $payment_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `amount`,`amount_transfered`,`amount_commission`,`installment`,`dealer_id` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
          $dealer_res=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`email`,`gsm` FROM `dealers` WHERE `id` = '$payment_res[dealer_id]'"));
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
      }
  	  echo "OK";
  	  exit();
  }
 ?>