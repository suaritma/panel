<?php
if ((isset($_POST['process'])) && ($_POST['process']=="reload")) {
  if ((isset($_POST['id'])) && (!empty($_POST['id']))) {
    $id=varsql($_POST['id']);
  } else {
    $error = '1001';
  }
  if (!isset($error)) {
    switch ($i) {
        case 'category':
            $sq='devices_category';
            break;
        case 'device':
            $sq='devices';
            break;
        case 'customer':
            $sq='customers';
            break;
        case 'dealer':
            $sq='dealers';
            break;
        case 'company':
            $sq='companies';
            break;
        default:
            $sq='';
    }
    $update=mysqli_query($con, "UPDATE $sq SET `deleted_at` = '0', `updated_at` = '$time', `status` = '1' WHERE `id` = '$id'");
    if ($update) {
      $error = '2001';
    } else {
      $error = '1002';
    }
  }
}
if ((isset($_POST['process'])) && ($_POST['process']=="delete")) {
  if ((isset($_POST['id'])) && (!empty($_POST['id']))) {
    $id=varsql($_POST['id']);
  } else {
    $error = '1001';
  }
  if (!isset($error)) {
    switch ($i) {
        case 'category':
            $sq='devices_category';
            break;
        case 'device':
            $sq='devices';
            break;
        case 'customer':
            $sq='customers';
            break;
        case 'dealer':
            $sq='dealers';
            break;
        case 'company':
            $sq='companies';
            break;
        default:
            $sq='';
    }
    $delete=mysqli_query($con, "DELETE FROM $sq WHERE `id` = '$id'");
    if ($delete) {
      $error = '2001';
    } else {
      $error = '1002';
    }
  }
}
?>
