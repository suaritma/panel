<?php
$cf_sms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `messages_config` WHERE `id` = '1'"));
$cf_email=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `emails_config` WHERE `id` = '1'"));
function send_reminder_sms($telno,$msg)
{
  global $cf_sms;
  $username=$cf_sms['username'];
  $pass=$cf_sms['password'];
  $header=$cf_sms['title'];
  $msg = html_entity_decode($msg, ENT_COMPAT, "UTF-8");
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
  $url=$cf_sms['url']."?usercode=$username&password=$pass&gsmno=$telno&message=$msg&msgheader=$header&startdate=$startdate&stopdate=$stopdate";
  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
  // curl_setopt($ch,CURLOPT_HEADER, false);
  $output=curl_exec($ch);
  curl_close($ch);
  $ret=explode(" ", $output);
  if ($ret[0]=="00") {
  	return true;
  } else {
  	return false;
  }
  return true;
}

function send_reminder_mail($baslik,$msg,$email,$fullname)
{
  global $cf_email;
  require __DIR__.'/phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;
  $mail->CharSet = 'UTF-8';
  //$mail->SMTPDebug = 3;
  $mail->isSMTP();
  $mail->Host = $cf_email['server_ip'];
  $mail->SMTPAuth = true;
  $mail->Username = $cf_email['sender_address'];
  $mail->Password = $cf_email['sender_pass'];
  $mail->SMTPSecure = 'tls';
  $mail->Port = $cf_email['server_port'];
  $mail->setFrom($cf_email['sender_address'], $cf_email['sender_name']);
  $mail->addAddress($email, $fullname);
  $mail->addReplyTo($cf_email['sender_address'], $cf_email['sender_name']);
  $mail->isHTML(true);
  $mail->Subject = $baslik;
  $mail->Body    = $msg;
  $mail->AltBody = $msg;
  if(!$mail->send()) {
    return false;
  } else {
    return true;
  }
  return true;
}

//Şifre hatırlatma 
if ((isset($_POST['process'])) && ($_POST['process']=="remember")) {
  if ((isset($_POST['email'])) && (!empty($_POST['email']))) {
    $email=mysqli_real_escape_string($con, $_POST['email']);
  } elseif ((isset($_POST['gsm'])) && (!empty($_POST['gsm']))) {
    $gsm=mysqli_real_escape_string($con, $_POST['gsm']);
  } else {
    $error = '1001';
  }
  if (!isset($error)) {
      if (isset($email)) {
        $check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`email` FROM `dealers` WHERE `email` = '$email'"));
      } else {
        $check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`gsm` FROM `dealers` WHERE `gsm` = '$gsm'"));
      }
      if ((isset($check['id'])) && (!empty($check['id']))) {
          $randi=generateRandomString(16);
          $start_time=time();
          $end_time=time() + (24 * 3600);
          $active=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `remember_req` WHERE `start_time` <= '$start_time' AND `end_time` >= '$start_time'"));
          if ($active['total']>=1) {
              $error = '1004';
          } else {
            mysqli_query($con, "DELETE FROM `remember_req` WHERE `dealer_id` = '$check[id]'");
            $rem=mysqli_query($con, "INSERT INTO `remember_req` VALUES ('','$check[id]','$randi','$start_time','$end_time','0')");
            if ($rem) {
                if ((isset($check['email'])) && (!empty($check['email'])) && (isset($email))) {
                  $mess="Şifre Yenilemek için <a href='https://www.aquacora.com.tr/panel/bayi/reset/&auth_key=$randi'> Tıklayınız </a>";
                  send_reminder_mail('Aquacora Şifre Yenileme', $mess, $check['email'], $check['title']);
                    $error = '2001';
                }
                if ((isset($check['gsm'])) && (!empty($check['gsm'])) && (isset($gsm))) {
                  $mess="Şifre Yenileme Linkiniz: https://www.aquacora.com.tr/panel/bayi/reset/&auth_key=$randi";
                  send_reminder_sms($check['gsm'], $mess);
                    $error = '2001';
                }
            } else {
              $error = '1003';
            }
          }
      } else {
          $error = '1002';
      }
  }
}
?>
