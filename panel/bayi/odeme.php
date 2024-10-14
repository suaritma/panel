<?PHP
ob_start();
header('Content-Type: text/html; charset=utf-8');
$host = "localhost";
$user = "aquacora_isatest";
$pass = "159*357";
$db = "aquacora_boga";
@mysqli_connect($host, $user, $pass) or die(mysqli_error());
mysqli_select_db($db) or die(mysqli_error());
mysqli_query($con, "SET NAMES 'utf8'");
mysqli_query($con, "SET CHARACTER SET utf8");
mysqli_query($con, "SET COLLATION_CONNECTION = 'utf8_general_ci'");
function sendomail($id,$name,$amount,$installment,$status) {
    $get_mail=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`email` FROM `users` WHERE `id` = '$id'"));
    require 'phpmailer/PHPMailerAutoload.php';
    $mail = new PHPMailer;
    //$mail->SMTPDebug = 3; // Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'aquacora.com.tr';
    $mail->SMTPAuth = true;
    $mail->Username = 'bildirim@aquacora.com.tr';
    $mail->Password = '190677le';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('bildirim@aquacora.com.tr', 'Aquacora');
    $mail->addAddress($get_mail['email'], $get_mail['fullname']);
    $mail->addReplyTo('bildirim@aquacora.com.tr', 'Aquacora');
    $mail->isHTML(true);
    if ($status=="ok") {
        $mail->addBCC('m.kemal@aquacora.com.tr', 'Mustafa Kemal ŞİMŞEKER');
        $mail->Subject = 'Aquacora - Ödeme Başarılı';
        $mail->Body    = '<p>Selam '.$name.', Ödeme işleminiz tamamlanmıştır. Tutar; '.substr($amount/100, 0, 6).' TL, '.$installment.' Taksit.</p>';
        $mail->AltBody    = 'Selam '.$name.', Ödeme işleminiz tamamlanmıştır. Tutar; '.substr($amount/100, 0, 6).' TL, '.$installment.' Taksit.';
    } else {
        $mail->Subject = 'Aquacora - Ödeme Başarısız';
        $mail->Body    = '<p>Selam '.$name.', Ödemeniz başarısız!</p>';
        $mail->AltBody    = 'Selam '.$name.', Ödemeniz başarısız!';
    }                           // Set email format to HTML
    $mail->send();
}
if ((isset($_GET['return'])) && ($_GET['return']=="ptr")) {
    $post = $_POST;
    $merchant_key 	= 'Cat5KDXa3pWFTmYD';
    $merchant_salt	= '86oxYAcch8oyqggj';
    $hash = base64_encode( hash_hmac('sha256', $post['merchant_oid'].$merchant_salt.$post['status'].$post['total_amount'], $merchant_key, true) );
    if( $hash != $post['hash'] ) {
	    die('PAYTR notification failed: bad hash');
    }
    if( $post['status'] == 'success' ) {
    		$getXID = $post['merchant_oid'];
    		$approve=mysqli_query($con, "UPDATE `payments` SET `completed` = '1', `updated_at` = NOW(), `message` = 'İşleminiz başarıyla gerçekleşmiştir.' WHERE `reference_transaction_id` = '$getXID' AND `completed` = '0'");
            $log=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`amount`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
            sendomail($_SESSION['user_id'],$log['fullname'],$log['amount'],$log['installment'],'ok');
    } else {
    		$getXID = $post['merchant_oid'];
    		$reject=mysqli_query($con, "UPDATE `payments` SET `completed` = '0', `updated_at` = NOW() WHERE `reference_transaction_id` = '$getXID' AND `completed` = '0'");
            $log=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`amount`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
            sendomail($_SESSION['user_id'],$log['fullname'],$log['amount'],$log['installment'],'not');
    }
	echo "OK";
	exit;
} else {
    $path = __DIR__ .'/bootstrap/';

    require $path . 'autoload.php';
    $app = require_once $path . 'app.php';

    $app->make('Illuminate\Contracts\Http\Kernel')
      ->handle(Illuminate\Http\Request::capture());
    $id = $app['encrypter']->decrypt($_COOKIE[$app['config']['session.cookie']]);
    $app['session']->driver()->setId($id);
    $app['session']->driver()->start();
    $user_id = $app['auth']->user()->id;
    session_start();
    if (isset($user_id)) {
        $_SESSION['user_id'] = $user_id;
    }
    function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];
        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }
        return $ip;
    }
    $user_ip = getUserIP();
