<?php
  if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
    if ((isset($_POST['name'])) && (!empty($_POST['name']))) {
      $name=varsql($_POST['name']);
    } else {
      $error = '1001';
    }
    if ((isset($_POST['country'])) && (!empty($_POST['country']))) {
      $country=varsql($_POST['country']);
    } else {
      $error = '1002';
    }
    if ((isset($_POST['language'])) && (!empty($_POST['language']))) {
      $language=varsql($_POST['language']);
    } else {
      $error = '1003';
    }
    if (!isset($error)) {
      $username=varsql($_POST['username']);
      $password=md5($_POST['password']);
      $phone=varsql($_POST['phone']);
      $email=varsql($_POST['email']);
      $website=varsql($_POST['website']);
      $tax_office=varsql($_POST['tax_office']);
      $tax_number=varsql($_POST['tax_number']);
      $status=varsql($_POST['status']);
      $insert=mysqli_query($con, "INSERT INTO `companies` VALUES ('','$name','$username','$password','$phone','$email','$website','$tax_office','$tax_number','$country','$language','0','$time','0','0','$status')");
      if ($insert) {
        $error = '2001';
      } else {
        $error = '1011';
      }
    }
  }
    if ((isset($_POST['process'])) && ($_POST['process']=="edit")) {
      $process_id=varsql($_POST['process_id']);
      if ((isset($_POST['name'])) && (!empty($_POST['name']))) {
        $name=varsql($_POST['name']);
      } else {
        $error = '1001';
      }
      if ((isset($_POST['country'])) && (!empty($_POST['country']))) {
        $country=varsql($_POST['country']);
      } else {
        $error = '1002';
      }
      if ((isset($_POST['language'])) && (!empty($_POST['language']))) {
        $language=varsql($_POST['language']);
      } else {
        $error = '1003';
      }
      if ((isset($_POST['password'])) && (!empty($_POST['password']))) {
        $password=md5($_POST['password']);
      } else {
        $get_pass=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `password` FROM `companies` WHERE `id` = '$process_id'"));
        $password = $get_pass['password'];
      }
      if (!isset($error)) {
        $username=varsql($_POST['username']);
        $phone=varsql($_POST['phone']);
        $email=varsql($_POST['email']);
        $website=varsql($_POST['website']);
        $tax_office=varsql($_POST['tax_office']);
        $tax_number=varsql($_POST['tax_number']);
        $status=varsql($_POST['status']);
        $insert=mysqli_query($con, "UPDATE `companies` SET `name` = '$name', `username` = '$username', `password` = '$password', `phone` = '$phone', `email` = '$email', `website` = '$website', `tax_office` = '$tax_office', `tax_number` = '$tax_number', `country` = '$country', `language` = '$language', `updated_at` = '$time', `status` = '$status' WHERE `id` = '$process_id'");
        if ($insert) {
          $error = '2001';
        } else {
          $error = '1011';
        }
      }
    }
  if ((isset($_POST['process'])) && ($_POST['process']=="delete")) {
    if ((isset($_POST['id'])) && (!empty($_POST['id']))) {
      $id=varsql($_POST['id']);
    } else {
      $error = '1012';
    }
    if (!isset($error)) {
      $delete=mysqli_query($con, "UPDATE `companies` SET `deleted_at` = '$time', `status` = '0' WHERE `id` = '$id'");
      if ($delete) {
        $error = '2001';
      } else {
        $error = '1011';
      }
    }
  }
?>
