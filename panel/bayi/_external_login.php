<?php
  include("../db.php");
  if (isset($_POST['process'])) {
    $req=mysqli_real_escape_string($con, $_POST['process']);
    if ($req=='admin_to_company') {
      if ((isset($_SESSION['admin_id'])) && (!empty($_SESSION['admin_id']))) {
        if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
          $x=mysqli_real_escape_string($con, $_POST['process_id']);
          $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`name` FROM `companies` WHERE `id` = '$x'"));
          $_SESSION['company_id'] = $get['id'];
          $_SESSION['company_name'] = $get['name'];
          $_SESSION['simulate'] = 'admin_to_company';
          header("Location: " . DEALER_URL . "company/");
          exit();
        } else {
          exit();
        }
      } else {
        exit();
      }
    } elseif ($req=='admin_to_dealer') {
      if ((isset($_SESSION['admin_id'])) && (!empty($_SESSION['admin_id']))) {
        if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
          $x=mysqli_real_escape_string($con, $_POST['process_id']);
          $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`company_id`,`title`,`currency`,`language` FROM `dealers` WHERE `id` = '$x'"));
          $comp=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `country` FROM `companies` WHERE `id` = '$get[company_id]'"));
          $_SESSION['dealer_id'] = $get['id'];
          $_SESSION['dealer_title'] = $get['title'];
          $_SESSION['dealer_currency'] = $get['currency'];
          $_SESSION['dealer_language'] = $get['language'];
          $_SESSION['dealer_company_id'] = $get['company_id'];
          $_SESSION['dealer_country'] = $comp['country'];
          for ($i=1; $i<=9; $i++) {
            $_SESSION['p'.$i]['pview'] = 1;
            $_SESSION['p'.$i]['padd'] = 1;
            $_SESSION['p'.$i]['pedit'] = 1;
            $_SESSION['p'.$i]['pdel'] = 1;
          }
          $_SESSION['simulate'] = 'admin_to_dealer';
          header("Location: " . DEALER_URL . "dashboard/");
          exit();
        } else {
          exit();
        }
      } else {
        exit();
      }
    } elseif ($req=='admin_to_customer') {
      if ((isset($_SESSION['admin_id'])) && (!empty($_SESSION['admin_id']))) {
        if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
          $x=mysqli_real_escape_string($con, $_POST['process_id']);
          $cust=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `dealer_id` FROM `customers` WHERE `id` = '$x'"));
          $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`company_id`,`title`,`currency`,`language` FROM `dealers` WHERE `id` = '$cust[dealer_id]'"));
          $comp=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `country` FROM `companies` WHERE `id` = '$get[company_id]'"));
          $_SESSION['dealer_id'] = $get['id'];
          $_SESSION['dealer_title'] = $get['title'];
          $_SESSION['dealer_currency'] = $get['currency'];
          $_SESSION['dealer_language'] = $get['language'];
          $_SESSION['dealer_company_id'] = $get['company_id'];
          $_SESSION['dealer_country'] = $comp['country'];
          $_SESSION['simulate'] = 'admin_to_customer';
          for ($i=1; $i<=9; $i++) {
            $_SESSION['p'.$i]['pview'] = 1;
            $_SESSION['p'.$i]['padd'] = 1;
            $_SESSION['p'.$i]['pedit'] = 1;
            $_SESSION['p'.$i]['pdel'] = 1;
          }
          ?>
          <form action="<?=DEALER_URL?>customers/view" name="myForm" id="myForm" method="POST">
          	<input type="hidden" name="process" value="none">
          	<input type="hidden" name="id" value="<?=$x?>">
          	<input type="hidden" name="process_id" value="0">
          </form>
		  <script type="text/javascript">
    		window.onload=function(){
          	  	document.forms["myForm"].submit();
    		}
		  </script>
          <?php
          exit();
        } else {
          exit();
        }
      } else {
        exit();
      }
    } elseif ($req=='admin_to_employee') {
      if ((isset($_SESSION['admin_id'])) && (!empty($_SESSION['admin_id']))) {
        if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
          $x=mysqli_real_escape_string($con, $_POST['process_id']);
          $emp=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `firstname`, `lastname`, `dealer_id`, `permission` FROM `employee` WHERE `id` = '$x'"));
          $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`company_id`,`title`,`currency`,`language` FROM `dealers` WHERE `id` = '$emp[dealer_id]'"));
          $comp=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `country` FROM `companies` WHERE `id` = '$get[company_id]'"));
          $_SESSION['employee_id'] = $x;
          $_SESSION['employee_name'] = $emp['firstname']." ".$emp['lastname'];
          $_SESSION['dealer_id'] = $get['id'];
          $_SESSION['dealer_title'] = $get['title'];
          $_SESSION['dealer_currency'] = $get['currency'];
          $_SESSION['dealer_language'] = $get['language'];
          $_SESSION['dealer_company_id'] = $get['company_id'];
          $_SESSION['dealer_country'] = $comp['country'];
  		  $resu=mysqli_query($con, "SELECT * FROM `permissions_role` WHERE `permission_id` = '$emp[permission]'");
  		  while($row=@mysqli_fetch_assoc($resu)) {
  		    $_SESSION['p'.$row['type']]['pview'] = $row['pview'];
  		    $_SESSION['p'.$row['type']]['padd'] = $row['padd'];
  		    $_SESSION['p'.$row['type']]['pedit'] = $row['pedit'];
  		    $_SESSION['p'.$row['type']]['pdel'] = $row['pdel'];
  		  }
          $_SESSION['simulate'] = 'admin_to_employee';
          header("Location: " . DEALER_URL . "calendar/");
          exit();
        } else {
          exit();
        }
      } else {
        exit();
      }
    } elseif ($req=='company_to_dealer') {
      if ((isset($_SESSION['company_id'])) && (!empty($_SESSION['company_id']))) {
        if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
          $x=mysqli_real_escape_string($con, $_POST['process_id']);
          $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`,`company_id`,`title`,`currency`,`language` FROM `dealers` WHERE `id` = '$x' AND `company_id` = '$_SESSION[company_id]'"));
          $comp=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `country`,`name` FROM `companies` WHERE `id` = '$_SESSION[company_id]'"));
          $_SESSION['dealer_id'] = $get['id'];
          $_SESSION['dealer_title'] = $get['title'];
          $_SESSION['dealer_currency'] = $get['currency'];
          $_SESSION['dealer_language'] = $get['language'];
          $_SESSION['dealer_company_id'] = $get['company_id'];
          $_SESSION['dealer_country'] = $comp['country'];
          for ($i=1; $i<=9; $i++) {
            $_SESSION['p'.$i]['pview'] = 1;
            $_SESSION['p'.$i]['padd'] = 1;
            $_SESSION['p'.$i]['pedit'] = 1;
            $_SESSION['p'.$i]['pdel'] = 1;
          }
          $_SESSION['simulate'] = 'company_to_dealer';
          header("Location: " . DEALER_URL . "dashboard/");
          exit();
        } else {
          exit();
        }
      } else {
        exit();
      }
    } elseif ($req=='dealer_to_employee') {
      if ((isset($_SESSION['dealer_id'])) && (!empty($_SESSION['dealer_id']))) {
        if ((isset($_POST['process_id'])) && (!empty($_POST['process_id']))) {
          $x=mysqli_real_escape_string($con, $_POST['process_id']);
          $employee=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`, `firstname`, `lastname`, `permission` FROM `employee` WHERE `id` = '$x' AND `dealer_id` = '$_SESSION[dealer_id]'"));
          $_SESSION['employee_id'] = $employee['id'];
          $_SESSION['employee_name'] = $employee['firstname']." ".$employee['lastname'];
          $resu=mysqli_query($con, "SELECT * FROM `permissions_role` WHERE `permission_id` = '$employee[permission]'");
          while($row=@mysqli_fetch_assoc($resu)) {
            $_SESSION['p'.$row['type']]['pview'] = $row['pview'];
            $_SESSION['p'.$row['type']]['padd'] = $row['padd'];
            $_SESSION['p'.$row['type']]['pedit'] = $row['pedit'];
            $_SESSION['p'.$row['type']]['pdel'] = $row['pdel'];
          }
          $_SESSION['simulate'] = 'dealer_to_employee';
          header("Location: " . DEALER_URL . "calendar/");
          exit();
        } else {
          exit();
        }
      } else {
        exit();
      }
    } else {
      exit();
    }
  } else {
    exit();
  }
?>
