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
    $customer=mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`firstname`,`lastname`,`currency`,`language` FROM `customers` WHERE ((`email` = '$username' AND `password` = '$password') OR (`gsm` = '$gsm' AND `password` = '$password')) AND `status` = '1'"));
    if ($customer) {
      if ((isset($customer['id'])) && (!empty($customer['id']))) {
        mysqli_query($con, "UPDATE `dealers` SET `online_at` = '$time' WHERE `id` = '$customer[id]'");
        $comp=mysqli_fetch_assoc(mysqli_query($con, "SELECT `country` FROM `companies` WHERE `id` = '$customer[company_id]'"));
        $_SESSION['customer_id'] = $customer['id'];
        $_SESSION['customer_fullname'] = $customer['firstname']." ".$customer['lastname'];
        header("Location: " . CUSTOMER_URL . "dashboard/");
        exit();
      } else {
        $error = '1003';
      }
    } else {
      $error = '1004';
    }
  }
}
?>
