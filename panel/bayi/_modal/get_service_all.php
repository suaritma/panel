<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $cur=@mysqli_fetch_assoc(mysqli_query($con, "SELECT `currency` FROM `dealers` WHERE `id` = '$_SESSION[dealer_id]'"));
  $get=mysqli_query($con, "SELECT `customers_service`.`id` as `id`, `customers_service`.`notified` as `notified`, `customers_service`.`resolved` as `resolved`, `customers_service`.`customer_id` as `customer_id`, `customers_service`.`date` as `date`, `customers_service`.`description` as `description`, `customers_service`.`price` as `price`, `customers_service`.`in_tds` as `in_tds`, `customers_service`.`out_tds` as `out_tds`, `customers_service`.`nextservice` as `nextservice`, `devices`.`manufacturer` as `manufacturer`, `devices`.`name` as `device_name`, `services`.`name` as `service_name` FROM `customers_service` INNER JOIN `devices` ON `customers_service`.`device_id`=`devices`.`id` INNER JOIN `services` ON `services`.`id`=`customers_service`.`service_id` WHERE `customers_service`.`customer_id` = '$id' AND `customers_service`.`status` = '1' ORDER BY `customers_service`.`date` DESC, `customers_service`.`customer_device_id` ASC");
  while ($row = @mysqli_fetch_assoc($get)) {
      $result_service[] = $row;
  }
  if (!empty($result_service)) { ?>
<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">
      <table class="table table-bordered table-hover sortableTable">
        <thead>
          <tr class="info text-center">
            <td>#</td>
            <td><?=$common_lang['modal_service_device']?></td>
            <td><?=$common_lang['modal_service_service']?></td>
            <td>İşlem Tarihi</td>
            <td><?=$common_lang['modal_service_nextservice']?></td>
            <td><?=$common_lang['modal_service_price']?></td>
            <td><?=$common_lang['modal_service_desc']?></td>
            <td><?=$common_lang['modal_service_in_tds']?></td>
            <td><?=$common_lang['modal_service_out_tds']?></td>
            <td><?=$common_lang['modal_service_notified']?></td>
            <td><?=$common_lang['modal_service_resolved']?></td>
          </tr>
        </thead>
        <tbody class="text-center">
        <?php $counterService=1; foreach ($result_service as $res) { ?>
          <tr>
            <td><?php echo $counterService++;?></td>
            <td><?=$res['manufacturer']?> / <?=$res['device_name']?></td>
            <td><?=$res['service_name']?></td>
            <td class="image-date"><?=strftime('%e %B %Y', $res['date'])?></td>
            <td class="image-date"><?=strftime('%e %B %Y', $res['nextservice'])?></td>
            <td><?=$res['price']?>&nbsp;<?=$cur['currency']?></td>
            <td><?=$res['description']?></td>
            <td><?=$res['in_tds']?></td>
            <td><?=$res['out_tds']?></td>
            <td><?php if ($res['notified']==1) { ?><?=$common_lang['modal_yes']?><?php } else { ?><?=$common_lang['modal_no']?><?php } ?></td>
            <td><?php if ($res['resolved']==1) { ?><?=$common_lang['modal_yes']?><?php } else { ?><?=$common_lang['modal_no']?><?php } ?></td>
          </tr>
        <?php } ?>
        </tbody>
        <tfoot>
          <tr class="info text-center">
            <td>#</td>
            <td><?=$common_lang['modal_service_device']?></td>
            <td><?=$common_lang['modal_service_service']?></td>
            <td><?=$common_lang['modal_service_created']?></td>
            <td><?=$common_lang['modal_service_nextservice']?></td>
            <td><?=$common_lang['modal_service_price']?></td>
            <td><?=$common_lang['modal_service_desc']?></td>
            <td><?=$common_lang['modal_service_in_tds']?></td>
            <td><?=$common_lang['modal_service_out_tds']?></td>
            <td><?=$common_lang['modal_service_notified']?></td>
            <td><?=$common_lang['modal_service_resolved']?></td>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>
  <?php } else { ?>
  <li class='list-group-item'>
    <p><?=$common_lang['modal_no_record']?></p>
  </li>
  <?php } ?>
