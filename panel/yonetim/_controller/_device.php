<?php
  if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
    if ((isset($_POST['category'])) && (!empty($_POST['category']))) {
      $category=varsql($_POST['category']);
    } else {
      $error = '1001';
    }
    if ((isset($_POST['name'])) && (!empty($_POST['name']))) {
      $name=varsql($_POST['name']);
    } else {
      $error = '1002';
    }
    if ((isset($_POST['manufacturer'])) && (!empty($_POST['manufacturer']))) {
      $manufacturer=varsql($_POST['manufacturer']);
    } else {
      $error = '1003';
    }
    if((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
      $uploaddir = '../uploads/devices';
      $verifyimg = getimagesize($_FILES['image']['tmp_name']);
      $pattern = "#^(image/)[^\s\n<]+$#i";
      if(!preg_match($pattern, $verifyimg['mime'])){
        $error = '1010';
      }
    }
    if (!isset($error)) {
      $price=varsql($_POST['price']);
      $code=varsql($_POST['code']);
      $stack=varsql($_POST['stack']);
      $weight=varsql($_POST['weight']);
      $description=varsql($_POST['description']);
      $status=varsql($_POST['status']);
      $insert=mysqli_query($con, "INSERT INTO `devices` VALUES ('','$category','$name','$price','$description','$code','$stack','$weight','$manufacturer','$time','0','0','$status')");
      if ($insert) {
        if((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
          $set_id=mysqli_insert_id($con);
          $uploadfile = tempnam_sfx($uploaddir, $set_id, ".tmp");
          move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
        }
        $error = '2001';
      } else {
        $error = '1004';
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="edit")) {
    if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
      $process_id=varsql($_POST['process_id']);
    } else {
      $error = '1003';
    }
    if ((isset($_POST['category'])) && (!empty($_POST['category']))) {
      $category=varsql($_POST['category']);
    } else {
      $error = '1001';
    }
    if ((isset($_POST['name'])) && (!empty($_POST['name']))) {
      $name=varsql($_POST['name']);
    } else {
      $error = '1002';
    }
    if ((isset($_POST['manufacturer'])) && (!empty($_POST['manufacturer']))) {
      $manufacturer=varsql($_POST['manufacturer']);
    } else {
      $error = '1003';
    }
    if ((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
      $uploaddir = '../uploads/devices';
      $verifyimg = getimagesize($_FILES['image']['tmp_name']);
      $pattern = "#^(image/)[^\s\n<]+$#i";
      if(!preg_match($pattern, $verifyimg['mime'])){
        $error = '1010';
      }
    }
    if (!isset($error)) {
      $price=varsql($_POST['price']);
      $code=varsql($_POST['code']);
      $stack=varsql($_POST['stack']);
      $weight=varsql($_POST['weight']);
      $description=varsql($_POST['description']);
      $status=varsql($_POST['status']);
      $update=mysqli_query($con, "UPDATE `devices` SET `category_id` = '$category', `name` = '$name', `price` = '$price', `description` = '$description', `code` = '$code', `stack` = '$stack', `weight` = '$weight', `manufacturer` = '$manufacturer', `updated_at` = '$time', `status` = '$status' WHERE `id` = '$process_id'");
      if ($update) {
        if ((!empty($_FILES['image'])) && $_FILES['image']['error'] == 0) {
          $set_id=$process_id;
          $uploadfile = tempnam_sfx($uploaddir, $set_id, ".tmp");
          move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile);
        }
        $error = '2001';
      } else {
        $error = '1004';
      }
    }
  }
  if ((isset($_POST['process'])) && ($_POST['process']=="delete")) {
    if ((isset($_POST['id'])) && (!empty($_POST['id']))) {
      $id=varsql($_POST['id']);
    } else {
      $error = '1005';
    }
    if (!isset($error)) {
      $delete=mysqli_query($con, "UPDATE `devices` SET `deleted_at` = '$time', `status` = '0' WHERE `id` = '$id'");
      if ($delete) {
        $error = '2001';
      } else {
        $error = '1004';
      }
    }
  }
?>
