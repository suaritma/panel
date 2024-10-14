<?php
if ((isset($_POST['process'])) && ($_POST['process']=="reset")) {
  if ((isset($_POST['auth_key'])) && (!empty($_POST['auth_key']))) {
    $auth_key=mysqli_real_escape_string($con, $_POST['auth_key']);
  } else {
    $error = '1001';
  }
  if ((isset($_POST['password'])) && (!empty($_POST['password']))) {
    $password=md5($_POST['password']);
  } else {
    $error = '1002';
  }
  if ((isset($_POST['repassword'])) && (!empty($_POST['repassword']))) {
    $repassword=md5($_POST['repassword']);
  } else {
    $error = '1003';
  }
  if (!isset($error)) {
      $now_time=time();
      $check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`, `dealer_id` FROM `remember_req` WHERE `auth_key` = '$auth_key' AND (`start_time` <= '$now_time' AND `end_time` >= '$now_time')"));
      if ((isset($check['id'])) && (!empty($check['id']))) {
          if ($password==$repassword) {
              $ch=mysqli_query($con, "UPDATE `dealers` SET `password` = '$password' WHERE `id` = '$check[dealer_id]'");
              if ($ch) {
                mysqli_query($con, "DELETE FROM `remember_req` WHERE `id` = '$check[id]'");
                $error = '2001';
              } else {
                $error = '1004';
              }
          } else {
            $error = '1005';
          }
      } else {
          $error = '1006';
      }
  }
}
?>