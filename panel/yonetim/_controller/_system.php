<?php
  if ((isset($_POST['process'])) && ($_POST['process']=="update")) {
    $pagination = varsql($_POST['pagination']);
    $customer_code = varsql($_POST['customer_code']);
    $maintenance = varsql($_POST['maintenance']);
    $update=mysqli_query($con, "UPDATE `configurations` SET `pagination` = '$pagination', `customer_code` = '$customer_code', `maintenance` = '$maintenance' WHERE `id` = '1'");
    if ($update) {
      $error = '2001';
    } else {
      $error = '1001';
    }
  }
?>
