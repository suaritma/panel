<?php
//Getting Next Service (Montaj, Servis)
function nextservicetype($id)
{
  global $con;
  $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `services`.`name` as `name` FROM `customers_service` INNER JOIN `services` ON `services`.`id`=`customers_service`.`customer_id` WHERE `customers_service`.`customer_id` = '$id' AND `customers_service`.`resolved` = '0' ORDER BY `customers_service`.`nextservice` ASC LIMIT 1"));
  if (!empty($get['name'])) {
    return $get['name'];
  } else {
    return "Yok";
  }
}
//Getting Last Service (Montaj, Servis)
function lastservicetype($id)
{
  global $con;
  $get=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `services`.`name` as `name` FROM `customers_service` INNER JOIN `services` ON `services`.`id`=`customers_service`.`customer_id` WHERE `customers_service`.`customer_id` = '$id' AND `customers_service`.`resolved` = '1' ORDER BY `customers_service`.`id` DESC LIMIT 1"));
  if (!empty($get['name'])) {
    return $get['name'];
  } else {
    return "Yok";
  }
}
//Getting Previously Service
function prevservice($id)
{
  global $con;
  $get=mysqli_fetch_assoc(mysqli_query($con, "SELECT `prevservice` FROM `customers_service` WHERE `customer_id` = '$id' ORDER BY `prevservice` DESC LIMIT 1"));
  if (!empty($get)) {
    return date("d/m/Y", $get['prevservice']);
  } else {
    return "Yok";
  }
}
//Getting Next Service
function nextservice($id)
{
  global $con;
  $get=mysqli_fetch_assoc(mysqli_query($con, "SELECT `nextservice` FROM `customers_service` WHERE `customer_id` = '$id' ORDER BY `nextservice` ASC LIMIT 1"));
  if (!empty($get)) {
    return date("d/m/Y", $get['nextservice']);
  } else {
    return "Yok";
  }
}


// personel ile ilgili birşey ama kopmuş burada 
if ((isset($_POST['process'])) && ($_POST['process']=="employee") && (!isset($_SESSION['employee_id']))) {
    if ((isset($_POST['username'])) && (!empty($_POST['username']))) {
      $username=varsql($_POST['username']);
      $check=mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `employee` WHERE `username` = '$username'"));
      if ($check['total']!=0) {
        $error = '1001';
      }
    } else {
        $error = '1002';
    }
    if ((isset($_POST['password'])) && (!empty($_POST['password']))) {
        $password=md5($_POST['password']);
    } else {
        $error = '1003';
    }
    if ((isset($_POST['repassword'])) && (!empty($_POST['repassword']))) {
        $repassword=md5($_POST['repassword']);
    } else {
        $error = '1004';
    }
    if ((isset($_POST['firstname'])) && (!empty($_POST['firstname']))) {
        $firstname=varsql($_POST['firstname']);
    } else {
        $error = '1005';
    }
    if ((isset($_POST['lastname'])) && (!empty($_POST['lastname']))) {
        $lastname=varsql($_POST['lastname']);
    } else {
        $error = '1006';
    }
    if ((isset($_POST['permission'])) && (!empty($_POST['permission']))) {
        $permission=varsql($_POST['permission']);
    } else {
        $error = '1007';
    }
    if (!isset($error)) {
        if ($password!=$repassword) {
            $error = '1008';
        } else {
            $email=varsql($_POST['email']);
            $gsm=varsql($_POST['gsm']);
            $address=varsql($_POST['address']);
            $insert=mysqli_query($con, "INSERT INTO `employee` VALUES ('','$_SESSION[dealer_id]','$username','$password','$firstname','$lastname','$email','$gsm','$address','0','$time','0','0','$permission','1')");
            if ($insert) {
                if ($_POST['auto_access']==1) {
                    $lst_ins_id=mysqli_insert_id($con);
                    mysqli_query($con, "INSERT IGNORE INTO `employee_auto_access` VALUES ('','$lst_ins_id')");
                }
                $error = '2001';
            } else {
                $error = '1009';
            }
        }
    }
}


// personel edit gibi duruyor burada olmaması lazım ama anlamadım 

