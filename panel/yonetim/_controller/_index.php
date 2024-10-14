<?php
if ((isset($_POST['process'])) && ($_POST['process']=="login")) {
  if ((isset($_POST['username'])) && (!empty($_POST['username']))) {
    $username=mysqli_real_escape_string($con, $_POST['username']);
  } else {
    $error = '1001';
  }
  if ((isset($_POST['password'])) && (!empty($_POST['password']))) {
    $password=md5($_POST['password']);
  } else {
    $error = '1002';
  }
  if (!isset($error)) {
    $admin=mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`title`,`currency`,`language`,`currency`,`super` FROM `admins` WHERE (`username` = '$username' AND `password` = '$password') AND `status` = '1'"));
    if ($admin) {
      if ((isset($admin['id'])) && (!empty($admin['id']))) {
        mysqli_query($con, "UPDATE `admins` SET `online_at` = '$time' WHERE `id` = '$admin[id]'");
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_title'] = $admin['title'];
        $_SESSION['admin_currency'] = $admin['currency'];
        $_SESSION['admin_language'] = $admin['language'];
        $_SESSION['admin_super'] = $admin['super'];
        header("Location: " . ADMIN_URL . "dashboard/");
        exit();
      } else {
        $error = '1003';
        mysqli_query($con, "INSERT INTO `logs` VALUES ('','$time','".ip()."','Someone tried bad login with ".$username."')");
      }
    } else {
      $error = '1004';
      mysqli_query($con, "INSERT INTO `logs` VALUES ('','$time','".ip()."','Database problem on login with ".$username."')");
    }
  }
}
?>
