<?php
  require __DIR__.'/phpmailer/PHPMailerAutoload.php';
$cf_sms=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `messages_config` WHERE `id` = '1'"));
$cf_email=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `emails_config` WHERE `id` = '1'"));
$cf_notif=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `notifications_config` WHERE `id` = '1'"));
function send_service_sms($telno,$msg)
{
    $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
    $txt = time()." - $telno - $msg\n";
    fwrite($myfile, $txt);
    fclose($myfile);
  global $cf_sms;
  global $con;
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
}

function send_service_mail($baslik,$msg,$email,$fullname)
{
    $myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
    $txt = time()." - $baslik - $msg - $email - $fullname\n";
    fwrite($myfile, $txt);
    fclose($myfile);
  global $cf_email;
  global $con;
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
}

function send_service_notif() {
  return true;
}
?>
