<?php
  if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
    for ($j=1; $j<=20; $j++) {
      if ((isset($_POST[$j.'_set'])) && (!empty($_POST[$j.'_set']))) {
        $title=$_POST[$j.'_title'];
        $content=$_POST[$j.'_content'];
        $status=$_POST[$j.'_status'];
        $check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `emails` WHERE `type` = '$j'"));
        if ($check['total']==0) {
          mysqli_query($con, "INSERT INTO `emails` VALUES ('','$j','$title','$content','$status')");
        } else {
          mysqli_query($con, "UPDATE `emails` SET `title` = '$title', `content` = '$content', `status` = '$status' WHERE `type` = '$j'");
        }
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="update")) {
    $sender_name = varsql($_POST['sender_name']);
    $sender_address = varsql($_POST['sender_address']);
    $sender_pass = varsql($_POST['sender_pass']);
    $server_ip = varsql($_POST['server_ip']);
    $server_port = varsql($_POST['server_port']);
    $update=mysqli_query($con, "UPDATE `emails_config` SET `sender_address` = '$sender_address', `sender_pass` = '$sender_pass', `sender_name` = '$sender_name', `server_ip` = '$server_ip', `server_port` = '$server_port' WHERE `id` = '1'");
    if ($update) {
      $error = '2001';
    } else {
      $error = '1001';
    }
  }
?>
