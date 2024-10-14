<?php
  if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
    for ($j=1; $j<=20; $j++) {
      if ((isset($_POST[$j.'_set'])) && (!empty($_POST[$j.'_set']))) {
        $title=$_POST[$j.'_title'];
        $content=$_POST[$j.'_content'];
        $status=$_POST[$j.'_status'];
        $check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `messages` WHERE `type` = '$j'"));
        if ($check['total']==0) {
          mysqli_query($con, "INSERT INTO `messages` VALUES ('','$j','$title','$content','$status')");
        } else {
          mysqli_query($con, "UPDATE `messages` SET `title` = '$title', `content` = '$content', `status` = '$status' WHERE `type` = '$j'");
        }
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="update")) {
    $url = varsql($_POST['url']);
    $title = varsql($_POST['title']);
    $username = varsql($_POST['username']);
    $password = varsql($_POST['password']);
    $update=mysqli_query($con, "UPDATE `messages_config` SET `url` = '$url', `title` = '$title', `username` = '$username', `password` = '$password' WHERE `id` = '1'");
    if ($update) {
      $error = '2001';
    } else {
      $error = '1001';
    }
  }
?>
