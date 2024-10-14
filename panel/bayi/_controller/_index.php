<?php

//Giriş Ekranı 
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
    $company=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`name` FROM `companies` WHERE (`username` = '$username' AND `password` = '$password') AND (`status` = '1' AND `deleted_at` = '0')"));
    if ($company) {
      $_SESSION['company_id'] = $company['id'];
      $_SESSION['company_name'] = $company['name'];
      header("Location: " . DEALER_URL . "company/");
      exit();
    } else {
      $dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`company_id`,`title`,`currency`,`language` FROM `dealers` WHERE (`username` = '$username' AND `password` = '$password') AND (`status` = '1' AND `deleted_at` = '0')"));
      if ($dealer) {
        if ((isset($dealer['id'])) && (!empty($dealer['id']))) {
          mysqli_query($con, "UPDATE `dealers` SET `online_at` = '$time' WHERE `id` = '$dealer[id]'");
          $comp=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `country` FROM `companies` WHERE `id` = '$dealer[company_id]'"));
          $_SESSION['dealer_id'] = $dealer['id'];
          $_SESSION['dealer_title'] = $dealer['title'];
          $_SESSION['dealer_currency'] = $dealer['currency'];
          $_SESSION['dealer_language'] = $dealer['language'];
          $_SESSION['dealer_company_id'] = $dealer['company_id'];
          $_SESSION['dealer_country'] = $comp['country'];
          for ($i=1; $i<=9; $i++) {
            $_SESSION['p'.$i]['pview'] = 1;
            $_SESSION['p'.$i]['padd'] = 1;
            $_SESSION['p'.$i]['pedit'] = 1;
            $_SESSION['p'.$i]['pdel'] = 1;
          }
          header("Location: " . DEALER_URL . "dashboard/");
          exit();
        } else {
          $error = '1003';
        }
      } else {
      	$employee=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`, `dealer_id`, `firstname`, `lastname`, `permission` FROM `employee` WHERE (`username` = '$username' AND `password` = '$password') AND (`status` = '1' AND `deleted_at` = '0')"));
        if ($employee) {
          if ((isset($employee['id'])) && (!empty($employee['id']))) {
            mysqli_query($con, "UPDATE `employee` SET `online_at` = '$time' WHERE `id` = '$employee[id]'");
            $dealer=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`company_id`,`title`,`currency`,`language` FROM `dealers` WHERE `id` = '$employee[dealer_id]' AND (`status` = '1' AND `deleted_at` = '0')"));
            $comp=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `country` FROM `companies` WHERE `id` = '$dealer[company_id]'"));
            $_SESSION['employee_id'] = $employee['id'];
            $_SESSION['employee_name'] = $employee['firstname']." ".$employee['lastname'];
            $_SESSION['dealer_id'] = $dealer['id'];
            $_SESSION['dealer_title'] = $dealer['title'];
            $_SESSION['dealer_currency'] = $dealer['currency'];
            $_SESSION['dealer_language'] = $dealer['language'];
            $_SESSION['dealer_company_id'] = $dealer['company_id'];
            $_SESSION['dealer_country'] = $comp['country'];
  			$resu=mysqli_query($con, "SELECT * FROM `permissions_role` WHERE `permission_id` = '$employee[permission]'");
  			while($row=@mysqli_fetch_assoc($resu)) {
  			  $_SESSION['p'.$row['type']]['pview'] = $row['pview'];
  			  $_SESSION['p'.$row['type']]['padd'] = $row['padd'];
  			  $_SESSION['p'.$row['type']]['pedit'] = $row['pedit'];
  			  $_SESSION['p'.$row['type']]['pdel'] = $row['pdel'];
  			}
            header("Location: " . DEALER_URL . "calendar/");
            exit();
          } else {
            $error = '1004';
          }
        } else {
          $error = '1005';
        }
      }
    }
  }
}
?>
