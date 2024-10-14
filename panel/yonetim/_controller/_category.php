<?php
if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
  if ((isset($_POST['title'])) && (!empty($_POST['title']))) {
    $title=varsql($_POST['title']);
  } else {
    $error = '1001';
  }
  if (!isset($error)) {
    $status=varsql($_POST['status']);
    $insert=mysqli_query($con, "INSERT INTO `devices_category` VALUES ('','$title','$time','0','0','$status')");
    if ($insert) {
      $error = '2001';
    } else {
      $error = '1002';
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="edit")) {
  if ((isset($_POST['title'])) && (!empty($_POST['title']))) {
    $title=varsql($_POST['title']);
  } else {
    $error = '1001';
  }
  if (!isset($error)) {
    $process_id=varsql($_POST['process_id']);
    $status=varsql($_POST['status']);
    $update=mysqli_query($con, "UPDATE `devices_category` SET `title` = '$title', `created_at` = '$time', `status` = '$status' WHERE `id` = '$process_id'");
    if ($update) {
      $error = '2001';
    } else {
      $error = '1002';
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="delete")) {
  if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
    $process_id=varsql($_POST['process_id']);
  } else {
    $error = '1003';
  }
  if (!isset($error)) {
    $delete=mysqli_query($con, "UPDATE `devices_category` SET `deleted_at` = '$time', `status` = '0' WHERE `process_id` = '$process_id'");
    if ($delete) {
      $error = '2001';
    } else {
      $error = '1002';
    }
  }
}
?>
