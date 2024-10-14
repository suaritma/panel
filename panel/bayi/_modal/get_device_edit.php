<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $user_id = varsql($_GET['user_id']);
  $res = @mysqli_fetch_assoc(mysqli_query($con, "SELECT `devices`.`id` as `id`, `devices_category`.`title` as `title`, `devices`.`manufacturer` as `manufacturer`, `devices`.`name` as `name`, `customers_device`.`price` as `price`, `customers_device`.`serial` as `serial`, `customers_device`.`address` as `address`, `customers_device`.`description` as `description` FROM `customers_device` INNER JOIN `devices` ON `devices`.`id` = `customers_device`.`device_id` INNER JOIN `devices_category` ON `devices_category`.`id` = `devices`.`category_id` WHERE `customers_device`.`id` = '$id' AND `customers_device`.`customer_id` = '$user_id'"));
?>

<!-- Müşteri cihazlarını editleme mondalı -->
  <div class="modal-header info">
    <button type="button" class="close" data-dismiss="modal" aria-label="<?=$common_lang['modal_close']?>">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title text-center text-uppercase" id="get_device_edit">
      <b><?=$common_lang['modal_device_edit']?></b>
    </h4>
  </div>
  <form action="<?=DEALER_URL?>customers/view#devices_list" class="form-horizontal" method="post">
    <input type="hidden" name="id" value="<?=$user_id?>" />
    <input type="hidden" name="process" value="device_edit" />
    <input type="hidden" name="process_id" value="<?=$id?>" />
    <div class="modal-body">
      <div class="form-group">
        <label class="col-md-3 control-label" for="device">
          <span><?=$common_lang['modal_device_select']?></span>
        </label>
        <div class="col-md-9">
          <b><?=$res['title']?> -> <?=$res['manufacturer']?> -> <?=$res['name']?> (<?=$res['serial']?>)</b>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" for="cihaz_bedeli">
          <span><?=$common_lang['modal_device_price']?></span>
        </label>
        <div class="col-md-9">
          <div class="input-group">
            <input type="text" class="form-control" name="cihaz_bedeli" value="<?=$res['price']?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" for="urun_serino">
          <span><?=$common_lang['modal_device_no']?></span>
        </label>
        <div class="col-md-9">
          <div class="input-group">
            <input type="number" class="form-control" placeholder="Seri Numara" name="urun_serino" min="0" value="<?=$res['serial']?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" for="cihaz_adresi">
          <span><?=$common_lang['modal_device_address']?></span>
        </label>
        <div class="col-md-9">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Cihaz Adresi" name="cihaz_adresi" min="0" value="<?=$res['address']?>">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-md-3 control-label" for="description">
          <span><?=$common_lang['modal_device_detail']?></span>
        </label>
        <div class="col-md-9">
          <textarea name="description" cols="30" rows="2" class="form-control"><?=$res['description']?></textarea>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><?=$common_lang['modal_close']?></button>
      <button type="submit" class="btn btn-primary"><?=$common_lang['modal_edit']?></button>
    </div>
  </form>
