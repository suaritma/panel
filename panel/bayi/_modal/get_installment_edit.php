<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include('../../db.php');
  include('../_include/_session.php');
  include('../_include/_function.php');
  $id = varsql($_GET['id']);
  $user_id = varsql($_GET['user_id']);
  $result_installment = @mysqli_fetch_assoc(mysqli_query($con, "SELECT `id`, `price`, `advance`, `installment_count`, `installment_price`, `note`, `status` FROM `installments` WHERE `id` = '$id'"));
  
  
  
  // Taksit edit ekranı 
  ?>
  <div class="modal-header info">
    <button type="button" class="close" data-dismiss="modal" aria-label="<?=$common_lang['modal_close']?>">
      <span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title text-center text-uppercase" id="get_installment_edit">
      <b><?=$common_lang['modal_installment_edit']?></b>
    </h4>
  </div>
  <form action="<?=DEALER_URL?>customers/view" class="form-horizontal" method="post">
    <input type="hidden" name="id" value="<?=$user_id?>" />
    <input type="hidden" name="process" value="installment_approve" />
    <input type="hidden" name="process_id" value="<?=$id?>" />
    <div class="modal-body">
      <div class="form-group">
        <div class="col-md-10 col-md-offset-1">
          <input type="text" name="price" placeholder="<?=$common_lang['modal_installment_total']?>" class="form-control" value="<?=$result_installment['price']?>" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <input type="text" name="advance" placeholder="<?=$common_lang['modal_installment_advance']?>" class="form-control" value="<?=$result_installment['advance']?>" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <input type="text" name="installment_count" placeholder="<?=$common_lang['modal_installment_count']?>" class="form-control" value="<?=$result_installment['installment_count']?>" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <input type="text" name="installment_price" placeholder="<?=$common_lang['modal_installment_price']?>" class="form-control" value="<?=$result_installment['installment_price']?>" />
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <textarea name="address" placeholder="" class="form-control"><?=$result_installment['note']?></textarea>
          <p>&nbsp;</p>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <select class="form-control" name="status">
            <option value="1"<?php if ($result_installment['status']==1) { ?> selected<?php } ?>><?=$common_lang['modal_installment_payed']?></option>
            <option value="0"<?php if ($result_installment['status']==0) { ?> selected<?php } ?>><?=$common_lang['modal_installment_unpayed']?></option>
          </select>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal"><?=$common_lang['modal_close']?></button>
      <button type="submit" class="btn btn-primary"><?=$common_lang['modal_edit']?></button>
    </div>
  </form>
