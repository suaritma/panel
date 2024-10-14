<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $customer_info = @mysqli_fetch_assoc(mysqli_query($con, "SELECT `customers_service`.`resolved` as `resolved`, `dealers`.`currency` as `currency`, `customers`.`firstname` as `firstname`, `customers`.`lastname` as `lastname`, `customers`.`gsm` as `gsm`, `customers`.`address` as `address`, `customers_service`.`nextservice` as `nextservice` FROM `customers` INNER JOIN `customers_service` ON `customers_service`.`customer_id`=`customers`.`id` INNER JOIN `dealers` ON `dealers`.`id`=`customers`.`dealer_id` WHERE `customers`.`id` = '$id' AND `customers`.`dealer_id` = '$_SESSION[dealer_id]' ORDER BY `customers_service`.`id` DESC LIMIT 1"));
  $result_services = array();
  $services=mysqli_query($con, "SELECT `services`.`name` as `name`, `customers_service`.`nextservice` as `nextservice`, `customers_service`.`price` as `price` FROM `customers_service` INNER JOIN `services` ON `services`.`id`=`customers_service`.`service_id` WHERE `customers_service`.`customer_id` = '$id' AND `customers_service`.`deleted_at` = '0' ORDER BY `customers_service`.`id` ASC LIMIT 5");
  while ($row = @mysqli_fetch_assoc($services)) {
    $result_services[] = $row;
  }
  $result_installments = array();
  $installments=mysqli_query($con, "SELECT `installments_inside`.`count` as `count`, `installments_inside`.`date` as `date`, `installments_inside`.`price` as `price` FROM `installments` INNER JOIN `installments_inside` ON `installments_inside`.`installment_id`=`installments`.`id` WHERE (`installments`.`customer_id` = '$id' AND `installments`.`deleted_at` = '0') AND `installments_inside`.`payed_at` = '0' ORDER BY `installments`.`id` ASC LIMIT 5");
  while ($row = @mysqli_fetch_assoc($installments)) {
    $result_installments[] = $row;
  }
?>
  <button type="button" class="close" data-dismiss="modal">
    <span aria-hidden="true"><?=$common_lang['json_x']?></span>
    <span class="sr-only"><?=$common_lang['json_close']?></span>
  </button>
  <p class="hidden"></p>
  <p>
    <b><?=$common_lang['json_cust_profile']?></b>: <a onclick="goto('<?=DEALER_URL?>customers/view','none','<?=$id?>','0','0')" href="javascript:void(0)"><span><?=$customer_info['firstname']?> <?=$customer_info['lastname']?></span></a>
  </p>
  <p>
    <b><?=$common_lang['json_nextservice']?></b>: <span><?=date("d-m-Y", $customer_info['nextservice'])?></span>
  </p>
  <p>
    <b><?=$common_lang['json_cust_phone']?></b>: <span><?=$customer_info['gsm']?></span>
  </p>
  <p>
    <b><?=$common_lang['json_cust_address']?></b>: <span><?=$customer_info['address']?></span>
  </p>
  <p class="text-center lead"><?=$common_lang['json_service_list']?></p>
  <ul class="list-group calendar-services">
    <?php if (!empty($result_services)) { $i=1; foreach ($result_services as $res) { ?>
      <li class="list-group-item<?php if ($res['resolved']==1) { ?> text-success<?php } else { ?> text-warning<?php } ?>">
        <span class="text-left"><?=$i?>.&nbsp;</span>
        <span class="text-left"><b><?=$res['name']?></b></span>
        &nbsp;-&nbsp;
        <span class="text-left"><b><?=$res['price']?><b></b>&nbsp;<?=$customer_info['currency']?></b></span><b>
        <span class="text-right"><b><?=$common_lang['json_service_date']?>:&nbsp;<?=date("d-m-Y", $res['nextservice'])?><b></b></b></span><b>
        </b></b>
      </li>
    <?php $i++; } } else { ?>
      <li class="list-group-item">
        <span><?=$common_lang['json_no_record']?></span>
      </li>
    <?php } ?>
  </ul>
  <p class="text-center lead"><?=$common_lang['json_inst_list']?></p>
  <ul class="list-group calendar-services">
    <?php if (!empty($result_installments)) { foreach ($result_installments as $res) { ?>
      <li class="list-group-item">
        <span class="text-left"><?=$res['count']?>.&nbsp;</span>
        <span class="text-left"><b><?=$common_lang['json_inst']?></b></span>
        &nbsp;-&nbsp;
        <span class="text-left"><b><?=$res['price']?><b></b>&nbsp;<?=$customer_info['currency']?></b></span><b>
        <span class="text-right"><b><?=$common_lang['json_inst_date']?>:&nbsp;<?=date("d-m-Y", $res['date'])?><b></b></b></span><b>
        </b></b>
      </li>
    <?php } } else { ?>
      <li class="list-group-item">
        <span><?=$common_lang['json_no_record']?></span>
      </li>
    <?php } ?>
  </ul>