if (isset($_GET['return'])) {
    $return = $_GET['return'];
    $fivemin = time() - 5*60;
    if ($return=="y1") {
        if ((isset($_POST['XID'])) && ($_POST['ApprovedCode']==1)) {
            $getXID = mysqli_real_escape_string($_POST['XID']);
            $approve=mysqli_query($con, "UPDATE `payments` SET `completed` = '1', `updated_at` = NOW(), `message` = 'İşleminiz başarıyla gerçekleşmiştir.' WHERE (`reference_transaction_id` = '$getXID' AND `user_id` = '$_SESSION[user_id]') AND (`ip` = '$user_ip' AND `transaction_time` >= '$fivemin') AND `completed` = '0'");
            $log=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`amount`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
            sendomail($_SESSION['user_id'],$log['fullname'],$log['amount'],$log['installment'],'ok');
            include('odeme_success.php');
            exit();
        } else {
            if (isset($_POST['XID'])) {
            $getXID = mysqli_real_escape_string($_POST['XID']);
            $reject=mysqli_query($con, "UPDATE `payments` SET `completed` = '0', `updated_at` = NOW() WHERE (`reference_transaction_id` = '$getXID'     AND `user_id` = '$_SESSION[user_id]') AND (`ip` = '$user_ip' AND `transaction_time` >= '$fivemin') AND `completed` = '0'");
            $log=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`amount`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
            sendomail($_SESSION['user_id'],$log['fullname'],$log['amount'],$log['installment'],'not');
            }
            include('odeme_failed.php');
            exit();
        }
    } elseif ($return=="y0") {
            if (isset($_POST['XID'])) {
            $getXID = mysqli_real_escape_string($_POST['XID']);
            $reject=mysqli_query($con, "UPDATE `payments` SET `completed` = '0', `updated_at` = NOW() WHERE (`reference_transaction_id` = '$getXID'     AND `user_id` = '$_SESSION[user_id]') AND (`ip` = '$user_ip' AND `transaction_time` >= '$fivemin') AND `completed` = '0'");
            $log=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`amount`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
            sendomail($_SESSION['user_id'],$log['fullname'],$log['amount'],$log['installment'],'not');
            }
        include('odeme_failed.php');
        exit();
    } elseif ($return=="p1") {
        include('odeme_success.php');
        exit();
    } elseif ($return=="p0") {
        include('odeme_failed.php');
        exit();
    } elseif ($return="a1") {
		$storekey="M200403306";
		$hashparams = $_POST["HASHPARAMS"];
		$hashparamsval = $_POST["HASHPARAMSVAL"];
		$hashparam = $_POST["HASH"];
		$paramsval="";
		$index1=0;
		$index2=0;
		while($index1 < strlen($hashparams))
		{
			$index2 = strpos($hashparams,":",$index1);
			$vl = $_POST[substr($hashparams,$index1,$index2- $index1)];
			if($vl == null)
			$vl = "";
			$paramsval = $paramsval . $vl;
			$index1 = $index2 + 1;
		}
		$hashval = $paramsval.$storekey;
		$hash = base64_encode(pack('H*',sha1($hashval)));
		$mdStatus=$_POST['mdStatus'];
		if($mdStatus =="1" || $mdStatus == "2" || $mdStatus == "3" || $mdStatus == "4")
		{
		   $Response = $_POST["Response"];
		   if ( $Response == "Approved")
			{
                $getXID = mysqli_real_escape_string($_POST['ReturnOid']);
                $approve=mysqli_query($con, "UPDATE `payments` SET `completed` = '1', `updated_at` = NOW() WHERE (`reference_transaction_id` = '$getXID'     AND `user_id` = '$_SESSION[user_id]') AND (`ip` = '$user_ip' AND `transaction_time` >= '$fivemin') AND `completed` = '0'");
                $log=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`amount`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
                sendomail($_SESSION['user_id'],$log['fullname'],$log['amount'],$log['installment'],'ok');
				include('odeme_success.php');
			}
			else
			{
                if (isset($_POST['ReturnOid'])) {
                    $getXID = mysqli_real_escape_string($_POST['ReturnOid']);
                    $reject=mysqli_query($con, "UPDATE `payments` SET `completed` = '0', `updated_at` = NOW() WHERE (`reference_transaction_id` = '$getXID'     AND `user_id` = '$_SESSION[user_id]') AND (`ip` = '$user_ip' AND `transaction_time` >= '$fivemin') AND `completed` = '0'");
                    $log=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`amount`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
                    sendomail($_SESSION['user_id'],$log['fullname'],$log['amount'],$log['installment'],'not');
                }
				include('odeme_failed.php');
			}
		}
		else
		{
            if (isset($_POST['ReturnOid'])) {
                $getXID = mysqli_real_escape_string($_POST['ReturnOid']);
                $reject=mysqli_query($con, "UPDATE `payments` SET `completed` = '0', `updated_at` = NOW() WHERE (`reference_transaction_id` = '$getXID'     AND `user_id` = '$_SESSION[user_id]') AND (`ip` = '$user_ip' AND `transaction_time` >= '$fivemin') AND `completed` = '0'");
                $log=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`amount`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
                sendomail($_SESSION['user_id'],$log['fullname'],$log['amount'],$log['installment'],'not');
            }
            include('odeme_failed.php');
		}
    } elseif ($return="a0") {
		$storekey="M200403306";
		$hashparams = $_POST["HASHPARAMS"];
		$hashparamsval = $_POST["HASHPARAMSVAL"];
		$hashparam = $_POST["HASH"];
		$paramsval="";
		$index1=0;
		$index2=0;
		while($index1 < strlen($hashparams))
		{
			$index2 = strpos($hashparams,":",$index1);
			$vl = $_POST[substr($hashparams,$index1,$index2- $index1)];
			if($vl == null)
			$vl = "";
			$paramsval = $paramsval . $vl;
			$index1 = $index2 + 1;
		}
		$hashval = $paramsval.$storekey;
		$hash = base64_encode(pack('H*',sha1($hashval)));
		$mdStatus=$_POST['mdStatus'];
        if (isset($_POST['ReturnOid'])) {
            $getXID = mysqli_real_escape_string($_POST['ReturnOid']);
            $reject=mysqli_query($con, "UPDATE `payments` SET `completed` = '0', `updated_at` = NOW() WHERE (`reference_transaction_id` = '$getXID'     AND `user_id` = '$_SESSION[user_id]') AND (`ip` = '$user_ip' AND `transaction_time` >= '$fivemin') AND `completed` = '0'");
            $log=mysqli_fetch_assoc(mysqli_query($con, "SELECT `fullname`,`amount`,`installment` FROM `payments` WHERE `reference_transaction_id` = '$getXID'"));
            sendomail($_SESSION['user_id'],$log['fullname'],$log['amount'],$log['installment'],'not');
        }
        include('odeme_failed.php');
        exit();
    } else {
        include('odeme_failed.php');
        exit();
    }
} else {
    $fullname = $_POST['fullname'];
    $amount = round($_POST['amount']);
    $amount_comission = round($_POST['amount_comission']);
    $amount_transfered = $amount - $amount_comission;
    $installment=$_POST['installment'];
    if (isset($_POST['card_code'])) {
        $card_code = $_POST['card_code'];
        $first_four = substr($card_code, 0, 4);
        $last_four = substr($card_code, -4);
        $cvc = $_POST['cvc'];
        $month = $_POST['month'];
        $year = $_POST['year'];
        if ($month<10) { $month = '0'.$month; }
        if ($year<10) { $year = '0'.$year; }
        $bin=substr($card_code, 0, 6);
        $check=mysqli_fetch_assoc(mysqli_query($con, "SELECT `type`,`cc` FROM `extbins` WHERE `bin` = '$bin'"));
    } else {
        $check['cc']="PAYTR";
    }
    if (($check['cc']=="AXESS") || ($installment==1)) {
    $zk=date('ymdHis', time());
    $xid = 'AXS0000'.$zk;
    $tid = 'AXS'.$user_id.$zk;
    $ttime = time();
    mysqli_query($con, "INSERT INTO `payments` VALUES ('','$tid','$xid','$_SESSION[user_id]','$amount','$amount_transfered','$amount_comission','','TRY','$installment','$fullname','$first_four','$last_four','AKBANK T.A.Ş.','$year','$month','$user_ip','0','0','','$ttime','',NOW(),NOW())");
?>
<html>
<head>
  <title>Yönlendirici...</title>
  <meta http-equiv="Content-Language" content="tr">
  <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-9">
  <meta http-equiv="Pragma" content="no-cache">
  <meta http-equiv="Expires" content="now">
</head>
<script language=javascript>
function Init() {
	document.getElementById("myForm").submit();
}
</script>
<body onLoad="Init()">
<?php
$clientId = "101640005";
$amount = number_format($amount/100, 2, '.', '');
$oid = $xid;
$okUrl = "https://www.aquacora.com.tr/bayi/odeme.php?return=a1";
$failUrl = "https://www.aquacora.com.tr/bayi/odeme.php?return=a0";
$rnd = microtime();
$currencyVal = "949";
$storekey = "M200403306";
$storetype = "3d_pay";
$lang = "tr";
if ($installment==1) {
    $instalment = "";
} else {
    $instalment = $installment;
}
$transactionType = "Auth";
$hashstr = $clientId . $oid . $amount . $okUrl . $failUrl .$transactionType. $instalment .$rnd . $storekey;
$hash = base64_encode(pack('H*',sha1($hashstr)));
?>
    <form method="post" action="https://www.sanalakpos.com/fim/est3Dgate" id="myForm">
        <input type="hidden" name="pan" size="20" value="<?=$card_code?>" />
        <input type="hidden" name="cv2" size="4" value="<?=$cvc?>" />
        <input type="hidden" name="Ecom_Payment_Card_ExpDate_Month" value="<?=$month?>" />
        <input type="hidden" name="Ecom_Payment_Card_ExpDate_Year" value="<?=$year?>" />
        <input type="hidden" name="cardType" value="<?php if ($check['type']=="VISA") { echo "1"; } else { echo "2"; } ?>" />
        <input type="hidden" name="clientid" value="<?php echo $clientId; ?>" />
        <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
		<input type="hidden" name="islemtipi" value="<?php echo $transactionType; ?>" />
		<input type="hidden" name="taksit" value="<?php echo $instalment; ?>" />
        <input type="hidden" name="oid" value="<?php echo $oid; ?>" />
        <input type="hidden" name="okUrl" value="<?php echo $okUrl; ?>" />
        <input type="hidden" name="failUrl" value="<?php echo $failUrl; ?>" />
        <input type="hidden" name="rnd" value="<?php echo $rnd; ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash; ?>" />
        <input type="hidden" name="storetype" value="<?php echo $storetype; ?>" />
        <input type="hidden" name="lang" value="<?php echo $lang; ?>" />
        <input type="hidden" name="currency" value="<?php echo $currencyVal; ?>" />
    </form>
</body>
</html>
<?php } elseif ($check['cc']=="WORLD") {
    $zk=date('ymdHis', time());
    $xid = 'YKB00000'.$zk;
    $tid = 'YKB'.$user_id.$zk;
    $ttime = time();
    mysqli_query($con, "INSERT INTO `payments` VALUES ('','$tid','$xid','$_SESSION[user_id]','$amount','$amount_transfered','$amount_comission','','TRY','$installment','$fullname','$first_four','$last_four','YAPI ve KREDİ BANKASI A.Ş.','$year','$month','$user_ip','0','0','','$ttime','',NOW(),NOW())"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Yönlendirici...</title>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=">
<META HTTP-EQUIV="expires" CONTENT="0">
<META HTTP-EQUIV="cache-control" CONTENT="no-cache">
<META HTTP-EQUIV="Pragma" CONTENT="no-cache">
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=utf-8" />
</head>
<script language=javascript>
function Init() {
	document.getElementById("myForm").submit();
}
</script>
<body onLoad="Init()">
<form name="form1" id="myForm" method="post" action="posykb/Moduler/posnettds.php">
    <input type="hidden" name="custName" id="custName" value="<?=$fullname?>" size ="25" maxlength="30">
    <input type="hidden" name="XID" id="XID" size="25" maxlength="20" value="<?=$xid?>" >
    <input type="hidden" name="ccno" id="ccno" value="<?=$card_code?>" size="22" maxlength="16" >
    <input type="hidden" name="expdate" id="expdate" value="<?=$year?><?=$month?>" size="6" maxlength="4" >
    <input type="hidden" name="cvv" id="cvv" value="<?=$cvc?>" size="5" maxlength="3" >
    <input type="hidden" name="amount" id="amount" value="<?=$amount?>" maxlength="13" >
    <input type="hidden" name="instalment" id="instalment" value="<?php if ($installment==1) { echo "00"; } else { echo "0".$installment; } ?>" size="2" maxlength="2" >
    <input type="hidden" name="tranType" id="tranType" value="Sale" >
    <input type="hidden" name="currency" id="currency" value="TL" >
    <input type="hidden" name="vftCode" id="vftCode" value="K001" SIZE="8" maxlength="4" >
</form>
</body>
</html>
<?php } else {
    $zk=date('ymdHis', time());
    $xid = 'PTR0000'.$zk;
    $tid = 'PTR'.$user_id.$zk;
    $ttime = time(); ?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ödeme Sayfası</title>
</head>
<body>
    <p>Lütfen Aşağıdan "Taksitli Ödeme" Seçeneğini Seçerek Devam Ediniz!</p>
<br><br>
<div style="width: 100%;margin: 0 auto;display: table;">
	<?php
	$merchant_id 	= '111427';
	$merchant_key 	= 'Cat5KDXa3pWFTmYD';
	$merchant_salt	= '86oxYAcch8oyqggj';
	$email = $_POST['email'];
	$payment_amount	= $amount;
	$merchant_oid = $xid;
	$user_name = $fullname;
	$user_address = "Bayi Adresi";
	$user_phone = $_POST['phone'];
	$merchant_ok_url = "https://www.aquacora.com.tr/bayi/odeme.php?return=p1";
	$merchant_fail_url = "https://www.aquacora.com.tr/bayi/odeme.php?return=p0";
	$user_basket = base64_encode(json_encode(array(array("Bayi Ödemesi", $payment_amount, 1))));
	$timeout_limit = "30";
	$debug_on = 0;
    $test_mode = 0;
	$no_installment	= 0;
	$max_installment = 9;
	$currency = "TL";
	$hash_str = $merchant_id .$user_ip .$merchant_oid .$email .$payment_amount .$user_basket.$no_installment.$max_installment.$currency.$test_mode;
	$paytr_token=base64_encode(hash_hmac('sha256',$hash_str.$merchant_salt,$merchant_key,true));
	$post_vals=array(
			'merchant_id'=>$merchant_id,
			'user_ip'=>$user_ip,
			'merchant_oid'=>$merchant_oid,
			'email'=>$email,
			'payment_amount'=>$payment_amount,
			'paytr_token'=>$paytr_token,
			'user_basket'=>$user_basket,
			'debug_on'=>$debug_on,
			'no_installment'=>$no_installment,
			'max_installment'=>$max_installment,
			'user_name'=>$user_name,
			'user_address'=>$user_address,
			'user_phone'=>$user_phone,
			'merchant_ok_url'=>$merchant_ok_url,
			'merchant_fail_url'=>$merchant_fail_url,
			'timeout_limit'=>$timeout_limit,
			'currency'=>$currency,
      'test_mode'=>$test_mode
		);
	$ch=curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://www.paytr.com/odeme/api/get-token");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1) ;
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_vals);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_FRESH_CONNECT, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	$result = @curl_exec($ch);
	if(curl_errno($ch)) {
        include('odeme_failed.php');
        exit();
	}
	curl_close($ch);
	$result=json_decode($result,1);
	if($result['status']=='success') {
		$token=$result['token'];
		mysqli_query($con, "INSERT INTO `payments` VALUES ('','$tid','$xid','$_SESSION[user_id]','$amount','$amount_transfered','$amount_comission','','TRY','$installment','$fullname','','','PAY TR','','','$user_ip','0','0','','$ttime','',NOW(),NOW())");
	} else {
        include('odeme_failed.php');
        exit();
	}
	?>
    <script src="https://www.paytr.com/js/iframeResizer.min.js"></script>
    <iframe src="https://www.paytr.com/odeme/guvenli/<?php echo $token;?>" id="paytriframe" frameborder="0" scrolling="no" style="width: 100%;"></iframe>
	<script>iFrameResize({},'#paytriframe');</script>
</div>
<br><br>
</body>
</html>
<?php }
} } ob_end_flush(); ?>