if ((isset($_POST['process'])) && ($_POST['process']=="employee_edit") && (!isset($_SESSION['employee_id']))) {
  $id=varsql($_POST['id']);
  if ((isset($_POST['username'])) && (!empty($_POST['username']))) {
    $username=varsql($_POST['username']);
    $check=mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `employee` WHERE `username` = '$username' AND `id` != '$id'"));
    if ($check['total']!=0) {
      $error = '1001';
    }
  } else {
      $error = '1002';
  }
  if ((isset($_POST['firstname'])) && (!empty($_POST['firstname']))) {
      $firstname=varsql($_POST['firstname']);
  } else {
      $error = '1005';
  }
  if ((isset($_POST['lastname'])) && (!empty($_POST['lastname']))) {
      $lastname=varsql($_POST['lastname']);
  } else {
      $error = '1006';
  }
  if ((isset($_POST['permission'])) && (!empty($_POST['permission']))) {
      $permission=varsql($_POST['permission']);
  } else {
      $error = '1007';
  }
  if (!isset($error)) {
      $password=md5($_POST['password']);
      $repassword=md5($_POST['repassword']);
      if ($password!=$repassword) {
        $error = '1008';
      } else {
        $email=varsql($_POST['email']);
        $gsm=varsql($_POST['gsm']);
        $address=varsql($_POST['address']);
        $status=varsql($_POST['status']);
        if (empty($password)) {
          $insert=mysqli_query($con, "UPDATE `employee` SET `username` = '$username', `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `gsm` = '$gsm', `address` = '$address', `status` = '$status', `permission` = '$permission' WHERE `id` = '$id'");
        } else {
          $insert=mysqli_query($con, "UPDATE `employee` SET `username` = '$username', `password` = '$password', `firstname` = '$firstname', `lastname` = '$lastname', `email` = '$email', `gsm` = '$gsm', `address` = '$address', `status` = '$status', `permission` = '$permission' WHERE `id` = '$id'");
        }
        if ($insert) {
          if ($_POST['auto_access']==1) {
              mysqli_query($con, "INSERT IGNORE INTO `employee_auto_access` VALUES ('','$id')");
          } else {
              mysqli_query($con, "DELETE FROM `employee_auto_access` WHERE `employee_id` = '$id'");
          }
          $error = '2002';
        } else {
          $error = '1010';
        }
      }
  }
}

// mesajlar la  alakalı bölüm sanırım 
if ((isset($_POST['process'])) && ($_POST['process']=="message") && (!isset($_SESSION['employee_id']))) {
    if ((isset($_POST['content'])) && (!empty($_POST['content']))) {
        $content=md5($_POST['content']);
    } else {
        $error = '1017';
    }
    if (!isset($error)) {
        if ($password!=$repassword) {
            $error = '1018';
        } else {
            $email=varsql($_POST['email']);
            $sms=varsql($_POST['sms']);
            $notification=varsql($_POST['notification']);
            //$insert=mysqli_query($con, "INSERT INTO `dealers_employee` VALUES ('','$_SESSION[dealer_id]','$username','$password','$firstname','$lastname','$email','$gsm','$address','0','$time','0','0','1')");
            if ($insert) {
                $error = '2003';
            } else {
                $error = '1019';
            }
        }
    }
}
// to all grafik sayfaları ile alakalı olabilir 
if ((isset($_POST['process'])) && ($_POST['process']=="toall") && (!isset($_SESSION['employee_id']))) {
  	$id=varsql($_POST['id']);
  	$all_cust=mysqli_query($con, "SELECT `id` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]'");
  	while($row=@mysqli_fetch_assoc($all_cust)) {
  		$alcust[]=$row;
  	}
  	foreach($alcust as $alcu) {
  		mysqli_query($con, "INSERT IGNORE INTO `customers_employee` VALUES ('','$alcu[id]','$id')");
  		$tz=true;
  	}
	if ($tz) {
       $error = '2004';
    } else {
       $error = '1020';
    }
}

// burası ve üst bu yeni eklenen arızalı cihazlarla lakalı olabilr
if ((isset($_POST['process'])) && ($_POST['process']=="tonot") && (!isset($_SESSION['employee_id']))) {
  	$id=varsql($_POST['id']);
	$tonot=mysqli_query($con, "DELETE FROM `customers_employee` WHERE `employee_id` = '$id'");
	if ($tonot) {
       $error = '2005';
    } else {
       $error = '1021';
    }
}