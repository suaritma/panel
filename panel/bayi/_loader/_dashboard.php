<?php
  $this_month = strtotime(date("Y-m", time()).'-01 00:00:00');
  $last_month = strtotime ('-1 month', $this_month);
  $next_month = strtotime ('+1 month', $this_month);
  $this_month_calc = mysqli_fetch_assoc(mysqli_query($con, "SELECT COALESCE((SUM(`customers_device`.`price`) + SUM(`customers_service`.`price`)), 0) AS `total` FROM `customers` INNER JOIN `customers_device` ON `customers`.`id`=`customers_device`.`customer_id` INNER JOIN `customers_service` ON `customers`.`id`=`customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`created_at` >= '$this_month' AND `customers_device`.`created_at` >= '$this_month')"));
  $this_month_earn = $this_month_calc['total'];
  $last_month_calc = mysqli_fetch_assoc(mysqli_query($con, "SELECT COALESCE((SUM(`customers_device`.`price`) + SUM(`customers_service`.`price`)), 0) AS `total` FROM `customers` INNER JOIN `customers_device` ON `customers`.`id`=`customers_device`.`customer_id` INNER JOIN `customers_service` ON `customers`.`id`=`customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND ((`customers_service`.`created_at` >= '$last_month' AND `customers_service`.`created_at` <= '$this_month') AND (`customers_device`.`created_at` >= '$last_month' AND `customers_device`.`created_at` <= '$this_month'))"));
  $last_month_earn = $last_month_calc['total'];
  $this_month_customer_calc = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) AS `total` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND `created_at` >= '$this_month'"));
  $this_month_customer = $this_month_customer_calc['total'];
  $last_month_customer_calc = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) AS `total` FROM `customers` WHERE `dealer_id` = '$_SESSION[dealer_id]' AND (`created_at` >= '$last_month' AND `created_at` <= '$this_month')"));
  $last_month_customer = $last_month_customer_calc['total'];
  $this_month_service_calc = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) AS `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`prevservice` <= '$next_month' AND `customers_service`.`prevservice` >= '$this_month')"));
  $this_month_service = $this_month_service_calc['total'];
  $last_month_service_calc = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) AS `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`prevservice` <= '$this_month' AND `customers_service`.`prevservice` >= '$last_month')"));
  $last_month_service = $last_month_service_calc['total'];
  $next_month_service_calc = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`customers_service`.`id`) AS `total` FROM `customers_service` INNER JOIN `customers` ON `customers`.`id` = `customers_service`.`customer_id` WHERE `customers`.`dealer_id` = '$_SESSION[dealer_id]' AND (`customers_service`.`nextservice` >= '$this_month' AND `customers_service`.`nextservice` <= '$next_month')"));
  $next_month_service = $next_month_service_calc['total'];
  $stats = @mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `dealers_stats` WHERE `dealer_id` = '$_SESSION[dealer_id]' LIMIT 1"));
  $getm=date("m", $time);
  $i3=array(); $i6=array(); $i9=array(); $i12=array();
  $s3=array(); $s6=array(); $s9=array(); $s12=array();
  $c3=array(); $c6=array(); $c9=array(); $c12=array();
  for ($i=1; $i<=12; $i++) {
    $gety=date("Y", $time);
    $getto=$getm-$i;
    if ($getto<0) {
      $getto = $getto + 12;
      $gety=$gety-1;
    }
    $getz=$getto+1;
    if ($getz<=9) { $zk='0'; } else { $zk=''; }
    if ($i<=3) {
      $i3[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['r_'.$zk.$getz]." }";
      $s3[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['s_'.$zk.$getz]." }";
      $c3[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['c_'.$zk.$getz]." }";
    }
    if ($i<=6) {
      $i6[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['r_'.$zk.$getz]." }";
      $s6[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['s_'.$zk.$getz]." }";
      $c6[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['c_'.$zk.$getz]." }";
    }
    if ($i<=9) {
      $i9[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['r_'.$zk.$getz]." }";
      $s9[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['s_'.$zk.$getz]." }";
      $c9[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['c_'.$zk.$getz]." }";
    }
    if ($i<=12) {
      $i12[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['r_'.$zk.$getz]." }";
      $s12[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['s_'.$zk.$getz]." }";
      $c12[] = "{ x: new Date(".$gety.", ".$getto."), y: ".$stats['c_'.$zk.$getz]." }";
    }
  }
?>
