<?php
if ((isset($_POST['process'])) && ($_POST['process']=="change")) {
  if ((isset($_POST['password'])) && (!empty($_POST['password']))) {
    $password=md5($_POST['password']);
  } else {
    $error = '1001';
  }
  if ((isset($_POST['newpassword'])) && (!empty($_POST['newpassword']))) {
    $newpassword=md5($_POST['newpassword']);
  } else {
    $error = '1001';
  }
  if ((isset($_POST['renewpassword'])) && (!empty($_POST['renewpassword']))) {
    $renewpassword=md5($_POST['renewpassword']);
  } else {
    $error = '1001';
  }
  if (!isset($error)) {
    if ($newpassword==$renewpassword) {
      $check=@mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `admins` WHERE `id` = '$_SESSION[admin_id]' AND `password` = '$password'"));
      if ($check['total']==1) {
        $change=mysqli_query($con, "UPDATE `admins` SET `password` = '$password' WHERE `id` = '$_SESSION[admin_id]'");
        if ($change) {
          $error = '2001';
        } else {
          $error = '1001';
        }
      } else {
        $error = '1001';
      }
    } else {
      $error = '1001';
    }
  }
}
?>
