<?php
if ($i=="bank") {
  if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
    if ((isset($_POST['name'])) && (!empty($_POST['name']))) {
      $name=varsql($_POST['name']);
    } else {
      $error = '1001';
    }
    if (!isset($error)) {
      $iframe=varsql($_POST['iframe']);
      $status=varsql($_POST['status']);
      $insert=mysqli_query($con, "INSERT INTO `payments_bank` VALUES ('','$name','','','','','$status')");
      if ($insert) {
        $error = '2001';
      } else {
        $error = '1002';
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="update")) {
    if ((isset($_POST['name'])) && (!empty($_POST['name']))) {
      $name=varsql($_POST['name']);
    } else {
      $error = '1001';
    }
    if ((isset($_POST['id'])) && (!empty($_POST['id']))) {
      $id=varsql($_POST['id']);
    } else {
      $error = '1003';
    }
    if (!isset($error)) {
      $source=addslashes($_POST['source']);
      $resultok=addslashes($_POST['resultok']);
      $resultnot=addslashes($_POST['resultnot']);
      $iframe=varsql($_POST['iframe']);
      $status=varsql($_POST['status']);
      $update=mysqli_query($con, "UPDATE `payments_bank` SET `name` = '$name', `source` = '$source', `resultok` = '$resultok', `resultnot` = '$resultnot', `iframe` = '$iframe', `status` = '$status' WHERE `id` = '$id'");
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
      $error = '1003';
    }
    if (!isset($error)) {
      $delete=mysqli_query($con, "DELETE FROM `payments_bank` WHERE `id` = '$id'");
      if ($delete) {
        $error = '2001';
      } else {
        $error = '1002';
      }
    }
  }
}
if ($i=="card") {
  if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
    if ((isset($_POST['bank_id'])) && (!empty($_POST['bank_id']))) {
      $bank_id=varsql($_POST['bank_id']);
    } else {
      $error = '1004';
    }
      if ((isset($_POST['title'])) && (!empty($_POST['title']))) {
        $title=varsql($_POST['title']);
      } else {
        $error = '1005';
      }
      if((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
        $uploaddir = '../uploads/cards';
        $verifyimg = getimagesize($_FILES['image']['tmp_name']);
        $pattern = "#^(image/)[^\s\n<]+$#i";
        if(!preg_match($pattern, $verifyimg['mime'])){
          $error = '1010';
        }
      }
    if (!isset($error)) {
      $status=varsql($_POST['status']);
      $insert=mysqli_query($con, "INSERT INTO `payments_card` VALUES ('','$bank_id','$title','','','','','','','','','','','','','','$status')");
      if ($insert) {
        if((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
          $set_id=mysqli_insert_id($con);
          $uploadfile = tempnam_sfx($uploaddir, $set_id, ".tmp");
          move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
        }
        $error = '2001';
      } else {
        $error = '1002';
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="replace")) {
      if((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
        $uploaddir = '../uploads/cards';
        $verifyimg = getimagesize($_FILES['image']['tmp_name']);
        $pattern = "#^(image/)[^\s\n<]+$#i";
        if(!preg_match($pattern, $verifyimg['mime'])){
          $error = '1010';
        }
      }
    if (!isset($error)) {
        if((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
          $set_id=$_POST['process_id'];
          $uploadfile = tempnam_sfx($uploaddir, $set_id, ".tmp");
          move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
          $error = '2001';
        } else {
          $error = '1002';
        }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="edit")) {
    foreach (array_keys($_POST['tz']) as $key) {
      $ct=explode("_", $key);
      $st=$_POST['tz'][$key];
      if ($ct[1]=="position") {
        $update=mysqli_query($con, "UPDATE `payments_card` SET `position` = '$st' WHERE `id` = '$ct[0]'");
      } elseif ($ct[1]=="bankid") {
        $update=mysqli_query($con, "UPDATE `payments_card` SET `bank_id` = '$st' WHERE `id` = '$ct[0]'");
      } else {
        $update=mysqli_query($con, "UPDATE `payments_card` SET `i_".$ct[1]."` = '$st' WHERE `id` = '$ct[0]'");
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
      $delete=mysqli_query($con, "DELETE FROM `payments_card` WHERE `id` = '$process_id'");
      if ($delete) {
        $error = '2001';
      } else {
        $error = '1002';
      }
    }
  }
}
if ($i=="config") {
  if ((isset($_POST['process'])) && ($_POST['process']=="update")) {
    $min = varsql($_POST['min']);
    $max = varsql($_POST['max']);
    $maintenance = varsql($_POST['maintenance']);
    $method1 = varsql($_POST['method1']);
    $method2 = varsql($_POST['method2']);
    $email = varsql($_POST['email']);
    $phone = varsql($_POST['phone']);
    $update=mysqli_query($con, "UPDATE `payments_config` SET `min` = '$min', `max` = '$max', `maintenance` = '$maintenance', `method1` = '$method1', `method2` = '$method2', `email` = '$email', `phone` = '$phone' WHERE `id` = '1'");
    if ($update) {
      $error = '2001';
    } else {
      $error = '1001';
    }
  }
}
?>
