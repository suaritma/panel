<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  header('Content-Type: application/json;charset=utf-8');
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $next_two_month = strtotime ($_GET['end']);
  $prev_two_month = strtotime ($_GET['start']);
  $resultstr = array();
  //All SERVICES
  if ((isset($_GET['cities'])) && (isset($_GET['towns'])) && (isset($_GET['streets']))) {
    $city=varsql($_GET['cities']);
    $town=varsql($_GET['towns']);
    $street=varsql($_GET['streets']);
    $get=mysqli_query($con, "SELECT `customers_service`.`customer_id` as `id`, `customers_service`.`nextservice` as `nextservice`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers_service`.`resolved` as `resolved` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers_service`.`status` = '1' AND (`customers_service`.`nextservice` <= '$next_two_month' AND `customers_service`.`nextservice` >= '$prev_two_month') AND (`customers`.`status` = '1' AND `customers`.`deleted_at` = '0') AND (`customers`.`city` = '$city' AND `customers`.`town` = '$town') AND FIND_IN_SET(`customers`.`street`, $street)");
  } elseif ((isset($_GET['cities'])) && (isset($_GET['towns']))) {
    $city=varsql($_GET['cities']);
    $town=varsql($_GET['towns']);
    $get=mysqli_query($con, "SELECT `customers_service`.`customer_id` as `id`, `customers_service`.`nextservice` as `nextservice`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers_service`.`resolved` as `resolved` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers_service`.`status` = '1' AND (`customers_service`.`nextservice` <= '$next_two_month' AND `customers_service`.`nextservice` >= '$prev_two_month') AND (`customers`.`status` = '1' AND `customers`.`deleted_at` = '0') AND (`customers`.`city` = '$city' AND `customers`.`town` = '$town')");
  } elseif (isset($_GET['cities'])) {
    $city=varsql($_GET['cities']);
    $get=mysqli_query($con, "SELECT `customers_service`.`customer_id` as `id`, `customers_service`.`nextservice` as `nextservice`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers_service`.`resolved` as `resolved` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers_service`.`status` = '1' AND (`customers_service`.`nextservice` <= '$next_two_month' AND `customers_service`.`nextservice` >= '$prev_two_month') AND (`customers`.`status` = '1' AND `customers`.`deleted_at` = '0') AND `customers`.`city` = '$city'");
  } else {
    $get=mysqli_query($con, "SELECT `customers_service`.`customer_id` as `id`, `customers_service`.`nextservice` as `nextservice`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers_service`.`resolved` as `resolved` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers_service`.`status` = '1' AND (`customers_service`.`nextservice` <= '$next_two_month' AND `customers_service`.`nextservice` >= '$prev_two_month') AND (`customers`.`status` = '1' AND `customers`.`deleted_at` = '0')");
  }
  while($row=@mysqli_fetch_assoc($get)) {
    $result_service[] = $row;
  }
  if (!empty($result_service)) {
    foreach ($result_service as $res) {
      if ($res['resolved']==1) {
        $colors="#42f465";
      } else {
        if ($res['nextservice']<$time) {
          $colors="#f44242";
        } else {
          $colors="#42a4f4";
        }
      }
      $event_arr = array();
      $event_arr['title'] = $res['firstname']." ".$res['lastname'];
      $event_arr['start'] = date("Y-m-d", $res['nextservice']);
      $event_arr['color'] = $colors;
      $event_arr['data_id'] = $res['id'];
      array_push($resultstr, $event_arr);
    }
  }
  //All INSTALLMENTS
  $get=mysqli_query($con, "SELECT `customers`.`id` as `id`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `installments_inside`.`date` as `date`, `installments_inside`.`status` as `status` FROM `installments_inside` INNER JOIN `installments` ON `installments_inside`.`installment_id` = `installments`.`id` INNER JOIN `customers` ON `customers`.`id` = `installments`.`customer_id` WHERE (`customers`.`deleted_at` = '0' AND `installments`.`status` = '1') AND (`installments_inside`.`date` <= '$next_two_month' AND `installments_inside`.`date` >= '$prev_two_month') AND (`customers`.`status` = '1' AND `customers`.`deleted_at` = '0')");
  while($row=@mysqli_fetch_assoc($get)) {
    $result_installment[] = $row;
  }
  if (!empty($result_installment)) {
    foreach ($result_installment as $res) {
      if ($res['status']==1) {
        $colori="#42f465";
      } else {
        if ($res['date']<$time) {
          $colori="#f44242";
        } else {
          $colori="#42a4f4";
        }
      }
      $event_arr['title'] = "(T) ".$res['firstname']." ".$res['lastname'];
      $event_arr['start'] = date("Y-m-d", $res['date']);
      $event_arr['color'] = $colors;
      $event_arr['data_id'] = $res['id'];
      array_push($resultstr, $event_arr);
    }
  }
  if ((!empty($result_service)) || (!empty($result_installment))) {
    echo json_encode($resultstr);
  }
?>
