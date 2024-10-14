<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $user_id = varsql($_GET['user_id']);
  $result_device = @mysqli_fetch_assoc(mysqli_query($con, "SELECT `devices_category`.`title` as `title`, `devices`.`manufacturer` as `manufacturer`, `devices`.`name` as `name`, `customers_device`.`serial` as `serial`, `customers_device`.`price` as `price`, `customers_device`.`address` as `address`, `customers_device`.`description` as `description`, `customers_device`.`created_at` as `created_at`, `customers_device`.`status` as `status` FROM `customers_device` INNER JOIN `devices` ON `devices`.`id` = `customers_device`.`device_id` INNER JOIN `devices_category` ON `devices_category`.`id` = `devices`.`category_id` WHERE `customers_device`.`id` = '$id' AND `customers_device`.`customer_id` = '$user_id'"));
  ?>
  <div class="modal-header info">
    <button type="button" class="close" data-dismiss="modal" aria-label="<?=$common_lang['modal_close']?>">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title text-center text-uppercase" id="get_device_info">
      <b><?=$common_lang['modal_device_info']?></b>
    </h4>
  </div>
  <table class="table table-bordered dataTable">
    <tbody>
      <tr>
        <td><?=$common_lang['modal_device_device']?>:</td>
        <td><?=$result_device['title']?> > <?=$result_device['manufacturer']?> > <?=$result_device['name']?></td>
      </tr>
      <tr>
        <td><?=$common_lang['modal_device_serial']?>: </td>
        <td><?=$result_device['serial']?></td>
      </tr>
      <tr>
        <td><?=$common_lang['modal_device_prc']?>: </td>
        <td><?=$result_device['price']?></td>
      </tr>
      <tr>
        <td><?=$common_lang['modal_device_adres']?>: </td>
        <td><?=$result_device['address']?></td>
      </tr>
      <tr>
        <td><?=$common_lang['modal_device_description']?>: </td>
        <td><?=$result_device['description']?></td>
      </tr>
      <tr>
        <td><?=$common_lang['modal_created_at']?>: </td>
        <td><?=date("d/m/Y H:i:s", $result_device['created_at'])?></td>
      </tr>
      <tr>
        <td><?=$common_lang['modal_status']?>: </td>
        <td><?=$result_device['status']?></td>
      </tr>
    </tbody>
  </table>
