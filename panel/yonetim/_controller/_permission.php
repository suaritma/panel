<?php
  if ((isset($_POST['process'])) && ($_POST['process']=="add")) {
    if ((isset($_POST['title'])) && (!empty($_POST['title']))) {
      $title=varsql($_POST['title']);
    } else {
      $error = '1001';
    }
    if (!isset($error)) {
      $insert=mysqli_query($con, "INSERT INTO `permissions` VALUES ('','$title','$time','0','0','1')");
      $isc=mysqli_insert_id($con);
      if ($insert) {
       for ($n=1; $n<=9; $n++) {
      	if ((isset($_POST[$n.'_pview'])) && ($_POST[$n.'_pview']==1)) { $pview = 1; } else { $pview = 0; }
      	if ((isset($_POST[$n.'_padd'])) && ($_POST[$n.'_padd']==1)) { $padd = 1; } else { $padd = 0; }
      	if ((isset($_POST[$n.'_pedit'])) && ($_POST[$n.'_pedit']==1)) { $pedit = 1; } else { $pedit = 0; }
      	if ((isset($_POST[$n.'_pdel'])) && ($_POST[$n.'_pdel']==1)) { $pdel = 1; } else { $pdel = 0; }
      	mysqli_query($con, "INSERT INTO `permissions_role` VALUES ('','$isc','$n','$pview','$padd','$pedit','$pdel')");
       }
        $error = '2001';
      } else {
        $error = '1011';
      }
    }
  }
    if ((isset($_POST['process'])) && ($_POST['process']=="edit")) {
      $process_id=varsql($_POST['process_id']);
    if ((isset($_POST['title'])) && (!empty($_POST['title']))) {
      $title=varsql($_POST['title']);
    } else {
      $error = '1001';
    }
    if ((isset($_POST['status'])) && (!empty($_POST['status']))) {
      $status=varsql($_POST['status']);
    } else {
      $error = '1002';
    }
    if (!isset($error)) {
      $insert=mysqli_query($con, "UPDATE `permissions` SET `title` = '$title', `status` = '$status', `updated_at` = '$time' WHERE `id` = '$process_id'");
      if ($insert) {
      mysqli_query($con, "DELETE FROM `permissions_role` WHERE `permission_id` = '$process_id'");
       for ($n=1; $n<=9; $n++) {
      	if ((isset($_POST[$n.'_pview'])) && ($_POST[$n.'_pview']==1)) { $pview = 1; } else { $pview = 0; }
      	if ((isset($_POST[$n.'_padd'])) && ($_POST[$n.'_padd']==1)) { $padd = 1; } else { $padd = 0; }
      	if ((isset($_POST[$n.'_pedit'])) && ($_POST[$n.'_pedit']==1)) { $pedit = 1; } else { $pedit = 0; }
      	if ((isset($_POST[$n.'_pdel'])) && ($_POST[$n.'_pdel']==1)) { $pdel = 1; } else { $pdel = 0; }
      	mysqli_query($con, "INSERT INTO `permissions_role` VALUES ('','$process_id','$n','$pview','$padd','$pedit','$pdel')");
       }
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
      $delete=mysqli_query($con, "UPDATE `permissions` SET `deleted_at` = '$time', `status` = '0' WHERE `id` = '$id'");
      if ($delete) {
        $error = '2001';
      } else {
        $error = '1011';
      }
    }
  }
?>
