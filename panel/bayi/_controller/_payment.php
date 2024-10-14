<?php
if ((isset($_POST['process'])) && ($_POST['process']=="pay") && (!isset($_SESSION['employee_id']))) {
  $payments_config=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `payments_config` WHERE `id` = '1'"));
  if ((isset($_POST['taksit'])) && (!empty($_POST['taksit']))) {
    $taksit=varsql($_POST['taksit']);
  } else {
    $error = '1001';
  }
  if ((isset($_POST['amount_whole'])) && (!empty($_POST['amount_whole']))) {
    $amount_whole=varsql($_POST['amount_whole']);
  } else {
    $error = '1002';
  }
  if ((isset($_POST['fullname'])) && (!empty($_POST['fullname']))) {
    $fullname=varsql($_POST['fullname']);
  } else {
    $error = '1003';
  }
  if ((isset($_POST['card_code'])) && (!empty($_POST['card_code']))) {
    $card_code=varsql($_POST['card_code']);
  } else {
    $error = '1004';
  }
  if ((isset($_POST['month'])) && (!empty($_POST['month']))) {
    $month=varsql($_POST['month']);
  } else {
    $error = '1005';
  }
  if ((isset($_POST['year'])) && (!empty($_POST['year']))) {
    $year=varsql($_POST['year']);
    $sub_year=substr($year, -2);
  } else {
    $error = '1006';
  }
  if ((isset($_POST['cvc'])) && (!empty($_POST['cvc']))) {
    $cvc=varsql($_POST['cvc']);
  } else {
    $error = '1007';
  }
  if ((isset($_POST['payment_type'])) && (!empty($_POST['payment_type']))) {
    $payment_type=varsql($_POST['payment_type']);
  } else {
    $error = '1008';
  }
  if ((isset($_POST['confirmation'])) && (!empty($_POST['confirmation']))) {
    $confirmation=varsql($_POST['confirmation']);
  } else {
    $error = '1009';
  }
  if ((isset($amount)) && ($amount<$payments_config['min'])) {
    $error = '1010';
  }
  if ((isset($amount)) && ($amount>$payments_config['max'])) {
    $error = '1011';
  }
  if (!isset($error)) {
    $method1=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `source` FROM `payments_bank` WHERE `id` = '$payments_config[method1]'"));
    $method2=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `source` FROM `payments_bank` WHERE `id` = '$payments_config[method2]'"));
    $email=varsql($_POST['email']);
    $phone=varsql($_POST['phone']);
    $note=varsql($_POST['note']);
    $bin=substr($card_code, 0, 6);
    $first_digits=substr($card_code, 0, 4);
    $last_digits=substr($card_code, -4);
    $get_bin=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `payments_bank`.`source` as `source`, `binlist`.`bank_id` as `bank_id`, `binlist`.`card_id` as `card_id`, `payments_card`.`i_".$taksit."` as `taksit`, `binlist`.`type` as `type` FROM `binlist` INNER JOIN `payments_bank` ON `binlist`.`bank_id`=`payments_bank`.`id` INNER JOIN `payments_card` ON `binlist`.`card_id`=`payments_card`.`id` WHERE `binlist`.`bin` = '$bin'"));
    if (!empty($get_bin)) {
      if  ($payment_type==1)  {
        $amount = $amount_whole;
        $amount_comission =  ($amount_whole / 100) * $get_bin['taksit'];
        $amount_transfered = $amount_whole - $get_bin['taksit'];
      } else {
        $amount_transfered = $amount_whole;
        $kom = ($amount_whole / 100) * $get_bin['taksit'];
        $amount_comission = $kom;
        $amount = $amount_whole + $kom;
      }
      $cust_ok_url = DEALER_URL.'return/success&r='.$get_bin['bank_id'];
      $cust_not_url = DEALER_URL.'return/failed&r='.$get_bin['bank_id'];
      if (($payments_config['method2']!=0) && ($taksit<=1)) {
          $eval_command = $method2['source'];
        //eval($method2['source']);
      } else {
          $eval_command = $get_bin['source'];
        //eval($get_bin['source']);
      }
    } else {
      $get_bin['type'] = "VISA";
      $get_bin['bank_id'] = $payments_config['method1'];
      $get_bin['card_id'] = $payments_config['method1'];
      $get_bin['taksit'] = 0;
      if  ($payment_type==1)  {
        $amount = $amount_whole;
        $amount_comission =  ($amount_whole / 100) * $get_bin['taksit'];
        $amount_transfered = $amount_whole - $get_bin['taksit'];
      } else {
        $amount_transfered = $amount_whole;
        $kom = ($amount_whole / 100) * $get_bin['taksit'];
        $amount_comission = $kom;
        $amount = $amount_whole + $kom;
      }
      $cust_ok_url = DEALER_URL.'return/success&r='.$payments_config['method1'];
      $cust_not_url = DEALER_URL.'return/failed&r='.$payments_config['method1'];
      if (($payments_config['method2']!=0) && ($taksit<=1)) {
          $eval_command = $method2['source'];
        //eval($method2['source']);
      } else {
          $eval_command = $method1['source'];
        //eval($method1['source']);
      }
    }
  }
}
?>
