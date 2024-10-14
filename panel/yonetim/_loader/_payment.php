<?PHP
  if ((isset($_POST['pg'])) && (!empty($_POST['pg']))) {
    $cr_page = $_POST['pg'];
    $start = ($cr_page - 1) * $cf['pagination'];
  } else {
    $cr_page = 1;
    $start = 0;
    $end = $cf['pagination'];
  }
  if ($i=='pay') {
    if ((isset($_POST['price_lowest'])) && (!empty($_POST['price_lowest']))) {
        $price_lowest = varsql($_POST['price_lowest']);
    } else {
        $price_lowest = 0;
    }
    if ((isset($_POST['price_highest'])) && (!empty($_POST['price_highest']))) {
        $price_highest = varsql($_POST['price_highest']);
    } else {
        $price_highest = 2147483647;
    }
    if ((isset($_POST['date_lowest'])) && (!empty($_POST['date_lowest']))) {
        $date_lowest = varsql($_POST['date_lowest']);
    } else {
        $date_lowest = 0;
    }
    if ((isset($_POST['date_highest'])) && (!empty($_POST['date_highest']))) {
        $date_highest = varsql($_POST['date_highest']);
    } else {
        $date_highest = 2147483647;
    }
    if (isset($_POST['order'])) {
        if ($_POST['order']=="value_desc") {
            $order = "`payments`.`amount` DESC";
        }
        if ($_POST['order']=="value_asc") {
            $order = "`payments`.`amount` ASC";
        }
        if ($_POST['order']=="date_desc") {
            $order = "`payments`.`created_at` DESC";
        }
        if ($_POST['order']=="date_asc") {
            $order = "`payments`.`created_at` ASC";
        }
    } else {
        $order = "`payments`.`id` DESC";
    }
    $payments=mysqli_query($con, "SELECT `payments`.`id` as `id`, `payments`.`transaction_id` as `transaction_id`, `payments`.`fullname` as `fullname`, `payments`.`amount` as `amount`, `payments`.`amount_transfered` as `amount_transfered`, `payments`.`amount_commission` as `amount_commission`, `payments`.`installment` as `installment`, `payments`.`created_at` as `created_at`, `payments`.`completed` as `completed`, `payments`.`refunded` as `refunded`, `payments`.`status` as `status`, `dealers`.`title` as `title`, `dealers`.`id` as `dealer_id` FROM `payments` INNER JOIN `dealers` ON `dealers`.`id` = `payments`.`dealer_id` WHERE (`payments`.`status` = '1' AND `payments`.`deleted_at` = '0') AND (`payments`.`amount` >= '$price_lowest' AND `payments`.`amount` <= '$price_highest') AND (`payments`.`created_at` >= '$date_lowest' AND `payments`.`created_at` <= '$date_highest') ORDER BY ".$order." LIMIT $start, $cf[pagination]");
    while ($row = @mysqli_fetch_assoc($payments)) {
      $result_payments[] = $row;
    }
    $counter = @mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(`id`) as `total` FROM `payments` WHERE (`deleted_at` = '0' AND `status` = '1') AND (`payments`.`amount` >= '$price_lowest' AND `payments`.`amount` <= '$price_highest') AND (`payments`.`created_at` >= '$date_lowest' AND `payments`.`created_at` <= '$date_highest')"));
    $pagi = paginate($cf['pagination'], $cr_page, $counter['total'], ceil($counter['total'] / $cf['pagination']), ADMIN_URL.'payment/pay');
  }
  if ($i=='bank') {
    $banks=mysqli_query($con, "SELECT * FROM `payments_bank` WHERE `status` = '1' ORDER BY `id` ASC");
    while ($row = @mysqli_fetch_assoc($banks)) {
      $result_bank[] = $row;
    }
  }
  if ($i=='card') {
    $cards=mysqli_query($con, "SELECT * FROM `payments_card` WHERE `status` = '1' ORDER BY `id` ASC");
    while ($row = @mysqli_fetch_assoc($cards)) {
      $result_card[] = $row;
    }
    $banks=mysqli_query($con, "SELECT `id`,`name` FROM `payments_bank` WHERE `status` = '1' ORDER BY `id` ASC");
    while ($row = @mysqli_fetch_assoc($banks)) {
      $result_bank[] = $row;
    }
  }
  if ($i=='config') {
    $payments_config=@mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `payments_config` WHERE `id` = '1'"));
    $banks=mysqli_query($con, "SELECT `id`,`name` FROM `payments_bank` WHERE `status` = '1' ORDER BY `id` ASC");
    while ($row = @mysqli_fetch_assoc($banks)) {
      $result_bank[] = $row;
    }
  }
  $inject_header = '
    <link rel="stylesheet" href="'.ADMIN_URL.'_assets/codemirror/lib/codemirror.css">
    <script src="'.ADMIN_URL.'_assets/codemirror/lib/codemirror.js"></script>
  ';
  $inject_footer = '
    <script src="'.ADMIN_URL.'_assets/js/jquery.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/metisMenu.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery.nanoscroller.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/waves.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/pace.min.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="'.ADMIN_URL.'_assets/js/custom.js" type="text/javascript"></script>
    <script src="'.ADMIN_URL.'_assets/js/ext.js" type="text/javascript"></script>
  ';
?>
