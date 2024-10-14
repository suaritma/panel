<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $customer_device_id = varsql($_GET['customer_device_id']);
  $cur=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `currency` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
  $get = mysqli_query($con, "SELECT `customers_service`.`id` as `id`, `customers_service`.`customer_id` as `customer_id`, `customers_service`.`date` as `date`, `customers_service`.`description` as `description`, `customers_service`.`price` as `price`, `customers_service`.`in_tds` as `in_tds`, `customers_service`.`out_tds` as `out_tds`, `customers_service`.`nextservice` as `nextservice`, `devices`.`manufacturer` as `manufacturer`, `devices`.`name` as `device_name`, `services`.`name` as `service_name` FROM `customers_service` INNER JOIN `devices` ON `customers_service`.`device_id`=`devices`.`id` INNER JOIN `services` ON `services`.`id`=`customers_service`.`service_id` WHERE `customers_service`.`customer_device_id` = '$customer_device_id' AND `customers_service`.`status` = '1' ORDER BY `customers_service`.`date` DESC");
  while ($row = @mysqli_fetch_assoc($get)) {
      $result_service[] = $row;
  }
  if (!empty($result_service)) {
  $i=count($result_service);
  foreach ($result_service as $res) { 
  $get_service_image=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `sfx` FROM `customers_image` WHERE `service_id` = '$res[id]'"));
  ?>
<li class='list-group-item'>
  <p>
    <ul class='list-inline'>
      <li>
        <span><b><?=$i?>.</b></span>&nbsp;
        <span class='text-uppercase'><strong><?=$res['service_name']?></strong></span>
        <span class='hidden-xs'>&nbsp;-</span>
        <span>&nbsp;<?=date("d-m-Y", $res['date'])?></span>
      </li>
      <li class='pull-right'>
      <?php if ($_SESSION['p4']['pdel']==1) { ?>
        <a onclick="goto('<?=DEALER_URL?>customers/view#services_list','service_delete','<?=$res['customer_id']?>','<?=$res['id']?>','1')" href='javascript:void(0)' type='button' class='btn btn-danger' role='button' title='<?=$common_lang['json_remove']?>'>
          <span class='glyphicon glyphicon-trash'></span>
        </a>
        <?php } ?>
      </li>
    </ul>
  </p>
  <p class='text-muted'>&emsp;<span class='service_description'><?php if ((isset($get_service_image['sfx'])) && (!empty($get_service_image['sfx']))) { ?><img src="../../uploads/services/<?=$get_service_image['sfx']?>.tmp" style="width:25%" /><?php } ?></span></p>
    <p><strong>&emsp;<?=$common_lang['json_price']?>:</strong><ins><b><?=$res['price']?>&nbsp;<?=$cur['currency']?></b></ins></p>
    <p class='text-muted'>
      <span>&emsp;<?=$common_lang['json_in_tds']?>: <?=$res['in_tds']?> ppm</span>
      <span class='hidden-xs'>&emsp;-</span>
      <span>&emsp;<?=$common_lang['json_out_tds']?>: <?=$res['out_tds']?> ppm</span>
    </p>
    <p>
      <span>&emsp;<?=$common_lang['json_nextservice']?>:&nbsp;</span>
      <span class='nextServiceDate'><b><?=date("d-m-Y", $res['nextservice'])?></b></span>
    </p>
    <p>
      <span>&emsp;<?=$common_lang['json_manufacturer']?>:&nbsp;</span>
      <span class='device_id'><b><?=$res['manufacturer']?></b></span>
      <span class='visible-xs'><br></span>
      <span>&emsp;<?=$common_lang['json_device']?>:&nbsp;</span>
      <span class='device_id'><b><?=$res['device_name']?></b></span>
    </p>
    <p>
      <span>&emsp;<?=$common_lang['json_description']?>:&nbsp;</span>
      <span><b><?=$res['description']?></b></span>
  </li>
  <?php $i--; } } else { ?>
  <li class='list-group-item'>
    <p><?=$common_lang['json_no_record']?></p>
  </li>
  <?php } ?>
